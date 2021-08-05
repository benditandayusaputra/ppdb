-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 16.52
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `jenis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id`, `jenis`) VALUES
(1, 'SPP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `nama_jurusan`) VALUES
(2, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`) VALUES
(1, 'X RPL 1'),
(3, 'X RPL 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `jensi_pembayaran_id` int(11) NOT NULL,
  `foto_bukti` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `upload_ijazah` varchar(50) DEFAULT NULL,
  `upload_skhun` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` varchar(125) NOT NULL,
  `kode_siswa` char(10) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `nis`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telpon`, `upload_ijazah`, `upload_skhun`, `bukti_pembayaran`, `kode_siswa`, `status`, `created`) VALUES
(1, NULL, NULL, 'muhamad aldi setiawan', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'logo4.png', '', 0, '2021-07-28 22:30:46'),
(2, NULL, NULL, 'lutfi', 'Perempuan', 'Tangerang', '2021-07-28', 'islam', 'pekayon', '0895334930932', NULL, NULL, 'download.png', '', 0, '2021-07-28 22:41:56'),
(3, NULL, NULL, 'muhamad aldi setiawan', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'images.png', '', 0, '2021-07-28 22:48:35'),
(4, NULL, NULL, 'admin', 'Laki - laki', 'Tangerang', '2021-07-28', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'Untitled-1.png', '', 0, '2021-07-28 22:50:05'),
(5, NULL, NULL, 'feri', 'Laki - laki', 'Tangerang', '2021-07-13', 'islam', 'tanah merah', '0895334930932', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02_(3).jpeg', '', 0, '2021-07-29 20:51:18'),
(6, NULL, NULL, 'diti', 'Perempuan', 'Tangerang', '2021-07-07', 'islam', 'sepatan', '0895334930931', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02.jpeg', '', 0, '2021-07-29 21:30:44'),
(7, NULL, NULL, 'aldi skax', 'Laki - laki', 'Tangerang', '2017-02-28', 'islam', 'sepatan timur', '0895334930931', NULL, NULL, 'WhatsApp_Image_2021-07-05_at_14_09_02_(2).jpeg', '', 0, '2021-07-29 21:39:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `pendaftaran_id`, `jurusan_id`, `kelas_id`, `nama`, `email`, `password`, `role_id`, `status`, `created`) VALUES
(1, 2, 0, 0, 'lutfi', 'lutfi@gmail.com', '$2y$10$qn9A188GXELxGEPSfb6JWevfzdOJYktfJSjb1jB079bAu9OcrgjPO', 2, 1, '2021-07-28 22:41:56'),
(2, 3, 0, 0, 'muhamad aldi setiawan', 'aldi@gmail.com', '$2y$10$wP6.sMD7zhlA2NWrowp.XuI5SHCN1sHC9knam27X0RdOi6Wla/vA.', 2, 0, '2021-07-28 22:48:35'),
(3, 4, 0, 0, 'admin', 'admin@gmail.com', '$2y$10$Zu3BBoRwN365v3JOTTUw2eQyBjuOmqpcDUHarp9YSGF2LO0QrNQCe', 1, 1, '2021-07-28 22:50:05'),
(4, 5, 0, 0, 'feri', 'feri@gmail.com', '$2y$10$YTlHuvVfRV3W1XOXpq/sXOUT7rwLEYvH9pf7a3/iWl78cCbWLc6lu', 2, 1, '2021-07-29 20:51:18'),
(5, 6, 0, 0, 'diti', 'diti@gmail.com', '$2y$10$WyWGYeLUzwxAX2.Fa3.zlu8.WBCL.fh9pVTk5/mAUiqbeOLHFL/kG', 2, 1, '2021-07-29 21:30:44'),
(6, 7, 0, 0, 'aldi skax', 'aldiskax@gmail.com', '$2y$10$hMhlDt/TNxTq94prIFQKv.gFpQpoTGU6MDuWXTzoTrFS7t7jFpHf.', 2, 1, '2021-07-29 21:39:44'),
(8, 0, 0, 0, 'Bendi Tandayu', 'dayu2510@gmail.com', '$2y$10$9t45QYdJNNQet4GnBcD3VuT/yG6lUNiqY74s8hc4llDZkwCsAx74G', 1, 1, '2021-08-05 21:10:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
