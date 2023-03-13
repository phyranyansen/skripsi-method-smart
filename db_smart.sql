-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2023 pada 03.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `Id_Bobot` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Bobot` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konversi`
--

CREATE TABLE `konversi` (
  `Id_Konversi` int(11) NOT NULL,
  `Kode_Pariwisata` varchar(150) NOT NULL,
  `Kode_Kriteria` varchar(150) NOT NULL,
  `Nilai` varchar(100) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `Id_Kriteria` int(11) NOT NULL,
  `Kode_Kriteria` varchar(50) NOT NULL,
  `Nama_Kriteria` varchar(250) NOT NULL,
  `Atribut` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`Id_Kriteria`, `Kode_Kriteria`, `Nama_Kriteria`, `Atribut`) VALUES
(1, 'K01', 'Jarak', 'Cost'),
(2, 'K02', 'Harga Tiket', 'Cost'),
(3, 'K03', 'Jam Operasional', 'Cost'),
(4, 'K04', 'Aksebility', 'Benefit'),
(5, 'K05', 'Fasilitas', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `Id_Kriteria_Detail` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Value1` varchar(100) NOT NULL,
  `Value2` varchar(100) NOT NULL,
  `Keterangan` text NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`Id_Kriteria_Detail`, `Id_Kriteria`, `Value1`, `Value2`, `Keterangan`, `Rate`) VALUES
(1, 1, '15 - 20', '', 'Sangat Dekat', 5),
(2, 1, '21 - 25', '', 'Dekat', 4),
(3, 1, '26 - 29', '', 'Sedang', 3),
(4, 1, '30 - 35', '', 'Jauh', 1),
(5, 2, '5.000 - 5.0000', '', 'Sangat Murah', 5),
(6, 2, '51.000 - 100.000', '', 'Murah', 4),
(7, 2, '101.000 - 200.000', '', 'Sedang', 3),
(8, 2, '201.000 - 300.000', '', 'Mahal', 2),
(9, 2, '301.000', '', 'Sangat Mahal', 1),
(10, 3, '7.00 - 10.00\n', '', 'pagi', 4),
(11, 3, '11.00 - 14.00', '', 'siang', 3),
(12, 3, '15.00 - 18.00', '', 'sore', 2),
(13, 3, '19.00 - 00.00', '', 'malam', 1),
(14, 4, 'Sepeda Motor, Mobil, Elf, Bis', '', '', 4),
(15, 4, 'Sepeda Motor, Mobil, Elf/Bis', '', '', 3),
(16, 4, 'Sepeda Motor, Mobil', '', '', 2),
(17, 4, 'Sepeda Motor', '', '', 1),
(18, 5, 'Lengkap', '', '', 4),
(19, 5, 'Toilet, Mushola, Tempat makan', '', '', 3),
(20, 5, 'Toilet, Mushola', '', '', 2),
(21, 5, 'Toilet, Mushola, Tempat Makan, Tempat anak', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `Id_login` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Status` int(11) NOT NULL,
  `Activated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `Id_Menu` int(11) NOT NULL,
  `Nama_Menu` varchar(250) NOT NULL,
  `script` text NOT NULL,
  `Link` text NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata`
--

CREATE TABLE `pariwisata` (
  `Id_Pariwisata` int(11) NOT NULL,
  `Kode_Pariwisata` varchar(50) NOT NULL,
  `Nama_Pariwisata` varchar(250) NOT NULL,
  `Jarak` varchar(100) NOT NULL,
  `Tiket_Masuk` varchar(150) NOT NULL,
  `Jam_Operasional` varchar(150) NOT NULL,
  `Aksebility` varchar(150) NOT NULL,
  `Fasilitas` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` varchar(50) NOT NULL,
  `RandomCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_harga_tiket`
--

CREATE TABLE `sub_kriteria_harga_tiket` (
  `Id_Harga` int(11) NOT NULL,
  `Harga` varchar(150) NOT NULL,
  `Prioritas` int(11) NOT NULL,
  `Keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_jarak`
--

CREATE TABLE `sub_kriteria_jarak` (
  `Id_Jarak` int(11) NOT NULL,
  `Jarak` varchar(150) NOT NULL,
  `Prioritas` int(11) NOT NULL,
  `Keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`Id_Bobot`);

--
-- Indeks untuk tabel `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`Id_Konversi`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`Id_Kriteria`);

--
-- Indeks untuk tabel `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  ADD PRIMARY KEY (`Id_Kriteria_Detail`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_login`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id_Menu`);

--
-- Indeks untuk tabel `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`Id_Pariwisata`);

--
-- Indeks untuk tabel `sub_kriteria_harga_tiket`
--
ALTER TABLE `sub_kriteria_harga_tiket`
  ADD PRIMARY KEY (`Id_Harga`);

--
-- Indeks untuk tabel `sub_kriteria_jarak`
--
ALTER TABLE `sub_kriteria_jarak`
  ADD PRIMARY KEY (`Id_Jarak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `Id_Bobot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konversi`
--
ALTER TABLE `konversi`
  MODIFY `Id_Konversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `Id_Kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `Id_Kriteria_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `Id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `Id_Menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `Id_Pariwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_harga_tiket`
--
ALTER TABLE `sub_kriteria_harga_tiket`
  MODIFY `Id_Harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_jarak`
--
ALTER TABLE `sub_kriteria_jarak`
  MODIFY `Id_Jarak` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
