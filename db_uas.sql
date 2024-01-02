-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 04:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `warga_id` int(11) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_iuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id`, `tanggal`, `warga_id`, `nominal`, `keterangan`, `jenis_iuran`) VALUES
(6, '2024-01-01', 4, '100000', '', 'uang sampah'),
(7, '2023-12-20', 3, '100000', 'denda ronda', 'lainnya'),
(8, '2024-01-03', 5, '100000', '', 'sumbangan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis_iuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_iuran`) VALUES
(4, 'lainnya'),
(3, 'sumbangan'),
(1, 'uang kas\r\n'),
(2, 'uang sampah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `role`) VALUES
(4, 'yanto', 'yanto@gmail.com', '123', 1, 2),
(5, 'samid', 'samid@gmail.com', 'ikan', 1, 2),
(6, 'Dimas Firmansyah', 'dimas@gmail.com', '12345', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `status`, `user_id`) VALUES
(3, '12345', 'samid', 'P', '081234', 'jl anggrek', 1, 5),
(4, '54321', 'dimas', 'L', '098212', 'jl anggrek', 1, 6),
(5, '12435', 'yanto', 'L', '083932', 'jl anggrek', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`),
  ADD KEY `jenis_iuran` (`jenis_iuran`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_iuran` (`jenis_iuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `iuran_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`),
  ADD CONSTRAINT `iuran_ibfk_2` FOREIGN KEY (`jenis_iuran`) REFERENCES `jenis` (`jenis_iuran`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
