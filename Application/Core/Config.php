<?php

namespace Application\Core;

class Config
{
    private static array $config;

    public static function get(string $key, string $default = null): mixed
    {
        if (!isset(self::$config)) {
            self::$config = require_once(__DIR__ . '/../github/Config/application.php');
        }

        return !empty(self::$config[$key]) ? self::$config[$key] : $default;
    }
}
