-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 07:05 PM
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
(1, 'Algorithm', 'algorithm', 1, '2021-09-15 15:02:45', '2021-09-14 15:02:45'),
(2, 'Data Structure', 'data-structure', 1, NULL, NULL);

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
(2, '2021_09_11_145013_create_tasks_table', 1),
(3, '2021_09_12_111051_create_categories_table', 1);

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
(1, 5, 'asdf asdf ads', 2, 'asdf sadfasdf asdfasdfasdfasdf', '2021-09-15 15:13:00', 'yellow', 1, '2021-09-12 09:10:51', '2021-09-12 09:10:51'),
(2, 5, 'asdf asdf ads', 1, 'asdfasdfasdfasdfasdfasdfadsfasdf', '2021-09-08 06:14:00', 'yellow', 1, '2021-09-12 09:11:07', '2021-09-12 09:11:07'),
(3, 5, 'asdf asdf ads', 1, 'asdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasdf adsf asdf asdf adsf asdfasdfasd', '2021-09-12 16:36:47', 'purple', 1, '2021-09-12 09:11:55', '2021-09-12 09:11:55'),
(4, 2, 'asdf asdf ads', 2, 'sadf adsf asfasdfasdf asdfasdf', '2021-09-12 16:34:36', 'yellow', 2, '2021-09-12 09:12:39', '2021-09-12 09:12:39');

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
(1, 'Sarower', 'sarowerj93@gmail.com', NULL, '$2y$10$3MjzxwmxdJKSnom3bKVMwO97FoBhRFySDVDelVzAv8zoHlM62IlUW', 2, 'qG72YqHa4lU1cs2oHpHMkmW2P8PEGE2JeoT42mvRYBOxwPDAGlC5jWxBRDN6', '2021-09-12 09:03:40', '2021-09-12 09:03:40'),
(2, 'Golam Sarower', 'sarowerj@gmail.com', NULL, '$2y$10$VCucp0OwUjfpQ8rCpeDavOXysGKt5ruWFDi.H8fNBObMWjQGITcOW', 2, 'E42HKI38Y2ZUV71whaVKDb9oAGjXvYtbBD9x1Fi75Uko2uKmNcwVYcK3tBUM', '2021-09-12 09:05:12', '2021-09-12 09:05:12'),
(3, 'Sarower Jahan', 'sarowerjasdf@gmail.com', NULL, '$2y$10$zfxlkDOdzHiSaq0OB55foOSGWHePqMcsH42YuaPM5ghr5/bzWFjQC', 2, 'HLZ5iMQlHlGrvhjLv72kKGp7OhlHE6E0roWryLg25GwqsSy5NIAa33zfwCQp', '2021-09-12 09:05:48', '2021-09-12 09:05:48'),
(4, 'Sarower Jahan', 'manager@mail.com3', NULL, '$2y$10$m17IsU0UC5dgR.i6K.HsGuK4PkA98csDDQlW5fJY6Yb0IFXnma6a.', 2, NULL, '2021-09-12 09:09:57', '2021-09-12 09:09:57'),
(5, 'Hello', 'hello@mail.com', NULL, '$2y$10$Yo8yMM8EeIpFo85KWBizOuJga7SWEZu//heS2B1M8k/QfAA..rogK', 2, 'RNMQEuA5c4hG9rLVtlBu4mvnhPsX8rfhJxsjO5Bz4Zlm8ariwmOMj1YegTXK', '2021-09-12 09:10:10', '2021-09-12 09:10:10');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
