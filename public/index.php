<?php
/* Setting */
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/New_York');

/* Constants Directories */
define('APP_PATH', dirname(__DIR__));
define('URL_PATH',
    mb_strtolower(
        explode('/', $_SERVER['SERVER_PROTOCOL'])[0]
    ) . '://' . $_SERVER['HTTP_HOST']);

// autoloader
require_once APP_PATH . '/vendor/autoload.php';
// Run application
$app = new \Core\App();
$app->run();


