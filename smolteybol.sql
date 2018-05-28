-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 07:07 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demofiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `smolteybol`
--

CREATE TABLE `smolteybol` (
  `_id` int(6) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `loc` varchar(30) NOT NULL,
  `pop` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `Content_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smolteybol`
--

INSERT INTO `smolteybol` (`_id`, `city`, `loc`, `pop`, `state`, `Content_id`) VALUES
(1, 'Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', NULL),
(2, 'Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', NULL),
(3, 'Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', NULL),
(4, 'Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smolteybol`
--
ALTER TABLE `smolteybol`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smolteybol`
--
ALTER TABLE `smolteybol`
  MODIFY `_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
