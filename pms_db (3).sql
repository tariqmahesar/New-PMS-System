-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 10:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_designs`
--

CREATE TABLE `approved_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `designerid` int(11) DEFAULT NULL,
  `designid` int(11) DEFAULT NULL,
  `sectionid` int(11) DEFAULT NULL,
  `approved_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approved_designs`
--

INSERT INTO `approved_designs` (`id`, `userid`, `designerid`, `designid`, `sectionid`, `approved_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, '1', 1, '2022-03-22 07:49:44', '2022-03-22 07:49:44'),
(2, 3, 2, 1, 2, '1', 1, '2022-03-22 14:30:36', '2022-03-22 14:30:36'),
(3, 3, 6, 1, 4, '0', 1, '2022-03-22 14:32:16', '2022-03-22 14:32:34'),
(4, 3, 2, 2, 7, '1', 1, '2022-03-22 14:45:06', '2022-03-22 14:45:06'),
(5, 3, 2, 2, 8, '1', 1, '2022-03-22 14:45:13', '2022-03-22 14:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_count` int(11) DEFAULT NULL,
  `category_package_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `section_count`, `category_package_type`, `slug`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 3, NULL, NULL, 1, '2022-03-22 07:43:57', '2022-03-22 07:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `categorysections`
--

CREATE TABLE `categorysections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designid` int(10) UNSIGNED DEFAULT NULL,
  `userid` int(10) UNSIGNED DEFAULT NULL,
  `section` int(10) UNSIGNED DEFAULT NULL,
  `sections_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_sections_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorysections`
--

INSERT INTO `categorysections` (`id`, `designid`, `userid`, `section`, `sections_name`, `imagepath`, `image`, `category_sections_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'Section 1', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322124828.163925525961b50cdba532d.jpg', 0, '2022-03-22 07:47:47', '2022-03-22 07:48:28'),
(2, 1, 2, 2, 'Section 2', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322124828.163925531961b50d1787709.jpg', 0, '2022-03-22 07:47:48', '2022-03-22 07:48:28'),
(3, 1, 2, 3, 'Section 3', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322124828.163925534361b50d2f203d0.jpg', 0, '2022-03-22 07:47:48', '2022-03-22 07:48:28'),
(4, 1, 6, 1, 'Section 1', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322172955.g-1163897422442.png', 0, '2022-03-22 12:29:55', '2022-03-22 12:29:55'),
(5, 1, 6, 2, 'Section 2', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322172955.g-2163897423754.png', 0, '2022-03-22 12:29:55', '2022-03-22 12:29:55'),
(6, 1, 6, 3, 'Section 3', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322172955.g-26163897468118.png', 0, '2022-03-22 12:29:55', '2022-03-22 12:29:55'),
(7, 2, 2, 1, 'Section 1', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322194418.gallery_6163897407619.png', 0, '2022-03-22 14:44:18', '2022-03-22 14:44:18'),
(8, 2, 2, 2, 'Section 2', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322194418.image0164486181312.jpeg', 0, '2022-03-22 14:44:18', '2022-03-22 14:44:18'),
(9, 2, 2, 3, 'Section 3', 'C:\\xampp-7.4\\htdocs\\pms_dev\\printout-management-system\\public/adminTheme/uploads/sectionFiles', '20220322194418.about-banner163896968539.png', 0, '2022-03-22 14:44:18', '2022-03-22 14:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `designfiles`
--

CREATE TABLE `designfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designid` int(11) DEFAULT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `design_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `categoryid`, `userid`, `design_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Chocolate box', 1, '2022-03-22 07:44:32', '2022-03-22 07:44:32'),
(2, 1, 1, 'Chocolate box 2', 1, '2022-03-22 14:38:59', '2022-03-22 14:38:59');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_03_04_165721_create_categories_table', 1),
(6, '2022_03_09_144035_create_designs_table', 1),
(7, '2022_03_10_153116_create_designfiles_table', 1),
(8, '2022_03_13_183455_create_categorysections_table', 1),
(9, '2022_03_19_191706_create_approved_designs_table', 2),
(10, '2022_03_21_144000_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `designid` int(11) DEFAULT NULL,
  `sectionid` int(11) DEFAULT NULL,
  `managerid` int(11) DEFAULT NULL,
  `notificatoin_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `designid`, `sectionid`, `managerid`, `notificatoin_comment`, `read_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 3, 'Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it', 0, 1, NULL, '2022-03-22 07:51:13'),
(2, 2, 1, 2, 3, 'Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it', 0, 1, NULL, '2022-03-22 14:44:26'),
(3, 2, 1, 4, 3, 'Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it', 0, 1, NULL, '2022-03-22 14:44:40'),
(4, 2, 2, 7, 3, 'Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it', 0, 1, NULL, '2022-03-22 14:45:31'),
(5, 2, 2, 8, 3, 'Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it', 0, 1, NULL, '2022-03-22 14:45:35');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
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

INSERT INTO `users` (`id`, `name`, `phone`, `user_type`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123456789132467', 'Admin', 1, 'admin@gmail.com', NULL, '$2y$10$h0OEpxmTJdAYVW89jullhOohlyv9F1SaQln2Lv30kaP53pOSNJziG', NULL, '2022-03-14 07:05:06', '2022-03-15 09:08:29'),
(2, 'designer', '1213213213139', 'Designer', 1, 'designer@gmail.com', NULL, '$2y$10$h0OEpxmTJdAYVW89jullhOohlyv9F1SaQln2Lv30kaP53pOSNJziG', NULL, '2022-03-14 14:14:23', '2022-03-15 09:08:35'),
(3, 'manager', '123456789', 'Manager', 1, 'manager@gmail.com', NULL, '$2y$10$h0OEpxmTJdAYVW89jullhOohlyv9F1SaQln2Lv30kaP53pOSNJziG', NULL, '2022-03-15 08:26:14', '2022-03-15 08:26:14'),
(5, 'manager 2', '03458990077', 'Manager', 1, 'manager2@gmail.com', NULL, '$2y$10$RWdLoCPmsn.B8l4C76eG.uWJMNU/BqJtROQTFTi51dinYoDtl7qaC', NULL, '2022-03-19 10:12:51', '2022-03-19 10:43:52'),
(6, 'designer2', '12345678913246', 'Designer', 1, 'designer2@gmail.com', NULL, '$2y$10$/XNKWSCRk3fJFbssG4XSme/KXFmPDWzWIFidmeKqPGvl8THQnsDWK', NULL, '2022-03-21 16:20:24', '2022-03-21 16:42:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_designs`
--
ALTER TABLE `approved_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorysections`
--
ALTER TABLE `categorysections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designfiles`
--
ALTER TABLE `designfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_designs`
--
ALTER TABLE `approved_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorysections`
--
ALTER TABLE `categorysections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designfiles`
--
ALTER TABLE `designfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
