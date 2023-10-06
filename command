#!/usr/bin/env php
<?php
declare(strict_types=1);

define('APPLICATION_TIMESTAMP_START', microtime(true));
require_once __DIR__ . '/vendor/autoload.php';

// load all environments
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();

use Symfony\Component\Console\Application;

use Application\github\Console\AddRepositoryCommand;
use Application\github\Console\DeleteRepositoryCommand;

use Application\Core\App;
App::boot();

$application = new Application();
# add our commands
$application->add(new AddRepositoryCommand());
$application->add(new DeleteRepositoryCommand());

try {
    $application->run();
} catch (Exception $e) {
    echo 'Ops, Exception was happened' . ' :: ' . $e->getMessage();
}
