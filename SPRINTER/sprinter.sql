-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 10:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprinter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('darksystem', 'MasAzies2x');

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `kode_ajuan` varchar(20) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_mkp` varchar(10) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `url_rps` varchar(20) NOT NULL,
  `status_ajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`kode_ajuan`, `kode_prodi`, `kode_kelas`, `kode_mkp`, `dosen`, `url_rps`, `status_ajuan`) VALUES
('tesryjjjh', 'SI01', '03SISM001', 'SI01Sta12', 'kristiano', 'sta.pdf', 'diproses'),
('test', 'SI01', '03SISM001', 'SI01Per23', 'abi', 'tes.pdf', 'MAAF ajuan anda DITOLAK karena file RPS anda tidak sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(20) NOT NULL,
  `kode_waktu` varchar(10) NOT NULL,
  `kode_mkp` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `pekan` int(20) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_waktu`, `kode_mkp`, `kode_kelas`, `pekan`, `dosen`) VALUES
('ace52', 'SenB18:20', 'SI01Per23', '03SISM001', 3, ''),
('SenA071er23017', 'SenA07:10', 'SI01Per23', '03SISM001', 7, 'Galih'),
('SenA071ta1211', 'SenA07:10', 'SI01Sta12', '01SIP001', 1, ''),
('SenA07er230114', 'SenA07:10', 'SI01Per23', '03SISM001', 14, ''),
('SenA07ta1214', 'SenA07:10', 'SK01Sta12', '', 14, ''),
('SenA07ta12211', 'SenA07:10', 'SK01Sta12', '02SKP002', 11, ''),
('SenB181er23013', 'SenB18:20', 'SI01Per23', '03SISM001', 3, ''),
('SenB182', 'SenB18:20', 'SK01Sta12', '01SKM001', 2, ''),
('SenB18er230110', 'SenB18:20', 'SI01Per23', '03SISM001', 10, ''),
('SenB18er23017', 'SenB18:20', 'SI01Per23', '03SISM001', 7, ''),
('SenB18er23026', 'SenB18:20', 'SI01Per23', '03SKSM002', 6, 'Arip Cr7'),
('SenB18ta120113', 'SenB18:20', 'SK01Sta12', '03SKSM001', 13, ''),
('SenB18ta12015', 'SenB18:20', 'SK01Sta12', '03SKSM001', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `Reguler` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kode_prodi`, `semester`, `Reguler`) VALUES
('03SISM001', 'SI01', 3, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `kode_lab` varchar(10) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mkp`
--

CREATE TABLE `mkp` (
  `kode_mkp` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_mkp` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mkp`
--

INSERT INTO `mkp` (`kode_mkp`, `kode_prodi`, `nama_mkp`, `sks`) VALUES
('SI01Per23', 'SI01', 'Perancangan Basis Data 2', 3),
('SI01Sta12', 'SI01', 'Statistika 1', 2),
('SK01Sta12', 'SK01', 'Statistika 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`, `password`) VALUES
('SI01', 'Sistem Informasi', '1234'),
('SK01', 'Sistem Komputer', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `kode_waktu` varchar(10) NOT NULL,
  `reguler` varchar(5) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`kode_waktu`, `reguler`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
('SenA07:10', 'A', 'Senin', '07:10:00', '08:50:00'),
('SenB18:20', 'B', 'Senin', '18:20:00', '08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`kode_ajuan`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_mkp` (`kode_mkp`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_waktu` (`kode_waktu`,`kode_mkp`),
  ADD KEY `kode_mkp` (`kode_mkp`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_kelas_2` (`kode_kelas`),
  ADD KEY `kode_kelas_3` (`kode_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`kode_lab`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `mkp`
--
ALTER TABLE `mkp`
  ADD PRIMARY KEY (`kode_mkp`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`kode_waktu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `ajuan_ibfk_2` FOREIGN KEY (`kode_mkp`) REFERENCES `mkp` (`kode_mkp`),
  ADD CONSTRAINT `ajuan_ibfk_3` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mkp`) REFERENCES `mkp` (`kode_mkp`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_waktu`) REFERENCES `waktu` (`kode_waktu`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `jadwal` (`kode_kelas`);

--
-- Constraints for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD CONSTRAINT `laboratorium_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

--
-- Constraints for table `mkp`
--
ALTER TABLE `mkp`
  ADD CONSTRAINT `mkp_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
