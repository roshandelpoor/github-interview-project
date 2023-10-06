<?php
declare(strict_types=1);

define('APPLICATION_TIMESTAMP_START', microtime(true));
define('STDOUT', fopen('php://stdout', 'wb'));
require_once __DIR__ . '/vendor/autoload.php';

// Load All Routes
require __DIR__ . '/Application/github/Routes/base.php';

use Application\Core\App;
App::boot();
