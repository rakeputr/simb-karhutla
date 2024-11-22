<?php

require_once (__DIR__ . '/UserRepository.php');
require_once (__DIR__ . '/../Facades/Connection.php');

class UserAdminRepositoryImpl implements UserRepository
{
    public function getById(int $id): ?object
    {
        $connection = Connection::getInstance();
        return $connection->query('SELECT id, username, email FROM user WHERE is_admin=TRUE AND id=' . $id)->fetchObject();
    }

    public function getByUsername(string $username): ?object
    {
        $connection = Connection::getInstance();

        $query = 'SELECT * FROM user WHERE is_admin=TRUE AND username = ?';

        $stmt = $connection->prepare($query);

        $stmt->execute([$username]);

        if ($user = $stmt->fetchObject()) {
            return $user;
        }

        return null;
    }

    public function insert(string $username, string $email, string $password): bool
    {
        $connection = Connection::getInstance();
        $query = 'INSERT INTO user(username, email, password, is_admin) VALUE (?, ?, ?, TRUE)';
        $stmt = $connection->prepare($query);
        $stmt->execute([$username, $email, $password]);

        return ($stmt->rowCount()) ? true : false;
    }
}
