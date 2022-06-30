-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 03:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `data_file` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi_barang` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `data_file`, `tgl`, `harga`, `deskripsi_barang`, `updated_at`, `created_at`) VALUES
(1, 'Pick Up', '1652884483908-tes.jpg', '2022-05-18', 500000, 'Malang jakarta', '2022-05-18 07:34:43', '2022-05-18 07:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

CREATE TABLE `tb_driver` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(25) NOT NULL,
  `data_file` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `harga_driver` int(20) NOT NULL,
  `deskripsi_driver` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`id_driver`, `nama_driver`, `data_file`, `tgl`, `harga_driver`, `deskripsi_driver`, `updated_at`, `created_at`) VALUES
(1, 'Paijo', '1652885599380-am.jpg', '2022-05-18', 200000, 'Malang Jakarta', '2022-05-18 07:53:19', '2022-05-18 07:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'petugas'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `pass`, `id_level`, `updated_at`, `created_at`) VALUES
(1, 'admin123', 'admin123', '$2y$10$qHUd7xzAZFrngHXXwVk/7OSBWyGSUDqsG6rOiTSznBH5toVZSjnK2', 2, '2022-05-18 07:00:47', '2022-05-18 07:00:47'),
(2, 'petugas123', 'petugas123', '$2y$10$7silKi7Pd2QDrvSRNfz4FOVPR1SVG88iHXEDAcd6GiUydCaHUltVa', 1, '2022-05-18 17:04:05', '2022-05-18 17:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `kode_sewa` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `durasi` int(10) NOT NULL,
  `nama_penyewa` varchar(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `status` set('1','2','3','4') NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`kode_sewa`, `tanggal_order`, `durasi`, `nama_penyewa`, `id_barang`, `id_driver`, `status`, `updated_at`, `created_at`) VALUES
(1, '2022-05-19 00:00:00', 4, 'teghar', 1, 1, '3', '2022-05-18 17:57:40', '2022-05-18 17:03:06'),
(2, '2022-05-19 00:00:00', 4, 'teghar', 1, 1, '3', '2022-05-18 17:58:57', '2022-05-18 17:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tester123', 'tester@gmail.com', '2021-10-03 19:17:32', '$2y$10$2zfpX6JXdgIVjQN7hDyL7.q8FwexONwir5XMBSVi0HRdn1XfaWjou', NULL, '2021-10-03 19:17:33', '2021-10-03 19:17:33'),
(2, 'testadmin123', 'testadmin123@gmail.com', '2021-10-05 03:37:00', 'testadmin123', NULL, '2021-10-05 03:37:00', '2021-10-05 03:37:00'),
(3, 'Miss Rubye Bernhard IV', 'shields.tremaine@example.com', '2021-10-04 20:50:23', 'testing123', 'frk9', '2021-10-04 20:50:23', '2021-10-04 20:50:23'),
(4, 'Sarah Koch', 'chesley57@example.net', '2021-10-04 20:50:23', 'testing123', '3jgv', '2021-10-04 20:50:23', '2021-10-04 20:50:23'),
(5, 'Anne Koss Sr.', 'omari55@example.net', '2021-10-04 20:50:23', 'testing123', 'fdqv', '2021-10-04 20:50:23', '2021-10-04 20:50:23'),
(6, 'Toni Williamson I', 'hintz.troy@example.org', '2021-10-04 20:50:23', 'testing123', 'ZJM1', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(7, 'Eliseo Maggio', 'nader.laney@example.com', '2021-10-04 20:50:23', 'testing123', 'h2rV', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(8, 'Ms. Kristy Littel IV', 'valentin.lockman@example.com', '2021-10-04 20:50:23', 'testing123', 'Y3PX', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(9, 'Darrion Rippin', 'fschiller@example.net', '2021-10-04 20:50:23', 'testing123', '7PhS', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(10, 'Myrtie Erdman', 'obrekke@example.com', '2021-10-04 20:50:23', 'testing123', 'dBmw', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(11, 'Prof. Lowell Kovacek', 'trantow.theodore@example.org', '2021-10-04 20:50:23', 'testing123', 'bSJf', '2021-10-04 20:50:24', '2021-10-04 20:50:24'),
(12, 'Milton Predovic', 'ggrady@example.com', '2021-10-04 20:50:23', 'testing123', 'dMNu', '2021-10-04 20:50:24', '2021-10-04 20:50:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`kode_sewa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_driver`
--
ALTER TABLE `tb_driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `kode_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
