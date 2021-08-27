-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2020 pada 02.52
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--
CREATE DATABASE IF NOT EXISTS `ujikom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ujikom`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `No_Transaksi` varchar(255) NOT NULL,
  `Pasien_ID` varchar(11) DEFAULT NULL,
  `Tanggal_Berobat` varchar(255) DEFAULT NULL,
  `Dokter_ID` varchar(11) DEFAULT NULL,
  `Keluhan` varchar(255) DEFAULT NULL,
  `Biaya_Adm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`No_Transaksi`, `Pasien_ID`, `Tanggal_Berobat`, `Dokter_ID`, `Keluhan`, `Biaya_Adm`) VALUES
('TR001', 'PS.001', '2017/07/29', 'D-001', 'Sakit Gigi', 125000),
('TR002', 'PS.005', '2017/08/15', 'D-002', 'Demam', 75000),
('TR003', 'PS.003', '2017/08/19', 'D-003', 'Telinga', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `Dokter_ID` varchar(11) NOT NULL,
  `Nama_Dokter` varchar(255) DEFAULT NULL,
  `Poli_ID` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`Dokter_ID`, `Nama_Dokter`, `Poli_ID`) VALUES
('D-001', 'dr. Enra', 'P-001'),
('D-002', 'dr. Rudy', 'P-002'),
('D-003', 'dr. Joko', 'P-003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `Pasien_ID` varchar(11) NOT NULL,
  `Nama_Pasien` varchar(255) DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `Jenis_Kelamin` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`Pasien_ID`, `Nama_Pasien`, `Tanggal_Lahir`, `Jenis_Kelamin`, `Alamat`) VALUES
('PS.001', 'Barata Yuda', '2000-12-14', 'Laki-Laki', 'Tasikmalaya'),
('PS.003', 'Kurniawan', '2000-01-30', 'Laki-Laki', 'Tasikmalaya'),
('PS.005', 'Indah Susanti', '2001-08-26', 'Perempuan', 'Garut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `Poli_ID` varchar(11) NOT NULL,
  `Nama_Poli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`Poli_ID`, `Nama_Poli`) VALUES
('P-001', 'Gigi'),
('P-002', 'Umum'),
('P-003', 'THT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`No_Transaksi`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`Dokter_ID`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`Pasien_ID`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`Poli_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
