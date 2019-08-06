-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 04:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mira`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jb`
--

CREATE TABLE `tbl_jb` (
  `jb_id` int(100) NOT NULL,
  `jb_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jb`
--

INSERT INTO `tbl_jb` (`jb_id`, `jb_name`) VALUES
(1, 'Staff Marketing'),
(2, 'Staff Design'),
(3, 'operator produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kt`
--

CREATE TABLE `tbl_kt` (
  `kt_id` int(100) NOT NULL,
  `kt_nama` varchar(200) NOT NULL,
  `kt_price` varchar(200) NOT NULL,
  `kt_reg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kt`
--

INSERT INTO `tbl_kt` (`kt_id`, `kt_nama`, `kt_price`, `kt_reg`) VALUES
(1, 'minus', '50000', '-'),
(2, 'plus', '25000', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(100) NOT NULL,
  `log_reg` varchar(200) NOT NULL,
  `log_gaji` varchar(200) NOT NULL,
  `log_min` varchar(200) NOT NULL,
  `log_plus` varchar(200) NOT NULL,
  `log_total` varchar(200) NOT NULL,
  `pg_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pg`
--

CREATE TABLE `tbl_pg` (
  `pg_id` int(100) NOT NULL,
  `pg_nama` varchar(200) NOT NULL,
  `pg_ktp` varchar(100) NOT NULL,
  `jb_id` int(100) NOT NULL,
  `pg_kelamin` varchar(100) NOT NULL,
  `pg_status` varchar(100) NOT NULL,
  `pg_gaji` varchar(100) NOT NULL,
  `pg_reg` varchar(100) NOT NULL,
  `pg_upd` varchar(100) NOT NULL,
  `pg_phk` varchar(100) NOT NULL,
  `pg_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pg`
--

INSERT INTO `tbl_pg` (`pg_id`, `pg_nama`, `pg_ktp`, `jb_id`, `pg_kelamin`, `pg_status`, `pg_gaji`, `pg_reg`, `pg_upd`, `pg_phk`, `pg_alamat`) VALUES
(2, 'dina abadid', '11223344', 1, 'P', '1', '4000000', '2019-08-06 10:46:11', '', '', 'jl raya lintang'),
(4, 'yayan kardus', '554455', 2, 'L', '1', '1000000', '2019-08-06 15:17:44', '', '', 'holis bandung raya patimura');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_create` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_password`, `user_create`) VALUES
(1, 'agung', 'agung123', '-'),
(2, 'mira', 'mira123', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jb`
--
ALTER TABLE `tbl_jb`
  ADD PRIMARY KEY (`jb_id`);

--
-- Indexes for table `tbl_kt`
--
ALTER TABLE `tbl_kt`
  ADD PRIMARY KEY (`kt_id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_pg`
--
ALTER TABLE `tbl_pg`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jb`
--
ALTER TABLE `tbl_jb`
  MODIFY `jb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kt`
--
ALTER TABLE `tbl_kt`
  MODIFY `kt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pg`
--
ALTER TABLE `tbl_pg`
  MODIFY `pg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
