<?php
/**
 * ============================================================================
 *  File: Logger.php
 *  Location: app/core/Logger.php
 *  Description: Centralized application logging and global error handler
 * ============================================================================
 */

class Logger {
    private $logFile;
    private $logLevel;

    const LEVEL_ERROR = 'ERROR';
    const LEVEL_WARNING = 'WARNING';
    const LEVEL_INFO = 'INFO';
    const LEVEL_DEBUG = 'DEBUG';

    public function __construct($file = null, $level = self::LEVEL_INFO) {
        $this->logFile = $file ?: __DIR__ . '/../logs/error.log';
        $this->logLevel = $level;
        date_default_timezone_set("Asia/Kolkata");
        $dir = dirname($this->logFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    private function writeLog($level, $message) {
        $date = date("Y-m-d H:i:s");
        $logMessage = "[$date] [$level] $message" . PHP_EOL;
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    public function error($message) {
        $this->writeLog(self::LEVEL_ERROR, $message);
    }

    public function warning($message) {
        $this->writeLog(self::LEVEL_WARNING, $message);
    }

    public function info($message) {
        $this->writeLog(self::LEVEL_INFO, $message);
    }

    public function debug($message) {
        $this->writeLog(self::LEVEL_DEBUG, $message);
    }

    // Log HTTP Request total execution timing
    public function logRequestPerformance($startTime) {
        $executionTime = round((microtime(true) - $startTime) * 1000, 2);
        $method = $_SERVER['REQUEST_METHOD'] ?? 'CLI';
        $uri = $_SERVER['REQUEST_URI'] ?? 'N/A';
        $this->info("HTTP Request Completed: [$method] $uri - Duration: {$executionTime} ms");
    }

    // Attach PHP's global error handler to this logger
    public function registerErrorHandler() {
        set_error_handler([$this, 'handleError']);
    }

    // Custom error handler function
    public function handleError($errno, $errstr, $errfile, $errline) {
        $errorMessage = "Error [$errno]: $errstr in $errfile on line $errline";

        switch ($errno) {
            case E_USER_ERROR:
            case E_ERROR:
                $this->error($errorMessage);
                break;
            case E_USER_WARNING:
            case E_WARNING:
                $this->warning($errorMessage);
                break;
            case E_USER_NOTICE:
            case E_NOTICE:
            default:
                $this->info($errorMessage);
                break;
        }
        return true;
    }
}

// Instantiate global logger instance & register error handler
$logger = new Logger(__DIR__ . "/../logs/error.log");
$logger->registerErrorHandler();
?>
