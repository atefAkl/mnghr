-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2024 at 02:05 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayerp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 'Yousra_2', 'yousra@ziad.com', NULL, '$2y$10$Vt0rWKOQTOAJseYjVVhwweYvjG4dC2J6PsSUAy.vbGs5JNu/ATJBW', 'FmWePmRHtbVekSNjFG6leuHH5h5nx0wa0Fe0gAU6gsOhg7bwerZGnwcYQXn8', 1, NULL, 9, '2024-10-19 16:59:40', '2024-11-25 16:02:49'),
(14, 'Yousra', 'yousra@gmail.com', NULL, '$2y$12$Q4tJjZNEnI8z8tCKO1ouhek7nJ4N7U9pisO8hP91xStRns2q2UAuy', NULL, 1, NULL, NULL, '2024-10-19 16:53:27', '2024-10-19 16:57:33'),
(15, 'helloWorld', 'hello@worls.glob', NULL, '$2y$12$MZzqXxdnPYjfYTaGAg7pXOd813NGpLznqIf/V18HhEznriEk4xlGi', NULL, 1, NULL, NULL, '2024-10-24 14:34:54', '2024-10-24 14:34:54'),
(16, 'Ali Atef', 'aliatef@gmail.com', NULL, '$2y$12$OOTayqNuuLNLNRuAzKpMTuLAits5g8/Jtt4LmXQNV9XrYMtWVhNnW', NULL, 1, NULL, 9, '2024-10-19 17:02:08', '2024-10-30 14:25:47'),
(17, 'AtefAql', 'atetfakl80@gmail.com', NULL, '$2y$10$SdEtIDbJbAzs/zezybroeu83NrQls2W4dnDtnEbQjeDjij2npoVlO', NULL, 1, NULL, NULL, '2024-10-20 14:59:59', '2024-10-20 14:59:59'),
(18, 'Atef Moh', 'atefakl803@gmail.com', NULL, '$2y$12$AN1E6C8djBPMdrWbaQmgjOrhzFpJPrrQEQ1JbBILRWJezwJr33xMe', NULL, 1, NULL, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52'),
(19, 'Atef Aql', 'atefaql@gmail.com', NULL, '$2y$10$sUKvnB5SGl051Dy931hkr.He3I6chBXaDJUaKRqObEWpk6kyWNmn2', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins_profiles`
--

DROP TABLE IF EXISTS `admins_profiles`;
CREATE TABLE IF NOT EXISTS `admins_profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `possition` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `natId` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_profiles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_profiles`
--

INSERT INTO `admins_profiles` (`id`, `first_name`, `last_name`, `phone`, `gender`, `possition`, `address`, `image`, `dob`, `user_id`, `natId`, `created_at`, `updated_at`) VALUES
(10, 'Yousra', 'Ziad', '00966548676841', 0, '', '{\"street\":\"123\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-02-19', 2, '2488802741', '2024-10-19 16:53:27', '2024-10-28 11:03:33'),
(11, 'Yousra', 'Ziad', '00966548145241', 1, '', '{\"street\":\"1233\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-12-02', 3, '2488802741', '2024-10-19 16:59:40', '2024-10-28 10:51:08'),
(12, 'AtefAql', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 5, NULL, '2024-10-20 14:59:59', '2024-10-20 14:59:59'),
(13, 'Ali', 'Atef', '', 0, '', '{\"street\":\"adsf\",\"city\":\"sgdf\",\"state\":\"fsdg\",\"postal_code\":\"sfgd\",\"country\":\"14\"}', 'default.user.profile.png', '2019-11-09', 6, NULL, '2024-10-24 14:34:54', '2024-10-30 14:25:47'),
(14, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 7, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52'),
(15, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 9, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52'),
(16, 'Yousra', 'Ziad', '00966548676841', 0, '', '{\"street\":\"123\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-02-19', 13, '2488802741', '2024-10-19 16:53:27', '2024-10-28 11:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ismain` tinyint(1) DEFAULT '0',
  `branch_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `phone`, `email`, `ismain`, `branch_code`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Branch 20330ABG', 'Egypt, Cairo, Helwan, 12 Ahmed Unsi st.,', '00201020304051', 'company_depart@domain.com', NULL, '1501202400002', 13, 13, '2024-11-27 09:47:01', '2024-11-27 13:53:43'),
(2, 'Main Branch', 'Egypt, Alexandria, El Agami, 12 Mousa Edris st.,', '00201020304050', 'company@domain.com', 0, '1501202400001', 13, 13, '2024-11-27 12:09:03', '2024-11-27 13:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` tinyint DEFAULT NULL,
  `breif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `unit_id` (`unit_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `barcode`, `name`, `serial`, `breif`, `category_id`, `unit_id`, `status`, `image`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, '1122', 'Orange', NULL, 'Orange', 7, 1, NULL, 'product29.jpg', '2024-11-27 11:50:21', 13, 13, '2024-11-27 11:50:21'),
(2, '1122', 'Strawberry', NULL, 'Strawberry', 7, 1, NULL, 'product31.jpg', '2024-11-27 11:50:21', 13, 13, '2024-11-27 11:50:21'),
(3, '1122', 'Banana', NULL, 'Banana', 7, 1, NULL, 'product35.jpg', '2024-11-27 11:50:21', 13, 13, '2024-11-27 11:50:21'),
(4, '1122', 'Limon', NULL, 'Limon', 7, 1, NULL, 'product37.jpg', '2024-11-27 11:50:21', 13, 13, '2024-11-27 11:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `items_categories`
--

DROP TABLE IF EXISTS `items_categories`;
CREATE TABLE IF NOT EXISTS `items_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `name`, `parent_id`, `brief`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Fruits', 1, 'Fruits', 1, 13, '2024-11-25 12:13:55', '2024-11-25 12:13:55', NULL),
(2, 'Shoes', 1, 'Shoes', 1, 13, '2024-11-25 12:14:47', '2024-11-25 12:14:47', NULL),
(5, 'Citrus Fruits', 2, 'Citrus Fruits', 1, 13, '2024-11-27 19:13:40', '2024-11-27 19:13:40', NULL),
(7, 'Fresh Fruits', 5, NULL, 1, 13, '2024-11-27 19:17:54', '2024-11-27 19:17:54', NULL),
(10, 'Damaged Fruits', 5, 'Physical Products', 1, 13, '2024-11-29 10:46:51', '2024-11-29 10:46:51', NULL),
(11, 'Dry Fruits', 5, 'Dry Product', 1, 13, '2024-11-29 10:47:20', '2024-11-29 10:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_23_145349_create_admins_table', 1),
(6, '2024_11_23_164620_create_item_categroys_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `admin_id`, `brief`, `code`, `store_id`, `phone`, `email`, `branch_id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'store_123', NULL, 13, 'Home Delivery', NULL, NULL, '0245678955', 'yousra@gmail.com', 1, 1, 13, '2024-11-27 16:54:06', 13, '2024-11-28 14:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `brief`, `short_name`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'meter', 'meter', 'm', 1, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `items_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `items_ibfk_4` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
