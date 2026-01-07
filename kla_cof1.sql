-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 06:09 PM
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
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `lonigtude` decimal(10,7) NOT NULL,
  `open_at` time NOT NULL,
  `close_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `prefix`, `created_at`, `updated_at`, `address`, `phone`, `latitude`, `lonigtude`, `open_at`, `close_at`) VALUES
(1, 'Semarang', 'A', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Ruko Mataram Plaza, D8-9, Jagalan, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50613', '0895-6167-97777', '0.0000000', '0.0000000', '00:00:00', '00:00:00'),
(2, 'Slawi', 'B', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Flores Baru, Langon, Kudaile, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52413', ' 0851-8506-8679', '0.0000000', '0.0000000', '00:00:00', '00:00:00'),
(3, 'Tegal', 'C', '2025-10-31 17:52:48', '2025-10-31 17:52:48', ' Jl. Sultan Agung No.49, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah', '0851-6586-7970', '0.0000000', '0.0000000', '00:00:00', '00:00:00'),
(4, 'Pekalongan', 'D', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Imam Bonjol No.9, Kergon, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51113', '0857-2496-8191', '0.0000000', '0.0000000', '00:00:00', '00:00:00'),
(5, 'Kediri', 'E', '2025-10-31 17:52:48', '2025-10-31 17:52:48', 'Jl. Pahlawan Kusuma Bangsa No.21, Banjaran, Kec. Kota, Kota Kediri, Jawa Timur 64129', '0898-6561-999', '0.0000000', '0.0000000', '00:00:00', '00:00:00');

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
(1, 1, 60, '2026-01-06 11:20:55'),
(2, 2, 8, '2026-01-07 10:36:28'),
(3, 3, 7, '2025-12-29 21:54:07'),
(4, 4, 12, '2026-01-07 07:21:15'),
(5, 5, 7, '2026-01-06 19:00:42');

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
-- Table structure for table `lognote`
--

CREATE TABLE `lognote` (
  `id` bigint UNSIGNED NOT NULL,
  `cof_id` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `logdesc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lognote`
--

INSERT INTO `lognote` (`id`, `cof_id`, `username`, `logdesc`, `created_at`, `updated_at`) VALUES
(1, 'A20251200057', NULL, 'tolong tawarin ke user', '2025-12-27 03:57:14', '2025-12-27 03:57:14'),
(2, 'A20251200057', NULL, 'hallooo', '2025-12-27 08:08:22', '2025-12-27 08:08:22'),
(3, 'A20251200057', NULL, 'haloo', '2025-12-27 08:11:47', '2025-12-27 08:11:47'),
(4, 'A20251200057', NULL, 'haloo', '2025-12-27 08:11:58', '2025-12-27 08:11:58'),
(5, 'A20251200057', NULL, 'lhoo', '2025-12-27 08:13:18', '2025-12-27 08:13:18'),
(6, 'A20251200057', 'Yogi-CE@smg', 'svfzds', '2025-12-27 08:14:20', '2025-12-27 08:14:20'),
(7, 'A20251200057', NULL, 'acc', '2025-12-27 08:16:03', '2025-12-27 08:16:03'),
(8, 'A20251200057', 'Maulida-CM', 'ascsD', '2025-12-27 08:18:40', '2025-12-27 08:18:40'),
(9, 'C20251200003', NULL, 'earfsd', '2025-12-27 08:26:54', '2025-12-27 08:26:54'),
(10, 'C20251200003', 'Erwan', 'dfsvz', '2025-12-27 08:27:40', '2025-12-27 08:27:40'),
(11, 'C20251200004', NULL, 'bhj', '2025-12-27 08:31:58', '2025-12-27 08:31:58'),
(12, 'C20251200005', NULL, 'check all', '2025-12-29 21:51:46', '2025-12-29 21:51:46'),
(13, 'C20251200006', NULL, 'check all', '2025-12-29 21:53:04', '2025-12-29 21:53:04'),
(14, 'C20251200007', NULL, 'check all', '2025-12-29 21:54:07', '2025-12-29 21:54:07'),
(15, 'A20260100059', NULL, 'nkj', '2026-01-05 11:39:32', '2026-01-05 11:39:32'),
(16, 'A20260100059', 'Yogi-CE@smg', 'dsavs', '2026-01-06 02:10:15', '2026-01-06 02:10:15'),
(17, 'A20260100059', 'Yogi-CE@smg', 'dfbxfd', '2026-01-06 02:19:39', '2026-01-06 02:19:39'),
(18, 'A20260100059', 'Yogi-CE@smg', 'dzfvbdzfv', '2026-01-06 02:42:06', '2026-01-06 02:42:06'),
(19, 'A20260100059', 'Yogi-CE@smg', 'tlg tawarin ke user', '2026-01-06 02:57:30', '2026-01-06 02:57:30'),
(20, 'A20260100060', NULL, 'check all', '2026-01-06 11:20:55', '2026-01-06 11:20:55'),
(21, 'A20260100060', 'Yogi-CE@smg', 'langsung digaarap', '2026-01-06 11:21:32', '2026-01-06 11:21:32'),
(22, 'A20260100060', 'Yogi-CE@smg', 'mau saya kerjakan', '2026-01-06 18:31:02', '2026-01-06 18:31:02'),
(23, 'A20260100060', 'Yogi-CE@smg', 'ZC xzs', '2026-01-06 18:37:52', '2026-01-06 18:37:52'),
(24, 'E20260100007', NULL, 'dvsff', '2026-01-06 19:00:42', '2026-01-06 19:00:42'),
(25, 'B20260100006', NULL, 'check all', '2026-01-07 09:23:22', '2026-01-07 09:23:22'),
(26, 'B20260100007', 'Agus-CE@slw', 'check all', '2026-01-07 09:51:38', '2026-01-07 09:51:38'),
(27, 'B20260100008', 'Agus-CE@slw', 'NJK', '2026-01-07 10:36:28', '2026-01-07 10:36:28');

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
(3, 'CE711A', 'HP Color Laserjet Professional CP577n', '2025-10-21 19:06:21', '2025-10-21 19:06:21'),
(4, 'JKI56J3', 'Dell Inspiron 14 3000', NULL, NULL),
(5, '9S7-14J112-1237', 'MSI Thin GF63', NULL, NULL),
(6, 'T480s', 'Lenovo IdeaPad Slim 5 Gen ', NULL, NULL),
(7, 'ADVAN-LMP-01', 'Advan Laptop Soulmate Intel Celeron N4020', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(8, 'MS-SURFACE-PRO9', 'Microsoft Surface Pro 9 Intel Core i5', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(9, 'MS-SURFACE-LAP5', 'Microsoft Surface Laptop 5 13.5 inch', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(10, 'MAC-AIR-M2', 'Apple MacBook Air M2 13-inch 2022', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(11, 'MAC-PRO-M3', 'Apple MacBook Pro M3 14-inch 2023', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(12, 'MSI-KATANA-15', 'MSI Katana 15 B13VFK Intel i7-13620H', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(13, 'MSI-MODERN-14', 'MSI Modern 14 C11M Intel Core i3', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(14, 'ADV-TAB-VX', 'Advan Sketsa 2 Tablet Android with Stylus', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(15, 'HP-PAV-X360', 'HP Pavilion x360 Convertible 14-dy000', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(16, 'LEN-YOGA-7I', 'Lenovo Yoga 7i Gen 7 Intel Core i7', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(17, 'ASU-ROG-STRIX', 'ASUS ROG Strix G15 G513RC Ryzen 7', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(18, 'ACE-PRED-HEL', 'Acer Predator Helios Neo 16 PH16', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(19, 'DEL-LAT-5430', 'Dell Latitude 5430 Rugged Laptop', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(20, 'GIG-AORUS-15', 'Gigabyte AORUS 15 BKF Intel i7-13700H', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(21, 'RAZ-BLADE-14', 'Razer Blade 14 Gaming Laptop Ryzen 9', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(22, 'SAMSUNG-GB3', 'Samsung Galaxy Book3 Pro 360', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(23, 'ADVAN-WORKPLUS', 'Advan Workplus AMD Ryzen 5 6600H', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(24, 'XIAOMI-NB-PRO', 'Xiaomi Mi Notebook Pro 14 2021', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(25, 'INF-ZERO-BOOK', 'Infinix ZERO BOOK Ultra Intel i9', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(26, 'HUA-MATE-D15', 'Huawei MateBook D15 Intel Core i5', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(27, 'AVA-LIBER-V', 'Avita Liber V14 Ryzen 5 3500U', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(28, 'ZOT-MAGNUS', 'Zotac Magnus EN173080C Mini PC', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(29, 'CHU-WI-LAP-PRO', 'Chuwi LapBook Pro Intel Celeron', '2026-01-07 18:05:07', '2026-01-07 18:05:07'),
(30, 'MSI-STEALTH-16', 'MSI Stealth 16 Studio A13V i9-13900H', '2026-01-07 18:05:07', '2026-01-07 18:05:07');

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
  `status` enum('new','repair progress','quotation request','quotation approved','quotation cancelled','finish repair','cancel repair') NOT NULL DEFAULT 'new',
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
  `erf_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ce_id` bigint UNSIGNED DEFAULT NULL,
  `engineer_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cof_id`, `branch_id`, `contact`, `received_date`, `status`, `started_date`, `finished_date`, `customer_name`, `email`, `address`, `phone_number`, `brand`, `product_number`, `serial_number`, `nama_type`, `fault_description`, `accessories`, `kondisi_unit`, `repair_summary`, `erf_file`, `created_at`, `updated_at`, `ce_id`, `engineer_id`) VALUES
(100, 'A20251200057', 1, 'njnjkk', '2025-12-27', 'finish repair', '2025-12-27 15:20:03', '2026-01-06', 'Punch', 'punch@gmail.com', 'njnj', '989789', 'bjhbhjj', 'CE711A', 'nmbjhbb', 'HP Color Laserjet Professional CP577n', 'knjnn', 'knjn', 'nkjn', 'kj', 'erf_files/ERF_A20251200057_1766848893.pdf', '2025-12-27 02:40:26', '2026-01-06 09:39:08', NULL, NULL),
(101, 'C20251200003', 3, 'hjbb', '2025-12-27', 'finish repair', '2025-12-27 15:28:58', '2025-12-27', 'Pengyou', 'pengyou@gmail.com', 'bjhbhb', '778978978', 'aedsfvsdfz', 'UX3405CA', 'sdfb z', 'ASUS ExpertBook B3', 'n m', 'nkjnn', 'njk', 'nknkj', 'erf_files/ERF_C20251200003_1766849668.pdf', '2025-12-27 08:26:03', '2025-12-30 16:04:11', NULL, NULL),
(102, 'C20251200004', 3, 'njkjk', '2025-12-27', 'finish repair', NULL, NULL, 'Wang', 'wang@gmail.com', 'hjbb', '8788979', 'afdvdsz', 'UX3405CA', 'kjnkj', 'ASUS ExpertBook B3', 'bhbbkj', 'hbbhjkb', 'hjbhj', 'bhj', NULL, '2025-12-27 08:31:58', '2025-12-30 16:04:16', NULL, NULL),
(103, 'A20260100058', 1, 'Personal', '2026-01-10', 'finish repair', NULL, NULL, 'Joko', 'joko@gmail.com', 'Jl Beruang', '9034590389', 'Asus', 'UX3405CA', 'NAJSdnvFEIU3489', 'ASUS ExpertBook B3', 'rusak', 'charger', 'rusak', 'good', 'erf_files/ERF_A20260100058_1767723053.pdf', '2025-12-29 21:44:26', '2026-01-06 11:10:54', NULL, NULL),
(104, 'C20251200005', 3, 'Company', '2025-12-30', 'finish repair', NULL, NULL, 'Shuo', 'shuo@gmail.com', 'Jl Giex', '3458923940', 'Dell', 'JKI56J3', 'SADFNVZIHI498893', 'Dell Inspiron 14 3000', 'rusak', 'Otg', 'lcd rusak', 'check all', NULL, '2025-12-29 21:51:46', '2026-01-06 18:14:21', NULL, NULL),
(105, 'C20251200006', 3, 'Personal', '2025-12-30', 'finish repair', NULL, NULL, 'Yoga', 'yoga@gmail.com', 'Jl Kakap 5', '4095834989', 'Acer', 'A514-55G-75BB', 'ISHADFVH9843', 'Acer Aspire 5 A514-55G-75BB Notebook', 'tocuhpad tdk fungsi', 'kabel power', 'tocuhpad tdk fungsi', 'check all', 'erf_files/ERF_C20251200006_1767084794.pdf', '2025-12-29 21:53:04', '2025-12-30 01:53:14', NULL, NULL),
(106, 'C20251200007', 3, 'Company', '2025-12-30', 'finish repair', NULL, NULL, 'Puji', 'puji@gmail.com', 'Jl Gajah 60', '489532948', 'MSI', '9S7-14J112-1237', 'AHDFSIU34589289', 'MSI Thin GF63', 'keyboard tdk fungsi', 'flashdisk', 'keyboard tdk fungsi', 'check all', 'erf_files/ERF_C20251200007_1767084760.pdf', '2025-12-29 21:54:07', '2025-12-30 01:52:42', NULL, NULL),
(107, 'A20260100059', 1, 'fvdsvkasjkl', '2026-01-06', 'finish repair', '2026-01-06 09:12:12', NULL, 'Winnn', 'winnn@gmail.com', 'hjhjb', '7897', 'dfv', 'UX3405CA', 'vcx xcz', 'ASUS ExpertBook B3', 'jkn', 'fdvdzf', 'nkj', 'nkj', 'erf_files/ERF_A20260100059_1767723439.pdf', '2026-01-05 11:39:32', '2026-01-06 11:17:19', NULL, NULL),
(108, 'A20260100060', 1, 'Personal', '2026-01-07', 'finish repair', '2026-01-07 01:31:02', '2026-01-07', 'Wahyu', 'wahyu@gmail.com', 'Jl Kelapa 50', '02340830915480', 'Dell', 'JKI56J3', 'SADHH348839Q89', 'Dell Inspiron 14 3000', 'rusak', 'bag', 'rusak', 'check all', 'erf_files/ERF_A20260100060_1767725473.pdf', '2026-01-06 11:20:55', '2026-01-06 18:51:13', NULL, NULL),
(109, 'E20260100007', 5, 'advfza', '2026-01-07', 'finish repair', NULL, '2026-01-07', 'Skill', 'skill@gmail.com', 'hghjghjg', '98798', 'Acer', 'A514-55G-75BB', 'dsfv', 'Acer Aspire 5 A514-55G-75BB Notebook', 'dfsgvsf', 'dsfrvdf', 'dsfv', 'dvsff', 'erf_files/ERF_E20260100007_1767726109.pdf', '2026-01-06 19:00:42', '2026-01-06 19:01:49', NULL, NULL),
(110, 'B20260100004', 2, 'jbkbn', '2026-01-07', 'finish repair', NULL, NULL, 'Samael', 'samael@gmail.com', 'hjbhbj', '9989890', 'HP', 'CE711A', 'CSDNJSDNCJ238430', 'HP Color Laserjet Professional CP577n', 'jbkjhb', 'hhkh', 'dxfv dxsz', 'b', 'erf_files/ERF_B20260100004_1767808309.pdf', '2026-01-07 07:08:46', '2026-01-07 17:51:51', NULL, NULL),
(111, 'D20260100012', 4, 'jkj', '2026-01-07', 'new', NULL, NULL, 'Liang', 'liang@gmail.com', 'b  jbj', '8789789', 'Asus', 'UX3405CA', 'JAN348RU83Q48', 'ASUS ExpertBook B3', 'hjk', 'jjbjkhb', 'b', 'b', NULL, '2026-01-07 07:21:15', '2026-01-07 07:21:15', NULL, NULL),
(112, 'B20260100005', 2, 'jhhbh', '2026-01-07', 'new', NULL, NULL, 'Sarang', 'sarang@gmail.com', 'nkjn', '897878', 'Acer', 'A514-55G-75BB', 'SADFNVZIHI498893', 'Acer Aspire 5 A514-55G-75BB Notebook', 'df vbfx', 'dfsvz', 'dfgv cx', 'check all', NULL, '2026-01-07 09:04:08', '2026-01-07 09:04:08', NULL, NULL),
(113, 'B20260100006', 2, 'ijji', '2026-01-07', 'new', NULL, NULL, 'Seno', 'seno@gmail.com', 'hjb', '998', 'MSI', '9S7-14J112-1237', 'SDNJ9498T389', 'MSI Thin GF63', 'njnk', 'svdf', 'ihi', 'check all', NULL, '2026-01-07 09:23:22', '2026-01-07 09:23:22', NULL, NULL),
(114, 'B20260100007', 2, 'uhi', '2026-01-07', 'new', NULL, NULL, 'Surya', 'surya@gmail.com', 'hjbhjbh', '988', 'Dell', 'JKI56J3', 'SDNJCNN98R83Q488', 'Dell Inspiron 14 3000', 'jkhjkhk', 'hh', 'h', 'check all', NULL, '2026-01-07 09:51:38', '2026-01-07 09:51:38', NULL, NULL),
(115, 'B20260100008', 2, 'jjnjkn', '2025-01-31', 'new', NULL, NULL, 'Seojono', 'seojono@gmail.com', 'jjbjbh', '989890', 'HP', 'CE711A', 'SDACH 3894Q3', 'HP Color Laserjet Professional CP577n', 'JKNKN', 'NKJK', 'NKJ', 'NJK', NULL, '2026-01-07 10:36:28', '2026-01-07 10:36:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `profile_photo`, `password`, `role`, `branch_id`, `created_at`, `updated_at`) VALUES
(10, 'Erwan', 'manager@kla.com', 'profile_photos/DTjsPDWTcTR0IVnFkv0IeWHsjGdTzxLDyTw8PfMe.jpg', '$2y$12$eFKoIg.ZXHGimp622Q23S.qCL5fP9KbLmcSzFQlYmOVXYz26Vqemi', 'MASTER', NULL, '2025-10-20 14:50:43', '2025-12-27 08:36:55'),
(11, 'Yogi-CE@smg', 'ce@klasmg.com', 'profile_photos/9wOiNp8kFkKdDt0aBal5ElrIHkDMmWndto8O9Go6.png', '$2y$12$3Yxb9y8WLjRvf9g9uw.AR..1qp/5C32N7U2H/fTHcT9YSXOkBssbO', 'CE', 1, '2025-10-21 14:23:51', '2026-01-06 18:56:32'),
(12, 'Maulida-CM', 'cm@klamail.com', 'profile_photos/06XjuxdbWGza8TNJ5MH2mCrTUF5OiuPxg4zCjjXU.png', '$2y$12$lQLww12gwXhXw4sxrlWAjOC7d41pNChiGs9o9eJE4gIRJbjLiwJEi', 'CM', NULL, '2025-10-21 14:27:59', '2025-12-27 08:44:27'),
(14, 'Budi-CE@tgl', 'ce@klatgl.com', 'profile_photos/DJzAPAogMTGQU35hbyQzjjs3a8eEvZVgvWX0ATJi.jpg', '$2y$12$EM6VlO3QEOVHsliisvDZPOxqFyJtLmzF6xxg3pKmIS1XMkRJG2yW.', 'CE', 3, '2025-10-31 12:34:48', '2025-12-27 01:11:18'),
(15, 'Agus-CE@slw', 'ce@klaslw.com', 'profile_photos/Cug27yKF3xbbwBsnKc6LxW5QkdChFOTBOij224S2.png', '$2y$12$1bT.bwAYanbDeGgHHBS/Cuslxyz5iM5L5KNJiJSqyT0dXgShoQ1Qq', 'CE', 2, '2025-10-31 12:36:45', '2025-12-27 01:11:47'),
(16, 'Albert-CE@kdr', 'ce@klakdr.com', 'profile_photos/pWOP1hyJy8ooIdEec4fg7SvkwotU3YPjFHF9ZdJr.png', '$2y$12$q3iu7LTngeN.7gQi5YUqZughBrs4sKTnFabaGyoH13.dA/JidVJbC', 'CE', 5, '2025-10-31 12:41:34', '2026-01-06 20:07:41'),
(17, 'Kevin-CE@pkl', 'ce@klapkl.com', 'profile_photos/id1DrgqxPDyntS4ikmNRljR7g4HhHEXHDwJ8AuL9.png', '$2y$12$HmWSR3Prg5JqptRqnkGGyuv1eZApIpnZqE5Yvq5Iv3UVZtFxTevNG', 'CE', 4, '2025-10-31 12:42:43', '2026-01-05 03:35:28');

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
-- AUTO_INCREMENT for table `lognote`
--
ALTER TABLE `lognote`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
  ADD CONSTRAINT `services_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
