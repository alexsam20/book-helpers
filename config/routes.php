<?php

use Core\Router\Route;

return [
    Route::get('/home' , function() {
        include_once APP_PATH . '/views/pages/home.php';
    }),
    Route::get('/books' , function() {
        include_once APP_PATH . '/views/pages/books.php';
    }),
];