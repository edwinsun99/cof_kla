-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 11:59 PM
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
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `prefix`, `created_at`, `updated_at`, `address`, `phone`) VALUES
(1, 'Semarang', 'A', '2025-11-01 00:52:48', '2025-11-01 00:52:48', 'Ruko Mataram Plaza, D8-9, Jagalan, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50613', '0895-6167-97777'),
(2, 'Slawi', 'B', '2025-11-01 00:52:48', '2025-11-01 00:52:48', 'Jl. Flores Baru, Langon, Kudaile, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52413', ' 0851-8506-8679'),
(3, 'Tegal', 'C', '2025-11-01 00:52:48', '2025-11-01 00:52:48', ' Jl. Sultan Agung No.49, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah', '0851-6586-7970'),
(4, 'Pekalongan', 'D', '2025-11-01 00:52:48', '2025-11-01 00:52:48', 'Jl. Imam Bonjol No.9, Kergon, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51113', '0857-2496-8191'),
(5, 'Kediri', 'E', '2025-11-01 00:52:48', '2025-11-01 00:52:48', 'Jl. Pahlawan Kusuma Bangsa No.21, Banjaran, Kec. Kota, Kota Kediri, Jawa Timur 64129', '0898-6561-999');

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
(1, 1, 127, '2025-11-28 21:29:40'),
(2, 2, 9, '2025-11-28 19:24:40'),
(3, 3, 14, '2025-11-28 19:25:31'),
(4, 4, 20, '2025-11-28 19:26:04'),
(5, 5, 4, '2025-11-28 19:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lognote`
--

CREATE TABLE `lognote` (
  `id` bigint UNSIGNED NOT NULL,
  `cof_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `un` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lognote`
--

INSERT INTO `lognote` (`id`, `cof_id`, `un`, `logdesc`, `created_at`, `updated_at`) VALUES
(1, '73', 'ce1-klasmg', 'wafssafasfasf', '2025-11-21 02:31:53', '2025-11-21 02:31:53'),
(2, '73', 'ce1-klasmg', 'kontol', '2025-11-21 02:32:25', '2025-11-21 02:32:25'),
(3, '57', 'ce1-klasmg', 'edwin', '2025-11-21 02:34:16', '2025-11-21 02:34:16'),
(4, '69', 'ce1-klaslawi', 'mati total', '2025-11-21 02:35:21', '2025-11-21 02:35:21'),
(5, '69', 'ce1-klaslawi', 'kontol', '2025-11-21 02:36:26', '2025-11-21 02:36:26'),
(6, 'C20251100001', 'ce1-klategal', 'sfafsafsafsa', '2025-11-21 02:49:03', '2025-11-21 02:49:03'),
(7, 'C20251100001', 'ce1-klategal', 'sfafsafsafsa', '2025-11-21 02:49:03', '2025-11-21 02:49:03'),
(8, 'C20251100001', 'ce1-klategal', 'safasfsafafs', '2025-11-21 02:49:11', '2025-11-21 02:49:11'),
(9, '65', 'ce1-klategal', 'dasafasfasf', '2025-11-21 02:49:43', '2025-11-21 02:49:43'),
(10, 'C20251100001', 'ce1-klategal', 'qdewqdeqweqwe', '2025-11-21 02:53:22', '2025-11-21 02:53:22'),
(11, 'C20251100001', 'ce1-klategal', 'wdasdsssssssssssss', '2025-11-21 02:53:27', '2025-11-21 02:53:27'),
(12, '65', 'ce1-klategal', 'wqdddddddddddd', '2025-11-21 02:55:18', '2025-11-21 02:55:18'),
(13, '65', 'ce1-klategal', 'asuuuuuuuuuuuuuuu', '2025-11-21 02:55:52', '2025-11-21 02:55:52'),
(14, '65', 'ce1-klategal', 'wihhh', '2025-11-21 03:08:01', '2025-11-21 03:08:01'),
(15, '102', 'maulida', 'haii', '2025-11-21 03:09:59', '2025-11-21 03:09:59'),
(16, '101', 'maulida', 'jnnnnnkk', '2025-11-21 03:14:04', '2025-11-21 03:14:04'),
(17, '63', 'ce1-klasmg', 'adsffffffffffffffffffff', '2025-11-21 03:14:44', '2025-11-21 03:14:44'),
(18, '63', 'maulida', 'waffffffffffffffffffffffffffffffffffffff', '2025-11-21 03:15:18', '2025-11-21 03:15:18'),
(19, 'A000098', 'maulida', 'haiii', '2025-11-21 10:08:15', '2025-11-21 10:08:15'),
(20, 'A000098', 'maulida', 'miracle', '2025-11-21 10:08:25', '2025-11-21 10:08:25'),
(21, 'A000098', 'maulida', 'haiii', '2025-11-21 10:08:35', '2025-11-21 10:08:35'),
(22, '102', 'maulida', 'csdc', '2025-11-21 10:08:58', '2025-11-21 10:08:58'),
(23, '69', 'ce1-klaslawi', 'haiii', '2025-11-21 10:18:09', '2025-11-21 10:18:09'),
(24, '69', 'ce1-klaslawi', 'ahioo', '2025-11-21 10:19:36', '2025-11-21 10:19:36'),
(25, 'B20251100003', 'ce1-klaslawi', 'hosana', '2025-11-21 10:22:34', '2025-11-21 10:22:34'),
(26, 'B20251100003', 'ce1-klaslawi', 'hosana', '2025-11-21 10:22:41', '2025-11-21 10:22:41'),
(27, 'B20251100003', 'ce1-klaslawi', 'sadhu', '2025-11-21 10:35:42', '2025-11-21 10:35:42'),
(28, 'B20251100003', 'ce1-klaslawi', 'dacs', '2025-11-21 10:36:21', '2025-11-21 10:36:21'),
(29, 'B20251100003', 'ce1-klaslawi', 'wowww', '2025-11-21 10:40:57', '2025-11-21 10:40:57'),
(30, 'B20251100003', 'maulida', 'haiii', '2025-11-21 10:44:48', '2025-11-21 10:44:48'),
(31, 'B20251100003', 'maulida', 'perfect', '2025-11-21 10:48:15', '2025-11-21 10:48:15'),
(32, 'B20251100003', 'maulida', 'yaaaa', '2025-11-21 10:48:57', '2025-11-21 10:48:57'),
(33, 'B20251100003', 'maulida', 'hooo', '2025-11-21 10:49:09', '2025-11-21 10:49:09'),
(34, 'B20251100003', 'maulida', 'ohoo', '2025-11-21 10:49:44', '2025-11-21 10:49:44'),
(35, 'E20251100001', 'ce1-klakediri', 'haii', '2025-11-21 10:52:59', '2025-11-21 10:52:59'),
(36, 'B20251100001', 'ce1-klaslawi', 'haiiiii', '2025-11-21 10:54:26', '2025-11-21 10:54:26'),
(37, 'B20251100001', 'ce1-klaslawi', 'aguu', '2025-11-21 10:55:38', '2025-11-21 10:55:38'),
(38, 'B20251100001', 'maulida', 'ooo', '2025-11-21 10:57:51', '2025-11-21 10:57:51'),
(39, 'B20251100001', 'maulida', 'waaaaa', '2025-11-21 10:58:42', '2025-11-21 10:58:42'),
(40, 'B20251100001', 'maulida', 'waaa', '2025-11-21 10:59:09', '2025-11-21 10:59:09'),
(41, 'B20251100001', 'maulida', 'waaa', '2025-11-21 10:59:16', '2025-11-21 10:59:16'),
(42, 'D20251100007', 'ce1-klapkl', 'repair', '2025-11-21 11:05:50', '2025-11-21 11:05:50'),
(43, 'D20251100007', 'ce1-klapkl', 'waaaa', '2025-11-21 11:07:09', '2025-11-21 11:07:09'),
(44, 'D20251100002', 'maulida', 'haiii', '2025-11-23 08:26:40', '2025-11-23 08:26:40'),
(45, 'D20251100002', 'maulida', 'haiii', '2025-11-23 08:27:03', '2025-11-23 08:27:03'),
(46, 'A20250900025', 'ce1-klasmg', 'ahii', '2025-11-23 10:14:58', '2025-11-23 10:14:58'),
(47, 'A20250900025', 'maulida', 'haii', '2025-11-23 10:15:46', '2025-11-23 10:15:46'),
(48, 'A20250900025', 'maulida', 'sippp', '2025-11-23 10:18:45', '2025-11-23 10:18:45'),
(49, 'A20250900025', 'ce1-klasmg', 'heeee', '2025-11-23 10:19:56', '2025-11-23 10:19:56'),
(50, 'A20251100106', 'ce1-klasmg', 'sedang cek unit', '2025-11-26 01:29:34', '2025-11-26 01:29:34'),
(51, 'A20251100106', 'ce1-klasmg', 'mainboard rusak', '2025-11-26 01:29:51', '2025-11-26 01:29:51'),
(52, 'A20251100106', 'maulida', 'part rready', '2025-11-26 01:31:48', '2025-11-26 01:31:48'),
(53, 'A20251100106', 'ce1-klasmg', 'replace mainboard', '2025-11-26 01:33:16', '2025-11-26 01:33:16'),
(54, 'A20251100109', 'ce1-klasmg', 'bkjb', '2025-11-26 19:12:56', '2025-11-26 19:12:56'),
(55, 'A20251100110', 'ce1-klasmg', 'cek cs unit normal', '2025-11-26 19:14:38', '2025-11-26 19:14:38'),
(56, 'A20251100110', 'ce1-klasmg', 'sedang perbaikan', '2025-11-26 19:15:11', '2025-11-26 19:15:11'),
(57, 'A20251100110', 'ce1-klasmg', 'uuuuuuuuu', '2025-11-26 19:18:39', '2025-11-26 19:18:39'),
(58, 'A20251100122', 'ce1-klasmg', 'BAIK', '2025-11-26 20:14:13', '2025-11-26 20:14:13'),
(59, 'A20251100123', 'ce1-klasmg', 'unit rusak', '2025-11-26 20:50:58', '2025-11-26 20:50:58'),
(60, 'C20251100012', 'ce1-klategal', 'bj', '2025-11-26 20:52:05', '2025-11-26 20:52:05'),
(61, 'E20251100003', 'ce1-klakediri', 'hbk', '2025-11-28 19:15:32', '2025-11-28 19:15:32'),
(62, 'D20251100019', 'ce1-klapkl', 'kj', '2025-11-28 19:16:35', '2025-11-28 19:16:35'),
(63, 'B20251100008', 'ce1-klaslawi', 'b', '2025-11-28 19:17:41', '2025-11-28 19:17:41'),
(64, 'A20251100124', 'ce1-klasmg', 'kjhkj', '2025-11-28 19:18:43', '2025-11-28 19:18:43'),
(65, 'C20251100013', 'ce1-klategal', 'khk', '2025-11-28 19:19:28', '2025-11-28 19:19:28'),
(66, 'A20251100127', 'ce1-klasmg', 'Unit Normal', '2025-11-28 21:29:40', '2025-11-28 21:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_01_000002_create_service_cases_table', 1),
(6, '2025_10_17_054504_create_users_table', 2),
(7, '2025_10_22_082534_create_products_table', 3),
(8, '2025_10_31_080449_create_branches_table', 4),
(9, '2025_10_31_030755_add_branch_id_to_users_table', 5),
(10, '2025_10_31_082517_add_branch_id_to_services_table', 5),
(12, '2025_10_31_083357_create_cof_counters_table', 6),
(13, '2025_10_31_090838_add_cof_id_and_ce_id_to_services_table', 7),
(14, '2025_11_01_045233_add_branch_to_services_table', 7),
(15, '2025_11_09_111822_add_address_to_branches_table', 8),
(16, '2025_11_14_033556_add_erf_file_to_services_table', 9),
(17, '2025_11_15_071242_add_status_to_services_table', 10),
(19, '2025_11_20_065223_create_service_notes_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(1, 'A514-55G-75BB', 'Acer Aspire 5 A514-55G-75BB Notebook', '2025-10-22 02:06:21', '2025-10-22 02:06:21'),
(2, 'UX3405CA', 'ASUS ExpertBook B3', '2025-10-22 02:06:21', '2025-10-22 02:06:21'),
(3, 'CE711A', 'HP Color Laserjet Professional CP577n', '2025-10-22 02:06:21', '2025-10-22 02:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `cof_id` varchar(255) DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `contact` varchar(100) NOT NULL,
  `received_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('new','repair progress','quotation request','cancel repair','finish repair','quotation approved','quotation cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'new',
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ce_id` bigint UNSIGNED DEFAULT NULL,
  `erf_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cof_id`, `branch_id`, `contact`, `received_date`, `status`, `started_date`, `finished_date`, `customer_name`, `email`, `address`, `phone_number`, `brand`, `product_number`, `serial_number`, `nama_type`, `fault_description`, `accessories`, `kondisi_unit`, `repair_summary`, `created_at`, `updated_at`, `ce_id`, `erf_file`) VALUES
(139, 'E20251100003', 5, 'hhjkb', NULL, 'new', NULL, NULL, 'Anjir', 'anjir@gmail.com', 'hbhjb', 'u98uu', 'jbjhkj', 'UX3405CA', 'hbjjh', 'ASUS ExpertBook B3', 'hjb', NULL, 'jhhkb', 'hbk', '2025-11-28 19:15:31', '2025-11-28 19:15:31', NULL, NULL),
(140, 'D20251100019', 4, 'hui', NULL, 'new', NULL, NULL, 'Ada', 'ada@gmail.com', 'bjknb', '8998898', 'nknk', 'A514-55G-75BB', 'hj', 'Acer Aspire 5 A514-55G-75BB Notebook', 'dsfv', 'kj', 'kj', 'kj', '2025-11-28 19:16:35', '2025-11-28 19:16:35', NULL, NULL),
(141, 'B20251100008', 2, 'bjhh', NULL, 'new', NULL, NULL, 'Heeeee', 'heeeee@gmail.com', 'jhj', '797978', 'jhjb', 'UX3405CA', 'bjhbh', 'ASUS ExpertBook B3', 'xc xz', 'jbhjb', 'jb', 'b', '2025-11-28 19:17:41', '2025-11-28 19:17:41', NULL, NULL),
(142, 'A20251100124', 1, 'hbjb', NULL, 'finish repair', '2025-11-29 04:41:04', '2025-11-29', 'Aku', 'aku@gmail.com', 'dv zdx', '89797', 'hjbj', 'CE711A', 'hjbjb', 'HP Color Laserjet Professional CP577n', 'kjhkh', 'kk', 'hk', 'kjhkj', '2025-11-28 19:18:43', '2025-11-28 21:45:03', NULL, NULL),
(143, 'C20251100013', 3, 'hjbjbhj', NULL, 'new', NULL, NULL, 'Lu', 'lu@gmail.com', 'jhj', '897897', 'hjbjbjbh', 'UX3405CA', 'vdf', 'ASUS ExpertBook B3', 'hjk', 'hkjhkj', 'h', 'khk', '2025-11-28 19:19:28', '2025-11-28 19:19:28', NULL, NULL),
(144, 'A20251100125', 1, 'kbbhj', '2025-11-29 02:23:10', 'cancel repair', '2025-11-29 04:48:57', NULL, 'Me', 'me@gmail.com', 'hjbbhjbjhb', '897878', 'hjbhj', 'UX3405CA', 'hjbjjb', NULL, 'jhb', 'jkhbkb', 'hb', 'hbb', '2025-11-28 19:23:10', '2025-11-28 21:49:03', NULL, NULL),
(145, 'A20251100126', 1, 'kbbhj', '2025-11-29 02:23:28', 'finish repair', '2025-11-29 04:39:55', NULL, 'Me', 'me@gmail.com', 'hjbbhjbjhb', '897878', 'hjbhj', 'UX3405CA', 'hjbjjb', NULL, 'jhb', 'jkhbkb', 'hb', 'hbb', '2025-11-28 19:23:28', '2025-11-28 21:40:29', NULL, NULL),
(146, 'B20251100009', 2, 'hjbh', '2025-11-29 02:24:40', 'new', NULL, NULL, 'Be', 'be@gmail.com', 'jnjm', '7889', 'mnbnkjb', 'A514-55G-75BB', 'jhkjjj', NULL, 'kjh', 'kj', 'vdxzvds', 'kj', '2025-11-28 19:24:40', '2025-11-28 19:24:40', NULL, NULL),
(147, 'C20251100014', 3, 'bjkh', '2025-11-29 02:25:31', 'new', NULL, NULL, 'It', 'it@gmail.com', 'hhkjhkh', '878979', 'hbjh', 'hjgjgg', 'h', NULL, 'sadc asd', 'bh', 'bghkbh', 'hb', '2025-11-28 19:25:31', '2025-11-28 19:25:31', NULL, NULL),
(148, 'D20251100020', 4, 'hkk', '2025-11-29 02:26:04', 'new', NULL, NULL, 'Yeah', 'yeah@gmail.com', 'hjhjh', '8898989', 'hhjk', 'hkjhhk', 'jk', NULL, 'jk', 'jkj', 'kj', 'kkj', '2025-11-28 19:26:04', '2025-11-28 19:26:04', NULL, NULL),
(149, 'E20251100004', 5, 'khbkjkj', '2025-11-29 02:26:44', 'quotation request', NULL, NULL, 'Again', 'again@gmail.com', 'bhjbhkjhb', '8979789', 'jbhjjkhb', 'uhuiuk', 'kk', NULL, 'cxzc', 'bhjbhj', 'dvdsfdsfcv fsad', 'fadsv', '2025-11-28 19:26:44', '2025-11-28 20:40:28', NULL, NULL),
(150, 'A20251100127', 1, 'Company', '2025-11-28', 'quotation request', '2025-11-29 04:49:28', NULL, 'catur', 'catur@gmail.com', 'Semarang', '08908709709709', 'HP', 'A514-55G-75BB', '5CGFGHSAFDHJ', 'Acer Aspire 5 A514-55G-75BB Notebook', 'Rusak', 'Adaptor', 'Normal', 'Unit Normal', '2025-11-28 21:29:40', '2025-11-28 21:49:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `un` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `un`, `email`, `pw`, `role`, `branch_id`, `created_at`, `updated_at`) VALUES
(10, 'master', 'master@kla.com', '$2y$12$XIFSPFK9UZe6QhYqZohbOO0j1XdM3fwMHZhbUP4lHLI3kE.DFlllW', 'MASTER', NULL, '2025-10-20 21:50:43', '2025-10-20 21:50:43'),
(11, 'ce1-klasmg', 'ce@klasmg.com', '$2y$12$SmdP/DZliZ8V7fzeSTT6bOL.LrC5Su22D4RWSOAfpjuVgeXvqYrRC', 'CE', 1, '2025-10-21 21:23:51', '2025-11-01 22:57:17'),
(12, 'maulida', 'cm1@klamail.com', '$2y$12$zC.Y83LczMlOR1L8BHsgnOTbTrxSn56.QOrwsIVSz335kPkbxGdRS', 'CM', NULL, '2025-10-21 21:27:59', '2025-10-21 21:27:59'),
(13, 'ulin', 'cs3@klamail.com', '$2y$12$i15igvGpb7ooZXKEQVHwLOctqmUPx2J9ZLak2q.uk12rBu7i.GNsC', 'CS', NULL, '2025-10-21 21:29:03', '2025-10-21 21:29:03'),
(14, 'ce1-klategal', 'ce@klatgl.com', '$2y$12$zDX/QIfszRgOIakC1HJuyeXHsZpbmdqjOW3YYWPhhwepzmbZvbTkK', 'CE', 3, '2025-10-31 19:34:48', '2025-11-01 22:57:18'),
(15, 'ce1-klaslawi', 'ce@klaslw.com', '$2y$12$wfMQeOcECFQH1MTdpd7TV.CtLnUBfoRxpyPXpA5LmI8tlQyzYHnc6', 'CE', 2, '2025-10-31 19:36:45', '2025-11-01 22:57:18'),
(16, 'ce1-klakediri', 'ce@klakdr.com', '$2y$12$AAV6iN/HnQ1/g60gIESeuuUgBQqG1F4XNgto09IumlXD8Z7G3FHQC', 'CE', 5, '2025-10-31 19:41:34', '2025-11-01 22:57:18'),
(17, 'ce1-klapkl', 'ce@klapkl.com', '$2y$12$WLUsBaQgaGkViJ4QC8E5XeCadTvob8lMg1NgtGyZC1iWz123Mgffy', 'CE', 4, '2025-10-31 19:42:43', '2025-11-01 22:57:18');

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
-- Indexes for table `lognote`
--
ALTER TABLE `lognote`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_un_unique` (`un`),
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
-- AUTO_INCREMENT for table `lognote`
--
ALTER TABLE `lognote`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

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
