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
        $validation = $this->request()->validate([
            'book' => ['required', 'min:3', 'max:100'],
            'author' => ['required', 'min:3', 'max:100'],
            'description' => ['required', 'min:10', 'max:5000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }
            $this->redirect('/admin/books/add');
        }

        $id = $this->db()->insert('books', [
            'name' => $this->request()->input('book'),
            'author' => $this->request()->input('author'),
            'description' => $this->request()->input('description'),
        ]);

        var_dump($id);
    }
}