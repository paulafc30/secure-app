<?php

// Crear directorios /tmp necesarios antes de arrancar Laravel
if (getenv('VERCEL')) {
    $dirs = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/logs',
        '/tmp/storage/app/public',
        '/tmp/bootstrap/cache',
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Usar el kernel de consola, no el HTTP — evita middleware de sesión
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
// migrate:fresh borra y recrea todas las tablas
$kernel->call('migrate:fresh', ['--force' => true]);

header('Content-Type: text/html; charset=utf-8');
echo '<pre>' . htmlspecialchars($kernel->output()) . '</pre>';
