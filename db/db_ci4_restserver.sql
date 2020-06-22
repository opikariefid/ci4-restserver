-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 05:24 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci4_restserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontrakan`
--

CREATE TABLE `kontrakan` (
  `idKontrakan` int(11) NOT NULL,
  `namaKontrakan` varchar(50) NOT NULL,
  `urlGambarKontrakan` text NOT NULL,
  `deskripsiKontrakan` text NOT NULL,
  `hargaKontrakan` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kotaKabupaten` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `publishDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `KT` int(11) NOT NULL,
  `KM` int(11) NOT NULL,
  `luasBangunan` decimal(10,0) NOT NULL,
  `luasTanah` decimal(10,0) NOT NULL,
  `namaPemilikKontrakan` varchar(50) NOT NULL,
  `nomorPemilikKontrakan` varchar(20) NOT NULL,
  `disimpanUser` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontrakan`
--

INSERT INTO `kontrakan` (`idKontrakan`, `namaKontrakan`, `urlGambarKontrakan`, `deskripsiKontrakan`, `hargaKontrakan`, `provinsi`, `kotaKabupaten`, `kelurahan`, `kecamatan`, `alamat`, `publishDate`, `KT`, `KM`, `luasBangunan`, `luasTanah`, `namaPemilikKontrakan`, `nomorPemilikKontrakan`, `disimpanUser`, `status`, `publish`) VALUES
(2, 'Rumah Taufik', 'a:2:{i:0;s:11:\"gambar1.jpg\";i:1;s:11:\"gambar2.jpg\";}', 'Ini Deskripsi', 300000, 'Jawa Barat', 'Bogor', 'Ciwaringin', 'BogorTengah', 'Ciwaringin Gang Sukarna', '2020-06-22 08:45:26', 2, 2, '10', '100', 'Taufik Arif', '89634670656', 'a:1:{i:0;s:28:\"woyAtdhWMzbpOhhkcq9cmk0L2zJ2\";}', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-06-22-043133', 'App\\Database\\Migrations\\Users', 'default', 'App', 1592801021, 1),
(2, '2020-06-22-043453', 'App\\Database\\Migrations\\Kontrakan', 'default', 'App', 1592801022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(50) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `transaksi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `displayName`, `emailUser`, `transaksi`) VALUES
('asdAtdhWMzbpOhhkcq9cmk0L2zJ3', 'Ilham Cendana', 'cendana@gmail.com', ''),
('woyAtdhWMzbpOhhkcq9cmk0L2zJ2', 'Taufik Arif', 'taufik.arif44@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontrakan`
--
ALTER TABLE `kontrakan`
  ADD PRIMARY KEY (`idKontrakan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontrakan`
--
ALTER TABLE `kontrakan`
  MODIFY `idKontrakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
