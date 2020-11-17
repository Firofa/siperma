-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 08:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `nota_barang_masuk` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `nama_barang_masuk`, `jumlah_barang_masuk`, `harga_satuan_barang`, `total_harga`, `nota_barang_masuk`, `created_at`, `updated_at`, `is_deleted`) VALUES
(3, 'Alat Tulis Kantor', 10, 60000, 500000, '10 ATK', 1605191269, 1605594745, 'No'),
(4, 'Laptop', 2, 3000000, 15000000, '5 Laptop', 1605191329, 1605191329, 'Yes'),
(5, 'Mesin Fotokopi', 12, 2000000, 24000000, 'Pembelian 12 Mesin Fotokopi', 1605595352, 1605595352, 'No'),
(6, 'Penghapus', 10, 500, 5000, 'Beli 10 Penghapus', 1605595456, 1605595456, 'No');

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
(1, 'Admin PJ'),
(2, 'Admin Barang'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan_barang` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `barang_id` int(255) NOT NULL,
  `periode_permintaan` varchar(128) NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status_permintaan` enum('Disetujui','Ditolak','Pending','Barang Tidak Ada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`id_permintaan_barang`, `user_id`, `barang_id`, `periode_permintaan`, `jumlah_permintaan`, `created_at`, `status_permintaan`) VALUES
(1, 6, 3, '2010-12-12', 1, 1605403526, 'Disetujui'),
(2, 6, 4, '2010-12-12', 2, 1605403526, 'Barang Tidak Ada'),
(3, 6, 4, '2020-12-15', 2, 1605403936, 'Barang Tidak Ada'),
(4, 6, 3, '2020-12-15', 5, 1605403936, 'Ditolak'),
(5, 6, 3, '2020-10-14', 12, 1605404079, 'Disetujui'),
(6, 6, 4, '2020-10-08', 1, 1605404437, 'Disetujui'),
(7, 6, 4, '2020-11-11', 12, 1605404944, 'Ditolak'),
(9, 6, 4, '2020-11-10', 6, 1605434925, 'Barang Tidak Ada');

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
(1, 'Ruangan A'),
(2, 'Ruangan B');

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
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `password`, `level_access_id`, `username`, `tahun`, `work_unit_id`, `nip`, `jabatan`, `ruangan_id`, `pangkat`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', '$2y$10$tcn4gcC5IbLx6yPYbG8fMOvJm7n9CgdckBVbR0gBDDXl8JgID3v5y', 1, 'superadmin123', 2020, 1, '123456789', 'Super Admin', 1, 'Super Admin', 1, 1604766884, 1605595657),
(4, 'admin suradmin', '$2y$10$trhDRJtGgO6Ujjxp8VcYP.Vk.8iJ44vBbns9Qg92mUpmnsLw9jk3W', 2, 'admin123456', 2020, 1, '123654123', 'Admin Barang', 1, 'Eselon', 1, 1604767481, 1605452064),
(6, 'Asep Sutarman', '$2y$10$HDhMPkXD/cUAMcw5Zg.mgufMywaLdqm8VI5RIb4URT0KQWbbXYNOK', 3, 'pengguna123', 2020, 1, '10904032', 'Pegawai', 1, 'Eselon 1', 1, 1605150941, 1605595902),
(8, 'Entis Sutisna', '$2y$10$VeTwRTEYp86R3kVL/9Kco.UMYYPTmb5blTRJJJMDFRLKcQPCw0W6W', 3, 'karyawan123', 2020, 2, '10104012', 'Staff', 2, 'Karyawan', 1, 1605156707, 0),
(10, 'Asep Sutarmana', '$2y$10$4RMGUAsFYyMWUjptvMpXEeBoRDDGhMVH2SXZk1QVvEWdE3yR9B70m', 2, 'pegawai456', 2020, 1, '10904032', 'Kepala Bagian', 1, 'Karyawan', 1, 1605592061, 0);

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
(1, 'SDM', '001', 'Kampung Durian Runtuh', '0812313325', 'Dadang Sunandar', 'Asep Alliando', 'Riri Suririni', 'Roku Kutisna', 'abc4.jpg'),
(2, 'Humas', '002', 'Desa Ombak Laut', '08112343647', 'Karim Sukarim', 'Suparman Batiman', 'Entis Sutisna', 'Parto Suparto', 'logo.jpg'),
(3, 'KEMA', '003', 'Surabaya', '083424332', 'Entis', 'Susi', 'Alfin', 'Syuaib', 'logo.jpg'),
(4, 'SEKPER', '004', 'Bandung', '082128835432', 'Bayu', 'Billy', 'Rosa', 'Kasino', 'abc1.jpg');

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
  MODIFY `id_barang_masuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level_access`
--
ALTER TABLE `level_access`
  MODIFY `id_level_access` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `id_work_unit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
