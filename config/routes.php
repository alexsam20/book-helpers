<?php

use App\Controllers\BookController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Core\Router\Route;

return [
    Route::get('/' , [HomeController::class , 'index']),
    Route::get('/books', [BookController::class , 'index']),
    Route::get('/admin/books/add', [BookController::class , 'add'], [AuthMiddleware::class]),
    Route::post('/admin/books/add', [BookController::class , 'store']),
    Route::get('/register', [RegisterController::class , 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class , 'register']),
    Route::get('/login', [LoginController::class , 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class , 'login']),
    Route::post('/logout', [LoginController::class , 'logout']),

    Route::get('/test' , static function() {
        echo 'Test';
    }),
];