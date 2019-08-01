-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2019 at 07:50 AM
-- Server version: 5.6.40-84.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachesl_waygook-teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employments`
--

CREATE TABLE `Employments` (
  `employmentID` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `prepaid_amount` decimal(10,0) NOT NULL,
  `rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employments`
--

INSERT INTO `Employments` (`employmentID`, `teacher_id`, `student_id`, `prepaid_amount`, `rate`) VALUES
(10, 28, 21, '80', '23'),
(12, 28, 23, '5', '20'),
(13, 24, 23, '0', '20'),
(14, 26, 23, '5', '22');

-- --------------------------------------------------------

--
-- Table structure for table `Incoming_Payments`
--

CREATE TABLE `Incoming_Payments` (
  `incomingID` int(11) NOT NULL,
  `employment_id` int(11) DEFAULT NULL,
  `amount` decimal(7,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Incoming_Payments`
--

INSERT INTO `Incoming_Payments` (`incomingID`, `employment_id`, `amount`, `date`) VALUES
(1, NULL, NULL, NULL),
(2, 10, '5.00', NULL),
(3, 10, '5.00', '2019-04-20 08:24:05'),
(4, 10, NULL, '2019-04-20 08:35:37'),
(5, 10, '5.00', '2019-04-20 08:51:13'),
(6, NULL, '5.00', '2019-04-20 09:00:58'),
(7, NULL, '5.00', '2019-04-20 09:09:51'),
(8, 10, '5.00', '2019-04-21 09:37:11'),
(9, 10, '5.00', '2019-04-21 09:48:51'),
(10, 10, '5.00', '2019-04-21 09:54:43'),
(11, 10, '5.00', '2019-04-21 10:04:27'),
(12, 12, '10.00', '2019-04-21 10:07:15'),
(13, 12, '5.00', '2019-04-21 10:22:20'),
(14, 12, '5.00', '2019-04-21 10:48:47'),
(15, 14, '5.00', '2019-04-21 16:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `Lessons`
--

CREATE TABLE `Lessons` (
  `lessonID` int(11) NOT NULL,
  `employment_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `duration` decimal(10,0) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `teacher_rate` decimal(10,0) DEFAULT NULL,
  `waygook_rate` decimal(10,0) DEFAULT NULL,
  `teacher_payment` decimal(10,0) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Lessons`
--

INSERT INTO `Lessons` (`lessonID`, `employment_id`, `teacher_id`, `student_id`, `datetime`, `duration`, `rating`, `teacher_rate`, `waygook_rate`, `teacher_payment`, `confirmed`) VALUES
(36, 10, 28, 21, '2019-03-17 07:00:00', '60', NULL, '23', '4', '19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `messageID` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message_content` varchar(5000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`messageID`, `from_user_id`, `to_user_id`, `message_content`, `date`) VALUES
(22, 21, 28, 'What time are you free on the weekend?', '2019-03-16 14:23:00'),
(23, 23, 28, 'Hello, I just saw your profile. Are you free to organize a lesson?', '2019-04-12 14:55:39'),
(24, 23, 28, 'Hello, I just saw your profile. Are you free to organize a lesson?', '2019-04-12 14:57:18'),
(25, 23, 28, 'Hello, I just saw your profile. Are you free to organize a lesson?', '2019-04-12 14:57:23'),
(26, 23, 28, 'Testing testing.', '2019-04-12 15:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `Outgoing_Payments`
--

CREATE TABLE `Outgoing_Payments` (
  `outgoingID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `reviewID` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `review_content` varchar(5000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Threads`
--

CREATE TABLE `Threads` (
  `threadID` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(500) DEFAULT 'assets/images/profile-pics/default_profile_pic.png',
  `description` varchar(10000) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `flag` varchar(500) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `education_major` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `rate` decimal(10,0) DEFAULT NULL,
  `skype_name` varchar(255) DEFAULT NULL,
  `lesson_hours` decimal(10,0) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `account_balance` decimal(10,0) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT 'Asia/Seoul'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `first_name`, `last_name`, `username`, `email`, `password`, `profile_pic`, `description`, `role`, `gender`, `nationality`, `flag`, `education_level`, `education_major`, `DOB`, `rate`, `skype_name`, `lesson_hours`, `rating`, `account_balance`, `timezone`) VALUES
(20, 'Subin', 'Kim', 'kim_subin', 'kim_subin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/korean-female-generic-1.jpg', NULL, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kim_subin', '0', NULL, '0', 'Asia/Seoul'),
(21, 'Chaewon', 'Park', 'park_chaewon', 'park_chaewon@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/korean-female-generic-2.jpg', NULL, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'park_chaewon', '0', NULL, '0', 'Asia/Seoul'),
(22, 'Do Young', 'Lee', 'lee_doyoung', 'lee_doyoung@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/korean-male-generic-1.jpg', NULL, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lee_doyoung', '0', NULL, '0', 'Asia/Seoul'),
(23, 'Subin', 'Lee', 'lee_subin', 'lee_subin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/korean-female-generic-3.jpg', 'Hey, I\'m Subin! I\'d love to learn English :)', 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lee_subin', '0', NULL, '0', 'Asia/Seoul'),
(24, 'James', 'Smith', 'james_smith', 'james_smith@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/male-generic-1.jpg', NULL, 'teacher', 'male', 'american', 'assets/images/icons/icons8_american_flag.png', 'teritary', 'english', '1975-03-11', '20', 'james_smith', '0', NULL, '0', 'Asia/Seoul'),
(25, 'John', 'Clapton', 'john_clapton', 'john_clapton@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/male-generic-2.jpg', NULL, 'teacher', 'male', 'british', 'assets/images/icons/icons8_british_flag.png', 'bachelor', 'engineering', '1982-02-02', '25', 'john_clapton', '0', NULL, '0', 'Asia/Seoul'),
(26, 'Eric', 'Lennon', 'eric_lennon', 'eric_lennon@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/male-generic-3.jpg', NULL, 'teacher', 'male', 'british', 'assets/images/icons/icons8_british_flag.png', 'teritary', 'english', '1992-11-11', '22', 'eric_lennon', '0', NULL, '0', 'Asia/Seoul'),
(27, 'James', 'Richards', 'james_richards', 'james_richards@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/male-generic-4.jpg', NULL, 'teacher', 'male', 'south_africa', 'assets/images/icons/icons8_south_africa_flag.png', 'bachelor', 'education', '1990-08-19', '17', 'james_richards', '0', NULL, '0', 'Asia/Seoul'),
(28, 'Jessica', 'Austin', 'jessica_austin', 'jessica_austin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/female-generic-1.jpg', NULL, 'teacher', 'female', 'american', 'assets/images/icons/icons8_american_flag.png', 'bachelor', 'education', '1988-08-19', '23', 'jessica_austin', '0', NULL, '0', 'Asia/Seoul'),
(29, 'Ashley', 'Thomas', 'ashley_thomas', 'ashley_thomas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/female-generic-2.jpg', NULL, 'teacher', 'female', 'british', 'assets/images/icons/icons8_british_flag.png', 'bachelor', 'english', '1990-06-19', '20', 'ashley_thomas', '0', NULL, '0', 'Asia/Seoul'),
(31, 'Nina', 'Johnson', 'nina_johnson', 'nina_johnson@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/images/profile-pics/female-generic-3.jpg', NULL, 'teacher', 'female', 'south_africa', 'assets/images/icons/icons8_south_africa_flag.png', 'masters', 'education', '1986-09-11', '26', 'nina_johnson', '0', NULL, '0', 'Asia/Seoul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employments`
--
ALTER TABLE `Employments`
  ADD PRIMARY KEY (`employmentID`),
  ADD UNIQUE KEY `employmentID` (`employmentID`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `Incoming_Payments`
--
ALTER TABLE `Incoming_Payments`
  ADD PRIMARY KEY (`incomingID`),
  ADD KEY `incoming_payments_ibfk_2` (`employment_id`);

--
-- Indexes for table `Lessons`
--
ALTER TABLE `Lessons`
  ADD PRIMARY KEY (`lessonID`),
  ADD KEY `employment_id` (`employment_id`),
  ADD KEY `lessons_ibfk_2` (`teacher_id`),
  ADD KEY `lessons_ibfk_3` (`student_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `Outgoing_Payments`
--
ALTER TABLE `Outgoing_Payments`
  ADD PRIMARY KEY (`outgoingID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `Threads`
--
ALTER TABLE `Threads`
  ADD PRIMARY KEY (`threadID`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employments`
--
ALTER TABLE `Employments`
  MODIFY `employmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Incoming_Payments`
--
ALTER TABLE `Incoming_Payments`
  MODIFY `incomingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Lessons`
--
ALTER TABLE `Lessons`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Outgoing_Payments`
--
ALTER TABLE `Outgoing_Payments`
  MODIFY `outgoingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Threads`
--
ALTER TABLE `Threads`
  MODIFY `threadID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Employments`
--
ALTER TABLE `Employments`
  ADD CONSTRAINT `employments_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employments_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Incoming_Payments`
--
ALTER TABLE `Incoming_Payments`
  ADD CONSTRAINT `incoming_payments_ibfk_2` FOREIGN KEY (`employment_id`) REFERENCES `Employments` (`employmentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Lessons`
--
ALTER TABLE `Lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`employment_id`) REFERENCES `Employments` (`employmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Outgoing_Payments`
--
ALTER TABLE `Outgoing_Payments`
  ADD CONSTRAINT `outgoing_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Threads`
--
ALTER TABLE `Threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_3` FOREIGN KEY (`message_id`) REFERENCES `Messages` (`messageID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
