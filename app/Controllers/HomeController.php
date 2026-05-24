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
        ]);
    }

    public function posts(): void
    {
        $posts = new PostService($this->db());

        $this->view('posts', [
            'posts' => $posts->all(1),
        ]);
    }
}