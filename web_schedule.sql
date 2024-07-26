-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 10:53 AM
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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `path_foto` varchar(100) DEFAULT NULL,
  `kehadiran` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`, `jabatan`, `path_foto`, `kehadiran`, `created_at`) VALUES
(1, '919027301', 'Purnawansyah, S.Kom., M.Kom.', 'Dekan', '/foto_dosen/pak-purnawansyah.jpeg', 1, NULL),
(2, '908089202', 'A. Ulfah tenripada, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/ibu-upe.png', 0, NULL),
(3, '918109501', 'Sitti Rahmah Jabir, S.M.,M.Sc.', 'Dosen', '/foto_dosen/ibu-rahmah.webp', 0, NULL),
(4, '907018602', 'Wistiani Astuti, S.Kom.', 'Dosen', '/foto_dosen/ibu-wisti.png', 0, NULL),
(5, '919018501', 'St. Hajrah Mansyur, S.Kom.,M.Cs', 'Dosen', '/foto_dosen/ibu-hajrah.png', 0, NULL),
(6, '922067801', 'Hadriana Iddas, S.T.,M.T.', 'Dosen', '/foto_dosen/kosong.png', 0, NULL),
(7, '920107601', 'Muh. Aliyazid Mude, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/pak-mude.png', 1, NULL),
(8, '926048704', 'Syahrul Mubarak Abdullah, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/pak-callu.webp', 0, NULL),
(9, '919056501', 'Ramdan Satra, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/pak-ramdan.webp', 0, NULL),
(10, '911039301', 'Ramdaniah, S.Kom.,M.T.', 'Dosen', '/foto_dosen/ibu-ramdaniah.png', 1, NULL),
(11, '906078701', 'Mardiyyah Hasnawi, S.Kom.,M.T.', 'Dosen', '/foto_dosen/ibu-mardiyyah.png', 0, NULL),
(12, '924069001', 'Herdianti, S.Si.,M.Eng.', 'Dosen', '/foto_dosen/ibu-herdianti.webp', 0, NULL),
(13, '908099401', 'Andi Widya Mufila Gaffar, S.T.,M.Kom.', 'Dosen', '/foto_dosen/ibu-widya.png', 0, NULL),
(14, '917068601', 'Dedy Atmajaya, S.Kom.,M.Eng.', 'Dosen', '/foto_dosen/pak-dedy.png', 0, NULL),
(15, '428077401', 'Dr. Dolly Indra, S.Kom.,MM.Si.', 'Dosen', '/foto_dosen/pak-dolly.png', 0, NULL),
(16, '922088701', 'Siska Anraeni, S.Kom.,M.T.', 'Dosen', '/foto_dosen/ibu-siska.png', 0, NULL),
(17, '906128504', 'Erick Irawadi Alwi, S.Kom.,M.Eng.', 'Dosen', '/foto_dosen/pak-erick.png', 0, NULL),
(18, '924127806', 'Syamsul Bahri, S.T.,M.T.', 'Dosen', '/foto_dosen/kosong.png', 0, NULL),
(19, '925067803', 'Rosmi Yani Amran, S.Kom.,M.Eng.', 'Dosen', '/foto_dosen/kosong.png', 0, NULL),
(20, '2107057202', 'Dr. Ihwana As\'Ad, S.Ag.,M.Sc.,Ph.D.', 'Dosen', '/foto_dosen/ibu-ihwana.png', 0, NULL),
(21, '924049303', 'Amaliah Faradibah, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/ibu-amel.png', 0, NULL),
(22, '911098201', 'Suwito Pomalingo, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/kosong.png', 0, NULL),
(23, '909029203', 'Muhammad Arfah Asis, S.Kom.,M.T.', 'Dosen', '/foto_dosen/pak-arfah.png', 0, NULL),
(24, '922078801', 'Fitriyani Umar, S.Si.,M.Eng.', 'Dosen', '/foto_dosen/ibu-fitriyani.png', 0, NULL),
(25, '920098801', 'Huzain Azis, S.Kom.,M.Cs.', 'Dosen', '/foto_dosen/pak-huzain.png', 0, NULL),
(26, '921018902', 'Lutfi Budi Ilmawan, S.Kom.,M.Cs.', 'Dosen', '/foto_dosen/pak-lutfi.png', 0, NULL),
(27, '931018001', 'Abdul Rachman Manga, S.Kom.,M.T.', 'Dosen', '/foto_dosen/pak-rachman.png', 0, NULL),
(28, '922118003', 'Ir. Lukman Syafie, M.Si., MTA.', 'Dosen', '/foto_dosen/pak-lukman.webp', 0, NULL),
(29, '910126901', 'Tasrif Hasanuddin, S.T.,M.Cs.', 'Dosen', '/foto_dosen/pak-tasrif.png', 0, NULL),
(30, '913038506', 'Herman, S.Kom.,M.Sc.', 'Dosen', '/foto_dosen/pak-herman.png', 0, NULL),
(31, '911098601', 'Farniwati Fattah, S.T.,M.T.', 'Dosen', '/foto_dosen/ibu-farni.png', 0, NULL),
(32, '915068601', 'Nia Kurniati, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/ibu-nia-kurniati.webp', 0, NULL),
(33, '915028503', 'Irawati, S.Kom.,M.T.', 'Dosen', '/foto_dosen/ibu-irawati.png', 0, NULL),
(34, '906048205', 'Lilis Nur Hayati, S.Kom., M.Eng.', 'Dosen', '/foto_dosen/ibu-lilis.png', 0, NULL),
(35, '901019302', 'Dewi Widyawati, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/ibu-dewi.png', 0, NULL),
(36, '924048501', 'Sugiarti, S.Kom.,M.Kom.', 'Dosen', '/foto_dosen/ibu-sugiarti.png', 0, NULL),
(37, '922078101', 'Yulita Salim, S.Kom.,M.T.', 'Dosen', '/foto_dosen/ibu-yulita.png', 0, NULL),
(38, '31056905', 'Dr. Hj. Harlinda L., S.Kom.,M.M.,M.Kom', 'Dosen', '/foto_dosen/ibu-harlinda.png', 0, NULL),
(39, '916108403', 'Poetri Lestari Lokapitasari Belluano, S.Kom.,M.T', 'Wakil Dekan 3', '/foto_dosen/ibu-putri.png', 0, NULL),
(40, '123', 'Nas', 'Mahasiswa', 'assets/foto_dosen/WhatsApp Image 2024-07-18 at 11.55.21.jpeg', 0, '2024-07-20 05:11:58'),
(41, '1234', 'Nass', 'Mahasiswa', '/foto_dosen/128px-Simple_placeholder_sizes.jpg', 1, '2024-07-20 05:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `waktu_start` time DEFAULT NULL,
  `waktu_end` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_dosen`, `kegiatan`, `waktu_start`, `waktu_end`, `created_at`) VALUES
(1, 1, 'Mengadakan ujian pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(2, 1, 'Mengadakan ujian kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(3, 2, 'Menyusun rencana kuliah pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(4, 2, 'Menyusun rencana kuliah kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(5, 3, 'Bimbingan mahasiswa pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(6, 3, 'Bimbingan mahasiswa kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(7, 4, 'Mengisi rapat fakultas pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(8, 4, 'Mengisi rapat fakultas kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(9, 5, 'Membuat materi kuliah pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(10, 5, 'Membuat materi kuliah kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(11, 6, 'Mengelola laboratorium pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(12, 6, 'Mengelola laboratorium kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(13, 7, 'Mengikuti workshop pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(14, 7, 'Mengikuti workshop kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(15, 8, 'Menulis jurnal ilmiah pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(16, 8, 'Menulis jurnal ilmiah kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(17, 9, 'Konsultasi dengan mahasiswa pertama', '08:00:00', '10:00:00', '2024-07-12 15:40:51'),
(18, 9, 'Konsultasi dengan mahasiswa kedua', '10:00:00', '12:00:00', '2024-07-12 15:40:51'),
(19, 1, 'Melakukan pengesahan kelulusan wisudawan', '08:00:00', '10:00:00', '2024-07-16 10:03:22'),
(20, 1, 'Pemberian penghargaan asisten laboratorium', '20:00:00', '21:00:00', '2024-07-16 10:03:22'),
(21, 1, 'Melakukan pengesahan kelulusan wisudawan', '08:00:00', '10:00:00', '2024-07-17 14:59:01'),
(22, 1, 'Pemberian penghargaan asisten laboratorium', '20:00:00', '21:00:00', '2024-07-17 14:59:01'),
(23, 2, 'Melakukan pengesahan kelulusan wisudawan', '08:00:00', '10:00:00', '2024-07-17 15:33:53'),
(24, 2, 'Pemberian penghargaan asisten laboratorium', '20:00:00', '21:00:00', '2024-07-17 15:33:53'),
(25, 2, 'Pemberian penghargaan asisten laboratorium', '20:00:00', '21:00:00', '2024-07-17 15:33:53'),
(26, NULL, 'Halo', NULL, NULL, '2024-07-19 17:15:39'),
(27, NULL, 'Halo', NULL, NULL, '2024-07-19 17:17:47'),
(28, NULL, NULL, NULL, NULL, '2024-07-19 17:18:19'),
(29, 1, 'Halo22', '10:00:00', '12:00:00', '2024-07-19 17:23:46'),
(30, 1, 'Halo22', '10:00:00', '12:00:00', '2024-07-19 17:34:07'),
(31, 2, 'Halo22', '10:00:00', '12:00:00', '2024-07-19 17:34:24'),
(32, NULL, NULL, NULL, NULL, '2024-07-19 17:38:27'),
(33, 1, 'Hola', '20:00:00', '00:00:00', '2024-07-19 17:40:53'),
(34, 2, 'Hola', '20:20:00', '20:30:00', '2024-07-19 17:42:35'),
(35, 1, 'Testt', '00:00:00', '23:00:00', '2024-07-19 17:44:00'),
(36, 2, 'Test refres', '10:00:00', '03:00:00', '2024-07-19 17:45:18'),
(37, 2, '10', '10:00:00', '10:00:00', '2024-07-19 17:51:31'),
(38, 1, '123', '12:00:00', '13:00:00', '2024-07-19 18:18:46'),
(39, 1, '345', '00:00:00', '00:00:00', '2024-07-19 18:22:34'),
(40, 1, '876', '08:59:00', '08:59:00', '2024-07-19 18:23:53'),
(41, 1, '98', '08:59:00', '08:59:00', '2024-07-19 18:26:04'),
(42, 1, 'Pelepasan MSIB', '08:00:00', '10:00:00', '2024-07-20 05:21:04'),
(43, 1, 'Hola', '10:00:00', '12:00:00', '2024-07-22 11:37:31'),
(44, 1, 'Heleh', '11:00:00', '13:00:00', '2024-07-22 11:37:46'),
(45, 7, 'Mengajar', '08:00:00', '10:00:00', '2024-07-22 11:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `fk1_kegiatan_dosen` (`id_dosen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk1_kegiatan_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
