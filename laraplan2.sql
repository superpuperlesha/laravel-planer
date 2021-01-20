-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2021 at 04:54 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.2.29

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
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `o_id` bigint(20) NOT NULL,
  `o_name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `o_val` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci PACK_KEYS=0;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`o_id`, `o_name`, `o_val`) VALUES
(1, 'sopt_huurs_day', '8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` bigint(20) NOT NULL,
  `usr_role_id` bigint(20) NOT NULL,
  `usr_first_name` varchar(16) NOT NULL DEFAULT '',
  `usr_last_name` varchar(16) NOT NULL DEFAULT '',
  `usr_pos_id` bigint(20) NOT NULL,
  `usr_fromto` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `usr_work` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_role_id`, `usr_first_name`, `usr_last_name`, `usr_pos_id`, `usr_fromto`, `usr_work`) VALUES
(1, 1, 'Алексей', 'Фандеев', 1, '18.01.2021-31.01.2021', ''),
(2, 2, 'Никита', 'Котенко', 1, '', 'a:12:{i:1610928000;a:1:{i:14;s:1:\"8\";}i:1611014400;a:1:{i:14;s:1:\"8\";}i:1611100800;a:1:{i:14;s:1:\"8\";}i:1611187200;a:1:{i:14;s:1:\"8\";}i:1611273600;a:1:{i:14;s:1:\"8\";}i:1611360000;a:1:{i:14;s:1:\"8\";}i:1611532800;a:1:{i:14;s:1:\"8\";}i:1611619200;a:1:{i:14;s:1:\"8\";}i:1611705600;a:1:{i:14;s:1:\"8\";}i:1611792000;a:1:{i:14;s:1:\"8\";}i:1611878400;a:1:{i:14;s:1:\"8\";}i:1611964800;a:1:{i:14;s:1:\"8\";}}'),
(3, 2, 'Антон', 'Силличев', 1, '', 'a:12:{i:1610928000;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611014400;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611100800;a:3:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:14;s:1:\"8\";}i:1611187200;a:2:{i:1;s:1:\"8\";i:14;s:1:\"8\";}i:1611273600;a:2:{i:1;s:1:\"8\";i:14;s:1:\"8\";}i:1611360000;a:3:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:14;s:1:\"8\";}i:1611532800;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611619200;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611705600;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611792000;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611878400;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}i:1611964800;a:4:{i:1;s:1:\"8\";i:3;s:1:\"8\";i:2;s:1:\"8\";i:14;s:1:\"8\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `users_positions`
--

CREATE TABLE `users_positions` (
  `pos_id` bigint(20) NOT NULL,
  `pos_name` varchar(16) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_positions`
--

INSERT INTO `users_positions` (`pos_id`, `pos_name`) VALUES
(1, 'dew'),
(2, 'front'),
(3, 'qa');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `usr_tasks`
--

CREATE TABLE `usr_tasks` (
  `task_id` bigint(20) NOT NULL,
  `task_name` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `usr_tasks`
--

INSERT INTO `usr_tasks` (`task_id`, `task_name`) VALUES
(1, 'Task 111'),
(2, 'Task 222'),
(3, 'Task 333'),
(14, '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`o_id`),
  ADD UNIQUE KEY `o_id` (`o_id`),
  ADD UNIQUE KEY `o_name` (`o_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`) USING BTREE,
  ADD KEY `users_fk1` (`usr_pos_id`) USING BTREE,
  ADD KEY `users_fk2` (`usr_role_id`) USING BTREE;

--
-- Indexes for table `users_positions`
--
ALTER TABLE `users_positions`
  ADD PRIMARY KEY (`pos_id`) USING BTREE,
  ADD UNIQUE KEY `pos_id` (`pos_id`) USING BTREE,
  ADD UNIQUE KEY `pos_name` (`pos_name`) USING BTREE;

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`role_id`) USING BTREE,
  ADD UNIQUE KEY `role_name` (`role_name`) USING BTREE;

--
-- Indexes for table `usr_tasks`
--
ALTER TABLE `usr_tasks`
  ADD PRIMARY KEY (`task_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `o_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_positions`
--
ALTER TABLE `users_positions`
  MODIFY `pos_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usr_tasks`
--
ALTER TABLE `usr_tasks`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`usr_pos_id`) REFERENCES `users_positions` (`pos_id`),
  ADD CONSTRAINT `users_fk2` FOREIGN KEY (`usr_role_id`) REFERENCES `users_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
