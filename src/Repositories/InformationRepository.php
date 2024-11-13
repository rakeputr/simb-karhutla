<?php

interface InformationRepository
{
    public function getAll(): array;

    public function getNotVerified(): array;

    public function getVerified(): array;

    public function setVerifiedById(int $id, int $admin_id): bool;

    public function insert(int $userId, string $dateOccured, string $place, string $chronology): bool;
}
