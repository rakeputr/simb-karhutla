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
include (__DIR__ . '/src/Templates/header.php'); ?>
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
                        <!--<strong class="custom-underline">website</strong>-->
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
                            <h2 class="mb-3" data-aos="fade-up">Let us create...</h2>
                        </div>

                        <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                            <p class="me-4" data-aos="fade-up" data-aos-delay="300">You may contribute <a rel="nofollow" href="http://paypal.me/templatemo" target="_blank">a small amount</a> via PayPal if <a rel="nofollow" href="https://templatemo.com/tm-567-nomad-force" target="_parent">Nomad Force Template</a> is useful for you. This will absolutely help us to keep creating better CSS templates for you. <br><br>We provide you 100% free templates on TemplateMo website. Images are provided by FreePik and Unsplash websites.</p>
                        </div>

                        <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                            <p data-aos="fade-up" data-aos-delay="500">This Bootstrap 5 layout is free to use for your business. You are allowed to edit it in any way you like. However, please do not redistribute this template ZIP file for a template download purpose on any other website such as Free CSS collections.</p>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-12 p-0">      
                            <img src="images/elena-rabkina-eVVzwsNhNf4-unsplash.jpg" class="img-fluid about-image" alt="">
                        </div>

                        <div class="col-lg-3 col-12 bg-dark">  
                            <div class="d-flex flex-column flex-wrap justify-content-center h-100 py-5 px-4 pt-lg-4 pb-lg-0">
                                <h3 class="text-white mb-3" data-aos="fade-up">We’re - idealists and strategic thinkers.</h3>

                                <p class="text-secondary-white-color" data-aos="fade-up">Over six years in the video business</p>

                                <div class="mt-3 custom-links">
                                    
                                    <a href="#news" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="100">Read News & Events</a>

                                    <a href="#contact" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="300">Work with Us</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-12 p-0">  
                            <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/people/studio-shot-beautiful-happy-retired-caucasian-female-with-pixie-hairdo-crossing-arms-her-chest-having-confident-look-smiling-broadly.jpg" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">Rake Putri</h3>

                                            <p class="text-secondary-white-color mb-0">Founding Partner</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/project-leder-with-disabilities-looking-front-sitting-immobilized-wheelchair-business-office-room.jpg" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-primary">
                                            <h3 class="text-white mb-0">Adriano</h3>

                                            <p class="text-secondary-white-color mb-0">CEO & Investor</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/fera.jpeg" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-success">
                                            <h3 class="text-white mb-0">Ferawati Ginting</h3>

                                            <p class="text-secondary-white-color mb-0">Art Director</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/happy-african-american-professional-manager-smiling-looking-camera-headshot-portrait.jpg" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-info">
                                            <h3 class="text-white mb-0">Robinson H.</h3>

                                            <p class="text-secondary-white-color mb-0">Sales & Marketing</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/people/working-business-lady.jpg" class="img-fluid team-image" alt="">

                                        <div class="team-thumb bg-danger">
                                            <h3 class="text-white mb-0">Jane M.</h3>

                                            <p class="text-secondary-white-color mb-0">Project Management</p>
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

            <section class="section-padding" id="portfolio">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio</h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="portfolio-thumb mb-5" data-aos="fade-up">
                                <a href="images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg" class="image-popup">
                                    <img src="images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Effortless</h4>

                                    <p class="text-danger">Branding</p>
                                </div>
                            </div> 

                            <div class="portfolio-thumb" data-aos="fade-up">
                                <a href="images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg" class="image-popup">
                                    <img src="images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Health technology</h4>

                                    <p class="text-success">Art Direction</p>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="portfolio-thumb mt-5 mt-lg-0 mb-5" data-aos="fade-up">
                                <a href="images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg" class="image-popup">
                                    <img src="images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Maki</h4>

                                    <p class="text-warning">Website</p>
                                </div>
                            </div> 

                            <div class="portfolio-thumb" data-aos="fade-up">
                                <a href="images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg" class="image-popup">
                                    <img src="images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">The gig economy</h4>

                                    <p class="text-info">Graphic</p>
                                </div>
                            </div> 
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
                                <a href="news-detail.html" class="news-image-hover news-image-hover-warning">
                                    <img src="images/news/news1.jpeg" class="img-fluid large-news-image news-image" alt="">
                                </a>

                                <div class="news-category bg-warning text-white">Kebakaran Hutan</div>
                                
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="news-detail.html" class="news-title-link">Kebakaran Hutan dan Lahan Marak Terjadi, Berikut Cara Pencegahannya!</a>
                                    </h5>

                                    <span class="text-muted">07 November 2023</span>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100">
                                    
                                    <a href="news-detail2.html" class="news-image-hover news-image-hover-primary">
                                        <img src="images/news/news2.jpg" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-primary text-white">Kebakaran Hutan</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail2.html" class="news-title-link">PBB: Tahun 2050, Kebakaran Hutan Berpotensi Meningkat 30%</a>
                                        </h5>

                                        <div class="d-flex flex-wrap">                                       
                                            <span class="text-muted">23 Februari 2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100" data-aos="fade-up">
                                    
                                    <a href="news-detail3.html" class="news-image-hover news-image-hover-success">
                                        <img src="images/news/news3.jpg" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-success text-white">Kebakaran Lahan</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail3.html" class="news-title-link">Karhutla 2021, KLHK Mulai Langkah Pencegahan dan Penanganan</a>
                                        </h5>

                                        <span class="text-muted">21 Agustus 2021</span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </section>

            <section class=" contact section-padding" id="contact">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-7 col-12 mx-auto">

                            <h2 class="mb-4 text-center" data-aos="fade-up">Dont' be shy, write to us</h2>

                            <form action="#" method="post" class="contact-form" role="form" data-aos="fade-up">

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-6">
                                        <label for="name" class="form-label">Nama <sup class="text-danger">*</sup></label>

                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-6">
                                        <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                    </div>

                                    <div class="col-12 my-4">
                                        <label for="message" class="form-label">How can we help?</label>

                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tell us about the project" required></textarea>
                                        
                                    </div>

                                    <div class="col-12">
                                        <label for="services" class="form-label">Services<sup class="text-danger">*</sup></label>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox1" name="checkbox1" class="form-check-input">

                                            <label class="form-check-label" for="checkbox1">Branding</label>
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-12 my-2 my-lg-0">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" class="form-check-input">

                                            <label class="form-check-label" for="checkbox2">Digital Experiences</label>
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" class="form-check-input">

                                            <label class="form-check-label" for="checkbox3">Web Development</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12 mx-auto mt-5">
                                    <button type="submit" class="form-control">Kirim Pesan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <section class="google-map">
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" class="map-iframe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h5 class="text-white">
                            <i class="bi-geo-alt-fill me-2"></i>
                            State of Rio de Janeiro, Brazil
                        </h5>

                        <a href="mailto:info@company.com" class="custom-link mt-3 mb-5">
                            info@company.com
                        </a>
                    </div>

                    <div class="col-6">
                        <p class="copyright-text mb-0">Copyright © Nomad Force 2021 
                        
                        <br><br>Design: <a href="https://templatemo.com/page/1" target="_parent">TemplateMo</a></p>
                    
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