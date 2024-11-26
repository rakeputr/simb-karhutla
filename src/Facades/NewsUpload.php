<?php

session_start();

// Koneksi ke database
require_once 'Connection.php'; // Pastikan file koneksi ada
require_once 'Route.php';
require_once 'authentication.php';

$connection = Connection::getInstance();

// Periksa apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : '';
    $konten = isset($_POST['konten']) ? $_POST['konten'] : '';
    $admin_id = getLoggedUser()->id;

    // Cek apakah ada ID untuk edit
    $isEdit = isset($_POST['id']) && !empty($_POST['id']);
    $newsId = $isEdit ? $_POST['id'] : null;

    // Proses file gambar
    $picturePath = null;
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validasi ekstensi file
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // Buat nama file unik dan pindahkan file
            $newFileName = uniqid('news_', true) . '.' . $fileExtension;
            $uploadPath = dirname(__DIR__, 2) . '/uploads/' . $newFileName;

            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                // Jika file berhasil diunggah, simpan ke database
                $picturePath = $uploadPath;
            } else {
                echo "<script>alert('Gagal mengunggah gambar!'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Format gambar tidak diperbolehkan!'); window.history.back();</script>";
            exit;
        }
    }

    // Jika ini adalah proses edit
    if ($isEdit) {
        // Update query jika ada gambar baru
        if ($picturePath) {
            // Update dengan gambar baru
            $query = "UPDATE news SET title = :judul, tanggal = :tanggal, penulis = :penulis, contents = :konten, picture = :gambar, admin_id = :admin_id WHERE id = :id";
        } else {
            // Update tanpa mengganti gambar
            $query = "UPDATE news SET title = :judul, tanggal = :tanggal, penulis = :penulis, contents = :konten, admin_id = :admin_id WHERE id = :id";
        }

        $stmt = $connection->prepare($query);

        // Bind parameter
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':konten', $konten);
        $stmt->bindParam(':admin_id', $admin_id);
        $stmt->bindParam(':id', $newsId, PDO::PARAM_INT);

        if ($picturePath) {
            $stmt->bindParam(':gambar', $newFileName);
        }

        if ($stmt->execute()) {
            echo "<script>
            alert('Berita berhasil diperbarui!'); 
            window.location.href='".Route::createUrl('admin/news.php')."';
            </script>";
        } else {
            echo "<script>alert('Gagal memperbarui berita!'); window.history.back();</script>";
        }
    } else {
        // Jika ini adalah proses input berita baru
        if ($picturePath) {
            // Simpan data baru dengan gambar
            $query = "INSERT INTO news (title, tanggal, penulis, contents, picture, admin_id) VALUES (:judul, :tanggal, :penulis, :konten, :gambar, :admin_id)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':gambar', $newFileName);
        } else {
            // Simpan data baru tanpa gambar
            $query = "INSERT INTO news (title, tanggal, penulis, contents, admin_id) VALUES (:judul, :tanggal, :penulis, :konten, :admin_id)";
            $stmt = $connection->prepare($query);
        }

        // Bind parameter
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':konten', $konten);
        $stmt->bindParam(':admin_id', $admin_id);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil disimpan!'); window.location.href='".Route::createUrl('admin/news.php')."';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data!'); window.history.back();</script>";
        }
    }
} else {
    echo "<script>alert('Metode pengiriman tidak valid!'); window.history.back();</script>";
}
?>
