-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 02:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `acnt_id` varchar(20) NOT NULL,
  `user_resident` varchar(20) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `online_status` varchar(20) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acnt_id`, `user_resident`, `user_type`, `username`, `password`, `online_status`, `regs_date`, `status`) VALUES
('ACNT-00000', 'RSDT-00000', 'ADMIN', 'admin', 'password', 'online', '2023-05-15 12:00:18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `aclg_id` varchar(20) NOT NULL,
  `user_account` varchar(20) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `activity_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`aclg_id`, `user_account`, `activity`, `date_time`, `activity_status`) VALUES
('ACLG-00000', 'ACNT-00000', 'Login successfully', '2023-05-15 12:08:54', 'active'),
('ACLG-00001', 'ACNT-00000', 'Log Out Successfully', '2023-05-17 12:23:43', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangay`
--

CREATE TABLE `tbl_barangay` (
  `brgy_id` varchar(20) NOT NULL,
  `brgy_name` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `mission` varchar(20) NOT NULL,
  `vission` varchar(20) NOT NULL,
  `pr_contact` varchar(20) NOT NULL,
  `sr_contact` varchar(20) NOT NULL,
  `fb_link` varchar(20) NOT NULL,
  `last_update` datetime NOT NULL,
  `brgy_status` varchar(20) DEFAULT 'active',
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `ofcl_id` varchar(20) NOT NULL,
  `resident` varchar(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ofcl_status` varchar(50) NOT NULL DEFAULT 'active',
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`ofcl_id`, `resident`, `position`, `regs_date`, `ofcl_status`, `photo`) VALUES
('OFCL-00000', 'RSDT-00000', 'Barangay Captain', '2023-05-15 11:35:00', 'active', 'sample_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `rsdt_id` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `ext_name` varchar(20) NOT NULL,
  `pr_contact` varchar(15) NOT NULL,
  `sr_contact` varchar(15) DEFAULT NULL,
  `hs_num` varchar(20) NOT NULL,
  `strt_name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `cvl_status` varchar(50) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `voter_status` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `rsdt_status` varchar(50) NOT NULL DEFAULT 'active',
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`rsdt_id`, `f_name`, `m_name`, `l_name`, `ext_name`, `pr_contact`, `sr_contact`, `hs_num`, `strt_name`, `gender`, `birthdate`, `birthplace`, `cvl_status`, `citizenship`, `voter_status`, `occupation`, `regs_date`, `rsdt_status`, `photo`) VALUES
('RSDT-00000', 'Juan', 'Pablo', 'Dela Cruz', '', '111 111 111', '222 222 222', '01', 'Sample Street', 'Male', '2001-05-20', 'Tondo Manila', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-071398', 'Edison', 'Pablo', 'Rivera', '', '111', '222', '05', 'Parola Compound', 'Male', '2000-05-16', 'Tondo', 'Single', 'Filipino', 'Not Registered', 'Driver', '2023-05-16 22:08:57', 'active', 'sample_photo.jpg'),
('RSDT-651028', 'Allyn', 'Garcia', 'Bayles', 'Jr.', '111 111 111', '222 222 222', '01', 'Parola Compound', 'Male', '2001-05-20', 'Tondo, Manila', 'Single', 'Filipino', 'Not Registered', 'N/A', '2023-05-15 18:13:06', 'deleted', 'sample_photo.jpg'),
('RSDT-657819', 'Juan', 'Pablo', 'Aquino', '', '222', '333', '02', 'Parola Compound', 'Male', '2003-05-25', 'Tondo', 'Single', 'Filipino', 'Registered', 'Manager', '2023-05-16 19:31:36', 'active', 'sample_photo.jpg'),
('RSDT-825963', 'Eduard', 'Canda', 'Rivera', '', '0001', '0002', '01', 'Parola Compound', 'Male', '2001-05-16', 'Sampaloc, Manila', 'Married', 'Filipino', 'Not Registered', 'Driver', '2023-05-16 19:25:18', 'active', 'sample_photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`acnt_id`),
  ADD KEY `rsdt_acntFK` (`user_resident`);

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`aclg_id`),
  ADD KEY `acnt_aclgFK` (`user_account`);

--
-- Indexes for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`ofcl_id`),
  ADD KEY `rsdt_ofclFK` (`resident`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`rsdt_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD CONSTRAINT `rsdt_acntFK` FOREIGN KEY (`user_resident`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD CONSTRAINT `acnt_aclgFK` FOREIGN KEY (`user_account`) REFERENCES `tbl_account` (`acnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD CONSTRAINT `rsdt_ofclFK` FOREIGN KEY (`resident`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
