-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2025 at 06:50 PM
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_receipts`
--

INSERT INTO `store_receipts` (`id`, `reception_date`, `reference`, `reference_type`, `serial`, `direction`, `brief`, `notes`, `status`, `admin_id`, `store_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(44, '2025-01-01 00:00:00', '12345678901000', '1', '12345678901200', 1, 'Brief description 5', '\'Notes 5', 1, 13, 1, 13, '2025-01-03 18:31:08', NULL, '2025-01-03 18:31:08', NULL),
(45, '2025-01-04 00:00:00', '12345678901001', '1', '12345678901201', 2, 'Brief description 5', '\'Notes 5', 1, 14, 1, 13, '2025-01-03 18:31:52', NULL, '2025-01-03 18:31:52', NULL),
(46, '2024-12-31 00:00:00', '12345678901002', '2', '12345678901202', 1, 'Brief description 5', '\'Notes 5', 3, 14, 1, 13, '2025-01-03 18:32:22', 13, '2025-01-03 18:48:47', NULL),
(47, '2025-01-10 00:00:00', '12345678901003', '2', '12345678901203', 2, 'Brief description 5', '\'Notes 5', 3, 16, 1, 13, '2025-01-03 18:32:54', 13, '2025-01-03 18:48:33', NULL),
(48, '2025-01-05 00:00:00', '12345678901004', '8', '12345678901204', 1, 'Brief description 5', '\'Notes 5', 1, 16, 1, 13, '2025-01-03 18:33:47', NULL, '2025-01-03 18:33:47', NULL),
(49, '2025-01-06 00:00:00', '12345678901005', '4', '12345678901205', 1, 'Brief description 5', '\'Notes 5', 1, 16, 1, 13, '2025-01-03 18:34:34', NULL, '2025-01-03 18:34:34', NULL),
(50, '2025-01-16 00:00:00', '00000000000167', '5', '00000000000166', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 17, 1, 13, '2025-01-03 18:36:01', NULL, '2025-01-03 18:36:01', NULL),
(51, '2025-01-23 00:00:00', '00000000000167', '6', '99999999999999', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 17, 1, 13, '2025-01-03 18:41:05', NULL, '2025-01-03 18:41:05', NULL),
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
(65, '2025-01-22 00:00:00', '00000000000167', '6', '99999999999993', 2, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 13, 1, 13, '2025-01-03 18:43:55', 13, '2025-01-03 18:47:51', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
