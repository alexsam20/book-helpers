<?php

namespace App\Services;

use App\Models\Listing;
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
    public function all(int $id, string $field = 'id', int $visible = 0): array
    {
        $conditions = [$field => $id];
        if ($visible > 0) {
            $conditions = [$field => $id, 'is_visible' => 1];
        }
        $parts = $this->db->get($this->table, $conditions);

        foreach ($parts as $key => $value) {
            $parts[$key]['code']  = $this->getListing($value['id']);
        }

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
                $part['code'],
            );
        }, $parts);
    }

    public function destroy(int $id): void
    {
        $this->db->delete($this->table, [
            'id' => $id,
        ]);
    }

    public function remove(int $id): void
    {
        $this->db->remove($this->table, 'deleted_at', ['id' => $id]);

        $listingService = new ListingService($this->db);
        $codes = $listingService->all($id, 'part_id');

        if (count($codes) > 0) {
            $this->db->remove('codes', 'deleted_at', ['part_id' => $id]);
        }
    }

    public function find(int $id, string $field = 'id'): ?Part
    {
        $part = $this->db->first($this->table, [$field => $id]);

        $codeBlocks = $this->db->get('codes', ['part_id' => $id]);
        /*var_dump($codeBlocks); die();*/

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
            $this->getListing($id)
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

    private function getListing(int $id): array
    {
        $codeBlocks = $this->db->get('codes', ['part_id' => $id]);

        return array_map(static function ($code) {
            return new Listing(
                $code['id'],
                $code['book_id'],
                $code['part_id'],
                $code['mode'],
                $code['theme'],
                $code['description'],
                $code['source'],
                $code['is_executable'],
                $code['is_visible'],
                $code['deleted_at'],
                $code['created_at'],
                $code['updated_at'],
            );
        }, $codeBlocks);
    }

    public function updateVisibility(int $id): void
    {
        $record = $this->db->first($this->table, ['id' => $id])['is_visible'];

        $this->db->update($this->table, ['is_visible' => $record ^ 1], ['id' => $id]);
    }
}