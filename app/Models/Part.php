<?php

namespace App\Models;

class Part
{
    public function __construct(
        private readonly int       $id,
        private readonly int       $user_id,
        private readonly int       $book_id,
        private readonly string    $title,
        private readonly string    $body,
        private readonly int       $is_visible,
        private readonly ?string   $deletedAt,
        private readonly string    $createdAt,
        private readonly string    $updatedAt,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->user_id;
    }

    public function bookId(): int
    {
        return $this->book_id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function isVisible(): int
    {
        return $this->is_visible;
    }

    public function deletedAt(): ?string
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