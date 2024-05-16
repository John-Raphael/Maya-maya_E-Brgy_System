-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 05:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maya-maya_e_brgy_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `map-resident-info`
--

CREATE TABLE `map-resident-info` (
  `id` int(6) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `head_of_family_name` varchar(255) NOT NULL,
  `member_names` text NOT NULL,
  `num_members` int(6) NOT NULL,
  `male_count` int(6) NOT NULL,
  `female_count` int(6) NOT NULL,
  `senior_count` int(6) NOT NULL,
  `pwd_count` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map-resident-info`
--

INSERT INTO `map-resident-info` (`id`, `address`, `head_of_family_name`, `member_names`, `num_members`, `male_count`, `female_count`, `senior_count`, `pwd_count`) VALUES
(2, 'De Leon Street, Maya-maya, Cavite City, Cavite, Calabarzon, 4100, Philippines', 'Senior Agila', 'Senior Agila 2, Senior Agila 3', 2, 2, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map-resident-info`
--
ALTER TABLE `map-resident-info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map-resident-info`
--
ALTER TABLE `map-resident-info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
