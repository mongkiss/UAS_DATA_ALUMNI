-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 05:54 PM
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
-- Database: `uas_251011700440_data_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` bigint(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `status` enum('Bekerja','Kuliah','Wirausaha','Belum Bekerja') DEFAULT 'Belum Bekerja',
  `foto` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nim`, `nama`, `jenis_kelamin`, `prodi`, `angkatan`, `tahun_lulus`, `email`, `telepon`, `alamat`, `pekerjaan`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(1, '251011700440', 'Muhammad Amien Nurcahya', 'Laki-laki', 'Sistem Informasi', '2025', '2028', 'pakimong007@gmail.com', '081290413499', 'Mars', 'CEO', 'Bekerja', '1782928812_Professional.png', '2026-07-01 18:00:12', '2026-07-01 18:00:12'),
(2, '251011700442', 'Varel Andriki Norman', 'Laki-laki', 'Hukum', '2022', '2025', 'varelandriki@gmail.com', '08146353794', 'Pamulang', 'Trader', 'Bekerja', '1783002217_WhatsApp Image 2026-07-02 at 9.14.57 PM.jpeg', '2026-07-02 14:23:37', '2026-07-02 14:23:37'),
(3, '251011700443', 'Muhammad Davi Al-Maududi', 'Laki-laki', 'Manajemen', '2022', '2025', 'davialmaududi@gmail.com', '08164443367', 'Pondok Benda', 'Manager', 'Bekerja', '1783002398_WhatsApp Image 2026-07-02 at 9.24.59 PM.jpeg', '2026-07-02 14:26:38', '2026-07-02 14:26:38'),
(4, '251011700444', 'Ihsan Agus Sulistio', 'Laki-laki', 'Teknik Mesin', '2022', '2025', 'sangangkrik@gmail.com', '081322255574', 'Ciputat', 'Mahasiswa', 'Kuliah', '1783004318_1783003261_WhatsApp Image 2026-07-02 at 9.35.59 PM.jpeg', '2026-07-02 14:41:01', '2026-07-02 14:58:38'),
(5, '251011700445', 'Bintang Mulya Ramadhan', 'Laki-laki', 'Sistem Informasi', '2022', '2025', 'binmulya@gmail.com', '081288446399', 'Depok', 'Mahasiswa', 'Kuliah', '1783003389_WhatsApp Image 2026-07-02 at 9.40.05 PM.jpeg', '2026-07-02 14:43:09', '2026-07-02 14:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`) VALUES
(1, 'Muhammad Amien Nurcahya', '251011700440', '$2y$10$uKyb0xW8KQvY3U1qHZpE0eP1Q5l6HhQGv0Gv4X1p4t4M9C1q2g2iK', '2026-07-01 15:45:33'),
(3, 'Ragnar', 'VikingGoBRR', '$2y$10$3u0D1HzhCXCB5sqxLbPP0.w2x867ErzS82WF3TlCPcstev6Vd8h4.', '2026-07-01 16:48:50'),
(4, 'Amien Nurcahya', 'Kimong', '$2y$10$XQUv7jr5zjmWxd0FNN.OWO8Bw75J5Nizxr9Pcox7aM7pyD0aQce06', '2026-07-02 14:11:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_alumni`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan_alumni` (
`id` bigint(20)
,`nim` varchar(20)
,`nama` varchar(100)
,`prodi` varchar(100)
,`angkatan` year(4)
,`tahun_lulus` year(4)
,`status` enum('Bekerja','Kuliah','Wirausaha','Belum Bekerja')
,`email` varchar(100)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_alumni`
--
DROP TABLE IF EXISTS `v_laporan_alumni`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_alumni`  AS SELECT `alumni`.`id` AS `id`, `alumni`.`nim` AS `nim`, `alumni`.`nama` AS `nama`, `alumni`.`prodi` AS `prodi`, `alumni`.`angkatan` AS `angkatan`, `alumni`.`tahun_lulus` AS `tahun_lulus`, `alumni`.`status` AS `status`, `alumni`.`email` AS `email`, `alumni`.`telepon` AS `telepon` FROM `alumni` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `idx_nim` (`nim`),
  ADD KEY `idx_nama` (`nama`),
  ADD KEY `idx_prodi` (`prodi`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
