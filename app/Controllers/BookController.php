<?php

namespace App\Controllers;

use Core\Controller\Controller;
use Core\Http\Redirect;

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
        var_dump($this->session());
        $validation = $this->request()->validate([
            'book' => ['required', 'min:3', 'max:100'],
        ]);

        if (! $validation) {
            $this->redirect('/admin/books/add');
            //var_dump('Validation failed', $this->request()->errors());
        }

        var_dump("Validation passed");
    }
}