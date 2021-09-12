-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 05:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Algorithm', 'algorithm', 1, '2021-09-12 11:16:11', '2021-09-12 11:16:14'),
(2, 'Data Structure', 'data-structure', 1, '2021-09-12 11:16:11', '2021-09-12 11:16:14'),
(3, 'My Test', 'my-test', 1, '2021-09-16 14:37:30', '2021-09-30 14:37:30');

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
(1, '2021_09_11_121034_create_users_table', 1),
(4, '2021_09_12_111051_create_categories_table', 3),
(5, '2021_09_11_145013_create_tasks_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `task_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `task_title`, `category`, `task_details`, `task_deadline`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Algorithm task', 1, 'Algorithm taskAlgorithm taskAlgorithm taskAlgorithm task', '2021-09-14 06:33:00', 'yellow', 1, '2021-09-12 08:29:12', '2021-09-12 08:29:12'),
(2, 1, 'Another task of data struncture', 2, 'Another task of data struncture', '2021-09-12 14:30:51', 'cyan', 1, '2021-09-12 08:29:56', '2021-09-12 08:29:56'),
(3, 1, 'asdfasdf', 2, 'asdf asdf asdf asdf asfd', '2021-09-07 02:34:00', 'yellow', 1, '2021-09-12 08:31:08', '2021-09-12 08:31:08'),
(4, 1, 'Testing ...', 3, 'Hello', '2021-09-29 05:41:00', 'red', 1, '2021-09-12 08:38:45', '2021-09-12 08:38:45'),
(5, 1, 'Hello hello', 1, 'asdf adsf asdf asdf asdfas', '2021-09-08 14:45:00', 'green', 1, '2021-09-12 08:42:00', '2021-09-12 08:42:00'),
(6, 1, 'Another one', 2, 'asdf asdf adsfadsfasdfasdfasdfasdfadsf', '2021-09-15 14:47:00', 'purple', 1, '2021-09-12 08:43:10', '2021-09-12 08:43:10'),
(7, 1, 'asdf asdfasdf asdf adsf', 1, 'asdf asdf asdf adsf asdf asdf', '2021-09-15 14:47:00', 'yellow', 1, '2021-09-12 08:44:07', '2021-09-12 08:44:07'),
(8, 1, 'asdfasdf', 1, 'asdfasdfasdf', '2021-09-03 14:47:00', 'yellow', 1, '2021-09-12 08:44:37', '2021-09-12 08:44:37'),
(9, 1, 'asdf asdf ads', 2, 'sdf adsf adsf asdf asd fasdf adsf sadf', '2021-09-14 14:49:00', 'yellow', 1, '2021-09-12 08:46:55', '2021-09-12 08:46:55'),
(10, 2, 'Hello', 2, 'sfasdf asdfasdfasdf \r\nasdf \r\nasdf\r\n asdf', '2021-09-15 14:00:00', 'yellow', 1, '2021-09-12 08:57:54', '2021-09-12 08:57:54'),
(11, 2, 'Another task', 1, 'df asdfasdf asdfasdfasdfadsf asdfasdf', '2021-09-14 07:04:00', 'yellow', 1, '2021-09-12 09:00:54', '2021-09-12 09:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sarower Jahan', 'support@eternalgarment.com', NULL, '$2y$10$r7LgUFTVGqaBbRVMl8FlPOVB5paNdUc8NvgCFm6DL/u2VeP/5hsga', 2, 'lXVEeKmpZZ7yadaIaWjAZv70n4zi1IKoDHXIrsuJINotI72LWsi3pd19MNIR', '2021-09-11 07:44:15', '2021-09-11 07:44:15'),
(2, 'Golam Sharower-E-Jahan', 'sarowerj@gmail.com', NULL, '$2y$10$rE2.x5Wsq.rNTtdVGs5KCeiiSsgOFlqx90F9Hhpnoh6MGr41sF//C', 2, 'J96k77IkOKi8OyRa8V35KNdDAyyQpfhHP5M326fMmypEXQqGvzNwx97ckAjQ', '2021-09-12 08:48:06', '2021-09-12 08:48:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
