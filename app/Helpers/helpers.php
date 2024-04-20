<?php


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

if (!function_exists('custom_log')) {
    /**
     * Log a message to a custom log file.
     *
     * @param string $message The message to log.
     * @param string $level The log level (e.g., 'warning', 'info').
     */
    function custom_log($message, $level = 'warning')
    {
        // Create a custom log channel
        $log = new Logger('custom');
        $log->pushHandler(new StreamHandler(storage_path('logs/custom.log'), Logger::$level()));

        // Add records to the log
        $log->$level($message);
    }
}