<?php

interface UserRepository
{
    public function getById(int $id): ?object;
    public function getByUsername(string $username): ?object;
    public function insert(string $username, string $email, string $password): bool;
}
