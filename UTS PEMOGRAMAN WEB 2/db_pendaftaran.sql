-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2026 pada 14.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `matematika` decimal(5,2) NOT NULL,
  `bahasa_inggris` decimal(5,2) NOT NULL,
  `umum` decimal(5,2) NOT NULL,
  `rata_rata` decimal(5,2) NOT NULL,
  `tempat_tes` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `tgl_input`, `kode`, `nama`, `jk`, `asal_sekolah`, `pekerjaan_ortu`, `tempat_lahir`, `tgl_lahir`, `matematika`, `bahasa_inggris`, `umum`, `rata_rata`, `tempat_tes`, `keterangan`) VALUES
(1, '2026-08-30', '1221', 'FADIL', 'Laki-laki', 'SMP', 'RUMAH TANGGA', 'TANGERANG', '2001-02-20', 77.00, 77.00, 76.80, 76.93, 'Tidak Diketahui', 'Lulus'),
(2, '2026-08-30', '22222', 'FADILAH12', 'Laki-laki', 'TRIMULIA', 'TI', 'TANGERANG', '2001-02-20', 89.00, 89.00, 77.00, 85.00, 'Tidak Diketahui', 'Lulus'),
(3, '2026-08-30', '22222', 'FADILAH12', 'Laki-laki', 'TRIMULIA', 'TI', 'TANGERANG', '2001-02-20', 89.00, 89.00, 77.00, 85.00, 'Tidak Diketahui', 'Lulus'),
(4, '2026-10-30', '1101010', 'FADILAH', 'Laki-Laki', 'UNPAM', 'TI', 'TANGERANG', '2001-02-20', 88.00, 77.00, 77.00, 80.67, 'Tidak Diketahui', 'Lulus'),
(5, '2026-10-30', '1101010', 'FADILAH', 'Laki-Laki', 'UNPAM', 'TI', 'TANGERANG', '2001-02-20', 88.00, 77.00, 77.00, 80.67, 'Tidak Diketahui', 'Lulus'),
(6, '2026-10-30', '1101010', 'FADILAH', 'Laki-Laki', 'UNPAM', 'TI', 'TANGERANG', '2001-02-20', 88.00, 77.00, 77.00, 80.67, 'Tidak Diketahui', 'Lulus'),
(7, '2026-09-30', '9999', 'FADILAH', 'Laki-Laki', 'ECQEC', 'ECWCEWC', 'REWEV', '2001-02-20', 99.00, 99.00, 99.00, 99.00, 'Tidak Diketahui', 'Lulus'),
(8, '2000-02-20', '999', '9999', 'Laki-Laki', 'HJBHB', 'BHJBBBKHB', 'HBKBI', '0999-09-09', 99.00, 99.00, 99.00, 99.00, 'Tidak Diketahui', 'Lulus'),
(9, '2026-10-20', '50505', 'RAHMA', 'Laki-Laki', 'SUMPAH PEMUDA', 'RUMAH TANGGA', 'TANGERANG', '2001-02-20', 88.00, 88.00, 88.00, 88.00, 'Tidak Diketahui', 'Lulus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
