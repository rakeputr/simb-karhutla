<?php

session_start();

require_once(__DIR__ . '/../src/Facades/Auth.php');
require_once(__DIR__ . '/../src/Facades/Route.php');
require_once(__DIR__ . '/../src/Facades/FlashSession.php');

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  if (Auth::login($username, $password)) {
    Route::redirect('info.php');
  } else {
    FlashSession::set('Login gagal, username atau password tidak valid');
    Route::redirect('login.php');
  }
}

if (Auth::isLogged()) {
  Route::redirect('info.php');
}

?>

<?php include(__DIR__ . '/../src/Templates/header.php') ?>

<main>
  <?php if (FlashSession::isAny()): ?>
    <p><?= FlashSession::get() ?></p>
  <?php endif ?>
  <form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" />

    <button type="submit">Login</button>
  </form>
</main>

<?php
include(__DIR__ . '/../src/Templates/footer.php');
FlashSession::reset();
?>
