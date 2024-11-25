<?php 

require_once (__DIR__ . '/src/Facades/Connection.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];
  } else {
      echo "<script>
          alert('Pilih salah satu berita terlebih dahulu!');
          window.location.href = 'news.php'; 
      </script>";
}

try {
    $pdo = Connection::getInstance();

    // Query SQL
    $sql = "SELECT * FROM news WHERE id = :id";

    // Siapkan statement dengan prepare()
    $stmt = $pdo->prepare($sql);

    // Bind parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Eksekusi statement
    $stmt->execute();

    // Ambil hasil dalam bentuk array asosiatif
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    die('Error fetching data: ' . $e->getMessage());
}



include (__DIR__ . '/src/Templates/header.php'); 
?>
</head>
<body>
        <main>

            <section class="hero" id="hero">
                <div class="heroText">
                    <h1 class="news-detail-title text-white mt-lg-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <?=$results["title"]?>
                    </h1>

                    <div class="d-flex justify-content-center align-items-center">

                        <a href="#" class="social-share-link bi-bookmark-fill ms-3 me-4"></a>
                        
                        <span> <?=$results["tanggal"]?></span>
                    </div>
                </div>

                <div class="videoWrapper">
                    <img src="uploads/<?=$results["picture"]?>" class="img-fluid news-detail-image" alt="">
                </div>

                <div class="overlay"></div>
            </section>

            <?php include (__DIR__ . '/src/Templates/navbar.php') ?>

            <section class="news-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-10 mx-auto">
                            <h2 class="mb-3" data-aos="fade-up"> <?=$results["title"]?> </h2>

                            <!-- <p class="me-4" data-aos="fade-up">Yogyakarta, 07 November 2023. Kasus kebakaran hutan dan lahan masih sering terjadi di D.I. Yogyakarta. Sepanjang Januari hingga Oktober 2023, Pusdalops PB BPBD DIY mencatat terdapat 183 kejadian kebakaran hutan dan lahan. Di antaranya yaitu, Kabupaten Bantul sebanyak 53 kejadian, Gunungkidul sebanyak 36 kejadian, Kulonprogo sebanyak 33 kejadian, Sleman sebanyak 51 kejadian, dan Yogyakarta (kota) sebanyak 10 kejadian. -->

                            <p data-aos="fade-up"> <?=$results["contents"]?>
                            <div class="d-flex justify-content-center align-items-center my-4 mt-lg-0 mt-5">
                                <div class="col-md-6 text-center" data-aos="fade-up">
                                    <figure class="figure">
                                        <img src="uploads/<?=$results["picture"]?>" class="img-fluid news-image" alt="">

                                        <figcaption class="figure-caption">Images</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="social-share d-flex mt-5">
                                <span class="me-4" data-aos="zoom-in">Share this article:</span>

                                <a href="#" class="social-share-icon bi-facebook" data-aos="zoom-in"></a>

                                <a href="#" class="social-share-icon bi-twitter mx-3" data-aos="zoom-in"></a>

                                <a href="#" class="social-share-icon bi-envelope" data-aos="zoom-in"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="related-news section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-10 mx-auto text-center">
                            <span class="d-block" data-aos="zoom-in">Berita Selanjutnya</span>

                            <!-- buat ambil berita selanjutnya  -->
                            <?php
                            // Koneksi ke database
                            
                            try {
                                // Ambil ID dari parameter URL
                                $currentId = isset($_GET['id']) ? (int) $_GET['id'] : 1;
                            
                                // Query untuk mendapatkan ID dan title berita berikutnya
                                $sqlNextNews = "
                                    (SELECT id, title FROM news WHERE id > :currentId ORDER BY id ASC LIMIT 1)
                                    UNION
                                    (SELECT id, title FROM news ORDER BY id ASC LIMIT 1)
                                ";
                                $stmt = $pdo->prepare($sqlNextNews);
                                $stmt->execute([':currentId' => $currentId]);
                            
                                // Ambil hasil sebagai array asosiatif
                                $nextNews = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                                // Debugging 
                                // print_r($nextNews);
                            
                            } catch (Exception $e) {
                                die("Error: " . $e->getMessage());
                            }
                            
                            ?>
                            <h3 class="news-title" data-aos="fade-up">
                                <a href="news-detail.php?id=<?=$nextNews['id']?>" class="news-title-link"><?=$nextNews['title']?>
                                </a>
                            </h3>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h5 class="text-white">
                            <i class="bi-geo-alt-fill me-2"></i>
                            Kabupaten Sleman, Indonesia
                        </h5>

                        <a href="mailto:124230105@student.upnyk.ac.id" class="custom-link mt-3 mb-5">
                            Kelompok 6
                        </a>
                    </div>

                    <div class="col-6">
                        <p class="copyright-text mb-0">Copyright © 2021 
                        
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