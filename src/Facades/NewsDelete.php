<?php
session_start();
require_once 'Connection.php'; // Koneksi database

// Mendapatkan ID berita yang akan dihapus
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $newsId = $_GET['id'];

    // Koneksi ke database
    $connection = Connection::getInstance();

    // Query untuk menghapus berita
    $query = "DELETE FROM news WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $newsId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Berhasil menghapus berita
        echo "<script>alert('Berita berhasil dihapus!'); window.location.href='/../../admin/news.php';</script>";
    } else {
        // Gagal menghapus berita
        echo "<script>alert('Gagal menghapus berita!'); window.history.back();</script>";
    }
} else {
    // Jika ID tidak valid
    echo "<script>alert('ID berita tidak ditemukan!'); window.history.back();</script>";
}
?>
