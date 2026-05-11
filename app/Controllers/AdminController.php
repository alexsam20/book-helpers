<?php

namespace App\Controllers;

use App\Services\BookService;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function index(): void
    {
        $books = new BookService($this->db());

        $this->view('/admin/index', [
            'books' => $books->all(),
            'object' => $this,
        ]);
    }

    public function getIcon(string $icon = 'book'): string
    {
        if ($icon === 'book') {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path style="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
</svg>';
        }

        if ($icon === 'video') {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path style="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Zm7 11-6-2V9l6-2v10Z"/>
</svg>';
        }

        return '';
    }
}