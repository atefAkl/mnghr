-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2024 at 07:30 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_receipts`
--

INSERT INTO `store_receipts` (`id`, `reception_date`, `reference`, `reference_type`, `serial`, `direction`, `brief`, `notes`, `status`, `admin_id`, `store_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, '2024-12-11 16:29:19', '000001234', 'Purchases', '00000000222', 1, 'purchases66', NULL, 0, 17, 1, 0, '2024-12-11 16:31:24', 13, '2024-12-13 13:57:31', '2024-12-13 07:57:31'),
(15, '2024-12-04 00:00:00', NULL, '4', '00000000000099', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 0, 18, 1, 13, '2024-12-13 14:11:41', NULL, '2024-12-19 18:46:01', NULL),
(16, NULL, NULL, '1', '00000000000099', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 13, 1, 13, '2024-12-13 14:12:21', 13, '2024-12-13 14:12:42', NULL),
(17, '2024-12-04 00:00:00', NULL, '5', '00000000000099', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 0, 16, 1, 13, '2024-12-13 14:13:14', NULL, '2024-12-13 14:13:14', NULL),
(18, '2024-12-19 00:00:00', NULL, '1', '22222222244455', 1, 'سايلتاننلتملتب بنبتن لنمبتنب', 'بن تنبململ', 1, 14, 1, 13, '2024-12-19 18:47:58', NULL, '2024-12-19 18:47:58', NULL),
(19, '2024-12-19 00:00:00', NULL, '2', '22222222244456', 1, 'ئىءبلة', 'ىايلةىاي', 1, 14, 1, 13, '2024-12-19 18:49:01', NULL, '2024-12-19 18:49:01', NULL),
(20, '2024-12-11 16:29:19', '000001234', 'Purchases', '00000000225', 1, 'purchases66', NULL, 1, 17, 1, 0, '2024-12-11 16:31:24', 13, '2024-12-13 13:57:31', '2024-12-13 07:57:31'),
(21, '2024-12-04 00:00:00', NULL, '4', '00000000000098', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 18, 1, 13, '2024-12-13 14:11:41', NULL, '2024-12-19 18:46:01', NULL),
(22, NULL, NULL, '1', '00000000000077', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 13, 1, 13, '2024-12-13 14:12:21', 13, '2024-12-13 14:12:42', NULL),
(23, '2024-12-04 00:00:00', NULL, '5', '00000000000030', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 16, 1, 13, '2024-12-13 14:13:14', NULL, '2024-12-13 14:13:14', NULL),
(24, '2024-12-19 00:00:00', NULL, '1', '22222222244458', 1, 'سايلتاننلتملتب بنبتن لنمبتنب', 'بن تنبململ', 1, 14, 1, 13, '2024-12-19 18:47:58', NULL, '2024-12-19 18:47:58', NULL),
(25, '2024-12-19 00:00:00', NULL, '2', '22222222244459', 1, 'ئىءبلة', 'ىايلةىاي', 1, 14, 1, 13, '2024-12-19 18:49:01', NULL, '2024-12-19 18:49:01', NULL),
(26, NULL, NULL, '1', '00000000000077', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 13, 1, 13, '2024-12-13 14:12:21', 13, '2024-12-13 14:12:42', NULL),
(27, '2024-12-04 00:00:00', NULL, '5', '00000000000030', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 16, 1, 13, '2024-12-13 14:13:14', NULL, '2024-12-13 14:13:14', NULL),
(28, '2024-12-19 00:00:00', NULL, '1', '22222222244458', 1, 'سايلتاننلتملتب بنبتن لنمبتنب', 'بن تنبململ', 1, 14, 1, 13, '2024-12-19 18:47:58', NULL, '2024-12-19 18:47:58', NULL),
(29, '2024-12-19 00:00:00', NULL, '2', '22222222244459', 1, 'ئىءبلة', 'ىايلةىاي', 1, 14, 1, 13, '2024-12-19 18:49:01', NULL, '2024-12-19 18:49:01', NULL),
(30, '2024-12-20 00:00:00', NULL, '1', '12457836912584', 2, 'ئءرى تبن نغ معمغ ثغثف', 'نفغغ خغكعحجع9', 1, 13, 1, 13, '2024-12-20 14:44:58', NULL, '2024-12-20 14:44:58', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
