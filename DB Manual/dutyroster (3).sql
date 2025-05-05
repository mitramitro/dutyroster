-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2025 at 07:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dutyroster`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `jabatan`, `fungsi`, `location_id`, `nohp`, `photo`, `created_at`, `updated_at`) VALUES
(4, 'Dewi Anggraini', 'SSGA/QQ Supervisor', 'SSGA/QQ', 1, '081666667890', NULL, '2025-03-29 06:32:43', '2025-03-29 06:32:43'),
(9, 'Bayu', 'Sr Supervisor II HSSE & Fleet Safety', 'Manager', 1, '081321321321', 'photos/oguSgiP0Mq8optDZGq8BEfktq4q6lIYDLcS2akHu.png', '2025-03-29 07:30:07', '2025-03-29 07:30:07'),
(10, 'Muhammad Bagas', 'Jr.Spv Sales & Distribution Verification', 'SSGA/QQ', 1, '087872621433', NULL, '2025-04-04 09:16:56', '2025-04-04 09:16:56'),
(12, 'Arfianto Trisnawan', 'Shift Supervisor II HSSE', 'Manager', 1, '085729548999', 'photos/70SPuFJs0R2NERON5sFwQ1PRZZ2x4FoJAAfesCBm.jpg', '2025-04-04 10:28:42', '2025-04-04 10:28:42'),
(14, 'Julianto Adi Saputro', 'Sr Spv I Maintenance Planning & Serv.', 'MPS', 1, '081325981414', NULL, '2025-04-04 10:38:33', '2025-04-04 10:38:33'),
(15, 'Albert', 'Sr Supervisor Fuel Receiving & Storage', 'RSD', 1, '-', NULL, '2025-04-04 10:39:20', '2025-04-04 10:39:20'),
(16, 'Herdi Fitriyadi', 'Sr Supervisor Fuel Receiving & Storage', 'RSD', 1, '-', NULL, '2025-04-04 10:39:48', '2025-04-04 16:21:54'),
(17, 'Savero Kharismawan', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD', 1, '081321698378', NULL, '2025-04-04 10:40:35', '2025-04-04 10:40:35'),
(18, 'Citra Christian Parulian', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD', 1, '081210954987', 'photos/qid9UPP5eqIGmGjwReY1atOlICz09ZAHSnsJnn99.png', '2025-04-04 10:42:12', '2025-04-04 15:57:05'),
(19, 'Arfianto Trisnawan', 'Shift Supervisor II HSSE', 'HSSE', 1, '085729548999', 'photos/xdeHIwO7X066ZynaL2GRB4j6IwtvrSq8CS5YSPd7.png', '2025-04-04 10:42:50', '2025-04-04 15:52:51'),
(23, 'Arie Mulyana', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD', 1, '085624108432', NULL, '2025-04-04 16:23:17', '2025-04-11 16:31:58'),
(24, 'Saybani', 'Superitendent LPG RSD Balongan', 'Manager', 1, '08117813837', 'photos/oOIw4UfA9eIMSx4Zb9pLawy1debhJT5FUYKYIau7.jpg', '2025-04-04 16:28:01', '2025-04-04 16:28:01'),
(25, 'Bayu Wafiudin', 'Jr Spv I Fleet Safety', 'HSSE', 1, '085158904230', NULL, '2025-04-04 16:29:26', '2025-04-04 16:29:26'),
(26, 'Yulianasari', 'Jr Supervisor Quality & Quantity', 'SSGA/QQ', 1, '081259905898', NULL, '2025-04-04 16:30:05', '2025-04-04 16:30:05'),
(27, 'Firman F', 'Sr Supervisor Fuel Receiving & Storage', 'RSD', 1, '-', NULL, '2025-04-04 16:30:47', '2025-04-04 16:31:48'),
(28, 'Ardiansah', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD', 1, '081367708886', NULL, '2025-04-04 16:34:49', '2025-04-11 16:33:14'),
(29, 'Erlangga P', 'Sr Supervisor Fuel Receiving & Storage', 'RSD', 1, '-', NULL, '2025-04-04 16:35:40', '2025-04-04 16:35:40'),
(30, 'Ismin Nuryadin', 'Pengawas Teknik', 'Manager', 1, '081342101140', 'photos/0LVr7bpas9ilybVJJ4zun2iLzr7XN3737RWmSo1Q.png', '2025-04-11 16:21:43', '2025-04-11 16:39:09'),
(31, 'Rahma Laili', 'Supervisor I HSSE Operation', 'HSSE', 1, '087785061746', NULL, '2025-04-11 16:23:23', '2025-04-11 16:36:21'),
(32, 'Ahmad Alhafif J.', 'MPS', 'MPS', 1, '085267231777', NULL, '2025-04-11 16:24:06', '2025-04-11 16:36:44'),
(33, 'Endrou', 'CR', 'RSD', 1, '0876743434', NULL, '2025-04-11 16:26:34', '2025-04-11 16:26:34'),
(34, 'Fernadi', 'CR', 'RSD', 1, '08774564', NULL, '2025-04-11 16:26:54', '2025-04-11 16:26:54'),
(35, 'Savero', 'CR', 'RSD', 1, '087678567', NULL, '2025-04-11 16:27:34', '2025-04-11 16:27:34'),
(37, 'Dwijo', 'CR', 'RSD', 1, '087978', NULL, '2025-04-11 16:30:46', '2025-04-11 16:30:46'),
(38, 'Firman', 'CR', 'RSD Fuel Sore', 1, '0989089', NULL, '2025-04-11 16:31:21', '2025-04-11 16:31:21'),
(39, 'Muhammad Wahyu', 'Sr.Spv Quality & Quantity', 'Manager', 1, '0813-6710-2764', 'photos/TpMGQOt2kmgHkXnmbHaJTmxcj3ECzMPuBU9FkrFc.jpg', '2025-04-17 11:04:24', '2025-04-17 11:04:24'),
(40, 'Yudo Tri Permono', 'Pjs.Sr.Spv Fuel RSD', 'Manager', 1, '0813-9104-6464', 'photos/vPKaTQoftqlsLoogI4iIxCqqxMXaEHsSveVjJ3vr.jpg', '2025-04-17 11:05:41', '2025-04-17 11:05:41'),
(41, 'AHMAD ALHAFIF J', 'Sr Spv I Maintenance Planning & Serv.', 'MPS', 1, '0852-6723-1777', NULL, '2025-04-17 11:08:18', '2025-04-17 11:08:18'),
(42, 'Adisti Intan Siskarani', 'Jr. Spv. I Retail Fuel Sales Services', 'SSGA/QQ', 1, '087833396082', NULL, '2025-04-17 11:15:26', '2025-04-17 11:15:26'),
(43, 'Fernadi', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Pagi', 1, '-', NULL, '2025-04-17 11:15:53', '2025-04-17 11:15:53'),
(44, 'Dwijo W / Albert G', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Sore', 1, '-', NULL, '2025-04-17 11:16:29', '2025-04-17 11:16:29'),
(46, 'Ilham Maulana', 'Jr.Spv Sales & Distribution Verification', 'SSGA/QQ', 1, '089605420072', NULL, '2025-04-17 11:20:25', '2025-04-17 11:20:25'),
(47, 'Erlangga', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Pagi', 1, '-', NULL, '2025-04-17 11:21:13', '2025-04-17 11:21:13'),
(48, 'Herdi/ Dwijo', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Sore', 1, '-', NULL, '2025-04-17 11:26:10', '2025-04-17 11:26:10'),
(49, 'Savero Kharismawan', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD LPG Pagi', 1, '-', NULL, '2025-04-17 11:26:34', '2025-04-17 11:26:34'),
(50, 'Muhammad Wahyu', 'Sr.Spv Quality & Quantity', 'SSGA/QQ', 1, '081367102764', NULL, '2025-04-17 11:27:37', '2025-04-17 11:27:37'),
(51, 'Herdi F', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Pagi', 1, '-', NULL, '2025-04-17 11:28:13', '2025-04-17 11:28:13'),
(52, 'Erlangga P / Dwijo W', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Sore', 1, '-', NULL, '2025-04-17 11:28:40', '2025-04-17 11:28:40'),
(53, 'Citra Christian Parulian', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD LPG Pagi', 1, '-', NULL, '2025-04-17 11:29:04', '2025-04-17 11:29:04'),
(54, 'Anton Rudianto', 'Supervisor II Fleet', 'Manager', 1, '0821-1625-1983', 'photos/yGsoMWPyuv28wO7R6JhPaesP6OLXpmAlJzJMZwJN.jpg', '2025-04-25 15:10:55', '2025-04-25 15:10:55'),
(55, 'Arie Mulyana', 'Sr Spv I LPG Receiving & Sto. Balongan', 'RSD LPG Pagi', 1, '-', NULL, '2025-04-25 15:11:53', '2025-04-25 15:11:53'),
(56, 'Fernadi/Albert', 'Sr Supervisor Fuel Receiving & Storage', 'RSD Fuel Sore', 1, '-', NULL, '2025-04-25 15:12:28', '2025-04-25 15:12:28'),
(57, 'A.Fachrurrizal', 'Sr Supervisor Fuel Receiving & Storage', 'RSD', 1, '-', NULL, '2025-04-25 15:15:13', '2025-05-05 05:43:19'),
(58, 'test', 'Sr Supervisor RSD', 'Manager', 1, '081321321321', 'photos/b0hI8kLfuYDpURIfhkU3mAe4lgUJY5YVr9GXEGTl.png', '2025-05-05 05:44:00', '2025-05-05 05:45:21');

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Integrated Terminal Balongan', '2025-03-29 06:32:43', '2025-03-29 06:32:43'),
(2, 'Integrated Terminal Jakarta', '2025-03-29 06:32:43', '2025-03-29 06:32:43'),
(3, 'Fuel Terminal Cikampek', '2025-03-29 06:32:43', '2025-03-29 06:32:43');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_25_025950_create_locations_table', 1),
(6, '2025_03_25_032944_create_employees_table', 1),
(7, '2025_03_25_163246_create_on_duty_rosters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `on_duty_rosters`
--

CREATE TABLE `on_duty_rosters` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `manager_on_duty_id` bigint UNSIGNED NOT NULL,
  `hsse_pagi_id` bigint UNSIGNED DEFAULT NULL,
  `hsse_sore_id` bigint UNSIGNED DEFAULT NULL,
  `mps_id` bigint UNSIGNED NOT NULL,
  `ssga_qq_id` bigint UNSIGNED NOT NULL,
  `rsd_fuel_pagi_id` bigint UNSIGNED NOT NULL,
  `rsd_fuel_sore_id` bigint UNSIGNED NOT NULL,
  `rsd_lpg_pagi_id` bigint UNSIGNED NOT NULL,
  `rsd_lpg_sore_id` bigint UNSIGNED NOT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `on_duty_rosters`
--

INSERT INTO `on_duty_rosters` (`id`, `tanggal`, `location_id`, `manager_on_duty_id`, `hsse_pagi_id`, `hsse_sore_id`, `mps_id`, `ssga_qq_id`, `rsd_fuel_pagi_id`, `rsd_fuel_sore_id`, `rsd_lpg_pagi_id`, `rsd_lpg_sore_id`, `publish`, `created_at`, `updated_at`) VALUES
(6, '2025-04-04', 1, 12, 19, 31, 14, 10, 15, 16, 17, 18, 'no', '2025-04-04 10:43:18', '2025-05-05 06:19:29'),
(7, '2025-04-05', 1, 12, 19, 25, 14, 10, 15, 16, 17, 18, 'no', '2025-04-04 16:07:48', '2025-05-05 06:19:29'),
(8, '2025-04-04', 1, 12, 19, 31, 14, 10, 15, 16, 23, 18, 'no', '2025-04-04 16:23:54', '2025-05-05 06:19:29'),
(9, '2025-04-06', 1, 24, 25, 19, 14, 26, 15, 27, 17, 18, 'no', '2025-04-04 16:32:21', '2025-05-05 06:19:29'),
(10, '2025-04-07', 1, 24, 25, 31, 14, 26, 29, 27, 17, 28, 'no', '2025-04-04 16:36:19', '2025-05-05 06:19:29'),
(11, '2025-04-12', 1, 30, 31, 25, 32, 10, 37, 38, 28, 23, 'no', '2025-04-11 16:34:50', '2025-05-05 06:19:29'),
(12, '2025-04-13', 1, 30, 31, 19, 32, 26, 33, 34, 28, 35, 'no', '2025-04-11 16:35:30', '2025-05-05 06:19:29'),
(13, '2025-04-18', 1, 40, 31, 25, 32, 42, 43, 44, 17, 18, 'no', '2025-04-17 11:30:13', '2025-05-05 06:19:29'),
(16, '2025-04-26', 1, 54, 19, 31, 14, 10, 43, 56, 55, 35, 'no', '2025-04-25 15:13:27', '2025-05-05 06:19:29'),
(17, '2025-04-27', 1, 54, 19, 25, 14, 46, 57, 16, 55, 35, 'no', '2025-04-25 15:16:00', '2025-05-05 06:19:29'),
(18, '2025-05-05', 1, 24, 19, 31, 14, 42, 17, 23, 28, 15, 'no', '2025-05-05 04:53:55', '2025-05-05 06:19:29'),
(19, '2025-05-06', 1, 30, 19, 31, 32, 42, 16, 29, 33, 34, 'published', '2025-05-05 05:38:22', '2025-05-05 06:19:29'),
(20, '2025-05-07', 1, 58, 19, 19, 14, 26, 29, 34, 35, 37, 'no', '2025-05-05 05:45:07', '2025-05-05 06:19:29');

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `office`, `position`, `nohp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$BAJWvkWyciz6CtmLK4j/J.KXvDGCcijdeEnV9.ClZWGdKtkh/Ol7m', 'Admin', '303u77KNal@gmail.com', 'Integrated Terminal Balongan', 'officer', '085234234234', 'admin', NULL, NULL),
(2, 'balongan', '$2y$10$mNcPj6M9gBxCF9Q/yT892e3R217zgV4MNH5vgpaOQJPFYLfU0lGkW', 'Duty Roster Balongan', 'balongan@gmail.com', 'Integrated Terminal Balongan', NULL, '085222000138', 'user', '2025-03-29 06:34:27', '2025-03-29 06:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_nama_lokasi_unique` (`nama_lokasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_duty_rosters`
--
ALTER TABLE `on_duty_rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `on_duty_rosters_location_id_foreign` (`location_id`),
  ADD KEY `on_duty_rosters_manager_on_duty_id_foreign` (`manager_on_duty_id`),
  ADD KEY `on_duty_rosters_hsse_id_foreign` (`hsse_pagi_id`),
  ADD KEY `on_duty_rosters_mps_id_foreign` (`mps_id`),
  ADD KEY `on_duty_rosters_ssga_qq_id_foreign` (`ssga_qq_id`),
  ADD KEY `on_duty_rosters_rsd_fuel_pagi_id_foreign` (`rsd_fuel_pagi_id`),
  ADD KEY `on_duty_rosters_rsd_fuel_sore_id_foreign` (`rsd_fuel_sore_id`),
  ADD KEY `on_duty_rosters_rsd_lpg_pagi_id_foreign` (`rsd_lpg_pagi_id`),
  ADD KEY `on_duty_rosters_rsd_lpg_sore_id_foreign` (`rsd_lpg_sore_id`),
  ADD KEY `hsse_sore_id` (`hsse_sore_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `on_duty_rosters`
--
ALTER TABLE `on_duty_rosters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `on_duty_rosters`
--
ALTER TABLE `on_duty_rosters`
  ADD CONSTRAINT `on_duty_rosters_hsse_id_foreign` FOREIGN KEY (`hsse_pagi_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_manager_on_duty_id_foreign` FOREIGN KEY (`manager_on_duty_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_mps_id_foreign` FOREIGN KEY (`mps_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_rsd_fuel_pagi_id_foreign` FOREIGN KEY (`rsd_fuel_pagi_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_rsd_fuel_sore_id_foreign` FOREIGN KEY (`rsd_fuel_sore_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_rsd_lpg_pagi_id_foreign` FOREIGN KEY (`rsd_lpg_pagi_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_rsd_lpg_sore_id_foreign` FOREIGN KEY (`rsd_lpg_sore_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `on_duty_rosters_ssga_qq_id_foreign` FOREIGN KEY (`ssga_qq_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
