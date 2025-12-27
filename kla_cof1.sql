-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2025 at 04:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kla_cof1`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `prefix`, `created_at`, `updated_at`, `address`, `phone`) VALUES
(1, 'Semarang', 'A', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Ruko Mataram Plaza, D8-9, Jagalan, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50613', '0895-6167-97777'),
(2, 'Slawi', 'B', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Flores Baru, Langon, Kudaile, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52413', ' 0851-8506-8679'),
(3, 'Tegal', 'C', '2025-10-31 17:52:48', '2025-10-31 17:52:48', ' Jl. Sultan Agung No.49, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah', '0851-6586-7970'),
(4, 'Pekalongan', 'D', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Imam Bonjol No.9, Kergon, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51113', '0857-2496-8191'),
(5, 'Kediri', 'E', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Pahlawan Kusuma Bangsa No.21, Banjaran, Kec. Kota, Kota Kediri, Jawa Timur 64129', '0898-6561-999');

-- --------------------------------------------------------

--
-- Table structure for table `cof_counters`
--

CREATE TABLE `cof_counters` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `current_number` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cof_counters`
--

INSERT INTO `cof_counters` (`id`, `branch_id`, `current_number`, `updated_at`) VALUES
(1, 1, 43, '2025-11-13 18:28:38'),
(2, 2, 3, '2025-11-07 12:32:55'),
(3, 3, 2, '2025-11-07 14:26:41'),
(4, 4, 11, '2025-11-07 16:51:04'),
(5, 5, 6, '2025-11-12 18:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `pn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pn`, `nt`, `created_at`, `updated_at`) VALUES
(1, 'A514-55G-75BB', 'Acer Aspire 5 A514-55G-75BB Notebook', '2025-10-21 19:06:21', '2025-10-21 19:06:21'),
(2, 'UX3405CA', 'ASUS ExpertBook B3', '2025-10-21 19:06:21', '2025-10-21 19:06:21'),
(3, 'CE711A', 'HP Color Laserjet Professional CP577n', '2025-10-21 19:06:21', '2025-10-21 19:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `cof_id` varchar(255) NOT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `contact` varchar(100) NOT NULL,
  `received_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `started_date` varchar(100) DEFAULT NULL,
  `finished_date` date DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` text,
  `phone_number` varchar(20) DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_number` varchar(100) DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `nama_type` varchar(100) DEFAULT NULL,
  `fault_description` text,
  `accessories` text,
  `kondisi_unit` text,
  `repair_summary` text,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'New',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ce_id` bigint UNSIGNED DEFAULT NULL,
  `engineer_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `branch_id`, `created_at`, `updated_at`) VALUES
(10, 'Erwan', 'manager@kla.com', '$2y$12$4NVgSuQfdoZteVGj9.vJJ.M2KeFcx9taZWX4G0kExWveHTDe9zSwq', 'MASTER', NULL, '2025-10-20 14:50:43', '2025-12-12 01:51:58'),
(11, 'Yogi-CE@smg', 'ce@klasmg.com', '$2y$12$3Yxb9y8WLjRvf9g9uw.AR..1qp/5C32N7U2H/fTHcT9YSXOkBssbO', 'CE', 1, '2025-10-21 14:23:51', '2025-12-12 02:14:32'),
(12, 'Maulida-CM', 'cm@klamail.com', '$2y$12$6cCgjGmk3frYQ/SJMANCsOeF6lD0Ia/wfixf1RoqFk5z38C09Jcay', 'CM', NULL, '2025-10-21 14:27:59', '2025-12-12 02:11:03'),
(14, 'Budi-CE@tgl', 'ce@klatgl.com', '$2y$12$EM6VlO3QEOVHsliisvDZPOxqFyJtLmzF6xxg3pKmIS1XMkRJG2yW.', 'CE', 3, '2025-10-31 12:34:48', '2025-12-12 02:15:44'),
(15, 'Agus-CE@slw', 'ce@klaslw.com', '$2y$12$1bT.bwAYanbDeGgHHBS/Cuslxyz5iM5L5KNJiJSqyT0dXgShoQ1Qq', 'CE', 2, '2025-10-31 12:36:45', '2025-12-12 02:17:01'),
(16, 'Jaya-CE@kdr', 'ce@klakdr.com', '$2y$12$gfhRErHcgcn9qCOx1OiHReNcjpJqm9jdIooWpoYvJRQ58GyVlbZNK', 'CE', 5, '2025-10-31 12:41:34', '2025-12-12 02:19:02'),
(17, 'Kevin-CE@pkl', 'ce@klapkl.com', '$2y$12$HmWSR3Prg5JqptRqnkGGyuv1eZApIpnZqE5Yvq5Iv3UVZtFxTevNG', 'CE', 4, '2025-10-31 12:42:43', '2025-12-12 02:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cof_counters`
--
ALTER TABLE `cof_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cof_counters_branch_id_foreign` (`branch_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_pn_unique` (`pn`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_branch_id_foreign` (`branch_id`),
  ADD KEY `services_ce_id_foreign` (`ce_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_un_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cof_counters`
--
ALTER TABLE `cof_counters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cof_counters`
--
ALTER TABLE `cof_counters`
  ADD CONSTRAINT `cof_counters_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `services_ce_id_foreign` FOREIGN KEY (`ce_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
