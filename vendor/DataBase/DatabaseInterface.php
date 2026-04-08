<?php

namespace Core\DataBase;

interface DatabaseInterface
{
    public function insert(string $table, array $data): int|false;
}