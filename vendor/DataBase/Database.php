<?php

namespace Core\DataBase;

use Core\Config\ConfigInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct(private readonly ConfigInterface $config)
    {
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        $fields = array_keys($data);
        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(static fn(string $field) => ":$field", $fields));

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $columns, $binds);

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($data);
        } catch (\PDOException $e) {
            return false;
        }

        return (int) $this->pdo->lastInsertId();
    }

    public function first(string $table, array $conditions = []): ?array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE ' . implode(' AND ', array_map(static fn(string $field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = sprintf("SELECT * FROM %s %s LIMIT 1", $table, $where);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);

        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public function get(string $table, array $conditions = []): array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE ' . implode(' AND ', array_map(static fn(string $field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = sprintf("SELECT * FROM %s %s AND deleted_at IS NULL", $table, $where);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);

        return $stmt->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function delete(string $table, array $conditions = []): void
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE ' . implode(' AND ', array_map(static fn(string $field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = sprintf("DELETE FROM %s %s", $table, $where);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);
    }

    public function update(string $table, array $data, array $conditions = []): void
    {
        $fields = array_keys($data);
        $set = implode(', ', array_map(static fn(string $field) => "$field = :$field", $fields));
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE ' . implode(' AND ', array_map(static fn(string $field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = sprintf("UPDATE %s SET %s %s", $table, $set, $where);

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array_merge($data, $conditions));
    }

    private function connect(): void
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try {
            $this->pdo = new \PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (\PDOException $exception) {
            exit("Database connection failed: {$exception->getMessage()}");
        }
    }
}
