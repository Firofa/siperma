-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 12:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_siperma`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(255) NOT NULL,
  `nama_barang_masuk` varchar(255) NOT NULL,
  `jumlah_barang_masuk` int(255) NOT NULL,
  `harga_satuan_barang` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `nota_barang_masuk` int(255) NOT NULL,
  `created_at` time NOT NULL,
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level_access`
--

CREATE TABLE `level_access` (
  `id_level_access` int(255) NOT NULL,
  `access_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_access`
--

INSERT INTO `level_access` (`id_level_access`, `access_level`) VALUES
(1, 'Super_Admin'),
(2, 'Admin_1'),
(3, 'Admin_2'),
(4, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan_barang` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `barang_id` int(255) NOT NULL,
  `periode_permintaan` time NOT NULL,
  `created_at` time NOT NULL,
  `status_permintaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `ruangan`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_access_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `work_unit_id` int(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ruangan_id` int(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `password`, `level_access_id`, `username`, `tahun`, `work_unit_id`, `nip`, `jabatan`, `ruangan_id`, `pangkat`, `is_active`, `created_at`) VALUES
(3, 'Super Admin', '$2y$10$86T5YoHaUTSymeyT05zW1erHNeerx7nFwair3CY..UnnXnZydtYvm', 1, 'superadmin123', 2020, 1, '123456789', 'Super Admin', 1, 'Super Admin', 1, 1604766884),
(4, 'admin suradmin', '$2y$10$trhDRJtGgO6Ujjxp8VcYP.Vk.8iJ44vBbns9Qg92mUpmnsLw9jk3W', 1, 'admin123456', 2020, 1, '123654123', 'Admin Barang', 1, 'Eselon', 1, 1604767481);

-- --------------------------------------------------------

--
-- Table structure for table `work_unit`
--

CREATE TABLE `work_unit` (
  `id_work_unit` int(255) NOT NULL,
  `work_unit` varchar(255) NOT NULL,
  `kode_satker` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `wakil_ketua` varchar(255) NOT NULL,
  `sekretaris` varchar(255) NOT NULL,
  `pj_barang_persediaan` varchar(255) NOT NULL,
  `logo_kantor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_unit`
--

INSERT INTO `work_unit` (`id_work_unit`, `work_unit`, `kode_satker`, `alamat`, `no_telp`, `ketua`, `wakil_ketua`, `sekretaris`, `pj_barang_persediaan`, `logo_kantor`) VALUES
(1, 'SDM', '001', 'Kampung Durian Runtuh', '0812313325', 'Dadang Sunandar', 'Asep Alliando', 'Riri Suriri', 'Roku Kutisna', 'logo.jpg'),
(2, 'Humas', '002', 'Desa Ombak Laut', '08112343647', 'Karim Sukarim', 'Suparman Batiman', 'Entis Sutisna', 'Parto Suparto', 'logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `level_access`
--
ALTER TABLE `level_access`
  ADD PRIMARY KEY (`id_level_access`);

--
-- Indexes for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan_barang`),
  ADD KEY `permintaan_barang_user_id-Users_id_users` (`user_id`),
  ADD KEY `permintaan_barang_barang_id-barang_masuk_id_barang_masuk` (`barang_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Users_id_level_access-level_access_id_level_access` (`level_access_id`),
  ADD KEY `Users_work_unit_id-work_unit_id_work_unit` (`work_unit_id`),
  ADD KEY `Users_id_ruangan-ruangan_id_ruangan` (`ruangan_id`);

--
-- Indexes for table `work_unit`
--
ALTER TABLE `work_unit`
  ADD PRIMARY KEY (`id_work_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level_access`
--
ALTER TABLE `level_access`
  MODIFY `id_level_access` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan_barang` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `id_work_unit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD CONSTRAINT `permintaan_barang_barang_id-barang_masuk_id_barang_masuk` FOREIGN KEY (`barang_id`) REFERENCES `barang_masuk` (`id_barang_masuk`),
  ADD CONSTRAINT `permintaan_barang_user_id-Users_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_id_level_access-level_access_id_level_access` FOREIGN KEY (`level_access_id`) REFERENCES `level_access` (`id_level_access`),
  ADD CONSTRAINT `Users_id_ruangan-ruangan_id_ruangan` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `Users_work_unit_id-work_unit_id_work_unit` FOREIGN KEY (`work_unit_id`) REFERENCES `work_unit` (`id_work_unit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
