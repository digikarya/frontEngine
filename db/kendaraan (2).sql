-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: kendaraan-mysql
-- Generation Time: Feb 11, 2021 at 09:53 AM
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
-- Database: `kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_list_kendaraan`
--

CREATE TABLE `check_list_kendaraan` (
  `check_list_id` int NOT NULL,
  `hash_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kendaraan` enum('MOBIL SEDAN','MINI BUS','BUS SEDANG','BUS BESAR') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merek` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_list_kendaraan`
--

INSERT INTO `check_list_kendaraan` (`check_list_id`, `hash_id`, `jenis_kendaraan`, `merek`) VALUES
(2, '6Lxj3R5fzQjMsizKfhQgf3mxK28DtYMDb0bg160=', 'BUS SEDANG', 'TEST RIDE');

-- --------------------------------------------------------

--
-- Table structure for table `detail_check_list`
--

CREATE TABLE `detail_check_list` (
  `detail_checklist_id` int NOT NULL,
  `hash_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` enum('interior','eksterior','mesin','body','rangka') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_list_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_check_list`
--

INSERT INTO `detail_check_list` (`detail_checklist_id`, `hash_id`, `nama`, `tipe`, `check_list_id`) VALUES
(9, 'rdAIDSJJDKOPIwo8G0DdgAA-K9dlebGh_ADglRU=', 'Agen 02', 'interior', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_trayek`
--

CREATE TABLE `detail_trayek` (
  `detail_trayek_id` int NOT NULL,
  `hash_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agen_id` int DEFAULT NULL,
  `trayek_id` int NOT NULL,
  `nama_daerah` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_trayek`
--

INSERT INTO `detail_trayek` (`detail_trayek_id`, `hash_id`, `nama`, `sequence`, `agen_id`, `trayek_id`, `nama_daerah`) VALUES
(40, '6xNW-GhzdVA0wKA49Jnr_fotWz-qmFtU-gL_KznI', 'Agen 01', '6', 2, 2, 'purwokerto barat'),
(41, '2i61d3p_0lGof6SYA77B5uDXFSQDErjLIc7U4Z9D', 'Agen 01', '2', 2, 2, 'purwokerto barat'),
(42, '_GO09Uw6CBsDgvX48y0VyqIlIkoPNV9rjjTKfId-', 'Agen 01', '3', 2, 2, 'purwokerto barat'),
(44, '8vqu0WLnsGsWU9royIavxiYlOBRaybAdKQjZQNmu', 'Agen 01', '5', 2, 2, 'purwokerto barat'),
(45, '6vqiNqNmNIfBEix1xB-6jl2Lyo1klSGd58WRx6Vd', 'Agen 01', '1', 2, 2, 'purwokerto barat'),
(46, 'Q755btfpDjJSHvm6cFCIhME7Xx8-980wr6_s2rfP', 'Agen 01', '7', 2, 2, 'purwokerto barat'),
(48, 'uQAaDBKHgpFAzgwUylWeSOcNtqTtTynybqD6Bp-S', 'Agen Cilegon', '8', 4, 2, 'cibeber');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int NOT NULL,
  `hash_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_keberangkatan` time DEFAULT NULL,
  `waktu_kedataangan` time DEFAULT NULL,
  `trayek_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `hash_id`, `waktu_keberangkatan`, `waktu_kedataangan`, `trayek_id`) VALUES
(3, 'UccutEonRvAmSDJiX9lFR2TH_F5oUQiWLGb3Aak=', '12:42:31', '12:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `jenis_Id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `jenis` enum('MOBIL SEDAN','MINI BUS','BUS SEDANG','BUS BESAR') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`jenis_Id`, `hash_id`, `nama`, `kode`, `jenis`) VALUES
(1, 'arItmMFZs6H2utR62DV9VU3nHwRcBIEKdubaWM4=', 'Bisnis AC', 'BAC', 'BUS BESAR'),
(2, 'fYmrKqVmTmjZsy5pEj9e9vTKBLxOQBYJYWNmN7Q=', 'Bisnis AC', 'BAC', 'BUS BESAR');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kendaraan`
--

CREATE TABLE `kategori_kendaraan` (
  `kategori_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kapasitas` int NOT NULL,
  `check_list_id` int DEFAULT NULL,
  `layout_kursi_id` int NOT NULL,
  `jenis_kendaraan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_kendaraan`
--

INSERT INTO `kategori_kendaraan` (`kategori_id`, `hash_id`, `kode`, `nama`, `kapasitas`, `check_list_id`, `layout_kursi_id`, `jenis_kendaraan_id`) VALUES
(10, 'h_MZux71i582fksjxK5i4tlCTYzAAdNDU1755R9Z', 'Kursi a 02', '1aaa0', 31, 2, 3, 1),
(16, '93AgL95dev-EEKEV7ubRpzmxRuilJYLj_7YBmech', 'ACCC', 'ACCCC', 45, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `kendaraan_id` int NOT NULL,
  `hash_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kendaraan` enum('MOBIL SEDAN','MINI BUS','BUS SEDANG','BUS BESAR') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kendaraan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_mesin` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rangka` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemilik` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_seat` int DEFAULT NULL,
  `daya_angkut` int DEFAULT NULL,
  `merk` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pembuatan` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas_mesin` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_unit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_body` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayek_id` int NOT NULL,
  `kategori_kendaraan_id` int NOT NULL,
  `status` enum('tersedia','service','kadaluarsa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`kendaraan_id`, `hash_id`, `jenis_kendaraan`, `no_kendaraan`, `no_mesin`, `no_rangka`, `pemilik`, `max_seat`, `daya_angkut`, `merk`, `tahun_pembuatan`, `kapasitas_mesin`, `kode_unit`, `no_body`, `trayek_id`, `kategori_kendaraan_id`, `status`) VALUES
(2, 'Rw5Cg1bqsnVL46gWdJdZXpoftmwnH6eheB-tzAU=', 'BUS BESAR', '12:00:00', 'asd', 'asd', 'asd', 50, 500, 'asd', 'asd', 'asd', 'asd', 'asd', 2, 10, 'tersedia'),
(3, 'VttGsf5XPNymN4kZnij2k69ZcJn8EDkZYaFgjCE=', 'BUS BESAR', '12:00:00', 'asd', 'asd', 'asd', 50, 500, 'asd', 'asd', 'asd', 'asd', 'asd', 2, 10, 'tersedia'),
(4, 'VsadCYVOdyoQxyFMnz8T_mBKBblNWvHncOyxF2Y=', 'BUS BESAR', '12:00:00', 'asd', 'asd', 'asd', 50, 500, 'asd', 'asd', 'asd', 'asd', 'asd', 2, 10, 'tersedia'),
(5, '6XGo9eoOdAID12HUy-FEiA486_5uXauzkazF09U=', 'BUS BESAR', '12:00:00', 'asd', 'asd', 'asd', 50, 500, 'asd', 'asd', 'asd', 'asd', 'asd', 2, 10, 'tersedia'),
(6, 'C0zMm00Liv1gi87Edm5PGfKIfkfP4_KdYUmw-8c=', 'MOBIL SEDAN', 'R 213123  AV', '12132', '12asdasd', 'asd', 213, 23, 'asd', '2012', '23', 'asd', 'asdasd', 3, 10, 'tersedia'),
(7, '9Jex5qwVOpjK9MpOikDr6sNfQKVeqr9Cx5-mnXY=', 'MOBIL SEDAN', 'R 213123  AV', '12132', '12asdasd', 'asd', 213, 23, 'asd', '2012', '23', 'asd', 'asdasd', 3, 10, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `layout_kursi`
--

CREATE TABLE `layout_kursi` (
  `layout_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `brs_kiri` tinyint DEFAULT NULL,
  `brs_kanan` tinyint DEFAULT NULL,
  `klm_kiri` tinyint DEFAULT NULL,
  `klm_kanan` tinyint DEFAULT NULL,
  `seat_belakang` tinyint DEFAULT NULL,
  `total_seat` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layout_kursi`
--

INSERT INTO `layout_kursi` (`layout_id`, `hash_id`, `nama`, `brs_kiri`, `brs_kanan`, `klm_kiri`, `klm_kanan`, `seat_belakang`, `total_seat`) VALUES
(3, 'PSWdCrtK5MMQr_5oOCunfzvRDOOIBh5011E-cWM=', 'Kursiaa 02', 2, 2, 10, 10, 5, 45),
(4, 'OF9uRbDuPxFAZrFQ44kC1unG4zxY-nKDeVlk_Ts=', 'Kursi Ekstekutif', 1, 2, 10, 10, 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `surat_kendaraan`
--

CREATE TABLE `surat_kendaraan` (
  `surat_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `kadaluarsa` date DEFAULT NULL,
  `tanggal_pembuatan` date DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_surat` enum('STNK','KPS','BPKB','Lain-lain') DEFAULT NULL,
  `keterangan` varchar(155) DEFAULT NULL,
  `kendaraan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trayek`
--

CREATE TABLE `trayek` (
  `trayek_id` int NOT NULL,
  `hash_id` varchar(255) DEFAULT NULL,
  `no_trayek` varchar(45) DEFAULT NULL,
  `asal` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trayek`
--

INSERT INTO `trayek` (`trayek_id`, `hash_id`, `no_trayek`, `asal`, `tujuan`) VALUES
(2, 'PH5X-wf42v-Z9irVtK58LJZ78QAGeMu1mBU-1ts=', 'BMW', 'BUS BESAR', 'BUS BESAR'),
(3, '_baEWM5e7uXxdkBQm6_NTln6z6c0Oae2hBCQ3v0=', '200011', 'ciawi', 'kalideres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_list_kendaraan`
--
ALTER TABLE `check_list_kendaraan`
  ADD PRIMARY KEY (`check_list_id`);

--
-- Indexes for table `detail_check_list`
--
ALTER TABLE `detail_check_list`
  ADD PRIMARY KEY (`detail_checklist_id`),
  ADD KEY `check_list_id` (`check_list_id`);

--
-- Indexes for table `detail_trayek`
--
ALTER TABLE `detail_trayek`
  ADD PRIMARY KEY (`detail_trayek_id`),
  ADD KEY `fk_detail_trayek_trayek1_idx` (`trayek_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `fk_trayek_id_trayek` (`trayek_id`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`jenis_Id`);

--
-- Indexes for table `kategori_kendaraan`
--
ALTER TABLE `kategori_kendaraan`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `check_list_id` (`check_list_id`),
  ADD KEY `fk_kategori_kendaraan_layout_kursi1_idx` (`layout_kursi_id`),
  ADD KEY `fk_kategori_kendaraan_jenis_kendaraan1_idx` (`jenis_kendaraan_id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`kendaraan_id`),
  ADD KEY `fk_kendaraan_trayek1_idx` (`trayek_id`),
  ADD KEY `fk_kendaraan_kategori_kendaraan1_idx` (`kategori_kendaraan_id`);

--
-- Indexes for table `layout_kursi`
--
ALTER TABLE `layout_kursi`
  ADD PRIMARY KEY (`layout_id`);

--
-- Indexes for table `surat_kendaraan`
--
ALTER TABLE `surat_kendaraan`
  ADD PRIMARY KEY (`surat_id`),
  ADD KEY `fk_kendaraan_id_kendaraan` (`kendaraan_id`);

--
-- Indexes for table `trayek`
--
ALTER TABLE `trayek`
  ADD PRIMARY KEY (`trayek_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_list_kendaraan`
--
ALTER TABLE `check_list_kendaraan`
  MODIFY `check_list_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_check_list`
--
ALTER TABLE `detail_check_list`
  MODIFY `detail_checklist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_trayek`
--
ALTER TABLE `detail_trayek`
  MODIFY `detail_trayek_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `jenis_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_kendaraan`
--
ALTER TABLE `kategori_kendaraan`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `kendaraan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layout_kursi`
--
ALTER TABLE `layout_kursi`
  MODIFY `layout_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_kendaraan`
--
ALTER TABLE `surat_kendaraan`
  MODIFY `surat_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trayek`
--
ALTER TABLE `trayek`
  MODIFY `trayek_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_check_list`
--
ALTER TABLE `detail_check_list`
  ADD CONSTRAINT `detail_check_list_ibfk_1` FOREIGN KEY (`check_list_id`) REFERENCES `check_list_kendaraan` (`check_list_id`);

--
-- Constraints for table `detail_trayek`
--
ALTER TABLE `detail_trayek`
  ADD CONSTRAINT `fk_detail_trayek_trayek1` FOREIGN KEY (`trayek_id`) REFERENCES `trayek` (`trayek_id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_trayek_id_trayek` FOREIGN KEY (`trayek_id`) REFERENCES `trayek` (`trayek_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kategori_kendaraan`
--
ALTER TABLE `kategori_kendaraan`
  ADD CONSTRAINT `fk_kategori_kendaraan_jenis_kendaraan1` FOREIGN KEY (`jenis_kendaraan_id`) REFERENCES `jenis_kendaraan` (`jenis_Id`),
  ADD CONSTRAINT `fk_kategori_kendaraan_layout_kursi1` FOREIGN KEY (`layout_kursi_id`) REFERENCES `layout_kursi` (`layout_id`),
  ADD CONSTRAINT `kategori_kendaraan_ibfk_1` FOREIGN KEY (`check_list_id`) REFERENCES `check_list_kendaraan` (`check_list_id`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_kendaraan_kategori_kendaraan1` FOREIGN KEY (`kategori_kendaraan_id`) REFERENCES `kategori_kendaraan` (`kategori_id`),
  ADD CONSTRAINT `fk_kendaraan_trayek1` FOREIGN KEY (`trayek_id`) REFERENCES `trayek` (`trayek_id`);

--
-- Constraints for table `surat_kendaraan`
--
ALTER TABLE `surat_kendaraan`
  ADD CONSTRAINT `fk_kendaraan_id_kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`kendaraan_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
