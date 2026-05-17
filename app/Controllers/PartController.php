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
            return 'inset-ring-green-500/20 bg-green-400/10 text-green-400';
        } elseif ($cnt > 4 && $cnt <= 6) {
            return 'inset-ring-blue-400/30 bg-blue-400/10 text-blue-400';
        } elseif ($cnt > 6 && $cnt <= 8) {
            return 'inset-ring-indigo-400/30 bg-indigo-400/10 text-indigo-400';
        } elseif ($cnt > 8 && $cnt <= 10) {
            return 'inset-ring-purple-400/30 bg-purple-400/10 text-purple-400';
        } elseif ($cnt > 10 && $cnt <= 15) {
            return 'inset-ring-yellow-400/20 bg-yellow-400/10 text-yellow-500';
        } elseif ($cnt > 15 && $cnt <= 20) {
            return 'inset-ring-pink-400/20 bg-pink-400/10 text-pink-400';
        } elseif ($cnt > 20) {
            return 'inset-ring-red-400/20 bg-red-400/10 text-red-400';
        }
        return 'inset-ring-gray-400/20 bg-gray-400/10 text-gray-400';
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