<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$title = "Get To Know";
include(__DIR__ . '/src/Templates/head_gtk.php');

?>

<body>

<?php include (__DIR__ . '/src/Templates/navbar gtk.php') ?>

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
        <h1 class="with-line"><span>Dampak</span></h1>
        <div class="lead mb-0">
            <p>
            Kebakaran hutan dan lahan memiliki dampak negatif yang signifikan, seperti kerusakan lingkungan, peningkatan emisi gas rumah kaca, gangguan kesehatan masyarakat, dan kerugian ekonomi. Meskipun dalam beberapa kasus dapat membantu regenerasi ekosistem, dampak positifnya tidak sebanding dengan kerusakannya.
            </p>
        </div>
    </div>

    <div class="k-widget text-based text">
        <div class="container">
            <div class="W730">
                <div class="lead mb-0">
                    <p>1. Dampak Positif</p>
                </div>
                <p>
                Kebakaran hutan dan lahan, meskipun sering dipandang sebagai bencana, memiliki beberapa dampak positif dalam konteks tertentu, salah satunya adalah menyuburkan lahan. Proses pembakaran menghasilkan abu yang kaya akan mineral, seperti fosfor dan kalium, yang dapat meningkatkan kesuburan tanah dan mendukung pertumbuhan tanaman. Selain itu, panas yang dihasilkan dari kebakaran mampu membunuh patogen dan hama tanaman yang bersarang di tanah, sehingga mengurangi risiko penyakit tanaman di masa mendatang. Namun, dampak positif ini harus dilihat dengan hati-hati, mengingat kerugian ekologis dan sosial yang jauh lebih besar akibat kebakaran tidak terkendali.
                </p>
                <br>
                <div class="lead mb-0">
                    <p>2. Dampak Negatif terhadap lingkungan</p>
                </div>
                <section class="pg-widget default-gap image-based full-picture-horizontal">
                    <div class="container c-100">
                        <div class="w910">
                            <div class="img with-ornament">
                                <img src="images\eko.jpg" />
                            </div>
                        </div>
                    </div>
                    <p>
                        Kebakaran hutan dan lahan membawa dampak negatif yang signifikan terhadap lingkungan dan kehidupan. Salah satu dampaknya adalah hilangnya habitat makhluk hidup, yang mengakibatkan terganggunya keseimbangan ekosistem dan mengancam kelangsungan berbagai spesies flora dan fauna. Selain itu, kebakaran ini juga sering menyebabkan korban jiwa, baik manusia maupun hewan, akibat terperangkap dalam kebakaran atau terkena dampak asap beracun.
                    </p>
                    <div class="container c-100">
                        <div class="w910">
                            <div class="img with-ornament">
                                <img src="images\global.jpg" />
                            </div>
                        </div>
                    </div>
                    <p>
                        Pemanasan global turut diperparah karena kebakaran hutan melepaskan sejumlah besar gas rumah kaca, seperti karbon dioksida, ke atmosfer. Polusi udara yang dihasilkan dari asap kebakaran tidak hanya mencemari lingkungan tetapi juga berdampak buruk bagi kesehatan masyarakat, menyebabkan gangguan pernapasan hingga penyakit serius lainnya.
                    </p>
                    <br>
                    <div class="lead mb-0">
                        <p>3. Dampak Negatif terhadap ekonomi</p>
                    </div>
                    <section class="pg-widget default-gap image-based full-picture-horizontal">
                        <div class="container c-100">
                            <div class="w910">
                                <div class="img with-ornament">
                                    <img src="images\rugi.jpg" alt="alt optional" />
                                    <div class="caption">caption</div>
                                </div>
                            </div>
                        </div>
                        <p>
                        Kebakaran hutan dan lahan juga menimbulkan dampak negatif yang signifikan pada sektor ekonomi. Salah satunya adalah kerugian ekonomi yang besar, baik bagi pemerintah, masyarakat, maupun sektor bisnis. Kerusakan infrastruktur, biaya pemadaman kebakaran, serta dampak jangka panjang terhadap pariwisata dan pertanian menyebabkan kerugian finansial yang tidak sedikit. Selain itu, kebakaran mengakibatkan kehilangan lahan produktif yang seharusnya dapat digunakan untuk pertanian atau kegiatan ekonomi lainnya. Kehilangan tanah yang subur ini mengurangi potensi hasil pertanian, mengancam ketahanan pangan, dan mempengaruhi pendapatan petani serta pengusaha yang bergantung pada hasil bumi tersebut.
                        </p>
                        <br>
                    </section>
                </div>
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
                        <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-5-BA2OU.png" alt="">
                        <div class="text with-line">
                            <span>Mitigasi</span>
                        </div>
                    </a>
                </div>
                <div class="link-area">
                    <div class="lead mb-0">
                        <p>Selanjutnya</p>
                    </div>
                    <a href="penanggulangan.php">
                        <img src="https://pantaugambut.id/images/pelajari-icon/knowledges/5-4-FVXdZ.png" alt="">
                        <div class="text with-line">
                            <span>Penanggulangan</span>
                        </div>
                    </a>
                </div>
            </div>
       </div>
   </section>

   </div>
     
</body>
</html>