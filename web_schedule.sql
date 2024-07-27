-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 10:47 AM
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
-- Database: `web_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_pimpinan` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `waktu_start` time DEFAULT NULL,
  `waktu_end` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_pimpinan`, `id_role`, `kegiatan`, `lokasi`, `waktu_start`, `waktu_end`, `status`, `created_at`) VALUES
(3, 1, 1, 'Pelepasan MSIB', 'Aljibra', '08:00:00', '10:00:00', 0, '2024-07-27 12:37:22'),
(4, 1, 1, 'Penyambutan Mahasiswa Berprestasi', 'Fikom Aula lt. 3', '13:00:00', '14:00:00', 0, '2024-07-27 12:38:15'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `path_foto` varchar(100) DEFAULT NULL,
  `kehadiran` tinyint(4) DEFAULT 0,
  `ket_kehadiran` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `id_role`, `nip`, `nama`, `jabatan`, `path_foto`, `kehadiran`, `ket_kehadiran`, `created_at`) VALUES
(1, 1, '0919027301', 'Ir. Purnawansyah, M.Kom., MTA', 'Dekan', 'pak-purnawansyah.jpeg', 1, 'Di Fakultas', '2024-07-27 08:15:21'),
(2, 1, '0922078101', 'Ir. Yulita Salim, S.Kom., M.T., MTA.', 'Wakil Dekan I', 'ibu-yulita.png', 0, 'Di Padang Lampe', '2024-07-27 08:15:21'),
(3, 1, '0031056905', 'Dr. Ir. Hj. Harlinda, MM., M.Kom., MTA.', 'Wakil Dekan II', 'ibu-harlinda.png', 0, 'Belum Hadir', '2024-07-27 08:15:21'),
(4, 1, '0916108403', 'Poetri Lestari Lokapitasari Belluano, S. Kom., MT,MTA.', 'Wakil Dekan III', 'ibu-putri.png', 1, 'Di Fakultas', '2024-07-27 08:15:21'),
(5, 1, '1234567890', 'Dr. H. Nukman, M.A', 'Wakil Dekan IV', 'kosong.png', 0, 'Sakit', '2024-07-27 08:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Dekanat'),
(2, 'Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`) VALUES
(1, 'admin_dekanat', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 1),
(2, 'admin_lab', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `fk1_kegiatan_dosen` (`id_pimpinan`),
  ADD KEY `fk2_kegiatan_role_idx` (`id_role`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`),
  ADD KEY `fk1_sf_role_idx` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk1_user_role_idx` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk2_kegiatan_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `fk1_sf_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk1_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
