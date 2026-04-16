<?php

namespace App\Services;

use App\Models\Book;
use Core\DataBase\DatabaseInterface;
use Core\Upload\UploadedFileInterface;

class BookService
{
    public function __construct(
        private readonly DatabaseInterface $db
    ) { }

    /**
     * @return array<Book>
     */
    public function all(): array
    {
        $books = $this->db->get('books');

        return array_map(static function ($book) {
            return new Book(
                $book['id'],
                $book['user_id'],
                $book['name'],
                $book['author'],
                $book['description'],
                $book['image'],
                $book['year'],
                $book['is_visible'],
                $book['deleted_at'],
                $book['created_at'],
                $book['updated_at'],
            );
        }, $books);
    }

    public function delete(int $id): void
    {
        $this->db->delete('books', [
            'id' => $id,
        ]);
    }

    public function store(int $id, string $name, string $author, string $description, UploadedFileInterface $image, int $year): false|int
    {
        $filePath = $image->move('books');

        return $this->db->insert('books', [
            'user_id' => $id,
            'name' => $name,
            'author' => $author,
            'description' => $description,
            'image' => $filePath,
            'year' => $year,
        ]);
    }

    public function find(int $id): ?Book
    {
        $book = $this->db->first('books', ['id' => $id]);

        if (!$book) {
            return null;
        }

        return new Book(
            $book['id'],
            $book['user_id'],
            $book['name'],
            $book['author'],
            $book['description'],
            $book['image'],
            $book['year'],
            $book['is_visible'],
            $book['deleted_at'],
            $book['created_at'],
            $book['updated_at'],
        );
    }

    public function update(int $id, string $name, string $author, string $description, $year): void
    {
        $data = [
            'name' => $name,
            'author' => $author,
            'description' => $description,
            'year' => $year,
        ];

        $this->db->update('books', $data, ['id' => $id]);
    }
}