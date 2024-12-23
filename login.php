<?php

session_start();

require_once (__DIR__ . "/src/Facades/authentication.php");
if (isLogged()) {
  header("Location:index.php");
}


if (isset($_POST["login"])) {
  $result = loginAttempt($_POST);
  if ($result) {
    header("Location:index.php");
  }
}

if (isset($_GET['message'])) {
  if ($_GET['message'] == "not_admin") {
    ?>
    <script>
      alert('Hanya Admin yang bisa mengakses halaman admin!')
    </script>
    <?php
  } elseif ($_GET['message'] == "login_admin") {
    ?>
    <script>
      alert('Silahkan login untuk mengakses halaman admin!')
    </script>
    <?php
  } elseif ($_GET['message'] == "belum_login") {
    ?>
    <script>
      alert('Silahkan login untuk membuat pelaporan!')
    </script>
    <?php
  } 
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pantau Api</title>
  <link rel="stylesheet" href="auth_assets/css/styles.min.css" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="auth_assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Laporkan kebakaran yang terjadi</p>
                <form id="loginForm" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input  type="text" id="username" name="username"  class="form-control">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" >
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this Device
                      </label>
                    </div>
                  </div>
                  <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="login">Login</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
                    <a class="text-primary fw-bold ms-2" href="./register.php">Buat Akun</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="auth_assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="auth_assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

