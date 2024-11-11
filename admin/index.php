<?php

session_start();

require_once (__DIR__ . '/../src/Facades/Route.php');
require_once (__DIR__ . '/../src/Facades/FlashSession.php');
require_once (__DIR__ . '/../src/Facades/AdminAuth.php');
require_once (__DIR__ . '/../src/Repositories/UserAdminRepositoryImpl.php');

if (AdminAuth::isLogged()) {
    Route::redirect('admin/dashboard.php');
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (AdminAuth::login($_REQUEST['username'], $_REQUEST['password'])) {
        Route::redirect('admin/dashboard.php');
    }

    FlashSession::set('Username atau password tidak valid');
    Route::redirect('admin/');
}

include (__DIR__ . '/../src/Templates/header.php');
?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login Admin</h5>
            <?php if (FlashSession::isAny()): ?>
              <p class="text-center"><?= FlashSession::get() ?></p>
            <?php endif; ?>
            <form method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="username" name="username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold py-3" type="submit">Sign
                  in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include (__DIR__ . '/../src/Templates/header.php');
?>
