<?php

namespace App\Controllers;

use App\Services\BookService;
use App\Services\PartService;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $books = new BookService($this->db());

        $this->view('/admin/index', [
            'books' => $books->all(),
        ]);
    }

    public function showAllParts()
    {
        $books = new BookService($this->db());
        $parts = new PartService($this->db());
    }
}