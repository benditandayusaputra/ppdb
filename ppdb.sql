-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 03:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `upload_izajah` varchar(50) DEFAULT NULL,
  `upload_skhun` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` varchar(125) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nis`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telpon`, `upload_izajah`, `upload_skhun`, `bukti_pembayaran`, `status`, `created`) VALUES
(1, NULL, NULL, 'muhamad aldi setiawan', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'logo4.png', 0, '2021-07-28 22:30:46'),
(2, NULL, NULL, 'lutfi', 'Perempuan', 'Tangerang', '2021-07-28', 'islam', 'pekayon', '0895334930932', NULL, NULL, 'download.png', 0, '2021-07-28 22:41:56'),
(3, NULL, NULL, 'muhamad aldi setiawan', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'images.png', 0, '2021-07-28 22:48:35'),
(4, NULL, NULL, 'admin', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'Untitled-1.png', 0, '2021-07-28 22:50:05'),
(5, NULL, NULL, 'feri', 'Laki - laki', 'Tangerang', '2021-07-13', 'islam', 'tanah merah', '0895334930932', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02_(3).jpeg', 0, '2021-07-29 20:51:18'),
(6, NULL, NULL, 'diti', 'Perempuan', 'Tangerang', '2021-07-07', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02.jpeg', 0, '2021-07-29 21:30:44'),
(7, NULL, NULL, 'aldi skax', 'Laki - laki', 'Tangerang', '2017-02-28', 'islam', 'sepatan timur', '0895334930931', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02_(2).jpeg', 0, '2021-07-29 21:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_pendaftaran`, `nama`, `email`, `password`, `role_id`, `status`, `created`) VALUES
(1, 2, 'lutfi', 'lutfi@gmail.com', '$2y$10$qn9A188GXELxGEPSfb6JWevfzdOJYktfJSjb1jB079bAu9OcrgjPO', 2, 0, '2021-07-28 22:41:56'),
(2, 3, 'muhamad aldi setiawan', 'aldi@gmail.com', '$2y$10$wP6.sMD7zhlA2NWrowp.XuI5SHCN1sHC9knam27X0RdOi6Wla/vA.', 2, 1, '2021-07-28 22:48:35'),
(3, 4, 'admin', 'admin@gmail.com', '$2y$10$Zu3BBoRwN365v3JOTTUw2eQyBjuOmqpcDUHarp9YSGF2LO0QrNQCe', 1, 1, '2021-07-28 22:50:05'),
(4, 0, 'feri', 'feri@gmail.com', '$2y$10$YTlHuvVfRV3W1XOXpq/sXOUT7rwLEYvH9pf7a3/iWl78cCbWLc6lu', 2, 1, '2021-07-29 20:51:18'),
(5, 0, 'diti', 'diti@gmail.com', '$2y$10$WyWGYeLUzwxAX2.Fa3.zlu8.WBCL.fh9pVTk5/mAUiqbeOLHFL/kG', 2, 1, '2021-07-29 21:30:44'),
(6, 0, 'aldi skax', 'aldiskax@gmail.com', '$2y$10$hMhlDt/TNxTq94prIFQKv.gFpQpoTGU6MDuWXTzoTrFS7t7jFpHf.', 2, 1, '2021-07-29 21:39:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
