<?php

// Simple test - no Laravel, just PHP
echo json_encode([
    'status' => 'PHP is working!',
    'php_version' => phpversion(),
    'extensions' => get_loaded_extensions(),
    'memory_limit' => ini_get('memory_limit'),
    'cwd' => getcwd(),
    'dir_contents' => scandir(__DIR__ . '/..'),
    'env_APP_KEY' => getenv('APP_KEY') ? 'SET' : 'NOT SET',
    'env_DB_HOST' => getenv('DB_HOST') ? 'SET' : 'NOT SET',
    'env_VERCEL' => getenv('VERCEL') ? 'SET' : 'NOT SET',
    'vendor_exists' => file_exists(__DIR__ . '/../vendor/autoload.php'),
    'public_index_exists' => file_exists(__DIR__ . '/../public/index.php'),
    'bootstrap_exists' => file_exists(__DIR__ . '/../bootstrap/app.php'),
], JSON_PRETTY_PRINT);
