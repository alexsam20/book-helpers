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

    public function add(): void
    {
        $this->view('admin/books/add');
    }

    public function store()
    {
        var_dump($this->request()->input('book'));
        var_dump($this->request()->input('author'));
        var_dump($this->request()->input('image'));
    }
}