<?php

namespace App\Controllers;

use Core\Controller\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $books = $this->db()->get('books', ['is_visible' => 1]);

        $this->view('/admin/index');
    }
}