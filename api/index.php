<?php

// ============================================================
// Vercel Serverless Entry Point for Laravel
// ============================================================
// Vercel's filesystem is READ-ONLY except /tmp.
// We must redirect all writable paths to /tmp BEFORE Laravel boots.

// 1. Set environment variables using ALL methods Laravel checks
$vercelEnv = [
    'VIEW_COMPILED_PATH' => '/tmp/views',
    'LOG_CHANNEL'        => 'stderr',
    'SESSION_DRIVER'     => 'cookie',
    'CACHE_DRIVER'       => 'array',
    'CACHE_STORE'        => 'array',
];

foreach ($vercelEnv as $key => $value) {
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
    putenv("$key=$value");
}

// 2. Create all required writable directories in /tmp
$tmpDirs = [
    '/tmp/views',
    '/tmp/logs',
    '/tmp/cache',
    '/tmp/sessions',
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

// 3. Forward request to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
