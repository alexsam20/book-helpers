<?php

namespace App\Controllers;
use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home');
    }
}