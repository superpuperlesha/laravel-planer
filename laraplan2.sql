-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2021 at 02:14 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraplan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_01_21_085019_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `o_id` bigint(20) UNSIGNED NOT NULL,
  `o_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `o_val` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`o_id`, `o_name`, `o_val`, `created_at`, `updated_at`) VALUES
(1, 'sopt_huurs_day', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` bigint(20) UNSIGNED NOT NULL,
  `usr_role_id` bigint(20) DEFAULT NULL,
  `usr_pos_id` bigint(20) DEFAULT NULL,
  `usr_order` int(11) NOT NULL DEFAULT 0,
  `usr_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usr_password` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usr_first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usr_last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usr_fromto` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usr_work` mediumtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_role_id`, `usr_pos_id`, `usr_order`, `usr_email`, `usr_password`, `usr_first_name`, `usr_last_name`, `usr_fromto`, `usr_work`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '', '', 'Алексей', 'Фандеев', '25.01.2021-21.02.2021', '', NULL, NULL),
(2, 2, 1, 1, '', '', 'Никита', 'Котенко', '', 'a:33:{i:1610409600;a:0:{}i:1610496000;a:0:{}i:1610668800;a:0:{}i:1610928000;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611014400;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611100800;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611187200;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611273600;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611360000;a:3:{i:14;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611532800;a:1:{i:14;s:1:\"8\";}i:1611619200;a:1:{i:14;s:1:\"8\";}i:1611705600;a:1:{i:14;s:1:\"8\";}i:1611792000;a:1:{i:14;s:1:\"8\";}i:1611878400;a:1:{i:14;s:1:\"8\";}i:1611964800;a:1:{i:14;s:1:\"8\";}i:1612137600;a:0:{}i:1612224000;a:0:{}i:1612310400;a:0:{}i:1612396800;a:0:{}i:1612483200;a:0:{}i:1612569600;a:0:{}i:1612742400;a:1:{i:14;s:1:\"8\";}i:1612828800;a:1:{i:14;s:1:\"8\";}i:1612915200;a:1:{i:14;s:1:\"8\";}i:1613001600;a:1:{i:14;s:1:\"8\";}i:1613088000;a:1:{i:14;s:1:\"8\";}i:1613174400;a:1:{i:14;s:1:\"8\";}i:1613347200;a:1:{i:14;s:1:\"8\";}i:1613433600;a:1:{i:14;s:1:\"8\";}i:1613520000;a:1:{i:14;s:1:\"8\";}i:1613606400;a:1:{i:14;s:1:\"8\";}i:1613692800;a:1:{i:14;s:1:\"8\";}i:1613779200;a:1:{i:14;s:1:\"8\";}}', NULL, NULL),
(3, 2, 1, 2, '', '', 'Антон', 'Силличев', '', 'a:20:{i:0;a:1:{i:14;s:1:\"8\";}i:1609372800;a:1:{i:14;s:1:\"8\";}i:1609718400;a:1:{i:14;s:1:\"8\";}i:1610928000;a:3:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611014400;a:3:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";}i:1611100800;a:1:{i:1;s:1:\"8\";}i:1611187200;a:1:{i:1;s:1:\"8\";}i:1611273600;a:1:{i:1;s:1:\"8\";}i:1611360000;a:2:{i:1;s:1:\"8\";i:3;s:1:\"8\";}i:1611532800;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611619200;a:2:{i:1;s:1:\"8\";i:14;s:1:\"8\";}i:1611705600;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611792000;a:2:{i:1;s:2:\"10\";i:14;s:1:\"8\";}i:1611878400;a:1:{i:14;s:1:\"8\";}i:1611964800;a:0:{}i:1612137600;a:0:{}i:1612224000;a:0:{}i:1612310400;a:1:{i:14;s:1:\"8\";}i:1612396800;a:0:{}i:1612483200;a:0:{}}', NULL, NULL),
(14, 2, 1, 3, 'superpuperlesha@gmail.com', '', '111', 'bbb', '', 'a:25:{i:0;a:1:{i:14;s:1:\"8\";}i:1611532800;a:1:{i:14;s:1:\"8\";}i:1611619200;a:1:{i:14;s:1:\"8\";}i:1611705600;a:1:{i:14;s:1:\"8\";}i:1611792000;a:1:{i:14;s:1:\"8\";}i:1611878400;a:1:{i:14;s:1:\"8\";}i:1611964800;a:1:{i:14;s:1:\"8\";}i:1612137600;a:0:{}i:1612224000;a:0:{}i:1612310400;a:0:{}i:1612396800;a:0:{}i:1612483200;a:0:{}i:1612569600;a:0:{}i:1612742400;a:1:{i:14;s:1:\"8\";}i:1612828800;a:1:{i:14;s:1:\"8\";}i:1612915200;a:1:{i:14;s:1:\"8\";}i:1613001600;a:1:{i:14;s:1:\"8\";}i:1613088000;a:1:{i:14;s:1:\"8\";}i:1613174400;a:1:{i:14;s:1:\"8\";}i:1613347200;a:1:{i:14;s:1:\"8\";}i:1613433600;a:1:{i:14;s:1:\"8\";}i:1613520000;a:1:{i:14;s:1:\"8\";}i:1613606400;a:1:{i:14;s:1:\"8\";}i:1613692800;a:1:{i:14;s:1:\"8\";}i:1613779200;a:1:{i:14;s:1:\"8\";}}', '2021-01-25 07:21:55', '2021-01-25 07:21:55'),
(15, 2, 2, 4, 'superpuperlesha@gmail.com', '', '222', 'bbb', '', 'a:17:{i:0;a:1:{i:14;s:1:\"8\";}i:1609545600;a:1:{i:14;s:1:\"8\";}i:1611619200;a:0:{}i:1611792000;a:0:{}i:1611878400;a:0:{}i:1611964800;a:0:{}i:1612137600;a:0:{}i:1612224000;a:0:{}i:1612310400;a:1:{i:14;s:1:\"8\";}i:1612396800;a:0:{}i:1612483200;a:0:{}i:1612569600;a:0:{}i:1612742400;a:1:{i:14;s:1:\"8\";}i:1612828800;a:1:{i:14;s:1:\"8\";}i:1612915200;a:1:{i:14;s:1:\"8\";}i:1613001600;a:1:{i:14;s:1:\"8\";}i:1613088000;a:1:{i:14;s:1:\"8\";}}', '2021-01-25 07:22:00', '2021-01-25 07:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `log_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `log_content` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `log_usr_src` bigint(20) NOT NULL,
  `log_usr_desr` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`log_id`, `log_title`, `log_content`, `log_usr_src`, `log_usr_desr`, `created_at`, `updated_at`) VALUES
(4, 'Set plan to: Антон Силличев', '<span class=\"text-warning font-weight-bold\">Planned:</span> 3.2.2021-3.2.2021<br/><span class=\"text-warning font-weight-bold\">Task:</span> 1111(8h)', 1, 3, NULL, NULL),
(5, 'Set plan to: 222 bbb', '<span class=\"text-warning font-weight-bold\">Planned:</span> 3.2.2021-3.2.2021<br/><span class=\"text-warning font-weight-bold\">Task:</span> 1111(8h)', 1, 15, NULL, NULL),
(6, 'Set plan to: Антон Силличев', '<span class=\"text-warning font-weight-bold\">Planned:</span> 26.01.2021-28.01.2021<br/><span class=\"text-warning font-weight-bold\">Task:</span> 1111(8h)', 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_positions`
--

CREATE TABLE `users_positions` (
  `pos_id` bigint(20) UNSIGNED NOT NULL,
  `pos_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_positions`
--

INSERT INTO `users_positions` (`pos_id`, `pos_name`, `created_at`, `updated_at`) VALUES
(1, 'dew', NULL, NULL),
(2, 'front', NULL, NULL),
(3, 'qa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usr_tasks`
--

CREATE TABLE `usr_tasks` (
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usr_tasks`
--

INSERT INTO `usr_tasks` (`task_id`, `task_name`, `created_at`, `updated_at`) VALUES
(1, 'Task 111', NULL, NULL),
(2, 'Task 222', NULL, NULL),
(3, 'Task 333', NULL, NULL),
(14, '1111', NULL, NULL),
(15, '5555', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `option_o_name_index` (`o_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `users_usr_first_name_usr_last_name_usr_email_index` (`usr_first_name`,`usr_last_name`,`usr_email`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users_positions`
--
ALTER TABLE `users_positions`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `users_positions_pos_name_index` (`pos_name`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `users_roles_role_name_index` (`role_name`);

--
-- Indexes for table `usr_tasks`
--
ALTER TABLE `usr_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `usr_tasks_task_name_index` (`task_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `o_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_positions`
--
ALTER TABLE `users_positions`
  MODIFY `pos_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usr_tasks`
--
ALTER TABLE `usr_tasks`
  MODIFY `task_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
