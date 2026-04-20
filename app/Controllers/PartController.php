<?php

namespace App\Controllers;

use App\Models\Part;
use App\Services\BookService;
use App\Services\ListingService;
use App\Services\PartService;
use Core\Controller\Controller;

class PartController extends Controller
{
    private PartService $service;

    public function index(): void
    {
        $id = $this->request()->input('id');

        $book = new BookService($this->db());

        $this->view('/admin/parts/index', [
            'id' => $id,
            'book' => $book->find($id),
            'parts' => $this->service()->all($id, 'book_id'),
        ]);
    }

    /*public function list(): void
    {
        $id = $this->request()->input('id');
        $listing = new ListingService($this->db());
        $codeListings = $listing->all($id, 'part_id');
        $themes = $listing->getThemeCode();

        $this->view('/admin/parts/list', [
            'part' => $this->service()->find($id),
            'codeListings' => $codeListings,
            'themes' => $themes,
        ]);
    }*/

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

            $this->redirect('/admin/parts/add?id=' . $this->request()->input('book'));
        }

        $this->service()->store(
            $this->session()->get("user_id"),
            $this->request()->input('book'),
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin/parts?id=' . $this->request()->input('book'));
    }

    public function destroy(): void
    {
        $this->service()->destroy($this->request()->input('id'));

        $this->redirect('/admin/parts?id=' . $this->request()->input('book'));
    }

    public function edit(): void
    {
        $book = new BookService($this->db());
        /** @var Part $part */
        $part = $this->service()->find($this->request()->input('id'));
        $book = $book->find($part->bookId());

        $this->view('/admin/parts/update', [
            'part' => $part,
            'book' => $book,
        ]);
    }

    public function update(): void
    {
        $id = $this->request()->input('id');

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

            $this->redirect('/admin/parts/update?id=' . $id);
        }

        $this->service()->update(
            (int) $id,
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin/parts?id=' . $id = $this->request()->input('book'));
    }

    private function service(): PartService
    {
        if (! isset($this->service)) {
            $this->service = new PartService($this->db());
        }

        return $this->service;
    }
}