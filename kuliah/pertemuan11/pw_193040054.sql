-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 03:45 PM
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
-- Table structure for table `alat_musik`
--

CREATE TABLE `alat_musik` (
  `id` int(11) NOT NULL,
  `nama_alat_musik` varchar(20) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `harga` int(7) NOT NULL,
  `cara_dimainkan` varchar(15) NOT NULL,
  `jumlah_alat` int(2) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_musik`
--

INSERT INTO `alat_musik` (`id`, `nama_alat_musik`, `merk`, `harga`, `cara_dimainkan`, `jumlah_alat`, `gambar`) VALUES
(1, 'Gitar Akustik', 'Yamaha', 45000, 'dipetik', 6, 'gitar_akustik.png'),
(2, 'Gitar Listrik', 'Yamaha', 1000000, 'dipetik', 5, 'gitar_listrik.png'),
(4, 'Sexophone', 'Yamaha', 800000, 'ditiup', 3, 'sexophone.png'),
(5, 'Trompet', 'Yamaha', 500000, 'ditiup', 5, 'trompet.png'),
(6, 'Bass', 'Yamaha', 1200000, 'dipetik', 4, 'bass.png'),
(7, 'Piano', 'Yamaha', 3000000, 'ditekan', 3, 'piano.png'),
(8, 'Timpani', 'Yamaha', 800000, 'dipukul', 5, 'timpani.png'),
(9, 'SHS', 'Yamaha', 1000000, 'ditekan', 4, 'shs.png'),
(10, 'Drum', 'Yamaha', 2500000, 'dipukul', 3, 'drum.png'),
(11, 'Marching Drums', 'Yamaha', 35000, 'dipukul', 8, 'marching_drum.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, '193040054', 'Aldi Ageng Tri Seftian', 'aldiageng48@gmail.com', 'Teknik Informatika', 'aldi.jpg'),
(2, '193040044', 'Rayhan', 'rayhan@gmail.com', 'Teknik Informatika', 'rayhan.jpg'),
(3, '193040041', 'Viqri', 'viqri@gmail.com', 'Teknik Informatika', 'viqri.jpg'),
(4, '193040051', 'Usep', 'usep@gmail.com', 'Teknik Informatika', 'usep.jpg'),
(5, '193040045', 'Dian', 'dian@gmail.com', 'Teknik Informatika', 'dian.jpg'),
(6, '193040046', 'Aji', 'aji@gmail.com', 'Teknik Informatika', 'aji.jpg'),
(7, '193040057', 'Rio', 'rio@gmail.com', 'Teknik Informatika', 'rio.jpg'),
(8, '193040180', 'Sugih', 'sugih@gmail.com', 'Teknik Informatika', 'sugih.jpg'),
(9, '193040052', 'Dida', 'dida@gmail.com', 'Teknik Informatika', 'dida.jpg'),
(10, '193040043', 'Herlan', 'herlan@gmail.com', 'Teknik Informatika', 'herlan.jpg'),
(11, '193040053', 'Fauzan', 'fauzan@gmail.com', 'Teknik Informatika', 'fauzan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
