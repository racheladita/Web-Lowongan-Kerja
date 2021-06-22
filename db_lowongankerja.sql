-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 06:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lowongankerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_loker`
--

CREATE TABLE `apply_loker` (
  `idaplly` varchar(12) NOT NULL,
  `idloker` varchar(12) NOT NULL,
  `idpencaker` varchar(12) NOT NULL,
  `tgl_apply` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_pekerjaan`
--

CREATE TABLE `bidang_pekerjaan` (
  `idbidang` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `idloker` varchar(12) NOT NULL,
  `idperusahaan` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `idbidang` varchar(12) NOT NULL,
  `idtingkat_pendidikan` varchar(12) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `usia_min` varchar(2) NOT NULL,
  `usia_max` varchar(3) NOT NULL,
  `gaji_min` int(8) NOT NULL,
  `gaji_max` int(10) NOT NULL,
  `nama_cp` varchar(30) NOT NULL,
  `email_cp` varchar(20) NOT NULL,
  `no_telp_cp` varchar(12) NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL,
  `tgl_expired` tinyint(4) NOT NULL,
  `deskripsi_loker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `idpencaker` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `bidang_pekerjaan` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `tgl_daftar` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `idriwayat_pendidikan` varchar(12) NOT NULL,
  `idpencaker` varchar(12) NOT NULL,
  `idbidang` varchar(12) NOT NULL,
  `perusahaan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `bln_masuk` varchar(10) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL,
  `bln_lulus` varchar(10) NOT NULL,
  `thn_lulus` varchar(4) NOT NULL,
  `deskripsi_pekerjaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `idriwayat_pendidikan` varchar(12) NOT NULL,
  `idpencaker` varchar(12) NOT NULL,
  `idtingkat_pendidikan` varchar(12) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `bln_masuk` varchar(10) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL,
  `bln_lulus` varchar(10) NOT NULL,
  `thn_lulus` varchar(4) NOT NULL,
  `grade` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_pendidikan`
--

CREATE TABLE `tingkat_pendidikan` (
  `idtingkat_pendidikan` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD PRIMARY KEY (`idaplly`),
  ADD KEY `idloker` (`idloker`),
  ADD KEY `idpencaker` (`idpencaker`);

--
-- Indexes for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  ADD PRIMARY KEY (`idbidang`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`idloker`),
  ADD KEY `idperusahaan` (`idperusahaan`),
  ADD KEY `idbidang` (`idbidang`),
  ADD KEY `idtingkat_pendidikan` (`idtingkat_pendidikan`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`idpencaker`),
  ADD KEY `bidang_pekerjaan` (`bidang_pekerjaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idperusahaan`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`idriwayat_pendidikan`),
  ADD KEY `idpencaker` (`idpencaker`),
  ADD KEY `idbidang` (`idbidang`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`idriwayat_pendidikan`),
  ADD KEY `idpencaker` (`idpencaker`),
  ADD KEY `idtingkat_pendidikan` (`idtingkat_pendidikan`);

--
-- Indexes for table `tingkat_pendidikan`
--
ALTER TABLE `tingkat_pendidikan`
  ADD PRIMARY KEY (`idtingkat_pendidikan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD CONSTRAINT `apply_loker_ibfk_1` FOREIGN KEY (`idloker`) REFERENCES `loker` (`idloker`),
  ADD CONSTRAINT `apply_loker_ibfk_2` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`);

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_ibfk_1` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`),
  ADD CONSTRAINT `loker_ibfk_2` FOREIGN KEY (`idtingkat_pendidikan`) REFERENCES `tingkat_pendidikan` (`idtingkat_pendidikan`),
  ADD CONSTRAINT `loker_ibfk_3` FOREIGN KEY (`idperusahaan`) REFERENCES `perusahaan` (`idperusahaan`);

--
-- Constraints for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD CONSTRAINT `pencaker_ibfk_1` FOREIGN KEY (`bidang_pekerjaan`) REFERENCES `bidang_pekerjaan` (`idbidang`);

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`),
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_2` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`);

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`idtingkat_pendidikan`) REFERENCES `tingkat_pendidikan` (`idtingkat_pendidikan`),
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_2` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
