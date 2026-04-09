<?php

namespace App\Controllers;

use Core\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'login' );
    }

    public function login()
    {
        $email = $this->request()->input( 'email' );
        $password = $this->request()->input( 'password' );
        var_dump($this->auth()->attempt($email, $password), $_SESSION);
    }
}