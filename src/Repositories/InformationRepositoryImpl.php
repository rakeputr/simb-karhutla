<?php

require_once (__DIR__ . '/InformationRepository.php');
require_once (__DIR__ . '/../Facades/Connection.php');

class InformationRepositoryImpl implements InformationRepository
{
    public function getAll(): array
    {
        $connection = Connection::getInstance();

        $query = 'SELECT * FROM information ORDER BY date_occured DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function getVerified(): array
    {
        $connection = Connection::getInstance();
        $query = 'SELECT * FROM information WHERE verified_at IS NOT NULL ORDER BY date_occured DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function getNotVerified(): array
    {
        $connection = Connection::getInstance();
        $query = 'SELECT * FROM information WHERE verified_at IS NULL ORDER BY date_occured DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function setVerifiedById(int $id, int $admin_id): bool
    {
        $connection = Connection::getInstance();
        $query = 'UPDATE information SET verified_at = NOW(), admin_verifies_id = ? WHERE id= ?';

        $stmt = $connection->prepare($query);

        $stmt->execute([$admin_id, $id]);

        return $stmt->rowCount() ? true : false;
    }

    public function insert(int $userId, string $dateOccured, string $place, string $chronology): bool
    {
        $connection = Connection::getInstance();

        $query = 'INSERT INTO information(user_id, date_occured, place, chronology) VALUE (?, ?, ?, ?)';

        $stmt = $connection->prepare($query);

        $stmt->execute([$userId, $dateOccured, $place, $chronology]);

        return $stmt->rowCount();
    }
}
