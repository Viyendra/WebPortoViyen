const { execSync } = require('child_process');
const path = require('path');
const fs = require('fs');

console.log('--- Custom Vercel Build Script ---');

// 1. Run Vite build
console.log('Running npm run build (Vite)...');
try {
    execSync('npm run build', { stdio: 'inherit' });
} catch (err) {
    console.error('Vite build failed:', err.message);
    process.exit(1);
}

// 2. Install Composer dependencies
console.log('Installing Composer dependencies...');
try {
    const libphp = require('@libphp/almalinux-9-v85');
    const phpBin = libphp.getPhp();
    const composerBin = libphp.getComposer();
    const phpBinDir = path.dirname(phpBin);
    const phpLibDir = path.resolve(phpBinDir, '../lib');

    // Chmod php & composer to be executable
    fs.chmodSync(phpBin, '755');
    fs.chmodSync(composerBin, '755');

    // Run composer install
    execSync(`"${phpBin}" "${composerBin}" install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs`, {
        stdio: 'inherit',
        env: {
            ...process.env,
            COMPOSER_HOME: '/tmp',
            PATH: `${phpBinDir}:${process.env.PATH}`,
            LD_LIBRARY_PATH: `${phpLibDir}:/usr/lib64:/lib64:${process.env.LD_LIBRARY_PATH || ''}`
        }
    });
    console.log('Composer dependencies installed successfully!');
} catch (err) {
    console.error('Failed to install Composer dependencies:', err.message);
    process.exit(1);
}
