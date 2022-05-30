-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2022 pada 16.41
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mining`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nm_lengkap` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nm_lengkap`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nmb` varchar(25) NOT NULL,
  `stok` int(2) NOT NULL,
  `jan` int(2) NOT NULL,
  `feb` int(2) NOT NULL,
  `mar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nmb`, `stok`, `jan`, `feb`, `mar`) VALUES
(1, 'NAMA BARANG', 45, 5, 10, 8),
(2, 'Yoesani Women Shoes A502', 31, 8, 5, 5),
(3, 'Yoesani Women Shoes A503', 38, 7, 11, 10),
(4, 'Yoesani Women Shoes A504', 21, 1, 3, 1),
(5, 'Yoesani Women Shoes A505', 35, 13, 10, 8),
(6, 'Yoesani Women Boots A600', 26, 9, 7, 6),
(7, 'Yoesani Women Boots A601', 36, 11, 9, 12),
(8, 'Yoesani Women Boots A602', 40, 9, 15, 13),
(9, 'Yoesani Women Boots A603', 30, 2, 6, 4),
(10, 'Yoesani Women Boots A604', 40, 19, 6, 11),
(11, 'Yoesani Men Shoes A01', 20, 4, 4, 4),
(12, 'Yoesani Men Shoes A02', 35, 9, 9, 14),
(13, 'Yoesani Men Shoes A03', 30, 6, 8, 0),
(14, 'Yoesani Men Shoes A04', 12, 2, 4, 2),
(15, 'Yoesani Men Shoes A05', 45, 14, 10, 12),
(16, 'Yoesani Men Boots A200', 29, 4, 3, 5),
(17, 'Yoesani Men Boots A201', 35, 10, 9, 11),
(18, 'Yoesani Men Boots A202', 36, 11, 8, 9),
(19, 'Yoesani Men Boots A203', 35, 9, 11, 6),
(20, 'Yoesani Men Boots A204', 38, 13, 13, 10),
(21, 'ad', 123, 12, 23, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `c1` int(2) NOT NULL,
  `c2` int(4) NOT NULL,
  `c1y` int(2) NOT NULL,
  `c2y` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `c1`, `c2`, `c1y`, `c2y`) VALUES
(1, 45, 25, 30, 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
