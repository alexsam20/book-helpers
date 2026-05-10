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
                $book['mode'],
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

    public function store(int $book, int $part, string $type, string $theme, ?string $description, string $source, int $run = 0, int $visible = 1): false|int
    {
        return $this->db->insert($this->table, [
            'book_id' => $book,
            'part_id' => $part,
            'mode' => $type,
            'theme' => $theme,
            'description' => $description,
            'source' => $source,
            'is_executable' => $run,
            'is_visible' => $visible,
        ]);
    }

    public function update(int $id, string $language, string $theme, string $description, string $code, int $executable, int $visible): void
    {
        $data = [
            'mode' => $language,
            'theme' => $theme,
            'description' => $description,
            'source' => $code,
            'is_executable' => $executable,
            'is_visible' => $visible,
        ];

        $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function destroy(int $id): void
    {
        $this->db->delete($this->table, [
            'id' => $id,
        ]);
    }

    public function getThemeCode(): array
    {
        $files = scandir(ROOT_PATH . '/assets/ace/');
        $theme = [];

        if (!empty($files)) {
            foreach ($files as $file) {
                if (preg_match('#^theme-(.*)\.js$#m', $file)) {
                    $key = substr(pathinfo($file, PATHINFO_FILENAME), 6);
                    $value = str_replace('_', ' ', $key);
                    $theme[$key] = ucwords($value);
                }
            }
        }

        return $theme;
    }

    // Not Use
    public function getModeCode(): array
    {
        $files = scandir(ROOT_PATH . '/assets/ace/');
        $mode = [];

        if (!empty($files)) {
            foreach ($files as $file) {
                if (preg_match('#^mode-(.*)\.js$#m', $file)) {
                    $key = substr(pathinfo($file, PATHINFO_FILENAME), 5);
                    $value = str_replace('_', ' ', $key);
                    $mode[$key] = ucwords($value);
                }
            }
        }

        return $mode;
    }

    public function language(): ?array
    {
        return new Config()->all('languages');
    }
}