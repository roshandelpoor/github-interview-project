<?php

namespace Application\Core;

use Exception;
use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;

class Logger extends \Monolog\Logger
{
    private static array $loggers;

    /**
     * @throws Exception
     */
    public function __construct($key = "app", $config = null)
    {
        parent::__construct($key);

        if (empty($config)) {
            $LOG_PATH = Config::get('LOG_PATH', __DIR__ . '/../GitHub/Resources/logs');
            $config = [
                'logFile'  => "$LOG_PATH/$key.log",
                'logLevel' => \Monolog\Logger::DEBUG
            ];
        }

        $this->pushHandler(new StreamHandler($config['logFile'], $config['logLevel']));
    }

    /**
     * @throws Exception
     */
    public static function getInstance($key = "app", $config = null)
    {
        if (!isset(self::$loggers[$key])) {
            self::$loggers[$key] = new Logger($key, $config);
        }

        return self::$loggers[$key];
    }

    public static function enableSystemLogs(): void
    {
        $LOG_PATH = Config::get('LOG_PATH', __DIR__ . '/../GitHub/Resources/logs');

        // Error Log
        self::$loggers['error'] = new Logger('errors');
        self::$loggers['error']->pushHandler(new StreamHandler("$LOG_PATH/errors.log"));
        ErrorHandler::register(self::$loggers['error']);

        // Request Log
        $data = [
            $_SERVER,
            $_REQUEST,
            trim(file_get_contents("php://input"))
        ];
        self::$loggers['request'] = new Logger('request');
        self::$loggers['request']->pushHandler(new StreamHandler("$LOG_PATH/request.log"));
        self::$loggers['request']->info("REQUEST", $data);
    }
}
