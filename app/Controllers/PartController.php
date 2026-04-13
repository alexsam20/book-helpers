<?php

namespace App\Controllers;

use App\Services\BookService;
use Core\Controller\Controller;

class PartController extends Controller
{
    public function create()
    {
        $books = new BookService($this->db());

        $this->view('/admin/parts/add', [
            'books' => $books->all(),
        ]);
    }
}