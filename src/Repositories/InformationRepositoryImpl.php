<?php

require_once (__DIR__ . '/InformationRepository.php');
require_once (__DIR__ . '/../Facades/Connection.php');

class InformationRepositoryImpl implements InformationRepository
{
    public function getAll(): array
    {
        $connection = Connection::getInstance();

        $query = 'SELECT * FROM information ORDER BY tgl_kejadian DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function getVerified(): array
    {
        $connection = Connection::getInstance();
        $query = 'SELECT * FROM information WHERE verified_at IS NOT NULL ORDER BY tgl_kejadian DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function getNotVerified(): array
    {
        $connection = Connection::getInstance();
        $query = 'SELECT * FROM information WHERE verified_at IS NULL ORDER BY tgl_kejadian DESC';

        return $connection->query($query)->fetchAll(PDO::FETCH_CLASS);
    }

    public function setVerifiedById(int $id, int $admin_id): bool
    {
        $connection = Connection::getInstance();
        $query = 'UPDATE information SET verified_at = NOW(), verified_by = ? WHERE id = ?';

        $stmt = $connection->prepare($query);

        $stmt->execute([$admin_id, $id]);

        return $stmt->rowCount() > 0;
    }

    public function insert(int $userId, string $tglKejadian, string $tempat, string $provinsi, string $koordinat, string $kronologi): bool
    {
        $connection = Connection::getInstance();

        $query = 'INSERT INTO information(user_id, tgl_kejadian, tempat, provinsi, koordinat, kronologi, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, NOW())';

        $stmt = $connection->prepare($query);

        $stmt->execute([$userId, $tglKejadian, $tempat, $provinsi, $koordinat, $kronologi]);

        return $stmt->rowCount() > 0;
    }
}
