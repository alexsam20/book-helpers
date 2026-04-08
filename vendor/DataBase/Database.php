<?php

namespace Core\DataBase;

use Core\DataBase\DatabaseInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        // TODO: Implement insert() method.
    }

    private function connect(): void
    {

        $this->pdo = new \Pdo('mysql:host=localhost;port=3306;dbname=books;charset=utf8',
            'alex',
            'alex1970MD3214');
    }
}