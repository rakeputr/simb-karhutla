<?php
session_start();

require_once (__DIR__ . "/src/Facades/authentication.php");

$connection = Connection::getInstance();

if (isset($_GET['message'])) {
  if ($_GET['message'] == "not_admin") {
    ?>
    <script>
      alert('This page is limited to admin!')
    </script>
    <?php
  }
}

$title = "Pantau Api";
include (__DIR__ . '/src/Templates/header.php'); ?>
<style>
    #trivia {
        background-color: rgb(255, 140, 0);
    }
</style>
</head>
<body>
        <main>

            <section class="hero" id="hero">
                <div class="heroText">
                    <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
                        PANTAU API
                    </h1>
                    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="1000">
                        Situs PANTAU API menyajikan data dan informasi terbaru mengenai titik api (hotspot) 
                        dan kebakaran hutan serta lahan, yang dapat dimanfaatkan oleh masyarakat dan 
                        pihak terkait untuk mendukung upaya pencegahan dan penanggulangan kebakaran hutan di Indonesia.
                    </p>
                </div>
                
                <div class="videoWrapper">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="videos/a.jpg">
                        <source src="videos/a.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="overlay"></div>
            </section>

            <?php include (__DIR__ . '/src/Templates/navbar.php') ?>

            <section class="section-padding pb-0" id="about">
                <div class="container mb-5 pb-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-3" data-aos="fade-up">Kebakaran Hutan <br>dan Lahan</h2>
                        </div>

                        <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                            <p class="me-4" data-aos="fade-up" data-aos-delay="300">Kebakaran hutan dan lahan merupakan salah satu isu lingkungan yang sangat mendesak di banyak negara, termasuk Indonesia. Setiap tahunnya, ribuan hektar hutan hilang akibat kebakaran yang disebabkan oleh berbagai faktor, baik alami maupun buatan manusia. Praktik pembukaan lahan dengan cara membakar untuk kepentingan pertanian dan perkebunan menjadi salah satu penyebab utama. Selain merusak ekosistem dan mengancam keanekaragaman hayati, kebakaran hutan juga menghasilkan asap tebal yang berdampak buruk bagi kesehatan masyarakat dan menimbulkan kerugian ekonomi yang signifikan.</p>
                        </div>

                        <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                            <p data-aos="fade-up" data-aos-delay="500">Dampak kebakaran hutan dan lahan tidak hanya dirasakan secara lokal, tetapi juga memiliki konsekuensi global. Asap dan partikel berbahaya yang dihasilkan dapat menyebar ke negara tetangga, menyebabkan masalah kesehatan dan gangguan aktivitas sehari-hari. Selain itu, kebakaran hutan juga berkontribusi terhadap perubahan iklim dengan melepaskan sejumlah besar karbon dioksida ke atmosfer. Oleh karena itu, upaya pencegahan dan penanggulangan kebakaran hutan harus menjadi prioritas, melalui edukasi masyarakat, penegakan hukum yang tegas, serta penerapan teknologi pemantauan yang canggih. Kerjasama antara pemerintah, masyarakat, dan sektor swasta sangat diperlukan untuk menjaga kelestarian hutan dan memastikan lingkungan yang lebih sehat bagi generasi mendatang.</p>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-12 p-0">      
                            <img src="images/a.jpg" style="height: 100px" class="img-fluid about-image" alt="">
                        </div>

                        <div class="col-lg-3 col-12" id="trivia">  
                            <div class="d-flex flex-column flex-wrap justify-content-center h-100 py-5 px-4 pt-lg-4 pb-lg-0">
                                <p class="text-secondary-white-color" data-aos="fade-up">Setiap tahunnya di Indonesia, ribuan hektar hutan terbakar, meninggalkan dampak ekologis, kesehatan, dan ekonomi yang signifikan.</p>

                                <div class="mt-3 custom-links">
                                    <a href="#contact" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="300">kompasiana.com</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-12 p-0">  
                            <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/img4.webp" style="height: 100px" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Riau</h3>

                                            <p class="text-secondary-white-color mb-0">2007</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/img5.webp" style="height: 100px" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Pontianak</h3>

                                            <p class="text-secondary-white-color mb-0">2012</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/img3.webp" style="height: 100px" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Banten</h3>

                                            <p class="text-secondary-white-color mb-0">2014</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/img1.webp" style="height: 100px" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Sitandan</h3>

                                            <p class="text-secondary-white-color mb-0">2009</p>
                                        </div>
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                                      <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                      <span class="visually-hidden">Next</span>
                                </button>
                            </section>

                        </div>
                    </div>
                </div>
            </section>

            <section class="news section-padding" id="news">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Berita Terkini</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="news-thumb" data-aos="fade-up">
                                <a href="news-detail.php?id=2" class="news-image-hover news-image-hover-warning">
                                    <img src="images/news/news1.jpeg" class="img-fluid large-news-image news-image" alt="">
                                </a>

                                <div class="news-category bg-warning text-white">Kebakaran Hutan</div>
                                
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="news-detail.php?id=2" class="news-title-link">Kebakaran Hutan dan Lahan Marak Terjadi, Berikut Cara Pencegahannya!</a>
                                    </h5>

                                    <span class="text-muted">22 November 2024</span>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100">
                                    
                                    <a href="news-detail.php?id=3" class="news-image-hover news-image-hover-primary">
                                        <img src="images/news/news2.jpg" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-warning text-white">Kebakaran Hutan</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail.php?id=3" class="news-title-link">PBB: Tahun 2050, Kebakaran Hutan Berpotensi Meningkat 30%</a>
                                        </h5>

                                        <div class="d-flex flex-wrap">                                       
                                            <span class="text-muted">20 November 2024</span>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100" data-aos="fade-up">
                                    
                                    <a href="news-detail.php?id=4" class="news-image-hover news-image-hover-success">
                                        <img src="images/news/news3.jpg" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-warning text-white">Kebakaran Lahan</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail.php?id=4" class="news-title-link">Karhutla 2024, KLHK Mulai Langkah Pencegahan dan Penanganan</a>
                                        </h5>

                                        <span class="text-muted">21 November 2024</span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6">
                        <h5 class="text-white">
                            Sistem Informasi Manajemen Bencana
                        </h5>

                        <a href="mailto:info@company.com" class="custom-link mt-3 mb-5">
                            SI - D
                        </a>
                        
                        <p class="copyright-text mb-0">Kelompok 6</p>
                    </div>

                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <img src="images/logoUPN.png" style="width:200px; height:auto; margin-left: 10px;">
                    </div>
                </div>
            </section>
        </footer>
        
 <?php include (__DIR__ . '/src/Templates/footer.php') ?>