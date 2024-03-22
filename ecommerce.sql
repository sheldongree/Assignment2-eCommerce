-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2024 at 08:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `last_name`, `middle_name`) VALUES
(22, 37, 'Hussain', 'Amin', 'K'),
(28, 38, 'Sheldon', 'Green', 'J'),
(29, 39, 'jon ', 'don', 'doe');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `publication_title` varchar(255) NOT NULL,
  `publication_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `publication_status` enum('public','private') NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(61, 22, 'Weather-Montreal', 'I think the weather in Montreal has been very nice lately!!', '2024-03-20 05:33:06', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_comment`
--

INSERT INTO `publication_comment` (`publication_comment_id`, `publication_id`, `timestamp`, `profile_id`, `comment_text`) VALUES
(29, 61, '2024-03-22 20:24:02', 29, 'comment on another post');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(37, 'Hussain', '$2y$10$cPtSUMd6GV6wwqcZxPHQ4.PRCHqFMa3S5OY.nFyvEWonyjM9kChqC'),
(38, 'Sheldon', '$2y$10$bZMBGUrCYaih//A5jVjN9OgjxkkJpXeOGZWdoDE74tlOhm0rGE2BS'),
(39, 'jon', '$2y$10$lIjQJsBDj6y2sRue7/BxB.H52MebmZyRlaGq8c4lWwqRDLgzmt9P6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `publication_id` (`publication_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `publication_comment_ibfk_1` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publication_comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
