-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 11:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_tracker_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sport', '2024-12-23 13:15:40', '2024-12-23 13:15:40'),
(2, 'Education', '2024-12-23 13:15:40', '2024-12-23 13:15:40'),
(3, 'Home', '2024-12-23 13:15:40', '2024-12-23 13:15:40'),
(4, 'Food', '2024-12-24 12:27:30', '2024-12-24 12:27:30'),
(5, 'Transport', '2024-12-24 12:27:30', '2024-12-24 12:27:30'),
(6, 'Entertainment', '2024-12-24 12:27:30', '2024-12-24 12:27:30'),
(7, 'Healthcare', '2024-12-24 12:27:30', '2024-12-24 12:27:30'),
(8, 'Utilities', '2024-12-24 12:27:30', '2024-12-24 12:27:30'),
(9, 'Education', '2024-12-24 12:27:30', '2024-12-24 12:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `amount`, `user_id`, `category_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Expense title01', 150.00, 1, 2, '2024-12-23', '2024-12-23 13:18:03', '2024-12-23 13:18:03'),
(2, 'Expense title02', 150.00, 2, 1, '2024-12-23', '2024-12-23 13:18:03', '2024-12-23 13:18:03'),
(3, 'Expense title03', 150.00, 1, 2, '2024-12-23', '2024-12-23 13:18:03', '2024-12-23 13:18:03'),
(4, 'Expense title04', 150.00, 2, 3, '2024-12-23', '2024-12-23 13:18:03', '2024-12-23 13:18:03'),
(5, 'Expense title05', 150.00, 1, 3, '2024-12-23', '2024-12-23 13:18:03', '2024-12-23 13:18:03'),
(6, 'ddddd', 58.00, 1, 6, '2024-12-18', '2024-12-24 13:31:39', '2024-12-24 13:31:39'),
(7, 'qqqqqq', 252525.00, 1, 8, '2024-12-17', '2024-12-24 13:35:31', '2024-12-24 13:35:31'),
(8, 'ppppppppppppp', 256955.00, 1, 5, '2024-12-27', '2024-12-24 13:38:41', '2024-12-24 13:38:41'),
(10, 'expense001', 1000.00, 4, 7, '2024-12-18', '2024-12-25 10:13:25', '2024-12-25 10:13:25'),
(11, 'Expense002', 2000.00, 4, 9, '2024-12-26', '2024-12-25 10:14:03', '2024-12-25 10:14:03'),
(12, 'expense003updated', 3300.00, 4, 4, '2024-12-01', '2024-12-25 10:14:32', '2024-12-25 10:17:26'),
(14, 'text', 5555.00, 4, 8, '2024-12-05', '2024-12-25 12:04:02', '2024-12-25 12:04:02'),
(15, 'fafaffaafa  update', 50555.00, 5, 8, '2024-12-27', '2024-12-26 09:29:10', '2024-12-26 10:41:39'),
(17, 'waseem anwar update', 849.00, 5, 4, '2024-12-27', '2024-12-26 10:43:31', '2024-12-26 10:44:01'),
(18, 'Excletitle01', 1000.00, 5, 1, '1970-01-01', '2024-12-26 14:24:19', '2024-12-26 14:24:19'),
(19, 'Excletitle02', 2000.00, 5, 3, '1970-01-01', '2024-12-26 14:24:20', '2024-12-26 14:24:20'),
(20, 'Excletitle03', 3000.00, 5, 2, '1970-01-01', '2024-12-26 14:24:20', '2024-12-26 14:24:20'),
(21, 'Excletitle04', 4000.00, 5, 4, '1970-01-01', '2024-12-26 14:24:20', '2024-12-26 14:24:20'),
(22, 'Excletitle05', 5000.00, 5, 1, '1970-01-01', '2024-12-26 14:24:20', '2024-12-26 14:24:20'),
(23, 'Excletitle01', 1000.00, 5, 1, '1970-01-01', '2024-12-26 14:29:59', '2024-12-26 14:29:59'),
(24, 'Excletitle02', 2000.00, 5, 3, '1970-01-01', '2024-12-26 14:29:59', '2024-12-26 14:29:59'),
(25, 'Excletitle03', 3000.00, 5, 2, '1970-01-01', '2024-12-26 14:30:00', '2024-12-26 14:30:00'),
(26, 'Excletitle04', 4000.00, 5, 4, '1970-01-01', '2024-12-26 14:30:00', '2024-12-26 14:30:00'),
(27, 'Excletitle05', 5000.00, 5, 1, '1970-01-01', '2024-12-26 14:30:00', '2024-12-26 14:30:00'),
(28, 'Excletitle01', 1000.00, 5, 1, '1970-01-01', '2024-12-26 14:30:45', '2024-12-26 14:30:45'),
(29, 'Excletitle02', 2000.00, 5, 3, '1970-01-01', '2024-12-26 14:30:45', '2024-12-26 14:30:45'),
(30, 'Excletitle03', 3000.00, 5, 2, '1970-01-01', '2024-12-26 14:30:45', '2024-12-26 14:30:45'),
(31, 'Excletitle04', 4000.00, 5, 4, '1970-01-01', '2024-12-26 14:30:45', '2024-12-26 14:30:45'),
(32, 'Excletitle05', 5000.00, 5, 1, '1970-01-01', '2024-12-26 14:30:45', '2024-12-26 14:30:45'),
(33, 'Excletitle01', 1000.00, 5, 1, '1970-01-01', '2024-12-26 14:36:02', '2024-12-26 14:36:02'),
(34, 'Excletitle02', 2000.00, 5, 3, '1970-01-01', '2024-12-26 14:36:02', '2024-12-26 14:36:02'),
(35, 'Excletitle03', 3000.00, 5, 2, '1970-01-01', '2024-12-26 14:36:02', '2024-12-26 14:36:02'),
(36, 'Excletitle04', 4000.00, 5, 4, '1970-01-01', '2024-12-26 14:36:02', '2024-12-26 14:36:02'),
(37, 'Excletitle05', 5000.00, 5, 1, '1970-01-01', '2024-12-26 14:36:02', '2024-12-26 14:36:02'),
(38, 'Excletitle06', 1000.00, 5, 1, '1970-01-01', '2024-12-26 14:51:03', '2024-12-26 14:51:03'),
(39, 'Excletitle07', 2000.00, 5, 3, '1970-01-01', '2024-12-26 14:51:03', '2024-12-26 14:51:03'),
(40, 'Excletitle08', 3000.00, 5, 2, '1970-01-01', '2024-12-26 14:51:03', '2024-12-26 14:51:03'),
(41, 'Excletitle09', 4000.00, 5, 4, '1970-01-01', '2024-12-26 14:51:03', '2024-12-26 14:51:03'),
(42, 'Excletitle10', 5000.00, 5, 1, '1970-01-01', '2024-12-26 14:51:03', '2024-12-26 14:51:03'),
(43, 'Excletitle01', 1000.00, 5, 1, '1970-01-01', '2024-12-26 15:10:18', '2024-12-26 15:10:18'),
(44, 'Excletitle02', 2000.00, 5, 3, '1970-01-01', '2024-12-26 15:10:18', '2024-12-26 15:10:18'),
(45, 'Excletitle03', 3000.00, 5, 2, '1970-01-01', '2024-12-26 15:10:18', '2024-12-26 15:10:18'),
(46, 'Excletitle04', 4000.00, 5, 4, '1970-01-01', '2024-12-26 15:10:18', '2024-12-26 15:10:18'),
(47, 'Excletitle05', 5000.00, 5, 1, '1970-01-01', '2024-12-26 15:10:18', '2024-12-26 15:10:18'),
(48, 'Excletitle06', 1000.00, 5, 1, '1970-01-01', '2024-12-26 15:10:51', '2024-12-26 15:10:51'),
(49, 'Excletitle07', 2000.00, 5, 3, '1970-01-01', '2024-12-26 15:10:51', '2024-12-26 15:10:51'),
(50, 'Excletitle08', 3000.00, 5, 2, '1970-01-01', '2024-12-26 15:10:51', '2024-12-26 15:10:51'),
(51, 'Excletitle09', 4000.00, 5, 4, '1970-01-01', '2024-12-26 15:10:51', '2024-12-26 15:10:51'),
(52, 'Excletitle10', 5000.00, 5, 1, '1970-01-01', '2024-12-26 15:10:51', '2024-12-26 15:10:51'),
(53, 'Excletitle01fef', 5252.00, 5, 1, '1970-01-01', '2024-12-26 16:40:27', '2024-12-26 16:40:27'),
(54, 'Excletitle02vdd', 2000.00, 5, 3, '1970-01-01', '2024-12-26 16:40:27', '2024-12-26 16:40:27'),
(55, 'Excletitle03fsfsf', 3000.00, 5, 2, '1970-01-01', '2024-12-26 16:40:27', '2024-12-26 16:40:27'),
(56, 'Excletitle04dcxcx', 4000.00, 5, 4, '1970-01-01', '2024-12-26 16:40:28', '2024-12-26 16:40:28'),
(57, 'Excletitle05ccz', 5000.00, 5, 1, '1970-01-01', '2024-12-26 16:40:28', '2024-12-26 16:40:28'),
(58, 'Excletitle01fef', 5252.00, 5, 1, '1970-01-01', '2024-12-26 16:44:58', '2024-12-26 16:44:58'),
(59, 'Excletitle02vdd', 2000.00, 5, 3, '1970-01-01', '2024-12-26 16:44:58', '2024-12-26 16:44:58'),
(60, 'Excletitle03fsfsf', 3000.00, 5, 2, '1970-01-01', '2024-12-26 16:44:58', '2024-12-26 16:44:58'),
(61, 'Excletitle04dcxcx', 4000.00, 5, 4, '1970-01-01', '2024-12-26 16:44:58', '2024-12-26 16:44:58'),
(62, 'Excletitle05ccz', 5000.00, 5, 1, '1970-01-01', '2024-12-26 16:44:58', '2024-12-26 16:44:58'),
(63, 'Excletitle01fef', 5252.00, 5, 1, '1970-01-01', '2024-12-26 17:12:16', '2024-12-26 17:12:16'),
(64, 'Excletitle02vdd', 2000.00, 5, 3, '1970-01-01', '2024-12-26 17:12:16', '2024-12-26 17:12:16'),
(65, 'Excletitle03fsfsf', 3000.00, 5, 2, '1970-01-01', '2024-12-26 17:12:16', '2024-12-26 17:12:16'),
(66, 'Excletitle04dcxcx', 4000.00, 5, 4, '1970-01-01', '2024-12-26 17:12:16', '2024-12-26 17:12:16'),
(67, 'Excletitle05ccz', 5000.00, 5, 1, '1970-01-01', '2024-12-26 17:12:16', '2024-12-26 17:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2024_12_23_081326_create_users_table', 1),
(5, '2024_12_23_081343_create_categories_table', 1),
(6, '2024_12_23_081358_create_expenses_table', 1),
(7, '2024_12_23_104931_create_sessions_table', 2),
(8, '2024_12_23_111700_create_cache_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bVFoBYBT1aJPl9UpY9f6qIMmFJkfa8oqJqP1AdlI', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicmdOZkhydGxicDV1S1h6VDNYbDFvNlF2NzVDT2FjOTVpZzNrRDRRaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leHBlbnNlcz9wYWdlPTYiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1735251144);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Waseem Anwar', 'waseemanwar849@gmail.com', '$2y$12$kjS9MRXePsvsIy2v9hGkGu5/x1jbCkDlLoth9lGpyua/5vU4CBDjm', '2024-12-23 05:57:11', '2024-12-23 05:57:11'),
(2, 'Waseem Anwar', 'waseemanwar9211@gmail.com', '$2y$12$koQkWkTHhsrqKRwrBP7vLuYUZS1pD9iUuBikTjP9Z4YZ8FKSnYiKi', '2024-12-23 05:59:49', '2024-12-23 05:59:49'),
(3, 'testuser', 'testuser@gmail.com', '$2y$12$rXAPi7jidl3aR6Za9D.jI.NlUjJx/YbzDXwiki862nRJWy.sIoV3m', '2024-12-23 13:29:50', '2024-12-23 13:29:50'),
(4, 'waseem', 'waseem@gmail.com', '$2y$12$6fNEPSH4jIO/3hXl.hE59uZhB.7XycVjrMqsBcdfUa/cSJ8n7sKmu', '2024-12-25 08:13:25', '2024-12-25 08:13:25'),
(5, 'muhammad', 'muhammad@gmail.com', '$2y$12$C.h0Dqg9aj8cmhP010enYuHwJGR3EeOVl.ljjXbk.gXK0Q13ZPR.S', '2024-12-26 09:18:20', '2024-12-26 09:18:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
