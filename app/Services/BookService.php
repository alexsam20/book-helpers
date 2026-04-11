<?php

namespace App\Services;

use Core\DataBase\DatabaseInterface;

class BookService
{
    public function __construct(
        private readonly DatabaseInterface $db
    ) { }

    public function all()
    {
        return $this->db->get('books', ['is_visible' => 1]);
    }
}