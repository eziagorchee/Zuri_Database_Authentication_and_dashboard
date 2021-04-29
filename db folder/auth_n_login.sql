-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2021 at 08:14 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_n_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `user_id`, `course_title`, `course_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'chemistry', 'the class holds two times per week', '2021-04-28 21:39:49', '2021-04-29 07:11:24'),
(10, 8, 'kl', 'hhg', '2021-04-28 22:26:03', '2021-04-28 22:26:03'),
(14, 6, 'geography', 'course of the earth 556', '2021-04-29 03:48:01', '2021-04-29 06:03:10'),
(15, 6, 'chemistry', 'chemistry of the earthtyu', '2021-04-29 05:42:35', '2021-04-29 06:03:17'),
(16, 6, 'mathematics9', 'study everyday', '2021-04-29 05:42:58', '2021-04-29 06:03:25'),
(18, 6, 'gly', 'bbbccc', '2021-04-29 06:04:45', '2021-04-29 06:04:45'),
(19, 1, 'chemistry', '202 is the course code', '2021-04-29 06:07:24', '2021-04-29 07:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Chiagozie', 'Eziagor', 'eziagorchy@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-04-27 21:26:51', '2021-04-29 06:05:29'),
(5, 'ose', 'marve', 'og@gmail.com', '934b535800b1cba8f96a5d72f72f1611', '2021-04-27 22:56:54', '2021-04-27 22:56:54'),
(6, 'chee', 'chef', 'og1@hmail.coo', '202cb962ac59075b964b07152d234b70', '2021-04-28 00:33:29', '2021-04-28 22:27:33'),
(7, 'ose', 'gab', 'uu@gmail.com', '735b90b4568125ed6c3f678819b6e058', '2021-04-28 07:31:54', '2021-04-28 07:32:30'),
(8, 'kenny', 'g', 'kg@g.co', 'de3ec0aa2234aa1e3ee275bbc715c6c9', '2021-04-28 22:18:18', '2021-04-28 22:18:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
