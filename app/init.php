<?php
/**
 * ============================================================================
 *  File: init.php
 *  Description: Application bootstrapping and initialization
 * ============================================================================
 */

// Start session
session_start();

// Load Logger first (required before autoloader)
require_once __DIR__ . '/logs/Logger.php';
$logger->info("App started.");

// Load Configuration
require_once __DIR__ . '/config.php';
$logger->info("Config included.");

/**
 * PSR-4 Style Autoloader
 * Automatically loads classes from core, controllers, and models directories
 * Supports subdirectories (admin/client) for controllers and models
 */
spl_autoload_register(function ($className) use ($logger) {
    // Define base paths to search for classes
    $basePaths = [
        'core'        => __DIR__ . '/core/',
        'controllers' => __DIR__ . '/controllers/',
        'models'      => __DIR__ . '/models/',
    ];

    // Try to load from each base path
    foreach ($basePaths as $type => $basePath) {
        // First, try direct path (for core classes)
        $directFile = $basePath . $className . '.php';
        if (file_exists($directFile)) {
            require_once $directFile;
            $logger->info("Autoloaded: {$className} from {$type}/");
            return;
        }

        // For controllers and models, also check admin/ and client/ subdirectories
        if ($type === 'controllers' || $type === 'models') {
            $subdirs = ['admin', 'client'];
            foreach ($subdirs as $subdir) {
                $subdirFile = $basePath . $subdir . '/' . $className . '.php';
                if (file_exists($subdirFile)) {
                    require_once $subdirFile;
                    $logger->info("Autoloaded: {$className} from {$type}/{$subdir}/");
                    return;
                }
            }
        }
    }

    // If class not found, log it for debugging
    $logger->warning("Autoloader: Class '{$className}' not found in any registered path.");
});

$logger->info("Autoloader registered successfully.");
