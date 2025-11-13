-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2025 at 08:20 AM
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
(1, 1, 71, '2025-11-09 21:01:18'),
(2, 2, 3, '2025-11-07 19:32:55'),
(3, 3, 2, '2025-11-07 21:26:41'),
(4, 4, 11, '2025-11-07 23:51:04'),
(5, 5, 1, '2025-11-07 00:03:50');

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
(15, '2025_11_09_111822_add_address_to_branches_table', 8);

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ce_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cof_id`, `branch_id`, `contact`, `received_date`, `started_date`, `finished_date`, `customer_name`, `email`, `address`, `phone_number`, `brand`, `product_number`, `serial_number`, `nama_type`, `fault_description`, `accessories`, `kondisi_unit`, `repair_summary`, `created_at`, `updated_at`, `ce_id`) VALUES
(2, 'A000022', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Edwin', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-21 18:14:23', '2025-11-09 21:01:18', NULL),
(3, 'A000023', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-21 18:22:13', '2025-11-09 21:01:18', NULL),
(4, 'A000024', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-21 18:29:57', '2025-11-09 21:01:18', NULL),
(5, 'A000025', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-21 19:07:28', '2025-11-09 21:01:18', NULL),
(6, 'A000026', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Catur', '', 'kjnkjnkj', 'kjn', '', 'jkk', 'jkkk', NULL, 'knjnkj', 'jkkk', NULL, 'jkjk', '2025-09-21 19:17:06', '2025-11-09 21:01:18', NULL),
(7, 'A000027', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'qeqwr', '', 'sfzsszf', 'sfzfzsfzsf', '', 'rarfsarQ', 'SGFSDG', NULL, 'DSGSDG', 'SDGSDG', NULL, 'DSGSDG', '2025-09-21 19:27:59', '2025-11-09 21:01:18', NULL),
(8, 'A000028', 1, '', '2025-09-22', '2025-09-22', '2025-09-22', 'qeqwr', '', 'sfzsszf', 'sfzfzsfzsf', '', 'rarfsarQ', 'SGFSDG', NULL, 'DSGSDG', 'SDGSDG', NULL, 'DSGSDG', '2025-09-21 19:30:05', '2025-11-09 21:01:18', NULL),
(9, 'A000029', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'Mas YOgi', '', 'nkjnkjnjk', '90808098', '', 'jjjiio', 'jjj', NULL, 'nnjknkjn', 'nkjnkjnj', NULL, 'jnjknjk', '2025-09-24 19:06:26', '2025-11-09 21:01:18', NULL),
(10, 'A000030', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqrafaf', '', 'uu', 'fuyfuy', 'owpropwqjro', 'opjpjhop', 'opjop', NULL, 'opj', 'opjopjop', NULL, 'opjpoj', '2025-09-24 19:33:10', '2025-11-09 21:01:18', NULL),
(11, 'A000031', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqrafaf', '', 'uu', 'fuyfuy', 'owpropwqjro', 'opjpjhop', 'opjop', NULL, 'opj', 'opjopjop', NULL, 'opjpoj', '2025-09-24 19:33:41', '2025-11-09 21:01:18', NULL),
(12, 'A000032', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'woirfopafapo', '', 'iohoihoi', 'ohuhuohoi', 'ioahsfoiash', 'iohoihoi', 'hihoih', NULL, 'ioiohoiho', 'oihoih', NULL, 'iohoihoi', '2025-09-24 19:38:01', '2025-11-09 21:01:18', NULL),
(13, 'A000033', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-24 19:45:42', '2025-11-09 21:01:18', NULL),
(14, 'A000034', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-24 19:47:41', '2025-11-09 21:01:18', NULL),
(15, 'A000035', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-24 19:48:38', '2025-11-09 21:01:18', NULL),
(16, 'A000036', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqeqwe', '', 'yuf', 'uyfg', 'oihoih', 'ohoi', 'hoi', NULL, 'oih', 'oih', NULL, 'oiho', '2025-09-24 19:49:50', '2025-11-09 21:01:18', NULL),
(17, 'A000037', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'qewrqw', '', '9h89', 'h9', 'kjooi', 'ihoih', 'oihoih', NULL, 'hihoh', 'oihoiho', NULL, 'hooiho', '2025-09-24 19:54:37', '2025-11-09 21:01:18', NULL),
(18, 'A000038', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'edwin', '', 'iugui', 'gui', 'houihio', 'hoih', 'oih', NULL, 'oih', 'oih', NULL, 'ho', '2025-09-24 19:57:12', '2025-11-09 21:01:18', NULL),
(19, 'A000039', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'catur', '', 'guig', 'iug', 'iojiojio', 'jioj', 'oijoij', NULL, 'joi', 'oijoi', NULL, 'oij', '2025-09-24 19:58:49', '2025-11-09 21:01:18', NULL),
(20, 'A000040', 1, '', '2025-09-25', '2025-09-25', '2025-09-25', 'catur', '', 'guig', 'iug', 'iojiojio', 'jioj', 'oijoij', NULL, 'joi', 'oijoi', NULL, 'oij', '2025-09-24 19:59:14', '2025-11-09 21:01:18', NULL),
(21, 'A000041', 1, '', '2025-09-25', NULL, NULL, 'fesfes', '', 'n', 'jn', 'ohih', 'oihoi', 'ho', NULL, 'ho', 'hoi', NULL, 'ho', '2025-09-24 20:02:41', '2025-11-09 21:01:18', NULL),
(22, 'A000042', 1, '', NULL, NULL, NULL, 'wafakwf', '', 'oih', 'iohio', 'ohioh', 'oihoi', 'hoi', NULL, 'ho', 'hoi', NULL, 'hoih', '2025-09-24 20:04:07', '2025-11-09 21:01:18', NULL),
(23, 'A000043', 1, 'iihuhi', NULL, NULL, NULL, 'sfsdfs', '', 'uhiu', 'huih', 'ohoih', 'oih', 'oh', NULL, 'ioh', 'oih', NULL, 'hoi', '2025-09-24 20:11:26', '2025-11-09 21:01:18', NULL),
(24, 'A000044', 1, 'jkkknkjn', NULL, NULL, NULL, 'Tur', '', 'njnj', 'j88080989', 'nkjknkn', 'jjkjlj', 'jkjkl', NULL, 'mlmlm', 'mklmlm', NULL, 'mmlmlm', '2025-09-24 20:20:18', '2025-11-09 21:01:18', NULL),
(25, 'A000045', 1, 'joiioijjioo', NULL, NULL, NULL, 'Hayo', '', 'hhhh', '0988', 'khihui', 'hhkhn', 'hohoihj', NULL, 'jijio', 'jiooiio', NULL, 'jioio', '2025-09-25 12:25:13', '2025-11-09 21:01:18', NULL),
(26, 'A000046', 1, 'nkjnjkn', '2025-10-09', NULL, NULL, 'jojoi', '', 'iojjio', 'j8908809', 'jn', 'jjkj', 'kjkj', NULL, 'kjk', 'jj', NULL, 'ljk', '2025-09-25 12:25:51', '2025-11-09 21:01:18', NULL),
(27, 'A000047', 1, 'jjl', '2025-09-19', NULL, NULL, 'kjk', '', 'kjjkjkk', '8998980', 'hhhuhj', 'khkhhhj', 'hhhhjhih', NULL, 'ijiojioj', 'jiojioj', NULL, 'jjooi', '2025-09-25 12:56:48', '2025-11-09 21:01:18', NULL),
(28, 'A000048', 1, 'jjjji', '2025-09-26', NULL, NULL, 'kjjhkjhh', '', 'hkjjjkhj', '8009908', 'klj', 'jjijiojio', 'hjkh', 'jji', 'jiojioo', 'i', NULL, 'jjio', '2025-09-25 13:00:26', '2025-11-09 21:01:18', NULL),
(29, 'A000049', 1, 'dvfvdf', '2025-09-05', NULL, NULL, 'Pak ERwan', '', 'hijhi', '809898', 'nkjnn', 'njknknjk', 'jj', 'jj', 'jjio', 'jji', NULL, 'io', '2025-09-25 13:02:00', '2025-11-09 21:01:18', NULL),
(30, 'A000050', 1, 'ijioio', '2025-10-03', NULL, NULL, 'hjkhi', '', 'ihihiu', '989090', 'khhuhuih', 'hhjioj', 'jijoijiojio', 'jjjiojio', 'jjjioj', 'iojjjio', NULL, 'jji', '2025-09-25 13:02:40', '2025-11-09 21:01:18', NULL),
(31, 'A000051', 1, 'Company', '2025-10-03', NULL, NULL, 'Stella', '', 'Sungai Penuh', '043086259080', 'HP', 'HAUIFSDAE809', 'FODVOJEODI4395R90', 'HP Officejet Pro 5130', 'print failure', 'Dus bawaan', NULL, 'cek ok good best', '2025-09-25 13:21:44', '2025-11-09 21:01:18', NULL),
(32, 'A000052', 1, 'Company', '2025-10-03', '2025-09-30', '2025-09-30', 'Stefer', '', 'Sungai Penuh', '043086259080', 'HP', 'HAUIFSDAE809', 'FODVOJEODI4395R90', 'HP Officejet Pro 5130', 'print failure', 'Dus bawaan', NULL, 'cek ok good best', '2025-09-25 13:23:18', '2025-11-09 21:01:18', NULL),
(34, 'A000053', 1, 'jj', '2025-09-02', '2025-09-18', '2025-09-03', 'Wicaksono', '', 'iojio', 'j', 'huihiui', 'huuhihj', 'hhhh', 'jijio', NULL, 'jiijoj', 'jk', 'jkjkl', '2025-09-25 13:40:18', '2025-11-09 21:01:18', NULL),
(35, 'A000054', 1, 'hohjoi', '2025-10-09', '2025-09-26', '2025-09-26', 'Tadisa', '', 'jhu', 'jhjhj', 'hioho', 'jj', 'hhuoho', 'h', 'nlklnj', 'lnljnnj', 'jll', 'lklj', '2025-09-25 13:41:34', '2025-11-09 21:01:18', NULL),
(36, 'A000055', 1, 'ijilj', '2025-10-09', '2025-09-27', '2025-09-27', 'hko', '', 'kjbkbjkb', '878907908', 'kjlkljl', 'jjl', 'kjkkh', 'jnhlhh', 'kjnlkn', 'lkmlm', 'nlkjlkj', 'lnlnlknk', '2025-09-26 18:42:30', '2025-11-09 21:01:18', NULL),
(37, 'A000056', 1, 'jnjkl', '2025-09-27', '2025-09-28', '2025-09-29', 'Acer', '', 'hkh', '8090989', 'kjn l', 'lnjkn', 'kljlkjl', 'jllk', 'hkjhjh', 'jhlhjh', 'kjhkkjh', 'hjhkh', '2025-09-26 18:43:14', '2025-11-09 21:01:18', NULL),
(38, 'A000057', 1, 'huihuih', '2025-09-27', '2025-09-27', '2025-09-30', 'jioiojojoi', '', 'hhijuj', '800998', 'njknjknk', 'hhjh', 'joikoo', 'iojoi', 'iojjiojio', 'ijijoio', 'jioio', 'ioioi', '2025-09-27 15:07:51', '2025-11-09 21:01:18', NULL),
(39, 'A000058', 1, 'Company', '2025-09-30', '2025-09-30', '2025-10-01', 'Fattah', '', 'Jakarta', '403958349', 'HP', 'NJVDF34U8RU43U', 'NFNADJ843UU430', 'HP Designjet 1110 Pro', 'rusak', 'dus bawaan', 'rusak', 'good', '2025-09-29 03:01:15', '2025-11-09 21:01:18', NULL),
(40, 'A000059', 1, 'nadvjon', '2025-09-30', '2025-09-30', '2025-10-01', 'Mas Agung', '', 'jojoijoj', '90809098', 'Lenovo', 'DSCNK909090VJDFN', 'DFVKJXCNVJDU90U90', 'sdnvkjndjk', 'nnoj', 'jnkl', 'lkklj', 'jkljklj', '2025-09-29 11:57:32', '2025-11-09 21:01:18', NULL),
(41, 'A000060', 1, 'Company', '2025-09-30', '2025-10-11', '2025-10-08', 'Pak Farhan', '', 'Gajah', '238048030', 'Acer', 'D S343345', 'JOAFVAIO3409893', 'hfhihvua', 'jo', 'iij', 'jjj', 'kjnjk', '2025-09-29 16:46:32', '2025-11-09 21:01:18', NULL),
(42, 'A000061', 1, 'hihuui', '2025-10-01', '2025-10-01', '2025-10-02', 'Hewlett', '', 'hohh', '897879', 'nininiu', 'jknn', 'jjnjn', 'jkkj', 'njho', 'hbibib', 'kbnjknn', 'jnnk', '2025-09-30 13:53:59', '2025-11-09 21:01:18', NULL),
(43, 'A000062', 1, 'jljlj', '2025-10-10', '2025-10-15', '2025-10-29', 'HP', 'jijijiji', 'kjnknjnjknjnjk', '9888080', 'jn', 'jo', 'jklk', 'kklkl', 'klkl', 'kllkkl', 'kmlm', 'klmk', '2025-10-01 12:46:37', '2025-11-09 21:01:18', NULL),
(44, 'A000063', 1, 'kjnkjnj', '2025-10-24', '2025-10-11', '2025-10-05', 'Adrie', 'jojio', 'mn nm n', '9090', 'nj', 'nkln', 'klnnnl', 'nnkln', 'nkjlnlk', 'nlknn', 'klnkl', 'lkk', '2025-10-09 10:22:53', '2025-11-09 21:01:18', NULL),
(45, 'A000064', 1, 'kjknknk', '2025-10-14', '2025-10-14', '2025-10-14', 'Jesslyn', 'jioino', 'jbjnk', '0980990', 'uhojuh', 'jnjnnk', 'njnn', 'nnjn', 'nkjn', 'nkjjknjk', 'jknkjkj', 'nnjkn', '2025-10-13 10:15:00', '2025-11-09 21:01:18', NULL),
(46, 'A000065', 1, 'jiij', '2025-10-04', '2025-10-11', '2025-10-14', 'Rexus', 'elkrgfmed', 'kjnjknkj', '8098', 'kbj', 'kjknk', 'njknkljjkl', 'nlkjn', 'nlk', 'nnlkn', 'nlkjnl', 'nnkl', '2025-10-17 20:34:20', '2025-11-09 21:01:18', NULL),
(47, 'A000066', 1, 'nklmk', '2025-10-09', '2025-10-15', '2025-10-28', 'Samsung', 'samsung@gmail.com', 'kjnn', '90ii9', 'hgiuhggu', 'huiku', 'hkbb', 'bkbhkj', 'bhkbkbkbh', 'hbjbb', 'hbhk', 'bhjb,jb', '2025-10-23 23:53:01', '2025-11-09 21:01:18', NULL),
(48, 'A000067', 1, 'Company', '2025-10-27', '2025-10-27', '2025-10-30', 'Gipiti', 'gipiti@gmail.com', 'Prudential Center Kota Kasablanka Lantai 5 Unit C-E, Jl. Raya Casablanca No.Kav. 88 16, RT.16/RW.5, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870', '+62 858-9012-5770', 'Asus', 'UX3405CA', 'A123456789B', 'ASUS ExpertBook B3', 'lcd pecah, adaptor rusak, check all', 'adaptor', 'rusak', 'gasssss', '2025-10-26 09:28:09', '2025-11-09 21:01:18', NULL),
(49, 'A000068', 1, 'Company', '2025-10-27', '2025-10-27', '2025-10-30', 'Gipiti', 'gipiti@gmail.com', 'Prudential Center Kota Kasablanka Lantai 5 Unit C-E, Jl. Raya Casablanca No.Kav. 88 16, RT.16/RW.5, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870', '+62 858-9012-5770', 'Asus', 'UX3405CA', 'A123456789B', 'ASUS ExpertBook B3', 'lcd pecah, adaptor rusak, check all', 'adaptor', 'rusak', 'gasssss', '2025-10-26 09:34:19', '2025-11-09 21:01:18', NULL),
(50, 'A000069', 1, 'Personal', '2025-11-08', '2025-11-07', '2025-10-01', 'Mc Laren', 'mclaren@gmail.com', 'fdgbfdbg', '345346546', 'fgbdfg', 'UX3405CA', 'fgbdf5464', 'ASUS ExpertBook B3', 'gcb ngcb', 'dfgbdfg', 'fgbdfgb', 'fgbdfgb', '2025-10-26 21:23:57', '2025-11-09 21:01:18', NULL),
(51, 'A000070', 1, 'Company', '2025-11-01', '2025-11-08', '2025-11-04', 'HD', 'hd@gmail.com', '534534', '4r3535', '53334', 'dfvsdfg', '3452', 'fgbbd', 'dv df', 'vdsfvsd', 'dsfv fd', 'sdfvd', '2025-10-26 21:36:34', '2025-11-09 21:01:18', NULL),
(52, 'A000071', 1, 'sddsfv', '2025-10-11', '2025-09-30', '2025-10-01', 'Intel', 'intel@gmail.com', 'bkjbjkj', '78978', 'jbkn', 'CE711A', 'giboolj', 'HP Color Laserjet Professional CP577n', 'jlnk', 'hnlnkjn', 'kljlk', 'ljljl', '2025-10-29 01:57:00', '2025-11-09 21:01:18', NULL),
(53, 'A000006', 1, 'asdasf', '2025-11-07', '2025-11-07', '2025-11-07', 'qwrqwrqwr', NULL, NULL, '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', 'qwrqwr', NULL, NULL, 'qwrqwr', '2025-11-06 20:37:59', '2025-11-06 20:37:59', NULL),
(54, 'A000009', 1, 'asdasf', '2025-11-07', '2025-11-07', '2025-11-07', 'qwrqwrqwr', NULL, 'sfasfasf', '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', 'sfasfasf', NULL, NULL, 'safasf', '2025-11-06 21:08:27', '2025-11-06 21:08:27', NULL),
(55, 'A000010', 1, 'asdasf', '2025-11-07', '2025-11-07', '2025-11-07', 'qwrqwrqwr', NULL, 'aDAd', '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', 'aDAd', NULL, NULL, 'ADAd', '2025-11-06 21:08:44', '2025-11-06 21:08:44', NULL),
(56, 'A000011', 1, 'Syifa Catur Wicaksono', '2025-11-07', '2025-11-07', '2025-11-07', 'Syifa Catur Wicaksono', NULL, NULL, '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', 'asdadasd', NULL, NULL, 'asdasdasd', '2025-11-06 21:14:38', '2025-11-06 21:14:38', NULL),
(57, 'A000012', 1, 'Syifa Catur Wicaksono', '2025-11-07', '2025-11-07', '2025-11-07', 'Syifa Catur Wicaksono', NULL, 'safasfasf', '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', 'sfasfasf', NULL, NULL, 'asfasf', '2025-11-06 21:18:36', '2025-11-06 21:18:36', NULL),
(58, 'A000013', 1, 'Syifa Catur Wicaksono', '2025-11-07', '2025-11-07', '2025-11-07', 'edwin', NULL, NULL, '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', NULL, NULL, NULL, NULL, '2025-11-06 21:19:05', '2025-11-06 21:19:05', NULL),
(59, 'A000014', 1, 'Syifa Catur Wicaksono', '2025-11-07', '2025-11-07', '2025-11-07', 'edwin', NULL, NULL, '12421412', 'asfasfas', 'A514-55G-75BB', 'wetwetwetwe', 'Acer Aspire 5 A514-55G-75BB Notebook', NULL, NULL, NULL, NULL, '2025-11-06 21:22:42', '2025-11-06 21:22:42', NULL),
(60, 'D000001', 4, 'gjh', '2025-11-01', '2025-11-14', '2025-11-13', 'Leo', NULL, 'jhgj', '778979', 'cvvgv', 'UX3405CA', 'ghj', 'ASUS ExpertBook B3', 'jhh', NULL, NULL, ',jnk,', '2025-11-06 21:47:38', '2025-11-06 21:47:38', NULL),
(61, 'D000002', 4, 'gjh', '2025-11-01', '2025-11-14', '2025-11-13', 'lie, edwin', NULL, 'ra ndue alamat', '778979', 'cvvgv', 'UX3405CA', 'ghj', 'ASUS ExpertBook B3', 'gila', NULL, NULL, 'a', '2025-11-06 23:14:25', '2025-11-06 23:14:25', NULL),
(62, 'A000016', 1, 'adasdsad', '2025-11-07', '2025-11-07', '2025-11-07', 'Edwin', NULL, 'sdsadsad', '32525', 'sadasdsad', 'A514-55G-75BB', 'wqrqwrqwr', 'Acer Aspire 5 A514-55G-75BB Notebook', 'wqrqwr', NULL, NULL, 'qwrqw', '2025-11-06 23:41:23', '2025-11-06 23:41:23', NULL),
(63, 'A000017', 1, 'hbubu', '2025-11-06', '2025-11-04', '2025-11-10', 'Case', NULL, 'inij', '089', 'nnjk', 'A514-55G-75BB', 'iuninnjnn', 'Acer Aspire 5 A514-55G-75BB Notebook', 'hnui8', NULL, NULL, 'klmk', '2025-11-06 23:49:38', '2025-11-06 23:49:38', NULL),
(64, 'D000003', 4, 'hiuu', '2025-11-07', '2025-11-07', '2025-11-07', 'Work', NULL, 'nkjnko', '90889', 'nij', 'CE711A', 'hhb', 'HP Color Laserjet Professional CP577n', 'hbuh', NULL, NULL, 'njni', '2025-11-06 23:53:02', '2025-11-06 23:53:02', NULL),
(65, 'C000001', 3, 'iiohijo', '2025-11-07', '2025-11-07', '2025-11-07', 'Boni', NULL, 'hhihu', '9890890989', 'hijii', 'CE711A', 'hjn', 'HP Color Laserjet Professional CP577n', 'joi', NULL, NULL, 'io', '2025-11-06 23:59:30', '2025-11-06 23:59:30', NULL),
(66, 'B000001', 2, 'iuj', '2025-11-28', '2025-11-07', '2025-11-07', 'Oliver', NULL, 'njnn', '009', 'jioo', 'UX3405CA', 'kio', 'ASUS ExpertBook B3', 'kkok', NULL, NULL, 'o', '2025-11-07 00:01:13', '2025-11-07 00:01:13', NULL),
(67, 'E000001', 5, 'hi', '2025-11-07', '2025-11-07', '2025-11-07', 'Milo', NULL, 'hiuiuu', '9787', 'gbhhi', 'CE711A', 'hbk', 'HP Color Laserjet Professional CP577n', 'jjjkj', NULL, NULL, 'jlkk', '2025-11-07 00:03:50', '2025-11-07 00:03:50', NULL),
(68, 'B000002', 2, 'hkhkh', '2025-11-13', '2025-11-19', '2025-11-14', 'Full', NULL, 'jhkjh', '890', 'jhihno', 'A514-55G-75BB', 'kbhkibi', 'Acer Aspire 5 A514-55G-75BB Notebook', 'iuhuuhih', NULL, NULL, 'jlj', '2025-11-07 19:17:49', '2025-11-07 19:17:49', NULL),
(69, 'B000003', 2, 'jnno', '2025-11-08', '2025-11-08', '2025-11-08', 'Away', 'away@gmail.com', 'bhj', '98989', 'kjnkjj', 'CE711A', 'nl', 'HP Color Laserjet Professional CP577n', 'jlklklkj', NULL, NULL, 'kl', '2025-11-07 19:32:55', '2025-11-07 19:32:55', NULL),
(70, 'D000004', 4, 'asfsaf', '2025-11-08', '2025-11-08', '2025-11-08', 'afasfsa', 'steven@gmail.com', 'dgsdgsdg', '32412', 'dsgdsgd', 'A514-55G-75BB', 'dsgsdg', 'Acer Aspire 5 A514-55G-75BB Notebook', 'dsgsdg', NULL, NULL, 'sdgsdg', '2025-11-07 21:22:18', '2025-11-07 21:22:18', NULL),
(71, 'D000007', 4, 'wfaf', NULL, NULL, NULL, 'wetwetwet', 'ce@mail.com', 'qwqrqwr', '124124', 'wqrqwr', 'A514-55G-75BB', 'wqrqwr', 'Acer Aspire 5 A514-55G-75BB Notebook', 'qwrwqr', NULL, NULL, 'qwrqwr', '2025-11-07 21:25:27', '2025-11-07 21:25:27', NULL),
(72, 'C000002', 3, 'werwer', NULL, NULL, NULL, 'Edwin', 'ce@mail.com', 'wrewrewr', '1232131', 'wrwer', 'A514-55G-75BB', 'werwer', 'Acer Aspire 5 A514-55G-75BB Notebook', 'werewr', NULL, NULL, 'wrewre', '2025-11-07 21:26:41', '2025-11-07 21:26:41', NULL),
(73, 'A000021', 1, 'hfjjh', NULL, NULL, NULL, 'Edwin', 'ce@mail.com', 'jkgjkgkj', '7587575', 'owpropwqjro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-07 21:43:43', '2025-11-07 21:43:43', NULL),
(74, 'D000008', 4, 'afdafss', '2025-11-08', '2025-11-20', '2025-11-13', 'Edwin', 'ce@mail.com', 'fsfasdfsd', '678679', 'asfsaf', 'A514-55G-75BB', 'safsaf', 'Acer Aspire 5 A514-55G-75BB Notebook', NULL, NULL, NULL, NULL, '2025-11-07 23:46:14', '2025-11-07 23:46:14', NULL),
(75, 'D000009', 4, 'j', '2025-11-08', '2025-11-08', '2025-11-08', 'Edwin', 'edwin.designz99@gmail.com', 'asdasfasf', '241412', 'asdsafsaf', 'A514-55G-75BB', 'asfasfasf', 'Acer Aspire 5 A514-55G-75BB Notebook', 'asfasf', NULL, NULL, 'asfasfsaf', '2025-11-07 23:48:25', '2025-11-07 23:48:25', NULL),
(76, 'D000010', 4, 'sasadasf', '2025-11-08', '2025-11-08', '2025-11-08', 'Edwin', 'edwin.designz99@gmail.com', 'sadasassa', '213123', 'asfasfsaf', 'A514-55G-75BB', 'asfasf', 'Acer Aspire 5 A514-55G-75BB Notebook', 'asfasf', NULL, 'asfasf', 'asfsa', '2025-11-07 23:49:51', '2025-11-07 23:49:51', NULL),
(77, 'D000011', 4, 'awsewadasfsaf', '2025-11-08', '2025-11-08', '2025-11-08', 'Edwin', 'adrie01@gmail.com', 'safasfasf', '12312124', 'asfasfsaf', 'A514-55G-75BB', 'asfasfasf', 'Acer Aspire 5 A514-55G-75BB Notebook', 'safasfsa', 'asfasf', 'asfasf', 'asfasf', '2025-11-07 23:51:04', '2025-11-07 23:51:04', NULL);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
