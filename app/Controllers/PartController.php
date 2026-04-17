<?php

namespace App\Controllers;

use App\Services\BookService;
use App\Services\PartService;
use Core\Controller\Controller;

class PartController extends Controller
{
    private PartService $service;

    public function index(): void
    {
        $id = $this->request()->input('id');

        $book = new BookService($this->db());
        $parts = new PartService($this->db());

        $this->view('/admin/parts/index', [
            'id' => $id,
            'book' => $book->find($id),
            'parts' => $parts->all($id, 'book_id'),
        ]);
    }

    public function create(): void
    {
        $books = new BookService($this->db());

        $this->view('/admin/parts/add', [
            'books' => $books->all(),
            'id' => (int) $this->request()->input('id'),
        ]);
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'body' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $error_field => $value) {
                $this->session()->set($error_field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/books/add');
        }

        $this->service()->store(
            $this->session()->get("user_id"),
            $this->request()->input('book'),
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin');
    }

    public function edit(): void
    {
        $book = new BookService($this->db());

        /*$book = $book->find($this->request()->input('id'));
        $part = $this->service()->find($this->request()->input('id'), 'book_id');
        var_dump($book, $part); die();*/

        $this->view('/admin/parts/update', [
            'book' => $book->find($this->request()->input('id')),
            'part' => $this->service()->find($this->request()->input('id'), 'book_id'),
        ]);
    }

    public function update()
    {
        /*$validation = $this->request()->validate([
            'book' => ['required', 'min:3', 'max:100'],
            'author' => ['required', 'min:3', 'max:100'],
            'description' => ['required', 'min:10', 'max:5000'],
            "year" => ['required', 'min:4', 'max:4'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/books/update?id=' . $this->request()->input('id'));
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('book'),
            $this->request()->input('author'),
            $this->request()->input('description'),
            $this->request()->input('year')
        );

        $this->redirect('/admin');*/
    }

    private function service(): PartService
    {
        if (! isset($this->service)) {
            $this->service = new PartService($this->db());
        }

        return $this->service;
    }
}