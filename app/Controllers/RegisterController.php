<?php

namespace App\Controllers;

use Core\Controller\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'register');
    }

}