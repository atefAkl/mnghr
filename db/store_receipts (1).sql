-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2024 at 05:12 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_receipts`
--

INSERT INTO `store_receipts` (`id`, `reception_date`, `reference`, `reference_type`, `serial`, `direction`, `brief`, `notes`, `status`, `admin_id`, `store_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(35, '2024-12-26 00:00:00', '000000880001', '5', '00000000000066', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', NULL),
(37, '2024-12-26 00:00:00', '000000880001', '5', '00000000000077', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 0, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 14:45:32', NULL),
(39, '2024-12-26 00:00:00', '000000880001', '5', '00000000000088', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', NULL),
(40, '2024-12-26 00:00:00', '000000880001', '5', '00000000000099', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', '2024-12-28 12:15:59'),
(41, '2024-12-26 00:00:00', '000000880001', '5', '00000000000010', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 1, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', '2024-12-28 12:15:59'),
(42, '2024-12-26 00:00:00', '000000880001', '5', '00000000000084', 1, 'Adirondack Chair, Folding Chair 100.00', 'Adirondack Chair, Folding Chair 100.00', 2, 14, 1, 13, '2024-12-28 12:14:58', NULL, '2024-12-28 12:15:59', '2024-12-28 12:15:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
