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

    // Proses file gambar
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

                // Simpan data ke database
               // Query untuk menyimpan data
                $query = "INSERT INTO news (title, tanggal, penulis, contents, picture, admin_id) VALUES (:judul, :tanggal, :penulis, :konten, :gambar, :admin_id)";
                $stmt = $connection->prepare($query);

                // Bind parameter
                $stmt->bindParam(':judul', $judul);
                $stmt->bindParam(':tanggal', $tanggal);
                $stmt->bindParam(':penulis', $penulis);
                $stmt->bindParam(':konten', $konten);
                $stmt->bindParam(':gambar', $newFileName);
                $stmt->bindParam(':admin_id', $admin_id);

                if ($stmt->execute()) {
                    // Jika berhasil
                    echo "<script>alert('Data berhasil disimpan!'); window.location.href='admin/create-news.php';</script>";
                } else {
                    // Jika gagal
                    echo "<script>alert('Gagal menyimpan data!'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Format gambar tidak diperbolehkan!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('File gambar belum diunggah atau terjadi kesalahan!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Metode pengiriman tidak valid!'); window.history.back();</script>";
}
?>
