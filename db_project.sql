-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 03:55 PM
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
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rmid` int(11) NOT NULL,
  `whereroom` varchar(255) NOT NULL,
  `rmtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name_user_book` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rmid`, `whereroom`, `rmtype`, `price`, `status`, `name_user_book`) VALUES
(1, '111', 'standard', 500.00, 'ว่าง', ''),
(2, '112', 'standard', 500.00, 'ว่าง', ''),
(3, '113', 'standard', 500.00, 'ว่าง', ''),
(4, '114', 'standard', 500.00, 'ว่าง', ''),
(5, '115', 'standard', 500.00, 'ว่าง', ''),
(6, '116', 'standard', 500.00, 'ว่าง', ''),
(7, '117', 'standard', 500.00, 'ว่าง', ''),
(8, '118', 'standard', 500.00, 'ว่าง', ''),
(9, '119', 'standard', 500.00, 'ว่าง', ''),
(10, '121', 'standard', 500.00, 'ว่าง', ''),
(11, '122', 'standard', 500.00, 'ว่าง', ''),
(12, '123', 'standard', 500.00, 'ว่าง', ''),
(13, '124', 'standard', 500.00, 'ว่าง', ''),
(14, '125', 'standard', 500.00, 'ว่าง', ''),
(15, '126', 'standard', 500.00, 'ว่าง', ''),
(16, '127', 'standard', 500.00, 'ว่าง', ''),
(17, '128', 'standard', 500.00, 'ว่าง', ''),
(18, '129', 'standard', 500.00, 'ว่าง', ''),
(19, '131', 'standard', 500.00, 'ว่าง', ''),
(20, '132', 'standard', 500.00, 'ว่าง', ''),
(21, '133', 'standard', 500.00, 'ว่าง', ''),
(22, '134', 'standard', 500.00, 'ว่าง', ''),
(23, '135', 'standard', 500.00, 'ว่าง', ''),
(24, '136', 'standard', 500.00, 'ว่าง', ''),
(25, '137', 'standard', 500.00, 'ว่าง', ''),
(26, '138', 'standard', 500.00, 'ว่าง', ''),
(27, '139', 'standard', 500.00, 'ว่าง', ''),
(28, '141', 'standard', 500.00, 'ว่าง', ''),
(29, '142', 'standard', 500.00, 'ว่าง', ''),
(30, '441', 'sweet', 1500.00, 'ว่าง', ''),
(31, '442', 'sweet', 1500.00, 'ว่าง', ''),
(32, '443', 'sweet', 1500.00, 'ว่าง', ''),
(33, '444', 'sweet', 1500.00, 'ว่าง', ''),
(34, '445', 'sweet', 1500.00, 'ว่าง', ''),
(35, '446', 'sweet', 1500.00, 'ว่าง', ''),
(36, '447', 'sweet', 1500.00, 'ว่าง', ''),
(37, '448', 'sweet', 1500.00, 'ว่าง', ''),
(38, '449', 'sweet', 1500.00, 'ว่าง', ''),
(39, '451', 'sweet', 1500.00, 'ว่าง', ''),
(40, '452', 'sweet', 1500.00, 'ว่าง', ''),
(41, '453', 'sweet', 1500.00, 'ว่าง', ''),
(42, '454', 'sweet', 1500.00, 'ว่าง', ''),
(43, '455', 'sweet', 1500.00, 'ว่าง', ''),
(44, '456', 'sweet', 1500.00, 'ว่าง', ''),
(45, '457', 'sweet', 1500.00, 'ว่าง', ''),
(46, '458', 'sweet', 1500.00, 'ว่าง', ''),
(47, '459', 'sweet', 1500.00, 'ว่าง', ''),
(48, '461', 'sweet', 1500.00, 'ว่าง', ''),
(49, '462', 'sweet', 1500.00, 'ว่าง', ''),
(50, '580', 'vip', 3000.00, 'ว่าง', ''),
(51, '581', 'vip', 3000.00, 'ว่าง', ''),
(52, '582', 'vip', 3000.00, 'ว่าง', ''),
(53, '583', 'vip', 3000.00, 'ว่าง', ''),
(54, '584', 'vip', 3000.00, 'ว่าง', ''),
(55, '585', 'vip', 3000.00, 'ว่าง', ''),
(56, '586', 'vip', 3000.00, 'ว่าง', ''),
(57, '587', 'vip', 3000.00, 'ว่าง', ''),
(58, '588', 'vip', 3000.00, 'ว่าง', ''),
(59, '589', 'vip', 3000.00, 'ว่าง', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_addmin`
--

CREATE TABLE `tb_addmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_addmin`
--

INSERT INTO `tb_addmin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `idpri` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `roomtype` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_room` varchar(255) NOT NULL,
  `slip_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rmid`);

--
-- Indexes for table `tb_addmin`
--
ALTER TABLE `tb_addmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`idpri`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_addmin`
--
ALTER TABLE `tb_addmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `idpri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
