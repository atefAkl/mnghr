-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2025 at 08:18 AM
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
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_uuid` varchar(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`, `batch_uuid`) VALUES
(3, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-20 16:02:41', '2024-12-20 16:02:41', NULL),
(4, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-20 16:04:16', '2024-12-20 16:04:16', NULL),
(5, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-20 16:05:03', '2024-12-20 16:05:03', NULL),
(6, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-20 16:06:19', '2024-12-20 16:06:19', NULL),
(7, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-20 16:16:08', '2024-12-20 16:16:08', NULL),
(8, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-20 16:29:08', '2024-12-20 16:29:08', NULL),
(9, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-20 16:29:23', '2024-12-20 16:29:23', NULL),
(10, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-20 17:58:49', '2024-12-20 17:58:49', NULL),
(11, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-21 14:48:03', '2024-12-21 14:48:03', NULL),
(12, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-21 15:48:15', '2024-12-21 15:48:15', NULL),
(13, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-22 15:53:36', '2024-12-22 15:53:36', NULL),
(14, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 16, NULL, NULL, '[]', '2024-12-22 15:53:48', '2024-12-22 15:53:48', NULL),
(15, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-27 14:10:39', '2024-12-27 14:10:39', NULL),
(16, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-27 14:19:18', '2024-12-27 14:19:18', NULL),
(17, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-27 14:19:29', '2024-12-27 14:19:29', NULL),
(18, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-27 15:07:54', '2024-12-27 15:07:54', NULL),
(19, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-27 15:07:58', '2024-12-27 15:07:58', NULL),
(20, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2024-12-27 15:08:59', '2024-12-27 15:08:59', NULL),
(21, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2024-12-29 18:16:09', '2024-12-29 18:16:09', NULL),
(22, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 16, 'App\\Models\\Admin', 16, '[]', '2025-01-01 08:19:27', '2025-01-01 08:19:27', NULL),
(23, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-01 08:19:34', '2025-01-01 08:19:34', NULL),
(24, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-03 04:57:28', '2025-01-03 04:57:28', NULL),
(25, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-03 05:00:50', '2025-01-03 05:00:50', NULL),
(26, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-03 05:00:56', '2025-01-03 05:00:56', NULL),
(27, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-05 14:14:41', '2025-01-05 14:14:41', NULL),
(28, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-05 14:14:45', '2025-01-05 14:14:45', NULL),
(29, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-09 14:04:15', '2025-01-09 14:04:15', NULL),
(30, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-09 14:04:19', '2025-01-09 14:04:19', NULL),
(31, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-12 17:25:46', '2025-01-12 17:25:46', NULL),
(32, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-12 17:26:26', '2025-01-12 17:26:26', NULL),
(33, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-12 18:27:11', '2025-01-12 18:27:11', NULL),
(34, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-18 15:05:23', '2025-01-18 15:05:23', NULL),
(35, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-18 15:06:22', '2025-01-18 15:06:22', NULL),
(36, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-20 16:35:03', '2025-01-20 16:35:03', NULL),
(37, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-21 13:25:48', '2025-01-21 13:25:48', NULL),
(38, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-21 13:31:00', '2025-01-21 13:31:00', NULL),
(39, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-21 13:34:11', '2025-01-21 13:34:11', NULL),
(40, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-21 13:39:57', '2025-01-21 13:39:57', NULL),
(41, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 07:20:45', '2025-01-22 07:20:45', NULL),
(42, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 07:41:03', '2025-01-22 07:41:03', NULL),
(43, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 07:41:56', '2025-01-22 07:41:56', NULL),
(44, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 07:42:06', '2025-01-22 07:42:06', NULL),
(45, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 07:50:40', '2025-01-22 07:50:40', NULL),
(46, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 08:02:26', '2025-01-22 08:02:26', NULL),
(47, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 08:02:58', '2025-01-22 08:02:58', NULL),
(48, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 08:25:03', '2025-01-22 08:25:03', NULL),
(49, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 08:25:08', '2025-01-22 08:25:08', NULL),
(50, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 08:25:59', '2025-01-22 08:25:59', NULL),
(51, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 08:26:03', '2025-01-22 08:26:03', NULL),
(52, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 08:27:04', '2025-01-22 08:27:04', NULL),
(53, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-01-22 08:27:11', '2025-01-22 08:27:11', NULL),
(54, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-01-22 08:51:45', '2025-01-22 08:51:45', NULL),
(55, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-02-25 15:24:48', '2025-02-25 15:24:48', NULL),
(56, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-28 04:14:10', '2025-03-28 04:14:10', NULL),
(57, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-28 04:20:35', '2025-03-28 04:20:35', NULL),
(58, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-28 04:27:28', '2025-03-28 04:27:28', NULL);

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
  `last_login_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_login_ip` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(13, 'Yousra_2', 'yousra@ziad.com', NULL, '$2y$10$Vt0rWKOQTOAJseYjVVhwweYvjG4dC2J6PsSUAy.vbGs5JNu/ATJBW', 'itNLVccWQbISyK9cM7dquMfGSEGzuAbJuHly9WpkMtUfqU95A1UCHRCq1lYa', 1, NULL, 9, '2024-10-19 13:59:40', '2025-03-28 04:27:28', '2025-03-28 07:27:28', '::1'),
(14, 'Yousra', 'yousra@gmail.com', NULL, '$2y$12$Q4tJjZNEnI8z8tCKO1ouhek7nJ4N7U9pisO8hP91xStRns2q2UAuy', NULL, 1, NULL, NULL, '2024-10-19 13:53:27', '2024-10-19 13:57:33', '2024-12-21 20:49:52', NULL),
(15, 'helloWorld', 'hello@worls.glob', NULL, '$2y$12$MZzqXxdnPYjfYTaGAg7pXOd813NGpLznqIf/V18HhEznriEk4xlGi', NULL, 1, NULL, NULL, '2024-10-24 11:34:54', '2024-10-24 11:34:54', '2024-12-21 20:49:52', NULL),
(16, 'Ali Atef', 'aliatef@gmail.com', NULL, '$2y$10$Vt0rWKOQTOAJseYjVVhwweYvjG4dC2J6PsSUAy.vbGs5JNu/ATJBW', NULL, 1, NULL, 9, '2024-10-19 14:02:08', '2024-12-22 15:53:48', '2024-12-22 18:53:48', '::1'),
(17, 'AtefAql', 'atetfakl80@gmail.com', NULL, '$2y$10$SdEtIDbJbAzs/zezybroeu83NrQls2W4dnDtnEbQjeDjij2npoVlO', NULL, 1, NULL, NULL, '2024-10-20 11:59:59', '2024-10-20 11:59:59', '2024-12-21 20:49:52', NULL),
(18, 'Atef Moh', 'atefakl803@gmail.com', NULL, '$2y$12$AN1E6C8djBPMdrWbaQmgjOrhzFpJPrrQEQ1JbBILRWJezwJr33xMe', NULL, 1, NULL, NULL, '2024-10-25 05:48:52', '2024-10-25 05:48:52', '2024-12-21 20:49:52', NULL),
(19, 'Atef Aql', 'atefaql@gmail.com', NULL, '$2y$10$sUKvnB5SGl051Dy931hkr.He3I6chBXaDJUaKRqObEWpk6kyWNmn2', NULL, 1, NULL, NULL, NULL, NULL, '2024-12-21 20:49:52', NULL);

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
  `dob` date DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `natId` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_profiles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_profiles`
--

INSERT INTO `admins_profiles` (`id`, `first_name`, `last_name`, `phone`, `gender`, `possition`, `address`, `image`, `dob`, `user_id`, `natId`, `created_at`, `updated_at`) VALUES
(10, 'Yousra', 'Ziad', '00966548676841', 0, '', '{\"street\":\"123\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-02-19', 19, '2488802741', '2024-10-19 13:53:27', '2024-10-28 08:03:33'),
(11, 'Yousra', 'Ziad', '00966548145241', 1, '', '{\"street\":\"1233\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-12-02', 18, '2488802741', '2024-10-19 13:59:40', '2024-10-28 07:51:08'),
(12, 'AtefAql', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 17, NULL, '2024-10-20 11:59:59', '2024-10-20 11:59:59'),
(13, 'Ali', 'Atef', '', 0, '', '{\"street\":\"adsf\",\"city\":\"sgdf\",\"state\":\"fsdg\",\"postal_code\":\"sfgd\",\"country\":\"14\"}', 'default.user.profile.png', '2019-11-09', 16, NULL, '2024-10-24 11:34:54', '2024-10-30 11:25:47'),
(14, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 15, NULL, '2024-10-25 05:48:52', '2024-10-25 05:48:52'),
(15, 'Atef Moh', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00', 14, NULL, '2024-10-25 05:48:52', '2024-10-25 05:48:52'),
(16, 'Yousra', 'Ziad', '00966548676841', 0, '', '{\"street\":\"123\",\"city\":\"Helwan\",\"state\":\"Cairo\",\"postal_code\":\"12523\",\"country\":\"51\"}', 'default.user.profile.png', '1979-02-19', 13, '2488802741', '2024-10-19 13:53:27', '2024-10-28 08:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ismain` tinyint(1) DEFAULT '0',
  `branch_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Branch 20330ABG', 'Egypt, Cairo, Helwan, 12 Ahmed Unsi st.,', '00201020304051', 'company_depart@domain.com', NULL, '1501202400002', 13, 13, '2024-11-27 06:47:01', '2024-11-27 10:53:43'),
(2, 'Main Branch', 'Egypt, Alexandria, El Agami, 12 Mousa Edris st.,', '00201020304050', 'company@domain.com', 0, '1501202400001', 13, 13, '2024-11-27 09:09:03', '2024-11-27 10:55:59');

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
  `barcode` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `barcode`, `name`, `serial`, `breif`, `category_id`, `unit_id`, `status`, `image`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(8, '0012345', 'Orange', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 15, 2, NULL, '1733254417image_product.jpg', '2024-12-03 19:33:37', 13, 13, '2024-12-03 19:33:37'),
(9, '0008876', 'Lemon', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 15, 2, NULL, '1733254475image_product.jpg', '2024-12-03 19:34:35', 13, 13, '2024-12-03 19:34:35'),
(10, '0008876', 'Frozen Srtawberry', NULL, NULL, 17, 2, NULL, '1733254530image_product.jpg', '2024-12-03 19:35:30', 13, 13, '2024-12-03 20:06:45'),
(12, '0008876401', 'Large Headphones', NULL, NULL, 20, 2, NULL, '1733254718image_product.jpg', '2024-12-03 19:38:38', 13, 13, '2024-12-03 20:07:09'),
(13, '0008876402', 'Large  Headphones', NULL, NULL, 20, 2, NULL, '1733254806image_product.jpg', '2024-12-03 19:40:06', 13, 13, '2024-12-03 20:07:27'),
(14, '0008876403', 'Large Headphones', NULL, NULL, 20, 2, NULL, '1733254839image_product.jpg', '2024-12-03 19:40:39', 13, 13, '2024-12-03 19:48:54'),
(15, '0008876405', '3D modeling and rendering', NULL, '3D modeling and rendering', 23, 2, NULL, '1733255192image_product.jpg', '2024-12-03 19:46:32', 13, 13, '2024-12-03 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `items_categories`
--

DROP TABLE IF EXISTS `items_categories`;
CREATE TABLE IF NOT EXISTS `items_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `cat_brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `cat_name`, `parent_id`, `cat_brief`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(12, 'Fruits', 1, 'Category Fruits', 0, 13, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL),
(14, 'Citrus Fruits', 12, 'Category Citrus Fruits', 1, 13, '2024-12-03 19:06:10', '2024-12-03 19:06:10', NULL),
(15, 'Fresh Fruits', 14, 'Category Fresh Fruits', 1, 13, '2024-12-03 19:07:38', '2024-12-03 19:07:38', NULL),
(16, 'Berries Fruits', 12, 'Berries Fresh Fruits', 1, 13, '2024-12-03 19:10:07', '2024-12-03 19:10:07', NULL),
(17, 'Frozen Fruits', 16, 'Berries Frozen Fruits', 1, 13, '2024-12-03 19:11:59', '2024-12-03 19:11:59', NULL),
(18, 'Headphones', 1, 'Headphones', 1, 13, '2024-12-03 19:12:42', '2024-12-03 19:12:42', NULL),
(19, 'Over-Ear', 18, 'Large ear cups that completely enclose the ears.', 1, 13, '2024-12-03 19:15:29', '2024-12-03 19:15:29', NULL),
(20, 'Closed-back ', 19, 'Closed-back Headphones', 1, 13, '2024-12-03 19:19:53', '2024-12-03 19:19:53', NULL),
(21, 'Computers', 1, 'Computers', 1, 13, '2024-12-03 19:42:04', '2024-12-03 19:42:04', NULL),
(22, 'Desktop', 21, 'Computers', 1, 13, '2024-12-03 19:42:34', '2024-12-03 19:42:34', NULL),
(23, 'Workstations', 22, 'Workstations', 1, 13, '2024-12-03 19:45:12', '2024-12-03 19:45:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_categroys`
--

DROP TABLE IF EXISTS `item_categroys`;
CREATE TABLE IF NOT EXISTS `item_categroys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2022_09_23_145349_create_admins_table', 1),
(17, '2024_11_23_164620_create_item_categroys_table', 1),
(18, '2024_11_26_151818_create_stores_table', 1),
(19, '2024_11_26_195501_create_branches_table', 1),
(20, '2024_12_17_103939_add_login_fields_to_admins_table', 1),
(21, '2024_12_17_104913_add_remember_token_to_admins', 1),
(22, '2024_12_17_104948_add_created_updated_by_to_admins', 1),
(23, '2024_12_17_105157_create_admins_profiles_table', 2),
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_23_145349_create_admins_table', 1),
(6, '2024_11_23_164620_create_item_categroys_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `arabic_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `English_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleNameAr` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleNameEn` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `label`, `brief`, `roleNameAr`, `roleNameEn`, `guard_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'super-admin', 'The admin can see all users lists including his account', 'المدير العام', 'Super Admin', 'Admin', 13, 13, '2025-01-24 15:57:35', '2025-01-24 15:57:35'),
(3, 'post.writer', 'Thanks for downloading the Windsurf Editor!  Click here if your download hasn\'t started.  Documentation  Discover the key features of the Windsurf Editor  Discord  Join our community Featur', 'كاتب مقالات', 'Post Writer', 'Admin', 13, 13, '2025-01-24 16:22:33', '2025-01-24 16:22:33'),
(4, 'post.editor', 'Dashboard Settings', 'محرر المقالات', 'Post Editor', 'Admin', 13, 13, '2025-01-24 16:29:45', '2025-01-24 16:29:45'),
(5, 'post.delete', 'sasdgndh', 'dnghmg', 'Delete Posts', 'Admin', 13, 13, '2025-01-25 17:39:53', '2025-01-25 17:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `brief` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'store_123', NULL, 13, 'Home Delivery', NULL, NULL, '0245678955', 'yousra@gmail.com', 1, 1, 13, '2024-11-27 13:54:06', 13, '2024-11-28 11:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `store_entries`
--

DROP TABLE IF EXISTS `store_entries`;
CREATE TABLE IF NOT EXISTS `store_entries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` bigint UNSIGNED DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `receipt_id` bigint UNSIGNED DEFAULT NULL,
  `ref_type_id` int DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `inputs` decimal(10,2) DEFAULT NULL,
  `outputs` decimal(10,2) DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_entries`
--

INSERT INTO `store_entries` (`id`, `item_id`, `store_id`, `receipt_id`, `ref_type_id`, `unit_id`, `inputs`, `outputs`, `notes`, `status`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(7, 9, 1, 16, 1, 1, 1.00, 0.00, NULL, 'active', '2024-12-17 19:00:45', 13, 13, '2024-12-17 19:00:45'),
(9, 8, 1, 66, 2, 2, 100.00, 0.00, 'dhgfhgkhjgklgj dhgfhgkhjgklgj kglhkglh', 'active', '2025-01-14 19:45:52', 13, 13, '2025-01-14 19:45:52'),
(10, 14, 1, 66, 2, 2, 200.00, 0.00, 'svxzcbd', 'active', '2025-01-14 19:46:14', 13, 13, '2025-01-14 19:46:14'),
(11, 8, 1, 64, 7, 2, 12.00, 0.00, NULL, 'active', '2025-02-25 18:37:38', 13, 13, '2025-02-25 18:37:38'),
(12, 15, 1, 64, 7, 2, 10.00, 0.00, NULL, 'active', '2025-02-25 18:38:21', 13, 13, '2025-02-25 18:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `store_receipts`
--

DROP TABLE IF EXISTS `store_receipts`;
CREATE TABLE IF NOT EXISTS `store_receipts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reception_date` datetime DEFAULT NULL,
  `reference` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reference_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `serial` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direction` tinyint DEFAULT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_receipts`
--

INSERT INTO `store_receipts` (`id`, `reception_date`, `reference`, `reference_type`, `serial`, `direction`, `brief`, `notes`, `status`, `admin_id`, `store_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(35, '2024-12-26 00:00:00', '000000880001', '5', '00000000000066', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', NULL),
(37, '2024-12-26 00:00:00', '000000880001', '5', '00000000000077', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 14:45:32', NULL),
(39, '2024-12-26 00:00:00', '000000880001', '5', '00000000000088', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2025-01-03 19:23:32', NULL),
(40, '2024-12-26 00:00:00', '000000880001', '5', '00000000000099', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 3, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2025-01-03 07:42:42', NULL),
(41, '2024-12-26 00:00:00', '000000880001', '5', '00000000000010', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 3, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2025-01-03 07:43:05', NULL),
(42, '2024-12-26 00:00:00', '000000880001', '5', '00000000000084', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 3, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', '2024-12-28 09:15:59'),
(44, '2025-01-01 00:00:00', '12345678901000', '1', '12345678901200', 1, 'Brief description 5', '\'Notes 5', 1, 13, 1, 13, '2025-01-03 18:31:08', NULL, '2025-01-03 18:31:08', NULL),
(45, '2025-01-04 00:00:00', '12345678901001', '1', '12345678901201', 2, 'Brief description 5', '\'Notes 5', 1, 14, 1, 13, '2025-01-03 18:31:52', NULL, '2025-01-03 18:31:52', NULL),
(46, '2024-12-31 00:00:00', '12345678901002', '2', '12345678901202', 1, 'Brief description 5', '\'Notes 5', 3, 14, 1, 13, '2025-01-03 18:32:22', 13, '2025-01-03 18:48:47', NULL),
(47, '2025-01-10 00:00:00', '12345678901003', '2', '12345678901203', 2, 'Brief description 5', '\'Notes 5', 3, 16, 1, 13, '2025-01-03 18:32:54', 13, '2025-01-03 18:48:33', NULL),
(48, '2025-01-05 00:00:00', '12345678901004', '8', '12345678901204', 1, 'Brief description 5', '\'Notes 5', 1, 16, 1, 13, '2025-01-03 18:33:47', NULL, '2025-01-03 18:33:47', NULL),
(49, '2025-01-06 00:00:00', '12345678901005', '4', '12345678901205', 1, 'Brief description 5', '\'Notes 5', 2, 16, 1, 13, '2025-01-03 18:34:34', 13, '2025-01-03 19:22:46', NULL),
(50, '2025-01-16 00:00:00', '00000000000167', '5', '00000000000166', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 17, 1, 13, '2025-01-03 18:36:01', NULL, '2025-01-03 18:36:01', NULL),
(51, '2025-01-23 00:00:00', '00000000000167', '6', '99999999999999', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 17, 1, 13, '2025-01-03 18:41:05', 13, '2025-01-03 19:22:41', NULL),
(52, '2025-01-15 00:00:00', '00000000000164', '7', '99999999999991', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 13, 1, 13, '2025-01-03 18:42:30', NULL, '2025-01-03 18:42:30', NULL),
(53, '2025-01-24 00:00:00', '00000000000168', '7', '99999999999992', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 17, 1, 13, '2025-01-03 18:43:08', 13, '2025-01-03 18:47:57', NULL),
(54, '2025-01-22 00:00:00', '00000000000167', '6', '99999999999993', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 13, 1, 13, '2025-01-03 18:43:55', 13, '2025-01-03 18:47:45', NULL),
(55, '2025-01-01 00:00:00', '12345678901000', '1', '12345678901200', 1, 'Brief description 5', '\'Notes 5', 1, 13, 1, 13, '2025-01-03 18:31:08', NULL, '2025-01-03 18:31:08', NULL),
(56, '2025-01-04 00:00:00', '12345678901001', '1', '12345678901201', 2, 'Brief description 5', '\'Notes 5', 1, 14, 1, 13, '2025-01-03 18:31:52', NULL, '2025-01-03 18:31:52', NULL),
(57, '2024-12-31 00:00:00', '12345678901002', '2', '12345678901202', 1, 'Brief description 5', '\'Notes 5', 3, 14, 1, 13, '2025-01-03 18:32:22', 13, '2025-01-03 18:48:54', NULL),
(58, '2025-01-10 00:00:00', '12345678901003', '2', '12345678901203', 2, 'Brief description 5', '\'Notes 5', 3, 16, 1, 13, '2025-01-03 18:32:54', 13, '2025-01-03 18:48:40', NULL),
(59, '2025-01-05 00:00:00', '12345678901004', '8', '12345678901204', 1, 'Brief description 5', '\'Notes 5', 1, 16, 1, 13, '2025-01-03 18:33:47', NULL, '2025-01-03 18:33:47', NULL),
(60, '2025-01-06 00:00:00', '12345678901005', '4', '12345678901205', 1, 'Brief description 5', '\'Notes 5', 3, 16, 1, 13, '2025-01-03 18:34:34', 13, '2025-01-03 18:49:12', NULL),
(61, '2025-01-16 00:00:00', '00000000000167', '5', '00000000000166', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 17, 1, 13, '2025-01-03 18:36:01', NULL, '2025-01-03 18:36:01', NULL),
(62, '2025-01-23 00:00:00', '00000000000167', '6', '99999999999999', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 17, 1, 13, '2025-01-03 18:41:05', 13, '2025-01-03 18:47:39', NULL),
(63, '2025-01-15 00:00:00', '00000000000164', '7', '99999999999991', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 13, 1, 13, '2025-01-03 18:42:30', NULL, '2025-01-03 18:42:30', NULL),
(64, '2025-01-24 00:00:00', '00000000000168', '7', '99999999999992', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 17, 1, 13, '2025-01-03 18:43:08', NULL, '2025-01-03 18:43:08', NULL),
(65, '2025-01-22 00:00:00', '00000000000167', '6', '99999999999993', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 13, 1, 13, '2025-01-03 18:43:55', 13, '2025-01-03 18:47:51', NULL),
(66, '2025-01-22 22:42:00', '10000990000030', '2', '25150010100123', 1, 'xbncbnb vm,b.', NULL, 1, 14, 1, 13, '2025-01-14 19:43:35', NULL, '2025-01-14 19:43:35', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `brief`, `short_name`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'meter', 'meter', 'm', 1, NULL, NULL, NULL, NULL),
(2, 'Piece', 'Piece', 'pcs', 1, NULL, NULL, NULL, NULL);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins_profiles`
--
ALTER TABLE `admins_profiles`
  ADD CONSTRAINT `admins_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
