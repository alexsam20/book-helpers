<?php

namespace App\Services;

use App\Models\Part;
use Core\DataBase\DatabaseInterface;

class PartService
{
    private string $table = 'parts';

    public function __construct(
        private readonly DatabaseInterface $db
    ) { }

    /**
     * @return array<Part>
     */
    public function all(int $id, string $field = 'id'): array
    {
        $parts = $this->db->get($this->table, [$field => $id]);

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

    public function destroy(int $id): void
    {
        $this->db->delete($this->table, [
            'id' => $id,
        ]);
    }

    public function find(int $id, string $field = 'id'): ?Part
    {
        $part = $this->db->first($this->table, [$field => $id]);

        if (!$part) {
            return null;
        }

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
    }

    public function store(int $id, int $book, string $title, string $body): false|int
    {
        return $this->db->insert($this->table, [
            'user_id' => $id,
            'book_id' => $book,
            'title' => $title,
            'body' => $body,
        ]);
    }

    public function update(int $id, string $title, string $body): void
    {
        $data = [
            'title' => $title,
            'body' => $body,
        ];

        $this->db->update($this->table, $data, ['id' => $id]);
    }
}