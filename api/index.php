<?php

// Set writable paths for Vercel's read-only filesystem
// Vercel only allows writing to /tmp
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['CACHE_DRIVER'] = 'array';

// Create required tmp directories
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}
if (!is_dir('/tmp/logs')) {
    mkdir('/tmp/logs', 0755, true);
}
if (!is_dir('/tmp/cache')) {
    mkdir('/tmp/cache', 0755, true);
}
if (!is_dir('/tmp/sessions')) {
    mkdir('/tmp/sessions', 0755, true);
}

// Forward to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
