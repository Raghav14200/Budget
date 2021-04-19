-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2020 at 08:18 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `expense_title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`plan_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `user_id`, `plan_id`, `person_name`, `expense_title`, `date`, `amount`, `img`) VALUES
(1, 2, 1, 'a', 'new budget', '2020-06-12', 500, 'img/05-05-2020-1588679825'),
(2, 2, 1, 'b', 'Accountancy', '2020-05-31', 50, NULL),
(3, 2, 1, 'Raghavendra Achar C', 'Learn stock market', '2020-05-31', 20, NULL),
(4, 2, 1, 'c', 'Wedding', '2020-05-31', 20, 'img/05-05-2020-1588689465'),
(5, 4, 5, 'b', 'Wedding', '2020-06-26', 1000, NULL),
(6, 4, 5, 'a', 'Accountancy', '2020-05-31', 5000, 'img/05-05-2020-1588690747'),
(8, 3, 3, 'b', 'new budget', '2020-05-30', 60, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`plan_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `user_id`, `plan_id`, `person_name`) VALUES
(1, 2, 1, 'Raghavendra Achar C'),
(2, 2, 1, 'a'),
(3, 2, 1, 'b'),
(4, 2, 1, 'c'),
(5, 2, 2, 'a'),
(6, 2, 2, 'b'),
(7, 3, 3, 'a'),
(8, 3, 3, 'b'),
(9, 3, 3, 'c'),
(10, 3, 4, 'a'),
(11, 3, 4, 'b'),
(12, 3, 4, 'c'),
(13, 3, 4, 'd'),
(14, 4, 5, 'a'),
(15, 4, 5, 'b'),
(16, 4, 5, 'c'),
(19, 3, 7, 'a'),
(20, 3, 7, 'z');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `user_id`, `title`, `people`, `budget`, `fromdate`, `todate`) VALUES
(1, 2, 'new budget', 4, 80, '2020-05-28', '2020-10-21'),
(2, 2, 'Learn stock market', 2, 8000, '2020-06-01', '2020-06-30'),
(3, 3, 'Accountancy', 3, 50, '2020-05-23', '2020-06-23'),
(4, 3, 'Wedding', 4, 20000, '2020-05-14', '2020-07-14'),
(5, 4, 'study', 3, 5000, '2020-05-30', '2020-07-30'),
(7, 3, 'savings', 2, 6000, '2020-05-21', '2020-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `number`) VALUES
(1, 'ram', 'ram@gmail.com', '82c3789278e7e0d440747106c794b16a', 1234567890),
(2, 'Raghavendra', 'raghavendraacharc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 8448567890),
(3, 'chitpady', 'chitpady8@gmail.com', '5bd2026f128662763c532f2f4b6f2476', 8448567890),
(4, 'veena', 'raghav142001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1234567895),
(5, 'Ramya', 'ramya@gmail.com', 'dc647eb65e6711e155375218212b3964', 9738069362);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
