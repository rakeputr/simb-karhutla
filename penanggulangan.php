<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$title = "Get To Know";
include(__DIR__ . '/src/Templates/head_gtk.php'); ?>

<body>
    <?php include(__DIR__ . '/src/Templates/navbar gtk.php'); ?>

    <div id="Content">
        <hr id="hr1">
        <section id="bar">
            <a href="pengertian.php">
                <div>
                    <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-1-DuhWD.png" alt="Pengertian">
                    <span>Pengertian</span>
                </div>
            </a>
            <a href="mitigasi.php">
                <div>
                    <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-5-BA2OU.png" alt="Mitigasi">
                    <span>Mitigasi</span>
                </div>
            </a>
            <a href="dampak.php">
                <div>
                    <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-3-8ZJjo.png" alt="Dampak">
                    <span>Dampak</span>
                </div>
            </a>
            <a href="penanggulangan.php">
                <div>
                    <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-4-FVXdZ.png" alt="Penanggulangan">
                    <span>Penanggulangan</span>
                </div>
            </a>
        </section>
        <hr id="hr2">
        <section id="pelajari-detail">
            <a href="gtk.php" class="back">Kembali</a>
            <div class="container intro mb-0">
                <label class="category">Kebakaran Hutan &amp; Lahan</label>
                <h1 class="with-line"><span>Penanggulangan</span></h1>
                <div class="lead mb-0">
                    <p>
                        Penanggulangan kebakaran hutan dan lahan melibatkan upaya mencegah, mengendalikan, dan memadamkan
                        kebakaran guna mengurangi dampak buruknya. Langkah-langkah termasuk patroli, edukasi masyarakat,
                        teknologi ramah lingkungan, dan penanganan darurat seperti pemadaman manual dan water bombing.
                        Pascakebakaran, rehabilitasi dilakukan untuk memulihkan ekosistem dan mencegah kebakaran
                        selanjutnya.
                    </p>
                </div>
            </div>

            <div class="k-widget text-based text">
                <div class="container">
                    <div class="W730">
                        <div class="lead mb-0">
                            <p>1. Prosedur Pemadaman</p>
                        </div>
                        <p>
                        Penanggulangan kebakaran hutan dan lahan melalui tahapan-tahapan penting. Tahap pertama adalah monitoring untuk mendapatkan informasi lengkap tentang kebakaran. Selanjutnya, dilakukan persiapan sebelum dan di lokasi kejadian untuk memastikan keamanan. Kemudian, tim mengatur strategi pemadaman seperti pembagian tugas dan metode pemadaman yang sesuai. Tahap terakhir adalah pelaksanaan pemadaman dengan memadamkan api langsung, bekerja sama dengan pihak terkait, dan menggunakan sumber daya dengan efisien.
                        </p>
                        <div class="lead mb-0">
                            <p>2.Pemadaman</p>
                        </div>
                        <p>
                            Penanggulangan kebakaran hutan dan lahan menggunakan berbagai metode efektif. Salah satunya adalah pembuatan sekat bakar di wilayah rawan kebakaran untuk mencegah penyebaran api. Selain itu, pemadaman manual dilakukan dengan mobil pemadam kebakaran dan water bombing menggunakan helikopter untuk kebakaran besar. Teknologi Modifikasi Cuaca (TMC) dengan penyemaian garam bisa membantu membentuk awan hujan untuk mempercepat pemadaman. Strategi ini bertujuan untuk mengurangi kerusakan lingkungan akibat kebakaran.
                        </p>
                        <section class="pg-widget default-gap image-based full-picture-horizontal">
                            <div class="container c-100">
                                <div class="w910">
                                    <div class="img with-ornament">
                                        <img src="images\tmc.jpg" />
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="lead mb-0">
                            <p>3.Pasca Kebakaran</p>
                        </div>
                        <p>
                            Penanganan pasca-kebakaran hutan melibatkan rehabilitasi untuk memulihkan fungsi ekologis dan ekonomi kawasan yang terkena dampak. Ini termasuk pemulihan berbagai jenis hutan, penanaman kembali lahan terdampak, teknik konservasi tanah, dan upaya yuridis untuk mengidentifikasi penyebab kebakaran dan menegakkan hukum. Langkah-langkah ini bertujuan untuk menjaga keseimbangan ekosistem, mencegah kejadian serupa di masa depan, dan memastikan keberlanjutan lingkungan.
                        </p> 
                    </div>
                </div>
            </div>
        </section>

        <section class="related-knowledge">
            <div class="container c-100">
                <div class="d-flex justify-content-md-between">
                    <div class="link-area">
                        <div class="lead mb-0">
                            <p>Sebelumnya</p>
                        </div>
                        <a href="mitigasi.php">
                            <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-3-8ZJjo.png" alt="">
                            <div class="text with-line">
                                <span>Dampak</span>
                            </div>
                        </a>
                    </div>
                    <div class="link-area">
                        <div class="lead mb-0">
                            <p>Selanjutnya</p>
                        </div>
                        <a href="#">
                            <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/.png" alt="">
                            <div class="text with-line">
                                <span>Get to Know</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>