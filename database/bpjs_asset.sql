-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 01:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpjs_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivas`
--

CREATE TABLE `aktivas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_perolehan` decimal(20,2) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `penurunan_nilai` decimal(20,2) DEFAULT NULL,
  `umum_approved` tinyint(1) NOT NULL DEFAULT 0,
  `keuangan_approved` tinyint(1) NOT NULL DEFAULT 0,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktivas`
--

INSERT INTO `aktivas` (`id`, `nilai_perolehan`, `tgl_perolehan`, `penurunan_nilai`, `umum_approved`, `keuangan_approved`, `barang_id`, `created_at`, `updated_at`) VALUES
(2, '2225750000.00', '1990-03-12', NULL, 1, 1, 1, '2020-08-24 08:12:43', '2020-08-24 09:53:08'),
(3, '302300.00', '1970-01-01', NULL, 1, 1, 3, '2020-08-24 08:45:27', '2020-08-24 09:53:20'),
(4, '0.00', '1990-03-12', NULL, 1, 1, 3, '2020-08-24 08:46:08', '2020-08-24 09:53:30'),
(5, '163700000.00', '2009-04-06', NULL, 1, 1, 19, '2020-08-24 09:00:11', '2020-08-24 09:43:13'),
(6, '303500000.00', '2008-04-07', NULL, 1, 1, 18, '2020-08-24 09:03:26', '2020-08-24 09:23:16'),
(7, '631000000.00', '2018-09-28', NULL, 1, 1, 26, '2020-08-24 09:04:17', '2020-08-24 09:23:29'),
(8, '346000000.00', '2011-03-23', NULL, 1, 1, 28, '2020-08-24 09:12:12', '2020-08-24 09:23:42'),
(9, '194800000.00', '2007-04-10', NULL, 1, 1, 17, '2020-08-24 09:14:49', '2020-08-24 09:24:07'),
(10, '208500000.00', '2010-05-11', NULL, 1, 1, 20, '2020-08-24 09:15:56', '2020-08-24 09:24:17'),
(11, '204000000.00', '2011-03-23', NULL, 1, 1, 21, '2020-08-24 09:17:03', '2020-08-24 09:24:30'),
(12, '282500000.00', '2012-03-14', NULL, 1, 1, 22, '2020-08-24 09:17:50', '2020-08-24 09:25:20'),
(13, '508200000.00', '2014-12-01', NULL, 1, 1, 23, '2020-08-24 09:18:41', '2020-08-24 09:34:56'),
(14, '5120000000.00', '2016-12-27', NULL, 1, 1, 24, '2020-08-24 09:19:38', '2021-02-09 12:25:55'),
(15, '362200000.00', '2018-09-20', NULL, 1, 1, 25, '2020-08-24 09:20:31', '2020-08-24 09:35:11'),
(16, '23030000.00', '2018-09-26', NULL, 1, 1, 27, '2020-08-24 09:21:46', '2020-08-24 09:35:59'),
(17, '2272481084.00', '1993-07-01', NULL, 1, 1, 5, '2020-08-25 02:51:09', '2020-08-25 02:54:55'),
(18, '124035345.00', '2000-12-29', NULL, 1, 1, 4, '2020-08-25 02:51:49', '2020-08-25 02:55:21'),
(19, '11833000.00', '2006-03-01', NULL, 1, 1, 6, '2020-08-25 02:53:29', '2020-08-25 02:55:35'),
(20, '157955000.00', '2006-09-01', NULL, 1, 0, 7, '2020-08-25 03:35:13', '2020-08-25 03:35:13'),
(22, '6375000.00', '2011-05-04', NULL, 1, 0, 374, '2020-08-25 03:39:21', '2020-08-25 03:39:21'),
(23, '99210000.00', '2008-08-27', NULL, 1, 0, 16, '2020-08-25 03:40:18', '2020-08-25 03:40:18'),
(25, '6375000.00', '2011-05-04', NULL, 1, 0, 376, '2020-08-25 03:41:29', '2020-08-25 03:41:29'),
(26, '6375000.00', '2011-05-04', NULL, 1, 0, 375, '2020-08-25 03:42:37', '2020-08-25 03:42:37'),
(28, '2040000.00', '2011-05-04', NULL, 1, 0, 377, '2020-08-25 03:44:40', '2020-08-25 03:44:40'),
(30, '2040000.00', '2011-05-04', NULL, 1, 0, 378, '2020-08-25 03:45:17', '2020-08-25 03:45:17'),
(31, '280751000.00', '2010-10-11', NULL, 1, 0, 9, '2020-08-25 03:45:22', '2020-08-25 03:45:22'),
(32, '210768000.00', '2012-11-12', NULL, 1, 0, 10, '2020-08-25 03:46:12', '2020-08-25 03:46:12'),
(33, '14500000.00', '2012-04-09', NULL, 1, 0, 379, '2020-08-25 03:47:03', '2020-08-25 03:47:03'),
(34, '166086500.00', '2016-12-29', NULL, 1, 0, 11, '2020-08-25 03:47:14', '2020-08-25 03:47:14'),
(35, '6325000.00', '2000-08-30', NULL, 1, 0, 33, '2020-08-25 03:47:30', '2020-08-25 03:47:30'),
(36, '524141398.00', '2000-12-29', NULL, 1, 0, 12, '2020-08-25 03:48:12', '2020-08-25 03:48:12'),
(37, '8975000.00', '2012-09-28', NULL, 1, 0, 380, '2020-08-25 03:49:11', '2020-08-25 03:49:11'),
(38, '15500000.00', '2012-09-28', NULL, 1, 0, 381, '2020-08-25 03:50:27', '2020-08-25 03:50:27'),
(39, '277848753.00', '2000-12-29', NULL, 1, 0, 13, '2020-08-25 03:51:35', '2020-08-25 03:51:35'),
(40, '15500000.00', '2012-09-28', NULL, 1, 0, 382, '2020-08-25 03:51:44', '2020-08-25 03:51:44'),
(41, '18130000.00', '2008-08-27', NULL, 1, 0, 8, '2020-08-25 03:52:36', '2020-08-25 03:52:36'),
(42, '95656000.00', '2009-06-25', NULL, 1, 0, 15, '2020-08-25 03:54:56', '2020-08-25 03:54:56'),
(43, '282230900.00', '2015-02-20', NULL, 1, 0, 14, '2020-08-25 03:55:47', '2020-08-25 03:55:47'),
(44, '8985000.00', '2013-04-17', NULL, 1, 0, 383, '2020-08-25 03:56:35', '2020-08-25 03:56:35'),
(45, '2750000.00', '2000-08-30', NULL, 1, 0, 35, '2020-08-25 03:57:47', '2020-08-25 03:57:47'),
(46, '8985000.00', '2013-04-17', NULL, 1, 0, 384, '2020-08-25 03:58:23', '2020-08-25 04:06:14'),
(47, '660000.00', '2000-08-30', NULL, 1, 0, 36, '2020-08-25 03:59:07', '2020-08-25 03:59:07'),
(48, '8985000.00', '2013-04-17', NULL, 1, 0, 385, '2020-08-25 04:00:22', '2020-08-25 04:00:22'),
(49, '4950000.00', '2000-08-30', NULL, 1, 0, 37, '2020-08-25 04:00:41', '2020-08-25 04:00:41'),
(50, '4950000.00', '2000-08-30', NULL, 1, 0, 38, '2020-08-25 04:02:47', '2020-08-25 04:02:47'),
(52, '8985000.00', '2013-04-17', NULL, 1, 0, 385, '2020-08-25 04:03:48', '2020-08-25 04:03:48'),
(53, '4950000.00', '2000-08-30', NULL, 1, 0, 39, '2020-08-25 04:03:59', '2020-08-25 04:03:59'),
(55, '2750000.00', '2000-08-30', NULL, 1, 0, 40, '2020-08-25 04:05:17', '2020-08-25 04:05:17'),
(58, '770000.00', '2000-08-30', NULL, 1, 0, 41, '2020-08-25 04:07:15', '2020-08-25 04:07:15'),
(59, '8985000.00', '2013-04-17', NULL, 1, 0, 386, '2020-08-25 04:07:43', '2020-08-25 04:07:43'),
(61, '8985000.00', '2013-04-17', NULL, 1, 0, 386, '2020-08-25 04:08:32', '2020-08-25 04:08:32'),
(62, '7150000.00', '2000-08-30', NULL, 1, 0, 42, '2020-08-25 04:08:56', '2020-08-25 04:08:56'),
(65, '7150000.00', '2000-08-30', NULL, 1, 0, 43, '2020-08-25 04:10:10', '2020-08-25 04:10:10'),
(69, '4422150.00', '2000-11-09', NULL, 1, 0, 44, '2020-08-25 04:12:04', '2020-08-25 04:12:04'),
(71, '8985000.00', '2013-04-17', NULL, 1, 0, 386, '2020-08-25 04:13:07', '2020-08-25 04:13:07'),
(75, '2194500.00', '2000-08-30', NULL, 1, 0, 45, '2020-08-25 04:16:46', '2020-08-25 04:16:46'),
(77, '6600000.00', '2000-08-30', NULL, 1, 0, 636, '2020-08-25 04:17:12', '2020-08-25 04:17:12'),
(78, '4730000.00', '2000-08-30', NULL, 1, 0, 637, '2020-08-25 04:18:13', '2020-08-25 04:18:13'),
(80, '2948100.00', '2000-11-09', NULL, 1, 0, 46, '2020-08-25 04:18:48', '2020-08-25 04:18:48'),
(81, '4730000.00', '2000-08-30', NULL, 1, 0, 638, '2020-08-25 04:19:11', '2020-08-25 04:19:11'),
(82, '650000.00', '2001-03-01', NULL, 1, 0, 639, '2020-08-25 04:19:59', '2020-08-25 04:19:59'),
(83, '589620.00', '2000-11-09', NULL, 1, 0, 47, '2020-08-25 04:20:31', '2020-08-25 04:20:31'),
(84, '15090000.00', '2003-04-22', NULL, 1, 0, 640, '2020-08-25 04:20:43', '2020-08-25 04:20:43'),
(86, '589620.00', '2000-11-09', NULL, 1, 0, 48, '2020-08-25 04:21:28', '2020-08-25 04:21:28'),
(89, '589620.00', '2000-11-09', NULL, 1, 0, 49, '2020-08-25 04:22:43', '2020-08-25 04:22:43'),
(90, '4840000.00', '2004-06-28', NULL, 1, 0, 642, '2020-08-25 04:22:44', '2020-08-25 04:22:44'),
(91, '2400000.00', '2006-12-01', NULL, 1, 0, 643, '2020-08-25 04:23:29', '2020-08-25 04:23:29'),
(92, '589620.00', '2000-11-09', NULL, 1, 0, 50, '2020-08-25 04:23:53', '2020-08-25 04:23:53'),
(93, '17125000.00', '2006-04-18', NULL, 1, 0, 644, '2020-08-25 04:24:25', '2020-08-25 04:24:25'),
(95, '589620.00', '2000-11-09', NULL, 1, 0, 51, '2020-08-25 04:25:01', '2020-08-25 04:25:01'),
(96, '8500000.00', '2006-04-18', NULL, 1, 0, 645, '2020-08-25 04:25:05', '2020-08-25 04:25:05'),
(97, '2500000.00', '2006-05-17', NULL, 1, 0, 646, '2020-08-25 04:25:48', '2020-08-25 04:25:48'),
(98, '589620.00', '2000-11-09', NULL, 1, 0, 52, '2020-08-25 04:26:07', '2020-08-25 04:26:07'),
(99, '589620.00', '2000-11-09', NULL, 1, 0, 53, '2020-08-25 04:27:09', '2020-08-25 04:27:09'),
(101, '29950000.00', '2006-05-01', NULL, 1, 0, 647, '2020-08-25 04:28:06', '2020-08-25 04:28:06'),
(102, '589620.00', '2000-11-09', NULL, 1, 0, 53, '2020-08-25 04:28:20', '2020-08-25 04:28:20'),
(105, '348859.00', '2000-11-09', NULL, 1, 0, 47, '2020-08-25 04:29:45', '2020-08-25 04:29:45'),
(107, '348859.00', '2000-11-09', NULL, 1, 0, 48, '2020-08-25 04:30:32', '2020-08-25 04:30:32'),
(110, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:31:55', '2020-08-25 04:31:55'),
(111, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:32:39', '2020-08-25 04:32:39'),
(113, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:33:47', '2020-08-25 04:33:47'),
(114, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:34:07', '2020-08-25 04:34:07'),
(117, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:35:42', '2020-08-25 04:35:42'),
(118, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:36:01', '2020-08-25 04:36:01'),
(120, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:36:20', '2020-08-25 04:36:20'),
(122, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:36:43', '2020-08-25 04:36:43'),
(123, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:37:03', '2020-08-25 04:37:03'),
(124, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:37:40', '2020-08-25 04:37:40'),
(128, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:39:11', '2020-08-25 04:39:11'),
(130, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:39:28', '2020-08-25 04:39:28'),
(131, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:39:48', '2020-08-25 04:39:48'),
(133, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:40:07', '2020-08-25 04:40:07'),
(135, '393080.00', '2000-11-09', NULL, 1, 0, 61, '2020-08-25 04:40:29', '2020-08-25 04:40:29'),
(136, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:40:49', '2020-08-25 04:40:49'),
(139, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:41:09', '2020-08-25 04:41:09'),
(142, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:42:05', '2020-08-25 04:42:05'),
(143, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:42:26', '2020-08-25 04:42:26'),
(146, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:42:47', '2020-08-25 04:42:47'),
(147, '393080.00', '2000-11-09', NULL, 1, 0, 61, '2020-08-25 04:43:08', '2020-08-25 04:43:08'),
(148, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:43:28', '2020-08-25 04:43:28'),
(149, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:43:47', '2020-08-25 04:43:47'),
(151, '393080.00', '2000-11-09', NULL, 1, 0, 58, '2020-08-25 04:44:33', '2020-08-25 04:44:33'),
(152, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:44:53', '2020-08-25 04:44:53'),
(154, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:45:12', '2020-08-25 04:45:12'),
(155, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:45:32', '2020-08-25 04:45:32'),
(156, '393080.00', '2000-11-09', NULL, 1, 0, 60, '2020-08-25 04:45:53', '2020-08-25 04:45:53'),
(158, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:46:13', '2020-08-25 04:46:13'),
(164, '393080.00', '2000-11-09', NULL, 1, 0, 57, '2020-08-25 04:50:28', '2020-08-25 04:50:28'),
(172, '1000000000.00', '2020-08-24', NULL, 1, 1, 750, '2020-08-25 09:26:55', '2020-08-25 09:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Auth\\User\\User', 3, 'created', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 1, '[]', '{\"pemohon_id\":\"3\",\"tgl_mulai\":\"2020-01-01\",\"tgl_selesai\":\"2020-01-05\",\"keterangan\":\"SUBCODE\",\"status\":\"pending\",\"updated_at\":\"2020-08-20 15:22:42\",\"created_at\":\"2020-08-20 15:22:42\",\"id\":1}', 'http://192.168.100.10:8000/peminjaman', '192.168.101.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-20 08:22:42', '2020-08-20 08:22:42'),
(2, 'App\\Models\\Auth\\User\\User', 15, 'created', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 2, '[]', '{\"pemohon_id\":\"15\",\"tgl_mulai\":\"2020-08-25\",\"tgl_selesai\":\"2020-08-26\",\"keterangan\":null,\"status\":\"pending\",\"updated_at\":\"2020-08-25 11:59:23\",\"created_at\":\"2020-08-25 11:59:23\",\"id\":2}', 'http://172.25.5.112:8000/peminjaman', '172.25.5.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 04:59:23', '2020-08-25 04:59:23'),
(3, 'App\\Models\\Auth\\User\\User', 7, 'updated', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 2, '{\"peninjau_id\":null,\"status\":\"pending\",\"updated_at\":\"2020-08-25 11:59:23\"}', '{\"peninjau_id\":\"7\",\"status\":\"approved\",\"updated_at\":\"2020-08-25 12:02:05\"}', 'http://172.25.5.112:8000/peminjaman/2', '172.25.5.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 05:02:05', '2020-08-25 05:02:05'),
(4, 'App\\Models\\Auth\\User\\User', 15, 'created', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 3, '[]', '{\"pemohon_id\":\"15\",\"tgl_mulai\":\"2020-08-25\",\"tgl_selesai\":\"2020-08-26\",\"keterangan\":null,\"status\":\"pending\",\"updated_at\":\"2020-08-25 15:46:54\",\"created_at\":\"2020-08-25 15:46:54\",\"id\":3}', 'http://127.0.0.1:8000/peminjaman', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:46:54', '2020-08-25 08:46:54'),
(5, 'App\\Models\\Auth\\User\\User', 4, 'updated', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 3, '{\"peninjau_id\":null,\"updated_at\":\"2020-08-25 15:46:54\"}', '{\"peninjau_id\":\"4\",\"updated_at\":\"2020-08-25 15:48:58\"}', 'http://127.0.0.1:8000/peminjaman/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:48:58', '2020-08-25 08:48:58'),
(6, 'App\\Models\\Auth\\User\\User', 4, 'updated', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 3, '{\"status\":\"pending\",\"updated_at\":\"2020-08-25 15:48:58\"}', '{\"status\":\"approved\",\"updated_at\":\"2020-08-25 15:52:04\"}', 'http://127.0.0.1:8000/peminjaman/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:52:04', '2020-08-25 08:52:04'),
(7, 'App\\Models\\Auth\\User\\User', 7, 'created', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 4, '[]', '{\"pemohon_id\":\"7\",\"tgl_mulai\":\"2020-07-25\",\"tgl_selesai\":\"2020-07-26\",\"keterangan\":null,\"status\":\"pending\",\"updated_at\":\"2020-08-25 15:57:32\",\"created_at\":\"2020-08-25 15:57:32\",\"id\":4}', 'http://127.0.0.1:8000/peminjaman', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:57:33', '2020-08-25 08:57:33'),
(8, 'App\\Models\\Auth\\User\\User', 4, 'updated', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 4, '{\"peninjau_id\":null,\"status\":\"pending\",\"updated_at\":\"2020-08-25 15:57:32\"}', '{\"peninjau_id\":\"4\",\"status\":\"approved\",\"updated_at\":\"2020-08-25 15:58:05\"}', 'http://127.0.0.1:8000/peminjaman/4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:58:05', '2020-08-25 08:58:05'),
(9, 'App\\Models\\Auth\\User\\User', 4, 'updated', 'App\\Models\\Resources\\Peminjaman\\Peminjaman', 4, '{\"tgl_mulai\":\"2020-07-25\",\"tgl_selesai\":\"2020-07-26\",\"updated_at\":\"2020-08-25 15:58:05\"}', '{\"tgl_mulai\":\"2020-08-25\",\"tgl_selesai\":\"2020-08-26\",\"updated_at\":\"2020-08-25 15:59:02\"}', 'http://127.0.0.1:8000/peminjaman/4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', NULL, '2020-08-25 08:59:02', '2020-08-25 08:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kanwil` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_aset` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tanggal` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_registrasi` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `status_guna` enum('guna','non_guna','jual','non_kapitalisasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('baik','rusak_ringan','rusak_berat','hilang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kode_kanwil`, `kode_aset`, `kode_tanggal`, `kode_registrasi`, `nama_barang`, `properties`, `status_guna`, `kondisi`, `keterangan`, `kategori_id`, `peminjaman_id`, `created_at`, `updated_at`) VALUES
(1, '905', 'T01', 'C90', '0001', 'JL PEMUDA 130 SEKAYU, SEMARANG', '{\"status_tanah\":\"HGB\",\"sertifikat\":{\"nomor\":\"101\",\"masa_berlaku\":\"20\",\"tanggal_berakhir\":\"2028-06-07\"},\"luas\":\"1575\"}', 'guna', 'baik', NULL, 1, NULL, '2020-08-09 20:38:11', '2020-08-09 20:38:11'),
(2, '905', 'T01', 'C90', '0001', 'JL PEMUDA 130 SEKAYU, SEMARANG', '{\"status_tanah\":\"HGB\",\"sertifikat\":{\"nomor\":\"102\",\"masa_berlaku\":\"20\",\"tanggal_berakhir\":\"2028-06-07\"},\"luas\":\"1295\"}', 'guna', 'baik', 'SUBCODE', 1, NULL, '2020-08-09 20:38:51', '2020-08-09 20:38:51'),
(3, '905', 'T01', 'A70', '0001', 'JL. KELUD SELATAN I/15 DS. KARANGKUMPUL', '{\"status_tanah\":\"HGB\",\"sertifikat\":{\"nomor\":\"162\",\"masa_berlaku\":\"20\",\"tanggal_berakhir\":\"2028-06-07\"},\"luas\":\"530\"}', 'guna', 'baik', NULL, 1, NULL, '2020-08-09 20:39:11', '2020-08-09 20:39:11'),
(4, '905', 'G01', 'G93', '0001', 'GEDUNG KANTOR', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', NULL, 5, NULL, '2020-08-08 17:59:00', '2020-08-08 17:59:00'),
(5, '905', 'G01', 'L00', '0002', 'GEDUNG KANTOR', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 17:59:30', '2020-08-08 17:59:30'),
(6, '905', 'G01', 'C06', '0003', 'SEKAT RUANG KABAG', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 17:59:58', '2020-08-08 17:59:58'),
(7, '905', 'G01', 'I06', '0004', 'REHAP PLAFON LT. III', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', NULL, 3, NULL, '2020-08-08 18:00:13', '2020-08-08 18:00:13'),
(8, '905', 'G01', 'H08', '0005', 'Perpanjangan HGB', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', NULL, 4, NULL, '2020-08-08 18:00:26', '2020-08-08 18:00:26'),
(9, '905', 'G01', 'J10', '0006', 'Renov. Plafond lt. 1 & 2', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 18:00:46', '2020-08-08 18:00:46'),
(10, '905', 'G01', 'K12', '0012', 'Renov. Ruangan Lt. 1, 2 & 3', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 18:01:02', '2020-08-08 18:01:02'),
(11, '905', 'G01', 'L16', '0008', 'FASAD TAMPAK MUKA', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 18:01:20', '2020-08-08 18:01:20'),
(12, '905', 'G03', 'L00', '0001', 'GEDUNG ARSIP', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', NULL, 5, NULL, '2020-08-08 18:01:36', '2020-08-08 18:01:36'),
(13, '905', 'G02', 'L00', '0001', 'RUMAH DINAS', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', NULL, 4, NULL, '2020-08-08 18:01:52', '2020-08-08 18:01:52'),
(14, '905', 'G02', 'F09', '0003', 'Renovasi', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 4, NULL, '2020-08-08 18:02:27', '2020-08-08 18:02:27'),
(15, '905', 'G02', 'B15', '0004', 'Renovasi', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 18:04:12', '2020-08-08 18:04:12'),
(16, '905', 'G01', 'H08', '0005', 'Perpanjangan HGB_08', '{\"imb\":{\"tanggal\":null,\"nomor\":null,\"instansi\":null}}', 'guna', 'baik', 'SUBCODE', 3, NULL, '2020-08-08 18:05:07', '2020-08-08 18:05:07'),
(17, '905', 'M03', 'D07', '0008', 'MOBIL', '{\"merk\":\"TYT.KIJANG INOVA G\",\"nomor\":{\"norangka\":\"MHFXW42G372084820\",\"nomesin\":\"1TR6355423\",\"nopolis\":\"H 8536 YA\"},\"tahunpembuatan\":\"2007\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, 1, '2020-08-08 14:04:44', '2020-08-20 08:22:42'),
(18, '905', 'M01', 'D08', '0009', 'MOBIL', '{\"merk\":\"TYT ALTIS\",\"nomor\":{\"norangka\":\"MR053ZEE286000349\",\"nomesin\":\"1ZZ4739997\",\"nopolis\":\"H 7607 EF\"},\"tahunpembuatan\":\"2008\",\"type\":\"SEDAN\"}', 'guna', 'baik', 'KOSONG', 7, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(19, '905', 'M03', 'D09', '0010', 'MOBIL', '{\"merk\":\"TYT AVANZA G\",\"nomor\":{\"norangka\":\"MHFMICA4J9K020262\",\"nomesin\":\"DBD8262\",\"nopolis\":\"H 8976 ES\"},\"tahunpembuatan\":\"2009\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(20, '905', 'M03', 'E10', '0011', 'MOBIL', '{\"merk\":\"TYT.KIJANG INOVA E\",\"nomor\":{\"norangka\":\"MHFXW41G3A0038926\",\"nomesin\":\"1TR-6856687\",\"nopolis\":\"H 8674 ZS\"},\"tahunpembuatan\":\"2010\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(21, '905', 'M03', 'C11', '0013', 'MOBIL', '{\"merk\":\"TYT.KIJANG INOVA E\",\"nomor\":{\"norangka\":\"MHFXW41G9B0043842\",\"nomesin\":\"1TR7073770\",\"nopolis\":\"H 9342 GA\"},\"tahunpembuatan\":\"2011\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(22, '905', 'M03', 'C12', '0014', 'MOBIL', '{\"merk\":\"K. INNOVA V M/T\",\"nomor\":{\"norangka\":\"MHFXW43G9C4064150\",\"nomesin\":\"1TR7271521\",\"nopolis\":\"H 8495 FH\"},\"tahunpembuatan\":\"2012\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(23, '905', 'M03', 'L14', '0008', 'MOBIL', '{\"merk\":\"ISUZU NHR55\",\"nomor\":{\"norangka\":\"MRHCR2640JP810072\",\"nomesin\":\"M058107\",\"nopolis\":\"H 1136 VS\"},\"tahunpembuatan\":\"2014\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(24, '905', 'M03', 'L16', '0015', 'MOBIL', '{\"merk\":\"MITSUBISHI ALL NEW PAJERO DAKAR LIMITED 4X2 A/T\",\"nomor\":{\"norangka\":\"MMBGUKR10GH038635\",\"nomesin\":\"4N15UBC2862\",\"nopolis\":\"H 8371 CFF\"},\"tahunpembuatan\":\"2016\",\"type\":\"JEEP\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(25, '905', 'M03', 'I18', '0016', 'MOBIL', '{\"merk\":\"TYT INNOVA V A/T\",\"nomor\":{\"norangka\":\"MHFGW8EM4JI022252\",\"nomesin\":\"1TR-A525815\",\"nopolis\":\"H 8967 yp\"},\"tahunpembuatan\":\"2018\",\"type\":\"MINI BUS\"}', 'guna', 'baik', 'KOSONG', 8, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(26, '905', 'M01', 'I18', '0017', 'MOBIL', '{\"merk\":\"HONDA ACCORD\",\"nomor\":{\"norangka\":\"MRHCR2640JP810072\",\"nomesin\":\"K24W33000314\",\"nopolis\":\"H 8250 EF\"},\"tahunpembuatan\":\"2018\",\"type\":\"SEDAN\"}', 'guna', 'baik', 'KOSONG', 7, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(27, '905', 'M02', 'I18', '0005', 'SPD MOTOR', '{\"merk\":\"HONDA NEW VARIO 15OCC\",\"nomor\":{\"norangka\":\"MHIKF4118JK232562\",\"nomesin\":\"KF41E1233403\",\"nopolis\":\"H 3188 LF\"},\"tahunpembuatan\":\"2018\",\"type\":\"RODA 2\"}', 'guna', 'baik', 'KOSONG', 9, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(28, '905', 'M03', 'C11', '0013', 'MOBIL', '{\"merk\":\"T. New Altis G A/T\",\"nomor\":{\"norangka\":\"MR053REE2B4300631\",\"nomesin\":\"2ZRX069328\",\"nopolis\":\"H 8246 ES\"},\"tahunpembuatan\":\"2011\",\"type\":\"SEDAN\"}', 'guna', 'baik', 'KOSONG', 7, NULL, '2020-08-08 14:04:44', '2020-08-08 14:04:44'),
(33, '905', 'A01', 'H00', '0001', 'MEJA MAKAN 1 SET', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(34, '905', 'A01', 'H00', '0002', 'MEJA MAKAN 1 SET', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(35, '905', 'A01', 'H00', '0005', 'MEJA RIAS', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(36, '905', 'A01', 'H00', '0007', 'MEJA TAMAN+KURSI', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(37, '905', 'A03', 'H00', '0002', 'LEMARI PAKAIAN 4 P', '{\"merk\":\"VERSASE\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(38, '905', 'A03', 'H00', '0003', 'LEMARI PAKAIAN 3 P', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(39, '905', 'A03', 'H00', '0004', 'LEMARI PAKAIAN 3 P', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(40, '905', 'A03', 'H00', '0005', 'LEMARI HIAS', '{\"merk\":\"VERSASE\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(41, '905', 'A03', 'H00', '0006', 'TEMPAT PAKAIAN', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(42, '905', 'A04', 'H00', '0001', 'SOFA 3.11 + MEJA', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(43, '905', 'A04', 'H00', '0002', 'SOFA 3.11 + MEJA', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(44, '905', 'A01', 'H00', '0004', 'MEJA RAPAT OVAL', '{\"merk\":\"UKURAN 12 ORG\"}', 'guna', 'baik', 'RAPAT LANTAI 2', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(45, '905', 'A02', 'H00', '0001', 'KURSI TELPON', ' {\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(46, '905', 'A02', 'H00', '0001', 'KURSI KERJA', '{\"merk\":\"VENTURA MANAGER\"}', 'guna', 'baik', 'ASDEPWIL BID. PEMASARAN', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(47, '905', 'A02', 'K00', '0030', 'KURSI HADAP', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. UMUM SDM', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(48, '905', 'A02', 'K00', '0031', 'KURSI HADAP', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. UMUM SDM', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(49, '905', 'A02', 'K00', '0033', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. KEUANGAN', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(50, '905', 'A02', 'K00', '0034', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(51, '905', 'A02', 'K00', '0035', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', '4. BELAKANG LT 2', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(52, '905', 'A02', 'K00', '0038', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. PELAYANAN', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(53, '905', 'A02', 'K00', '0039', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. PELAYANAN', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(54, '905', 'A02', 'K00', '0032', 'KURSI RAPAT', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'ASDEPWIL BID. PELAYANAN', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(55, '905', 'A02', 'K00', '0052', 'KURSI HADAP', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'SEKRETARIS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(56, '905', 'A02', 'K00', '0053', 'KURSI HADAP', '{\"merk\":\"STANDART\"}', 'guna', 'baik', 'SEKRETARIS', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(57, '905', 'A02', 'K00', '0054', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(58, '905', 'A02', 'K00', '0055', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(59, '905', 'A02', 'K00', '0056', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(60, '905', 'A02', 'K00', '0057', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(61, '905', 'A02', 'K00', '0058', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(62, '905', 'A02', 'K00', '0059', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(63, '905', 'A02', 'K00', '0060', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(64, '905', 'A02', 'K00', '0061', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(65, '905', 'A02', 'K00', '0062', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(66, '905', 'A02', 'K00', '0063', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(67, '905', 'A02', 'K00', '0064', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(68, '905', 'A02', 'K00', '0065', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(69, '905', 'A02', 'K00', '0066', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(70, '905', 'A02', 'K00', '0067', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(71, '905', 'A02', 'K00', '0068', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(72, '905', 'A02', 'K00', '0069', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(73, '905', 'A02', 'K00', '0070', 'KURSI TRAINING', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 12, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(374, '905', 'C01', 'E11', '0024', 'Personal Computer (PC)', '{\"merk\":\"HP Pro 2000 MT\"}', 'guna', 'baik', 'PM PELAYANAN JHT JP', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(375, '905', 'C01', 'E11', '0025', 'Personal Computer (PC)', '{\"merk\":\"HP Pro 2000 MT\"}', 'guna', 'baik', 'GUDANG', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(376, '905', 'C01', 'E11', '0026', 'Personal Computer (PC)', '{\"merk\":\"HP Pro 2000 MT\"}', 'guna', 'baik', 'SERVER', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(377, '905', 'C01', 'E11', '0028', 'Monitor LED 20', '{\"merk\":\"LG E2050\"}', 'guna', 'baik', 'ASDEPWIL BID. UMUM SDM', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(378, '905', 'C01', 'E11', '0030', 'Monitor LED 20', '{\"merk\":\"LG E2050\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(379, '905', 'C01', 'D12', '0006', 'Laptop/Netebook', '{\"merk\":\"Sony Vaio VPC-SB38GG\"}', 'guna', 'baik', 'SERVER', 14, 2, '2020-08-08 21:04:44', '2020-08-25 04:59:23'),
(380, '905', 'C01', 'I12', '0037', 'Personal Computer (PC)', '{\"merk\":\"HP Pavillion P2-1150L\"}', 'guna', 'baik', 'SEKRETARIS', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(381, '905', 'C01', 'I12', '0038', 'Scanner', '{\"merk\":\"Fujitsu FI630Z\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(382, '905', 'C01', 'I12', '0039', 'Scanner', '{\"merk\":\"Fujitsu FI630Z\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(383, '905', 'C01', 'D13', '0031', 'Personal Computer (PC)', '{\"merk\":\"HP Pavillion P6-2342L\"}', 'guna', 'baik', 'BP3TKI', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(384, '905', 'C01', 'D13', '0032', 'Personal Computer (PC)', '{\"merk\":\"HP Pavillion P6-2342L\"}', 'guna', 'baik', 'MANAGER KASUS KK DAN PAK', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(385, '905', 'C01', 'D13', '0033', 'Personal Computer (PC)', '{\"merk\":\"HP Pavillion P6-2342L\"}', 'guna', 'baik', 'PENATA MADYA KEARSIPAN', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(386, '905', 'C01', 'D13', '0034', 'Personal Computer (PC)', '{\"merk\":\"HP Pavillion P6-2342L\"}', 'guna', 'baik', 'PEMASARAN PU', 14, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(445, '905', 'C30', 'F20', '0001', 'Server', '{\"merk\":\"Pow eredge Dell R240\"}', 'guna', 'baik', 'SERVER', 15, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(446, '905', 'C50', 'J12', '0004', 'HUB', '{\"merk\":\"3 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(447, '905', 'C50', 'J12', '0005', 'HUB', '{\"merk\":\"4 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(448, '905', 'C51', 'L12', '0074', 'Router Cisco', '{\"merk\":\"Cisco 2960SS, FOC1642X590\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(449, '905', 'C50', 'K16', '0001', 'Penambahan Jaringan', '{\"merk\":\"Rak Server Vortuna & Lan\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(450, '905', 'C50', 'C18', '0018', 'Perangkat Video Conference', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(451, '905', 'C50', 'F20', '0019', 'Switch Hub', '{\"merk\":\"Cisco 52 Port\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(523, '905', 'C30', 'F20', '0001', 'Server', '{\"merk\":\"Pow eredge Dell R240\"}', 'guna', 'baik', 'SERVER', 15, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(524, '905', 'C50', 'J12', '0004', 'HUB', '{\"merk\":\"3 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(525, '905', 'C50', 'J12', '0005', 'HUB', '{\"merk\":\"4 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(526, '905', 'C51', 'L12', '0074', 'Router Cisco', '{\"merk\":\"Cisco 2960SS, FOC1642X590\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(527, '905', 'C50', 'K16', '0001', 'Penambahan Jaringan', '{\"merk\":\"Rak Server Vortuna & Lan\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(528, '905', 'C50', 'C18', '0018', 'Perangkat Video Conference', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(529, '905', 'C50', 'F20', '0019', 'Switch Hub', '{\"merk\":\"Cisco 52 Port\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(601, '905', 'C30', 'F20', '0001', 'Server', '{\"merk\":\"Pow eredge Dell R240\"}', 'guna', 'baik', 'SERVER', 15, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(602, '905', 'C50', 'J12', '0004', 'HUB', '{\"merk\":\"3 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(603, '905', 'C50', 'J12', '0005', 'HUB', '{\"merk\":\"4 COM 24 PORT\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(604, '905', 'C51', 'L12', '0074', 'Router Cisco', '{\"merk\":\"Cisco 2960SS, FOC1642X590\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(605, '905', 'C50', 'K16', '0001', 'Penambahan Jaringan', '{\"merk\":\"Rak Server Vortuna & Lan\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(606, '905', 'C50', 'C18', '0018', 'Perangkat Video Conference', '{\"merk\":\"KOSONG\"}', 'guna', 'baik', 'RAPAT LANTAI 3', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(607, '905', 'C50', 'F20', '0019', 'Switch Hub', '{\"merk\":\"Cisco 52 Port\"}', 'guna', 'baik', 'SERVER', 16, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(608, '905', 'C74', 'D12', '0007', 'PRINTER', '{\"merk\":\"HP P2055dn\"}', 'guna', 'baik', 'RAPAT LANTAI 2', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(609, '905', 'C73', 'L15', '0009', 'PRINTER', '{\"merk\":\"EPSON L360\"}', 'guna', 'baik', 'ASDEPWIL BID. PEMASARAN', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(610, '905', 'C73', 'L15', '0010', 'PRINTER', '{\"merk\":\"EPSON L360\"}', 'guna', 'baik', 'ASDEPWIL BID. MMR', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(611, '905', 'C73', 'L15', '0011', 'PRINTER', '{\"merk\":\"EPSON L360\"}', 'guna', 'baik', 'ASDEPWIL BID. KEUANGAN', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(612, '905', 'C73', 'L15', '0012', 'PRINTER', '{\"merk\":\"EPSON L360\"}', 'guna', 'baik', 'ASDEPWIL BID. UMUM SDM', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(613, '905', 'C73', 'L15', '0014', 'PRINTER INKJET', '{\"merk\":\"EPSON L385\"}', 'guna', 'baik', 'STAFF USDM & TI', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(614, '905', 'C73', 'L15', '0015', 'PRINTER INKJET', '{\"merk\":\"EPSON L385\"}', 'guna', 'baik', 'PENATA MADYA KEUANGAN 2', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(615, '905', 'C73', 'L15', '0016', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'DEPUTI DIREKTUR WILAYAH', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(616, '905', 'C73', 'L15', '0017', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'STAFF USDM & TI', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(617, '905', 'C73', 'L15', '0018', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'SEKRETARIS', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(618, '905', 'C73', 'L15', '0019', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'PUM PELAYANAN', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(619, '905', 'C73', 'L15', '0020', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'STAFF USDM & TI', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(620, '905', 'C73', 'L15', '0021', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'STAFF USDM & TI', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(621, '905', 'C73', 'L15', '0022', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'PUP BPU', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(622, '905', 'C73', 'L15', '0023', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'PENATA MR', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(623, '905', 'C73', 'L15', '0024', 'PRINTER INKJET', '{\"merk\":\"EPSON L3150\"}', 'guna', 'baik', 'RESIDEN AUDITOR', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(624, '905', 'C73', 'L15', '0025', 'PRINTER INKJET', '{\"merk\":\"PRO MFP M281fdn\"}', 'guna', 'baik', 'R. TAMU BELAKANG', 17, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(636, '905', 'E10', 'H00', '0003', 'T.TIDUR + KASUR', '{\"merk\":\"VERSASE\"}', 'guna', 'baik', 'RUMAH DINAS', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(637, '905', 'E10', 'H00', '0004', 'T.TIDUR + KASUR', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(638, '905', 'E10', 'H00', '0005', 'T.TIDUR + KASUR', '{\"merk\":\"KAYU JATI\"}', 'guna', 'baik', 'RUMAH DINAS', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(639, '905', 'E09', 'C01', '0013', 'PAPER CUTTER', '{\"merk\":\"LION SK 53\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(640, '905', 'E06', 'D03', '0007', '1 SET AMPLIFIER + TAPE', '{\"merk\":\"YAMAHA\"}', 'guna', 'baik', 'AULA LT 3', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(641, '905', 'E01', 'F04', '0031', 'A C SPLIT 1.5 PK', '{\"merk\":\"PANASONIC\"}', 'guna', 'baik', 'ARSIP', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(642, '905', 'E05', 'F04', '0009', 'TAPE SONY', '{\"merk\":\"MHC W Z 8 D\"}', 'guna', 'baik', 'DEPUTI DIREKTUR WILAYAH', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(643, '905', 'E01', 'L06', '0035', 'AC 1 PK', '{\"merk\":\"LG SPLIT WH\"}', 'guna', 'baik', 'SEKRETARIS', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(644, '905', 'E05', 'D06', '0011', '1 SET SPEKER PEAVY', '{\"merk\":\"PEAVY SP 118-18 USA\"}', 'guna', 'baik', 'AULA LT 3', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(645, '905', 'E05', 'D06', '0012', 'POWER 2600 WT', '{\"merk\":\"MA 3601 HC LALEND\"}', 'guna', 'baik', 'AULA LT 3', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(646, '905', 'E06', 'E06', '0006', 'UPS', '{\"merk\":\"ICA 2000 VA\"}', 'guna', 'baik', 'STORAGE', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(647, '905', 'E06', 'F04', '0004', 'PABX', '{\"merk\":\"PANASONIC\"}', 'guna', 'baik', 'R. BELAKANG LT 2', 20, NULL, '2020-08-08 21:04:44', '2020-08-08 21:04:44'),
(750, '905', 'F01', 'H20', '0006', 'TANAH BARU', '{\"status_tanah\":\"HM\",\"sertifikat\":{\"nomor\":\"000\",\"masa_berlaku\":\"00\",\"tanggal_berakhir\":\"05\\/05\\/2020\"},\"luas\":null}', 'non_guna', 'baik', NULL, 1, NULL, '2020-08-25 09:25:49', '2020-08-25 10:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_peminjamans`
--

CREATE TABLE `deleted_peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) NOT NULL,
  `barang_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`barang_ids`)),
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_manfaat` smallint(6) DEFAULT NULL,
  `persen_residu` smallint(6) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `masa_manfaat`, `persen_residu`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'tanah', 240, 0, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(2, 'bangunan', NULL, NULL, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(3, 'kantor', 48, 20, 2, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(4, 'dinas', 48, 20, 2, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(5, 'lain', 240, 20, 2, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(6, 'kendaraan', NULL, NULL, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(7, 'sedan', 60, 25, 6, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(8, 'non-sedan', 60, 20, 6, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(9, 'sepeda_motor', 60, 10, 6, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(10, 'peralatan_kantor', NULL, NULL, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(11, 'mesin', 48, 5, 10, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(12, 'perabot', 48, 5, 10, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(13, 'peralatan_komputer', NULL, NULL, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(14, 'komputer', 48, 5, 13, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(15, 'server', 48, 5, 13, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(16, 'jaringan', 48, 5, 13, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(17, 'printer', 48, 5, 13, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(18, 'lain-lain', NULL, NULL, NULL, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(19, 'interior', 48, 5, 18, '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(20, 'peralatan_lain', 48, 5, 18, '2020-08-20 08:11:43', '2020-08-20 08:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasis`
--

CREATE TABLE `konfigurasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konfigurasis`
--

INSERT INTO `konfigurasis` (`id`, `email`, `website`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'care@bpjsketenagakerjaan.go.id', 'https://www.bpjsketenagakerjaan.go.id/', '(024) 3520279', 'RJl. Pemuda No.130, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132', 'https://www.facebook.com/bpjskinfo', 'https://www.instagram.com/bpjs.ketenagakerjaan', 'MELESTARIKAN MASA LALU DAN BERKEMBANG DI MASA DEPAN', 'logo-1597891096', 'icon-1597891794', '2020-08-20 08:11:43', '2020-08-20 08:11:43');

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
(1, '2013_04_09_062329_create_revisions_table', 1),
(2, '2014_10_12_000002_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_07_20_000013_create_aktivas_table', 1),
(6, '2020_07_20_000014_create_barangs_table', 1),
(7, '2020_07_20_014240_create_kategoris_table', 1),
(8, '2020_07_20_014242_create_konfigurasis_table', 1),
(9, '2020_07_20_014258_create_peminjamans_table', 1),
(10, '2020_07_20_064039_create_permission_tables', 1),
(11, '2020_08_16_160840_create_audits_table', 1),
(12, '2020_08_17_100819_create_deleted_peminjamans_table', 1),
(13, '2020_08_20_083731_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Auth\\User\\User', 1),
(2, 'App\\Models\\Auth\\User\\User', 2),
(3, 'App\\Models\\Auth\\User\\User', 3),
(3, 'App\\Models\\Auth\\User\\User', 13),
(3, 'App\\Models\\Auth\\User\\User', 14),
(3, 'App\\Models\\Auth\\User\\User', 15),
(4, 'App\\Models\\Auth\\User\\User', 4),
(4, 'App\\Models\\Auth\\User\\User', 7),
(4, 'App\\Models\\Auth\\User\\User', 10),
(4, 'App\\Models\\Auth\\User\\User', 11),
(4, 'App\\Models\\Auth\\User\\User', 12),
(4, 'App\\Models\\Auth\\User\\User', 16),
(5, 'App\\Models\\Auth\\User\\User', 5),
(5, 'App\\Models\\Auth\\User\\User', 8),
(6, 'App\\Models\\Auth\\User\\User', 6);

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
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemohon_id` bigint(20) UNSIGNED NOT NULL,
  `peninjau_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','ditolak','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `pemohon_id`, `peninjau_id`, `status`, `properties`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'pending', NULL, '2020-01-01', '2020-01-05', 'SUBCODE', '2020-08-20 08:22:42', '2020-08-20 08:22:42'),
(2, 15, 7, 'approved', NULL, '2020-08-25', '2020-08-26', NULL, '2020-08-25 04:59:23', '2020-08-25 05:02:05'),
(3, 15, 4, 'approved', NULL, '2020-08-25', '2020-08-26', NULL, '2020-08-25 08:46:54', '2020-08-25 08:52:04'),
(4, 7, 4, 'approved', NULL, '2020-08-25', '2020-08-26', NULL, '2020-08-25 08:57:32', '2020-08-25 08:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'barang-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(2, 'barang-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(3, 'barang-create', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(4, 'barang-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(5, 'barang-delete', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(6, 'aktiva-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(7, 'aktiva-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(8, 'aktiva-create', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(9, 'aktiva-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(10, 'aktiva-delete', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(11, 'peminjaman-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(12, 'peminjaman-self-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(13, 'peminjaman-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(14, 'peminjaman-self-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(15, 'peminjaman-create', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(16, 'peminjaman-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(17, 'peminjaman-self-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(18, 'peminjaman-delete', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(19, 'konfigurasi-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(20, 'konfigurasi-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(21, 'konfigurasi-create', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(22, 'konfigurasi-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(23, 'konfigurasi-delete', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(24, 'user-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(25, 'user-self-show', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(26, 'user-index', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(27, 'user-create', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(28, 'user-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(29, 'user-self-edit', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(30, 'user-delete', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `revisionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revisions`
--

INSERT INTO `revisions` (`id`, `revisionable_type`, `revisionable_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Resources\\Aktiva\\Aktiva', 1, 4, 'created_at', NULL, '2020-08-24 10:55:39', '2020-08-24 03:55:39', '2020-08-24 03:55:39'),
(2, 'App\\Models\\Resources\\Aktiva\\Aktiva', 1, 5, 'keuangan_approved', '0', '1', '2020-08-24 03:56:14', '2020-08-24 03:56:14'),
(3, 'App\\Models\\Resources\\Aktiva\\Aktiva', 2, 4, 'created_at', NULL, '2020-08-24 15:12:43', '2020-08-24 08:12:43', '2020-08-24 08:12:43'),
(4, 'App\\Models\\Resources\\Aktiva\\Aktiva', 3, 4, 'created_at', NULL, '2020-08-24 15:45:27', '2020-08-24 08:45:27', '2020-08-24 08:45:27'),
(5, 'App\\Models\\Resources\\Aktiva\\Aktiva', 4, 4, 'created_at', NULL, '2020-08-24 15:46:08', '2020-08-24 08:46:08', '2020-08-24 08:46:08'),
(6, 'App\\Models\\Resources\\Aktiva\\Aktiva', 5, 4, 'created_at', NULL, '2020-08-24 16:00:11', '2020-08-24 09:00:11', '2020-08-24 09:00:11'),
(7, 'App\\Models\\Resources\\Aktiva\\Aktiva', 6, 4, 'created_at', NULL, '2020-08-24 16:03:26', '2020-08-24 09:03:26', '2020-08-24 09:03:26'),
(8, 'App\\Models\\Resources\\Aktiva\\Aktiva', 7, 4, 'created_at', NULL, '2020-08-24 16:04:17', '2020-08-24 09:04:17', '2020-08-24 09:04:17'),
(9, 'App\\Models\\Resources\\Aktiva\\Aktiva', 8, 4, 'created_at', NULL, '2020-08-24 16:12:12', '2020-08-24 09:12:12', '2020-08-24 09:12:12'),
(10, 'App\\Models\\Resources\\Aktiva\\Aktiva', 9, 4, 'created_at', NULL, '2020-08-24 16:14:49', '2020-08-24 09:14:49', '2020-08-24 09:14:49'),
(11, 'App\\Models\\Resources\\Aktiva\\Aktiva', 10, 4, 'created_at', NULL, '2020-08-24 16:15:56', '2020-08-24 09:15:56', '2020-08-24 09:15:56'),
(12, 'App\\Models\\Resources\\Aktiva\\Aktiva', 11, 4, 'created_at', NULL, '2020-08-24 16:17:03', '2020-08-24 09:17:03', '2020-08-24 09:17:03'),
(13, 'App\\Models\\Resources\\Aktiva\\Aktiva', 12, 4, 'created_at', NULL, '2020-08-24 16:17:50', '2020-08-24 09:17:50', '2020-08-24 09:17:50'),
(14, 'App\\Models\\Resources\\Aktiva\\Aktiva', 13, 4, 'created_at', NULL, '2020-08-24 16:18:41', '2020-08-24 09:18:41', '2020-08-24 09:18:41'),
(15, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 4, 'created_at', NULL, '2020-08-24 16:19:38', '2020-08-24 09:19:38', '2020-08-24 09:19:38'),
(16, 'App\\Models\\Resources\\Aktiva\\Aktiva', 15, 4, 'created_at', NULL, '2020-08-24 16:20:31', '2020-08-24 09:20:31', '2020-08-24 09:20:31'),
(17, 'App\\Models\\Resources\\Aktiva\\Aktiva', 16, 4, 'created_at', NULL, '2020-08-24 16:21:46', '2020-08-24 09:21:46', '2020-08-24 09:21:46'),
(18, 'App\\Models\\Resources\\Aktiva\\Aktiva', 5, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:22:56', '2020-08-24 09:22:56'),
(19, 'App\\Models\\Resources\\Aktiva\\Aktiva', 6, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:23:16', '2020-08-24 09:23:16'),
(20, 'App\\Models\\Resources\\Aktiva\\Aktiva', 7, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:23:29', '2020-08-24 09:23:29'),
(21, 'App\\Models\\Resources\\Aktiva\\Aktiva', 8, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:23:42', '2020-08-24 09:23:42'),
(22, 'App\\Models\\Resources\\Aktiva\\Aktiva', 9, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:24:07', '2020-08-24 09:24:07'),
(23, 'App\\Models\\Resources\\Aktiva\\Aktiva', 10, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:24:17', '2020-08-24 09:24:17'),
(24, 'App\\Models\\Resources\\Aktiva\\Aktiva', 11, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:24:30', '2020-08-24 09:24:30'),
(25, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:24:45', '2020-08-24 09:24:45'),
(26, 'App\\Models\\Resources\\Aktiva\\Aktiva', 12, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:25:20', '2020-08-24 09:25:20'),
(27, 'App\\Models\\Resources\\Aktiva\\Aktiva', 13, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:34:56', '2020-08-24 09:34:56'),
(28, 'App\\Models\\Resources\\Aktiva\\Aktiva', 15, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:35:11', '2020-08-24 09:35:11'),
(29, 'App\\Models\\Resources\\Aktiva\\Aktiva', 16, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:35:59', '2020-08-24 09:35:59'),
(30, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 5, 'nilai_perolehan', '514000000.00', '5120000000', '2020-08-24 09:40:24', '2020-08-24 09:40:24'),
(31, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 5, 'umum_approved', '1', '0', '2020-08-24 09:40:24', '2020-08-24 09:40:24'),
(32, 'App\\Models\\Resources\\Aktiva\\Aktiva', 5, 5, 'umum_approved', '1', '0', '2020-08-24 09:42:32', '2020-08-24 09:42:32'),
(33, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 4, 'umum_approved', '0', '1', '2020-08-24 09:42:53', '2020-08-24 09:42:53'),
(34, 'App\\Models\\Resources\\Aktiva\\Aktiva', 5, 4, 'umum_approved', '0', '1', '2020-08-24 09:43:13', '2020-08-24 09:43:13'),
(35, 'App\\Models\\Resources\\Aktiva\\Aktiva', 2, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:53:08', '2020-08-24 09:53:08'),
(36, 'App\\Models\\Resources\\Aktiva\\Aktiva', 3, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:53:20', '2020-08-24 09:53:20'),
(37, 'App\\Models\\Resources\\Aktiva\\Aktiva', 4, 5, 'keuangan_approved', '0', '1', '2020-08-24 09:53:30', '2020-08-24 09:53:30'),
(38, 'App\\Models\\Resources\\Aktiva\\Aktiva', 17, 7, 'created_at', NULL, '2020-08-25 09:51:09', '2020-08-25 02:51:09', '2020-08-25 02:51:09'),
(39, 'App\\Models\\Resources\\Aktiva\\Aktiva', 18, 7, 'created_at', NULL, '2020-08-25 09:51:49', '2020-08-25 02:51:49', '2020-08-25 02:51:49'),
(40, 'App\\Models\\Resources\\Aktiva\\Aktiva', 19, 7, 'created_at', NULL, '2020-08-25 09:53:29', '2020-08-25 02:53:29', '2020-08-25 02:53:29'),
(41, 'App\\Models\\Resources\\Aktiva\\Aktiva', 17, 5, 'keuangan_approved', '0', '1', '2020-08-25 02:54:55', '2020-08-25 02:54:55'),
(42, 'App\\Models\\Resources\\Aktiva\\Aktiva', 18, 5, 'keuangan_approved', '0', '1', '2020-08-25 02:55:21', '2020-08-25 02:55:21'),
(43, 'App\\Models\\Resources\\Aktiva\\Aktiva', 19, 5, 'keuangan_approved', '0', '1', '2020-08-25 02:55:35', '2020-08-25 02:55:35'),
(44, 'App\\Models\\Resources\\Aktiva\\Aktiva', 20, 12, 'created_at', NULL, '2020-08-25 10:35:13', '2020-08-25 03:35:13', '2020-08-25 03:35:13'),
(45, 'App\\Models\\Resources\\Aktiva\\Aktiva', 21, 10, 'created_at', NULL, '2020-08-25 10:39:19', '2020-08-25 03:39:19', '2020-08-25 03:39:19'),
(46, 'App\\Models\\Resources\\Aktiva\\Aktiva', 22, 11, 'created_at', NULL, '2020-08-25 10:39:21', '2020-08-25 03:39:22', '2020-08-25 03:39:22'),
(47, 'App\\Models\\Resources\\Aktiva\\Aktiva', 23, 12, 'created_at', NULL, '2020-08-25 10:40:18', '2020-08-25 03:40:18', '2020-08-25 03:40:18'),
(48, 'App\\Models\\Resources\\Aktiva\\Aktiva', 24, 10, 'created_at', NULL, '2020-08-25 10:40:57', '2020-08-25 03:40:57', '2020-08-25 03:40:57'),
(49, 'App\\Models\\Resources\\Aktiva\\Aktiva', 25, 11, 'created_at', NULL, '2020-08-25 10:41:29', '2020-08-25 03:41:29', '2020-08-25 03:41:29'),
(50, 'App\\Models\\Resources\\Aktiva\\Aktiva', 26, 11, 'created_at', NULL, '2020-08-25 10:42:37', '2020-08-25 03:42:37', '2020-08-25 03:42:37'),
(51, 'App\\Models\\Resources\\Aktiva\\Aktiva', 27, 10, 'created_at', NULL, '2020-08-25 10:43:25', '2020-08-25 03:43:25', '2020-08-25 03:43:25'),
(52, 'App\\Models\\Resources\\Aktiva\\Aktiva', 28, 11, 'created_at', NULL, '2020-08-25 10:44:40', '2020-08-25 03:44:40', '2020-08-25 03:44:40'),
(53, 'App\\Models\\Resources\\Aktiva\\Aktiva', 29, 10, 'created_at', NULL, '2020-08-25 10:44:51', '2020-08-25 03:44:51', '2020-08-25 03:44:51'),
(54, 'App\\Models\\Resources\\Aktiva\\Aktiva', 30, 11, 'created_at', NULL, '2020-08-25 10:45:17', '2020-08-25 03:45:17', '2020-08-25 03:45:17'),
(55, 'App\\Models\\Resources\\Aktiva\\Aktiva', 31, 12, 'created_at', NULL, '2020-08-25 10:45:22', '2020-08-25 03:45:22', '2020-08-25 03:45:22'),
(56, 'App\\Models\\Resources\\Aktiva\\Aktiva', 32, 12, 'created_at', NULL, '2020-08-25 10:46:12', '2020-08-25 03:46:12', '2020-08-25 03:46:12'),
(57, 'App\\Models\\Resources\\Aktiva\\Aktiva', 33, 11, 'created_at', NULL, '2020-08-25 10:47:03', '2020-08-25 03:47:03', '2020-08-25 03:47:03'),
(58, 'App\\Models\\Resources\\Aktiva\\Aktiva', 34, 12, 'created_at', NULL, '2020-08-25 10:47:14', '2020-08-25 03:47:14', '2020-08-25 03:47:14'),
(59, 'App\\Models\\Resources\\Aktiva\\Aktiva', 35, 10, 'created_at', NULL, '2020-08-25 10:47:30', '2020-08-25 03:47:30', '2020-08-25 03:47:30'),
(60, 'App\\Models\\Resources\\Aktiva\\Aktiva', 36, 12, 'created_at', NULL, '2020-08-25 10:48:12', '2020-08-25 03:48:12', '2020-08-25 03:48:12'),
(61, 'App\\Models\\Resources\\Aktiva\\Aktiva', 37, 11, 'created_at', NULL, '2020-08-25 10:49:11', '2020-08-25 03:49:11', '2020-08-25 03:49:11'),
(62, 'App\\Models\\Resources\\Aktiva\\Aktiva', 38, 11, 'created_at', NULL, '2020-08-25 10:50:27', '2020-08-25 03:50:27', '2020-08-25 03:50:27'),
(63, 'App\\Models\\Resources\\Aktiva\\Aktiva', 39, 12, 'created_at', NULL, '2020-08-25 10:51:35', '2020-08-25 03:51:35', '2020-08-25 03:51:35'),
(64, 'App\\Models\\Resources\\Aktiva\\Aktiva', 40, 11, 'created_at', NULL, '2020-08-25 10:51:44', '2020-08-25 03:51:44', '2020-08-25 03:51:44'),
(65, 'App\\Models\\Resources\\Aktiva\\Aktiva', 41, 12, 'created_at', NULL, '2020-08-25 10:52:36', '2020-08-25 03:52:36', '2020-08-25 03:52:36'),
(66, 'App\\Models\\Resources\\Aktiva\\Aktiva', 42, 12, 'created_at', NULL, '2020-08-25 10:54:56', '2020-08-25 03:54:56', '2020-08-25 03:54:56'),
(67, 'App\\Models\\Resources\\Aktiva\\Aktiva', 43, 12, 'created_at', NULL, '2020-08-25 10:55:47', '2020-08-25 03:55:47', '2020-08-25 03:55:47'),
(68, 'App\\Models\\Resources\\Aktiva\\Aktiva', 44, 11, 'created_at', NULL, '2020-08-25 10:56:35', '2020-08-25 03:56:35', '2020-08-25 03:56:35'),
(69, 'App\\Models\\Resources\\Aktiva\\Aktiva', 45, 10, 'created_at', NULL, '2020-08-25 10:57:47', '2020-08-25 03:57:47', '2020-08-25 03:57:47'),
(70, 'App\\Models\\Resources\\Aktiva\\Aktiva', 46, 11, 'created_at', NULL, '2020-08-25 10:58:23', '2020-08-25 03:58:23', '2020-08-25 03:58:23'),
(71, 'App\\Models\\Resources\\Aktiva\\Aktiva', 47, 10, 'created_at', NULL, '2020-08-25 10:59:07', '2020-08-25 03:59:07', '2020-08-25 03:59:07'),
(72, 'App\\Models\\Resources\\Aktiva\\Aktiva', 48, 11, 'created_at', NULL, '2020-08-25 11:00:22', '2020-08-25 04:00:22', '2020-08-25 04:00:22'),
(73, 'App\\Models\\Resources\\Aktiva\\Aktiva', 49, 10, 'created_at', NULL, '2020-08-25 11:00:41', '2020-08-25 04:00:41', '2020-08-25 04:00:41'),
(74, 'App\\Models\\Resources\\Aktiva\\Aktiva', 50, 10, 'created_at', NULL, '2020-08-25 11:02:47', '2020-08-25 04:02:47', '2020-08-25 04:02:47'),
(75, 'App\\Models\\Resources\\Aktiva\\Aktiva', 51, 12, 'created_at', NULL, '2020-08-25 11:02:58', '2020-08-25 04:02:58', '2020-08-25 04:02:58'),
(76, 'App\\Models\\Resources\\Aktiva\\Aktiva', 51, 12, 'tgl_perolehan', '2010-12-20', '2010-12-22', '2020-08-25 04:03:24', '2020-08-25 04:03:24'),
(77, 'App\\Models\\Resources\\Aktiva\\Aktiva', 52, 11, 'created_at', NULL, '2020-08-25 11:03:48', '2020-08-25 04:03:48', '2020-08-25 04:03:48'),
(78, 'App\\Models\\Resources\\Aktiva\\Aktiva', 53, 10, 'created_at', NULL, '2020-08-25 11:03:59', '2020-08-25 04:03:59', '2020-08-25 04:03:59'),
(79, 'App\\Models\\Resources\\Aktiva\\Aktiva', 54, 12, 'created_at', NULL, '2020-08-25 11:04:26', '2020-08-25 04:04:26', '2020-08-25 04:04:26'),
(80, 'App\\Models\\Resources\\Aktiva\\Aktiva', 55, 10, 'created_at', NULL, '2020-08-25 11:05:17', '2020-08-25 04:05:17', '2020-08-25 04:05:17'),
(81, 'App\\Models\\Resources\\Aktiva\\Aktiva', 56, 12, 'created_at', NULL, '2020-08-25 11:06:01', '2020-08-25 04:06:01', '2020-08-25 04:06:01'),
(82, 'App\\Models\\Resources\\Aktiva\\Aktiva', 46, 11, 'nilai_perolehan', '8975000.00', '8985000.00', '2020-08-25 04:06:14', '2020-08-25 04:06:14'),
(83, 'App\\Models\\Resources\\Aktiva\\Aktiva', 57, 12, 'created_at', NULL, '2020-08-25 11:07:03', '2020-08-25 04:07:03', '2020-08-25 04:07:03'),
(84, 'App\\Models\\Resources\\Aktiva\\Aktiva', 58, 10, 'created_at', NULL, '2020-08-25 11:07:15', '2020-08-25 04:07:15', '2020-08-25 04:07:15'),
(85, 'App\\Models\\Resources\\Aktiva\\Aktiva', 59, 11, 'created_at', NULL, '2020-08-25 11:07:43', '2020-08-25 04:07:43', '2020-08-25 04:07:43'),
(86, 'App\\Models\\Resources\\Aktiva\\Aktiva', 60, 12, 'created_at', NULL, '2020-08-25 11:08:13', '2020-08-25 04:08:13', '2020-08-25 04:08:13'),
(87, 'App\\Models\\Resources\\Aktiva\\Aktiva', 61, 11, 'created_at', NULL, '2020-08-25 11:08:32', '2020-08-25 04:08:32', '2020-08-25 04:08:32'),
(88, 'App\\Models\\Resources\\Aktiva\\Aktiva', 62, 10, 'created_at', NULL, '2020-08-25 11:08:56', '2020-08-25 04:08:56', '2020-08-25 04:08:56'),
(89, 'App\\Models\\Resources\\Aktiva\\Aktiva', 63, 12, 'created_at', NULL, '2020-08-25 11:09:30', '2020-08-25 04:09:30', '2020-08-25 04:09:30'),
(90, 'App\\Models\\Resources\\Aktiva\\Aktiva', 64, 11, 'created_at', NULL, '2020-08-25 11:10:10', '2020-08-25 04:10:10', '2020-08-25 04:10:10'),
(91, 'App\\Models\\Resources\\Aktiva\\Aktiva', 65, 10, 'created_at', NULL, '2020-08-25 11:10:10', '2020-08-25 04:10:10', '2020-08-25 04:10:10'),
(92, 'App\\Models\\Resources\\Aktiva\\Aktiva', 66, 11, 'created_at', NULL, '2020-08-25 11:10:46', '2020-08-25 04:10:46', '2020-08-25 04:10:46'),
(93, 'App\\Models\\Resources\\Aktiva\\Aktiva', 67, 12, 'created_at', NULL, '2020-08-25 11:10:54', '2020-08-25 04:10:54', '2020-08-25 04:10:54'),
(94, 'App\\Models\\Resources\\Aktiva\\Aktiva', 68, 11, 'created_at', NULL, '2020-08-25 11:11:13', '2020-08-25 04:11:13', '2020-08-25 04:11:13'),
(95, 'App\\Models\\Resources\\Aktiva\\Aktiva', 69, 10, 'created_at', NULL, '2020-08-25 11:12:04', '2020-08-25 04:12:04', '2020-08-25 04:12:04'),
(96, 'App\\Models\\Resources\\Aktiva\\Aktiva', 70, 12, 'created_at', NULL, '2020-08-25 11:12:19', '2020-08-25 04:12:19', '2020-08-25 04:12:19'),
(97, 'App\\Models\\Resources\\Aktiva\\Aktiva', 71, 11, 'created_at', NULL, '2020-08-25 11:13:07', '2020-08-25 04:13:07', '2020-08-25 04:13:07'),
(98, 'App\\Models\\Resources\\Aktiva\\Aktiva', 72, 12, 'created_at', NULL, '2020-08-25 11:14:17', '2020-08-25 04:14:17', '2020-08-25 04:14:17'),
(99, 'App\\Models\\Resources\\Aktiva\\Aktiva', 73, 12, 'created_at', NULL, '2020-08-25 11:15:03', '2020-08-25 04:15:03', '2020-08-25 04:15:03'),
(100, 'App\\Models\\Resources\\Aktiva\\Aktiva', 74, 12, 'created_at', NULL, '2020-08-25 11:15:59', '2020-08-25 04:15:59', '2020-08-25 04:15:59'),
(101, 'App\\Models\\Resources\\Aktiva\\Aktiva', 75, 10, 'created_at', NULL, '2020-08-25 11:16:46', '2020-08-25 04:16:46', '2020-08-25 04:16:46'),
(102, 'App\\Models\\Resources\\Aktiva\\Aktiva', 76, 11, 'created_at', NULL, '2020-08-25 11:16:49', '2020-08-25 04:16:49', '2020-08-25 04:16:49'),
(103, 'App\\Models\\Resources\\Aktiva\\Aktiva', 77, 12, 'created_at', NULL, '2020-08-25 11:17:12', '2020-08-25 04:17:12', '2020-08-25 04:17:12'),
(104, 'App\\Models\\Resources\\Aktiva\\Aktiva', 78, 12, 'created_at', NULL, '2020-08-25 11:18:13', '2020-08-25 04:18:13', '2020-08-25 04:18:13'),
(105, 'App\\Models\\Resources\\Aktiva\\Aktiva', 79, 11, 'created_at', NULL, '2020-08-25 11:18:41', '2020-08-25 04:18:41', '2020-08-25 04:18:41'),
(106, 'App\\Models\\Resources\\Aktiva\\Aktiva', 80, 10, 'created_at', NULL, '2020-08-25 11:18:48', '2020-08-25 04:18:48', '2020-08-25 04:18:48'),
(107, 'App\\Models\\Resources\\Aktiva\\Aktiva', 81, 12, 'created_at', NULL, '2020-08-25 11:19:11', '2020-08-25 04:19:11', '2020-08-25 04:19:11'),
(108, 'App\\Models\\Resources\\Aktiva\\Aktiva', 82, 12, 'created_at', NULL, '2020-08-25 11:19:59', '2020-08-25 04:19:59', '2020-08-25 04:19:59'),
(109, 'App\\Models\\Resources\\Aktiva\\Aktiva', 83, 10, 'created_at', NULL, '2020-08-25 11:20:31', '2020-08-25 04:20:31', '2020-08-25 04:20:31'),
(110, 'App\\Models\\Resources\\Aktiva\\Aktiva', 84, 12, 'created_at', NULL, '2020-08-25 11:20:43', '2020-08-25 04:20:43', '2020-08-25 04:20:43'),
(111, 'App\\Models\\Resources\\Aktiva\\Aktiva', 85, 11, 'created_at', NULL, '2020-08-25 11:20:48', '2020-08-25 04:20:48', '2020-08-25 04:20:48'),
(112, 'App\\Models\\Resources\\Aktiva\\Aktiva', 86, 10, 'created_at', NULL, '2020-08-25 11:21:28', '2020-08-25 04:21:28', '2020-08-25 04:21:28'),
(113, 'App\\Models\\Resources\\Aktiva\\Aktiva', 87, 11, 'created_at', NULL, '2020-08-25 11:21:30', '2020-08-25 04:21:30', '2020-08-25 04:21:30'),
(114, 'App\\Models\\Resources\\Aktiva\\Aktiva', 88, 12, 'created_at', NULL, '2020-08-25 11:22:09', '2020-08-25 04:22:09', '2020-08-25 04:22:09'),
(115, 'App\\Models\\Resources\\Aktiva\\Aktiva', 89, 10, 'created_at', NULL, '2020-08-25 11:22:43', '2020-08-25 04:22:43', '2020-08-25 04:22:43'),
(116, 'App\\Models\\Resources\\Aktiva\\Aktiva', 90, 12, 'created_at', NULL, '2020-08-25 11:22:44', '2020-08-25 04:22:44', '2020-08-25 04:22:44'),
(117, 'App\\Models\\Resources\\Aktiva\\Aktiva', 91, 12, 'created_at', NULL, '2020-08-25 11:23:29', '2020-08-25 04:23:29', '2020-08-25 04:23:29'),
(118, 'App\\Models\\Resources\\Aktiva\\Aktiva', 92, 10, 'created_at', NULL, '2020-08-25 11:23:53', '2020-08-25 04:23:53', '2020-08-25 04:23:53'),
(119, 'App\\Models\\Resources\\Aktiva\\Aktiva', 93, 12, 'created_at', NULL, '2020-08-25 11:24:25', '2020-08-25 04:24:25', '2020-08-25 04:24:25'),
(120, 'App\\Models\\Resources\\Aktiva\\Aktiva', 94, 11, 'created_at', NULL, '2020-08-25 11:24:26', '2020-08-25 04:24:26', '2020-08-25 04:24:26'),
(121, 'App\\Models\\Resources\\Aktiva\\Aktiva', 95, 10, 'created_at', NULL, '2020-08-25 11:25:01', '2020-08-25 04:25:01', '2020-08-25 04:25:01'),
(122, 'App\\Models\\Resources\\Aktiva\\Aktiva', 96, 12, 'created_at', NULL, '2020-08-25 11:25:05', '2020-08-25 04:25:05', '2020-08-25 04:25:05'),
(123, 'App\\Models\\Resources\\Aktiva\\Aktiva', 97, 12, 'created_at', NULL, '2020-08-25 11:25:48', '2020-08-25 04:25:48', '2020-08-25 04:25:48'),
(124, 'App\\Models\\Resources\\Aktiva\\Aktiva', 98, 10, 'created_at', NULL, '2020-08-25 11:26:07', '2020-08-25 04:26:07', '2020-08-25 04:26:07'),
(125, 'App\\Models\\Resources\\Aktiva\\Aktiva', 99, 10, 'created_at', NULL, '2020-08-25 11:27:09', '2020-08-25 04:27:09', '2020-08-25 04:27:09'),
(126, 'App\\Models\\Resources\\Aktiva\\Aktiva', 100, 11, 'created_at', NULL, '2020-08-25 11:27:37', '2020-08-25 04:27:37', '2020-08-25 04:27:37'),
(127, 'App\\Models\\Resources\\Aktiva\\Aktiva', 101, 12, 'created_at', NULL, '2020-08-25 11:28:06', '2020-08-25 04:28:06', '2020-08-25 04:28:06'),
(128, 'App\\Models\\Resources\\Aktiva\\Aktiva', 102, 10, 'created_at', NULL, '2020-08-25 11:28:20', '2020-08-25 04:28:20', '2020-08-25 04:28:20'),
(129, 'App\\Models\\Resources\\Aktiva\\Aktiva', 103, 12, 'created_at', NULL, '2020-08-25 11:29:14', '2020-08-25 04:29:14', '2020-08-25 04:29:14'),
(130, 'App\\Models\\Resources\\Aktiva\\Aktiva', 104, 11, 'created_at', NULL, '2020-08-25 11:29:21', '2020-08-25 04:29:21', '2020-08-25 04:29:21'),
(131, 'App\\Models\\Resources\\Aktiva\\Aktiva', 105, 10, 'created_at', NULL, '2020-08-25 11:29:45', '2020-08-25 04:29:45', '2020-08-25 04:29:45'),
(132, 'App\\Models\\Resources\\Aktiva\\Aktiva', 106, 12, 'created_at', NULL, '2020-08-25 11:30:23', '2020-08-25 04:30:23', '2020-08-25 04:30:23'),
(133, 'App\\Models\\Resources\\Aktiva\\Aktiva', 107, 10, 'created_at', NULL, '2020-08-25 11:30:32', '2020-08-25 04:30:32', '2020-08-25 04:30:32'),
(134, 'App\\Models\\Resources\\Aktiva\\Aktiva', 108, 11, 'created_at', NULL, '2020-08-25 11:31:08', '2020-08-25 04:31:08', '2020-08-25 04:31:08'),
(135, 'App\\Models\\Resources\\Aktiva\\Aktiva', 109, 12, 'created_at', NULL, '2020-08-25 11:31:46', '2020-08-25 04:31:46', '2020-08-25 04:31:46'),
(136, 'App\\Models\\Resources\\Aktiva\\Aktiva', 110, 10, 'created_at', NULL, '2020-08-25 11:31:55', '2020-08-25 04:31:55', '2020-08-25 04:31:55'),
(137, 'App\\Models\\Resources\\Aktiva\\Aktiva', 111, 10, 'created_at', NULL, '2020-08-25 11:32:39', '2020-08-25 04:32:39', '2020-08-25 04:32:39'),
(138, 'App\\Models\\Resources\\Aktiva\\Aktiva', 112, 12, 'created_at', NULL, '2020-08-25 11:33:18', '2020-08-25 04:33:18', '2020-08-25 04:33:18'),
(139, 'App\\Models\\Resources\\Aktiva\\Aktiva', 113, 10, 'created_at', NULL, '2020-08-25 11:33:47', '2020-08-25 04:33:47', '2020-08-25 04:33:47'),
(140, 'App\\Models\\Resources\\Aktiva\\Aktiva', 114, 10, 'created_at', NULL, '2020-08-25 11:34:07', '2020-08-25 04:34:07', '2020-08-25 04:34:07'),
(141, 'App\\Models\\Resources\\Aktiva\\Aktiva', 115, 11, 'created_at', NULL, '2020-08-25 11:34:56', '2020-08-25 04:34:56', '2020-08-25 04:34:56'),
(142, 'App\\Models\\Resources\\Aktiva\\Aktiva', 116, 12, 'created_at', NULL, '2020-08-25 11:35:34', '2020-08-25 04:35:34', '2020-08-25 04:35:34'),
(143, 'App\\Models\\Resources\\Aktiva\\Aktiva', 117, 10, 'created_at', NULL, '2020-08-25 11:35:42', '2020-08-25 04:35:42', '2020-08-25 04:35:42'),
(144, 'App\\Models\\Resources\\Aktiva\\Aktiva', 118, 10, 'created_at', NULL, '2020-08-25 11:36:01', '2020-08-25 04:36:01', '2020-08-25 04:36:01'),
(145, 'App\\Models\\Resources\\Aktiva\\Aktiva', 119, 12, 'created_at', NULL, '2020-08-25 11:36:15', '2020-08-25 04:36:15', '2020-08-25 04:36:15'),
(146, 'App\\Models\\Resources\\Aktiva\\Aktiva', 120, 10, 'created_at', NULL, '2020-08-25 11:36:20', '2020-08-25 04:36:20', '2020-08-25 04:36:20'),
(147, 'App\\Models\\Resources\\Aktiva\\Aktiva', 121, 11, 'created_at', NULL, '2020-08-25 11:36:36', '2020-08-25 04:36:36', '2020-08-25 04:36:36'),
(148, 'App\\Models\\Resources\\Aktiva\\Aktiva', 122, 10, 'created_at', NULL, '2020-08-25 11:36:43', '2020-08-25 04:36:43', '2020-08-25 04:36:43'),
(149, 'App\\Models\\Resources\\Aktiva\\Aktiva', 123, 10, 'created_at', NULL, '2020-08-25 11:37:03', '2020-08-25 04:37:03', '2020-08-25 04:37:03'),
(150, 'App\\Models\\Resources\\Aktiva\\Aktiva', 124, 10, 'created_at', NULL, '2020-08-25 11:37:40', '2020-08-25 04:37:40', '2020-08-25 04:37:40'),
(151, 'App\\Models\\Resources\\Aktiva\\Aktiva', 125, 11, 'created_at', NULL, '2020-08-25 11:37:47', '2020-08-25 04:37:47', '2020-08-25 04:37:47'),
(152, 'App\\Models\\Resources\\Aktiva\\Aktiva', 126, 12, 'created_at', NULL, '2020-08-25 11:38:02', '2020-08-25 04:38:02', '2020-08-25 04:38:02'),
(153, 'App\\Models\\Resources\\Aktiva\\Aktiva', 127, 11, 'created_at', NULL, '2020-08-25 11:38:38', '2020-08-25 04:38:38', '2020-08-25 04:38:38'),
(154, 'App\\Models\\Resources\\Aktiva\\Aktiva', 128, 10, 'created_at', NULL, '2020-08-25 11:39:11', '2020-08-25 04:39:11', '2020-08-25 04:39:11'),
(155, 'App\\Models\\Resources\\Aktiva\\Aktiva', 129, 12, 'created_at', NULL, '2020-08-25 11:39:13', '2020-08-25 04:39:13', '2020-08-25 04:39:13'),
(156, 'App\\Models\\Resources\\Aktiva\\Aktiva', 130, 10, 'created_at', NULL, '2020-08-25 11:39:28', '2020-08-25 04:39:29', '2020-08-25 04:39:29'),
(157, 'App\\Models\\Resources\\Aktiva\\Aktiva', 131, 10, 'created_at', NULL, '2020-08-25 11:39:48', '2020-08-25 04:39:48', '2020-08-25 04:39:48'),
(158, 'App\\Models\\Resources\\Aktiva\\Aktiva', 132, 12, 'created_at', NULL, '2020-08-25 11:39:55', '2020-08-25 04:39:55', '2020-08-25 04:39:55'),
(159, 'App\\Models\\Resources\\Aktiva\\Aktiva', 133, 10, 'created_at', NULL, '2020-08-25 11:40:07', '2020-08-25 04:40:07', '2020-08-25 04:40:07'),
(160, 'App\\Models\\Resources\\Aktiva\\Aktiva', 134, 11, 'created_at', NULL, '2020-08-25 11:40:23', '2020-08-25 04:40:23', '2020-08-25 04:40:23'),
(161, 'App\\Models\\Resources\\Aktiva\\Aktiva', 135, 10, 'created_at', NULL, '2020-08-25 11:40:29', '2020-08-25 04:40:29', '2020-08-25 04:40:29'),
(162, 'App\\Models\\Resources\\Aktiva\\Aktiva', 136, 10, 'created_at', NULL, '2020-08-25 11:40:49', '2020-08-25 04:40:49', '2020-08-25 04:40:49'),
(163, 'App\\Models\\Resources\\Aktiva\\Aktiva', 137, 12, 'created_at', NULL, '2020-08-25 11:40:53', '2020-08-25 04:40:53', '2020-08-25 04:40:53'),
(164, 'App\\Models\\Resources\\Aktiva\\Aktiva', 138, 11, 'created_at', NULL, '2020-08-25 11:40:58', '2020-08-25 04:40:58', '2020-08-25 04:40:58'),
(165, 'App\\Models\\Resources\\Aktiva\\Aktiva', 139, 10, 'created_at', NULL, '2020-08-25 11:41:09', '2020-08-25 04:41:09', '2020-08-25 04:41:09'),
(166, 'App\\Models\\Resources\\Aktiva\\Aktiva', 140, 11, 'created_at', NULL, '2020-08-25 11:41:38', '2020-08-25 04:41:38', '2020-08-25 04:41:38'),
(167, 'App\\Models\\Resources\\Aktiva\\Aktiva', 141, 12, 'created_at', NULL, '2020-08-25 11:41:45', '2020-08-25 04:41:45', '2020-08-25 04:41:45'),
(168, 'App\\Models\\Resources\\Aktiva\\Aktiva', 142, 10, 'created_at', NULL, '2020-08-25 11:42:05', '2020-08-25 04:42:05', '2020-08-25 04:42:05'),
(169, 'App\\Models\\Resources\\Aktiva\\Aktiva', 143, 10, 'created_at', NULL, '2020-08-25 11:42:26', '2020-08-25 04:42:26', '2020-08-25 04:42:26'),
(170, 'App\\Models\\Resources\\Aktiva\\Aktiva', 144, 12, 'created_at', NULL, '2020-08-25 11:42:30', '2020-08-25 04:42:30', '2020-08-25 04:42:30'),
(171, 'App\\Models\\Resources\\Aktiva\\Aktiva', 145, 11, 'created_at', NULL, '2020-08-25 11:42:32', '2020-08-25 04:42:32', '2020-08-25 04:42:32'),
(172, 'App\\Models\\Resources\\Aktiva\\Aktiva', 146, 10, 'created_at', NULL, '2020-08-25 11:42:47', '2020-08-25 04:42:47', '2020-08-25 04:42:47'),
(173, 'App\\Models\\Resources\\Aktiva\\Aktiva', 147, 10, 'created_at', NULL, '2020-08-25 11:43:08', '2020-08-25 04:43:08', '2020-08-25 04:43:08'),
(174, 'App\\Models\\Resources\\Aktiva\\Aktiva', 148, 10, 'created_at', NULL, '2020-08-25 11:43:28', '2020-08-25 04:43:28', '2020-08-25 04:43:28'),
(175, 'App\\Models\\Resources\\Aktiva\\Aktiva', 149, 10, 'created_at', NULL, '2020-08-25 11:43:47', '2020-08-25 04:43:47', '2020-08-25 04:43:47'),
(176, 'App\\Models\\Resources\\Aktiva\\Aktiva', 150, 12, 'created_at', NULL, '2020-08-25 11:44:29', '2020-08-25 04:44:29', '2020-08-25 04:44:29'),
(177, 'App\\Models\\Resources\\Aktiva\\Aktiva', 151, 10, 'created_at', NULL, '2020-08-25 11:44:33', '2020-08-25 04:44:33', '2020-08-25 04:44:33'),
(178, 'App\\Models\\Resources\\Aktiva\\Aktiva', 152, 10, 'created_at', NULL, '2020-08-25 11:44:53', '2020-08-25 04:44:53', '2020-08-25 04:44:53'),
(179, 'App\\Models\\Resources\\Aktiva\\Aktiva', 153, 12, 'created_at', NULL, '2020-08-25 11:45:09', '2020-08-25 04:45:09', '2020-08-25 04:45:09'),
(180, 'App\\Models\\Resources\\Aktiva\\Aktiva', 154, 10, 'created_at', NULL, '2020-08-25 11:45:12', '2020-08-25 04:45:12', '2020-08-25 04:45:12'),
(181, 'App\\Models\\Resources\\Aktiva\\Aktiva', 155, 10, 'created_at', NULL, '2020-08-25 11:45:32', '2020-08-25 04:45:32', '2020-08-25 04:45:32'),
(182, 'App\\Models\\Resources\\Aktiva\\Aktiva', 156, 10, 'created_at', NULL, '2020-08-25 11:45:53', '2020-08-25 04:45:53', '2020-08-25 04:45:53'),
(183, 'App\\Models\\Resources\\Aktiva\\Aktiva', 157, 12, 'created_at', NULL, '2020-08-25 11:46:11', '2020-08-25 04:46:11', '2020-08-25 04:46:11'),
(184, 'App\\Models\\Resources\\Aktiva\\Aktiva', 158, 10, 'created_at', NULL, '2020-08-25 11:46:13', '2020-08-25 04:46:13', '2020-08-25 04:46:13'),
(185, 'App\\Models\\Resources\\Aktiva\\Aktiva', 159, 11, 'created_at', NULL, '2020-08-25 11:46:51', '2020-08-25 04:46:51', '2020-08-25 04:46:51'),
(186, 'App\\Models\\Resources\\Aktiva\\Aktiva', 160, 12, 'created_at', NULL, '2020-08-25 11:47:01', '2020-08-25 04:47:01', '2020-08-25 04:47:01'),
(187, 'App\\Models\\Resources\\Aktiva\\Aktiva', 161, 12, 'created_at', NULL, '2020-08-25 11:47:42', '2020-08-25 04:47:42', '2020-08-25 04:47:42'),
(188, 'App\\Models\\Resources\\Aktiva\\Aktiva', 162, 11, 'created_at', NULL, '2020-08-25 11:48:17', '2020-08-25 04:48:17', '2020-08-25 04:48:17'),
(189, 'App\\Models\\Resources\\Aktiva\\Aktiva', 163, 12, 'created_at', NULL, '2020-08-25 11:50:11', '2020-08-25 04:50:11', '2020-08-25 04:50:11'),
(190, 'App\\Models\\Resources\\Aktiva\\Aktiva', 164, 10, 'created_at', NULL, '2020-08-25 11:50:28', '2020-08-25 04:50:28', '2020-08-25 04:50:28'),
(191, 'App\\Models\\Resources\\Aktiva\\Aktiva', 165, 12, 'created_at', NULL, '2020-08-25 11:51:10', '2020-08-25 04:51:11', '2020-08-25 04:51:11'),
(192, 'App\\Models\\Resources\\Aktiva\\Aktiva', 166, 11, 'created_at', NULL, '2020-08-25 11:52:03', '2020-08-25 04:52:03', '2020-08-25 04:52:03'),
(193, 'App\\Models\\Resources\\Aktiva\\Aktiva', 167, 12, 'created_at', NULL, '2020-08-25 11:53:41', '2020-08-25 04:53:41', '2020-08-25 04:53:41'),
(194, 'App\\Models\\Resources\\Aktiva\\Aktiva', 168, 11, 'created_at', NULL, '2020-08-25 11:53:49', '2020-08-25 04:53:49', '2020-08-25 04:53:49'),
(195, 'App\\Models\\Resources\\Aktiva\\Aktiva', 169, 11, 'created_at', NULL, '2020-08-25 11:57:17', '2020-08-25 04:57:17', '2020-08-25 04:57:17'),
(196, 'App\\Models\\Resources\\Aktiva\\Aktiva', 170, 11, 'created_at', NULL, '2020-08-25 12:05:57', '2020-08-25 05:05:57', '2020-08-25 05:05:57'),
(197, 'App\\Models\\Resources\\Aktiva\\Aktiva', 171, 4, 'created_at', NULL, '2020-08-25 15:35:51', '2020-08-25 08:35:51', '2020-08-25 08:35:51'),
(198, 'App\\Models\\Resources\\Aktiva\\Aktiva', 171, 5, 'keuangan_approved', '0', '1', '2020-08-25 08:37:24', '2020-08-25 08:37:24'),
(199, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 4, 'keuangan_approved', '1', '0', '2020-08-25 09:19:00', '2020-08-25 09:19:00'),
(200, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 4, 'created_at', NULL, '2020-08-25 16:26:55', '2020-08-25 09:26:55', '2020-08-25 09:26:55'),
(201, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 5, 'keuangan_approved', '0', '1', '2020-08-25 09:31:26', '2020-08-25 09:31:26'),
(202, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 5, 'tgl_perolehan', '2020-08-24', '2020-08-28', '2020-08-25 09:31:47', '2020-08-25 09:31:47'),
(203, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 5, 'umum_approved', '1', '0', '2020-08-25 09:31:47', '2020-08-25 09:31:47'),
(204, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 5, 'tgl_perolehan', '2020-08-28', '2020-08-24', '2020-08-25 09:32:09', '2020-08-25 09:32:09'),
(205, 'App\\Models\\Resources\\Aktiva\\Aktiva', 172, 4, 'umum_approved', '0', '1', '2020-08-25 09:32:45', '2020-08-25 09:32:45'),
(206, 'App\\Models\\Resources\\Aktiva\\Aktiva', 14, 5, 'keuangan_approved', '0', '1', '2021-02-09 12:25:55', '2021-02-09 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'sadmin', 'web', '2020-08-20 08:11:42', '2020-08-20 08:11:42'),
(2, 'admin', 'web', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(3, 'karyawan', 'web', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(4, 'umum', 'web', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(5, 'keuangan', 'web', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(6, 'system', 'web', '2020-08-20 08:11:43', '2020-08-20 08:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(2, 3),
(2, 4),
(2, 5),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(6, 5),
(7, 4),
(7, 5),
(8, 4),
(8, 5),
(9, 4),
(9, 5),
(9, 6),
(10, 4),
(10, 5),
(11, 4),
(12, 3),
(12, 4),
(12, 5),
(13, 4),
(14, 3),
(14, 4),
(14, 5),
(15, 3),
(15, 4),
(15, 5),
(16, 4),
(16, 6),
(17, 3),
(17, 4),
(17, 5),
(18, 4),
(24, 2),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `nip`, `jabatan`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Super Administrator', NULL, NULL, 'sadmin@example.com', '2020-08-20 08:11:43', '$2y$10$fZVluA3dMkP2/CV8SIlDqOE7sgazAsH3HH34liOOP7k1RqLCMGL1q', 'bkPigyI9VEhZ1IWqB0PPvSPjdNEtO6ZYw2YDWr8OiLCvAkR6MIIzDgqOTzVv', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(2, 'Mr. Administrator', '1111111111', 'Admin', 'admin@example.com', '2020-08-20 08:11:43', '$2y$10$fZVluA3dMkP2/CV8SIlDqOE7sgazAsH3HH34liOOP7k1RqLCMGL1q', 'IqnaKe5acXzFyFYZHehhCsY2LqvngSESTbYXWLuTvIMbd7o9oWyYHDmYkUDa', '2020-08-20 08:11:43', '2021-02-09 12:20:18'),
(3, 'Karyawan Satu', '2222222', 'Karyawan', 'karyawan@example.com', '2020-08-20 08:11:43', '$2y$10$ZGaZeBu39KLWp9.md3QZ2uN6Z1R3lb.S2g1rbYjHKtc7w7/aXzTAy', '5fZbOjICsGv53IbQCpzvnt5JBJQyPNiZK4B5wu1IPrOo9Lur9ZBlDqozjBcH', '2020-08-20 08:11:43', '2021-02-09 06:17:08'),
(4, 'Bagian Umum', '33333333', 'Umum', 'umum@example.com', '2020-08-20 08:11:43', '$2y$10$CW7Lu7ZgGeSq2R/sj91JguyOarlsC/YI1XApZTBZnc0H04gVXlQam', 'WpPe0ju2dIJeDP9dYnfnfPSdm5o6NTE5U18efr12ETvzklYdDq4nGBTwo5vT', '2020-08-20 08:11:43', '2021-02-09 06:17:22'),
(5, 'Bagian Keuangan', '44444444', 'Keuangan', 'keuangan@example.com', '2020-08-20 08:11:43', '$2y$10$/XdgcW.n6LoTu/1HXTBYn.lnTzP27hG9RuXVZE54G.A0ORZv4AnUO', 'plpbbAhq682wRa3pJjMFCEppKsm09Z7PekNmkttHYsPObL0yQilUDrAMlFlV', '2020-08-20 08:11:43', '2021-02-09 06:17:36'),
(6, 'System', NULL, NULL, 'system@example.com', '2020-08-20 08:11:43', '$2y$10$AhbW78VF0HIsYdpIpLVPwOPQMRBUJyWbHkzJPiEL6ywZ25v.98nEe', 'UYWDYkZnTY', '2020-08-20 08:11:43', '2020-08-20 08:11:43'),
(7, 'AGUS PRASETYO', '169121591', 'PENATA MADYA KEARSIPAN', 'tyo.cenno13743@gmail.com', NULL, '$2y$10$fZVluA3dMkP2/CV8SIlDqOE7sgazAsH3HH34liOOP7k1RqLCMGL1q', NULL, '2020-08-25 02:19:28', '2020-08-25 03:59:07'),
(8, 'ELIS NUR ROHMA', '267701593', 'PENATA MADYA KEUANGAN', 'elis.nur@bpjsketenagakerjaan.go.id', NULL, '$2y$10$PDzSxe450rraLpoZkmhYu.WlEQ14IGcYUAK4lcEcqOBs2zrXvB6g.', NULL, '2020-08-25 02:29:45', '2020-08-25 02:29:45'),
(10, 'ISTIANA', '123456789', 'MAGANG', 'istianakholifatun26@gmail.com', NULL, '$2y$10$u6umcWWNchXa7K8poZQ9we3xjQ35DWymt4j5Rlx9oUCnCyglhsryC', NULL, '2020-08-25 03:11:01', '2020-08-25 03:11:01'),
(11, 'HESTI', '123456789', 'MAGANG', 'hestiazkiya@gmail.com', NULL, '$2y$10$9fn4W2GxJ8odqAkNxOXZ3.Q3xHmJLnKNOWZLNw3p7cTiQa7EY842m', NULL, '2020-08-25 03:19:32', '2020-08-25 03:19:32'),
(12, 'ULFA', '123456789', 'MAGANG', 'ulfahnaan10@gmail.com', NULL, '$2y$10$/1ONu1EavILjCQ5JbTzJ2ebgvDul1nDVaJTsBKwv1N5d.0vbvhI6S', NULL, '2020-08-25 03:21:16', '2020-08-25 04:02:22'),
(13, 'Lita Triayuni Wulandari', '244240782', 'Petugas Pemeriksa (Wilayah II)', 'lita.triayuni@bpjsketenagakerjaan.go.id', NULL, 'JATENGDIY905', NULL, '2020-08-25 04:05:58', '2020-08-25 04:12:13'),
(14, 'Dwi Aprianto', '162281592', 'Penata Madya Manajemen Pelayanan (Wilayah II)', 'dwi.aprianto@bpjsketenagakerjaan.go.id', NULL, 'JATENGDIY905', NULL, '2020-08-25 04:08:55', '2020-08-25 04:11:58'),
(15, 'Ardhian Arista', '248571087', 'Penata Utama Manajemen Mutu dan Risiko (Wilayah II)', 'ardhian.arista@bpjsketenagakerjaan.go.id', NULL, '$2y$10$fZVluA3dMkP2/CV8SIlDqOE7sgazAsH3HH34liOOP7k1RqLCMGL1q', NULL, '2020-08-25 04:11:34', '2020-08-25 04:11:34'),
(16, 'Yoga Satrianto', '155721388', 'Penata Madya Umum (Wilayah II)', 'yoga.satrianto@bpjsketenagakerjaan.go.id', NULL, '$2y$10$JD1apCfebNDlQc354rHtEOxyY96CnwSt.Vd5OqBWsi4Uw8D.QHgF2', NULL, '2020-08-25 04:13:38', '2020-08-25 04:13:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivas`
--
ALTER TABLE `aktivas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aktivas_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barangs_peminjaman_id_foreign` (`peminjaman_id`);

--
-- Indexes for table `deleted_peminjamans`
--
ALTER TABLE `deleted_peminjamans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_parent_self` (`parent_id`);

--
-- Indexes for table `konfigurasis`
--
ALTER TABLE `konfigurasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_pemohon_id_foreign` (`pemohon_id`),
  ADD KEY `peminjamans_peninjau_id_foreign` (`peninjau_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `aktivas`
--
ALTER TABLE `aktivas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=751;

--
-- AUTO_INCREMENT for table `deleted_peminjamans`
--
ALTER TABLE `deleted_peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `konfigurasis`
--
ALTER TABLE `konfigurasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivas`
--
ALTER TABLE `aktivas`
  ADD CONSTRAINT `aktivas_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barangs_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjamans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD CONSTRAINT `subcategory_parent_self` FOREIGN KEY (`parent_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_pemohon_id_foreign` FOREIGN KEY (`pemohon_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjamans_peninjau_id_foreign` FOREIGN KEY (`peninjau_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
