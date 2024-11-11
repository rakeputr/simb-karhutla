<?php

session_start();

require_once(__DIR__ . '/../src/Facades/Auth.php');
require_once(__DIR__ . '/../src/Facades/Route.php');
require_once(__DIR__ . '/../src/Facades/FlashSession.php');

Auth::logout();

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
  $username = $_REQUEST['username'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  if (Auth::register($username, $email, $password)) {
    FlashSession::set('Register Berhasil');
  } else {
    FlashSession::set('Register Gagal');
  }

  Route::redirect('login.php');
}

if (Auth::isLogged()) {
  Route::redirect('info.php');
}

?>

<?php include(__DIR__ . '/../src/Templates/header.php') ?>

<main>
  <form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" />
    <label for="email">Email</label>
    <input type="text" id="email" name="email" />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" />
    <label for="confirm_password">Konfirmasi Password</label>
    <input type="password" id="confirm_password" name="confirm_password" />

    <button type="submit">Register</button>
  </form>
</main>

<?php include(__DIR__ . '/../src/Templates/footer.php') ?>
