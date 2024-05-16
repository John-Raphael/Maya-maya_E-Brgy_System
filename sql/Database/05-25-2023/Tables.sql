-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 02:37 PM
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
  `online_status` varchar(20) NOT NULL DEFAULT 'online',
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acnt_id`, `user_resident`, `user_type`, `username`, `password`, `online_status`, `regs_date`, `status`) VALUES
('ACNT-00000', 'RSDT-00000', 'ADMIN', 'admin', 'password', 'online', '2023-05-15 12:00:18', 'active'),
('ACNT-317045', 'RSDT-071398', 'ADMIN', 'edison', 'password', 'online', '2023-05-24 21:09:01', 'active'),
('ACNT-607592', 'RSDT-832907', 'ADMIN', 'angelico', 'password', 'online', '2023-05-24 20:52:14', 'deleted'),
('ACNT-871542', 'RSDT-362547', 'ADMIN', 'lallyn', 'password', 'online', '2023-05-25 18:24:46', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `aclg_id` varchar(20) NOT NULL,
  `user_account` varchar(20) NOT NULL,
  `activity` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `activity_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`aclg_id`, `user_account`, `activity`, `date_time`, `activity_status`) VALUES
('ACLG-00000', 'ACNT-00000', 'Login successfully', '2023-05-15 12:08:54', 'active'),
('ACLG-00001', 'ACNT-00000', 'Logout Successfully', '2023-05-17 12:23:43', 'active'),
('ACLG-018456', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:28:47', 'active'),
('ACLG-034865', 'ACNT-00000', 'Login Successfully', '2023-05-22 23:47:06', 'active'),
('ACLG-035497', 'ACNT-00000', 'Login Successfully', '2023-05-22 23:29:11', 'active'),
('ACLG-035968', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 20:26:59', 'active'),
('ACLG-047893', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:33', 'active'),
('ACLG-076841', 'ACNT-607592', 'Login Successfully', '2023-05-24 21:20:47', 'active'),
('ACLG-084123', 'ACNT-00000', 'Password Changed for the account of Benjamin C. Ausria  (ACNT-00000)', '2023-05-25 18:58:59', 'active'),
('ACLG-124938', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 17:23:06', 'active'),
('ACLG-125736', 'ACNT-00000', 'Login Successfully', '2023-05-25 07:37:12', 'active'),
('ACLG-132709', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:26', 'active'),
('ACLG-135209', 'ACNT-00000', 'Delete account ACNT-607592', '2023-05-24 21:16:43', 'active'),
('ACLG-140976', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BSCRT-RSDT-000002-5-25-2023, <br> Bussiness: Computer Shop, <br> Purpose: Business Permit', '2023-05-25 12:55:15', 'active'),
('ACLG-142758', 'ACNT-00000', 'restored account ACNT-317045', '2023-05-24 21:20:11', 'active'),
('ACLG-159760', 'ACNT-00000', 'Generate Barangay Clearance for Mishelle C. Mejilla  (RSDT-000002)', '2023-05-25 16:31:35', 'active'),
('ACLG-195836', 'ACNT-00000', 'Generate Indigency certificate for Angelico A. Forbes  (RSDT-832907), Purpose: testing', '2023-05-25 08:25:59', 'active'),
('ACLG-208169', 'ACNT-00000', 'Generate Indigency certificate for Myrna Z. Giron  (RSDT-000009), Purpose: for school requirements', '2023-05-22 23:38:29', 'active'),
('ACLG-210796', 'ACNT-00000', 'Logout Successfully', '2023-05-24 21:20:27', 'active'),
('ACLG-257368', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Certificate Number: BRCRT-', '2023-05-25 12:49:52', 'active'),
('ACLG-269341', 'ACNT-00000', 'Delete account ACNT-317045', '2023-05-24 21:20:09', 'active'),
('ACLG-295384', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 20:31:57', 'active'),
('ACLG-317045', 'ACNT-00000', 'Created account for Edison P. Rivera  (RSDT-071398)', '2023-05-24 21:09:01', 'active'),
('ACLG-326987', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:05:02', 'active'),
('ACLG-340725', 'ACNT-00000', 'restored account ACNT-317045', '2023-05-24 21:18:31', 'active'),
('ACLG-346952', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:20:40', 'active'),
('ACLG-362547', 'ACNT-00000', 'Register Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 17:19:14', 'active'),
('ACLG-369812', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:26:50', 'active'),
('ACLG-390827', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:06', 'active'),
('ACLG-409517', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-05-25 16:30:50', 'active'),
('ACLG-413065', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:46', 'active'),
('ACLG-430815', 'ACNT-00000', 'Update resident data of Angelico 2 A. Forbes 2 2 (RSDT-832907)', '2023-05-25 08:07:58', 'active'),
('ACLG-432108', 'ACNT-00000', 'restored account ACNT-00000', '2023-05-24 21:18:28', 'active'),
('ACLG-456029', 'ACNT-00000', 'Update resident data of Lallyn Anne G. Bayles 1  (RSDT-362547)', '2023-05-25 18:06:15', 'active'),
('ACLG-463271', 'ACNT-00000', 'Delete account of ', '2023-05-24 21:01:48', 'active'),
('ACLG-468092', 'ACNT-00000', 'Update resident data of Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 18:24:32', 'active'),
('ACLG-547239', 'ACNT-00000', 'Generate Indigency certificate for Edison P. Rivera  (RSDT-071398), Purpose: Testing', '2023-05-25 16:35:33', 'active'),
('ACLG-567249', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:38:22', 'active'),
('ACLG-567908', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:47:00', 'active'),
('ACLG-572634', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:29:06', 'active'),
('ACLG-578264', 'ACNT-00000', 'Update resident data of Angelico A. Forbes  (RSDT-832907)', '2023-05-25 08:09:00', 'active'),
('ACLG-603291', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:36:58', 'active'),
('ACLG-607431', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:30', 'active'),
('ACLG-607592', 'ACNT-00000', 'Created account for Angelico A. Forbes  (RSDT-832907)', '2023-05-24 20:52:14', 'active'),
('ACLG-619237', 'ACNT-00000', 'Login Successfully', '2023-05-24 21:37:46', 'active'),
('ACLG-639270', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: Sample, <br> Location: Sample Address', '2023-05-25 16:36:00', 'active'),
('ACLG-647920', 'ACNT-00000', 'deactivate resident ID  Josilito A. Gonzalle  ', '2023-05-22 20:16:39', 'active'),
('ACLG-652194', 'ACNT-00000', 'Generate Indigency certificate for Edison P. Rivera  (RSDT-071398), Purpose: testing', '2023-05-25 13:18:13', 'active'),
('ACLG-683927', 'ACNT-00000', 'deactivate resident ID RSDT-000007 ', '2023-05-22 19:41:40', 'active'),
('ACLG-702356', 'ACNT-607592', 'Delete account ACNT-607592', '2023-05-24 21:21:06', 'active'),
('ACLG-736280', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:34', 'active'),
('ACLG-746185', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:31', 'active'),
('ACLG-765398', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BRCRT', '2023-05-25 12:51:46', 'active'),
('ACLG-768430', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 20:31:30', 'active'),
('ACLG-785061', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Bussiness: Forbes Computer Shop, <br> Location: 291 P. Burgos Ave., Caridad, Cavite City', '2023-05-25 14:28:00', 'active'),
('ACLG-791623', 'ACNT-00000', 'Login Successfully', '2023-05-25 17:18:31', 'active'),
('ACLG-802571', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BRCRT', '2023-05-25 12:50:56', 'active'),
('ACLG-810429', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:22:34', 'active'),
('ACLG-819374', 'ACNT-00000', 'Login Successfully', '2023-05-24 19:19:54', 'active'),
('ACLG-821054', 'ACNT-00000', 'Generate Bussiness Permit for for Ryan . Santiago  (RSDT-000006), <br> Certificate Number: BSCRT-5-25-2023-RSDT-000006, <br> Bussiness: Computer Shop, <br> Purpose: Business Permit', '2023-05-25 13:10:57', 'active'),
('ACLG-824673', 'ACNT-00000', 'Deactivate resident data of Ivy Rose T. Curambao  (RSDT-0000012)', '2023-05-24 22:15:26', 'active'),
('ACLG-827103', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Certificate Number: BRCRT-', '2023-05-25 12:47:47', 'active'),
('ACLG-832907', 'ACNT-00000', 'Register Angelico A. Forbes  (RSDT-832907)', '2023-05-22 23:42:31', 'active'),
('ACLG-836012', 'ACNT-00000', 'Login Successfully', '2023-05-25 15:16:09', 'active'),
('ACLG-839741', 'ACNT-00000', 'Update resident data of Lallyn Anne 1 G. Bayles 1 1 (RSDT-362547)', '2023-05-25 18:04:00', 'active'),
('ACLG-847265', 'ACNT-00000', 'Password Changed for the account of Benjamin C. Ausria  (ACNT-00000)', '2023-05-25 18:58:10', 'active'),
('ACLG-854329', 'ACNT-00000', 'Delete account ACNT-317045', '2023-05-24 21:16:28', 'active'),
('ACLG-860175', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:31', 'active'),
('ACLG-871542', 'ACNT-00000', 'Created account for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 18:24:46', 'active'),
('ACLG-906184', 'ACNT-607592', 'Logout Successfully', '2023-05-24 21:37:29', 'active'),
('ACLG-912367', 'ACNT-00000', 'Update resident data of Angelico A. Forbes  (RSDT-832907)', '2023-05-25 08:10:37', 'active'),
('ACLG-916025', 'ACNT-00000', 'Created account for Edison P. Rivera  (RSDT-071398)', '2023-05-24 21:07:55', 'active'),
('ACLG-935648', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:11', 'active'),
('ACLG-938054', 'ACNT-00000', 'deactivate resident ID  Maria Clara A. de los Santos  ', '2023-05-22 20:16:33', 'active'),
('ACLG-945768', 'ACNT-00000', 'Delete account ACNT-00000', '2023-05-24 21:13:36', 'active'),
('ACLG-961857', 'ACNT-00000', 'restored account ACNT-607592', '2023-05-24 21:18:34', 'active'),
('ACLG-975104', 'ACNT-00000', 'Generate Indigency certificate for Resident RSDT-0000012 (Ivy Rose T. Curambao ), Purpose: for Schoo', '2023-05-22 23:36:19', 'active'),
('ACLG-976825', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:06', 'active'),
('ACLG-980461', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Certificate Number: BSCRT-RSDT-832907-5-25-2023, <br> Bussiness: Computer Shop, <br> Purpose: Business Permit', '2023-05-25 13:07:46', 'active'),
('ACLG-984173', 'ACNT-00000', 'deactivate resident ID RSDT-825963 (Eduard C. Rivera )', '2023-05-22 20:18:19', 'active');

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
  `rank` varchar(5) NOT NULL DEFAULT '0',
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ofcl_status` varchar(50) NOT NULL DEFAULT 'active',
  `photo` varchar(100) DEFAULT 'sample_photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`ofcl_id`, `resident`, `position`, `rank`, `regs_date`, `ofcl_status`, `photo`) VALUES
('OFCL-00000', 'RSDT-00000', 'Punong Barangay', '1', '2023-05-15 11:35:00', 'active', 'sample_photo.jpg'),
('OFCL-00002', 'RSDT-0000012', 'Committee on Chairman on Appropriation', '3', '2023-05-20 11:29:10', 'active', 'sample_photo.jpg'),
('OFCL-00003', 'RSDT-000002', 'Committe Chairman on Women & Family, Health & Social Welfare', '3', '2023-05-20 21:45:57', 'active', 'sample_photo.jpg'),
('OFCL-00004', 'RSDT-000003', 'Commettee Chairman on Peace and Order', '3', '2023-05-20 21:47:13', 'active', 'sample_photo.jpg'),
('OFCL-00005', 'RSDT-000004', 'Commettee Chairman on Human Rights', '3', '2023-05-20 21:49:07', 'active', 'sample_photo.jpg'),
('OFCL-00006', 'RSDT-000005', 'Commettee Chairman on Environmental', '3', '2023-05-20 21:49:54', 'active', 'sample_photo.jpg'),
('OFCL-00007', 'RSDT-000006', 'Commettee Chairman on Public Works', '3', '2023-05-20 21:50:22', 'active', 'sample_photo.jpg'),
('OFCL-00008', 'RSDT-000007', 'Commettee Chairman on Environmental', '3', '2023-05-20 21:51:24', 'active', 'sample_photo.jpg'),
('OFCL-00009', 'RSDT-000008', 'SK Chairperson', '3', '2023-05-20 21:51:54', 'active', 'sample_photo.jpg'),
('OFCL-00010', 'RSDT-000009', 'Brgy. Secretary', '2', '2023-05-20 21:52:29', 'active', 'sample_photo.jpg'),
('OFCL-00011', 'RSDT-000010', 'Brgy. Tresurer', '2', '2023-05-20 21:53:03', 'active', 'sample_photo.jpg'),
('OFCL-00012', 'RSDT-000011', 'Brgy. Chief Tanod', '2', '2023-05-20 21:53:35', 'active', 'sample_photo.jpg');

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
('RSDT-00000', 'Benjamin', 'C', 'Ausria', '', '111 111 111', '222 222 222', '01', 'Sample Street', 'Male', '2001-05-20', 'Tondo Manila', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-0000012', 'Ivy Rose', 'T', 'Curambao', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000002', 'Mishelle', 'C', 'Mejilla', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000003', 'Edilberto', 'A', 'Toribio', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '2001-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000004', 'Josilito', 'A', 'Gonzalle', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000005', 'Ferdnando', 'C', 'Simpelo', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1985-05-20', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000006', 'Ryan', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000007', 'Ernesto', '', 'Carlos', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000008', 'Alyysa Marie', 'G', 'Santia', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000009', 'Myrna', 'Z', 'Giron', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000010', 'Roberto C. Jumaquio', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000011', 'Renato', 'J', 'Buenaventura', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-071398', 'Edison', 'Pablo', 'Rivera', '', '111', '222', '05', 'Parola Compound', 'Male', '2000-05-16', 'Tondo', 'Single', 'Filipino', 'Not Registered', 'Driver', '2023-05-16 22:08:57', 'active', 'sample_photo.jpg'),
('RSDT-362547', 'Lallyn Anne', 'Garcia', 'Bayles', '', '11', '22', '22', 'Delpan St.', 'Female', '2002-05-16', 'Tondo 2', 'Single', 'Filipino', 'Registered', 'Programmer', '2023-05-25 17:19:14', 'active', 'RSDT-362547-face2.jpg'),
('RSDT-579021', 'Maria Clara', 'Alba', 'de los Santos', '', '01', '02', '01', 'Delpan', 'Female', '1999-05-11', 'Tondo', 'Married', 'Filipino', 'Registered', 'Manager', '2023-05-20 16:56:02', 'deleted', 'sample_photo.jpg'),
('RSDT-651028', 'Allyn', 'Garcia', 'Bayles', 'Jr.', '111 111 111', '222 222 222', '01', 'Parola Compound', 'Male', '2001-05-20', 'Tondo, Manila', 'Single', 'Filipino', 'Not Registered', 'N/A', '2023-05-15 18:13:06', 'deleted', 'sample_photo.jpg'),
('RSDT-657819', 'Juan', 'Pablo', 'Aquino', '', '222', '333', '02', 'Parola Compound', 'Male', '2003-05-25', 'Tondo', 'Single', 'Filipino', 'Registered', 'Manager', '2023-05-16 19:31:36', 'deleted', 'sample_photo.jpg'),
('RSDT-825963', 'Eduard', 'Canda', 'Rivera', '', '0001', '0002', '01', 'Parola Compound', 'Male', '2001-05-16', 'Sampaloc, Manila', 'Married', 'Filipino', 'Not Registered', 'Driver', '2023-05-16 19:25:18', 'deleted', 'sample_photo.jpg'),
('RSDT-832907', 'Angelico', 'Alba', 'Forbes', '', '111', '222', '222', 'Champaca', 'Male', '2000-05-25', 'Manila', 'Married', 'Filipino', 'Registered', 'Programmer', '2023-05-22 23:42:31', 'active', 'sample_photo.jpg');

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
