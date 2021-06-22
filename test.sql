-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 03:17 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_loker`
--

CREATE TABLE `apply_loker` (
  `idapply` int(7) NOT NULL,
  `idloker` int(7) NOT NULL,
  `idpencaker` varchar(20) NOT NULL,
  `tgl_apply` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_loker`
--

INSERT INTO `apply_loker` (`idapply`, `idloker`, `idpencaker`, `tgl_apply`, `status`) VALUES
(1, 2, 'intanfajar', '2018-10-12', 'Dalam Proses Seleksi'),
(2, 1, 'haiheni', '2018-10-09', 'Diterima'),
(104, 2, 'haiheni', '2018-10-12', 'Dalam Proses Seleksi'),
(105, 2, 'kiki', '2018-10-12', 'Dalam Proses Seleksi'),
(106, 1, 'kiki', '2018-10-12', 'Dalam Proses Seleksi'),
(107, 2, 'kiki', '2018-10-12', 'Dalam Proses Seleksi'),
(108, 2, 'intanfajar', '2018-10-12', 'Dalam Proses Seleksi'),
(109, 1, 'intanfajar', '2018-10-12', 'Dalam Proses Seleksi');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_pekerjaan`
--

CREATE TABLE `bidang_pekerjaan` (
  `idbidang` int(7) NOT NULL,
  `namab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_pekerjaan`
--

INSERT INTO `bidang_pekerjaan` (`idbidang`, `namab`) VALUES
(1, 'Akuntansi'),
(2, 'Seni'),
(3, 'Arsitektur'),
(4, 'IT'),
(5, 'Farmasi'),
(6, 'Hotel/Pariwisata'),
(7, 'Restoran'),
(8, 'Statistik'),
(9, 'Pajak'),
(10, 'Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `idloker` int(7) NOT NULL,
  `idperusahaan` varchar(7) NOT NULL,
  `namal` varchar(50) NOT NULL,
  `idbidang` int(7) NOT NULL,
  `idtingkat_pendidikan` int(7) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `usia_min` int(2) NOT NULL,
  `usia_max` int(2) NOT NULL,
  `gaji_min` int(7) NOT NULL,
  `gaji_max` int(9) NOT NULL,
  `nama_cp` varchar(20) NOT NULL,
  `email_cp` varchar(30) NOT NULL,
  `no_telp_cp` varchar(15) NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL,
  `tgl_expired` date NOT NULL,
  `deskripsi_loker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`idloker`, `idperusahaan`, `namal`, `idbidang`, `idtingkat_pendidikan`, `tipe`, `usia_min`, `usia_max`, `gaji_min`, `gaji_max`, `nama_cp`, `email_cp`, `no_telp_cp`, `tgl_insert`, `tgl_update`, `tgl_expired`, `deskripsi_loker`) VALUES
(1, '11102', 'Lowongan Kerja Arsitek', 3, 5, 'Walk in Interview', 20, 35, 2000000, 5000000, 'Heru Setiawan', 'heruset@gmail.com', '087596743768', '2018-10-05', '2018-10-05', '2018-10-31', 'Dibutuhkan arsitek :\r\n1. Diutamakan domisili Salatiga dan sekitarnya\r\n2. Hari kerja Senin-Sabtu\r\n3. Gaji min. UMR\r\n4. Min. S1 Arsitektur dengan min. IPK 3.00'),
(2, '11102', 'Lowongan Kerja Lagi', 4, 5, 'apa aja boleh', 30, 30, 1000000, 2000000, 'Heru Setiawan', 'heruset@gmail.com', '090909090909090', '2018-10-02', '2018-10-04', '2018-10-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `idpencaker` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `bidang_pekerjaan` int(7) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`idpencaker`, `nama`, `password`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `email`, `no_telp`, `foto`, `bidang_pekerjaan`, `tgl_daftar`) VALUES
('haiheni', 'Aprilia Dwi', '1234', 'P', 'Semarang', '2018-05-09', 'Tembalang', 'Semarang', 'heni@gmail.com', '08482357832', 'heni.jpg', 7, '2018-10-10'),
('intanfajar', 'Intan Fajar P', '123', 'P', 'Pati', '1997-10-05', 'Semarang', 'Semarang', 'intanfajar@gmail.com', '083085082084', 'biru.jpg', 5, '2018-10-01'),
('kiki', 'kaka', 'kukukaki', 'L', 'kiki lahir', '2018-10-04', 'rumah kiki', 'kota kiki', 'kiki@gmail.com', '090909090909', 'birupink.jpg', 9, '2018-10-12'),
('racheladita', 'Rachel Adita', 'hihi', 'P', 'Kabupaten Semarang', '2017-09-11', 'Losari', 'Ambarawa', 'racheladita@gmail.com', '086735742525', '1.jpg', 4, '2017-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` varchar(7) NOT NULL,
  `namap` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `namap`, `password`, `nama_pemilik`, `alamat`, `kota`, `email`, `no_telp`, `tgl_daftar`) VALUES
('11101', 'PT. Lion Superindo', 'superindo', 'Tanoesoedibyo', 'Sumurbroto Banyumanik', 'Semarang', 'superindo@yahoo.co.id', '089089089089', '2018-10-03'),
('11102', 'PT. Maju Sukses', 'majusukses', 'Arya Gunawan', 'Jl. Mawar 1 no 5', 'Salatiga', 'majusukses@gmail.co.id', '083083083083', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `idriwayat_pekerjaan` int(7) NOT NULL,
  `idpencaker` varchar(20) NOT NULL,
  `idbidang` int(7) NOT NULL,
  `perusahaan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `bln_masuk` varchar(10) NOT NULL,
  `thn_masuk` varchar(10) NOT NULL,
  `bln_lulus` varchar(10) NOT NULL,
  `thn_lulus` varchar(10) NOT NULL,
  `deskripsi_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`idriwayat_pekerjaan`, `idpencaker`, `idbidang`, `perusahaan`, `kota`, `bln_masuk`, `thn_masuk`, `bln_lulus`, `thn_lulus`, `deskripsi_pekerjaan`) VALUES
(0, 'kiki', 6, 'wyz', 'kota kiki', '', '', '', '', 'lalayeyeyeye'),
(4, 'intanfajar', 1, 'tes', 'semarang', 'Agustus', '2017', 'Mei', '2018', 'testes');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `idriwayat_pendidikan` int(7) NOT NULL,
  `idpencaker` varchar(20) NOT NULL,
  `idtingkat_pendidikan` int(7) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `bln_masuk` varchar(20) NOT NULL,
  `thn_masuk` varchar(20) NOT NULL,
  `bln_lulus` varchar(20) NOT NULL,
  `thn_lulus` varchar(20) NOT NULL,
  `grade` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`idriwayat_pendidikan`, `idpencaker`, `idtingkat_pendidikan`, `jurusan`, `bln_masuk`, `thn_masuk`, `bln_lulus`, `thn_lulus`, `grade`) VALUES
(14, 'haiheni', 5, 'Statistika', 'Maret', '2014', 'April', '2017', 'A'),
(15, 'intanfajar', 5, 'Statistika', 'Maret', '2014', 'April', '2017', 'A'),
(16, 'intanfajar', 5, 'Statistika', 'Maret', '2014', 'April', '2017', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_pendidikan`
--

CREATE TABLE `tingkat_pendidikan` (
  `idtingkat_pendidikan` int(7) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat_pendidikan`
--

INSERT INTO `tingkat_pendidikan` (`idtingkat_pendidikan`, `keterangan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'Diploma'),
(5, 'Sarjana'),
(6, 'Magister');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD PRIMARY KEY (`idapply`),
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
  ADD KEY `idtingkat_pendidikan` (`idtingkat_pendidikan`),
  ADD KEY `idbidang` (`idbidang`);

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
  ADD PRIMARY KEY (`idriwayat_pekerjaan`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_loker`
--
ALTER TABLE `apply_loker`
  MODIFY `idapply` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  MODIFY `idbidang` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `idloker` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `idriwayat_pekerjaan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `idriwayat_pendidikan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tingkat_pendidikan`
--
ALTER TABLE `tingkat_pendidikan`
  MODIFY `idtingkat_pendidikan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD CONSTRAINT `apply_loker_ibfk_1` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`),
  ADD CONSTRAINT `apply_loker_ibfk_2` FOREIGN KEY (`idloker`) REFERENCES `loker` (`idloker`);

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_ibfk_1` FOREIGN KEY (`idtingkat_pendidikan`) REFERENCES `tingkat_pendidikan` (`idtingkat_pendidikan`),
  ADD CONSTRAINT `loker_ibfk_2` FOREIGN KEY (`idperusahaan`) REFERENCES `perusahaan` (`idperusahaan`),
  ADD CONSTRAINT `loker_ibfk_3` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`);

--
-- Constraints for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD CONSTRAINT `pencaker_ibfk_1` FOREIGN KEY (`bidang_pekerjaan`) REFERENCES `bidang_pekerjaan` (`idbidang`);

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`),
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_2` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`);

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`),
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_2` FOREIGN KEY (`idtingkat_pendidikan`) REFERENCES `tingkat_pendidikan` (`idtingkat_pendidikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
