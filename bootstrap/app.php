<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// TAMBAHKAN DUA BARIS INI UNTUK VERCEL:
$app = new Application(dirname(__DIR__));
$app->useStoragePath('/tmp/storage');

return $app;
