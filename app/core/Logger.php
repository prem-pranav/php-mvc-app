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
    private $startTime;
    private $requestSummaryLogged = false;
    private static $timers = [];

    const LEVEL_ERROR   = 'ERROR';
    const LEVEL_WARNING = 'WARNING';
    const LEVEL_INFO    = 'INFO';
    const LEVEL_DEBUG   = 'DEBUG';

    public function __construct($file = null, $level = self::LEVEL_INFO) {
        $this->logFile = $file ?: __DIR__ . '/../logs/error.log';
        $this->logLevel = $level;
        $this->startTime = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime(true);

        date_default_timezone_set("Asia/Kolkata");
        $dir = dirname($this->logFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $this->registerShutdownHandler();
    }

    /**
     * Get execution time in seconds since request start
     */
    public function getExecutionTime(): float {
        return microtime(true) - $this->startTime;
    }

    /**
     * Start a named timer for tracking sub-operations
     */
    public static function startTimer(string $name): void {
        self::$timers[$name] = microtime(true);
    }

    /**
     * Stop a named timer and return duration in seconds
     */
    public static function stopTimer(string $name): float {
        if (!isset(self::$timers[$name])) {
            return 0.0;
        }
        $duration = microtime(true) - self::$timers[$name];
        unset(self::$timers[$name]);
        return $duration;
    }

    /**
     * Write log entry
     */
    private function writeLog($level, $message, array $context = []) {
        $date = date("Y-m-d H:i:s");
        
        if (!is_string($message)) {
            $message = print_r($message, true);
        }

        if (!empty($context)) {
            $message .= ' ' . json_encode($context, JSON_UNESCAPED_SLASHES);
        }

        $logMessage = "[$date] [$level] $message" . PHP_EOL;
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    public function error($message, array $context = []) {
        $this->writeLog(self::LEVEL_ERROR, $message, $context);
    }

    public function warning($message, array $context = []) {
        $this->writeLog(self::LEVEL_WARNING, $message, $context);
    }

    public function info($message, array $context = []) {
        $this->writeLog(self::LEVEL_INFO, $message, $context);
    }

    public function debug($message, array $context = []) {
        $this->writeLog(self::LEVEL_DEBUG, $message, $context);
    }

    /**
     * Backward-compatible alias for logging request performance
     */
    public function logRequestPerformance($startTime = null) {
        $this->logRequestSummary();
    }

    /**
     * Register custom error handler
     */
    public function registerErrorHandler() {
        set_error_handler([$this, 'handleError']);
    }

    /**
     * Custom error handler function
     */
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

    /**
     * Register shutdown function to log request duration
     */
    public function registerShutdownHandler() {
        register_shutdown_function([$this, 'logRequestSummary']);
    }

    /**
     * Logs request processing time summary at script termination
     */
    public function logRequestSummary() {
        if ($this->requestSummaryLogged) {
            return;
        }
        $this->requestSummaryLogged = true;

        $executionTime = $this->getExecutionTime();
        $timeMs = round($executionTime * 1000, 2);
        $timeSec = number_format($executionTime, 4);

        if (isset($_SERVER['REQUEST_URI'])) {
            $method     = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            $uri        = $_SERVER['REQUEST_URI'] ?? '/';
            $statusCode = http_response_code() ?: 200;
            $peakMemory = round(memory_get_peak_usage() / (1024 * 1024), 2);

            $summary = sprintf(
                "[HTTP REQUEST] %s %s | Status: %d | Time: %s ms (%ss) | Peak Memory: %s MB",
                $method,
                $uri,
                $statusCode,
                $timeMs,
                $timeSec,
                $peakMemory
            );
        } else {
            $script = $_SERVER['SCRIPT_NAME'] ?? ($_SERVER['PHP_SELF'] ?? 'CLI Script');
            $summary = sprintf(
                "[CLI EXECUTION] %s | Time: %s ms (%ss)",
                $script,
                $timeMs,
                $timeSec
            );
        }

        $this->info($summary);
    }
}

// Instantiate global logger instance & register error handler
$logger = new Logger(__DIR__ . "/../logs/error.log");
$logger->registerErrorHandler();