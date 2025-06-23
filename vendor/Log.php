<?php

namespace Vendor;

class Log {
    protected static string $direction = __DIR__ . '/../logs';

    /**
     * @param string $level
     * @param string $message
     * @return void
     * @throws Exception
     *
     * This function is used to write log to file.
     */
    protected static function write(string $level, string $message, array $context = []): void
    {
        if (!is_dir(self::$direction)) {
            mkdir(self::$direction, 0777, true);
        }

        $file = self::$direction . '/php.log';
    
        if (!empty($context)) {
            $message .= ' ' . json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        $formatted = "[" . date('Y-m-d H:i:s') . "] $level: $message" . PHP_EOL;
        file_put_contents($file, $formatted, FILE_APPEND);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     *
     * This function is used to write error log to file.
     */
    public static function error(string $message, array $context = []): void
    {
        self::write('ERROR', $message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     *
     * This function is used to write info log to file.
     */
    public static function info(string $message, array $context = []): void
    {
        self::write('INFO', $message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     *
     * This function is used to write warning log to file.
     */
    public static function warning(string $message, array $context = []): void
    {
        self::write('WARNING', $message, $context);
    }
}