-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2024 at 11:21 AM
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
('labbio', 'sprinter123'),
('labkim', 'sprinter123'),
('labkom', 'sprinter123'),
('labmikro', 'sprinter123');

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
  `kode_waktu` varchar(10) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `url_rps` varchar(20) NOT NULL,
  `status_ajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(20) NOT NULL,
  `kode_ajuan` varchar(20) NOT NULL,
  `pekan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('01ADNE001', 'ADN', 1, 'CS'),
('01ADNE002', 'ADN', 1, 'CS'),
('01ADNM001', 'ADN', 1, 'B'),
('01ADNP001', 'ADN', 1, 'A'),
('01ADNP002', 'ADN', 1, 'A'),
('01ADNP003', 'ADN', 1, 'A'),
('01ADNP004', 'ADN', 1, 'A'),
('01ADNP005', 'ADN', 1, 'A'),
('01AKSE001', 'AK', 1, 'CS'),
('01AKSE002', 'AK', 1, 'CS'),
('01AKSE003', 'AK', 1, 'CS'),
('01AKSE004', 'AK', 1, 'CS'),
('01AKSM001', 'AK', 1, 'B'),
('01AKSP001', 'AK', 1, 'A'),
('01AKSP002', 'AK', 1, 'A'),
('01AKSP003', 'AK', 1, 'A'),
('01AKSP004', 'AK', 1, 'A'),
('01AKSP005', 'AK', 1, 'A'),
('01AKSP006', 'AK', 1, 'A'),
('01AKSP007', 'AK', 1, 'A'),
('01BIOE001', 'Bio', 1, 'CS'),
('01BIOP001', 'Bio', 1, 'A'),
('01BIOP002', 'Bio', 1, 'A'),
('01ELSE001', 'TE', 1, 'CS'),
('01ELSE002', 'TE', 1, 'CS'),
('01ELSE003', 'TE', 1, 'CS'),
('01ELSE004', 'TE', 1, 'CS'),
('01ELSM001', 'TE', 1, 'B'),
('01ELSM002', 'TE', 1, 'B'),
('01ELSM003', 'TE', 1, 'B'),
('01ELSM004', 'TE', 1, 'B'),
('01ELSP001', 'TE', 1, 'A'),
('01ELSP002', 'TE', 1, 'A'),
('01ELSP003', 'TE', 1, 'A'),
('01ELSP004', 'TE', 1, 'A'),
('01HKSE001', 'HK', 1, 'CS'),
('01HKSE002', 'HK', 1, 'CS'),
('01HKSE003', 'HK', 1, 'CS'),
('01HKSE004', 'HK', 1, 'CS'),
('01HKSE005', 'HK', 1, 'CS'),
('01HKSE006', 'HK', 1, 'CS'),
('01HKSM001', 'HK', 1, 'B'),
('01HKSM002', 'HK', 1, 'B'),
('01HKSM003', 'HK', 1, 'B'),
('01HKSP001', 'HK', 1, 'A'),
('01HKSP002', 'HK', 1, 'A'),
('01HKSP003', 'HK', 1, 'A'),
('01HKSP004', 'HK', 1, 'A'),
('01HKSP005', 'HK', 1, 'A'),
('01HKSP006', 'HK', 1, 'A'),
('01HKSP007', 'HK', 1, 'A'),
('01HKSP008', 'HK', 1, 'A'),
('01IPME001', 'IP', 1, 'CS'),
('01IPME002', 'IP', 1, 'CS'),
('01IPMM001', 'IP', 1, 'B'),
('01IPMP001', 'IP', 1, 'A'),
('01IPMP002', 'IP', 1, 'A'),
('01IPMP003', 'IP', 1, 'A'),
('01IPMP004', 'IP', 1, 'A'),
('01KMSE001', 'KM', 1, 'CS'),
('01KMSM001', 'KM', 1, 'B'),
('01KMSP001', 'KM', 1, 'A'),
('01MJSE001', 'MJ', 1, 'CS'),
('01MJSE002', 'MJ', 1, 'CS'),
('01MJSE003', 'MJ', 1, 'CS'),
('01MJSE004', 'MJ', 1, 'CS'),
('01MJSE005', 'MJ', 1, 'CS'),
('01MJSE006', 'MJ', 1, 'CS'),
('01MJSE007', 'MJ', 1, 'CS'),
('01MJSE008', 'MJ', 1, 'CS'),
('01MJSE009', 'MJ', 1, 'CS'),
('01MJSE010', 'MJ', 1, 'CS'),
('01MJSE011', 'MJ', 1, 'CS'),
('01MJSE012', 'MJ', 1, 'CS'),
('01MJSE013', 'MJ', 1, 'CS'),
('01MJSE014', 'MJ', 1, 'CS'),
('01MJSE015', 'MJ', 1, 'CS'),
('01MJSM001', 'MJ', 1, 'B'),
('01MJSM002', 'MJ', 1, 'B'),
('01MJSM003', 'MJ', 1, 'B'),
('01MJSM004', 'MJ', 1, 'B'),
('01MJSM005', 'MJ', 1, 'B'),
('01MJSM006', 'MJ', 1, 'B'),
('01MJSM007', 'MJ', 1, 'B'),
('01MJSM008', 'MJ', 1, 'B'),
('01MJSP001', 'MJ', 1, 'A'),
('01MJSP002', 'MJ', 1, 'A'),
('01MJSP003', 'MJ', 1, 'A'),
('01MJSP004', 'MJ', 1, 'A'),
('01MJSP005', 'MJ', 1, 'A'),
('01MJSP006', 'MJ', 1, 'A'),
('01MJSP007', 'MJ', 1, 'A'),
('01MJSP008', 'MJ', 1, 'A'),
('01MJSP009', 'MJ', 1, 'A'),
('01MJSP010', 'MJ', 1, 'A'),
('01MJSP011', 'MJ', 1, 'A'),
('01MJSP012', 'MJ', 1, 'A'),
('01MJSP013', 'MJ', 1, 'A'),
('01MJSP014', 'MJ', 1, 'A'),
('01MJSP015', 'MJ', 1, 'A'),
('01MJSP016', 'MJ', 1, 'A'),
('01MJSP017', 'MJ', 1, 'A'),
('01MJSP018', 'MJ', 1, 'A'),
('01MJSP019', 'MJ', 1, 'A'),
('01MJSP020', 'MJ', 1, 'A'),
('01MJSP021', 'MJ', 1, 'A'),
('01MSSE001', 'TM', 1, 'CS'),
('01MSSE002', 'TM', 1, 'CS'),
('01MSSE003', 'TM', 1, 'CS'),
('01MSSM001', 'TM', 1, 'B'),
('01MSSM002', 'TM', 1, 'B'),
('01MSSM003', 'TM', 1, 'B'),
('01MSSP001', 'TM', 1, 'A'),
('01MSSP002', 'TM', 1, 'A'),
('01MSSP003', 'TM', 1, 'A'),
('01MSSP004', 'TM', 1, 'A'),
('01MTSE001', 'MT', 1, 'CS'),
('01SISE001', 'SI', 1, 'CS'),
('01SISE002', 'SI', 1, 'CS'),
('01SISE003', 'SI', 1, 'CS'),
('01SISE004', 'SI', 1, 'CS'),
('01SISE005', 'SI', 1, 'CS'),
('01SISE006', 'SI', 1, 'CS'),
('01SISM001', 'SI', 1, 'B'),
('01SISM002', 'SI', 1, 'B'),
('01SISM003', 'SI', 1, 'B'),
('01SISM004', 'SI', 1, 'B'),
('01SISP001', 'SI', 1, 'A'),
('01SISP002', 'SI', 1, 'A'),
('01SISP003', 'SI', 1, 'A'),
('01SISP004', 'SI', 1, 'A'),
('01SISP005', 'SI', 1, 'A'),
('01SISP006', 'SI', 1, 'A'),
('01SISP007', 'SI', 1, 'A'),
('01SISP008', 'SI', 1, 'A'),
('01SISP009', 'SI', 1, 'A'),
('01SISP010', 'SI', 1, 'A'),
('01SISP011', 'SI', 1, 'A'),
('01SKME001', 'SK', 1, 'CS'),
('01SKME002', 'SK', 1, 'CS'),
('01SKME003', 'SK', 1, 'CS'),
('01SKME004', 'SK', 1, 'CS'),
('01SKMM001', 'SK', 1, 'B'),
('01SKMM002', 'SK', 1, 'B'),
('01SKMM003', 'SK', 1, 'B'),
('01SKMP001', 'SK', 1, 'A'),
('01SKMP002', 'SK', 1, 'A'),
('01SKMP003', 'SK', 1, 'A'),
('01SKMP004', 'SK', 1, 'A'),
('02ADNE001', 'ADN', 2, 'CS'),
('02ADNM001', 'ADN', 2, 'B'),
('02ADNP001', 'ADN', 2, 'A'),
('02AKSE001', 'AK', 2, 'CS'),
('02AKSE002', 'AK', 2, 'CS'),
('02AKSM001', 'AK', 2, 'B'),
('02AKSM002', 'AK', 1, 'B'),
('02AKSP001', 'AK', 2, 'A'),
('02ELSE001', 'TE', 2, 'CS'),
('02ELSE002', 'TE', 2, 'CS'),
('02ELSM001', 'TE', 2, 'B'),
('02ELSM002', 'TE', 2, 'B'),
('02HKSE001', 'HK', 2, 'CS'),
('02HKSE002', 'HK', 2, 'CS'),
('02HKSE003', 'HK', 2, 'CS'),
('02HKSM001', 'HK', 2, 'B'),
('02HKSM002', 'HK', 2, 'B'),
('02HKSP001', 'HK', 2, 'A'),
('02IPME001', 'IP', 2, 'CS'),
('02IPMM001', 'IP', 2, 'B'),
('02IPMP001', 'IP', 2, 'A'),
('02KMSE001', 'KM', 2, 'CS'),
('02MJSE001', 'MJ', 2, 'CS'),
('02MJSE002', 'MJ', 2, 'CS'),
('02MJSE003', 'MJ', 2, 'CS'),
('02MJSE004', 'MJ', 2, 'CS'),
('02MJSE005', 'MJ', 2, 'CS'),
('02MJSE006', 'MJ', 2, 'CS'),
('02MJSE007', 'MJ', 2, 'CS'),
('02MJSM001', 'MJ', 2, 'B'),
('02MJSM002', 'MJ', 2, 'B'),
('02MJSM003', 'MJ', 2, 'B'),
('02MJSM004', 'MJ', 2, 'B'),
('02MJSP001', 'MJ', 2, 'A'),
('02MJSP002', 'MJ', 2, 'A'),
('02MJSP003', 'MJ', 2, 'A'),
('02MSSE001', 'TM', 2, 'CS'),
('02MSSE002', 'TM', 2, 'CS'),
('02MSSM001', 'TM', 2, 'B'),
('02MSSM002', 'TM', 2, 'B'),
('02MSSP001', 'TM', 2, 'A'),
('02SISE001', 'SI', 2, 'CS'),
('02SISE002', 'SI', 2, 'CS'),
('02SISE003', 'SI', 2, 'CS'),
('02SISM001', 'SI', 2, 'B'),
('02SISM002', 'SI', 2, 'B'),
('02SISP001', 'SI', 2, 'A'),
('02SISP002', 'SI', 2, 'A'),
('02SKME001', 'SK', 2, 'CS'),
('02SKMM001', 'SK', 2, 'B'),
('02SKMP001', 'SK', 2, 'A'),
('02SKMP002', 'SK', 2, 'A'),
('03ADNE001', 'ADN', 3, 'CS'),
('03ADNM001', 'ADN', 3, 'B'),
('03ADNP001', 'ADN', 3, 'A'),
('03ADNP002', 'ADN', 3, 'A'),
('03AKSE001', 'AK', 3, 'CS'),
('03AKSE002', 'AK', 3, 'CS'),
('03AKSE003', 'AK', 3, 'CS'),
('03AKSM001', 'AK', 3, 'B'),
('03AKSM002', 'AK', 3, 'B'),
('03AKSP001', 'AK', 3, 'A'),
('03AKSP002', 'AK', 3, 'A'),
('03AKSP003', 'AK', 3, 'A'),
('03BIOE001', 'Bio', 3, 'CS'),
('03BIOM001', 'Bio', 3, 'B'),
('03BIOP001', 'Bio', 3, 'A'),
('03ELSE001', 'TE', 3, 'CS'),
('03ELSE002', 'TE', 3, 'CS'),
('03ELSM001', 'TE', 3, 'B'),
('03ELSM002', 'TE', 3, 'B'),
('03ELSP001', 'TE', 3, 'A'),
('03ELSP002', 'TE', 3, 'A'),
('03HKSE001', 'HK', 3, 'CS'),
('03HKSE002', 'HK', 3, 'CS'),
('03HKSE003', 'HK', 3, 'CS'),
('03HKSE004', 'HK', 3, 'CS'),
('03HKSE005', 'HK', 3, 'CS'),
('03HKSM001', 'HK', 3, 'B'),
('03HKSM002', 'HK', 3, 'B'),
('03HKSP001', 'HK', 3, 'A'),
('03HKSP002', 'HK', 3, 'A'),
('03HKSP003', 'HK', 3, 'A'),
('03IPME001', 'IP', 3, 'CS'),
('03IPMM001', 'IP', 3, 'B'),
('03IPMP001', 'IP', 3, 'A'),
('03KMSE001', 'KM', 3, 'CS'),
('03KMSM001', 'KM', 3, 'B'),
('03KMSP001', 'KM', 3, 'A'),
('03MJSE001', 'MJ', 3, 'CS'),
('03MJSE002', 'MJ', 3, 'CS'),
('03MJSE003', 'MJ', 3, 'CS'),
('03MJSE004', 'MJ', 3, 'CS'),
('03MJSE005', 'MJ', 3, 'CS'),
('03MJSE006', 'MJ', 3, 'CS'),
('03MJSE007', 'MJ', 3, 'CS'),
('03MJSE008', 'MJ', 3, 'CS'),
('03MJSE009', 'MJ', 3, 'CS'),
('03MJSE010', 'MJ', 3, 'CS'),
('03MJSE011', 'MJ', 3, 'CS'),
('03MJSM001', 'MJ', 3, 'B'),
('03MJSM002', 'MJ', 3, 'B'),
('03MJSM003', 'MJ', 3, 'B'),
('03MJSM004', 'MJ', 3, 'B'),
('03MJSM005', 'MJ', 3, 'B'),
('03MJSM006', 'MJ', 3, 'B'),
('03MJSP001', 'MJ', 3, 'A'),
('03MJSP002', 'MJ', 3, 'A'),
('03MJSP003', 'MJ', 3, 'A'),
('03MJSP004', 'MJ', 3, 'A'),
('03MJSP005', 'MJ', 3, 'A'),
('03MJSP006', 'MJ', 3, 'A'),
('03MJSP007', 'MJ', 3, 'A'),
('03MJSP008', 'MJ', 3, 'A'),
('03MSSE001', 'TM', 3, 'CS'),
('03MSSE002', 'TM', 3, 'CS'),
('03MSSE003', 'TM', 3, 'CS'),
('03MSSM001', 'TM', 3, 'B'),
('03MSSM002', 'TM', 3, 'B'),
('03MSSP001', 'TM', 3, 'A'),
('03MSSP002', 'TM', 3, 'A'),
('03MTSM001', 'MT', 3, 'B'),
('03MTSP001', 'MT', 3, 'A'),
('03SISE001', 'SI', 3, 'CS'),
('03SISE002', 'SI', 3, 'CS'),
('03SISE003', 'SI', 3, 'CS'),
('03SISE004', 'SI', 3, 'CS'),
('03SISM01', 'SI', 3, 'B'),
('03SISM02', 'SI', 3, 'B'),
('03SISM03', 'SI', 3, 'B'),
('03SISP001', 'SI', 3, 'A'),
('03SISP002', 'SI', 3, 'A'),
('03SISP003', 'SI', 3, 'A'),
('03SISP004', 'SI', 3, 'A'),
('03SISP005', 'SI', 3, 'A'),
('03SKME001', 'SK', 3, 'CS'),
('03SKME002', 'SK', 3, 'CS'),
('03SKME003', 'SK', 3, 'CS'),
('03SKMM001', 'SK', 3, 'B'),
('03SKMM002', 'SK', 3, 'B'),
('03SKMP001', 'SK', 3, 'A'),
('03SKMP002', 'SK', 3, 'A'),
('04ADNE001', 'ADN', 4, 'CS'),
('04AKSE001', 'AK', 4, 'CS'),
('04AKSM001', 'AK', 4, 'B'),
('04ELSE001', 'TE', 4, 'CS'),
('04ELSM001', 'TE', 4, 'B'),
('04HKSE001', 'HK', 4, 'CS'),
('04HKSE002', 'HK', 4, 'CS'),
('04HKSM001', 'HK', 4, 'B'),
('04HKSP001', 'HK', 4, 'A'),
('04IPME001', 'IP', 4, 'CS'),
('04IPMM001', 'IP', 4, 'B'),
('04IPMP001', 'IP', 4, 'A'),
('04KMSE001', 'KM', 4, 'CS'),
('04KMSM001', 'KM', 4, 'B'),
('04MJSE001', 'MJ', 4, 'CS'),
('04MJSE002', 'MJ', 4, 'CS'),
('04MJSE003', 'MJ', 4, 'CS'),
('04MJSM001', 'MJ', 4, 'B'),
('04MJSM002', 'MJ', 4, 'B'),
('04MJSP001', 'MJ', 4, 'A'),
('04MJSP002', 'MJ', 4, 'A'),
('04MSSE001', 'TM', 4, 'CS'),
('04MSSM001', 'TM', 4, 'B'),
('04MSSP001', 'TM', 4, 'A'),
('04MTSE001', 'MT', 4, 'CS'),
('04SISE001', 'SI', 4, 'CS'),
('04SISE002', 'SI', 4, 'CS'),
('04SISM001', 'SI', 4, 'B'),
('04SISP001', 'SI', 4, 'A'),
('04SKME001', 'SK', 4, 'CS'),
('04SKMM001', 'SK', 4, 'B'),
('04SKMP001', 'SK', 4, 'A'),
('05ADNE001', 'ADN', 5, 'CS'),
('05ADNM001', 'ADN', 5, 'B'),
('05ADNP001', 'ADN', 5, 'A'),
('05AKSE001', 'AK', 5, 'CS'),
('05AKSM001', 'AK', 5, 'B'),
('05AKSP001', 'AK', 5, 'A'),
('05BIOE001', 'Bio', 5, 'CS'),
('05BIOM001', 'Bio', 5, 'B'),
('05BIOP001', 'Bio', 5, 'A'),
('05ELSE001', 'TE', 5, 'CS'),
('05ELSM001', 'TE', 5, 'B'),
('05ELSP001', 'TE', 5, 'A'),
('05HKSE001', 'HK', 5, 'CS'),
('05HKSE002', 'HK', 5, 'CS'),
('05HKSK005', 'HK', 5, 'CK'),
('05HKSM001', 'HK', 5, 'B'),
('05HKSP001', 'HK', 5, 'A'),
('05IPME001', 'IP', 5, 'CS'),
('05IPMM001', 'IP', 5, 'B'),
('05IPMP001', 'IP', 5, 'A'),
('05KMSE001', 'KM', 5, 'CS'),
('05KMSM001', 'KM', 5, 'B'),
('05KMSP001', 'KM', 5, 'A'),
('05MJSE001', 'MJ', 5, 'CS'),
('05MJSE004', 'MJ', 5, 'CS'),
('05MJSE007', 'MJ', 5, 'CS'),
('05MJSE010', 'MJ', 5, 'CS'),
('05MJSK001', 'MJ', 5, 'CK'),
('05MJSM001', 'MJ', 5, 'B'),
('05MJSM002', 'MJ', 5, 'B'),
('05MJSP001', 'MJ', 5, 'A'),
('05MJSP002', 'MJ', 5, 'A'),
('05MSSE001', 'TM', 5, 'CS'),
('05MSSM001', 'TM', 5, 'B'),
('05MSSP001', 'TM', 5, 'A'),
('05MTSE001', 'MT', 5, 'CS'),
('05MTSP001', 'MT', 5, 'A'),
('05SISE001', 'SI', 5, 'CS'),
('05SISE002', 'SI', 5, 'CS'),
('05SISM001', 'SI', 5, 'B'),
('05SISP001', 'SI', 5, 'A'),
('05SKME001', 'SK', 5, 'CS'),
('05SKMK001', 'SK', 5, 'CK'),
('05SKMM001', 'SK', 5, 'B'),
('05SKMP001', 'SK', 5, 'A'),
('06ADNE001', 'ADN', 6, 'CS'),
('06AKSE001', 'AK', 6, 'CS'),
('06BIOE001', 'Bio', 6, 'CS'),
('06BIOM001', 'Bio', 6, 'B'),
('06ELSE001', 'TE', 6, 'CS'),
('06ELSM001', 'TE', 6, 'B'),
('06HKSE001', 'HK', 6, 'CS'),
('06HKSM001', 'HK', 6, 'B'),
('06IPME001', 'IP', 6, 'CS'),
('06IPMP001', 'IP', 6, 'A'),
('06MJSE001', 'MJ', 6, 'CS'),
('06MJSK001', 'MJ', 6, 'CK'),
('06MJSM001', 'MJ', 6, 'B'),
('06MJSP001', 'MJ', 6, 'A'),
('06MSSE001', 'TM', 6, 'CS'),
('06MSSM001', 'TM', 6, 'B'),
('06MSSP001', 'TM', 6, 'A'),
('06MTSM001', 'MT', 6, 'B'),
('06SISE001', 'SI', 6, 'CS'),
('06SISM001', 'SI', 6, 'B'),
('06SISP001', 'SI', 6, 'A'),
('06SKMM001', 'SK', 6, 'B'),
('06SKMP001', 'SK', 6, 'A'),
('07ADNE001', 'ADN', 7, 'CS'),
('07ADNM001', 'ADN', 7, 'B'),
('07AKSE001', 'AK', 7, 'CS'),
('07AKSM001', 'AK', 7, 'B'),
('07AKSP001', 'AK', 7, 'A'),
('07BIOE001', 'Bio', 7, 'CS'),
('07BIOP001', 'Bio', 7, 'A'),
('07ELSE001', 'TE', 7, 'CS'),
('07ELSM001', 'TE', 7, 'B'),
('07ELSP001', 'TE', 7, 'A'),
('07HKSE001', 'HK', 7, 'CS'),
('07HKSM001', 'HK', 7, 'B'),
('07HKSP001', 'HK', 7, 'A'),
('07IPME001', 'IP', 7, 'CS'),
('07IPMM001', 'IP', 7, 'B'),
('07IPMP001', 'IP', 7, 'A'),
('07KMSE001', 'KM', 7, 'CS'),
('07KMSM001', 'KM', 7, 'B'),
('07MJSE001', 'MJ', 7, 'CS'),
('07MJSM001', 'MJ', 7, 'B'),
('07MJSP001', 'MJ', 7, 'A'),
('07MSSE001', 'TM', 7, 'CS'),
('07MSSK001', 'TM', 7, 'CK'),
('07MSSM001', 'TM', 7, 'B'),
('07MSSP001', 'TM', 7, 'A'),
('07MTSE001', 'MT', 7, 'CS'),
('07SISE001', 'SI', 7, 'CS'),
('07SISM001', 'SI', 7, 'B'),
('07SISP001', 'SI', 7, 'A'),
('07SKME001', 'SK', 7, 'CS'),
('07SKMM001', 'SK', 7, 'B'),
('07SKMP001', 'SK', 7, 'A');

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
('Lab-Biolo', 'Lab Biologi', 'labbio'),
('Lab-Kimia', 'Lab Kimia', 'labkim'),
('Lab-Kompu', 'Lab Komputer', 'labkom'),
('Lab-Mikro', 'Lab Mikrokontroler', 'labmikro');

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
('ADNMetKu1', 'ADN', 'Metode Penelitian Kualitatif', 1),
('ADNSise-1', 'ADN', 'Sistem Informasi Manajemen dan e-Government', 1),
('AKKomAk1', 'AK', 'Komputer Akuntansi', 1),
('AKPenKo1', 'AK', 'Pengantar Aplikasi Komputer', 1),
('AKStaSo1', 'ADN', 'Statistika Sosial', 1),
('BioPemKo1', 'Bio', 'Pemrograman Komputer', 1),
('KMPemKo1', 'KM', 'Pemrograman Komputer', 1),
('MTAnaMu1', 'MT', 'Analisis Multivariat', 1),
('MTAnaRe1', 'MT', 'Analisis Regresi', 1),
('MTDatMa1', 'MT', 'Data Maining', 1),
('MTDatSa1', 'MT', 'Data Sains', 1),
('MTPemKo1', 'MT', 'Pemrograman Komputer', 1),
('MTPemMa1', 'MT', 'Pemodelan Matematika', 1),
('MTProSt1', 'MT', 'Proses Stokastik', 1),
('MTSisDi1', 'MT', 'Sistem Dinamik', 1),
('MTStaEl1', 'MT', 'Statistika Elementer', 1),
('MTStaPa1', 'MT', 'Statistik Non Paramterik', 1),
('SIAlgDa1', 'SI', 'Algoritma Struktur Data', 1),
('SIAlgPe1', 'SI', 'Algoritma Pemrograman', 1),
('SIBahTe1', 'SI', 'Bahasa Query Terstruktur', 1),
('SIDatMi1', 'SI', 'Data Mining', 1),
('SIMobPr1', 'SI', 'Mobile Programming', 1),
('SIPem11', 'SI', 'Pemrograman Berorientasi Obyek 1', 1),
('SIPem21', 'SI', 'Pemrograman Berorientasi Obyek 2', 1),
('SIPenKo1', 'SK', 'Pengantar Aplikasi Komputer', 1),
('SKAlg11', 'SK', 'Algoritma dan Pemrograman 1', 1),
('SKAlg21', 'SK', 'Algoritma dan Pemrograman 2', 1),
('SKBasCo1', 'SK', 'Basic Programable Logic Controller', 1),
('SKBasDa1', 'SK', 'Basis Data', 1),
('SKPraKo1', 'SK', 'Praktikum Jaringan Komputer', 1),
('SKProCo1', 'SK', 'Programable Logic Controller', 1),
('SKSIs21', 'SK', 'SIstem Digital 2', 1),
('SKStrDa1', 'SK', 'Struktur Data', 1),
('SKSupAc1', 'SK', 'Supervisory Control and Data Acquisition', 1),
('SKTekKo1', 'SK', 'Teknik Komputer', 1),
('SKTekMu1', 'SK', 'Teknik Antar Muka', 1),
('TEDasPe1', 'TE', 'Dasar Komputer dan Pemrograman', 1),
('TEEleDi1', 'TE', 'Elektronika Digital', 1),
('TEInsKo1', 'TE', 'Instrumen Berbasis Komputer', 1),
('TEJarKo1', 'TE', 'Jaringan Komputer', 1),
('TEMenKo1', 'TM', 'Menggambar Teknik Berbasis Komputer', 1),
('TEMenTe1', 'TE', 'Menggamabar Teknik', 1),
('TEMetNu1', 'TE', 'Metode Numerik', 1),
('TEProCo1', 'TE', 'Programmable Logic Controller', 1),
('TEProSt1', 'TE', 'Probabilitas dan Statistik', 1),
('TESisLi1', 'TE', 'Sistem Linier', 1),
('TMDasPe1', 'TM', 'Dasar Komputer dan Pemrograman', 1),
('TMMenKo1', 'TM', 'Menggamabar Mesin Berbasis Komputer', 1);

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
('ADN', 'Administrasi Negara', 'sprinter123'),
('AK', 'Akuntansi', 'sprinter123'),
('Bio', 'Biologi', 'sprinter123'),
('HK', 'Hukum', 'sprinter123'),
('IP', 'Ilmu Pemerintahan', 'sprinter123'),
('KM', 'Kimia', 'sprinter123'),
('MJ', 'Manajemen', 'sprinter123'),
('MT', 'Matematika', 'sprinter123'),
('SI', 'Sistem Informasi', 'sprinter123'),
('SK', 'Sistem Komputer', 'sprinter123'),
('TE', 'Teknik Elektro', 'sprinter123'),
('TM', 'Teknik Mesin', 'sprinter123');

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
('1SenA07:10', 'A', 'Senin', '07:10:00', '08:50:00'),
('1SenA08:50', 'A', 'Senin', '08:50:00', '10:30:00'),
('1SenA10:30', 'A', 'Senin', '10:30:00', '12:10:00'),
('1SenA13:00', 'A', 'Senin', '13:00:00', '14:40:00'),
('1SenA14:40', 'A', 'Senin', '14:40:00', '16:20:00'),
('1SenB18:20', 'B', 'Senin', '18:20:00', '20:00:00'),
('1SenB20:00', 'B', 'Senin', '20:00:00', '21:40:00'),
('2SelA07:10', 'A', 'Selasa', '07:10:00', '08:50:00'),
('2SelA08:50', 'A', 'Selasa', '08:50:00', '10:30:00'),
('2SelA10:30', 'A', 'Selasa', '10:30:00', '12:10:00'),
('2SelA13:00', 'A', 'Selasa', '13:00:00', '14:40:00'),
('2SelA14:40', 'A', 'Selasa', '14:40:00', '16:20:00'),
('2SelB18:20', 'B', 'Selasa', '18:20:00', '20:00:00'),
('2SelB20:00', 'B', 'Selasa', '20:00:00', '21:40:00'),
('3RabA07:10', 'A', 'Rabu', '07:10:00', '08:50:00'),
('3RabA08:50', 'A', 'Rabu', '08:50:00', '10:30:00'),
('3RabA10:30', 'A', 'Rabu', '10:30:00', '12:10:00'),
('3RabA13:00', 'A', 'Rabu', '13:00:00', '14:40:00'),
('3RabA14:40', 'A', 'Rabu', '14:40:00', '16:20:00'),
('3RabB18:20', 'B', 'Rabu', '18:20:00', '20:00:00'),
('3RabB20:00', 'B', 'Rabu', '20:00:00', '21:40:00'),
('4KamB18:20', 'B', 'Kamis', '18:20:00', '20:00:00'),
('4KamB20:00', 'B', 'Kamis', '20:00:00', '21:40:00'),
('5JumA07:10', 'A', 'Jumat', '07:10:00', '08:50:00'),
('5JumA08:50', 'A', 'Jumat', '08:50:00', '10:30:00'),
('5JumA10:30', 'A', 'Jumat', '10:30:00', '12:10:00'),
('5JumA13:00', 'A', 'Jumat', '13:00:00', '14:40:00'),
('5JumA14:40', 'A', 'Jumat', '14:40:00', '16:20:00'),
('5JumB18:20', 'B', 'Jumat', '18:20:00', '20:00:00'),
('5JumB20:00', 'B', 'Jumat', '20:00:00', '21:40:00'),
('6SabC07:40', 'C', 'Sabtu K-1', '07:40:00', '09:20:00'),
('6SabC09:20', 'C', 'Sabtu K-1', '09:20:00', '11:00:00'),
('6SabC11:00', 'C', 'Sabtu K-1', '11:00:00', '12:40:00'),
('6SabC13:50', 'C', 'Sabtu K-1', '13:50:00', '15:30:00'),
('6SabC15:30', 'C', 'Sabtu K-1', '15:30:00', '17:10:00'),
('7SabC07:40', 'C', 'Sabtu K-2', '07:40:00', '09:20:00'),
('7SabC09:20', 'C', 'Sabtu K-2', '09:20:00', '11:00:00'),
('7SabC11:00', 'C', 'Sabtu K-2', '11:00:00', '12:40:00'),
('7SabC13:50', 'C', 'Sabtu K-2', '13:50:00', '15:30:00'),
('7SabC15:30', 'C', 'Sabtu K-2', '15:30:00', '17:10:00'),
('8KamC07:40', 'C', 'Kamis K-1', '07:40:00', '09:20:00'),
('8KamC09:20', 'C', 'Kamis K-1', '09:20:00', '11:00:00'),
('8KamC11:00', 'C', 'Kamis K-1', '11:00:00', '12:40:00'),
('8KamC13:50', 'C', 'Kamis K-1', '13:50:00', '15:30:00'),
('8KamC15:30', 'C', 'Kamis K-1', '15:30:00', '17:10:00'),
('9KamC07:40', 'C', 'Kamis K-2', '07:40:00', '09:20:00'),
('9KamC09:20', 'C', 'Kamis K-2', '09:20:00', '11:00:00'),
('9KamC11:00', 'C', 'Kamis K-2', '11:00:00', '12:40:00'),
('9KamC13:50', 'C', 'Kamis K-2', '13:50:00', '15:30:00'),
('9KamC15:30', 'C', 'Kamis K-2', '15:30:00', '17:10:00');

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
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_waktu` (`kode_waktu`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_ajuan` (`kode_ajuan`);

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
  ADD CONSTRAINT `ajuan_ibfk_4` FOREIGN KEY (`kode_lab`) REFERENCES `laboratorium` (`kode_lab`),
  ADD CONSTRAINT `ajuan_ibfk_5` FOREIGN KEY (`kode_waktu`) REFERENCES `waktu` (`kode_waktu`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_ajuan`) REFERENCES `ajuan` (`kode_ajuan`);

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
