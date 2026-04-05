<?php

namespace App\Controllers;

use Core\Controller\Controller;

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
        $validation = $this->request()->validate([
            'book' => ['required', 'min:3', 'max:100'],
        ]);

        if (! $validation) {
            var_dump('Validation failed', $this->request()->errors());
        }

        var_dump("Valid book");
    }
}