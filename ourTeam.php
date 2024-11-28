<?php
session_start();
$title = "Our Team";
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


include (__DIR__ . '/src/Templates/header.php'); ?>
<style>
    #trivia {
        background-color: rgb(255, 140, 0);
    }

    main {
        margin-bottom: 200px; /* Ubah 50px ke jarak yang diinginkan */
    }

    footer.site-footer {
        margin-top: 100px; /* Jika lebih mudah, tambahkan margin pada footer */
    }
</style>
</head>
<body>
        <main>

            <?php include (__DIR__ . '/src/Templates/navbar.php') ?>

            
            <section class="section-padding pb-0" id="about">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-12 p-0">      
                            <img src="images/ourTeambg.avif" class="img-fluid about-image" alt="">
                        </div>

                        <div class="col-lg-3 col-12 bg-dark">  
                            <div class="d-flex flex-column flex-wrap justify-content-center h-100 py-5 px-4 pt-lg-4 pb-lg-0">
                                <h3 class="text-white mb-3" data-aos="fade-up">Get To Know Us.</h3>

                                <p class="text-secondary-white-color" data-aos="fade-up">Innovating technology to mitigate disaster impacts.</p>

                                <div class="mt-3 custom-links">
                                    
                                    <a href="index.php" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="100">Baca Berita Terkini</a>

                                    <a href="info.php" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="300">Buat Laporan Kebakaran</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-12 p-0">  
                            <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/people/rake.png" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Rake Putri</h3>

                                            <p class="text-secondary-white-color mb-0">124230107</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/ano.png" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-primary">
                                            <h3 class="text-white mb-0">Adriano</h3>

                                            <p class="text-secondary-white-color mb-0">124230105</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/fera.png" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-success">
                                            <h3 class="text-white mb-0">Ferawati Ginting</h3>

                                            <p class="text-secondary-white-color mb-0">124230106</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/nabil.png" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-info">
                                            <h3 class="text-white mb-0">Rahman Nabil</h3>

                                            <p class="text-secondary-white-color mb-0">124230110</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/nobel.png" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-danger">
                                            <h3 class="text-white mb-0">M. Nobel Wurjayatma</h3>

                                            <p class="text-secondary-white-color mb-0">124230114</p>
                                        </div>
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