<?php

namespace App\Models;

class Listing
{
    public function __construct(
        private readonly int $id,
        private readonly int $book_id,
        private readonly int $part_id,
        private readonly string $type,
        private readonly string $theme,
        private readonly string $description,
        private readonly string $source,
        private readonly int $is_executable,
        private readonly int $is_visible,
        private readonly ?string $deleted_at,
        private readonly string $created_at,
        private readonly string $updated_at
    ){}

    public function id(): int
    {
        return $this->id;
    }

    public function bookId(): int
    {
        return $this->book_id;
    }

    public function partId(): int
    {
        return $this->part_id;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function theme(): string
    {
        return $this->theme;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function source(): string
    {
        return $this->source;
    }

    public function isExecutable(): int
    {
        return $this->is_executable;
    }

    public function isVisible(): int
    {
        return $this->is_visible;
    }

    public function deletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function createdAt(): string
    {
        return $this->created_at;
    }

    public function updatedAt(): string
    {
        return $this->updated_at;
    }
}