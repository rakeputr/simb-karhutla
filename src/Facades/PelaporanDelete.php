<?php
session_start();
require_once 'Connection.php'; // Koneksi database

// Mendapatkan ID berita yang akan dihapus
if (isset($_GET['id']) ) {
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Koneksi ke database
    $connection = Connection::getInstance();

    // Query untuk menghapus berita
    $query = "DELETE FROM information WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Berhasil menghapus berita
        echo "<script>alert('Pelaporan berhasil dihapus!'); window.location.href='/../../admin/dashboard.php';</script>";
    } else {
        // Gagal menghapus berita
        echo "<script>alert('Gagal menghapus pelaporan!'); window.history.back();</script>";
    }
} else {
    // Jika ID tidak valid
    echo "<script>alert('ID Pelaporan tidak ditemukan!'); window.history.back();</script>";
}
} elseif (isset($_GET['reject'])) {
if (isset($_GET['reject']) && !empty($_GET['reject'])) {
    $id = $_GET['reject'];

    // Koneksi ke database
    $connection = Connection::getInstance();

    // Query untuk menghapus berita
    $query = "DELETE FROM information WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Berhasil menghapus berita
        echo "<script>alert('Pelaporan berhasil ditolak!'); window.location.href='/../../admin/unverified.php';</script>";
    } else {
        // Gagal menghapus berita
        echo "<script>alert('Gagal menolak pelaporan!'); window.history.back();</script>";
    }
} else {
    // Jika ID tidak valid
    echo "<script>alert('ID pelaporan tidak ditemukan!'); window.history.back();</script>";
}
}
?>
