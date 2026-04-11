<?php

namespace App\Services;

use App\Models\Book;
use Core\DataBase\DatabaseInterface;

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
        $books = $this->db->get('books', ['is_visible' => 1]);

        return array_map(static function ($book) {
            return new Book(
                $book['id'],
                $book['user_id'],
                $book['name'],
                $book['author'],
                $book['description'],
                $book['image'],
                $book['is_visible'],
                $book['deleted_at'],
                $book['created_at'],
                $book['updated_at'],
            );
        }, $books);
    }
}