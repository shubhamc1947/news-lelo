-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 02:39 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_lelo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `post` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'World', 0),
(2, 'Business', 0),
(3, 'Entertainment', 0),
(4, 'Sports', 0),
(5, 'Politics', 0),
(6, 'Lifestyle', 0),
(7, 'Tech', 0),
(8, 'Research', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `category` int DEFAULT NULL,
  `post_date` varchar(20) DEFAULT NULL,
  `author` int DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `st_time` varchar(50) DEFAULT NULL,
  `en_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `user_name`, `userid`, `role`, `st_time`, `en_time`) VALUES
('208f7cafa1d304bfea85', 'Akash', 4, '0', '05-12-2023 08:00:45pm', NULL),
('5af23b6d13e0013b216d', 'sadmin', 1, '1', '05-12-2023 07:45:04pm', '05-12-2023 07:45:17pm'),
('711bf424f1165859df0e', 'demo', 2, '0', '05-12-2023 07:47:10pm', '05-12-2023 07:52:43pm'),
('bc24d708065567d35d94', 'sadmin', 1, '1', '05-12-2023 07:52:49pm', NULL),
('ff583d4ba5991e8d6e49', 'demo', 2, '2', '05-12-2023 07:45:22pm', '05-12-2023 07:46:42pm');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `footer`, `logo`) VALUES
(1, 'News Lelo', 'all copyright reserved 2023', 'images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Shubham', 'Chaturvedi', 'sadmin', 'c5edac1b8c1d58bad90a246d8f08f53b', '1'),
(2, 'demo', 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '0'),
(3, 'Deepak', 'Kumar', 'Deepak', '498b5924adc469aa7b660f457e0fc7e5', '0'),
(4, 'Akash', 'Kharwar', 'Akash', '94754d0abb89e4cf0a7f1c494dbb9d2c', '0'),
(5, 'Pratham', 'Kumar', 'Pratham', '916172e7995de7e1e64c0c3aad1edd59', '0'),
(6, 'Shreyesh', 'Srivastava', 'Shreyesh', '2dce9a586b08b484f9966cf8140627d6', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
