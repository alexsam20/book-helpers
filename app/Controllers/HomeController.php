<?php

namespace App\Controllers;
use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index(): float
    {
        return $this->getTime();
    }
}