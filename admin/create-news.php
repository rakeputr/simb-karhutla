<?php 

session_start();

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
  

$title = "Tulis Berita";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/../admin_assets/css/bootstrap.css">

    <link rel="stylesheet" href="/../admin_assets/vendors/summernote/summernote-lite.min.css">

    <link rel="stylesheet" href="/../admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/../admin_assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/../admin_assets/css/app.css">
    <link rel="shortcut icon" href="/../admin_assets/images/favicon.svg" type="image/x-icon">
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
                            <h3>Tulis Berita </h3>
                            <p class="text-subtitle text-muted">Sampaikan berita terkini
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Summernote</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Tulis Berita</h4>
                                </div>
                                <div class="card-body">
                                <form action="/../src/Facades/NewsUpload.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- Input Judul -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" class="form-control" 
                       placeholder="Tulis judul di sini" name="judul" required>
            </div>
        </div>

        <!-- Input Tanggal Upload -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="tanggal">Tanggal Upload</label>
                <input type="date" id="tanggal" class="form-control" 
                       name="tanggal" required>
            </div>
        </div>

        <!-- Input Picture -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="picture">Gambar</label>
                <input type="file" id="picture" class="form-control" 
                       name="picture" accept="image/*" required>
            </div>
        </div>

        <!-- Input Penulis -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" class="form-control" 
                       name="penulis" placeholder="Penulis" 
                       value="<?= getLoggedUser()->name ?>">
            </div>
        </div>

        <!-- Input Konten -->
        <div class="form-group col-12">
            <label for="konten">Konten</label>
            <textarea id="summernote" name="konten"></textarea>
        </div>

        <!-- Submit dan Reset -->
        <div class="col-12 d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </div>
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Word Hints</h4>
                                </div>
                                <div class="card-body">
                                    <div id="hint"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
            </div>

        </div>
    </div>
    <script src="/../admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/../admin_assets/js/bootstrap.bundle.min.js"></script>

    <script src="/../admin_assets/vendors/jquery/jquery.min.js"></script>
    <script src="/../admin_assets/vendors/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            placeholder: 'Tulis sesuatu di sini...',
            height: 300,
        });

    </script>

    <script src="/../admin_assets/js/main.js"></script>
</body>

</html>