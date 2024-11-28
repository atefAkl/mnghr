-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2024 at 01:55 PM
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
(13, 'Yousra_2', 'yousra@ziad.com', NULL, '$2y$12$w/rz.vSa5Z4j2lDSzE4nBeyhv472wCLaWgjzFD4XJzHgtZTMNY4g.', 'GTBgR2W5szLQGgDkYKPbkCrmMlZlUQ7ZcQny3nJnYeX6nMw5nsefo2VCcOrP', 1, NULL, 9, '2024-10-19 16:59:40', '2024-10-28 12:22:09'),
(14, 'Yousra', 'yousra@gmail.com', NULL, '$2y$12$Q4tJjZNEnI8z8tCKO1ouhek7nJ4N7U9pisO8hP91xStRns2q2UAuy', NULL, 1, NULL, NULL, '2024-10-19 16:53:27', '2024-10-19 16:57:33'),
(15, 'helloWorld', 'hello@worls.glob', NULL, '$2y$12$MZzqXxdnPYjfYTaGAg7pXOd813NGpLznqIf/V18HhEznriEk4xlGi', NULL, 1, NULL, NULL, '2024-10-24 14:34:54', '2024-10-24 14:34:54'),
(16, 'Ali Atef', 'aliatef@gmail.com', NULL, '$2y$12$OOTayqNuuLNLNRuAzKpMTuLAits5g8/Jtt4LmXQNV9XrYMtWVhNnW', NULL, 1, NULL, 9, '2024-10-19 17:02:08', '2024-10-30 14:25:47'),
(17, 'AtefAql', 'atetfakl80@gmail.com', NULL, '$2y$10$kecu7KnCtrXOTi1jGIg85epBIngENBsm27iUC/BLSTtMx96HlzIze', NULL, 1, NULL, NULL, '2024-10-20 14:59:59', '2024-10-20 14:59:59'),
(18, 'Atef Moh', 'atefakl803@gmail.com', NULL, '$2y$12$AN1E6C8djBPMdrWbaQmgjOrhzFpJPrrQEQ1JbBILRWJezwJr33xMe', NULL, 1, NULL, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_profiles`
--

INSERT INTO `admins_profiles` (`id`, `first_name`, `last_name`, `phone`, `gender`, `possition`, `address`, `image`, `dob`, `user_id`, `natId`, `created_at`, `updated_at`) VALUES
(10, 'Yousra', 'Ziad', '00966548676841', 0, '', '{\"street\":\"123\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-02-19', 2, '2488802741', '2024-10-19 16:53:27', '2024-10-28 11:03:33'),
(11, 'Yousra', 'Ziad', '00966548145241', 1, '', '{\"street\":\"1233\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-12-02', 3, '2488802741', '2024-10-19 16:59:40', '2024-10-28 10:51:08'),
(12, 'AtefAql', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 5, NULL, '2024-10-20 14:59:59', '2024-10-20 14:59:59'),
(13, 'Ali', 'Atef', '', 0, '', '{\"street\":\"adsf\",\"city\":\"sgdf\",\"state\":\"fsdg\",\"postal_code\":\"sfgd\",\"country\":\"14\"}', 'default.user.profile.png', '2019-11-09', 6, NULL, '2024-10-24 14:34:54', '2024-10-30 14:25:47'),
(14, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 7, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52'),
(15, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 9, NULL, '2024-10-25 08:48:52', '2024-10-25 08:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` tinyint DEFAULT NULL,
  `breif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `unit` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `barcode`, `name`, `serial`, `breif`, `category`, `unit`, `status`, `image`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, '1122', 'Orange', NULL, 'Orange', 1, 1, NULL, 'product29.jpg', '2024-11-27 11:50:21', 13, 1, '2024-11-27 11:50:21'),
(2, '1122', 'Strawberry', NULL, 'Strawberry', 1, 1, NULL, 'product31.jpg', '2024-11-27 11:50:21', 13, NULL, '2024-11-27 11:50:21'),
(3, '1122', 'Banana', NULL, 'Banana', 1, 1, NULL, 'product35.jpg', '2024-11-27 11:50:21', 13, NULL, '2024-11-27 11:50:21'),
(4, '1122', 'Limon', NULL, 'Limon', 1, 1, NULL, 'product37.jpg', '2024-11-27 11:50:21', 13, NULL, '2024-11-27 11:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `items_categories`
--

DROP TABLE IF EXISTS `items_categories`;
CREATE TABLE IF NOT EXISTS `items_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `parent` bigint UNSIGNED DEFAULT NULL,
  `brief` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `name`, `parent`, `brief`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Fruits', 1, 'Fruits', 1, 13, '2024-11-25 12:13:55', '2024-11-25 12:13:55', NULL),
(2, 'Fruits', 1, 'Shoes', 1, 13, '2024-11-25 12:14:47', '2024-11-25 12:14:47', NULL),
(5, 'Citrus Fruits', 2, 'Citrus Fruits', 1, 13, '2024-11-27 19:13:40', '2024-11-27 19:13:40', NULL),
(7, 'Fresh Fruits', 5, NULL, 0, 13, '2024-11-27 19:17:54', '2024-11-27 19:17:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xtVqx2XgKhmQ09cGUEZfte8b6b2jtLE0oGy0XR0Z', 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnFVUDhGT3luSEE3VmRtRTk3S05vNGxVek1WaVBuT0xpc2d1SWZZUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly93d3cuZXJwLnRlc3QvYWRtaW4vaXRlbXMvaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1732793144),
('G3xIpLLK3fiptXypnq34V5UmZK5ud4fdH1v71Y16', 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:67.0) Gecko/20100101 Firefox/67.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWwxeXpDaERHc2VUTXVBam5FbFFQSVhjaFl2QkZKaGhqOGdDc0kxTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly93d3cuZXJwLnRlc3QvYWRtaW4vaXRlbXMvaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1732787527),
('SzF4rVrgOgJYN2QSCiW6OqJLzJvtslevGQ5tRFNe', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:67.0) Gecko/20100101 Firefox/67.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXlxMm81MFJsMHl5U2NVcEFSTmFYT0NhVlhMYTJ4SU5Hc09ZRlg4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly93d3cuZXJwLnRlc3QvYWRtaW4vaXRlbXMvaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732787803);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `brief` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
