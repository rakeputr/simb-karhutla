<?php
// mengambil fungsi koneksi dari connection
require_once (__DIR__ . "/Connection.php");
// require_once (__DIR__ . "/functions.php");

function register($formData)
{
    $connection = Connection::getInstance();

    $name = $formData["name"];
    $username = strtolower(stripslashes($formData["username"]));
    $email = strtolower($formData["email"]);
    $password = $formData["password"];
    $confirmpassword = $formData["confirmpassword"];

    // cek udah ada yg make belom usernamenya
    $stmt = $connection->prepare("SELECT username FROM user WHERE username = :username");
    $stmt->execute(['username' => $username]);
    if ($stmt->fetch()) {
        echo "<script>
        alert('Login gagal. Username tidak tersedia.');
        </script>";
        return false;
    }

    // kalo password & confirm nggak sama
    if ($password != $confirmpassword) {
        echo "<script>
        alert('Login gagal. Password salah!');
        </script>";
        return false;
    }

    // enkripsi password pake password hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $stmt = $connection->prepare(
        "INSERT INTO user (username, name, email, password, is_admin) VALUES (:username, :name, :email, :password, :is_admin)"
    );
    $stmt->execute([
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'is_admin' => 0, // Default role
    ]);

    return $stmt->rowCount() > 0;
}


function loginAttempt($formData)
{
    $connection = Connection::getInstance();

    $username = strtolower($formData["username"]);
    $password = $formData["password"];

    $stmt = $connection->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $username]);

    // Hitung jumlah hasil query
    $userData = $stmt->fetch(PDO::FETCH_OBJ);
    if (!$userData) {
        $messageError = 'Login gagal. Username tidak ditemukan.';
        echo "<script>alert('" . addslashes($messageError) . "');</script>";
        return false;
    }

    // Verifikasi password
    if (!password_verify($password, $userData->password)) {
        $message = 'Login gagal. Password salah.';
        echo "<script>alert('" . addslashes($message) . "');</script>";
        return false;
    }

    // Simpan informasi user ke session
    $_SESSION['id'] = $userData->id;
    $_SESSION['username'] = $userData->username;
    $_SESSION['login'] = true;

    return true;
}

function getLoggedUser()
{
    if (!isLogged()) {
        return null;
    }

    $connection = Connection::getInstance();
    $stmt = $connection->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->execute(['id' => $_SESSION['id']]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function isLogged()
{
  if (isset($_SESSION['login'])) {
    return true;
  }
  return false;
}

function isAdmin()
{
    $connection = Connection::getInstance();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Query ke database
        $result = $connection->query("SELECT * FROM user WHERE username = '$username'");

        // Ambil data sebagai objek
        $userData = $result->fetch(PDO::FETCH_OBJ);

        // Periksa apakah user adalah admin
        if ($userData && $userData->is_admin === 1) {
            return true;
        }
    }
    return false;
}


function logout(): void
{
  session_destroy();
}
?>