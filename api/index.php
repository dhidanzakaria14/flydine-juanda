<?php

// Forward Vercel serverless requests to public/index.php
// Ensure /tmp writable directories exist for serverless environment
$dirs = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/sessions'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';
