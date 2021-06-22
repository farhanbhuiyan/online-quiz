-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 08:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `u_id`, `cat_id`, `score`, `date`) VALUES
(1, 1, 1, 1, '2019-10-25 21:16:00'),
(2, 1, 1, 4, '2019-10-25 21:17:15'),
(3, 87, 1, 0, '2019-10-25 21:19:02'),
(4, 87, 1, 0, '2019-10-28 12:15:03'),
(5, 87, 1, 2, '2019-10-28 12:15:57'),
(6, 87, 1, 0, '2019-10-28 12:41:19'),
(7, 87, 1, 0, '2019-10-28 12:41:55'),
(8, 87, 1, 4, '2019-10-28 16:55:13'),
(9, 87, 1, 0, '2019-10-28 16:57:17'),
(10, 87, 1, 0, '2019-10-28 16:57:55'),
(11, 87, 1, 0, '2019-10-28 16:58:32'),
(12, 87, 1, 0, '2019-10-28 16:58:57'),
(13, 87, 1, 0, '2019-10-28 17:07:07'),
(14, 87, 3, 0, '2019-10-28 17:10:20'),
(15, 87, 6, 0, '2019-10-30 10:05:44'),
(16, 87, 1, 0, '2019-10-30 10:06:21'),
(17, 87, 1, 1, '2019-10-30 10:06:46'),
(18, 87, 1, 0, '2019-10-30 10:15:15'),
(19, 87, 1, 3, '2019-10-30 10:27:56'),
(20, 87, 1, 2, '2019-10-30 10:30:57'),
(21, 87, 1, 2, '2019-10-30 10:31:48'),
(22, 87, 1, 0, '2019-10-30 10:32:00'),
(23, 87, 6, 0, '2019-10-30 10:33:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
