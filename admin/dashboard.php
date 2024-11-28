<?php

session_start();

require_once (__DIR__ . '/../src/Facades/Route.php');
require_once (__DIR__ . '/../src/Facades/FlashSession.php');
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

// Fetch data from database
try {
  $pdo = Connection::getInstance();

  // Query SQL
  $sql = "
      SELECT 
      i.id,
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

$title = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/vendors/simple-datatables/style.css')?>" />

    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/vendors/iconly/bold.css')?>">

    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.css')?>">
    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/css/app.css')?>">
    <link rel="shortcut icon" href="<?= Route::createUrl('admin_assets/images/favicon.svg')?>" type="image/x-icon">

</head>

<body>
    <div id="app">
  <?php  include (__DIR__ . '/../src/Templates/sidebar.php'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <!-- <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Statistik Karhutla Indonesia Tahun 2024</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                               
                            </div>
                        </div>

                        <!-- start modal   -->
                         <!-- Modal -->
                        <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editStatusModalLabel">Edit Status Berita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <!-- Form untuk Edit Status -->
                                <form action="edit-verified-post.php" method="POST">
                                  <input type="hidden" name="id" id="newsId"> <!-- Menyimpan ID berita yang akan diubah -->
                                
                                  <!-- Dropdown untuk memilih status -->
                                  <div class="form-group">
                                    <label for="status">Pilih Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                  </div>

                                  <!-- Submit Button -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                         <!-- end modal  -->
                         <!-- <div class="row">
                         
                        </div> -->
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Status Api Pelaporan</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <section class="section">
                <div class="card">
                                    <div class="card-header">
                                        <h4>Monitoring Pelaporan</h4>
                                    </div>
                                    <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                      <thead>
                                        <tr>
                                          <th>Tanggal</th>
                                          <th>Tempat</th>
                                          <th>Kronologi</th>
                                          <th>Pelapor</th>
                                          <th>Status</th>
                                          <th>Action</th>
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
                                        <td>
                                        <div class="d-flex gap-2">
                                          <button type="button" class="rounded-pill btn btn-info btn-edit-status"
                                                  data-id="<?php echo $row['id']; ?>" 
                                                  data-status="<?php echo $row['status']; ?>" 
                                                  data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                              Edit
                                          </button>
                                          <a href="<?= Route ::createUrl("src/Facades/PelaporanDelete.php?id=" . $row['id'])?>" class="rounded-pill btn btn-danger"> Hapus </a>
                                        </div>
                                      </td>
                                    </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                    </div>
                                </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?= Route::createUrl('admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
    <script src="<?= Route::createUrl('admin_assets/js/bootstrap.bundle.min.js')?>"></script>

    <script src="<?= Route::createUrl('admin_assets/vendors/apexcharts/apexcharts.js')?>"></script>
    <script src="<?= Route::createUrl('admin_assets/js/pages/dashboard.js')?>"></script>

    <script src="<?= Route::createUrl('admin_assets/js/main.js')?>"></script>
    <script src="<?= Route::createUrl('admin_assets/vendors/simple-datatables/simple-datatables.js')?>"></script>
    <script>
        let table1 = document.querySelector("#table1");
        let dataTable = new simpleDatatables.DataTable(table1, {
            searchable: true,
            fixedHeight: true,
        });
    </script>
    <script>
      // Event listener untuk mengisi ID berita dan status saat modal dibuka
      document.querySelectorAll('.btn-edit-status').forEach(button => {
        button.addEventListener('click', function() {
          const newsId = this.getAttribute('data-id'); // Ambil ID berita dari data-id
          const currentStatus = this.getAttribute('data-status'); // Ambil status saat ini dari data-status

          // Isi ID berita dan status di modal
          document.getElementById('newsId').value = newsId;
          document.getElementById('status').value = currentStatus;
        });
      });
    </script>

</body>

</html>