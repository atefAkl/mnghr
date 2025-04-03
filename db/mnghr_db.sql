-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2025 at 04:16 AM
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
-- Database: `mnghr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(58, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-28 04:27:28', '2025-03-28 04:27:28', NULL),
(59, 'default', 'تم تسجيل الخروج', 'App\\Models\\Admin', 13, 'App\\Models\\Admin', 13, '[]', '2025-03-28 05:23:26', '2025-03-28 05:23:26', NULL),
(60, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-28 05:23:31', '2025-03-28 05:23:31', NULL),
(61, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-29 12:11:40', '2025-03-29 12:11:40', NULL),
(62, 'default', 'تم تسجيل الدخول بنجاح', 'App\\Models\\Admin', 13, NULL, NULL, '[]', '2025-03-29 16:28:04', '2025-03-29 16:28:04', NULL);

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
  `last_login_ip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(13, 'Yousra_2', 'yousra@ziad.com', NULL, '$2y$10$Vt0rWKOQTOAJseYjVVhwweYvjG4dC2J6PsSUAy.vbGs5JNu/ATJBW', 'w5u0keXTwJPykccF7PIJXdyWvrmTxEBaZYpAYPc8mX8AxVbPFEoZzf9laIk8', 1, NULL, 9, '2024-10-19 13:59:40', '2025-03-29 16:28:04', '2025-03-29 19:28:04', '::1'),
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
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nat_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `job_title_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabic_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso2` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_code` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `arabic_name`, `iso2`, `iso3`, `call_code`) VALUES
(1, 'Afghanistan', 'أفغانستان', 'AF', 'AFG', '+93'),
(2, 'Albania', 'ألبانيا', 'AL', 'ALB', '+355'),
(3, 'Algeria', 'الجزائر', 'DZ', 'DZA', '+213'),
(4, 'Andorra', 'أندورا', 'AD', 'AND', '+376'),
(5, 'Angola', 'أنغولا', 'AO', 'AGO', '+244'),
(6, 'Antigua and Barbuda', 'أنتيغوا وباربودا', 'AG', 'ATG', '+1-268'),
(7, 'Argentina', 'الأرجنتين', 'AR', 'ARG', '+54'),
(8, 'Armenia', 'أرمينيا', 'AM', 'ARM', '+374'),
(9, 'Australia', 'أستراليا', 'AU', 'AUS', '+61'),
(10, 'Austria', 'النمسا', 'AT', 'AUT', '+43'),
(11, 'Azerbaijan', 'أذربيجان', 'AZ', 'AZE', '+994'),
(12, 'Bahamas', 'الباهاما', 'BS', 'BHS', '+1-242'),
(13, 'Bahrain', 'البحرين', 'BH', 'BHR', '+973'),
(14, 'Bangladesh', 'بنغلاديش', 'BD', 'BGD', '+880'),
(15, 'Barbados', 'بربادوس', 'BB', 'BRB', '+1-246'),
(16, 'Belarus', 'بيلاروسيا', 'BY', 'BLR', '+375'),
(17, 'Belgium', 'بلجيكا', 'BE', 'BEL', '+32'),
(18, 'Belize', 'بليز', 'BZ', 'BLZ', '+501'),
(19, 'Benin', 'بنين', 'BJ', 'BEN', '+229'),
(20, 'Bhutan', 'بوتان', 'BT', 'BTN', '+975'),
(21, 'Bolivia', 'بوليفيا', 'BO', 'BOL', '+591'),
(22, 'Bosnia and Herzegovina', 'البوسنة والهرسك', 'BA', 'BIH', '+387'),
(23, 'Botswana', 'بوتسوانا', 'BW', 'BWA', '+267'),
(24, 'Brazil', 'البرازيل', 'BR', 'BRA', '+55'),
(25, 'Brunei', 'بروناي', 'BN', 'BRN', '+673'),
(26, 'Bulgaria', 'بلغاريا', 'BG', 'BGR', '+359'),
(27, 'Burkina Faso', 'بوركينا فاسو', 'BF', 'BFA', '+226'),
(28, 'Burundi', 'بوروندي', 'BI', 'BDI', '+257'),
(29, 'Cabo Verde', 'الرأس الأخضر', 'CV', 'CPV', '+238'),
(30, 'Cambodia', 'كمبوديا', 'KH', 'KHM', '+855'),
(31, 'Cameroon', 'الكاميرون', 'CM', 'CMR', '+237'),
(32, 'Canada', 'كندا', 'CA', 'CAN', '+1'),
(33, 'Central African Republic', 'جمهورية أفريقيا الوسطى', 'CF', 'CAF', '+236'),
(34, 'Chad', 'تشاد', 'TD', 'TCD', '+235'),
(35, 'Chile', 'تشيلي', 'CL', 'CHL', '+56'),
(36, 'China', 'الصين', 'CN', 'CHN', '+86'),
(37, 'Colombia', 'كولومبيا', 'CO', 'COL', '+57'),
(38, 'Comoros', 'جزر القمر', 'KM', 'COM', '+269'),
(39, 'Congo (Congo-Brazzaville)', 'الكونغو', 'CG', 'COG', '+242'),
(40, 'Costa Rica', 'كوستاريكا', 'CR', 'CRI', '+506'),
(41, 'Croatia', 'كرواتيا', 'HR', 'HRV', '+385'),
(42, 'Cuba', 'كوبا', 'CU', 'CUB', '+53'),
(43, 'Cyprus', 'قبرص', 'CY', 'CYP', '+357'),
(44, 'Czechia (Czech Republic)', 'التشيك', 'CZ', 'CZE', '+420'),
(45, 'Democratic Republic of the Congo', 'جمهورية الكونغو الديمقراطية', 'CD', 'COD', '+243'),
(46, 'Denmark', 'الدنمارك', 'DK', 'DNK', '+45'),
(47, 'Djibouti', 'جيبوتي', 'DJ', 'DJI', '+253'),
(48, 'Dominica', 'دومينيكا', 'DM', 'DMA', '+1-767'),
(49, 'Dominican Republic', 'جمهورية الدومينيكان', 'DO', 'DOM', '+1-809'),
(50, 'Ecuador', 'الإكوادور', 'EC', 'ECU', '+593'),
(51, 'Egypt', 'مصر', 'EG', 'EGY', '+20'),
(52, 'El Salvador', 'السلفادور', 'SV', 'SLV', '+503'),
(53, 'Equatorial Guinea', 'غينيا الاستوائية', 'GQ', 'GNQ', '+240'),
(54, 'Eritrea', 'إريتريا', 'ER', 'ERI', '+291'),
(55, 'Estonia', 'إستونيا', 'EE', 'EST', '+372'),
(56, 'Eswatini (fmr. \"Swaziland\")', 'إسواتيني', 'SZ', 'SWZ', '+268'),
(57, 'Ethiopia', 'إثيوبيا', 'ET', 'ETH', '+251'),
(58, 'Fiji', 'فيجي', 'FJ', 'FJI', '+679'),
(59, 'Finland', 'فنلندا', 'FI', 'FIN', '+358'),
(60, 'France', 'فرنسا', 'FR', 'FRA', '+33'),
(61, 'Gabon', 'الغابون', 'GA', 'GAB', '+241'),
(62, 'Gambia', 'غامبيا', 'GM', 'GMB', '+220'),
(63, 'Georgia', 'جورجيا', 'GE', 'GEO', '+995'),
(64, 'Germany', 'ألمانيا', 'DE', 'DEU', '+49'),
(65, 'Ghana', 'غانا', 'GH', 'GHA', '+233'),
(66, 'Greece', 'اليونان', 'GR', 'GRC', '+30'),
(67, 'Grenada', 'غرينادا', 'GD', 'GRD', '+1-473'),
(68, 'Guatemala', 'غواتيمالا', 'GT', 'GTM', '+502'),
(69, 'Guinea', 'غينيا', 'GN', 'GIN', '+224'),
(70, 'Guinea-Bissau', 'غينيا بيساو', 'GW', 'GNB', '+245'),
(71, 'Guyana', 'غيانا', 'GY', 'GUY', '+592'),
(72, 'Haiti', 'هايتي', 'HT', 'HTI', '+509'),
(73, 'Honduras', 'هندوراس', 'HN', 'HND', '+504'),
(74, 'Hungary', 'المجر', 'HU', 'HUN', '+36'),
(75, 'Iceland', 'آيسلندا', 'IS', 'ISL', '+354'),
(76, 'India', 'الهند', 'IN', 'IND', '+91'),
(77, 'Indonesia', 'إندونيسيا', 'ID', 'IDN', '+62'),
(78, 'Iran', 'إيران', 'IR', 'IRN', '+98'),
(79, 'Iraq', 'العراق', 'IQ', 'IRQ', '+964'),
(80, 'Ireland', 'أيرلندا', 'IE', 'IRL', '+353'),
(81, 'Israel', 'إسرائيل', 'IL', 'ISR', '+972'),
(82, 'Italy', 'إيطاليا', 'IT', 'ITA', '+39'),
(83, 'Jamaica', 'جامايكا', 'JM', 'JAM', '+1-876'),
(84, 'Japan', 'اليابان', 'JP', 'JPN', '+81'),
(85, 'Jordan', 'الأردن', 'JO', 'JOR', '+962'),
(86, 'Kazakhstan', 'كازاخستان', 'KZ', 'KAZ', '+7'),
(87, 'Kenya', 'كينيا', 'KE', 'KEN', '+254'),
(88, 'Kiribati', 'كيريباتي', 'KI', 'KIR', '+686'),
(89, 'Kuwait', 'الكويت', 'KW', 'KWT', '+965'),
(90, 'Kyrgyzstan', 'قيرغيزستان', 'KG', 'KGZ', '+996'),
(91, 'Laos', 'لاوس', 'LA', 'LAO', '+856'),
(92, 'Latvia', 'لاتفيا', 'LV', 'LVA', '+371'),
(93, 'Lebanon', 'لبنان', 'LB', 'LBN', '+961'),
(94, 'Lesotho', 'ليسوتو', 'LS', 'LSO', '+266'),
(95, 'Liberia', 'ليبيريا', 'LR', 'LBR', '+231'),
(96, 'Libya', 'ليبيا', 'LY', 'LBY', '+218'),
(97, 'Liechtenstein', 'ليختنشتاين', 'LI', 'LIE', '+423'),
(98, 'Lithuania', 'ليتوانيا', 'LT', 'LTU', '+370'),
(99, 'Luxembourg', 'لوكسمبورغ', 'LU', 'LUX', '+352'),
(100, 'Madagascar', 'مدغشقر', 'MG', 'MDG', '+261'),
(101, 'Malawi', 'مالاوي', 'MW', 'MWI', '+265'),
(102, 'Malaysia', 'ماليزيا', 'MY', 'MYS', '+60'),
(103, 'Maldives', 'المالديف', 'MV', 'MDV', '+960'),
(104, 'Mali', 'مالي', 'ML', 'MLI', '+223'),
(105, 'Malta', 'مالطا', 'MT', 'MLT', '+356'),
(106, 'Marshall Islands', 'جزر مارشال', 'MH', 'MHL', '+692'),
(107, 'Mauritania', 'موريتانيا', 'MR', 'MRT', '+222'),
(108, 'Mauritius', 'موريشيوس', 'MU', 'MUS', '+230'),
(109, 'Mexico', 'المكسيك', 'MX', 'MEX', '+52'),
(110, 'Micronesia', 'ميكرونيزيا', 'FM', 'FSM', '+691'),
(111, 'Moldova', 'مولدوفا', 'MD', 'MDA', '+373'),
(112, 'Monaco', 'موناكو', 'MC', 'MCO', '+377'),
(113, 'Mongolia', 'منغوليا', 'MN', 'MNG', '+976'),
(114, 'Montenegro', 'الجبل الأسود', 'ME', 'MNE', '+382'),
(115, 'Morocco', 'المغرب', 'MA', 'MAR', '+212'),
(116, 'Mozambique', 'موزمبيق', 'MZ', 'MOZ', '+258'),
(117, 'Myanmar (formerly Burma)', 'ميانمار', 'MM', 'MMR', '+95'),
(118, 'Namibia', 'ناميبيا', 'NA', 'NAM', '+264'),
(119, 'Nauru', 'ناورو', 'NR', 'NRU', '+674'),
(120, 'Nepal', 'نيبال', 'NP', 'NPL', '+977'),
(121, 'Netherlands', 'هولندا', 'NL', 'NLD', '+31'),
(122, 'New Zealand', 'نيوزيلندا', 'NZ', 'NZL', '+64'),
(123, 'Nicaragua', 'نيكاراغوا', 'NI', 'NIC', '+505'),
(124, 'Niger', 'النيجر', 'NE', 'NER', '+227'),
(125, 'Nigeria', 'نيجيريا', 'NG', 'NGA', '+234'),
(126, 'North Korea', 'كوريا الشمالية', 'KP', 'PRK', '+850'),
(127, 'North Macedonia', 'مقدونيا الشمالية', 'MK', 'MKD', '+389'),
(128, 'Norway', 'النرويج', 'NO', 'NOR', '+47'),
(129, 'Oman', 'عمان', 'OM', 'OMN', '+968'),
(130, 'Pakistan', 'باكستان', 'PK', 'PAK', '+92'),
(131, 'Palau', 'بالاو', 'PW', 'PLW', '+680'),
(132, 'Palestine State', 'فلسطين', 'PS', 'PSE', '+970'),
(133, 'Panama', 'بنما', 'PA', 'PAN', '+507'),
(134, 'Papua New Guinea', 'بابوا غينيا الجديدة', 'PG', 'PNG', '+675'),
(135, 'Paraguay', 'باراغواي', 'PY', 'PRY', '+595'),
(136, 'Peru', 'بيرو', 'PE', 'PER', '+51'),
(137, 'Philippines', 'الفلبين', 'PH', 'PHL', '+63'),
(138, 'Poland', 'بولندا', 'PL', 'POL', '+48'),
(139, 'Portugal', 'البرتغال', 'PT', 'PRT', '+351'),
(140, 'Qatar', 'قطر', 'QA', 'QAT', '+974'),
(141, 'Romania', 'رومانيا', 'RO', 'ROU', '+40'),
(142, 'Russia', 'روسيا', 'RU', 'RUS', '+7'),
(143, 'Rwanda', 'رواندا', 'RW', 'RWA', '+250'),
(144, 'Saint Kitts and Nevis', 'سانت كيتس ونيفيس', 'KN', 'KNA', '+1-869'),
(145, 'Saint Lucia', 'سانت لوسيا', 'LC', 'LCA', '+1-758'),
(146, 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', 'VC', 'VCT', '+1-784'),
(147, 'Samoa', 'ساموا', 'WS', 'WSM', '+685'),
(148, 'San Marino', 'سان مارينو', 'SM', 'SMR', '+378'),
(149, 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', 'ST', 'STP', '+239'),
(150, 'Saudi Arabia', 'المملكة العربية السعودية', 'SA', 'SAU', '+966'),
(151, 'Senegal', 'السنغال', 'SN', 'SEN', '+221'),
(152, 'Serbia', 'صربيا', 'RS', 'SRB', '+381'),
(153, 'Seychelles', 'سيشيل', 'SC', 'SYC', '+248'),
(154, 'Sierra Leone', 'سيراليون', 'SL', 'SLE', '+232'),
(155, 'Singapore', 'سنغافورة', 'SG', 'SGP', '+65'),
(156, 'Slovakia', 'سلوفاكيا', 'SK', 'SVK', '+421'),
(157, 'Slovenia', 'سلوفينيا', 'SI', 'SVN', '+386'),
(158, 'Solomon Islands', 'جزر سليمان', 'SB', 'SLB', '+677'),
(159, 'Somalia', 'الصومال', 'SO', 'SOM', '+252'),
(160, 'South Africa', 'جنوب أفريقيا', 'ZA', 'ZAF', '+27'),
(161, 'South Korea', 'كوريا الجنوبية', 'KR', 'KOR', '+82'),
(162, 'South Sudan', 'جنوب السودان', 'SS', 'SSD', '+211'),
(163, 'Spain', 'إسبانيا', 'ES', 'ESP', '+34'),
(164, 'Sri Lanka', 'سريلانكا', 'LK', 'LKA', '+94'),
(165, 'Sudan', 'السودان', 'SD', 'SDN', '+249'),
(166, 'Suriname', 'سورينام', 'SR', 'SUR', '+597'),
(167, 'Sweden', 'السويد', 'SE', 'SWE', '+46'),
(168, 'Switzerland', 'سويسرا', 'CH', 'CHE', '+41'),
(169, 'Syria', 'سوريا', 'SY', 'SYR', '+963'),
(170, 'Tajikistan', 'طاجيكستان', 'TJ', 'TJK', '+992'),
(171, 'Tanzania', 'تنزانيا', 'TZ', 'TZA', '+255'),
(172, 'Thailand', 'تايلاند', 'TH', 'THA', '+66'),
(173, 'Timor-Leste', 'تيمور الشرقية', 'TL', 'TLS', '+670'),
(174, 'Togo', 'توغو', 'TG', 'TGO', '+228'),
(175, 'Tonga', 'تونغا', 'TO', 'TON', '+676'),
(176, 'Trinidad and Tobago', 'ترينيداد وتوباغو', 'TT', 'TTO', '+1-868'),
(177, 'Tunisia', 'تونس', 'TN', 'TUN', '+216'),
(178, 'Turkey', 'تركيا', 'TR', 'TUR', '+90'),
(179, 'Turkmenistan', 'تركمانستان', 'TM', 'TKM', '+993'),
(180, 'Tuvalu', 'توفالو', 'TV', 'TUV', '+688'),
(181, 'Uganda', 'أوغندا', 'UG', 'UGA', '+256'),
(182, 'Ukraine', 'أوكرانيا', 'UA', 'UKR', '+380'),
(183, 'United Arab Emirates', 'الإمارات العربية المتحدة', 'AE', 'ARE', '+971'),
(184, 'United Kingdom', 'المملكة المتحدة', 'GB', 'GBR', '+44'),
(185, 'United States of America', 'الولايات المتحدة الأمريكية', 'US', 'USA', '+1'),
(186, 'Uruguay', 'أوروغواي', 'UY', 'URY', '+598'),
(187, 'Uzbekistan', 'أوزبكستان', 'UZ', 'UZB', '+998'),
(188, 'Vanuatu', 'فانواتو', 'VU', 'VUT', '+678'),
(189, 'Vatican City', 'مدينة الفاتيكان', 'VA', 'VAT', '+379'),
(190, 'Venezuela', 'فنزويلا', 'VE', 'VEN', '+58'),
(191, 'Vietnam', 'فيتنام', 'VN', 'VNM', '+84'),
(192, 'Yemen', 'اليمن', 'YE', 'YEM', '+967'),
(193, 'Zambia', 'زامبيا', 'ZM', 'ZMB', '+260'),
(194, 'Zimbabwe', 'زيمبابوي', 'ZW', 'ZWE', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `level_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_created_by` (`created_by`),
  KEY `fk_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `name_en`, `description`, `description_en`, `parent_id`, `level_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'الادراة العامة', 'General Administration', 'الادراة العامة وشوية كلام تانى عشان نطول الوصف', 'General Administration pla pla pla', 0, 8, 1, '2025-03-30 11:43:14', '2025-04-01 03:53:57', 13, 13),
(2, 'الادارة المالية', 'Financial', 'الإدارة المالية هي العمود الفقري لأي شركة، حيث تُعنى بتخطيط وتنظيم الموارد المالية ومراقبة تدفقاتها لضمان الاستقرار المالي والنمو المستدام', 'The Finance Department is the backbone of any company, responsible for planning, organizing, and controlling financial resources to ensure stability and sustainable growth', NULL, NULL, 1, '2025-03-30 17:59:58', '2025-03-30 20:31:13', 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `department_levels`
--

DROP TABLE IF EXISTS `department_levels`;
CREATE TABLE IF NOT EXISTS `department_levels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` json NOT NULL,
  `description` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `hierarchy_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_levels_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_levels`
--

INSERT INTO `department_levels` (`id`, `key`, `name`, `description`, `order`, `hierarchy_group`, `created_at`, `updated_at`) VALUES
(7, 'executive', '{\"ar\": \"تنفيذى\", \"en\": \"Executive\"}', NULL, 1, 'leadership', '2025-03-31 13:34:03', '2025-03-31 13:34:03'),
(8, 'governance', '{\"ar\": \"حوكمة\", \"en\": \"Governance\"}', NULL, 2, 'leadership', '2025-03-31 13:49:05', '2025-03-31 13:49:05'),
(9, 'board', '{\"ar\": \"مجلس إدارة\", \"en\": \"Board of Directors\"}', NULL, 3, 'leadership', '2025-03-31 13:49:42', '2025-03-31 13:49:42'),
(10, 'vp', '{\"ar\": \"نائب رئيس\", \"en\": \"Vice President\"}', NULL, 4, 'leadership', '2025-03-31 13:50:52', '2025-03-31 13:50:52'),
(11, 'senior_management', '{\"ar\": \"إدارة عليا\", \"en\": \"Senior Management\"}', NULL, 5, 'management', '2025-03-31 13:53:05', '2025-03-31 13:53:05'),
(12, 'middle_management', '{\"ar\": \"إدارة متوسطة\", \"en\": \"Middle Management\"}', NULL, 6, 'management', '2025-03-31 13:54:27', '2025-03-31 14:59:08'),
(13, 'department_head', '{\"ar\": \"رئيس قسم\", \"en\": \"Department Head\"}', NULL, 7, 'management', '2025-03-31 13:54:53', '2025-03-31 13:54:53'),
(14, 'division_director', '{\"ar\": \"مدير قطاع\", \"en\": \"Division Director\"}', NULL, 8, 'management', '2025-03-31 13:58:52', '2025-03-31 13:58:52'),
(15, 'operations', '{\"ar\": \"عمليات\", \"en\": \"Operations\"}', NULL, 9, 'operations', '2025-03-31 14:02:53', '2025-03-31 14:02:53'),
(16, 'projects', '{\"ar\": \"مشاريع\", \"en\": \"Projects\"}', NULL, 10, 'operations', '2025-03-31 14:04:25', '2025-03-31 14:04:25'),
(17, 'regional', '{\"ar\": \"إقليمي\", \"en\": \"Regional\"}', NULL, 11, 'operations', '2025-03-31 14:04:56', '2025-03-31 14:04:56'),
(18, 'branches', '{\"ar\": \"فروع\", \"en\": \"Branches\"}', NULL, 12, 'operations', '2025-03-31 14:05:42', '2025-03-31 14:05:42'),
(19, 'shared_service', '{\"ar\": \"خدمات مشتركة\", \"en\": \"Shared Service\"}', NULL, 13, 'support', '2025-03-31 14:11:50', '2025-03-31 14:11:50'),
(20, 'tech_support', '{\"ar\": \"دعم فني\", \"en\": \"Technical Support\"}', NULL, 14, 'support', '2025-03-31 14:12:44', '2025-03-31 14:12:44'),
(21, 'hr_support', '{\"ar\": \"دعم موارد بشرية\", \"en\": \"Human Resources Support\"}', NULL, 15, 'support', '2025-03-31 14:13:23', '2025-03-31 14:13:23'),
(22, 'finance', '{\"ar\": \"دعم مالي\", \"en\": \"Financial Support\"}', NULL, 16, 'support', '2025-03-31 14:15:00', '2025-03-31 14:15:00'),
(23, 'leader', '{\"ar\": \"قائد فريق\", \"en\": \"Team Lead\"}', NULL, 17, 'teams', '2025-03-31 14:15:33', '2025-03-31 14:54:15'),
(24, 'unit', '{\"ar\": \"وحدة\", \"en\": \"Unit\"}', NULL, 18, 'teams', '2025-03-31 14:15:55', '2025-03-31 14:58:50'),
(25, 'tash_force', '{\"ar\": \"فريق عمل\", \"en\": \"Task Force\"}', NULL, 19, 'teams', '2025-03-31 14:16:26', '2025-03-31 14:16:26'),
(26, 'commitee', '{\"ar\": \"لجنة\", \"en\": \"Commitee\"}', NULL, 20, 'teams', '2025-03-31 14:17:02', '2025-03-31 14:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` json NOT NULL,
  `birth_date` date DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `job_title` bigint UNSIGNED DEFAULT NULL,
  `joined_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `natid_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `natid_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` bigint UNSIGNED DEFAULT NULL,
  `gender` enum('male','female') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`uuid`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `uuid`, `name`, `birth_date`, `department_id`, `job_title`, `joined_at`, `natid_number`, `status`, `natid_type`, `group_id`, `gender`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'HR25-00003443', '{\"ar\": \"محمد احمد على\", \"en\": \"محمد احمد على\"}', NULL, 1, 1, '2023-02-01 00:00:00', '1052436258', '1', 'resident', 7, NULL, 13, NULL, '2025-04-02 08:11:06', '2025-04-02 08:11:06');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

DROP TABLE IF EXISTS `jobtitles`;
CREATE TABLE IF NOT EXISTS `jobtitles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `description` json DEFAULT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `depart_id` (`parent_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobtitles`
--

INSERT INTO `jobtitles` (`id`, `title`, `description`, `parent_id`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"المدير العام\", \"en\": \"General Manager\"}', '{\"ar\": \"المدير العام مسؤول عن الإشراف على العمليات اليومية، وتحقيق الأهداف التجارية، ودفع النمو والربحية. يقوم بتوجيه الموظفين، وإدارة الميزانيات، وتحسين العمليات، وضمان رضا العملاء، مع الالتزام بسياسات الشركة والأهداف الاستراتيجية.\", \"en\": \"The General Manager (GM) oversees daily operations, ensures business goals are met, and drives growth and profitability. They lead staff, manage budgets, optimize processes, and maintain high customer satisfaction while aligning with company policies and strategic objectives.\"}', 1, 13, 13, 0, '2025-04-01 10:55:25', '2025-04-01 16:02:08'),
(2, '{\"ar\": \"نائب المدير العام\", \"en\": \"Deputy General Manager\"}', '{\"ar\": \"يساعد نائب المدير العام (DGM) المدير العام في الإشراف على العمليات اليومية، وتنفيذ الاستراتيجيات، وضمان كفاءة المنشأة. يلعب نائب المدير العام دوراً محورياً في اتخاذ القرارات، قيادة الفرق، والإدارة التشغيلية لتحقيق أهداف الشركة.\", \"en\": \"The Deputy General Manager (DGM) assists the General Manager in overseeing daily operations, implementing business strategies, and ensuring organizational efficiency. The DGM plays a key role in decision-making, team leadership, and operational management to achieve company objectives.\"}', 1, 13, 13, 1, '2025-04-01 13:37:34', '2025-04-01 16:25:31');

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
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `arabic_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `English_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleNameAr` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleNameEn` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `jobtitles`
--
ALTER TABLE `jobtitles`
  ADD CONSTRAINT `jobtitles_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `jobtitles_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `jobtitles_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
