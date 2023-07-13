-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 03:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_num` int(2) NOT NULL,
  `month_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_num`, `month_name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `table_cat`
--

CREATE TABLE `table_cat` (
  `id_kat` int(3) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `des_kat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_cat`
--

INSERT INTO `table_cat` (`id_kat`, `nama_kategori`, `des_kat`) VALUES
(223, 'Obat Minum', 'Antibiotik'),
(224, 'obat luar', 'salep');

-- --------------------------------------------------------

--
-- Table structure for table `table_invoice`
--

CREATE TABLE `table_invoice` (
  `id_tagihan` int(5) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_invoice`
--

INSERT INTO `table_invoice` (`id_tagihan`, `ref`, `nama_obat`, `harga_jual`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `grandtotal`) VALUES
(121, 'xc8Zdjpjgx', 'Amoxsan ', 10000, 1, 10000, 'Ani', '2023-07-08', 10000),
(124, 'TXeNX9ehJE', 'Amoxsan ', 10000, 3, 30000, 'Ani', '2023-07-13', 30000),
(125, 'plSuTDjULv', 'Asam Mefenamat', 7000, 4, 28000, '6', '2023-07-12', 28000);

-- --------------------------------------------------------

--
-- Table structure for table `table_med`
--

CREATE TABLE `table_med` (
  `id_obat` int(4) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `stok` int(3) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `kedaluwarsa` date NOT NULL,
  `des_obat` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_med`
--

INSERT INTO `table_med` (`id_obat`, `nama_obat`, `penyimpanan`, `stok`, `unit`, `nama_kategori`, `kedaluwarsa`, `des_obat`, `harga_beli`, `harga_jual`, `nama_pemasok`, `gambar`) VALUES
(1037, 'Amoxsan ', 'Rak 1', 10, 'Kapsul', 'Obat Minum', '2023-07-08', 'Antibiotik', 8000, 10000, 'PT. Kimia Farma', ''),
(1039, 'Asam Mefenamat', 'Rak 1', 0, 'Tablet', 'Obat Minum', '2023-07-12', 'Meredakan Nyeri', 5000, 7000, 'PT. Kimia Farma', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_purchase`
--

CREATE TABLE `table_purchase` (
  `id_pembelian` int(5) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pemasok` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_purchase`
--

INSERT INTO `table_purchase` (`id_pembelian`, `ref`, `nama_obat`, `harga_beli`, `banyak`, `subtotal`, `nama_pemasok`, `tgl_beli`, `grandtotal`) VALUES
(26, 'PTGkegessx', 'Amoxsan', 8000, 5, 40000, 'PT. Kimia Farma', '2023-07-09', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `table_sup`
--

CREATE TABLE `table_sup` (
  `id_pem` int(3) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_sup`
--

INSERT INTO `table_sup` (`id_pem`, `nama_pemasok`, `alamat`, `telepon`) VALUES
(109, 'PT. Kimia Farma', 'Jl.Cicendo No.43', '(022) 4204043'),
(110, 'PT.Abadi', 'Jl.Mekar', '081319058086'),
(111, 'PT.Benofarm', 'Jl.Begawan', '089663395380');

-- --------------------------------------------------------

--
-- Table structure for table `table_unit`
--

CREATE TABLE `table_unit` (
  `id_unit` int(2) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_unit`
--

INSERT INTO `table_unit` (`id_unit`, `unit`) VALUES
(8, 'kaplet'),
(5, 'Kapsul'),
(4, 'Tablet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_num`);

--
-- Indexes for table `table_cat`
--
ALTER TABLE `table_cat`
  ADD PRIMARY KEY (`id_kat`),
  ADD UNIQUE KEY `kategori` (`nama_kategori`);

--
-- Indexes for table `table_invoice`
--
ALTER TABLE `table_invoice`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `table_med`
--
ALTER TABLE `table_med`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`),
  ADD KEY `med_unit` (`unit`),
  ADD KEY `med_cat` (`nama_kategori`),
  ADD KEY `med_sup` (`nama_pemasok`);

--
-- Indexes for table `table_purchase`
--
ALTER TABLE `table_purchase`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `table_sup`
--
ALTER TABLE `table_sup`
  ADD PRIMARY KEY (`id_pem`),
  ADD UNIQUE KEY `nama_supplier` (`nama_pemasok`);

--
-- Indexes for table `table_unit`
--
ALTER TABLE `table_unit`
  ADD PRIMARY KEY (`id_unit`),
  ADD UNIQUE KEY `unit` (`unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_cat`
--
ALTER TABLE `table_cat`
  MODIFY `id_kat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `table_invoice`
--
ALTER TABLE `table_invoice`
  MODIFY `id_tagihan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `table_med`
--
ALTER TABLE `table_med`
  MODIFY `id_obat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

--
-- AUTO_INCREMENT for table `table_purchase`
--
ALTER TABLE `table_purchase`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `table_sup`
--
ALTER TABLE `table_sup`
  MODIFY `id_pem` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `table_unit`
--
ALTER TABLE `table_unit`
  MODIFY `id_unit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_med`
--
ALTER TABLE `table_med`
  ADD CONSTRAINT `med_cat` FOREIGN KEY (`nama_kategori`) REFERENCES `table_cat` (`nama_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_sup` FOREIGN KEY (`nama_pemasok`) REFERENCES `table_sup` (`nama_pemasok`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_unit` FOREIGN KEY (`unit`) REFERENCES `table_unit` (`unit`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
