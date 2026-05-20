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
            'object' => $this,
        ], 'Parts');
    }

    public function list(): void
    {
        $id = $this->request()->input('id');

        $book = new BookService($this->db());

        $this->view('/list', [
            'id' => $id,
            'book' => $book->find($id),
            'parts' => $this->service()->all($id, 'book_id', 1),
            'object' => $this,
        ], 'Parts of Book');
    }

    public function create(): void
    {
        $books = new BookService($this->db());

        $this->view('/admin/parts/add', [
            'books' => $books->all(),
            'id' => (int) $this->request()->input('id'),
        ], 'Create New Part');
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
        $this->service()->remove($this->request()->input('id'));

        $this->redirect('/admin/parts?id=' . $this->request()->input('book_id'));
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
        ], 'Edit Part');
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

    public function getCss(int $cnt): string
    {
        if ($cnt > 0 && $cnt <= 4) {
            return $this->style('green');
        } elseif ($cnt > 4 && $cnt <= 6) {
            return $this->style('blue');
        } elseif ($cnt > 6 && $cnt <= 8) {
            return $this->style('indigo');
        } elseif ($cnt > 8 && $cnt <= 10) {
            return $this->style('purple');
        } elseif ($cnt > 10 && $cnt <= 15) {
            return $this->style('yellow');
        } elseif ($cnt > 15 && $cnt <= 20) {
            return $this->style('pink');
        } elseif ($cnt > 20) {
            return $this->style('red');
        }
        return $this->style('gray');
    }

    private function style(string $color): string
    {
        return "inset-ring-$color-400/30 bg-$color-400/10 text-$color-400";
    }

    public function visible(): void
    {
        $this->service()->updateVisibility((int) $this->request()->input('id'));

        $this->redirect('/admin/parts?id=' . $this->request()->input('book_id'));
    }

    private function service(): PartService
    {
        if (! isset($this->service)) {
            $this->service = new PartService($this->db());
        }

        return $this->service;
    }
}