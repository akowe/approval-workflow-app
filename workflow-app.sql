-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 01:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workflow-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'operation', '2022-12-13 12:50:05', '2022-12-13 12:50:05'),
(2, 'finance', '2022-12-13 17:05:12', '2022-12-13 17:05:12');

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
(39, '2014_10_12_000000_create_users_table', 1),
(40, '2014_10_12_100000_create_password_resets_table', 1),
(41, '2022_12_13_105735_create_role_table', 1),
(43, '2022_12_13_125441_create_department_table', 1),
(47, '2022_12_13_110402_create_request_table', 2);

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user_id`, `request_status`, `level`, `department_id`, `title`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', 'good', '4', '1', 'Car servicing', 'field operations cars need to be serviced. we need 50,000', '2022-12-15 10:39:14', '2022-12-14 14:37:49', '2022-12-15 09:39:14'),
(2, '5', 'good', '4', '2', 'money for diesel', '50 liters of diesel needed', '2022-12-14 18:28:10', '2022-12-14 17:26:15', '2022-12-14 17:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `level`, `user_type`, `created_at`, `updated_at`) VALUES
(1, '0', 'junior', '2022-12-13 12:50:10', '2022-12-13 12:50:10'),
(2, '1', 'middle', '2022-12-13 12:50:10', '2022-12-13 12:50:10'),
(3, '2', 'top', '2022-12-13 12:50:10', '2022-12-13 12:50:10'),
(4, '3', 'highest', '2022-12-13 12:50:10', '2022-12-13 12:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `department_id`, `role_id`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Favour', 'favour001', 'favour@cicod.com', '1', '1', 'verified', NULL, '$2y$10$BATcz4W6s1EHYJyp8pHj5eVLfvh4RFZLEB.KZo7EOoVNENm7v9HqS', 'ySFi46hGAO3RHYw1ry4P1yhRunPZm3EeHVypACz3AAk9UnO1iV0ytqFa82Pk', '2022-12-13 12:50:13', '2022-12-13 12:50:13'),
(2, 'Mike', 'mike001', 'mike@cicod.com', '1', '2', 'verified', NULL, '$2y$10$gFx0x.cvRNaAH5pStXTY1eOdC2Bu3IhUcIwptcb5CiFLyaUXMVbvq', NULL, '2022-12-13 12:50:13', '2022-12-13 12:50:13'),
(3, 'Ugochi', 'ugochi001', 'ugochi@cicod.com', '1', '3', 'verified', NULL, '$2y$10$fn1tZJaj8CKkGnbR7wL.q.O7tKl68C/LfLUzIcnfVEVsZm/NkD2tS', NULL, '2022-12-13 12:50:13', '2022-12-13 12:50:13'),
(4, 'Ibrahim', 'ibrahim001', 'ibrahim@cicod.com', '1', '4', 'verified', NULL, '$2y$10$myI/89w58nHon22KW1jH6.l7SRf8RotF6CD8Jkp0ktlw9gEe/CmmG', NULL, '2022-12-13 12:50:14', '2022-12-13 12:50:14'),
(5, 'Kenny', 'kenny001', 'kenny@cicod.com', '2', '1', 'verified', NULL, '$2y$10$iQQ2O86cDjaS69F4dqrPb.SdMsFD/JJ3H9ZvBl7jumP3ZSma1lwlq', NULL, '2022-12-13 17:11:36', '2022-12-13 17:11:36'),
(6, 'Morris', 'morris001', 'morris@cicod.com', '2', '2', 'verified', NULL, '$2y$10$N42IcXga/SVFBzrxVnnRPOgmYfepzT.p1DrHd/2z7fpSYX9RPag7u', NULL, '2022-12-13 17:11:36', '2022-12-13 17:11:36'),
(7, 'Williams', 'williams001', 'williams@cicod.com', '2', '3', 'verified', NULL, '$2y$10$W6.XMlV9h0mdsSjZU/2jneQRlXuHEZIVhA.ijAJXrw81Gu9vVgmh2', NULL, '2022-12-13 17:11:36', '2022-12-13 17:11:36'),
(8, 'Ahmed', 'ahmed001', 'ahmed@cicod.com', '2', '4', 'verified', NULL, '$2y$10$LQ2TqTTss3PPkONrw2ypI.CfoYepBJIxOhTSgSReYciN0xBdijStK', NULL, '2022-12-13 17:11:36', '2022-12-13 17:11:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
