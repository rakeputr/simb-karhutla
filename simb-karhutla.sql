-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2024 at 05:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simb-karhutla`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `tgl_kejadian` date NOT NULL,
  `kronologi` text NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `koordinat` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `verified_at` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `created_at`, `tgl_kejadian`, `kronologi`, `tempat`, `provinsi`, `koordinat`, `user_id`, `verified_by`, `verified_at`, `status`) VALUES
(1, '2024-01-12 10:00:00', '2024-01-11', 'Kebakaran di area hutan gambut akibat pembukaan lahan ilegal.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 1, 2, '2024-01-12', NULL),
(2, '2024-01-18 14:00:00', '2024-01-17', 'Kebakaran disebabkan aktivitas pembakaran sampah liar.', 'Kabupaten Bengkalis', 'Riau', '1.4819,102.1259', 3, 2, '2024-01-18', NULL),
(3, '2024-01-30 16:30:00', '2024-01-29', 'Kebakaran menyebabkan kerusakan 50 hektar lahan.', 'Kabupaten Pelalawan', 'Riau', '0.1078,101.9422', 5, 2, '2024-01-30', NULL),
(4, '2024-02-15 09:20:00', '2024-02-14', 'Kebakaran terjadi di kawasan konservasi.', 'Kabupaten Kapuas', 'Kalimantan Tengah', '-2.0159,114.0347', 7, 2, '2024-02-15', NULL),
(5, '2024-02-28 11:45:00', '2024-02-27', 'Kebakaran meluas akibat angin kencang.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 4, 2, '2024-02-28', NULL),
(6, '2024-03-05 08:30:00', '2024-03-04', 'Kebakaran di area hutan lindung akibat aktivitas perburuan liar.', 'Kabupaten Ogan Ilir', 'Sumatera Selatan', '-3.4416,104.1425', 6, 2, '2024-03-05', NULL),
(7, '2024-03-15 13:15:00', '2024-03-14', 'Kebakaran disebabkan pembukaan lahan menggunakan api.', 'Kabupaten Indragiri Hulu', 'Riau', '-0.3355,102.6200', 5, 2, '2024-03-15', NULL),
(8, '2024-03-20 17:00:00', '2024-03-19', 'Kebakaran merusak ekosistem hutan gambut.', 'Kabupaten Banjar', 'Kalimantan Selatan', '-3.4425,114.8807', 10, 2, '2024-03-20', NULL),
(9, '2024-03-28 15:45:00', '2024-03-27', 'Asap kebakaran mengganggu aktivitas penduduk setempat.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 11, 2, '2024-03-28', NULL),
(10, '2024-04-10 12:30:00', '2024-04-09', 'Kebakaran dipicu oleh aktivitas pembukaan lahan.', 'Kabupaten Kotawaringin Timur', 'Kalimantan Tengah', '-2.6947,112.9820', 5, 2, '2024-04-10', NULL),
(11, '2024-04-20 09:10:00', '2024-04-19', 'Kebakaran hutan gambut yang sulit dipadamkan.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 15, 2, '2024-04-20', NULL),
(12, '2024-04-30 14:50:00', '2024-04-29', 'Kebakaran menyebabkan rusaknya habitat satwa liar.', 'Kabupaten Mempawah', 'Kalimantan Barat', '0.6703,109.0182', 14, 2, '2024-04-30', NULL),
(13, '2024-05-05 11:15:00', '2024-05-04', 'Kebakaran akibat kelalaian warga sekitar.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 12, 2, '2024-05-05', NULL),
(14, '2024-05-12 08:30:00', '2024-05-11', 'Kebakaran meluas ke lahan perkebunan.', 'Kabupaten Pelalawan', 'Riau', '0.1078,101.9422', 7, 2, '2024-05-12', NULL),
(15, '2024-05-18 10:45:00', '2024-05-17', 'Kebakaran menyebabkan asap pekat yang mengganggu aktivitas penerbangan.', 'Kabupaten Kapuas', 'Kalimantan Tengah', '-2.0159,114.0347', 12, 2, '2024-05-18', NULL),
(16, '2024-05-23 16:00:00', '2024-05-22', 'Kebakaran di kawasan lindung akibat aktivitas pertanian liar.', 'Kabupaten Banjar', 'Kalimantan Selatan', '-3.4425,114.8807', 9, 2, '2024-05-23', NULL),
(17, '2024-05-30 14:20:00', '2024-05-29', 'Kebakaran diperparah oleh angin kencang.', 'Kabupaten Musi Banyuasin', 'Sumatera Selatan', '-2.9167,103.8190', 10, 2, '2024-05-30', NULL),
(18, '2024-06-03 10:20:00', '2024-06-02', 'Kebakaran hutan akibat musim kemarau panjang.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 11, 2, '2024-06-03', NULL),
(19, '2024-06-10 14:00:00', '2024-06-09', 'Kebakaran di lahan gambut dengan asap tebal menyelimuti kota.', 'Kabupaten Kapuas', 'Kalimantan Tengah', '-2.0159,114.0347', 14, 2, '2024-06-10', NULL),
(20, '2024-06-20 08:45:00', '2024-06-19', 'Hutan lindung terbakar akibat aktivitas pembukaan lahan.', 'Kabupaten Mempawah', 'Kalimantan Barat', '0.6703,109.0182', 12, 2, '2024-06-20', NULL),
(21, '2024-06-29 16:30:00', '2024-06-28', 'Kebakaran menyebabkan kerugian besar pada masyarakat sekitar.', 'Kabupaten Banjar', 'Kalimantan Selatan', '-3.4425,114.8807', 13, 2, '2024-06-29', NULL),
(22, '2024-07-15 12:30:00', '2024-07-14', 'Kebakaran merusak habitat satwa liar yang dilindungi.', 'Kabupaten Bengkalis', 'Riau', '1.4819,102.1259', 1, 2, '2024-07-15', NULL),
(23, '2024-07-28 17:15:00', '2024-07-27', 'Asap kebakaran mengganggu kesehatan masyarakat.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 8, 2, '2024-07-28', NULL),
(24, '2024-08-05 14:40:00', '2024-08-04', 'Kebakaran terjadi akibat kelalaian aktivitas perburuan liar.', 'Kabupaten Pelalawan', 'Riau', '0.1078,101.9422', 9, 2, '2024-08-05', NULL),
(25, '2024-08-12 10:50:00', '2024-08-11', 'Kebakaran hutan merusak area konservasi hutan mangrove.', 'Kabupaten Musi Banyuasin', 'Sumatera Selatan', '-2.9167,103.8190', 1, 2, '2024-08-12', NULL),
(26, '2024-08-18 16:00:00', '2024-08-17', 'Kebakaran di lahan gambut sulit dipadamkan akibat angin kencang.', 'Kabupaten Kapuas', 'Kalimantan Tengah', '-2.0159,114.0347', 4, 2, '2024-08-18', NULL),
(27, '2024-08-24 09:15:00', '2024-08-23', 'Pembukaan lahan dengan pembakaran ilegal memicu kebakaran.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 6, 2, '2024-08-24', NULL),
(28, '2024-08-30 11:30:00', '2024-08-29', 'Asap pekat kebakaran menyebabkan aktivitas penerbangan terganggu.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 12, 2, '2024-08-30', NULL),
(29, '2024-09-10 13:20:00', '2024-09-09', 'Kebakaran meluas hingga mendekati pemukiman warga.', 'Kabupaten Bengkalis', 'Riau', '1.4819,102.1259', 12, 2, '2024-09-10', NULL),
(30, '2024-09-19 18:00:00', '2024-09-18', 'Kebakaran menyebabkan kerusakan parah pada hutan lindung.', 'Kabupaten Kotawaringin Timur', 'Kalimantan Tengah', '-2.6947,112.9820', 14, 2, '2024-09-19', NULL),
(31, '2024-09-27 15:40:00', '2024-09-26', 'Aktivitas pembakaran ilegal memicu kebakaran yang sulit dikendalikan.', 'Kabupaten Mempawah', 'Kalimantan Barat', '0.6703,109.0182', 12, 2, '2024-09-27', NULL),
(32, '2024-10-05 08:30:00', '2024-10-04', 'Kebakaran hutan gambut menyebabkan asap menyelimuti kota.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 14, 2, '2024-10-05', NULL),
(33, '2024-10-14 14:15:00', '2024-10-13', 'Kebakaran terjadi akibat puntung rokok yang dibuang sembarangan.', 'Kabupaten Pelalawan', 'Riau', '0.1078,101.9422', 12, 2, '2024-10-14', NULL),
(34, '2024-10-21 16:50:00', '2024-10-20', 'Pembakaran untuk pembukaan lahan memicu kebakaran besar.', 'Kabupaten Banjar', 'Kalimantan Selatan', '-3.4425,114.8807', 14, 2, '2024-10-21', NULL),
(35, '2024-10-29 10:10:00', '2024-10-28', 'Kebakaran diperparah oleh angin kencang dan cuaca panas.', 'Kabupaten Musi Banyuasin', 'Sumatera Selatan', '-2.9167,103.8190', 13, 2, '2024-10-29', 1),
(36, '2024-11-11 09:45:00', '2024-11-10', 'Kebakaran menyebabkan kerugian ekonomi masyarakat sekitar.', 'Kabupaten Sambas', 'Kalimantan Barat', '1.4211,109.3208', 10, 2, '2024-11-11', 1),
(37, '2024-11-25 13:25:00', '2024-11-24', 'Kebakaran meluas hingga 100 hektar lahan pertanian.', 'Kabupaten Kotawaringin Timur', 'Kalimantan Tengah', '-2.6947,112.9820', 9, 2, '2024-11-25', 1),
(38, '2024-11-12 10:00:00', '2024-11-11', 'Kebakaran di area hutan gambut akibat pembukaan lahan ilegal.', 'Kabupaten Siak', 'Riau', '0.7668,101.4127', 1, 2, '2024-11-21', NULL),
(39, '2024-11-18 14:00:00', '2024-11-17', 'Kebakaran disebabkan aktivitas pembakaran sampah liar.', 'Kabupaten Bengkalis', 'Riau', '1.4819,102.1259', 3, 2, '2024-11-21', NULL),
(41, '2024-11-21 20:21:21', '2024-11-30', 'Tiba-tiba kebakaran aja', 'Bandar Lampung', 'Lampung', '32323232', 2, NULL, NULL, 1),
(42, '2024-11-21 20:22:17', '2024-11-28', 'diamm', 'Bandar Lampung', 'Kalimantan Barat', '89776', 2, 2, '2024-11-21', 1),
(45, '2024-11-21 20:25:47', '2024-11-30', '12', '12', '12', '12', 2, 2, '2024-11-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `contents` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `penulis` varchar(30) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `tanggal`, `contents`, `picture`, `penulis`, `admin_id`) VALUES
(2, 'Kebakaran Hutan dan Lahan Marak Terjadi, Berikut Cara Pencegahannya!', '2024-11-22', '<p align=\"justify\">Yogyakarta, 22 November 2024. Kasus kebakaran hutan dan lahan masih sering terjadi di D.I. Yogyakarta. Sepanjang Januari hingga Oktober 2023, Pusdalops PB BPBD DIY mencatat terdapat 183 kejadian kebakaran hutan dan lahan. Di antaranya yaitu, Kabupaten Bantul sebanyak 53 kejadian, Gunungkidul sebanyak 36 kejadian, Kulonprogo sebanyak 33 kejadian, Sleman sebanyak 51 kejadian, dan Yogyakarta (kota) sebanyak 10 kejadian.<br><br>Penyebab terjadinya kebakaaan hutan dan lahan disebabkan oleh dua faktor, diantaranya adalah alam dan non alam. Pada faktor alam biasanya terjadi saat musim kemarau panjang tiba, sambaran petir, dan erupsi gunung berapi. Sementara pada faktor non alam biasanya terjadi karena keteledoran manusia.<br>Gambar Berita<br><br>Kebakaran yang disebabkan oleh faktor alam tentu tidak dapat dihindari. Oleh sebab itu, perlu adanya tindakan pencegahan dari manusia. Berikut adalah cara yang dapat dilakukan untuk mencegah terjadinya kebakaran hutan dan lahan: <br><br>&nbsp;1. Jangan membakar hutan untuk membuka lahan atau kebun.<br><br>2. Hindari membuat api unggun di area lahan yang rawan terjadi kebakaran.<br><br>3. Tidak membakar sampah di lahan atau hutan, terlebih pada saat angin kencang. Hal ini dikarenakan angin yang bertiup kencang dapat berisiko menyebarkan kobaran api dengan cepat dan memicu kebakaran.<br><br>4. Perhatikan jarak tempat pembakaran sampah dengan objek, usahakan jarak antara tempat pembakaran sampah dengan objek berada di sekitar minimal 50 kaki dari pemukiman dan sejauh 500 kaki dari hutan.<br><br>5. Jangan membuang puntung rokok sembarangan di area hutan atau lahan, terlebih jika puntung tersebut dalam keadaan masih menyala.<br><br>6.Setelah melakukan aktivitas pembakaran, pastikan bahwa api tersebut sudah benar-benar padam. Serta pastikan pula bahwa tidak ada barang-barang yang berpotensi menimbulkan kebakaran di sekitarnya. <br><br>Pada saat musim kemarau seperti sekarang ini ditambah dengan fenomena El Nino yang berpengaruh pada suhu permukaan air laut di sekitar Indonesia menurun yang berakibat pada berkurangnya pembentukan awan yang membuat curah hujan menurun sehingga udara semakin kering diharapkan masyarakat lebih bijak dalam pembakaran sampah sehingga tidak merambat ke objek yang lain. Mengingat data kejadian kebakaran hingga bulan Oktober 2023 penyebab kebakaran terbanyak diakibatkan dari pembakaran sampah. <br></p>', 'news_673fd05c590575.96224353.jpeg', 'admin', 2),
(3, ' PBB: Tahun 2050, Kebakaran Hutan Berpotensi Meningkat 30 Persen', '2024-11-20', '<p align=\"justify\">Frekuensi kebakaran hutan yang melanda berbagai belahan dunia diprediksi meningkat. Negara yang telah dihancurkan api, termasuk Australia, California, Amerika Serikat (AS), serta Siberia, juga disebut akan mengalami kobaran api 50% lebih sering pada akhir abad ini.<br><br>Hal itu disampaikan oleh Program Lingkungan Perserikatan Bangsa-Bangsa (UNEP) dalam laporan terbarunya, Rabu, 23 Februari 2022. Organisasi itu bahkan memperingatkan bahwa wilayah yang sebelumnya tidak terpengaruh akan ikut terdampak oleh kobaran api yang tidak terkendali.<br><br>Meningkatnya krisis iklim yang disertai dengan perubahan fungsi lahan mendorong intensitas kebakaran hutan ekstrem dalam skala global. Laporan PBB, yang melibatkan lebih dari 50 peneliti internasional, memprediksi kebakaran meningkat sebesar 14% pada 2030 dan 30% pada 2050.<br><br>Temuan ini menunjukkan harus ada perubahan radikal dalam pengeluaran publik untuk kebakaran hutan. Laporan itu menyebut bahwa saat ini pemerintah menggelontorkan uang di tempat yang salah dengan berfokus pada pekerjaan layanan darurat. Sementara itu, pencegahan kebakaran dinilai sebagai pendekatan yang lebih efektif.<br><br>Di masa depan, kebakaran hutan akan menjadi bagian dari kehidupan di setiap benua, kecuali Antartika. Ini akan menghancurkan lingkungan, satwa liar, kesehatan manusia, dan infrastruktur, menurut laporan tersebut.<br><br>Bekerja sama dengan pusat komunikasi lingkungan nirlaba GRID-Arendal, PBB memperingatkan tentang “perubahan dramatis dalam rezim api di seluruh dunia.” “Dari Australia hingga Kanada, Amerika Serikat hingga China, di seluruh Eropa dan Amazon, kebakaran hutan mendatangkan malapetaka pada lingkungan, satwa liar, kesehatan manusia, dan infrastruktur,” kata pengantar laporan tersebut.<br><br>Meskipun situasi tersebut “ekstrem”, laporan tersebut mendorong agar umat manusia tidak putus asa. Laporan itu diterbitkan menjelang Sidang Lingkungan PBB di Nairobi, 28 Februari – 2 Maret 2022.<br><br>Secara khusus, para ilmuwan menyorot kejadian “kebakaran hutan” yang didefinisikan sebagai kebakaran vegetasi bebas yang tidak biasa yang menimbulkan risiko bagi masyarakat, ekonomi, atau lingkungan. Bulan ini, para peneliti menemukan pemanasan global dapat menyebabkan “api besar yang tahan terhadap praktik pemadaman api” di California selatan. Di AS, hampir 3 juta hektare lahan terbakar akibat karhutla tahun lalu, dengan api yang semakin sulit untuk dipadamkan.<br><br>Saat ini respons langsung terhadap kebakaran hutan mendapat lebih dari 50% alokasi dana. Sementara itu perencanaan dan pencegahan kurang dari 1%. Dus, laporan itu menyerukan “formula siap-api” dengan investasi yang seimbang antara perencanaan, pencegahan, dan kesiapsiagaan sebesar 50%. Sementara itu 30% dialokasikan untuk tanggap darurat dan 20% untuk pemulihan.<br><br>“Saat ini respons pemerintah terhadap kebakaran hutan seringkali menempatkan uang di tempat yang salah. Padahal, para pekerja layanan darurat dan petugas pemadam kebakaran di garis depan yang mempertaruhkan hidup mereka untuk memerangi kebakaran hutan perlu didukung,” kata direktur eksekutif UNEP Inger Andersen, dalam keterangan tertulis, Rabu, 23 Februari 2022.<br><br>“Kita harus meminimalkan risiko kebakaran hutan ekstrem dengan menjadi lebih siap: berinvestasi lebih banyak dalam pengurangan risiko kebakaran, bekerja dengan komunitas lokal, dan memperkuat komitmen global untuk memerangi perubahan iklim,” jelasnya. Kebakaran hutan secara tidak proporsional memengaruhi negara-negara termiskin di dunia. Dampaknya mulai dari gangguan kesehatan akibat asap, kerugian ekonomi, dan kerusakan lingkungan.<br><br>Dengan dampak yang berlangsung selama berhari-hari, berminggu-minggu dan bahkan bertahun-tahun setelah api mereda, hal ini menghambat kemajuan Tujuan Pembangunan Berkelanjutan PBB (SDGs) dan memperdalam kesenjangan sosial.<br><br>Kebakaran hutan dan perubahan iklim saling terkait. Kebakaran hutan diperburuk oleh perubahan iklim melalui peningkatan kekeringan, suhu udara tinggi, kelembaban relatif rendah, kilat, dan angin kencang yang mengakibatkan musim kebakaran yang lebih panas, lebih kering, dan lebih lama.<br><br>Pada saat yang sama, perubahan iklim diperburuk oleh kebakaran hutan, sebagian besar dengan merusak ekosistem sensitif dan kaya karbon seperti lahan gambut dan hutan hujan. Ini mengubah lanskap menjadi wilayah api, membuatnya lebih sulit untuk menghentikan kenaikan suhu. Satwa liar dan habitat aslinya jarang terhindar dari kebakaran hutan, mendorong beberapa spesies hewan dan tumbuhan mendekati kepunahan. Contoh terbaru adalah kebakaran hutan Australia 2020, yang diperkirakan telah memusnahkan miliaran hewan peliharaan dan liar.<br><br>Menurut laporan tersebut, ada beberapa solusi alami untuk mengendalikan kebakaran. Hal ini termasuk memulai kebakaran terkendali menggunakan pembakaran yang ditentukan, mengelola lanskap dengan menggembalakan hewan untuk mengurangi jumlah bahan yang mudah terbakar di lanskap, serta menebang pohon yang terlalu dekat dengan rumah penduduk.<br><br>Secara umum, para ahli percaya bahwa ekosistem yang lebih dekat ke khatulistiwa seharusnya memiliki kebakaran yang lebih terkontrol, dan yang lebih jauh seharusnya memiliki lebih sedikit. Pengecualian termasuk hutan tropis seperti Amazon, yang berada di garis khatulistiwa namun seharusnya memiliki sedikit kebakaran.<br><br>Kebakaran hutan telah memperburuk krisis iklim dengan menghancurkan ekosistem kaya karbon seperti lahan gambut, lapisan es dan hutan, membuat lanskap lebih mudah terbakar. Memulihkan ekosistem seperti lahan basah dan lahan gambut membantu mencegah terjadinya kebakaran dan menciptakan penyangga di lanskap.<br><br></p>', 'news_673fe19d9fbba5.58869211.jpg', 'admin', 2),
(4, ' Karhutla 2021, KLHK Mulai Langkah Pencegahan dan Penanganan', '2024-11-11', '<p align=\"justify\">Kementerian Lingkungan Hidup dan Kehutanan (KLHK) mengatakan, sebagian besar wilayah di Indonesia telah memasuki musim kemarau. Kebakaran hutan dan lahan juga telah terdeteksi di berbagai provinsi.<br><br>Direktur Jenderal Pengendalian Perubahan Iklim KLHK Laksmi Dewanthi mengatakan, berdasarkan prakiraan Badan Meteorologi, Geofisika, dan Klimatologi (BMKG) ada 41 zona atau 85,38 persen wilayah yang telah memasuki musim kemarau, termasuk provinsi rawan karhutla seperti Riau, Jambi, dan Sumatra Selatan.<br>Gambar Berita<br><br>“Dengan analisis perkembangan musim kemarau ini, KLHK dan instansi terkait melakukan upaya pencegahan dan pengendalian karhutla,” kata Laksmi dalam media briefing virtual, Senin, 30 Agustus 2021.<br><br>Menurut Laksmi, potensi kebakaran menengah-tinggi diprediksi mulai Agustus di Sumatra bagian tengah, serta Nusa Tenggara Timur dan Nusa Tenggara Barat. Sementara itu pada September-Oktober, potensi karhutla terdapat di sebagian NTB dan NTT. “Pada November dan Desember, tidak ada potensi karhutla. Namun, kita tidak bisa bilang potensi karhutla sudah lewat. Di beberapa provinsi, status siap siaga ditetapkan hingga Desember,” kata Laksmi.<br><br>Terkait pencegahan dan penanganan karhutla, pemerintah fokus pada tiga solusi permanen. Pertama, adalah analisis iklim dan langkah, seperti prakiraan musim kemarau BMKG sebagai dasar langkah pencegahan, termasuk dasar status siaga dan modifikasi cuaca. Selain itu, pengendalian operasional dan pengelolaan lannskap juga dilakukan.<br><br>Hal itu termasuk mendorong pembukaan lahan tanpa bakar dan pengelolaan ekosistem gambut di Kawasan Hidrologi Gambut. KLHK juga memasang CCTV dan thermal camera di 15 lokasi dan drone untuk memantau hotspot di 34 lokasi. \"Sistem peringatan dan deteksi dini karhutla juga dilakukan melalui pemantauan satelit,\" kata Laksmi.<br><br>Pemerintah juga melanjutkan implementasi teknologi modifiksi cuaca (TMC) sebagai bagian dari pencegahan. Operasi ini dilakukan untuk membasahi lahan untuk menjaga kelembaban, menjaga tingkat muka air gambut, mengatasi asap karhutla, dan memadamkan api besar di area yang luas<br><br>Menurut Laksmi, sejak dilakukan tahun lalu, TMC meningkatkan curah hujan aktual selama periode TMC dibandingkan dengan prediksi BMKG dan curah hujan historis periode 2009-2019 sebesar 12,38 - 35,99%.<br><br>Berdasarkan evaluasi operasi TMC pada 2020, KLHK mencatat peningkatan curah hujan di beberapa provinsi. Di Riau, curah hujan selama TMC Tahap II (13-31 Mei) berkisar 157 mm/fase, lebih tinggi dari prediksi BMKG di angka 121,80 mm/fase. Pada tahap III (24 Juli-31 Oktober), curah hujan berada di 545.40/fase, dibandingkan dengan prediksi 477.90 mm/fase.<br><br>Hal serupa terjadi di Jambi dan Sumatera Selatan, yang mengalami curah hujan sebanyak 666.80 mm/fase pada Tahap II (12 Agustus-16 Oktober). Angka itu lebih tinggi dari prediksi BMKG di 451.60 mm/fase.<br><br>“Tahun kita lakukan berbagai macam TMC, dan saat ini masih dilakukan di berbagai tempat,” kata Laksmi.<br><br>Selain itu, KLHK juga membentuk brigade kebakaran karhutla pada pemegang konsesi di wilayah yang rawan kebakaran. Konsepnya sama dengan Masyarakat Peduli Api (API) dan melibatkan masyarakat.<br><br>“Ini meningkatkan keterlibatan dan peran dari pemegang konsesi karena kebakaran bisa terjadi di luar dan di dalam konsesi. Di dalam konsesi tentu mereka harus bertanggung jawab secara langsung,” jelas Laksmi.<br><br>Direktur Pengendalian Kebakaran Hutan dan Lahan KLHK Basar Manullang mengatakan, setiap pemegang izin konsesi dan izin usaha pemanfaatan hasil hutan wajib membentuk brigade penanganan karhutla, diatur dalam Permen LHK Nomor 32 Tahun 2016 tentang Pengendalian Kebakaran Hutan dan Lahan.<br><br>“Dalam aturan itu, khususnya setiap pemegang izin kawasan diwajibkan memiliki brigade. Mekanismenya kita fasilitasi di awal untuk peningkatan kapasitas,” kata Basar.<br><br>Basar mengatakan, saat ini KLHK memliki lima balai pelatihan di Sumatra, Sulawesi, Jawa, Nusa Tenggara, dan Papua untuk melatih anggota TNI dan kepolisian sebelum terjun ke lapangan. Pihaknya mengharapkan perusahaan pemegang izin konsesi untuk memberdayakan MPA di sekitar konsesi dan menjadi bagian dari anggota brigade.<br><br>Sementara itu, untuk provinsi rawan karhutla seperti Riau, Jambi, dan Sumatra Selatan, brigade dibentuk secara mandiri dan bersifat permanen oleh perusahaan.<br><br>“Kita lakukan pelatihan sebelum satgas memadamkan api di lapangan. Jadi perlu ada transfer pengetahuan juga ke pemegang izin, dan itu wajib,” jelasnya.<br><br>Basar mengatakan, pemerintah tidak boleh lengah. “Kita tahu bahwa kejadian karhutla di Indonesia ini 99% adalah ulah manusia,” pungkasnya. <br></p>', 'news_673fe29a313ab7.70111633.jpg', 'Rake Putri', 2),
(6, 'berita jelek', '2024-11-23', '<p>coba aja sihsdsd<br></p>', 'news_673feefe30b7f0.32828552.png', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'rake', 'rake', 'rake@mail.com', '$2y$10$sa/sn3DTea444/OIp4JLSeFyU0Db0qicFd6CzOCHsSzYGI1GhQWeq', 0),
(2, 'admin', 'admin', 'admin@mail.com', '$2y$10$1/m/yjHL9YS.BnbYVZZ6wOCqkB9lkLQ6ndn959u9bnW.ATACVhP5e', 1),
(3, 'putri', 'putri', 'rake@mail.com', '$2y$10$bvLhygB/7SXYs3uDcQkdd.mucQ59zqCYe5/i3k6.kTEGsEog1bcji', 0),
(4, 'rara', 'rara', 'rake@mail.com', '$2y$10$rqW72FawYMzVWBpQjTdfv.vpGhcS5H2.hWRtOuuyFDzIS3O.8QjOu', 0),
(5, 'rake12', 'rake', 'rake@mail.com', '$2y$10$qbV1uNHNTHy1HApXlPhpaemCO2dHohNFWTgSAzzDAlAS9b7iW768e', 0),
(6, 'putput', 'putput', 'rake@mail.com', '$2y$10$3.C99a0ECU2cYl4IyU2xj.Eal0grFrmjT1A89RGCCAMDnJYY6GjSm', 0),
(7, 'lani', 'lani', 'rake@mail.com', '$2y$10$uwBqQMhqqpWHj.k5Rhk9Ou9hMuz7I3xr82mWAGDNBUAUqoOJniLhS', 0),
(8, 'nike', 'nike', 'rake@mail.com', '$2y$10$qqYywrfpbuLJCM0O61XTFOGIiMunb7O6IvjEdpXTxM/YFP8ZUECpC', 0),
(9, 'farhan', 'farhannivta', 'rake@mail.com', '$2y$10$x5HhMXZhPWHRuQOs/zKzzOpKQaGBEQIo414NeKlYBOMoCXHSsW9/m', 0),
(10, 'aaaaaa', 'aaaaaa', 'rake@mail.com', '$2y$10$FlrLtabwCDToboNFIB1Us.YHpI.hPZCVADyYgTZBBWIV4/9Pa8pIi', 0),
(11, 'sifu', 'sifu', 'rake@mail.com', '$2y$10$7IF99.OUr.880XY1IsnvbOKC.IwW1wSwB6mqPtIQA0zscXPRnq8pC', 0),
(12, 'randomis', 'randomis', 'rake@mail.com', '$2y$10$yZc/Tipkrvpk2mxgr3E6IuEGzbku0TS8Rxx1i0NCyjzyD.54HeIm.', 0),
(13, 'syakil', 'syakil', 'rake@mail.com', '$2y$10$gDnAMvbdv6niRDWMKCGlsev4Fu5/y20QFmAErhy8btw4a9QQaXj.C', 0),
(14, 'eleen', 'eleen', 'rake@mail.com', '$2y$10$SxJUqvY.K7Fb3yGT8v.qV.xlGmLhc5lj6WkVshYWeqgTUqXWRMibO', 0),
(15, 'struick', 'struick', 'rake@mail.com', '$2y$10$Jp3SuySi/eAXRCzivMqnguBLu7rj31BEIQGkdMfBdI3Hy6mrDzX0C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verified_by` (`verified_by`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`verified_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
