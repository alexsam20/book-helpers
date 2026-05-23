<?php

namespace App\Services;

use App\Models\Post;
use Core\DataBase\DatabaseInterface;

class PostService
{
    private string $table = 'posts';

    public function __construct(
        private readonly DatabaseInterface $db,
    ) { }

    public function all(): array
    {
        $posts = $this->db->get($this->table, [], ['id' => 'DESC']);

        return array_map(static function ($post) {
            return new Post(
                $post['id'],
                $post['user_id'],
                $post['title'],
                $post['body'],
                $post['is_visible'],
                $post['deleted_at'],
                $post['created_at'],
                $post['updated_at'],
            );
        }, $posts);
    }

    public function store(int $id, string $title, string $body): false|int
    {
        return $this->db->insert($this->table, [
            'user_id' => $id,
            'title' => $title,
            'body' => $body,
        ]);
    }
}