<?php

namespace App\Controllers;

use App\Services\PostService;
use Core\Controller\Controller;

class PostController extends Controller
{
    private PostService $service;
    public function index(): void
    {
        $this->view('/admin/posts/list', [
            'posts' => $this->service()->all(),
            'object' => $this,
        ], 'Posts');
    }

    public function create(): void
    {
        $this->view(name: '/admin/posts/add', title:  'Create New Post');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'body' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/posts/add');
        }

        $this->service()->store(
            $this->auth()->id(),
            $this->request()->input('title'),
            $this->request()->input('body'),
        );

        $this->redirect('/admin/posts');
    }

    public function visible(): void
    {
        $this->service()->updateVisibility((int) $this->request()->input('id'));

        $this->redirect('/admin/posts');
    }

    private function service(): PostService
    {
        if (! isset($this->service)) {
            $this->service = new PostService($this->db());
        }

        return $this->service;
    }
}