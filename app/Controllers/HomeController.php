<?php

namespace App\Controllers;
use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller
{
    public function index(): void
    {
        $view = new View();

        $view->page('home');
    }
}