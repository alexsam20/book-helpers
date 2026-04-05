<?php

namespace App\Controllers;

use Core\Controller\Controller;
use Core\View\View;

class BookController extends Controller
{
    public function index(): void
    {
        $this->view('books');
    }

    public function add()
    {
        $this->view('admin/books/add');
    }
}