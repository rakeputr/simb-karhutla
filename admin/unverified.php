<?php

session_start();

 require_once (__DIR__ . '/../src/Facades/Connection.php'); 
 require_once (__DIR__ . '/../src/Facades/authentication.php'); 
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

  
try {
    $pdo = Connection::getInstance();
  
    // Query SQL
    $sql = "
        SELECT 
            i.tgl_kejadian, i.id,
            CONCAT(i.tempat, ', ', i.provinsi) AS lokasi, 
            i.kronologi, 
            u.name, i.status
        FROM 
            information i 
        JOIN 
            user u 
        ON 
            i.user_id = u.id
        WHERE i.verified_at is NULL;
    ";
  
    // Eksekusi query
    $stmt = $pdo->query($sql);
  
    // Ambil hasil dalam bentuk array asosiatif
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  } catch (Exception $e) {
    die('Error fetching data: ' . $e->getMessage());
  }

  $title = "Pelaporan";
  
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/css/bootstrap.css')?>" />

    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/vendors/simple-datatables/style.css')?>" />

    <link
      rel="stylesheet"
      href="<?= Route::createUrl('admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.css')?>" />
    <link
      rel="stylesheet"
      href="<?= Route::createUrl('admin_assets/vendors/bootstrap-icons/bootstrap-icons.css')?>" />
    <link rel="stylesheet" href="<?= Route::createUrl('admin_assets/css/app.css')?>" />
    <link
      rel="shortcut icon"
      href="<?= Route::createUrl('admin_assets/images/favicon.svg')?>"
      type="image/x-icon"
    />
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
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable</h3>
                <p class="text-subtitle text-muted">
                  For user to check they list
                </p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      DataTable
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-header">Simple Datatable</div>
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
                                          <a href="verified-post.php?id=<?=$row['id']?>" class="rounded-pill btn btn-success"> approve </a>
                                          <a href="/../src/Facades/PelaporanDelete.php?reject=<?=$row['id']?>" class="rounded-pill btn btn-danger"> Hapus </a>
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

    <script src="<?= Route::createUrl('admin_assets/vendors/simple-datatables/simple-datatables.js')?>"></script>
    <script>
      // Simple Datatable
      let table1 = document.querySelector("#table1");
      let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="<?= Route::createUrl('admin_assets/js/main.js')?>"></script>
  </body>
</html>
