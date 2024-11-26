-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2024 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simb`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `date_occured` datetime NOT NULL,
  `chronology` text DEFAULT NULL,
  `place` varchar(128) NOT NULL,
  `date_report` datetime NOT NULL DEFAULT curdate(),
  `user_id` int(11) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `admin_verifies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `date_occured`, `chronology`, `place`, `date_report`, `user_id`, `verified_at`, `admin_verifies_id`) VALUES
(1, '2024-11-09 00:00:00', 'gatau tu kayaknya orang ngerokok', 'UPN Veteran', '2024-11-09 00:00:00', 1, '2024-11-11 20:05:31', 2),
(2, '2024-11-09 00:00:00', 'kurang tahu', 'Di sebelah warung madura', '2024-11-09 00:00:00', 1, '2024-11-11 20:06:56', 1),
(3, '2024-11-09 18:00:00', 'lagi ngrokok gek tiba-tiba gatau ya\r\n', 'Kulon Omah', '2024-11-09 00:00:00', 1, '2024-11-11 18:36:15', 1),
(4, '2024-11-11 15:00:00', 'tidak tahu juga', 'lapangan kanggotan', '2024-11-11 00:00:00', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`) VALUES
(1, 'farhannivta', 'farhannivta@test.com', '$2y$10$msQnzFGbX1XDdNL.IXsuQuRu3XN8k64ru7tNO3THJEusgyaGekKom', 1, '2024-11-09 18:58:32'),
(2, 'rake putri', 'rakeputri@test.com', '$2y$10$2GcI1DcIMbnpVn1pd.PmNO3SJ90ZslWV7F/V8ht0sgA1wAza4FHMW', 0, '2024-11-09 19:42:59'),
(3, 'ngawur', 'ngawur@test.com', '$2y$10$k0YaBfge3I4hXKvhvKE6I.vA1yc8FC9orEc1bZAg5I47yjh26c7E6', 0, '2024-11-09 19:49:34'),
(5, 'riel', 'riel@test.com', '$2y$10$pcjtKrq2vqBn964S07US1.bLAolyKDElbUSZveF4oZ3CY.Oon2plC', 0, '2024-11-11 18:51:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
