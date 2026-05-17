<?php

use App\Controllers\AdminController;
use App\Controllers\BookController;
use App\Controllers\HomeController;
use App\Controllers\ListingController;
use App\Controllers\LoginController;
use App\Controllers\PartController;
use App\Controllers\RegisterController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Core\Router\Route;

return [
    Route::get('/' , [HomeController::class , 'index']),
    Route::get('/register', [RegisterController::class , 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class , 'register']),
    Route::get('/login', [LoginController::class , 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class , 'login']),
    Route::post('/logout', [LoginController::class , 'logout']),
    Route::get('/books', [BookController::class , 'index']),
    Route::get('/list', [PartController::class , 'list']),

    Route::get('/admin', [AdminController::class , 'index'], [AuthMiddleware::class]),
    Route::get('/admin/books/list', [BookController::class , 'list'], [AuthMiddleware::class]),
    Route::get('/admin/books/add', [BookController::class , 'create'], [AuthMiddleware::class]),
    Route::post('/admin/books/add', [BookController::class , 'store'], [AuthMiddleware::class]),
    Route::get('/admin/books/update', [BookController::class , 'edit'], [AuthMiddleware::class]),
    Route::post('/admin/books/update', [BookController::class , 'update'], [AuthMiddleware::class]),
    Route::post('/admin/books/destroy', [BookController::class , 'destroy'], [AuthMiddleware::class]),
    Route::post('/admin/books/visible', [BookController::class , 'visible'], [AuthMiddleware::class]),

    Route::get('/admin/parts', [PartController::class , 'index'], [AuthMiddleware::class]),
    Route::get('/admin/parts/add', [PartController::class , 'create'], [AuthMiddleware::class]),
    Route::post('/admin/parts/add', [PartController::class , 'store'], [AuthMiddleware::class]),
    Route::get('/admin/parts/update', [PartController::class , 'edit'], [AuthMiddleware::class]),
    Route::post('/admin/parts/update', [PartController::class , 'update'], [AuthMiddleware::class]),
    Route::post('/admin/parts/destroy', [PartController::class , 'destroy'], [AuthMiddleware::class]),
    Route::post('/admin/parts/visible', [PartController::class , 'visible'], [AuthMiddleware::class]),

    Route::get('/admin/listing/add', [ListingController::class , 'create'], [AuthMiddleware::class]),
    Route::post('/admin/listing/add', [ListingController::class , 'store'], [AuthMiddleware::class]),
    Route::post('/admin/listing/update', [ListingController::class , 'update'], [AuthMiddleware::class]),
    Route::post('/admin/listing/destroy', [ListingController::class , 'destroy'], [AuthMiddleware::class]),
    Route::post('/admin/listing/upload_image', [ListingController::class , 'upload'], [AuthMiddleware::class]),
    Route::post('/admin/listing/delete_image', [ListingController::class , 'delete'], [AuthMiddleware::class]),

    Route::get('/test' , static function() {
        echo 'Test';
    }),
];