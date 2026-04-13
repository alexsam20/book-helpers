<?php

namespace App\Controllers;

use App\Services\BookService;
use App\Services\PartService;
use Core\Controller\Controller;

class PartController extends Controller
{
    private PartService $service;

    public function create()
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
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin');
    }

    private function service()
    {
        if (! isset($this->service)) {
            $this->service = new PartService($this->db());
        }

        return $this->service;
    }
}