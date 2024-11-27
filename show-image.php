<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "simb-karhutla";
$conn = new mysqli($host, $user, $password, $database);

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan picture
$sql = "SELECT picture FROM news WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($picture);
$stmt->fetch();

if ($picture) {
    header("Content-Type: image/jpeg"); // Sesuaikan jenis file picture (image/jpeg, image/png, dll.)
    echo $picture;
} else {
    echo "picture tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>
