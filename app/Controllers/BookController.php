<?php

namespace App\Controllers;

use Core\Controller\Controller;
use Core\Validator\Validator;

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
        $data = ['name' => ''];
        $rules = ['name' => ['required', 'min:3', 'max:100']];

        $validator = new Validator();
        var_dump($validator->validate($data, $rules), $validator->errors());

        var_dump($this->request()->input('book'));
        var_dump($this->request()->input('author'));
        var_dump($this->request()->input('image'));
    }
}