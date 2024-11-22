<?php

session_start();

require_once (__DIR__ . '/src/Facades/Auth.php');
require_once (__DIR__ . '/src/Facades/AdminAuth.php');
require_once (__DIR__ . '/src/Facades/Route.php');

if (!Auth::isLogged()) {
    Route::redirect('info.php');
}

if ($_SESSION['is_admin'] == true) {
    AdminAuth::logout();
    Route::redirect('info.php');
} else {
    Auth::logout();
    Route::redirect('index.php');
}
