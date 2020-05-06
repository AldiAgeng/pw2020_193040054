-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 08:37 AM
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
-- Database: `tubes_193040054`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `no_hp`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', '082119284236', 'admin');

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
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_musik`
--

INSERT INTO `alat_musik` (`id`, `nama_alat_musik`, `merk`, `harga`, `cara_dimainkan`, `jumlah_alat`, `gambar`) VALUES
(1, 'Gitar Akustik', 'Yamaha', 45000, 'dipetik', 6, 'gitar_akustik.png'),
(2, 'Gitar Listrik', 'Yamaha', 1000000, 'dipetik', 5, 'gitar_listrik.png'),
(5, 'Trompet', 'Yamaha', 500000, 'ditiup', 5, 'trompet.png'),
(6, 'Bass', 'Yamaha', 1200000, 'dipetik', 4, 'bass.png'),
(7, 'Piano', 'Yamaha', 3000000, 'ditekan', 3, 'piano.png'),
(8, 'Timpani', 'Yamaha', 800000, 'dipukul', 5, 'timpani.png'),
(9, 'SHS', 'Yamaha', 1000000, 'ditekan', 4, 'shs.png'),
(10, 'Drum', 'Yamaha', 2500000, 'dipukul', 3, 'drum.png'),
(11, 'Marching Drums', 'Yamaha', 35000, 'dipukul', 8, 'marching_drum.png'),
(14, 'Sexophone', 'Yamaha', 300000, 'ditiup', 3, 'sexophone.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nrp`, `nama`, `jurusan`, `username`, `password`, `level`) VALUES
(8, '193040054', 'Aldi Ageng Tri Seftian', 'Teknik Informatika', '193040054', '$2y$10$XXap4vGrBz/b4jf9NGX0QudyGSUoKm8vUGxY3L4diMaHAKi6UzXJi', 'mahasiswa'),
(9, '193040052', 'Dida', 'Teknik Informatika', '193040052', '$2y$10$xVo7uTPkz56ZVYLlop4WoemwQxLwfoAmXncvsdGxHlXF/uZIo6iKa', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jam_pinjam` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_alat_musik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `jam_pinjam`, `jam_kembali`, `id_mahasiswa`, `id_alat_musik`) VALUES
(1, '2020-05-04', '2020-05-05', '00:00:01', '00:00:02', 8, 1),
(18, '2020-05-06', '2020-05-06', '14:01:00', '03:01:00', 9, 10),
(19, '2020-05-06', '2020-05-06', '04:39:00', '06:40:00', 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'aldi', '$2y$10$8AH0vthifxhshqVnWVawIur6e7f8g3NCpknmOss7zZ/F5sTEUNYIe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`,`id_alat_musik`),
  ADD KEY `id_alat_musik` (`id_alat_musik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_alat_musik`) REFERENCES `alat_musik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
