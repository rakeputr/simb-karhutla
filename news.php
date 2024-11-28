<?php
session_start();
$title = "News";
include (__DIR__ . '/src/Templates/header.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Berita Terkini</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style> 
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .row {
    display: flex; /* Membuat layout horizontal */
    flex-wrap: wrap; /* Supaya kartu berpindah ke baris baru jika ruang habis */
    gap: 20px; /* Jarak antar-kartu */
}

.news-card {
    background-color: #f8f9fa; /* Warna latar belakang kartu */
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.news-image {
    width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}

.card-title {
    font-size: 1.1em;
    margin: 10px 0;
}
        .read-more {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .read-more:hover {
            background: #0056b3;
        }
    </style>
</head>
<?php include (__DIR__ . '/src/Templates/navbar.php') ?>
<body>
    <div class="container">
        <h1>Berita Terkini</h1>
        <?php
        // Konfigurasi database
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "simb-karhutla";

        // Koneksi ke database
        $conn = new mysqli($host, $user, $password, $database);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data news
        $sql = "SELECT id, title, tanggal, picture FROM news ORDER BY tanggal DESC";
        $result = $conn->query($sql);
    
        // Menampilkan news
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo "<div class='col-sm-4 col md-3'>";
                echo '<div class="news-card">';
                echo '<img src="uploads/' . htmlspecialchars($row["picture"]) . '" class="img-fluid news-image" alt="">';
                //echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["title"]) . '</h5>';
                echo '<p><small>' . htmlspecialchars($row["tanggal"]) . '</small></p>';
                echo '<a href="news-detail.php?id=' . htmlspecialchars($row["id"]) . '" class="read-more">Baca Selengkapnya</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Tidak ada news untuk ditampilkan.</p>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </div>
</body>
<footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h5 class="text-white">
                            <i class="bi-geo-alt-fill me-2"></i>
                            Kabupaten Sleman, Indonesia
                        </h5>

                        <a href="mailto:info@company.com" class="custom-link mt-3 mb-5">
                            Kelompok 6
                        </a>
                    </div>

                    <div class="col-6">
                        <p class="copyright-text mb-0">Copyright © 2024 
                        
                        <br><br>Design: <a href="https://templatemo.com/page/1" target="_parent">Kelompok 6</a></p>
                    
                    </div>

                    <div class="col-lg-3 col-5 ms-auto">
                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>

                </div>
            </section>
        </footer>
<?php include (__DIR__ . '/src/Templates/footer.php') ?>
</html>
