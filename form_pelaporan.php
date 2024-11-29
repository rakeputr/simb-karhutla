<?php

session_start();

require_once (__DIR__ . '/src/Facades/Route.php');
require_once (__DIR__ . '/src/Facades/authentication.php');
require_once (__DIR__ . '/src/Facades/Connection.php');


    if (!isLogged()) {
        Route::redirect('loginNew.php?message=belum_login');
    }


try {
  $pdo = Connection::getInstance();

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
  ";

  $stmt = $pdo->query($sql);

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
  <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Pelaporan</h3>
                <p class="text-subtitle text-muted">
                  Laporkan kejadian kebakaran di sekitar Anda.
                </p>
              </div>
     <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Pelaporan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post" action="<?= Route::createUrl('info.php'); ?>">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" id="tanggal" class="form-control"
                                                         name="tanggal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tempat">Tempat</label>
                                                        <input type="text" id="tempat" class="form-control"
                                                            placeholder="Tempat" name="tempat">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="provinsi">Provinsi</label>
                                                        <input type="text" id="provinsi" class="form-control"
                                                            placeholder="Provinsi" name="provinsi">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="koordinat">Koordinat</label>
                                                        <input type="text" id="koordinat" class="form-control"
                                                            name="koordinat" placeholder="Koordinat">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kronologi">Kronologi</label>
                                                        <input type="text" id="kronologi" class="form-control"
                                                            name="kronologi" placeholder="Kronologi">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="status">Status Api</label>
                                                        <fieldset class="form-group">
                                                    <select class="form-select" id="status" name="status">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn me-1 mb-1" id="submitForm" name="submitForm" style="color: white; background-color:rgb(255, 140, 0)">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
