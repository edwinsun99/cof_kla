-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2025 at 03:05 AM
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
-- Database: `kla_cof`
--

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `contact` varchar(100) NOT NULL,
  `received_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `started_date` varchar(100) DEFAULT NULL,
  `finished_date` date DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `contact`, `received_date`, `started_date`, `finished_date`, `customer_name`, `email`, `address`, `phone_number`, `brand`, `product_number`, `serial_number`, `nama_type`, `fault_description`, `accessories`, `kondisi_unit`, `repair_summary`, `created_at`, `updated_at`) VALUES
(2, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Edwin', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-22 01:14:23', '2025-09-22 01:14:23'),
(3, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-22 01:22:13', '2025-09-22 01:22:13'),
(4, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-22 01:29:57', '2025-09-22 01:29:57'),
(5, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Chia', '', 'Beruang', '90-90-', '', 'hjiujo', 'jiojioioioj', NULL, 'lkjkljkjl', 'ljljlk', NULL, 'kjkl', '2025-09-22 02:07:28', '2025-09-22 02:07:28'),
(6, '', '2025-09-22', '2025-09-22', '2025-09-22', 'Catur', '', 'kjnkjnkj', 'kjn', '', 'jkk', 'jkkk', NULL, 'knjnkj', 'jkkk', NULL, 'jkjk', '2025-09-22 02:17:06', '2025-09-22 02:17:06'),
(7, '', '2025-09-22', '2025-09-22', '2025-09-22', 'qeqwr', '', 'sfzsszf', 'sfzfzsfzsf', '', 'rarfsarQ', 'SGFSDG', NULL, 'DSGSDG', 'SDGSDG', NULL, 'DSGSDG', '2025-09-22 02:27:59', '2025-09-22 02:27:59'),
(8, '', '2025-09-22', '2025-09-22', '2025-09-22', 'qeqwr', '', 'sfzsszf', 'sfzfzsfzsf', '', 'rarfsarQ', 'SGFSDG', NULL, 'DSGSDG', 'SDGSDG', NULL, 'DSGSDG', '2025-09-22 02:30:05', '2025-09-22 02:30:05'),
(9, '', '2025-09-25', '2025-09-25', '2025-09-25', 'Mas YOgi', '', 'nkjnkjnjk', '90808098', '', 'jjjiio', 'jjj', NULL, 'nnjknkjn', 'nkjnkjnj', NULL, 'jnjknjk', '2025-09-25 02:06:26', '2025-09-25 02:06:26'),
(10, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqrafaf', '', 'uu', 'fuyfuy', 'owpropwqjro', 'opjpjhop', 'opjop', NULL, 'opj', 'opjopjop', NULL, 'opjpoj', '2025-09-25 02:33:10', '2025-09-25 02:33:10'),
(11, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqrafaf', '', 'uu', 'fuyfuy', 'owpropwqjro', 'opjpjhop', 'opjop', NULL, 'opj', 'opjopjop', NULL, 'opjpoj', '2025-09-25 02:33:41', '2025-09-25 02:33:41'),
(12, '', '2025-09-25', '2025-09-25', '2025-09-25', 'woirfopafapo', '', 'iohoihoi', 'ohuhuohoi', 'ioahsfoiash', 'iohoihoi', 'hihoih', NULL, 'ioiohoiho', 'oihoih', NULL, 'iohoihoi', '2025-09-25 02:38:01', '2025-09-25 02:38:01'),
(13, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-25 02:45:42', '2025-09-25 02:45:42'),
(14, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-25 02:47:41', '2025-09-25 02:47:41'),
(15, '', '2025-09-25', '2025-09-25', '2025-09-25', 'sdfsdfs', '', 'uigiug', 'igiugiu', 'khkh', 'hiohoi', 'hiohoi', NULL, 'hoihoi', 'hoihoi', NULL, 'hoihoi', '2025-09-25 02:48:38', '2025-09-25 02:48:38'),
(16, '', '2025-09-25', '2025-09-25', '2025-09-25', 'wqeqwe', '', 'yuf', 'uyfg', 'oihoih', 'ohoi', 'hoi', NULL, 'oih', 'oih', NULL, 'oiho', '2025-09-25 02:49:50', '2025-09-25 02:49:50'),
(17, '', '2025-09-25', '2025-09-25', '2025-09-25', 'qewrqw', '', '9h89', 'h9', 'kjooi', 'ihoih', 'oihoih', NULL, 'hihoh', 'oihoiho', NULL, 'hooiho', '2025-09-25 02:54:37', '2025-09-25 02:54:37'),
(18, '', '2025-09-25', '2025-09-25', '2025-09-25', 'edwin', '', 'iugui', 'gui', 'houihio', 'hoih', 'oih', NULL, 'oih', 'oih', NULL, 'ho', '2025-09-25 02:57:12', '2025-09-25 02:57:12'),
(19, '', '2025-09-25', '2025-09-25', '2025-09-25', 'catur', '', 'guig', 'iug', 'iojiojio', 'jioj', 'oijoij', NULL, 'joi', 'oijoi', NULL, 'oij', '2025-09-25 02:58:49', '2025-09-25 02:58:49'),
(20, '', '2025-09-25', '2025-09-25', '2025-09-25', 'catur', '', 'guig', 'iug', 'iojiojio', 'jioj', 'oijoij', NULL, 'joi', 'oijoi', NULL, 'oij', '2025-09-25 02:59:14', '2025-09-25 02:59:14'),
(21, '', '2025-09-25', NULL, NULL, 'fesfes', '', 'n', 'jn', 'ohih', 'oihoi', 'ho', NULL, 'ho', 'hoi', NULL, 'ho', '2025-09-25 03:02:41', '2025-09-25 03:02:41'),
(22, '', NULL, NULL, NULL, 'wafakwf', '', 'oih', 'iohio', 'ohioh', 'oihoi', 'hoi', NULL, 'ho', 'hoi', NULL, 'hoih', '2025-09-25 03:04:07', '2025-09-25 03:04:07'),
(23, 'iihuhi', NULL, NULL, NULL, 'sfsdfs', '', 'uhiu', 'huih', 'ohoih', 'oih', 'oh', NULL, 'ioh', 'oih', NULL, 'hoi', '2025-09-25 03:11:26', '2025-09-25 03:11:26'),
(24, 'jkkknkjn', NULL, NULL, NULL, 'Tur', '', 'njnj', 'j88080989', 'nkjknkn', 'jjkjlj', 'jkjkl', NULL, 'mlmlm', 'mklmlm', NULL, 'mmlmlm', '2025-09-25 03:20:18', '2025-09-25 03:20:18'),
(25, 'joiioijjioo', NULL, NULL, NULL, 'Hayo', '', 'hhhh', '0988', 'khihui', 'hhkhn', 'hohoihj', NULL, 'jijio', 'jiooiio', NULL, 'jioio', '2025-09-25 19:25:13', '2025-09-25 19:25:13'),
(26, 'nkjnjkn', '2025-10-09', NULL, NULL, 'jojoi', '', 'iojjio', 'j8908809', 'jn', 'jjkj', 'kjkj', NULL, 'kjk', 'jj', NULL, 'ljk', '2025-09-25 19:25:51', '2025-09-25 19:25:51'),
(27, 'jjl', '2025-09-19', NULL, NULL, 'kjk', '', 'kjjkjkk', '8998980', 'hhhuhj', 'khkhhhj', 'hhhhjhih', NULL, 'ijiojioj', 'jiojioj', NULL, 'jjooi', '2025-09-25 19:56:48', '2025-09-25 19:56:48'),
(28, 'jjjji', '2025-09-26', NULL, NULL, 'kjjhkjhh', '', 'hkjjjkhj', '8009908', 'klj', 'jjijiojio', 'hjkh', 'jji', 'jiojioo', 'i', NULL, 'jjio', '2025-09-25 20:00:26', '2025-09-25 20:00:26'),
(29, 'dvfvdf', '2025-09-05', NULL, NULL, 'Pak ERwan', '', 'hijhi', '809898', 'nkjnn', 'njknknjk', 'jj', 'jj', 'jjio', 'jji', NULL, 'io', '2025-09-25 20:02:00', '2025-09-25 20:02:00'),
(30, 'ijioio', '2025-10-03', NULL, NULL, 'hjkhi', '', 'ihihiu', '989090', 'khhuhuih', 'hhjioj', 'jijoijiojio', 'jjjiojio', 'jjjioj', 'iojjjio', NULL, 'jji', '2025-09-25 20:02:40', '2025-09-25 20:02:40'),
(31, 'Company', '2025-10-03', NULL, NULL, 'Stella', '', 'Sungai Penuh', '043086259080', 'HP', 'HAUIFSDAE809', 'FODVOJEODI4395R90', 'HP Officejet Pro 5130', 'print failure', 'Dus bawaan', NULL, 'cek ok good best', '2025-09-25 20:21:44', '2025-09-25 20:21:44'),
(32, 'Company', '2025-10-03', '2025-09-30', '2025-09-30', 'Stefer', '', 'Sungai Penuh', '043086259080', 'HP', 'HAUIFSDAE809', 'FODVOJEODI4395R90', 'HP Officejet Pro 5130', 'print failure', 'Dus bawaan', NULL, 'cek ok good best', '2025-09-25 20:23:18', '2025-09-26 03:34:24'),
(34, 'jj', '2025-09-02', '2025-09-18', '2025-09-03', 'Wicaksono', '', 'iojio', 'j', 'huihiui', 'huuhihj', 'hhhh', 'jijio', NULL, 'jiijoj', 'jk', 'jkjkl', '2025-09-25 20:40:18', '2025-09-25 20:40:18'),
(35, 'hohjoi', '2025-10-09', '2025-09-26', '2025-09-26', 'Tadisa', '', 'jhu', 'jhjhj', 'hioho', 'jj', 'hhuoho', 'h', 'nlklnj', 'lnljnnj', 'jll', 'lklj', '2025-09-25 20:41:34', '2025-09-25 20:41:34'),
(36, 'ijilj', '2025-10-09', '2025-09-27', '2025-09-27', 'hko', '', 'kjbkbjkb', '878907908', 'kjlkljl', 'jjl', 'kjkkh', 'jnhlhh', 'kjnlkn', 'lkmlm', 'nlkjlkj', 'lnlnlknk', '2025-09-27 01:42:30', '2025-09-27 01:42:30'),
(37, 'jnjkl', '2025-09-27', '2025-09-28', '2025-09-29', 'Acer', '', 'hkh', '8090989', 'kjn l', 'lnjkn', 'kljlkjl', 'jllk', 'hkjhjh', 'jhlhjh', 'kjhkkjh', 'hjhkh', '2025-09-27 01:43:14', '2025-09-27 01:43:14'),
(38, 'huihuih', '2025-09-27', '2025-09-27', '2025-09-30', 'jioiojojoi', '', 'hhijuj', '800998', 'njknjknk', 'hhjh', 'joikoo', 'iojoi', 'iojjiojio', 'ijijoio', 'jioio', 'ioioi', '2025-09-27 22:07:51', '2025-09-27 22:07:51'),
(39, 'Company', '2025-09-30', '2025-09-30', '2025-10-01', 'Fattah', '', 'Jakarta', '403958349', 'HP', 'NJVDF34U8RU43U', 'NFNADJ843UU430', 'HP Designjet 1110 Pro', 'rusak', 'dus bawaan', 'rusak', 'good', '2025-09-29 10:01:15', '2025-09-29 10:01:15'),
(40, 'nadvjon', '2025-09-30', '2025-09-30', '2025-10-01', 'Mas Agung', '', 'jojoijoj', '90809098', 'Lenovo', 'DSCNK909090VJDFN', 'DFVKJXCNVJDU90U90', 'sdnvkjndjk', 'nnoj', 'jnkl', 'lkklj', 'jkljklj', '2025-09-29 18:57:32', '2025-09-29 18:57:32'),
(41, 'Company', '2025-09-30', '2025-10-11', '2025-10-08', 'Pak Farhan', '', 'Gajah', '238048030', 'Acer', 'D S343345', 'JOAFVAIO3409893', 'hfhihvua', 'jo', 'iij', 'jjj', 'kjnjk', '2025-09-29 23:46:32', '2025-09-29 23:46:32'),
(42, 'hihuui', '2025-10-01', '2025-10-01', '2025-10-02', 'Hewlett', '', 'hohh', '897879', 'nininiu', 'jknn', 'jjnjn', 'jkkj', 'njho', 'hbibib', 'kbnjknn', 'jnnk', '2025-09-30 20:53:59', '2025-09-30 20:53:59'),
(43, 'jljlj', '2025-10-10', '2025-10-15', '2025-10-29', 'HP', 'jijijiji', 'kjnknjnjknjnjk', '9888080', 'jn', 'jo', 'jklk', 'kklkl', 'klkl', 'kllkkl', 'kmlm', 'klmk', '2025-10-01 19:46:37', '2025-10-01 19:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
