<?php
// Bare minimum test - no includes, no dependencies
header('Content-Type: application/json');
echo json_encode([
    'status' => 'PHP works!',
    'php_version' => phpversion(),
    'time' => date('Y-m-d H:i:s'),
]);
