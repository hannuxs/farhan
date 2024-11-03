-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` varchar(10) NOT NULL,
  `path` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(20) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `path`, `tanggal`, `jam`, `user`, `file`, `status`) VALUES
('67277b99e2', 'uploads/67277b99e245b.docx', '2024-11-03', '21:33:13', 'admin', 'print3.docx', '0'),
('67277bb8e9', 'uploads/67277bb8e9b63.docx', '2024-11-03', '21:33:44', 'admin', 'print3.docx', '0'),
('672780dcd1', 'uploads/672780dcd1184.pdf', '2024-11-03', '21:55:40', 'admin', '6404072301050001_kartuUjian (1).pdf', '0'),
('6727828c54', 'uploads/6727828c544c9.pdf', '2024-11-03', '22:02:52', 'admin', 'Audit-Medis.pdf', '0'),
('672782a9f2', 'uploads/672782a9f2aec.pdf', '2024-11-03', '22:03:21', 'admin', 'Audit-Medis.pdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nip`, `nama`, `tgl_lahir`, `email`, `pw`) VALUES
('123', 'aaa', 'aaa', 'aaa', 'dVlYQUE2YitQOXVwdkZpc1B0Q0ptQT09Ojpfokac4ZznJAOYeQtKp2Qg'),
('admin', 'admin', 'admin', 'admin', 'L3U2ZXlaS05GWE1ZcFlSWjVQNkpndz09Ojoct6fiq4htm1pYUgLNcWkt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`,`tanggal`,`jam`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
