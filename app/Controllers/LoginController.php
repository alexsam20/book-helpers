<?php

namespace App\Controllers;

use Core\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'login' );
    }
}