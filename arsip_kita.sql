-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2024 pada 16.23
-- Versi server: 8.0.23
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_kita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Glen Situmorang', 'admin', '0192023a7bbd73250516f069df18b500', '1552886521_gee.jpg'),
(2, 'gee', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '807574465_gee.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int NOT NULL,
  `arsip_kode` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_jenis` varchar(255) NOT NULL,
  `arsip_kategori` int NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `arsip_keterangan`, `arsip_file`) VALUES
(16, '2024-04-03 20:36:41', 2, '1133', 'alstrudat', 'zip', 3, 'alstrudat', '618323438_UTS_ALSTRUDAT_13323035.zip'),
(24, '2024-04-29 08:48:27', 4, '1122', 'ALSTRUDAT', 'zip', 2, 'Submitan', '568380790_W11S02_ALSTRUDAT_13323035.zip'),
(25, '2024-04-29 09:11:02', 4, '2233', 'PABI', 'pdf', 2, 'PABI', '828761982_CRUD_Laravel_13323035.pdf'),
(26, '2024-04-29 09:12:12', 4, '3344', 'Foto orang ganteng', 'jpg', 4, 'cogan', '750525518_gee.jpg'),
(27, '2024-05-04 20:23:28', 4, '113322', '123', 'zip', 3, 'UTS\r\n', '1648703923_UTS_ALSTRUDAT_13323035.zip'),
(28, '2024-05-06 10:07:50', 4, '1122', 'alstrudat', 'zip', 1, 'Tugas', '155127110_W11S02_ALSTRUDAT_13323035.zip'),
(29, '2024-05-06 11:37:58', 4, '232', 'wafs', 'zip', 3, 'ewf', '1366813737_Kuis2_13323035.zip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`) VALUES
(1, 'Tidak berkategori', 'Semua yang tidak memiliki kategori'),
(3, 'Tools/Zip', 'zip'),
(4, 'Gambar', 'gif/jpg/png'),
(11, 'Code', 'Codingan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int NOT NULL,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_foto`) VALUES
(2, 'gee', 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', '1248875127_gee.jpg'),
(4, 'Glen Situmorang', 'petugas1', 'b53fe7751b37e40ff34d012c7774d65f', '592334940_WhatsApp Image 2023-11-23 at 08.35.41_7787a692.jpg'),
(7, 'Gee', 'cpdt Gee Situmorang', '202cb962ac59075b964b07152d234b70', '834344145_gee.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int NOT NULL,
  `riwayat_waktu` datetime NOT NULL,
  `riwayat_user` int NOT NULL,
  `riwayat_arsip` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_waktu`, `riwayat_user`, `riwayat_arsip`) VALUES
(1, '2024-03-27 15:32:29', 8, 3),
(11, '2024-03-28 11:35:37', 12, 11),
(12, '2024-03-28 17:18:59', 12, 12),
(13, '2024-04-02 11:38:09', 12, 14),
(14, '2024-04-08 21:25:47', 15, 19),
(15, '2024-04-08 21:31:30', 15, 20),
(16, '2024-04-29 09:14:41', 12, 26),
(17, '2024-04-29 09:14:46', 12, 25),
(18, '2024-04-29 09:14:51', 12, 24),
(19, '2024-04-29 09:17:17', 13, 26),
(20, '2024-04-29 09:17:21', 13, 25),
(21, '2024-04-29 09:17:24', 13, 24),
(22, '2024-04-29 09:17:33', 13, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(12, 'Enjelita Sitorus', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', '1845876005_enjel.jpg'),
(13, 'Naomi Butar-butar', 'user2', '7e58d63b60197ceb55a1c487989a3720', '349608633_naomi.jpg'),
(14, 'Glen Rifael Situmorang', '13323035', 'a97b723b68a5a4b8e2ea08d42b282ba8', ''),
(19, 'Alfred Manurung', '13323034', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
