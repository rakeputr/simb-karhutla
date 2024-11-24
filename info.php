<?php

session_start();

require_once (__DIR__ . '/src/Facades/Route.php');
require_once (__DIR__ . '/src/Facades/authentication.php');
require_once (__DIR__ . '/src/Facades/Connection.php');


// Cek apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Ambil data dari form
        $tanggal = $_POST['tanggal'];
        $tempat = $_POST['tempat'];
        $provinsi = $_POST['provinsi'];
        $koordinat = $_POST['koordinat'];
        $kronologi = $_POST['kronologi'];
        $status = $_POST['status'] === 'Active' ? 1 : 0; // Konversi status ke 1/0
        $user_id = getLoggedUser()->id; // Pastikan user yang sedang login memiliki ID di session

        // Validasi input (opsional, tambahkan sesuai kebutuhan)
        if (empty($tanggal) || empty($tempat) || empty($provinsi) || empty($kronologi)) {
            throw new Exception("Semua kolom wajib diisi!");
        }

        // Siapkan koneksi database
        $connection = Connection::getInstance();

        // Siapkan query untuk insert data
        $stmt = $connection->prepare("
            INSERT INTO information (tgl_kejadian, created_at, tempat, provinsi, koordinat, kronologi, status, user_id) 
            VALUES (:tanggal, NOW(), :tempat, :provinsi, :koordinat, :kronologi, :status, :user_id)
        ");

        // Bind parameter ke query
        $stmt->execute([
            'tanggal' => $tanggal,
            'tempat' => $tempat,
            'provinsi' => $provinsi,
            'koordinat' => $koordinat,
            'kronologi' => $kronologi,
            'status' => $status,
            'user_id' => $user_id
        ]);

        // Redirect atau tampilkan pesan sukses
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'info.php'; // Ubah ke halaman form atau daftar data
        </script>";
    } catch (Exception $e) {
        // Tangani error
        echo "<script>
            alert('Terjadi kesalahan: " . addslashes($e->getMessage()) . "');
            window.history.back();
        </script>";
    }
} 




// Fetch data from database
try {
  $pdo = Connection::getInstance();

  // Query SQL
  $sql = "
      SELECT 
          i.tgl_kejadian, 
          CONCAT(i.tempat, ', ', i.provinsi) AS lokasi, 
          i.kronologi, 
          u.name, i.status
      FROM 
          information i 
      JOIN 
          user u 
      ON 
          i.user_id = u.id
      WHERE i.verified_at IS NOT NULL
  ";

  // Eksekusi query
  $stmt = $pdo->query($sql);

  // Ambil hasil dalam bentuk array asosiatif
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
  die('Error fetching data: ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantau Api</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"rel="stylesheet" />
    <link rel="stylesheet" href="admin_assets/css/bootstrap.css" />
    <link rel="stylesheet" href="admin_assets/vendors/simple-datatables/style.css" />

    <link  rel="stylesheet"  href="admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="admin_assets/vendors/bootstrap-icons/bootstrap-icons.css"/>
    <link rel="stylesheet" href="admin_assets/css/app.css" />
    <link    rel="shortcut icon"    href="admin_assets/images/favicon.svg"    type="image/x-icon"  />


    <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;700;900&display=swap"
        rel="stylesheet" />
      <link href="<?= Route::createUrl('css/bootstrap-icons.css'); ?>" rel="stylesheet" />
      <link rel="stylesheet" href="<?= Route::createUrl('css/magnific-popup.css'); ?>" />
      <link href="<?= Route::createUrl('css/aos.css'); ?>" rel="stylesheet" />
      <link href="<?= Route::createUrl('css/templatemo-nomad-force.css'); ?>" rel="stylesheet" />

      <!-- Custom Styles -->
      <style>
        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            margin: 20px auto;
            max-width: 90%;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin: auto;
            /* text-align: center; */
        }

        @media (max-width: 768px) {
            .card {
                padding: 10px;
            }

            .table {
                font-size: 12px;
            }
        }

        body{
            margin-top: 150px;
        }
    </style>


</head>

<body>
  <?php include (__DIR__ . '/src/Templates/navbar gtk.php') ?>

  <div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center">
    <div>
        <h3>Ini juga diganti</h3>
        <p class="text-subtitle text-muted">
            ini tolong di ganti
        </p>
    </div>
    <a href="form_pelaporan.php" class="btn btn-warning" style="background-color: rgb(255, 140, 0); padding: 15px 20px;">
        Tambah Laporan
    </a>
</div>
  <section class="section">
            <div class="card">
              <div class="card-header">Data Pelaporan</div>
              <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Tempat</th>
                      <th>Kronologi</th>
                      <th>Pelapor</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($results as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['tgl_kejadian']); ?></td>
                                        <td><?php echo htmlspecialchars($row['lokasi']); ?></td>
                                        <td><?php echo htmlspecialchars($row['kronologi']); ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td>
                                            <?php if ($row['status'] === 1): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
    </div>

    <script src="admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="admin_assets/js/bootstrap.bundle.min.js"></script>

    <script src="admin_assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let table1 = document.querySelector("#table1");
        let dataTable = new simpleDatatables.DataTable(table1, {
            searchable: true,
            fixedHeight: true,
        });
    </script>

    <script src="admin_assets/js/main.js"></script>
  </body>
</html>
