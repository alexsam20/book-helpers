<?php

namespace App\Controllers;
use App\Services\BookService;
use App\Services\PostService;
use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller
{
    public function index(): void
    {
        $books = new BookService($this->db());

        $this->view('home', [
            'books' => $books->all(1),
        ], 'Books and Videos');
    }

    public function posts(): void
    {
        $posts = new PostService($this->db());

        $this->view('posts', [
            'posts' => $posts->all(1),
        ], 'All Posts');
    }

    public function post(): void
    {
        $posts = new PostService($this->db());

        $this->view('post', [
            'post' => $posts->find($this->request()->input('id')),
        ], 'Post');
    }

    public function about(): void
    {
        $this->view('about', [], 'About Us');
    }
}