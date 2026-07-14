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
    const phpModulesDir = path.resolve(phpBinDir, 'modules');

    // Chmod php & composer to be executable
    fs.chmodSync(phpBin, '755');
    fs.chmodSync(composerBin, '755');

    // Run composer install
    execSync(`"${phpBin}" -d extension_dir="${phpModulesDir}" "${composerBin}" install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs --no-scripts`, {
        stdio: 'inherit',
        env: {
            ...process.env,
            COMPOSER_HOME: '/tmp',
            PATH: `${phpBinDir}:${process.env.PATH}`,
            LD_LIBRARY_PATH: `${phpLibDir}:/usr/lib64:/lib64:${process.env.LD_LIBRARY_PATH || ''}`
        }
    });
    console.log('Composer dependencies installed successfully!');

    // 3. Run Package Discover to pre-generate config files in bootstrap/cache/
    console.log('Running php artisan package:discover...');
    execSync(`"${phpBin}" -d extension_dir="${phpModulesDir}" artisan package:discover`, {
        stdio: 'inherit',
        env: {
            ...process.env,
            PATH: `${phpBinDir}:${process.env.PATH}`,
            LD_LIBRARY_PATH: `${phpLibDir}:/usr/lib64:/lib64:${process.env.LD_LIBRARY_PATH || ''}`
        }
    });
    console.log('Package discovery completed successfully!');
} catch (err) {
    console.error('Failed during build process:', err.message);
    process.exit(1);
}
