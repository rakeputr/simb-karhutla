<?php
require_once (__DIR__ . "/src/Facades/authentication.php");

if (isset($_POST["register"])) {
    $result = register($_POST);
    if ($result) {
        echo "<script>
        alert('Sign up berhasil.');
        document.location.href = 'loginNew.php';
        </script>";
    }
}

if (isLogged()) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Pantau Api</title>
  <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  width: 100%;
  padding: 0 10px;
  background: url("images/bg.jpg") no-repeat center center/cover, #000;
}

.wrapper {
  width: 400px;
  border-radius: 8px;
  padding: 30px;
  text-align: center;
  background: rgba(0, 0, 0, 0.5); /* Latar belakang transparan */
  border: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(9px);
  -webkit-backdrop-filter: blur(9px);
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #fff;
}

p {
  font-size: 0.9rem;
  color: #fff;
}

.input-field {
  position: relative;
  border-bottom: 2px solid #ccc;
  margin: 15px 0;
}

.input-field label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  color: #fff;
  font-size: 16px;
  pointer-events: none;
  transition: 0.15s ease;
}

.input-field input {
  width: 100%;
  height: 40px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 16px;
  color: #fff;
}

.input-field input:focus ~ label,
.input-field input:valid ~ label {
  font-size: 0.8rem;
  top: 10px;
  transform: translateY(-120%);
}

.wrapper a {
  color: #efefef;
  text-decoration: none;
}

.wrapper a:hover {
  text-decoration: underline;
}

button {
  background: #fff;
  color: #000;
  font-weight: 600;
  border: none;
  padding: 12px 20px;
  cursor: pointer;
  border-radius: 3px;
  font-size: 16px;
  border: 2px solid transparent;
  transition: 0.3s ease;
}

button:hover {
  color: #fff;
  border-color: #fff;
  background: rgba(255, 255, 255, 0.15);
}

.register {
  text-align: center;
  margin-top: 30px;
  color: #fff;
}

  </style>
</head>

<body>
  <div class="wrapper">
    <form id="registerForm" method="post" action="">
      <h2>Sign Up</h2>
      <p>Buat akun dan laporkan kebakaran</p>
      <div class="input-field">
        <input type="text" id="name" name="name" required>
        <label>Name</label>
      </div>
      <div class="input-field">
        <input type="text" id="username" name="username" required>
        <label>Username</label>
      </div>
      <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label>Email Address</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="input-field">
        <input type="password" id="confirmpassword" name="confirmpassword" required>
        <label>Confirm Password</label>
      </div>
      <button type="submit" name="register" id="register">Sign Up</button>

      <div class="register">
        <p>Already have an account? <a href="loginNew.php">Sign In</a></p>
      </div>
    </form>
  </div>
</body>

</html>