-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2025 at 04:26 PM
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
(10, 'Erwan', 'manager@kla.com', '$2y$12$4NVgSuQfdoZteVGj9.vJJ.M2KeFcx9taZWX4G0kExWveHTDe9zSwq', 'MASTER', NULL, '2025-10-20 21:50:43', '2025-12-12 08:51:58'),
(11, 'Yogi-CE@smg', 'ce@klasmg.com', '$2y$12$3Yxb9y8WLjRvf9g9uw.AR..1qp/5C32N7U2H/fTHcT9YSXOkBssbO', 'CE', 1, '2025-10-21 21:23:51', '2025-12-12 09:14:32'),
(12, 'Maulida-CM', 'cm@klamail.com', '$2y$12$6cCgjGmk3frYQ/SJMANCsOeF6lD0Ia/wfixf1RoqFk5z38C09Jcay', 'CM', NULL, '2025-10-21 21:27:59', '2025-12-12 09:11:03'),
(14, 'Budi-CE@tgl', 'ce@klatgl.com', '$2y$12$EM6VlO3QEOVHsliisvDZPOxqFyJtLmzF6xxg3pKmIS1XMkRJG2yW.', 'CE', 3, '2025-10-31 19:34:48', '2025-12-12 09:15:44'),
(15, 'Agus-CE@slw', 'ce@klaslw.com', '$2y$12$1bT.bwAYanbDeGgHHBS/Cuslxyz5iM5L5KNJiJSqyT0dXgShoQ1Qq', 'CE', 2, '2025-10-31 19:36:45', '2025-12-12 09:17:01'),
(16, 'Jaya-CE@kdr', 'ce@klakdr.com', '$2y$12$gfhRErHcgcn9qCOx1OiHReNcjpJqm9jdIooWpoYvJRQ58GyVlbZNK', 'CE', 5, '2025-10-31 19:41:34', '2025-12-12 09:19:02'),
(17, 'Kevin-CE@kdr', 'ce@klapkl.com', '$2y$12$HmWSR3Prg5JqptRqnkGGyuv1eZApIpnZqE5Yvq5Iv3UVZtFxTevNG', 'CE', 4, '2025-10-31 19:42:43', '2025-12-12 09:19:39');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
