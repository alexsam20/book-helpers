<?php

use App\Controllers\BookController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Middleware\AuthMiddleware;
use Core\Router\Route;

return [
    Route::get('/home' , [HomeController::class , 'index']),
    Route::get('/books', [BookController::class , 'index']),
    Route::get('/admin/books/add', [BookController::class , 'add'], [AuthMiddleware::class]),
    Route::post('/admin/books/add', [BookController::class , 'store'], [AuthMiddleware::class]),
    Route::get('/register', [RegisterController::class , 'index']),
    Route::post('/register', [RegisterController::class , 'register']),
    Route::get('/login', [LoginController::class , 'index']),
    Route::post('/login', [LoginController::class , 'login']),
    Route::post('/logout', [LoginController::class , 'logout']),

    Route::get('/test' , static function() {
        echo 'Test';
    }),
];