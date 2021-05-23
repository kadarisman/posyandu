-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 11:20 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lia`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` varchar(10) NOT NULL,
  `nama_desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`) VALUES
('D-BLB', 'Buloh'),
('D-CIJ', 'Cot Ijue'),
('D-GDG', 'Gedong-gedong'),
('D-KMB', 'Kumbang Barat'),
('D-LNC', 'Lancok'),
('D-MNE', 'Mane'),
('D-PYM', 'Paya Meuneng'),
('D-PYR', 'Paya Reuhat'),
('D-RBU', 'Rabu');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id_posyandu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `berat_badan` varchar(15) NOT NULL,
  `tinggi_badan` varchar(15) NOT NULL,
  `umur` int(11) NOT NULL,
  `PSG` varchar(15) DEFAULT NULL,
  `GKN` varchar(15) DEFAULT NULL,
  `HPHT` varchar(30) DEFAULT NULL,
  `TTP` varchar(30) DEFAULT NULL,
  `hamil_ke` varchar(15) DEFAULT NULL,
  `HB` varchar(30) DEFAULT NULL,
  `tahun` varchar(20) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id_posyandu`, `id_user`, `berat_badan`, `tinggi_badan`, `umur`, `PSG`, `GKN`, `HPHT`, `TTP`, `hamil_ke`, `HB`, `tahun`, `bulan`) VALUES
(1, 8, 'Normal', 'Normal', 20, 'Baik', 'Baik', '', '', '', '', '2021', 'January'),
(4, 14, 'Normal', 'Normal', 21, 'Baik', 'Baik', '', '', '', '', '2021', 'January'),
(5, 8, 'Normal', 'Normal', 21, 'Baik', 'Lebih', '', '', '', '', '2021', 'February'),
(6, 14, 'Normal', 'Normal', 22, 'Baik', 'Lebih', '', '', '', '', '2021', 'February'),
(7, 33, '55 kg', '150 cm', 3, NULL, NULL, '02/02/2021', '02/01/2021', 'II', '12.3', '2021', 'May');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `suami` varchar(30) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `t_lahir` varchar(100) DEFAULT NULL,
  `TTL` varchar(100) DEFAULT NULL,
  `kelamin` varchar(20) DEFAULT NULL,
  `kriteria` varchar(20) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `id_desa` varchar(10) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `created` varchar(100) NOT NULL,
  `modifed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `suami`, `nik`, `t_lahir`, `TTL`, `kelamin`, `kriteria`, `nama_ibu`, `level`, `id_desa`, `is_active`, `created`, `modifed`) VALUES
(1, 'admin1', '$2y$10$6zR.ULlpjiPFnnejEI3o/.JE5zErN7nQGfGjXqfdbKEgiWCmNuhlm', 'Maria 55', '', '', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, 1, '10-03-2021 03:51:04', '30-03-2021 01:37:19'),
(2, 'lancok', '$2y$10$lwNSOpnjAOhJkAiGxA13jeZ4W6NhYDMfVFHw3EszTBuIT.DB/Q5uK', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-LNC', 1, '14-03-2021 03:51:04', NULL),
(3, 'geudong', '$2y$10$lwNSOpnjAOhJkAiGxA13jeZ4W6NhYDMfVFHw3EszTBuIT.DB/Q5uK', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-GDG', 1, '10-03-2021 03:51:04', NULL),
(4, 'meuneng', '$2y$10$lwNSOpnjAOhJkAiGxA13jeZ4W6NhYDMfVFHw3EszTBuIT.DB/Q5uK', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-PYM', 1, '10-03-2021 03:51:04', NULL),
(5, 'ijue', '$2y$10$lwNSOpnjAOhJkAiGxA13jeZ4W6NhYDMfVFHw3EszTBuIT.DB/Q5uK', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-CIJ', 1, '10-03-2021 03:51:04', '01-04-2021 01:33:29'),
(6, 'reuhat', '$2y$10$lwNSOpnjAOhJkAiGxA13jeZ4W6NhYDMfVFHw3EszTBuIT.DB/Q5uK', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-PYR', 1, '10-03-2021 03:51:04', NULL),
(7, 'kumbang', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-KMB', 1, '10-03-2021 03:51:04', '02-04-2021 16:13:57'),
(8, 'boy123', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'Boy William', '', '1234566789026178', 'Kumbang', '10-03-2017', 'Pria', 'Balita', 'Mursyidah', 'peserta', 'D-KMB', 1, '19-03-2021 00:55:24', '02-04-2021 15:50:06'),
(14, 'mimi123', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'Mimiyati', '', '4124444432414', 'Kumbang', '10-03-2018', 'Wanita', 'Balita', 'Mahfuzah', 'peserta', 'D-KMB', 1, '19-03-2021 00:55:24', '30-03-2021 02:37:44'),
(15, 'lili123', '$2y$10$illnGBPdvW7DOK9PNo9bwOYsgT0ROngXADbH2MesM7UuXnJS0keRC', 'Lilis', '', '324234242442423', 'Lancok', '10-03-2002', 'Wanita', 'Ibu Hamil', 'Mahfuzah', 'peserta', 'D-LNC', 1, '16-03-2021 11:59:55', '30-03-2021 03:20:21'),
(17, 'mane', '$2y$10$MwR4PacxnFWm11CMHlz0juDw9v3Rn45n5MWnSGy4WJHY1SEcJzhHS', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-MNE', 1, '17-03-2021 14:16:25', NULL),
(18, 'desi123', '$2y$10$tWYqXvNt7pYSzcGHVsyqXOKOmnya5x2/ICg1Im22mULsLBf628w/m', 'Desi Wahyuni', '', '12421412412412421', 'Bireuen', '10-03-1990', 'Wanita', 'Ibu Hamil', 'Mahfuzah', 'peserta', 'D-MNE', 1, '16-03-2021 11:57:25', '30-03-2021 03:31:58'),
(19, 'rabu', '$2y$10$Iu3JRdr0B90vvwB6tvcJA.tvSDjUOTz5u0L1OFw0JgvKh33wM45ai', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-RBU', 1, '17-03-2021 14:16:25', NULL),
(20, 'intan123', '$2y$10$yIcxki21xfRgW1uOO23wW.7XoTOIkWHvaD4GFia/0c8vKisegwfaa', 'Intan Saputri', '', '45875873878325', 'dfdsfk', '02/18/2016', 'Wanita', 'Balita', 'Sari', 'peserta', 'D-LNC', 1, '19-03-2021 00:55:24', '30-03-2021 02:48:50'),
(21, 'asali123', '$2y$10$uqSEXX3iM.Wj3PBc6TmUdukFbtzeWiFY0/q4iQM7b/Y.LJj0XPjcy', 'Razali S', '', '4445525252', NULL, '08/04/2020', 'Pria', 'Balita', 'Marhami', '', 'D-GDG', 1, '19-03-2021 02:33:22', NULL),
(22, 'gfdgdfg', '$2y$10$OuFgTV8imVbI.RiGSJ.xQ.qsJTnBK3QaAYkq98IRImgnXbDp4GG3K', 'fddfbd', '', '22235232', 'jhkjh', '08/05/2020', 'Pria', 'Balita', 'gdfgdfgdfg', 'peserta', 'D-CIJ', 1, '19-03-2021 02:38:17', '30-03-2021 02:47:15'),
(24, '', '$2y$10$5M1EUDnGgywYhAf3G4P7au/iUeEwpZTpFiFpJnOk0v8n.mR8YLF.e', '', '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '28-03-2021 01:29:25', '29-03-2021 22:00:05'),
(25, 'buloh', '$2y$10$GpRZXjZD.isbOBPxzpS47ei7kXmkTy9iHQyvEMKaUgt6g4YDy8G.i', '', '', '', NULL, NULL, NULL, NULL, NULL, 'desa', 'D-BLB', 1, '28-03-2021 01:31:25', '01-04-2021 01:45:26'),
(26, 'admin2', '$2y$10$FXvc5/7X4IUPnAXAGVrN9.aHOKH.1qTvwY4039e99MIFfgdVllHji', 'Fabio', '', '', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, 1, '29-03-2021 22:07:31', '30-03-2021 01:16:50'),
(27, '', '$2y$10$XRC.0QWEFPCPjY3//wOgQu5VmTgGu7I6A/jDn9i8G61SjrnMLUW5q', '', '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '29-03-2021 22:08:55', '29-03-2021 22:09:03'),
(29, 'panitia1', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'Rida', '', '', NULL, NULL, NULL, NULL, NULL, 'panitia', 'D-KMB', 1, '31-03-2021 00:33:11', NULL),
(30, 'panitia2', '$2y$10$hVWtSg1bRZsJBs2GnT2bR.hTxJbeXfUjuSa/XerD8GMyJJz.d3l0O', 'Moha', '', '', NULL, NULL, NULL, NULL, NULL, 'panitia', 'D-CIJ', 1, '31-03-2021 00:40:54', '02-04-2021 15:57:56'),
(32, '123', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'kkk', '', '', NULL, NULL, NULL, NULL, NULL, 'panitia', 'D-KMB', 1, '02-04-2021 01:35:36', '02-04-2021 02:04:25'),
(33, 'maryam', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'Siti Maryam', 'Ali Markum', '131000484384', 'Kumbang', '10-03-1990', 'Wanita', 'Ibu Hamil', NULL, 'peserta', 'D-KMB', 1, '19-04-2021 00:55:24', NULL),
(34, 'suharni', '$2y$10$UlXq0Sai4644GAoIfNNqXedU/4lAfsA0VzQmlIXGAR10FvtMOUitu', 'Maryati Suharni', 'Maimun Rahman', '0045487283428', 'Kumbang', '10-03-1990', 'Wanita', 'Ibu Hamil', NULL, 'peserta', 'D-KMB', 1, '19-04-2021 00:55:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id_posyandu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id_posyandu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
