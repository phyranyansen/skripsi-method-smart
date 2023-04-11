-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2023 pada 15.45
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
(12091, 'PRW/2023/001', 'K01', '4', 0, '2023-04-02'),
(12092, 'PRW/2023/001', 'K02', '4', 0, '2023-04-02'),
(12093, 'PRW/2023/001', 'K03', '4', 0, '2023-04-02'),
(12094, 'PRW/2023/001', 'K04', '4', 0, '2023-04-02'),
(12095, 'PRW/2023/001', 'K05', '4', 0, '2023-04-02'),
(12096, 'PRW/2023/002', 'K01', '4', 0, '2023-03-30'),
(12097, 'PRW/2023/002', 'K02', '3', 0, '2023-03-30'),
(12098, 'PRW/2023/002', 'K03', '4', 0, '2023-03-30'),
(12099, 'PRW/2023/002', 'K04', '4', 0, '2023-03-30'),
(12100, 'PRW/2023/002', 'K05', '4', 0, '2023-03-30'),
(12101, 'PRW/2023/003', 'K01', '5', 0, '2023-03-30'),
(12102, 'PRW/2023/003', 'K02', '4', 0, '2023-03-30'),
(12103, 'PRW/2023/003', 'K03', '3', 0, '2023-03-30'),
(12104, 'PRW/2023/003', 'K04', '4', 0, '2023-03-30'),
(12105, 'PRW/2023/003', 'K05', '4', 0, '2023-03-30'),
(12106, 'PRW/2023/004', 'K01', '5', 0, '2023-03-30'),
(12107, 'PRW/2023/004', 'K02', '5', 0, '2023-03-30'),
(12108, 'PRW/2023/004', 'K03', '4', 0, '2023-03-30'),
(12109, 'PRW/2023/004', 'K04', '4', 0, '2023-03-30'),
(12110, 'PRW/2023/004', 'K05', '4', 0, '2023-03-30'),
(12111, 'PRW/2023/005', 'K01', '5', 0, '2023-03-30'),
(12112, 'PRW/2023/005', 'K02', '3', 0, '2023-03-30'),
(12113, 'PRW/2023/005', 'K03', '3', 0, '2023-03-30'),
(12114, 'PRW/2023/005', 'K04', '4', 0, '2023-03-30'),
(12115, 'PRW/2023/005', 'K05', '4', 0, '2023-03-30'),
(12116, 'PRW/2023/006', 'K01', '3', 0, '2023-03-30'),
(12117, 'PRW/2023/006', 'K02', '5', 0, '2023-03-30'),
(12118, 'PRW/2023/006', 'K03', '4', 0, '2023-03-30'),
(12119, 'PRW/2023/006', 'K04', '3', 0, '2023-03-30'),
(12120, 'PRW/2023/006', 'K05', '3', 0, '2023-03-30'),
(12121, 'PRW/2023/007', 'K01', '3', 0, '2023-03-30'),
(12122, 'PRW/2023/007', 'K02', '5', 0, '2023-03-30'),
(12123, 'PRW/2023/007', 'K03', '4', 0, '2023-03-30'),
(12124, 'PRW/2023/007', 'K04', '4', 0, '2023-03-30'),
(12125, 'PRW/2023/007', 'K05', '3', 0, '2023-03-30'),
(12126, 'PRW/2023/008', 'K01', '5', 0, '2023-03-30'),
(12127, 'PRW/2023/008', 'K02', '5', 0, '2023-03-30'),
(12128, 'PRW/2023/008', 'K03', '2', 0, '2023-03-30'),
(12129, 'PRW/2023/008', 'K04', '4', 0, '2023-03-30'),
(12130, 'PRW/2023/008', 'K05', '4', 0, '2023-03-30'),
(12131, 'PRW/2023/009', 'K01', '5', 0, '2023-03-30'),
(12132, 'PRW/2023/009', 'K02', '4', 0, '2023-03-30'),
(12133, 'PRW/2023/009', 'K03', '4', 0, '2023-03-30'),
(12134, 'PRW/2023/009', 'K04', '4', 0, '2023-03-30'),
(12135, 'PRW/2023/009', 'K05', '4', 0, '2023-03-30'),
(12136, 'PRW/2023/0010', 'K01', '4', 0, '2023-03-30'),
(12137, 'PRW/2023/0010', 'K02', '1', 0, '2023-03-30'),
(12138, 'PRW/2023/0010', 'K03', '4', 0, '2023-03-30'),
(12139, 'PRW/2023/0010', 'K04', '2', 0, '2023-03-30'),
(12140, 'PRW/2023/0010', 'K05', '3', 0, '2023-03-30'),
(12141, 'PRW/2023/0011', 'K01', '3', 0, '2023-03-30'),
(12142, 'PRW/2023/0011', 'K02', '5', 0, '2023-03-30'),
(12143, 'PRW/2023/0011', 'K03', '4', 0, '2023-03-30'),
(12144, 'PRW/2023/0011', 'K04', '3', 0, '2023-03-30'),
(12145, 'PRW/2023/0011', 'K05', '3', 0, '2023-03-30'),
(12146, 'PRW/2023/0012', 'K01', '5', 0, '2023-03-30'),
(12147, 'PRW/2023/0012', 'K02', '5', 0, '2023-03-30'),
(12148, 'PRW/2023/0012', 'K03', '4', 0, '2023-03-30'),
(12149, 'PRW/2023/0012', 'K04', '2', 0, '2023-03-30'),
(12150, 'PRW/2023/0012', 'K05', '2', 0, '2023-03-30'),
(12151, 'PRW/2023/0013', 'K01', '5', 0, '2023-03-30'),
(12152, 'PRW/2023/0013', 'K02', '4', 0, '2023-03-30'),
(12153, 'PRW/2023/0013', 'K03', '4', 0, '2023-03-30'),
(12154, 'PRW/2023/0013', 'K04', '4', 0, '2023-03-30'),
(12155, 'PRW/2023/0013', 'K05', '4', 0, '2023-03-30'),
(12156, 'PRW/2023/0014', 'K01', '3', 0, '2023-03-30'),
(12157, 'PRW/2023/0014', 'K02', '5', 0, '2023-03-30'),
(12158, 'PRW/2023/0014', 'K03', '4', 0, '2023-03-30'),
(12159, 'PRW/2023/0014', 'K04', '2', 0, '2023-03-30'),
(12160, 'PRW/2023/0014', 'K05', '3', 0, '2023-03-30'),
(12161, 'PRW/2023/0015', 'K01', '5', 0, '2023-03-30'),
(12162, 'PRW/2023/0015', 'K02', '5', 0, '2023-03-30'),
(12163, 'PRW/2023/0015', 'K03', '4', 0, '2023-03-30'),
(12164, 'PRW/2023/0015', 'K04', '2', 0, '2023-03-30'),
(12165, 'PRW/2023/0015', 'K05', '2', 0, '2023-03-30'),
(12166, 'PRW/2023/0016', 'K01', '1', 0, '2023-03-30'),
(12167, 'PRW/2023/0016', 'K02', '5', 0, '2023-03-30'),
(12168, 'PRW/2023/0016', 'K03', '4', 0, '2023-03-30'),
(12169, 'PRW/2023/0016', 'K04', '3', 0, '2023-03-30'),
(12170, 'PRW/2023/0016', 'K05', '3', 0, '2023-03-30'),
(12171, 'PRW/2023/0017', 'K01', '3', 0, '2023-03-30'),
(12172, 'PRW/2023/0017', 'K02', '5', 0, '2023-03-30'),
(12173, 'PRW/2023/0017', 'K03', '4', 0, '2023-03-30'),
(12174, 'PRW/2023/0017', 'K04', '4', 0, '2023-03-30'),
(12175, 'PRW/2023/0017', 'K05', '4', 0, '2023-03-30'),
(12176, 'PRW/2023/0018', 'K01', '4', 0, '2023-03-30'),
(12177, 'PRW/2023/0018', 'K02', '5', 0, '2023-03-30'),
(12178, 'PRW/2023/0018', 'K03', '4', 0, '2023-03-30'),
(12179, 'PRW/2023/0018', 'K04', '4', 0, '2023-03-30'),
(12180, 'PRW/2023/0018', 'K05', '4', 0, '2023-03-30'),
(12181, 'PRW/2023/0019', 'K01', '2', 0, '2023-03-30'),
(12182, 'PRW/2023/0019', 'K02', '5', 0, '2023-03-30'),
(12183, 'PRW/2023/0019', 'K03', '4', 0, '2023-03-30'),
(12184, 'PRW/2023/0019', 'K04', '3', 0, '2023-03-30'),
(12185, 'PRW/2023/0019', 'K05', '2', 0, '2023-03-30'),
(12186, 'PRW/2023/0020', 'K01', '5', 0, '2023-03-30'),
(12187, 'PRW/2023/0020', 'K02', '4', 0, '2023-03-30'),
(12188, 'PRW/2023/0020', 'K03', '2', 0, '2023-03-30'),
(12189, 'PRW/2023/0020', 'K04', '4', 0, '2023-03-30'),
(12190, 'PRW/2023/0020', 'K05', '4', 0, '2023-03-30'),
(12191, 'PRW/2023/0021', 'K01', '5', 0, '2023-03-30'),
(12192, 'PRW/2023/0021', 'K02', '5', 0, '2023-03-30'),
(12193, 'PRW/2023/0021', 'K03', '3', 0, '2023-03-30'),
(12194, 'PRW/2023/0021', 'K04', '4', 0, '2023-03-30'),
(12195, 'PRW/2023/0021', 'K05', '4', 0, '2023-03-30'),
(12196, 'PRW/2023/0022', 'K01', '4', 0, '2023-03-30'),
(12197, 'PRW/2023/0022', 'K02', '3', 0, '2023-03-30'),
(12198, 'PRW/2023/0022', 'K03', '4', 0, '2023-03-30'),
(12199, 'PRW/2023/0022', 'K04', '2', 0, '2023-03-30'),
(12200, 'PRW/2023/0022', 'K05', '2', 0, '2023-03-30'),
(12201, 'PRW/2023/0023', 'K01', '4', 0, '2023-03-30'),
(12202, 'PRW/2023/0023', 'K02', '5', 0, '2023-03-30'),
(12203, 'PRW/2023/0023', 'K03', '4', 0, '2023-03-30'),
(12204, 'PRW/2023/0023', 'K04', '4', 0, '2023-03-30'),
(12205, 'PRW/2023/0023', 'K05', '4', 0, '2023-03-30'),
(12206, 'PRW/2023/0024', 'K01', '3', 0, '2023-03-30'),
(12207, 'PRW/2023/0024', 'K02', '5', 0, '2023-03-30'),
(12208, 'PRW/2023/0024', 'K03', '4', 0, '2023-03-30'),
(12209, 'PRW/2023/0024', 'K04', '4', 0, '2023-03-30'),
(12210, 'PRW/2023/0024', 'K05', '3', 0, '2023-03-30'),
(12211, 'PRW/2023/0025', 'K01', '3', 0, '2023-03-30'),
(12212, 'PRW/2023/0025', 'K02', '5', 0, '2023-03-30'),
(12213, 'PRW/2023/0025', 'K03', '4', 0, '2023-03-30'),
(12214, 'PRW/2023/0025', 'K04', '4', 0, '2023-03-30'),
(12215, 'PRW/2023/0025', 'K05', '3', 0, '2023-03-30'),
(12216, 'PRW/2023/0026', 'K01', '4', 0, '2023-03-30'),
(12217, 'PRW/2023/0026', 'K02', '5', 0, '2023-03-30'),
(12218, 'PRW/2023/0026', 'K03', '4', 0, '2023-03-30'),
(12219, 'PRW/2023/0026', 'K04', '4', 0, '2023-03-30'),
(12220, 'PRW/2023/0026', 'K05', '4', 0, '2023-03-30'),
(12221, 'PRW/2023/0027', 'K01', '5', 0, '2023-03-30'),
(12222, 'PRW/2023/0027', 'K02', '5', 0, '2023-03-30'),
(12223, 'PRW/2023/0027', 'K03', '4', 0, '2023-03-30'),
(12224, 'PRW/2023/0027', 'K04', '4', 0, '2023-03-30'),
(12225, 'PRW/2023/0027', 'K05', '4', 0, '2023-03-30'),
(12226, 'PRW/2023/0028', 'K01', '4', 0, '2023-03-30'),
(12227, 'PRW/2023/0028', 'K02', '4', 0, '2023-03-30'),
(12228, 'PRW/2023/0028', 'K03', '4', 0, '2023-03-30'),
(12229, 'PRW/2023/0028', 'K04', '4', 0, '2023-03-30'),
(12230, 'PRW/2023/0028', 'K05', '4', 0, '2023-03-30'),
(12231, 'PRW/2023/0029', 'K01', '4', 0, '2023-03-30'),
(12232, 'PRW/2023/0029', 'K02', '5', 0, '2023-03-30'),
(12233, 'PRW/2023/0029', 'K03', '4', 0, '2023-03-30'),
(12234, 'PRW/2023/0029', 'K04', '4', 0, '2023-03-30'),
(12235, 'PRW/2023/0029', 'K05', '4', 0, '2023-03-30'),
(12236, 'PRW/2023/0030', 'K01', '4', 0, '2023-03-30'),
(12237, 'PRW/2023/0030', 'K02', '5', 0, '2023-03-30'),
(12238, 'PRW/2023/0030', 'K03', '4', 0, '2023-03-30'),
(12239, 'PRW/2023/0030', 'K04', '4', 0, '2023-03-30'),
(12240, 'PRW/2023/0030', 'K05', '4', 0, '2023-03-30'),
(12241, 'PRW/2023/0031', 'K01', '4', 0, '2023-03-30'),
(12242, 'PRW/2023/0031', 'K02', '5', 0, '2023-03-30'),
(12243, 'PRW/2023/0031', 'K03', '4', 0, '2023-03-30'),
(12244, 'PRW/2023/0031', 'K04', '4', 0, '2023-03-30'),
(12245, 'PRW/2023/0031', 'K05', '4', 0, '2023-03-30'),
(12246, 'PRW/2023/0032', 'K01', '2', 0, '2023-03-30'),
(12247, 'PRW/2023/0032', 'K02', '5', 0, '2023-03-30'),
(12248, 'PRW/2023/0032', 'K03', '4', 0, '2023-03-30'),
(12249, 'PRW/2023/0032', 'K04', '3', 0, '2023-03-30'),
(12250, 'PRW/2023/0032', 'K05', '2', 0, '2023-03-30'),
(12251, 'PRW/2023/0033', 'K01', '3', 0, '2023-03-30'),
(12252, 'PRW/2023/0033', 'K02', '5', 0, '2023-03-30'),
(12253, 'PRW/2023/0033', 'K03', '4', 0, '2023-03-30'),
(12254, 'PRW/2023/0033', 'K04', '4', 0, '2023-03-30'),
(12255, 'PRW/2023/0033', 'K05', '4', 0, '2023-03-30'),
(12256, 'PRW/2023/0034', 'K01', '3', 0, '2023-03-30'),
(12257, 'PRW/2023/0034', 'K02', '5', 0, '2023-03-30'),
(12258, 'PRW/2023/0034', 'K03', '4', 0, '2023-03-30'),
(12259, 'PRW/2023/0034', 'K04', '4', 0, '2023-03-30'),
(12260, 'PRW/2023/0034', 'K05', '4', 0, '2023-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `Id_Kriteria` int(11) NOT NULL,
  `Kode_Kriteria` varchar(50) NOT NULL,
  `Nama_Kriteria` varchar(250) NOT NULL,
  `Atribut` varchar(150) NOT NULL,
  `CreatedDate` varchar(100) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`Id_Kriteria`, `Kode_Kriteria`, `Nama_Kriteria`, `Atribut`, `CreatedDate`, `CreatedBy`) VALUES
(1, 'K01', 'Jarak', 'Benefit', '2023-03-23', 1),
(2, 'K02', 'Harga Tiket', 'Cost', '', 0),
(3, 'K03', 'Jam Operasional', 'Cost', '', 0),
(4, 'K04', 'Aksebility', 'Benefit', '', 0),
(5, 'K05', 'Fasilitas', 'Benefit', '', 0);

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
  `Id_Login` int(11) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` text NOT NULL,
  `Status` int(11) NOT NULL,
  `Activated` int(11) NOT NULL,
  `Join_Since` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`Id_Login`, `Username`, `Password`, `Status`, `Activated`, `Join_Since`) VALUES
(1, 'phyranyansen', '$2y$10$q0y6Bn5wb8wrAZSQCn06vOkQOMV.Gi8p98/AVieZIHUbn9NH9C/Gq', 1, 1, '2023-04-02 16:10:04'),
(2, 'Lucky', '$2y$10$9Av02H2zsERj/09hZVy7Q..7m3L2FkZw5o27oBiG3uVtG1/VcK3Ka', 1, 1, '2023-04-02 16:57:55'),
(20, 'OrieneSativa', '$2y$10$DZOadDEvDxszMZGCcToVt.McGBmahz39V1fut0M5qQlB5aIjY6Nw2', 0, 1, '2023-04-11 02:31:49'),
(21, 'atana', '$2y$10$pvUTBA1kCxLvjWtoEtQJqeUSvhEIJHlUltPlx2fvf8Bpmbd754rlC', 0, 1, '2023-04-11 13:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `Id_Menu` int(11) NOT NULL,
  `Id_Login` int(11) NOT NULL,
  `Nama_Menu` varchar(250) NOT NULL,
  `script` text NOT NULL,
  `Link` text NOT NULL,
  `Status` int(11) NOT NULL,
  `CreateStatus` int(11) NOT NULL,
  `UpdateStatus` int(11) NOT NULL,
  `DeleteStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`Id_Menu`, `Id_Login`, `Nama_Menu`, `script`, `Link`, `Status`, `CreateStatus`, `UpdateStatus`, `DeleteStatus`) VALUES
(1, 1, 'Data Pariwisata', '', 'pariwisata', 1, 1, 1, 1),
(2, 1, 'Data Kriteria', '', 'kriteria', 1, 0, 1, 1),
(3, 1, 'Data Bobot', '', 'bobot', 1, 0, 1, 1),
(4, 2, 'Data Pariwisata', '', 'Pariwisata', 1, 0, 0, 0),
(5, 2, 'Data Kriteria', '', 'kriteria', 1, 0, 0, 0),
(6, 2, 'Data Bobot', '', 'bobot', 1, 0, 0, 0),
(37, 20, 'Data Pariwisata', '', 'pariwisata', 1, 0, 0, 0),
(38, 20, 'Data Kriteria', '', 'kriteria', 1, 0, 0, 0),
(39, 20, 'Data Bobot', '', 'bobot', 1, 0, 0, 0),
(40, 21, 'Data Pariwisata', '', 'pariwisata', 1, 0, 0, 0),
(41, 21, 'Data Kriteria', '', 'kriteria', 1, 0, 0, 0),
(42, 21, 'Data Bobot', '', 'bobot', 1, 0, 0, 0);

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
(1433, 'PRW/2023/001', 'Jatim Park 1', '23', '100000 - 120000', '00.00 - 00.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 1, '2023-04-02', '2023/1'),
(1434, 'PRW/2023/002', 'Jatim Park 2', '21', '140000 - 160000', '08.30 - 17.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1435, 'PRW/2023/003', 'Jatim Park 3', '15', '75000 - 100000', '11.00 - 21.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1436, 'PRW/2023/004', 'Batu Wonderlan Waterpak', '19', '10000 - 20000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1437, 'PRW/2023/005', 'Museum Angkut', '20', '110000', '12.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1438, 'PRW/2023/006', 'Taman Labirin', '29', '35000 - 40000', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1439, 'PRW/2023/007', 'Taman Langit Gunung Banyak', '29', '10000', '07.00 - 00.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1440, 'PRW/2023/008', 'BNS (Batu Night Spectacular)', '19', '35000 - 40000', '15.00 - 23.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1441, 'PRW/2023/009', 'Eco Green Park', '19', '55000 - 75000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1442, 'PRW/2023/0010', 'Batu Rafting', '21', '355000', '07.00 - 16.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1443, 'PRW/2023/0011', 'Omah Kayu', '29', '5000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1444, 'PRW/2023/0012', 'Wisata Coban Putri', '18', '5000 - 10000', '09.00 - 17.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-30', '2023/1'),
(1445, 'PRW/2023/0013', 'Batu Secret Zoo', '20', '84000 - 120000', '10.00 - 18.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1446, 'PRW/2023/0014', 'Paralayang Batu', '29', '10000 - 15000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1447, 'PRW/2023/0015', 'Wisata Coban Rais', '20', '10000', '07.00 - 15.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-30', '2023/1'),
(1448, 'PRW/2023/0016', 'Pemandian Air Panas Cangar', '40', '12000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1449, 'PRW/2023/0017', 'TR Selecta', '27', '40000', '07.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1450, 'PRW/2023/0018', 'Desa Wisata Bumiaji', '22', '35000', '08.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1451, 'PRW/2023/0019', 'Wisata Coban Talun', '30', '7500', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola', 0, '2023-03-30', '2023/1'),
(1452, 'PRW/2023/0020', 'Millenial Glow Garden', '16', '80000 - 100000', '15.00 - 22.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1453, 'PRW/2023/0021', 'Museum Musik Dunia', '16', '30000 - 50000', '11.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1454, 'PRW/2023/0022', 'Rafting Kaliwatu', '21', '195000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi', 'toilet, mushola', 0, '2023-03-30', '2023/1'),
(1455, 'PRW/2023/0023', 'Taman Dolan', '22', '10000 - 15000', '08.00 - 20.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1456, 'PRW/2023/0024', 'Goa Pinus', '28', '10000', '07.00 - 17.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1457, 'PRW/2023/0025', 'Goa Pandawa', '29', '5000', '24.00 - 24.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan', 0, '2023-03-30', '2023/1'),
(1458, 'PRW/2023/0026', 'Kusuma Agrowisata Batu', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1459, 'PRW/2023/0027', 'Predator Fun Park', '16', '40000 - 60000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1460, 'PRW/2023/0028', 'Batu Love Garden', '21', '60000 - 100000', '08.30 - 16.30', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1461, 'PRW/2023/0029', 'De Djangkul', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1462, 'PRW/2023/0030', 'Kusuma Waterpark', '21', '20000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1463, 'PRW/2023/0031', 'Batu Flower Garden', '21', '25000', '08.00 - 16.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1464, 'PRW/2023/0032', 'Wisata Coban Rondo', '31', '16000 - 25000', '07.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Elf', 'toilet, mushola', 0, '2023-03-30', '2023/1'),
(1465, 'PRW/2023/0033', 'Santerra De Laponte', '28', '25000', '08.30 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1'),
(1466, 'PRW/2023/0034', 'Taman Kelinci', '28', '10000', '08.00 - 17.00', 'Sepeda Motor, Mobil Pribadi, Bis, Elf', 'toilet, mushola, tempat makan, tempat anak', 0, '2023-03-30', '2023/1');

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
(1, 'RP-WST', 'Report Data Objek Wisata', 'Report Data Objek Wisata Kota Batu Malang');

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
  ADD PRIMARY KEY (`Id_Login`);

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
  MODIFY `Id_Konversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12261;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `Id_Kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `Id_Kriteria_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `Id_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `Id_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `Id_Pariwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1467;

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
