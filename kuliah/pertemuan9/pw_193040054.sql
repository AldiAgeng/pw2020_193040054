-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:34 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040054`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Aldi Ageng Tri Seftian', '193040054', 'aldiageng48@gmail.com', 'Teknik Informatika', 'aldi_ageng.png'),
(2, 'Rayhan', '193040044', 'rayhan@gmail.com', 'Teknik Informatika', 'rayhan.png'),
(3, 'Viqri', '193040041', 'viqri@gmail.com', 'Teknik Informatika', 'viqri.png'),
(4, 'Usep', '193040051', 'usep@gmail.com', 'Teknik Informatika', 'usep.png'),
(5, 'Rifky', '193040068', 'rifky@gmail.com', 'Teknik Informatika', 'rifky.png'),
(6, 'Aji', '193040046', 'aji@gmail.com', 'Teknik Informatika', 'aji.png'),
(7, 'Rio', '193040057', 'rio@gmail.com', 'Teknik Informatika', 'rio.png'),
(8, 'Shandika Galih', '043040023', 'shandikagalih@gmail.com', 'Teknik Informatika', 'shandika.png'),
(9, 'Doddy', '133040123', 'doddy@gmail.com', 'Teknik Informatika', 'doddy.png'),
(10, 'Erik', '153030321', 'erik@gmail.com', 'Ekonomi', 'erik.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
