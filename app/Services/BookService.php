<?php

namespace App\Services;

use App\Models\Book;
use Core\DataBase\DatabaseInterface;
use Core\Storage\Storage;
use Core\Upload\UploadedFileInterface;

class BookService
{
    private string $table = 'books';

    public function __construct(
        private readonly DatabaseInterface $db,
    ) { }

    /**
     * @return array<Book>
     */
    public function all(): array
    {
        $books = $this->db->get($this->table, [], ['id' => 'DESC']);

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

    public function destroy(int $id): void
    {
        $oldFile = ($this->find($id))->image();

        if (!empty($oldFile)) {
            $storage = new Storage();
            $storage->trash('books/'. $oldFile);
        }

        $this->db->delete($this->table, [
            'id' => $id,
        ]);
    }

    public function store(int $id, string $name, string $author, string $description, UploadedFileInterface $image, int $year): false|int
    {
        $filePath = $image->move('books');

        return $this->db->insert($this->table, [
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
        $book = $this->db->first($this->table, ['id' => $id]);

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

    public function update(int $id, string $name, string $author, string $description, UploadedFileInterface $image, int $year): void
    {
        $oldFile = ($this->find($id))->image();

        if (!empty($oldFile) && $image->error !== 4) {
            $storage = new Storage();
            $storage->trash('books/'. $oldFile);
        }

        $data = [
            'name' => $name,
            'author' => $author,
            'description' => $description,
            'year' => $year,
        ];

        if ($image->hasError()) {
            $filePath = $image->move('books');
            $data['image'] = $filePath;
        }

        $this->db->update($this->table, $data, ['id' => $id]);
    }


}