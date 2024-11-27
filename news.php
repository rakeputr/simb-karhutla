<?php

include (__DIR__ . '/src/Templates/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
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
        .news-card {
            background: #fff;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .news-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .news-card h2 {
            margin: 0;
            padding-bottom: 10px;
            color: #333;
        }
        .news-card p {
            color: #666;
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
                echo '<div class="news-card">';
                echo '<img src="show-image.php?id=' . $row["id"] . '" alt="Gambar Berita">';
                echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                echo '<p><small>' . htmlspecialchars($row["tanggal"]) . '</small></p>';
                //echo '<p>' . htmlspecialchars(substr($row["contents"], 0, 100)) . '...</p>';
                echo '<a href="news-detail.php?id=' . htmlspecialchars($row["id"]) . '" class="read-more">Baca Selengkapnya</a>';
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
