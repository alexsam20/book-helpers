<?php

namespace App\Controllers;

use Core\Controller\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'register');
    }

    public function register(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6', 'match:password'],
        ]);

        //var_dump($this->request()->post); die;

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/register');
        }

        $userId = $this->db()->insert('users', [
            'name' => $this->request()->input('name'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
        ]);

        $this->redirect('/');
    }

}