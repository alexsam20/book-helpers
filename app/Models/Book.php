<?php

namespace App\Models;

class Book
{
    public function __construct(
        private readonly int       $id,
        private readonly int       $user_id,
        private readonly string    $name,
        private readonly string    $author,
        private readonly string    $description,
        private readonly ?string   $image,
        private readonly int       $is_visible,
        private readonly ?string   $deletedAt,
        private readonly string    $createdAt,
        private readonly string    $updatedAt,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->user_id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function author(): string
    {
        return $this->author;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function image(): ?string
    {
        return $this->image;
    }

    public function isVisible(): int
    {
        return $this->is_visible;
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