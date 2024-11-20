<?php
require_once (__DIR__ . "/src/Facades/authentication.php");


if (isset($_POST["register"])) {
  $result = register($_POST);
  if ($result) {
    echo "<script>
    alert('Sign up berhasil.');
    document.location.href = 'login.php';
    </script>";
  }
}

if (isLogged()) {
  header("Location:index.php");
}


?>

<!--<main>
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
</main> -->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="auth_assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="auth_assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
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
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" d="password" name="password" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                  </div>
                  <!-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a> -->
                  <button type="submit" name="register" id="register" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
      
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
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