<?php

namespace App\Services;

use App\Models\Post;
use Core\Auth\User;
use Core\DataBase\DatabaseInterface;

class PostService
{
    private string $table = 'posts';

    public function __construct(
        private readonly DatabaseInterface $db,
    ) { }

    public function all(int $visible = 0): array
    {
        $conditions = [];
        if ($visible > 0) {
            $conditions = ['is_visible' => 1];
        }
        $posts = $this->db->get($this->table, $conditions, ['id' => 'DESC']);

        foreach ($posts as $key => $value) {
            $posts[$key]['user'] = $this->getUser($value['user_id']);
        }

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
                $post['user'],
            );
        }, $posts);
    }

    public function find(?int $id): ?Post
    {
        $post = $this->db->first($this->table, ['id' => $id]);

        if (!$post) {
            return null;
        }

        $post['user'] = $this->getUser($post['user_id']);

        return new Post(
            $post['id'],
            $post['user_id'],
            $post['title'],
            $post['body'],
            $post['is_visible'],
            $post['deleted_at'],
            $post['created_at'],
            $post['updated_at'],
            $post['user'],
        );
    }

    public function update(int $id, string $title, string $body): void
    {
        $data = [
            'title' => $title,
            'body' => $body,
        ];

        $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function remove(int $id): void
    {
        $this->db->remove($this->table, 'deleted_at', ['id' => $id]);
    }

    public function updateVisibility(int $id): void
    {
        $record = $this->db->first($this->table, ['id' => $id])['is_visible'];

        $this->db->update($this->table, ['is_visible' => $record ^ 1], ['id' => $id]);
    }

    private function getUser(int $id): array
    {
        return $this->db->first('users', ['id' => $id]);
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