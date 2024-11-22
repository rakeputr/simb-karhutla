<?php
session_start();
require_once (__DIR__ . '/../src/Facades/authentication.php'); 
require_once (__DIR__ . '/../src/Facades/Connection.php'); 
require_once (__DIR__ . '/../src/Facades/Route.php'); 

if (!isLogged()) {
    header("Location: ../login.php?message=login_admin");
    exit();
  } else {
    if (!isAdmin()) {
      header("Location: ../index.php?message=not_admin");
      exit();
    }
  }
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    if (!empty($id) && $status != '') {
        try {
            // Koneksi ke database
            $connection = Connection::getInstance();

            // Query untuk mengupdate status berita
            $query = "UPDATE information SET status = :status WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);

            // $errorInfo = $stmt->errorInfo();

            // Eksekusi query
            if ($stmt->execute()) {
                echo "<script>alert('Status berhasil diperbarui!'); window.location.href='dashboard.php';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui status!'); window.history.back();</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Data tidak lengkap!'); window.history.back(); </script>";
    }
}
?>
