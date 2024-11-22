<?php

require_once (__DIR__ . '/UserRepository.php');
require_once (__DIR__ . '/../Facades/Connection.php');

class UserRepositoryImpl implements UserRepository
{
    public function getById(int $id): ?object
    {
        $connection = Connection::getInstance();
        return $connection->query('SELECT id, username, email FROM user WHERE id=' . $id)->fetchObject();
    }

    public function getByUsername(string $username): ?object
    {
        $connection = Connection::getInstance();

        $query = 'SELECT * FROM user WHERE username = ?';

        $stmt = $connection->prepare($query);

        $stmt->execute([$username]);

        return $stmt->fetchObject();
    }

    public function insert(string $username, string $email, string $password): bool
    {
        $connection = Connection::getInstance();
        $query = 'INSERT INTO user(username, email, password) VALUE (?, ?, ?)';
        $stmt = $connection->prepare($query);
        $stmt->execute([$username, $email, $password]);

        return ($stmt->rowCount()) ? true : false;
    }
}
