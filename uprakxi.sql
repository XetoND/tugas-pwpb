-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 09:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uprakxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `nomor_laporan` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nis_siswa` int(10) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `laporan_masalah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`nomor_laporan`, `nama_siswa`, `nis_siswa`, `tanggal_laporan`, `laporan_masalah`) VALUES
(4, 'Seto', 1221312, '2022-08-31', 'Tes Laporan1'),
(5, 'Seto', 1221312, '2022-08-31', 'Tes Laporan1'),
(6, 'Seto', 20209207, '2022-08-31', 'TesLaporan'),
(7, 'Seto', 20209207, '2022-08-31', 'TesLaporan'),
(8, 'Seto ', 20209207, '2222-02-12', 'Tes Laporan'),
(9, 'Seto', 202029207, '2022-08-31', 'AC Mati'),
(10, 'Seto Romie ', 202029207, '2022-08-11', 'awdiadhioawhdoahdshahdawudjshdkahwudhoasuhdowahdsaodihawhfciapsjcipapjpocapocjasjjckiaswfhouasudhakjsdhuwadhasjkhdoaihfsahfjashdkjawhduihasjkfhiuawhdjkhaskhdwuiahdkjashifaioshkjadwhduhasjkdhiauwhfka');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `no` int(11) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `nis` int(8) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`no`, `jurusan`, `nis`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `gambar`) VALUES
(29, 'RPL', 20209207, 1234567891, 'Seto Romie Dharmansyah', 'Laki-laki', '6302dc807d3f5.jpg'),
(30, '', 0, 0, '', 'Laki-laki', '6302ea79878ab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `posisi`, `create_date`) VALUES
(1, 'guruku1', 'admin', 'admin', 'Guru', '2022-08-01'),
(15, 'siswa1@gmail.com', 'siswa1', 'siswa1', 'Murid', '2022-08-01'),
(16, 'guru2@gmail.com', 'guru2', 'guru2', 'Guru', '2022-08-01'),
(17, 'siswa2@gmail.com', 'siswa2', 'siswa2', 'Murid', '2022-08-01'),
(18, 'guru5@gmail.com', 'guru5', 'gurur5', 'Guru', '2022-08-05'),
(19, 'guru21@gmail.com', 'guru21', 'guru21', 'Guru', '2022-08-05'),
(20, 'manager@gmail.com', 'manager', 'manager', 'Guru', '2022-08-08'),
(21, 'milham@gmail.com', 'ilhamm', 'ilhamm', 'Murid', '2022-08-08'),
(22, 'alphard@gmail.com', 'alphard', 'alphard', 'Murid', '2022-08-08'),
(23, 'Chandra@gmai.com', 'Chandra', 'Chandra', 'Murid', '2022-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`nomor_laporan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `nomor_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
