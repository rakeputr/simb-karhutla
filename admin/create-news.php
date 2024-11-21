<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summernote - Mazer Admin Dashboard</title>

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
                            <h3>Summernote </h3>
                            <p class="text-subtitle text-muted">Super simple WYSIWYG editor. But you must include jQuery
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
                                    <h4 class="card-title">Default Editor</h4>
                                </div>
                                <div class="card-body">
                                <form action="proses_simpan.php" method="POST">
                        <textarea id="summernote" name="konten"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
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