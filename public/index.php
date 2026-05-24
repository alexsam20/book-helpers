<?php
/* Setting */
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/New_York');

/* Constants Directories */
const ROOT_PATH = __DIR__;
define('APP_PATH', dirname(__DIR__));
define('URL_PATH',
    mb_strtolower(
        explode('/', $_SERVER['SERVER_PROTOCOL'])[0]
    ) . '://' . $_SERVER['HTTP_HOST']);
const STORAGE_PATH = ROOT_PATH . '/storage/';
const STORAGE_BOOK = STORAGE_PATH . 'books/';
const STORAGE_BLOCK = STORAGE_PATH . 'block/';
const STORAGE_POST = STORAGE_PATH . 'post/';
const TRASH_PATH = STORAGE_PATH . 'trash/';
const TRASH_BOOK = TRASH_PATH . 'books/';
const TRASH_BLOCK = TRASH_PATH . 'block/';
const TRASH_POST = TRASH_PATH . 'post/';
/*var_dump($_SERVER['DOCUMENT_ROOT']);
var_dump(ROOT_PATH);
var_dump(APP_PATH);
var_dump(URL_PATH);
var_dump(STORAGE_PATH);*/
// autoloader
require_once APP_PATH . '/vendor/autoload.php';
// Run application
$app = new \Core\App();
$app->run();


