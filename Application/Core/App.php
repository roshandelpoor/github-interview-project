<?php

namespace Application\Core;

class App
{
    public static function boot(): void
    {
        // Enable and Write logs
        Logger::enableSystemLogs();
    }
}
