<?php

// ============================================================
// Vercel Serverless Entry Point for Laravel
// ============================================================

// Enable maximum error reporting so we can see what crashes
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Log errors to stderr (visible in Vercel Runtime Logs)
ini_set('log_errors', '1');
ini_set('error_log', 'php://stderr');

try {
    // Set environment variables using ALL methods Laravel checks
    $vercelEnv = [
        'VERCEL'              => '1',
        'VIEW_COMPILED_PATH'  => '/tmp/views',
        'LOG_CHANNEL'         => 'stderr',
        'SESSION_DRIVER'      => 'cookie',
        'CACHE_DRIVER'        => 'array',
        'CACHE_STORE'         => 'array',
    ];

    foreach ($vercelEnv as $key => $value) {
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
        putenv("$key=$value");
    }

    // Create all required writable directories in /tmp
    $tmpDirs = [
        '/tmp/views',
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/testing',
        '/tmp/storage/logs',
        '/tmp/storage/app',
    ];

    foreach ($tmpDirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    // Forward request to Laravel
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    // Catch ANY error and output it
    http_response_code(500);
    error_log('[VERCEL_LARAVEL_ERROR] ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    echo '<h1>Laravel Boot Error</h1>';
    echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}
