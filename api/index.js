const { spawn } = require('child_process');
const http = require('http');
const path = require('path');
const fs = require('fs');
const net = require('net');

let phpServerProcess = null;
const PHP_PORT = 8000;

function waitForPort(port, timeoutMs = 3000) {
    return new Promise((resolve, reject) => {
        const startTime = Date.now();

        function check() {
            const socket = new net.Socket();
            socket.setTimeout(150);
            socket.on('connect', () => {
                socket.destroy();
                resolve();
            });
            socket.on('error', () => {
                socket.destroy();
                if (Date.now() - startTime < timeoutMs) {
                    setTimeout(check, 50);
                } else {
                    reject(new Error(`Timeout waiting for port ${port} to open`));
                }
            });
            socket.connect(port, '127.0.0.1');
        }

        check();
    });
}

function startPhpServer() {
    return new Promise((resolve, reject) => {
        if (phpServerProcess) {
            return resolve();
        }

        try {
            const libphp = require('@libphp/almalinux-9-v85');
            const phpBin = libphp.getPhp();
            const phpIni = libphp.getPhpIni();
            
            // Set executable permissions for PHP binary (necessary on AWS Lambda)
            try {
                fs.chmodSync(phpBin, '755');
            } catch (err) {
                console.log('Failed to chmod php binary:', err.message);
            }

            const docroot = path.resolve(__dirname, '../public');
            const router = path.resolve(docroot, 'index.php');
            const phpBinDir = path.dirname(phpBin);
            const phpLibDir = path.resolve(phpBinDir, '../lib');
            const phpModulesDir = path.resolve(phpBinDir, 'modules');

            console.log(`[Proxy] Spawning PHP: ${phpBin} -c ${phpIni} -d extension_dir=${phpModulesDir} -S 127.0.0.1:${PHP_PORT} -t ${docroot} ${router}`);

            phpServerProcess = spawn(phpBin, [
                '-c', phpIni,
                '-d', `extension_dir=${phpModulesDir}`,
                '-S', `127.0.0.1:${PHP_PORT}`,
                '-t', docroot,
                router
            ], {
                cwd: docroot,
                env: {
                    ...process.env,
                    PATH: `${phpBinDir}:${process.env.PATH}`,
                    LD_LIBRARY_PATH: `${phpLibDir}:/usr/lib64:/lib64:${process.env.LD_LIBRARY_PATH || ''}`,
                    PHP_INI_SCAN_DIR: `:${path.resolve(phpBinDir, '../conf')}`
                },
                stdio: 'inherit'
            });

            // Wait for the port to open using polling
            waitForPort(PHP_PORT, 3000)
                .then(resolve)
                .catch(reject);

            phpServerProcess.on('error', (err) => {
                console.error('[Proxy] PHP process error:', err);
                phpServerProcess = null;
                reject(err);
            });

            phpServerProcess.on('exit', (code) => {
                console.log(`[Proxy] PHP process exited with code ${code}`);
                phpServerProcess = null;
            });

        } catch (err) {
            console.error('[Proxy] Failed to initialize PHP server:', err);
            reject(err);
        }
    });
}

module.exports = async (req, res) => {
    try {
        await startPhpServer();

        // Forward request
        const options = {
            hostname: '127.0.0.1',
            port: PHP_PORT,
            path: req.url,
            method: req.method,
            headers: req.headers
        };

        const proxyReq = http.request(options, (proxyRes) => {
            res.writeHead(proxyRes.statusCode, proxyRes.headers);
            proxyRes.pipe(res, { end: true });
        });

        proxyReq.on('error', (err) => {
            console.error('[Proxy] HTTP forwarding error:', err);
            res.writeHead(500, { 'Content-Type': 'text/plain' });
            res.end('Proxy forward error: ' + err.message);
        });

        req.pipe(proxyReq, { end: true });

    } catch (err) {
        console.error('[Proxy] Boot error:', err);
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        res.end('Failed to bootstrap PHP server: ' + err.message);
    }
};
