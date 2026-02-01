<?php
class Logger {
    private $logFile;
    private $logLevel;

    const LEVEL_ERROR = 'ERROR';
    const LEVEL_WARNING = 'WARNING';
    const LEVEL_INFO = 'INFO';
    const LEVEL_DEBUG = 'DEBUG';

    public function __construct($file = "error.log", $level = self::LEVEL_INFO) {
        $this->logFile = $file;
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

    // 🔥 Attach PHP's error handler to this logger
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
        /* Returning false allows PHP internal error handler to continue
           Returning true will suppress PHP default error handler */
        return true;
    }
}

$logger = new Logger(__DIR__ . "/error.log");
$logger->registerErrorHandler();
?>
