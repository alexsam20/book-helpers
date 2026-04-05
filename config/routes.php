<?php

use App\Controllers\BookController;
use App\Controllers\HomeController;
use Core\Router\Route;

return [
    Route::get('/home' , [HomeController::class , 'index']),
    Route::get('/books', [BookController::class , 'index']),
    Route::get('/admin/books/add', [BookController::class , 'add']),
    Route::post('/admin/books/add', [BookController::class , 'store']),

    Route::get('/test' , function() {
        echo 'Test';
    }),
];