<?php

namespace App\Controllers;

use Core\Controller\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->view('/admin/index');
    }
}