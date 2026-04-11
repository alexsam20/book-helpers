<?php

namespace App\Controllers;

use Core\Controller\Controller;

class BookController extends Controller
{
    public function index(): void
    {
        $this->view('books');
    }

    public function list(): void
    {
        $this->view('/admin/books/list');
    }

    public function create(): void
    {
        $this->view('admin/books/add');
    }

    public function store(): void
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

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/books/add');
        }

        $id = $this->db()->insert('books', [
            'user_id' => 1,
            'name' => $this->request()->input('book'),
            'author' => $this->request()->input('author'),
            'description' => $this->request()->input('description'),
        ]);

        /*$file = $this->request()->file('image');

        $filePath = $file->move('books');
        var_dump($this->storage()->url($filePath)); die;*/

        $this->redirect('/admin/books/add');
    }
}