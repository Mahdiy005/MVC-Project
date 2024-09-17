<?php

use Symfony\Component\VarDumper\VarDumper;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../src/Support/helper.php';

// constant pathes
define('BASE_PATH', dirname(__DIR__) . '/');
define('VIEW_PATH', BASE_PATH . 'views/layouts/');
define('ERROR_PATH', BASE_PATH . 'views/exceptions/');

require BASE_PATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// handle routes in this folder
include_once BASE_PATH . 'routes/web.php';

