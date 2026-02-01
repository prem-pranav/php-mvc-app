<?php
/**
 * ============================================================================
 *  File: init.php
 *  Description: Application bootstrapping and initialization
 * ============================================================================
 */

// Start session
session_start();

// Load Configuration
require_once __DIR__ . '/config.php';

// Load Logger
require_once __DIR__ . '/logs/Logger.php';
$logger->info("App started.");

// Autoload Core Libraries, Controllers, and Models
spl_autoload_register(function ($className) {
    // Define the paths to look for classes
    $paths = [
        __DIR__ . '/core/',
        __DIR__ . '/controllers/',
        __DIR__ . '/models/'
    ];

    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
