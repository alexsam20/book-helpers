<?php

namespace App\Services;

use Core\DataBase\DatabaseInterface;

class PartService
{
    public function __construct(
        private readonly DatabaseInterface $db
    ) { }

    public function store(int $id, int $book, string $title, string $body): false|int
    {
        return $this->db->insert('parts', [
            'user_id' => $id,
            'book_id' => $book,
            'title' => $title,
            'body' => $body,
        ]);
    }
}