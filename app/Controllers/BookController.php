<?php

namespace App\Controllers;

use Core\Controller\Controller;

class BookController extends Controller
{
    public function index(): void
    {
        include_once APP_PATH . '/views/pages/books.php';
    }
}