<?php

session_start();

require_once (__DIR__ . '/../src/Facades/Route.php');
require_once (__DIR__ . '/../src/Facades/Connection.php');
require_once (__DIR__ . '/../src/Facades/authentication.php');

if (!isLogged()) {
    header("Location: ../login.php?message=login_admin");
    exit();
  } else {
    if (!isAdmin()) {
      header("Location: ../index.php?message=not_admin");
      exit();
    }
  }

//   $verified_by = getLoggedUser()->id; 
//   var_dump($verified_by);

  try {
      // Validasi apakah data diterima
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
          // Ambil ID data yang akan di-update
          $id = $_GET['id'];
          $verified_by = getLoggedUser()->id; // Ambil ID user dari sesi login
  
          // Koneksi ke database
          $pdo = Connection::getInstance();
  
          // Query Update
          $sql = "
              UPDATE information 
              SET 
                  verified_at = NOW(), 
                  verified_by = :verified_by
              WHERE 
                  id = :id;
          ";
  
          // Persiapkan statement
          $stmt = $pdo->prepare($sql);
  
          // Bind parameter
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->bindParam(':verified_by', $verified_by, PDO::PARAM_INT);
  
          // Eksekusi query
          $stmt->execute();

          echo "Data berhasil diverifikasi!";
      } else {
          throw new Exception("Data tidak valid!");
      }
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
  

// $informationRepository = new InformationRepositoryImpl();
// $adminRepository = new UserAdminRepositoryImpl();

// $user = AdminAuth::getLoggedUser();
// if ($informationRepository->setVerifiedById($_GET['id'], $user->id)) {
//     FlashSession::set('Berhasil verifikasi');
// } else {
//     FlashSession::set('Gagal verifikasi');
// }

// Route::redirect('admin/dashboard.php');
echo "<script>
alert('Data berhasil disimpan!');
window.location.href = 'dashboard.php'; // Ubah ke halaman form atau daftar data
</script>";
