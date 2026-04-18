<?php

namespace App\Controllers;

use App\Services\BookService;
use Core\Controller\Controller;

class BookController extends Controller
{
    private BookService $service;

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
        $this->getFile();

        $validation = $this->request()->validate([
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

            $this->redirect('/admin/books/add');
        }

        $this->service()->store(
            $this->session()->get("user_id"),
            $this->request()->input('book'),
            $this->request()->input('author'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('year')
        );

        $this->redirect('/admin');
    }

    public function destroy(): void
    {
        $this->service()->delete($this->request()->input('id'));

        $this->redirect('/admin');
    }

    public function edit(): void
    {
        $book = $this->service()->find($this->request()->input('id'));

        $this->view('/admin/books/update', ['book' => $book]);
    }

    public function update(): void
    {
        $this->getFile();

        $validation = $this->request()->validate([
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
            $this->request()->file('image'),
            $this->request()->input('year')
        );

        $this->redirect('/admin');
    }

    private function getFile(): void
    {
        if ($this->request()->files['image']['error'] !== 4) {
            $this->request()->file('image');
        }
    }

    private function service(): BookService
    {
        if (! isset($this->service)) {
            $this->service = new BookService($this->db());
        }

        return $this->service;
    }
}