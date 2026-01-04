<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Error reporting untuk debugging (akan di-disable di production)
error_reporting(E_ALL);
ini_set('display_errors', '0');

try {
    // Determine if the application is in maintenance mode...
    if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
        require $maintenance;
    }

    // Register the Composer autoloader...
    if (!file_exists(__DIR__.'/../vendor/autoload.php')) {
        http_response_code(500);
        die('Error: vendor/autoload.php not found. Please ensure dependencies are installed.');
    }

    require __DIR__.'/../vendor/autoload.php';

    // Bootstrap Laravel and handle the request...
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';

    // Handle request for Vercel
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    // Log error
    error_log('Laravel Error: ' . $e->getMessage());
    error_log('Stack trace: ' . $e->getTraceAsString());

    // Return error response
    http_response_code(500);

    // Show error details if APP_DEBUG is true
    if (env('APP_DEBUG', false)) {
        header('Content-Type: application/json');
        echo json_encode([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ], JSON_PRETTY_PRINT);
    } else {
        echo 'Internal Server Error';
    }
}
