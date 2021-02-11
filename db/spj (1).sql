-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: quickmysql
-- Generation Time: Feb 01, 2021 at 05:24 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spj`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengecekan`
--

CREATE TABLE `detail_pengecekan` (
  `detail_pengecekan_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `catatan` varchar(45) DEFAULT NULL,
  `status` enum('bagus','cukup bagus','rusak') DEFAULT NULL,
  `detail_check_list_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan_kendaraan`
--

CREATE TABLE `pengecekan_kendaraan` (
  `pengecekan_kendaraan_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `karyawan_id` int DEFAULT NULL,
  `catatan` varchar(125) DEFAULT NULL,
  `avg_points` int DEFAULT NULL,
  `spj_id` int NOT NULL,
  `kendaraan_id` int NOT NULL,
  `no_body` varchar(45) DEFAULT NULL,
  `teknisi` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan_spj`
--

CREATE TABLE `pengecekan_spj` (
  `pengecekan_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `jumlah_penumpang_bis` varchar(45) DEFAULT NULL,
  `spj_id` int DEFAULT NULL,
  `agen_id` int DEFAULT NULL,
  `petugas_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang_spj`
--

CREATE TABLE `penumpang_spj` (
  `penumpang_spj_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `kode_tiket` varchar(45) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tittik_naik` varchar(75) DEFAULT NULL,
  `titik_turun` varchar(75) DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT NULL,
  `waktu_naik` datetime DEFAULT NULL,
  `waktu_turun` datetime DEFAULT NULL,
  `nomor_kursi` varchar(5) DEFAULT NULL,
  `spj_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spj`
--

CREATE TABLE `spj` (
  `spj_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `kode_spj` varchar(45) DEFAULT NULL,
  `jumlah_bbm_awal` int DEFAULT NULL,
  `jumlah_bbm_akhir` int DEFAULT NULL,
  `modal_perjalanan` int DEFAULT NULL,
  `sisa_uang` int DEFAULT NULL,
  `petugas` int DEFAULT NULL,
  `sopir` int DEFAULT NULL,
  `kondektur` int DEFAULT NULL,
  `jadwal_id` int DEFAULT NULL,
  `asal` varchar(125) DEFAULT NULL,
  `tujuan` varchar(125) DEFAULT NULL,
  `no_body` varchar(45) DEFAULT NULL,
  `nama_supir` varchar(45) DEFAULT NULL,
  `nama_kondektur` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengecekan`
--
ALTER TABLE `detail_pengecekan`
  ADD PRIMARY KEY (`detail_pengecekan_id`),
  ADD KEY `detail_check_list_id` (`detail_check_list_id`);

--
-- Indexes for table `pengecekan_kendaraan`
--
ALTER TABLE `pengecekan_kendaraan`
  ADD PRIMARY KEY (`pengecekan_kendaraan_id`),
  ADD KEY `fk_pengecekan_kendaraan_spj1_idx` (`spj_id`);

--
-- Indexes for table `pengecekan_spj`
--
ALTER TABLE `pengecekan_spj`
  ADD PRIMARY KEY (`pengecekan_id`),
  ADD KEY `spj_id` (`spj_id`);

--
-- Indexes for table `penumpang_spj`
--
ALTER TABLE `penumpang_spj`
  ADD PRIMARY KEY (`penumpang_spj_id`),
  ADD KEY `spj_id` (`spj_id`);

--
-- Indexes for table `spj`
--
ALTER TABLE `spj`
  ADD PRIMARY KEY (`spj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengecekan`
--
ALTER TABLE `detail_pengecekan`
  MODIFY `detail_pengecekan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengecekan_kendaraan`
--
ALTER TABLE `pengecekan_kendaraan`
  MODIFY `pengecekan_kendaraan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengecekan_spj`
--
ALTER TABLE `pengecekan_spj`
  MODIFY `pengecekan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penumpang_spj`
--
ALTER TABLE `penumpang_spj`
  MODIFY `penumpang_spj_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spj`
--
ALTER TABLE `spj`
  MODIFY `spj_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengecekan`
--
ALTER TABLE `detail_pengecekan`
  ADD CONSTRAINT `detail_pengecekan_ibfk_1` FOREIGN KEY (`detail_check_list_id`) REFERENCES `pengecekan_kendaraan` (`pengecekan_kendaraan_id`);

--
-- Constraints for table `pengecekan_kendaraan`
--
ALTER TABLE `pengecekan_kendaraan`
  ADD CONSTRAINT `fk_pengecekan_kendaraan_spj1` FOREIGN KEY (`spj_id`) REFERENCES `spj` (`spj_id`);

--
-- Constraints for table `pengecekan_spj`
--
ALTER TABLE `pengecekan_spj`
  ADD CONSTRAINT `konfirmasi_spj_ibfk_1` FOREIGN KEY (`spj_id`) REFERENCES `spj` (`spj_id`);

--
-- Constraints for table `penumpang_spj`
--
ALTER TABLE `penumpang_spj`
  ADD CONSTRAINT `detail_spj_ibfk_1` FOREIGN KEY (`spj_id`) REFERENCES `spj` (`spj_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
