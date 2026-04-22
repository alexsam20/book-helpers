<?php

namespace App\Services;

use App\Models\Listing;
use Core\Config\Config;
use Core\Config\ConfigInterface;
use Core\DataBase\DatabaseInterface;

class ListingService
{
    private string $table = 'codes';

    public function __construct(
        private readonly DatabaseInterface $db,
    ) { }

    /**
     * @return array<Listing>
     */
    public function all(int $id, string $field = 'id'): array
    {
        $books = $this->db->get($this->table, [$field => $id]);

        return array_map(static function ($book) {
            return new Listing(
                $book['id'],
                $book['book_id'],
                $book['part_id'],
                $book['type'],
                $book['theme'],
                $book['description'],
                $book['source'],
                $book['is_executable'],
                $book['is_visible'],
                $book['deleted_at'],
                $book['created_at'],
                $book['updated_at'],
            );
        }, $books);
    }

    public function store(int $book, int $part, string $type, string $theme, string $source, ?string $description, int $run = 0): false|int
    {
        return $this->db->insert($this->table, [
            'book_id' => $book,
            'part_id' => $part,
            'type' => $type,
            'theme' => $theme,
            'description' => $description,
            'source' => $source,
            'is_executable' => $run,
        ]);
    }


    public function getThemeCode(): array
    {
        $files = scandir(ROOT_PATH . '/themes/');
        $theme = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                if (preg_match('#^prism-(.*)\.min\.css$#m', $file)) {
                    $theme[] = rtrim(substr($file, 6), 'min.css');
                }
            }
        }

        return $theme;
    }

    public function language(): ?array
    {
        return new Config()->all('languages');
    }
}