-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2024 at 03:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
('darksystem', 'MasAzies2x'),
('labkom', '1234'),
('Mesin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `kode_ajuan` varchar(20) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_mkp` varchar(10) NOT NULL,
  `kode_lab` varchar(10) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `url_rps` varchar(20) NOT NULL,
  `status_ajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`kode_ajuan`, `kode_prodi`, `kode_kelas`, `kode_mkp`, `kode_lab`, `dosen`, `url_rps`, `status_ajuan`) VALUES
('03SISM001/SI01Per23', 'si01', '03SISM001', 'SI01Per23', 'komlab', 'Arip Cr7', 'SI01Per23.pdf', 'Accept'),
('03SISM001/SI01Sta12', 'si01', '03SISM001', 'SI01Sta12', 'komlab', 'SEL', 'SI01Sta12.pdf', 'Accept'),
('03STMM001/FOREVER3', 'STM', '03STMM001', 'FOREVER3', 'Mesin', 'SOLIDARITAS', 'FOREVER3.pdf', 'Reject : karena file pdf rps tidak valid'),
('04SISM001/SI01Per23', 'si01', '04SISM001', 'SI01Per23', 'komlab', 'el steykesyen', 'SI01Per23.pdf', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(20) NOT NULL,
  `kode_ajuan` varchar(20) NOT NULL,
  `kode_waktu` varchar(10) NOT NULL,
  `pekan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_ajuan`, `kode_waktu`, `pekan`) VALUES
('1', '03SISM001/SI01Sta12', 'SenB18:20', 1),
('2', '03SISM001/SI01Sta12', 'SenB18:20', 2),
('3', '03SISM001/SI01Sta12', 'SenB18:20', 3),
('4', '03SISM001/SI01Sta12', 'SenB18:20', 4),
('5', '03SISM001/SI01Sta12', 'SenB18:20', 5),
('6', '03SISM001/SI01Sta12', 'SenB18:20', 6),
('7', '03SISM001/SI01Sta12', 'SenB18:20', 7),
('SelB181er23011', '03SISM001/SI01Per23', 'SelB18:20', 1),
('SelB181er23012', '03SISM001/SI01Per23', 'SelB18:20', 2),
('SelB181er23013', '03SISM001/SI01Per23', 'SelB18:20', 3),
('SelB181er23014', '03SISM001/SI01Per23', 'SelB18:20', 4),
('SelB181er23015', '03SISM001/SI01Per23', 'SelB18:20', 5),
('SelB181er23016', '03SISM001/SI01Per23', 'SelB18:20', 6),
('SelB181er23017', '03SISM001/SI01Per23', 'SelB18:20', 7),
('SenB18ER3011', '03STMM001/FOREVER3', 'SenB18:20', 1);

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
('02SISM001', 'SI01', 2, 'B'),
('03SADM01', 'ADM', 3, 'B'),
('03SISM001', 'SI01', 3, 'B'),
('03STMM001', 'STM', 3, 'B'),
('04SISM001', 'SI01', 4, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `kode_lab` varchar(10) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kode_lab`, `nama_lab`, `username`) VALUES
('komlab', 'Lab komputer', 'labkom'),
('Mesin', 'Lab Mesin', 'Mesin');

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
('ADMHukIn3', 'ADM', 'Hukum Internasional', 3),
('FOREVER3', 'STM', 'FOREVER', 3),
('SHPBO23', 'SI01', 'PBO 2', 3),
('SI01Alg13', 'SI01', 'Algoritma dan Pemrograman 1', 3),
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
('ADM', 'Administrasi', '123'),
('SH', 'Hukum', '1234'),
('SI01', 'Sistem Informasi', '1234'),
('SK01', 'Sistem Komputer', '1234'),
('STM', 'Teknik Mesin', '1234');

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
('5. B18:20', 'B', '5. Jumat', '18:20:00', '20:00:00'),
('RabB18:20', 'B', '3. Rabu', '18:20:00', '20:00:00'),
('SabC07:40', 'C', 'Sabtu K-1', '07:40:00', '09:20:00'),
('SelA08:50', 'A', 'Selasa', '08:50:00', '10:30:00'),
('SelB18:20', 'B', 'Selasa', '18:20:00', '20:00:00'),
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
  ADD KEY `kode_prodi` (`kode_prodi`),
  ADD KEY `kode_lab` (`kode_lab`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_ajuan` (`kode_ajuan`),
  ADD KEY `kode_waktu` (`kode_waktu`);

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
  ADD CONSTRAINT `ajuan_ibfk_3` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`),
  ADD CONSTRAINT `ajuan_ibfk_4` FOREIGN KEY (`kode_lab`) REFERENCES `laboratorium` (`kode_lab`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_ajuan`) REFERENCES `ajuan` (`kode_ajuan`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_waktu`) REFERENCES `waktu` (`kode_waktu`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);

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
