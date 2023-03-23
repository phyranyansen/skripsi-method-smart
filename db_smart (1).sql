-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2023 pada 02.54
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

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`Id_Bobot`, `Id_Kriteria`, `Bobot`) VALUES
(1, 1, '30'),
(2, 2, '25'),
(3, 3, '10'),
(4, 4, '20'),
(5, 5, '15');

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

--
-- Dumping data untuk tabel `konversi`
--

INSERT INTO `konversi` (`Id_Konversi`, `Kode_Pariwisata`, `Kode_Kriteria`, `Nilai`, `CreatedBy`, `CreatedDate`) VALUES
(10201, 'PRW/2023/001', 'K01', '5', 0, '2023-03-16'),
(10202, 'PRW/2023/001', 'K02', '4', 0, '2023-03-16'),
(10203, 'PRW/2023/001', 'K03', '4', 0, '2023-03-16'),
(10204, 'PRW/2023/001', 'K04', '4', 0, '2023-03-16'),
(10205, 'PRW/2023/001', 'K05', '4', 0, '2023-03-16'),
(10206, 'PRW/2023/002', 'K01', '4', 0, '2023-03-16'),
(10207, 'PRW/2023/002', 'K02', '3', 0, '2023-03-16'),
(10208, 'PRW/2023/002', 'K03', '4', 0, '2023-03-16'),
(10209, 'PRW/2023/002', 'K04', '4', 0, '2023-03-16'),
(10210, 'PRW/2023/002', 'K05', '4', 0, '2023-03-16'),
(10211, 'PRW/2023/003', 'K01', '5', 0, '2023-03-16'),
(10212, 'PRW/2023/003', 'K02', '4', 0, '2023-03-16'),
(10213, 'PRW/2023/003', 'K03', '3', 0, '2023-03-16'),
(10214, 'PRW/2023/003', 'K04', '4', 0, '2023-03-16'),
(10215, 'PRW/2023/003', 'K05', '4', 0, '2023-03-16'),
(10216, 'PRW/2023/004', 'K01', '5', 0, '2023-03-16'),
(10217, 'PRW/2023/004', 'K02', '5', 0, '2023-03-16'),
(10218, 'PRW/2023/004', 'K03', '4', 0, '2023-03-16'),
(10219, 'PRW/2023/004', 'K04', '4', 0, '2023-03-16'),
(10220, 'PRW/2023/004', 'K05', '4', 0, '2023-03-16'),
(10221, 'PRW/2023/005', 'K01', '5', 0, '2023-03-16'),
(10222, 'PRW/2023/005', 'K02', '3', 0, '2023-03-16'),
(10223, 'PRW/2023/005', 'K03', '3', 0, '2023-03-16'),
(10224, 'PRW/2023/005', 'K04', '4', 0, '2023-03-16'),
(10225, 'PRW/2023/005', 'K05', '4', 0, '2023-03-16'),
(10226, 'PRW/2023/006', 'K01', '3', 0, '2023-03-16'),
(10227, 'PRW/2023/006', 'K02', '5', 0, '2023-03-16'),
(10228, 'PRW/2023/006', 'K03', '4', 0, '2023-03-16'),
(10229, 'PRW/2023/006', 'K04', '3', 0, '2023-03-16'),
(10230, 'PRW/2023/006', 'K05', '3', 0, '2023-03-16'),
(10231, 'PRW/2023/007', 'K01', '3', 0, '2023-03-16'),
(10232, 'PRW/2023/007', 'K02', '5', 0, '2023-03-16'),
(10233, 'PRW/2023/007', 'K03', '4', 0, '2023-03-16'),
(10234, 'PRW/2023/007', 'K04', '4', 0, '2023-03-16'),
(10235, 'PRW/2023/007', 'K05', '3', 0, '2023-03-16'),
(10236, 'PRW/2023/008', 'K01', '5', 0, '2023-03-16'),
(10237, 'PRW/2023/008', 'K02', '5', 0, '2023-03-16'),
(10238, 'PRW/2023/008', 'K03', '2', 0, '2023-03-16'),
(10239, 'PRW/2023/008', 'K04', '4', 0, '2023-03-16'),
(10240, 'PRW/2023/008', 'K05', '4', 0, '2023-03-16'),
(10241, 'PRW/2023/009', 'K01', '5', 0, '2023-03-16'),
(10242, 'PRW/2023/009', 'K02', '4', 0, '2023-03-16'),
(10243, 'PRW/2023/009', 'K03', '4', 0, '2023-03-16'),
(10244, 'PRW/2023/009', 'K04', '4', 0, '2023-03-16'),
(10245, 'PRW/2023/009', 'K05', '4', 0, '2023-03-16'),
(10246, 'PRW/2023/0010', 'K01', '4', 0, '2023-03-16'),
(10247, 'PRW/2023/0010', 'K02', '1', 0, '2023-03-16'),
(10248, 'PRW/2023/0010', 'K03', '4', 0, '2023-03-16'),
(10249, 'PRW/2023/0010', 'K04', '2', 0, '2023-03-16'),
(10250, 'PRW/2023/0010', 'K05', '3', 0, '2023-03-16'),
(10251, 'PRW/2023/0011', 'K01', '3', 0, '2023-03-16'),
(10252, 'PRW/2023/0011', 'K02', '5', 0, '2023-03-16'),
(10253, 'PRW/2023/0011', 'K03', '4', 0, '2023-03-16'),
(10254, 'PRW/2023/0011', 'K04', '3', 0, '2023-03-16'),
(10255, 'PRW/2023/0011', 'K05', '3', 0, '2023-03-16'),
(10256, 'PRW/2023/0012', 'K01', '5', 0, '2023-03-16'),
(10257, 'PRW/2023/0012', 'K02', '5', 0, '2023-03-16'),
(10258, 'PRW/2023/0012', 'K03', '4', 0, '2023-03-16'),
(10259, 'PRW/2023/0012', 'K04', '2', 0, '2023-03-16'),
(10260, 'PRW/2023/0012', 'K05', '2', 0, '2023-03-16'),
(10261, 'PRW/2023/0013', 'K01', '5', 0, '2023-03-16'),
(10262, 'PRW/2023/0013', 'K02', '4', 0, '2023-03-16'),
(10263, 'PRW/2023/0013', 'K03', '4', 0, '2023-03-16'),
(10264, 'PRW/2023/0013', 'K04', '4', 0, '2023-03-16'),
(10265, 'PRW/2023/0013', 'K05', '4', 0, '2023-03-16'),
(10266, 'PRW/2023/0014', 'K01', '3', 0, '2023-03-16'),
(10267, 'PRW/2023/0014', 'K02', '5', 0, '2023-03-16'),
(10268, 'PRW/2023/0014', 'K03', '4', 0, '2023-03-16'),
(10269, 'PRW/2023/0014', 'K04', '2', 0, '2023-03-16'),
(10270, 'PRW/2023/0014', 'K05', '3', 0, '2023-03-16'),
(10271, 'PRW/2023/0015', 'K01', '5', 0, '2023-03-16'),
(10272, 'PRW/2023/0015', 'K02', '5', 0, '2023-03-16'),
(10273, 'PRW/2023/0015', 'K03', '4', 0, '2023-03-16'),
(10274, 'PRW/2023/0015', 'K04', '2', 0, '2023-03-16'),
(10275, 'PRW/2023/0015', 'K05', '2', 0, '2023-03-16'),
(10276, 'PRW/2023/0016', 'K01', '1', 0, '2023-03-16'),
(10277, 'PRW/2023/0016', 'K02', '5', 0, '2023-03-16'),
(10278, 'PRW/2023/0016', 'K03', '4', 0, '2023-03-16'),
(10279, 'PRW/2023/0016', 'K04', '3', 0, '2023-03-16'),
(10280, 'PRW/2023/0016', 'K05', '3', 0, '2023-03-16'),
(10281, 'PRW/2023/0017', 'K01', '3', 0, '2023-03-16'),
(10282, 'PRW/2023/0017', 'K02', '5', 0, '2023-03-16'),
(10283, 'PRW/2023/0017', 'K03', '4', 0, '2023-03-16'),
(10284, 'PRW/2023/0017', 'K04', '4', 0, '2023-03-16'),
(10285, 'PRW/2023/0017', 'K05', '4', 0, '2023-03-16'),
(10286, 'PRW/2023/0018', 'K01', '4', 0, '2023-03-16'),
(10287, 'PRW/2023/0018', 'K02', '5', 0, '2023-03-16'),
(10288, 'PRW/2023/0018', 'K03', '4', 0, '2023-03-16'),
(10289, 'PRW/2023/0018', 'K04', '4', 0, '2023-03-16'),
(10290, 'PRW/2023/0018', 'K05', '4', 0, '2023-03-16'),
(10291, 'PRW/2023/0019', 'K01', '2', 0, '2023-03-16'),
(10292, 'PRW/2023/0019', 'K02', '5', 0, '2023-03-16'),
(10293, 'PRW/2023/0019', 'K03', '4', 0, '2023-03-16'),
(10294, 'PRW/2023/0019', 'K04', '3', 0, '2023-03-16'),
(10295, 'PRW/2023/0019', 'K05', '2', 0, '2023-03-16'),
(10296, 'PRW/2023/0020', 'K01', '5', 0, '2023-03-16'),
(10297, 'PRW/2023/0020', 'K02', '4', 0, '2023-03-16'),
(10298, 'PRW/2023/0020', 'K03', '2', 0, '2023-03-16'),
(10299, 'PRW/2023/0020', 'K04', '4', 0, '2023-03-16'),
(10300, 'PRW/2023/0020', 'K05', '4', 0, '2023-03-16'),
(10301, 'PRW/2023/0021', 'K01', '5', 0, '2023-03-16'),
(10302, 'PRW/2023/0021', 'K02', '5', 0, '2023-03-16'),
(10303, 'PRW/2023/0021', 'K03', '3', 0, '2023-03-16'),
(10304, 'PRW/2023/0021', 'K04', '4', 0, '2023-03-16'),
(10305, 'PRW/2023/0021', 'K05', '4', 0, '2023-03-16'),
(10306, 'PRW/2023/0022', 'K01', '4', 0, '2023-03-16'),
(10307, 'PRW/2023/0022', 'K02', '3', 0, '2023-03-16'),
(10308, 'PRW/2023/0022', 'K03', '4', 0, '2023-03-16'),
(10309, 'PRW/2023/0022', 'K04', '2', 0, '2023-03-16'),
(10310, 'PRW/2023/0022', 'K05', '2', 0, '2023-03-16'),
(10311, 'PRW/2023/0023', 'K01', '4', 0, '2023-03-16'),
(10312, 'PRW/2023/0023', 'K02', '5', 0, '2023-03-16'),
(10313, 'PRW/2023/0023', 'K03', '4', 0, '2023-03-16'),
(10314, 'PRW/2023/0023', 'K04', '4', 0, '2023-03-16'),
(10315, 'PRW/2023/0023', 'K05', '4', 0, '2023-03-16'),
(10316, 'PRW/2023/0024', 'K01', '3', 0, '2023-03-16'),
(10317, 'PRW/2023/0024', 'K02', '5', 0, '2023-03-16'),
(10318, 'PRW/2023/0024', 'K03', '4', 0, '2023-03-16'),
(10319, 'PRW/2023/0024', 'K04', '4', 0, '2023-03-16'),
(10320, 'PRW/2023/0024', 'K05', '3', 0, '2023-03-16'),
(10321, 'PRW/2023/0025', 'K01', '3', 0, '2023-03-16'),
(10322, 'PRW/2023/0025', 'K02', '5', 0, '2023-03-16'),
(10323, 'PRW/2023/0025', 'K03', '4', 0, '2023-03-16'),
(10324, 'PRW/2023/0025', 'K04', '4', 0, '2023-03-16'),
(10325, 'PRW/2023/0025', 'K05', '3', 0, '2023-03-16'),
(10326, 'PRW/2023/0026', 'K01', '4', 0, '2023-03-16'),
(10327, 'PRW/2023/0026', 'K02', '5', 0, '2023-03-16'),
(10328, 'PRW/2023/0026', 'K03', '4', 0, '2023-03-16'),
(10329, 'PRW/2023/0026', 'K04', '4', 0, '2023-03-16'),
(10330, 'PRW/2023/0026', 'K05', '4', 0, '2023-03-16'),
(10331, 'PRW/2023/0027', 'K01', '5', 0, '2023-03-16'),
(10332, 'PRW/2023/0027', 'K02', '5', 0, '2023-03-16'),
(10333, 'PRW/2023/0027', 'K03', '4', 0, '2023-03-16'),
(10334, 'PRW/2023/0027', 'K04', '4', 0, '2023-03-16'),
(10335, 'PRW/2023/0027', 'K05', '4', 0, '2023-03-16'),
(10336, 'PRW/2023/0028', 'K01', '4', 0, '2023-03-16'),
(10337, 'PRW/2023/0028', 'K02', '4', 0, '2023-03-16'),
(10338, 'PRW/2023/0028', 'K03', '4', 0, '2023-03-16'),
(10339, 'PRW/2023/0028', 'K04', '4', 0, '2023-03-16'),
(10340, 'PRW/2023/0028', 'K05', '4', 0, '2023-03-16'),
(10341, 'PRW/2023/0029', 'K01', '4', 0, '2023-03-16'),
(10342, 'PRW/2023/0029', 'K02', '5', 0, '2023-03-16'),
(10343, 'PRW/2023/0029', 'K03', '4', 0, '2023-03-16'),
(10344, 'PRW/2023/0029', 'K04', '4', 0, '2023-03-16'),
(10345, 'PRW/2023/0029', 'K05', '4', 0, '2023-03-16'),
(10346, 'PRW/2023/0030', 'K01', '4', 0, '2023-03-16'),
(10347, 'PRW/2023/0030', 'K02', '5', 0, '2023-03-16'),
(10348, 'PRW/2023/0030', 'K03', '4', 0, '2023-03-16'),
(10349, 'PRW/2023/0030', 'K04', '4', 0, '2023-03-16'),
(10350, 'PRW/2023/0030', 'K05', '4', 0, '2023-03-16'),
(10351, 'PRW/2023/0031', 'K01', '4', 0, '2023-03-16'),
(10352, 'PRW/2023/0031', 'K02', '5', 0, '2023-03-16'),
(10353, 'PRW/2023/0031', 'K03', '4', 0, '2023-03-16'),
(10354, 'PRW/2023/0031', 'K04', '4', 0, '2023-03-16'),
(10355, 'PRW/2023/0031', 'K05', '4', 0, '2023-03-16'),
(10356, 'PRW/2023/0032', 'K01', '2', 0, '2023-03-16'),
(10357, 'PRW/2023/0032', 'K02', '5', 0, '2023-03-16'),
(10358, 'PRW/2023/0032', 'K03', '4', 0, '2023-03-16'),
(10359, 'PRW/2023/0032', 'K04', '3', 0, '2023-03-16'),
(10360, 'PRW/2023/0032', 'K05', '2', 0, '2023-03-16'),
(10361, 'PRW/2023/0033', 'K01', '3', 0, '2023-03-16'),
(10362, 'PRW/2023/0033', 'K02', '5', 0, '2023-03-16'),
(10363, 'PRW/2023/0033', 'K03', '4', 0, '2023-03-16'),
(10364, 'PRW/2023/0033', 'K04', '4', 0, '2023-03-16'),
(10365, 'PRW/2023/0033', 'K05', '4', 0, '2023-03-16'),
(10366, 'PRW/2023/0034', 'K01', '3', 0, '2023-03-16'),
(10367, 'PRW/2023/0034', 'K02', '5', 0, '2023-03-16'),
(10368, 'PRW/2023/0034', 'K03', '4', 0, '2023-03-16'),
(10369, 'PRW/2023/0034', 'K04', '4', 0, '2023-03-16'),
(10370, 'PRW/2023/0034', 'K05', '4', 0, '2023-03-16');

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
  `Nilai_Kualitatif` varchar(250) NOT NULL,
  `Nilai_Kuantitatif` int(11) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`Id_Kriteria_Detail`, `Id_Kriteria`, `Nilai_Kualitatif`, `Nilai_Kuantitatif`, `Keterangan`) VALUES
(1, 1, '15 - 20', 5, 'Sangat Dekat'),
(2, 1, '21 - 25', 4, 'Dekat'),
(3, 1, '26 - 29', 3, 'Sedang'),
(4, 1, '30 - 35', 1, 'Jauh'),
(5, 2, '5.000 - 5.0000', 5, 'Sangat Murah'),
(6, 2, '51.000 - 100.000', 4, 'Murah'),
(7, 2, '101.000 - 200.000', 3, 'Sedang'),
(8, 2, '201.000 - 300.000', 2, 'Mahal'),
(9, 2, '301.000', 1, 'Sangat Mahal'),
(10, 3, '7.00 - 10.00\n', 4, 'pagi'),
(11, 3, '11.00 - 14.00', 3, 'siang'),
(12, 3, '15.00 - 18.00', 2, 'sore'),
(13, 3, '19.00 - 24.00', 1, 'malam'),
(14, 4, 'Sepeda Motor, Mobil, Elf, Bis', 4, ''),
(15, 4, 'Sepeda Motor, Mobil, Elf/Bis', 3, ''),
(16, 4, 'Sepeda Motor, Mobil', 2, ''),
(17, 4, 'Sepeda Motor', 1, ''),
(18, 5, 'Lengkap', 4, ''),
(19, 5, 'Toilet, Mushola, Tempat makan', 3, ''),
(20, 5, 'Toilet, Mushola', 2, ''),
(21, 5, 'Toilet, Mushola, Tempat Makan, Tempat anak', 1, '');

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
  `Nama_Pariwisata` text NOT NULL,
  `Jarak` varchar(100) NOT NULL,
  `Tiket_Masuk` varchar(150) NOT NULL,
  `Jam_Operasional` varchar(250) NOT NULL,
  `Aksebility` text NOT NULL,
  `Fasilitas` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` varchar(50) NOT NULL,
  `RandomCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pariwisata`
--

INSERT INTO `pariwisata` (`Id_Pariwisata`, `Kode_Pariwisata`, `Nama_Pariwisata`, `Jarak`, `Tiket_Masuk`, `Jam_Operasional`, `Aksebility`, `Fasilitas`, `CreatedBy`, `CreatedDate`, `RandomCode`) VALUES
(1055, 'PRW/2023/001', 'Jatim Park 1', '20', '100000 - 120000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1056, 'PRW/2023/002', 'Jatim Park 2', '21', '140000 - 160000', '08.30 - 17.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1057, 'PRW/2023/003', 'Jatim Park 3', '15', '75000 - 100000', '11.00 - 21.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1058, 'PRW/2023/004', 'Batu Wonderlan Waterpak', '19', '10000 - 20000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1059, 'PRW/2023/005', 'Museum Angkut', '20', '110000', '12.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1060, 'PRW/2023/006', 'Taman Labirin', '29', '35000 - 40000', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1061, 'PRW/2023/007', 'Taman Langit Gunung Banyak', '29', '10000', '07.00 - 00.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1062, 'PRW/2023/008', 'BNS (Batu Night Spectacular)', '19', '35000 - 40000', '15.00 - 23.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1063, 'PRW/2023/009', 'Eco Green Park', '19', '55000 - 75000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1064, 'PRW/2023/0010', 'Batu Rafting', '21', '355000', '07.00 - 16.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1065, 'PRW/2023/0011', 'Omah Kayu', '29', '5000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1066, 'PRW/2023/0012', 'Wisata Coban Putri', '18', '5000 - 10000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-16', '2023/1'),
(1067, 'PRW/2023/0013', 'Batu Secret Zoo', '20', '84000 - 120000', '10.00 - 18.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1068, 'PRW/2023/0014', 'Paralayang Batu', '29', '10000 - 15000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1069, 'PRW/2023/0015', 'Wisata Coban Rais', '20', '10000', '07.00 - 15.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-16', '2023/1'),
(1070, 'PRW/2023/0016', 'Pemandian Air Panas Cangar', '40', '12000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1071, 'PRW/2023/0017', 'TR Selecta', '27', '40000', '07.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1072, 'PRW/2023/0018', 'Desa Wisata Bumiaji', '22', '35000', '08.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1073, 'PRW/2023/0019', 'Wisata Coban Talun', '30', '7500', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola', 0, '2023-03-16', '2023/1'),
(1074, 'PRW/2023/0020', 'Millenial Glow Garden', '16', '80000 - 100000', '15.00 - 22.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1075, 'PRW/2023/0021', 'Museum Musik Dunia', '16', '30000 - 50000', '11.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1076, 'PRW/2023/0022', 'Rafting Kaliwatu', '21', '195000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-16', '2023/1'),
(1077, 'PRW/2023/0023', 'Taman Dolan', '22', '10000 - 15000', '08.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1078, 'PRW/2023/0024', 'Goa Pinus', '28', '10000', '07.00 - 17.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1079, 'PRW/2023/0025', 'Goa Pandawa', '29', '5000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-16', '2023/1'),
(1080, 'PRW/2023/0026', 'Kusuma Agrowisata Batu', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1081, 'PRW/2023/0027', 'Predator Fun Park', '16', '40000 - 60000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1082, 'PRW/2023/0028', 'Batu Love Garden', '21', '60000 - 100000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1083, 'PRW/2023/0029', 'De Djangkul', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1084, 'PRW/2023/0030', 'Kusuma Waterpark', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1085, 'PRW/2023/0031', 'Batu Flower Garden', '21', '25000', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1086, 'PRW/2023/0032', 'Wisata Coban Rondo', '31', '16000 - 25000', '07.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola', 0, '2023-03-16', '2023/1'),
(1087, 'PRW/2023/0033', 'Santerra De Laponte', '28', '25000', '08.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1'),
(1088, 'PRW/2023/0034', 'Taman Kelinci', '28', '10000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-16', '2023/1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `Id_Report` int(11) NOT NULL,
  `Kode_Report` varchar(250) NOT NULL,
  `Nama_Report` varchar(250) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`Id_Report`, `Kode_Report`, `Nama_Report`, `Keterangan`) VALUES
(1, 'RP-WST', 'Report Data Objek Wisata', 'Report Data Objek Wisata Kota Batu Malang'),
(2, 'RP-KRT', 'Report Data Kriteria', 'Report Data Kriteria (Parameter Penilaian Objek Wisata Kota Batu Malang)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_aksebility`
--

CREATE TABLE `sub_kriteria_aksebility` (
  `Id_Aksebility` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Prioritas` varchar(250) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_fasilitas`
--

CREATE TABLE `sub_kriteria_fasilitas` (
  `Id_Fasilitas` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Prioritas` varchar(150) NOT NULL,
  `Keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_harga_tiket`
--

CREATE TABLE `sub_kriteria_harga_tiket` (
  `Id_Harga` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Harga` varchar(150) NOT NULL,
  `Prioritas` int(11) NOT NULL,
  `Keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_jam_operasional`
--

CREATE TABLE `sub_kriteria_jam_operasional` (
  `Id_Jam_Operasional` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
  `Jam` varchar(150) NOT NULL,
  `Prioritas` varchar(225) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_jarak`
--

CREATE TABLE `sub_kriteria_jarak` (
  `Id_Jarak` int(11) NOT NULL,
  `Id_Kriteria` int(11) NOT NULL,
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
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Id_Report`);

--
-- Indeks untuk tabel `sub_kriteria_aksebility`
--
ALTER TABLE `sub_kriteria_aksebility`
  ADD PRIMARY KEY (`Id_Aksebility`);

--
-- Indeks untuk tabel `sub_kriteria_fasilitas`
--
ALTER TABLE `sub_kriteria_fasilitas`
  ADD PRIMARY KEY (`Id_Fasilitas`);

--
-- Indeks untuk tabel `sub_kriteria_harga_tiket`
--
ALTER TABLE `sub_kriteria_harga_tiket`
  ADD PRIMARY KEY (`Id_Harga`);

--
-- Indeks untuk tabel `sub_kriteria_jam_operasional`
--
ALTER TABLE `sub_kriteria_jam_operasional`
  ADD PRIMARY KEY (`Id_Jam_Operasional`);

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
  MODIFY `Id_Bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konversi`
--
ALTER TABLE `konversi`
  MODIFY `Id_Konversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10371;

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
  MODIFY `Id_Pariwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `Id_Report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_aksebility`
--
ALTER TABLE `sub_kriteria_aksebility`
  MODIFY `Id_Aksebility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_fasilitas`
--
ALTER TABLE `sub_kriteria_fasilitas`
  MODIFY `Id_Fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_harga_tiket`
--
ALTER TABLE `sub_kriteria_harga_tiket`
  MODIFY `Id_Harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_jam_operasional`
--
ALTER TABLE `sub_kriteria_jam_operasional`
  MODIFY `Id_Jam_Operasional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_jarak`
--
ALTER TABLE `sub_kriteria_jarak`
  MODIFY `Id_Jarak` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
