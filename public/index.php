<?php

use App\Controllers\HomeController;

ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/New_York');

// constant ROOT project
define('APP_ROOT', dirname(__DIR__));
define('URL_ROOT',
    mb_strtolower(
        explode('/', $_SERVER['SERVER_PROTOCOL'])[0]
    )
    . '//'
    . $_SERVER['HTTP_HOST']);
// autoloader
require_once APP_ROOT . '/vendor/autoloader.php';
// test
$controller = new HomeController();
var_dump($controller->index());