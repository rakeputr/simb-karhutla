<?php

session_start();

require_once (__DIR__ . '/../src/Facades/Route.php');
require_once (__DIR__ . '/../src/Facades/FlashSession.php');
require_once (__DIR__ . '/../src/Facades/AdminAuth.php');
require_once (__DIR__ . '/../src/Repositories/UserAdminRepositoryImpl.php');
require_once (__DIR__ . '/../src/Repositories/InformationRepositoryImpl.php');

if (!AdminAuth::isLogged()) {
    Route::redirect('admin/');
}

$informationRepository = new InformationRepositoryImpl();
$adminRepository = new UserAdminRepositoryImpl();

$user = AdminAuth::getLoggedUser();
if ($informationRepository->setVerifiedById($_GET['id'], $user->id)) {
    FlashSession::set('Berhasil verifikasi');
} else {
    FlashSession::set('Gagal verifikasi');
}

Route::redirect('admin/dashboard.php');
