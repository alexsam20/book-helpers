<?php

namespace App\Models;

class Post
{
    public function __construct(
        private readonly int $id,
        private readonly int $user_id,
        private readonly string $title,
        private readonly string $body,
        private readonly ?string $deletedAt,
        private readonly string $createdAt,
        private readonly string $updatedAt,
    ){}

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->user_id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function deletedAt(): string
    {
        return $this->deletedAt;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function updatedAt(): string
    {
        return $this->updatedAt;
    }
}