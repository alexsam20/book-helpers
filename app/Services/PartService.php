<?php

namespace App\Services;

use App\Models\Part;
use Core\DataBase\DatabaseInterface;

class PartService
{
    public function __construct(
        private readonly DatabaseInterface $db
    ) { }

    /**
     * @return array<Part>
     */
    public function all(): array
    {
        $parts = $this->db->get('parts');

        return array_map(static function ($part) {
            return new Part(
                $part['id'],
                $part['user_id'],
                $part['book_id'],
                $part['title'],
                $part['body'],
                $part['is_visible'],
                $part['deleted_at'],
                $part['created_at'],
                $part['updated_at'],

            );
        }, $parts);
    }

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