-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2023 at 05:28 PM
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
(1, 'World', 1),
(2, 'Business', 0),
(3, 'Entertainment', 0),
(4, 'Sports', 0),
(5, 'Politics', 0),
(6, 'Lifestyle', 0),
(7, 'Tech', 5),
(8, 'Research', 3),
(9, 'Health Care', 2),
(10, 'Enviroment', 2),
(11, 'Education', 1),
(12, 'Space', 2);

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

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'Quantum Computing Milestone Achieved by Tech Pioneers', 'In a groundbreaking development, tech innovators have achieved a significant milestone in quantum computing. Researchers at Quantum Dynamics Labs have successfully created a stable, high-capacity quantum bit, bringing us one step closer to practical quantum computing. This breakthrough holds immense potential for revolutionizing data processing, cryptography, and problem-solving capabilities.\r\nThe newly developed quantum bit, or qubit, demonstrates unprecedented stability and coherence, overcoming major hurdles in the path to scalable quantum computing. Experts anticipate that this advancement could usher in a new era of computing, with far-reaching implications for industries ranging from finance to healthcare. As Quantum Dynamics Labs prepares to publish their findings, the tech world eagerly awaits the dawn of a quantum computing era.', 7, '05 Dec,2023', 4, 'img_1.jpg'),
(2, 'AI-Powered Healthcare: Virtual Nurses Assist in Patient Care', 'Advancements in artificial intelligence have led to the introduction of virtual nurses, providing personalized assistance and monitoring for patients. This innovative approach aims to enhance healthcare accessibility and support medical professionals in delivering more efficient patient care.', 9, '05 Dec,2023', 4, 'img_2.jpg'),
(3, 'Robotics Breakthrough: Humanoid Robots Learn to Mimic Complex Tasks', 'In a significant leap for robotics, humanoid robots equipped with advanced learning algorithms can now mimic intricate human tasks. This breakthrough has implications for industries ranging from manufacturing to healthcare, where robots can assist in delicate procedures.', 7, '05 Dec,2023', 5, 'img_3.jpg'),
(4, 'Climate Action Summit: Nations Commit to Accelerate Renewable Energy Transition', 'World leaders converge at the Climate Action Summit, pledging to expedite the transition to renewable energy. The ambitious commitments include increased investments in green technologies and collaborative efforts to combat climate change.', 10, '05 Dec,2023', 5, 'img_4.jpg'),
(5, 'Global Education Initiative: Online Learning Platform Offers Free Courses', 'In a bid to democratize education, a leading online learning platform is launching a global initiative to provide free access to a variety of courses. The move aims to empower individuals worldwide with knowledge and skills, fostering a more inclusive and educated society.\r\n\r\n', 11, '05 Dec,2023', 5, 'img_5.jpg'),
(6, 'Mars Mission Update: Rover Discovers Potential Signs of Ancient Lif', 'Exciting news from the red planet! The Mars rover has detected intriguing chemical signatures in rock samples, hinting at the possibility of past microbial life. Scientists are buzzing with anticipation as they analyze the data to unravel the mysteries of Mars ancient history.', 12, '05 Dec,2023', 5, 'img_6.jpg'),
(7, 'Ocean Exploration Unveils New Deep-Sea Species', 'Marine biologists conducting deep-sea exploration have discovered several new species previously unknown to science. These findings shed light on the incredible biodiversity of our oceans and emphasize the importance of conservation efforts.', 10, '05 Dec,2023', 3, 'img_7.jpg'),
(8, 'Electric Vehicles Surge: Global Sales Reach Record High', 'The electric vehicle revolution is in full swing as global sales reach an unprecedented high. With increased affordability, expanding charging infrastructure, and growing environmental awareness, more drivers are making the switch to electric cars.', 7, '05 Dec,2023', 3, 'img_8.jpg'),
(9, 'Culinary Innovation: Lab-Grown Meat Enters Mass Production', 'Lab-grown meat has taken a leap forward as it enters mass production, offering a sustainable and cruelty-free alternative to traditional meat production. The development is poised to reshape the future of the food industry.', 9, '05 Dec,2023', 3, 'img_9.jpg'),
(10, 'Blockchain Adoption Soars in Financial Services', 'The financial sector is embracing blockchain technology at an unprecedented rate. Banks and financial institutions are integrating blockchain for secure transactions, reducing costs, and improving transparency in the financial ecosystem.', 7, '05 Dec,2023', 3, 'img_10.jpg'),
(11, 'Artificial Intelligence in Art: AI-Generated Masterpieces Gain Recognition', 'AI-generated art is making waves in the art world as pieces created by artificial intelligence algorithms gain recognition and appreciation. The intersection of technology and creativity is challenging traditional notions of artistic expression.', 7, '05 Dec,2023', 6, 'img_11.jpg'),
(12, 'Smart Cities Initiative: Urban Areas Embrace Sustainable Technologies', 'Cities worldwide are embracing smart technologies to enhance efficiency and sustainability. From smart grids to IoT-enabled infrastructure, the Smart Cities Initiative aims to create urban environments that are more livable and environmentally friendly.', 1, '05 Dec,2023', 6, 'img_12.jpg'),
(13, 'Breakthrough in Alzheimer s Research: Promising Drug Shows Positive Results', 'A potential breakthrough in Alzheimers research emerges as a new drug demonstrates positive results in clinical trials. The promising treatment offers hope in the fight against neurodegenerative diseases.', 8, '05 Dec,2023', 1, 'img_13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requestforauthor`
--

CREATE TABLE `requestforauthor` (
  `sno` int NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `about` varchar(200) NOT NULL,
  `resume` varchar(20) NOT NULL,
  `accepted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requestforauthor`
--

INSERT INTO `requestforauthor` (`sno`, `fname`, `lname`, `user`, `pass`, `about`, `resume`, `accepted`) VALUES
(3, 'sadfasdf', 'asdfasdf', 'asdffas', 'fasfsaf', 'fsafsaf', 'file_3.pdf', 1),
(6, 'Vishal', 'Mishra ', 'vishal', 'e80b5017098950fc58aad83c8c14978e', 'ONE TWO THREE', 'file_6.pdf', 1);

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
('208f7cafa1d304bfea85', 'Akash', 4, '0', '05-12-2023 08:00:45pm', '05-12-2023 09:22:09pm'),
('25670850b4954e2eb44c', 'sadmin', 1, '1', '07-12-2023 09:00:04pm', '07-12-2023 10:37:25pm'),
('5af23b6d13e0013b216d', 'sadmin', 1, '1', '05-12-2023 07:45:04pm', '05-12-2023 07:45:17pm'),
('5de48220921e41d2d0dd', 'Shreyesh', 6, '0', '05-12-2023 09:37:07pm', '05-12-2023 09:38:25pm'),
('61843745355e45de253f', 'sadmin', 1, '1', '05-12-2023 09:38:29pm', NULL),
('711bf424f1165859df0e', 'demo', 2, '0', '05-12-2023 07:47:10pm', '05-12-2023 07:52:43pm'),
('9785c3c44a095b88c346', 'Deepak', 3, '0', '05-12-2023 09:34:37pm', '05-12-2023 09:36:43pm'),
('bc24d708065567d35d94', 'sadmin', 1, '1', '05-12-2023 07:52:49pm', NULL),
('c2ea38feda80696642c3', 'sadmin', 1, '1', '07-12-2023 10:47:54pm', '07-12-2023 10:51:24pm'),
('df1a57a355e30dec1a22', 'sadmin', 1, '1', '07-12-2023 10:57:33pm', NULL),
('fd6f1885cc78d1c18e17', 'Pratham', 5, '0', '05-12-2023 09:22:14pm', '05-12-2023 09:34:13pm'),
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
(6, 'Shreyesh', 'Srivastava', 'Shreyesh', '2dce9a586b08b484f9966cf8140627d6', '0'),
(8, 'Vishal', 'Mishra ', 'vishal', 'e80b5017098950fc58aad83c8c14978e', '0');

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
-- Indexes for table `requestforauthor`
--
ALTER TABLE `requestforauthor`
  ADD PRIMARY KEY (`sno`);

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
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `requestforauthor`
--
ALTER TABLE `requestforauthor`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
