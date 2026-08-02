<?php

// 1. Buat direktori sementara di /tmp untuk Vercel
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache'
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Load Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 3. Load Application Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 4. Set storage path ke /tmp
$app->useStoragePath('/tmp/storage');

// 5. Jalankan Aplikasi
$request = Illuminate\Http\Request::capture();
$response = $app->handleRequest($request);
$response->send();
