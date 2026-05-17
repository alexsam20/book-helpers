<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Listing;
use App\Models\Part;
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
                $book['media'],
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

    public function remove(int $id): void
    {
        $this->db->remove($this->table, 'deleted_at', ['id' => $id]);

        $partService = new PartService($this->db);
        /** @var Part $part */
        $parts = $partService->all($id, 'book_id');

        if (count($parts) > 0) {
            $this->db->remove('parts', 'deleted_at', ['book_id' => $id]);
        }

        $listingService = new ListingService($this->db);
        /** @var Listing $codes */
        $codes = $listingService->all($id, 'book_id');

        if (count($codes) > 0) {
            $this->db->remove('codes', 'deleted_at', ['book_id' => $id]);
        }
    }

    public function store(int $id, string $name, string $author, string $media, string $description, UploadedFileInterface $image, int $year): false|int
    {
        $filePath = $image->move('books');

        return $this->db->insert($this->table, [
            'user_id' => $id,
            'name' => $name,
            'author' => $author,
            'media' => $media,
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
            $book['media'],
            $book['description'],
            $book['image'],
            $book['year'],
            $book['is_visible'],
            $book['deleted_at'],
            $book['created_at'],
            $book['updated_at'],
        );
    }

    public function update(int $id, string $name, string $author, string $media, string $description, ?UploadedFileInterface $image, int $year): void
    {
        $oldFile = ($this->find($id))->image();

        if (!empty($oldFile) && $image->error !== 4) {
            $storage = new Storage();
            $storage->trash('books/'. $oldFile);
        }

        $data = [
            'name' => $name,
            'author' => $author,
            'media' => $media,
            'description' => $description,
            'year' => $year,
        ];

        if ($image->hasError()) {
            $filePath = $image->move('books');
            $data['image'] = $filePath;
        }

        $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function updateVisibility(int $id): void
    {
        $record = $this->db->first($this->table, ['id' => $id])['is_visible'];

        $this->db->update($this->table, ['is_visible' => $record ^ 1], ['id' => $id]);
    }
}