<?php

use App\Controllers\BookController;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use Core\Router\Route;

return [
    Route::get('/home' , [HomeController::class , 'index']),
    Route::get('/books', [BookController::class , 'index']),
    Route::get('/admin/books/add', [BookController::class , 'add']),
    Route::post('/admin/books/add', [BookController::class , 'store']),
    Route::get('/register', [RegisterController::class , 'index']),

    Route::get('/test' , function() {
        echo 'Test';
    }),
];