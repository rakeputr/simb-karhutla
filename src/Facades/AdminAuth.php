<?php

require_once (__DIR__ . '/Connection.php');
require_once (__DIR__ . '/Route.php');
require_once (__DIR__ . '/../Repositories/UserAdminRepositoryImpl.php');

class AdminAuth
{
    public static function getLoggedUser(): ?object
    {
        if (!self::isLogged()) {
            return null;
        }

        $userRepository = new UserAdminRepositoryImpl();

        return $userRepository->getById($_SESSION['user_id']);
    }

    public static function login(string $username, string $password): bool
    {
        if (self::isLogged()) {
            Route::redirect('');
        }
        $userRepository = new UserAdminRepositoryImpl();

        $user = $userRepository->getByUsername($username);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
            return false;
        }

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['is_admin'] = true;

        return true;
    }

    public static function register(string $username, string $email, string $password): bool
    {
        if (self::isLogged()) {
            Route::redirect('');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $userRepository = new UserAdminRepositoryImpl();

        return $userRepository->insert($username, $email, $password);
    }

    public static function isLogged(): bool
    {
        if (!isset($_SESSION['is_admin'])) {
            return false;
        }

        return $_SESSION['is_admin'];
    }

    public static function logout(): bool
    {
        if (!self::isLogged()) {
            return false;
        }

        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        unset($_SESSION['is_admin']);

        return true;
    }
}
