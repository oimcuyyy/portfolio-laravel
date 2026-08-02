<?php

// 1. Salin database SQLite ke /tmp agar writable di environment serverless Vercel
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && (!file_exists($targetDb) || filesize($sourceDb) !== filesize($targetDb))) {
    copy($sourceDb, $targetDb);
}

// Set env database ke jalur /tmp
$_ENV['DB_DATABASE'] = $targetDb;
putenv("DB_DATABASE={$targetDb}");

// 2. Pastikan folder penyimpanan sementara (/tmp) dibuat sebelum Laravel running
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 3. Set environment path storage & bootstrap cache ke /tmp
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/bootstrap/cache/routes.php';

// 4. Load Autoloader bawaan Composer
require __DIR__ . '/../vendor/autoload.php';

// 5. Bootstrapping Laravel Application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 6. Handle Request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
