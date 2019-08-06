-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Agu 2019 pada 04.48
-- Versi server: 5.7.19
-- Versi PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `tbl_jb`
--

CREATE TABLE `tbl_jb` (
  `jb_id` int(100) NOT NULL,
  `jb_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kt`
--

CREATE TABLE `tbl_kt` (
  `kt_id` int(100) NOT NULL,
  `kt_nama` varchar(200) NOT NULL,
  `kt_price` varchar(200) NOT NULL,
  `kt_reg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(100) NOT NULL,
  `log_reg` varchar(200) NOT NULL,
  `log_gaji` varchar(200) NOT NULL,
  `log_min` varchar(200) NOT NULL,
  `log_plus` varchar(200) NOT NULL,
  `log_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pg`
--

CREATE TABLE `tbl_pg` (
  `pg_id` int(100) NOT NULL,
  `pg_nama` varchar(200) NOT NULL,
  `pg_ktp` varchar(100) NOT NULL,
  `pg_jabatan` varchar(100) NOT NULL,
  `pg_kelamin` varchar(100) NOT NULL,
  `pg_status` varchar(100) NOT NULL,
  `pg_gaji` varchar(100) NOT NULL,
  `pg_reg` varchar(100) NOT NULL,
  `pg_upd` varchar(100) NOT NULL,
  `pg_phk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pg`
--

INSERT INTO `tbl_pg` (`pg_id`, `pg_nama`, `pg_ktp`, `pg_jabatan`, `pg_kelamin`, `pg_status`, `pg_gaji`, `pg_reg`, `pg_upd`, `pg_phk`) VALUES
(1, 'didin senjaya', '320124522145', 'staff marketing', 'L', '1', '4000000', '-', '-', '-'),
(2, 'nadi midala', '2221145454', 'staff design', 'P', '1', '5000000', '-', '-', '-'),
(3, 'dadang kornelo', '5645465465', 'Staff IT', 'L', '1', '2500000', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_create` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_password`, `user_create`) VALUES
(1, 'agung', 'agung123', '-'),
(2, 'mira', 'mira123', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jb`
--
ALTER TABLE `tbl_jb`
  ADD PRIMARY KEY (`jb_id`);

--
-- Indeks untuk tabel `tbl_kt`
--
ALTER TABLE `tbl_kt`
  ADD PRIMARY KEY (`kt_id`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `tbl_pg`
--
ALTER TABLE `tbl_pg`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jb`
--
ALTER TABLE `tbl_jb`
  MODIFY `jb_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kt`
--
ALTER TABLE `tbl_kt`
  MODIFY `kt_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pg`
--
ALTER TABLE `tbl_pg`
  MODIFY `pg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
