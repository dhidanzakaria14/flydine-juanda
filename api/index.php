<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$tmpStorage = '/tmp/storage';
$dirs = [
    $tmpStorage,
    $tmpStorage . '/framework',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/cache',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/logs',
    $tmpStorage . '/app',
    $tmpStorage . '/app/public',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

try {
    if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
        require $maintenance;
    }

    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        throw new \Exception('vendor/autoload.php not found! Root files: ' . json_encode(scandir(__DIR__ . '/..')));
    }

    require __DIR__ . '/../vendor/autoload.php';

    /** @var Application $app */
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $app->useStoragePath($tmpStorage);

    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo "FlyDine Serverless Execution Error:\n\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (Line " . $e->getLine() . ")\n\n";
    echo "Trace:\n" . $e->getTraceAsString();
}
