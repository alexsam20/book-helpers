<?php

namespace App\Controllers;
use App\Services\BookService;
use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller
{
    public function index(): void
    {
        $books = new BookService($this->db());

        $this->view('home', [
            'books' => $books->all(),
        ]);
    }
}