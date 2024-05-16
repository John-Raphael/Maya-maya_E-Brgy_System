-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:48 AM
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
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `image`, `title`, `details`, `date`) VALUES
(12, 'uploads/istockphoto-1401607744-612x612.jpg', '123123', 'sample123', '2024-05-18'),
(14, 'uploads/istockphoto-1401607744-612x612.jpg', 'asd', 'asd', '2024-05-29'),
(15, 'uploads/istockphoto-1401607744-612x612.jpg', 'asd', 'asd', '2024-05-29'),
(16, 'uploads/istockphoto-1401607744-612x612.jpg', 'asd', 'asd', '2024-05-29'),
(17, 'uploads/istockphoto-1401607744-612x612.jpg', 'sample', 'sample', '2024-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_officials`
--

CREATE TABLE `brgy_officials` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgy_officials`
--

INSERT INTO `brgy_officials` (`id`, `name`, `image_url`, `position`) VALUES
(1, 'Jhon Wick', 'updateimage/435982138_717320327044318_1995875520566411338_n.jpg', 'Kagawad'),
(2, 'Louie Recibido', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2_WBVVWRkAqkPMetboOTuQjUxKa8iZlCrwX-u-cVHuw&s', 'Kagawad'),
(3, 'Jhon Wick', 'member/435982138_717320327044318_1995875520566411338_n.jpg', 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `punongbrgy`
--

CREATE TABLE `punongbrgy` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punongbrgy`
--

INSERT INTO `punongbrgy` (`id`, `name`, `image_url`) VALUES
(3, 'Jaymark Haloc', 'uploads/6642d8b9429096.12338708.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `id` int(11) NOT NULL,
  `street_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`id`, `street_name`) VALUES
(5, 'asdasd'),
(6, 'sample1'),
(8, 'chavs street');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acnt_id`, `user_resident`, `user_type`, `username`, `password`, `online_status`, `regs_date`, `status`) VALUES
('ACNT-00000', 'RSDT-00000', 'ADMIN', 'admin', 'password', 'online', '2023-05-15 12:00:18', 'active'),
('ACNT-405187', 'RSDT-000010', 'ADMIN', 'admin', 'me1234', 'online', '2023-06-13 10:57:10', 'active'),
('ACNT-763528', 'RSDT-000007', 'ADMIN', 'sample123', 'sample123', 'online', '2024-05-13 03:55:31', 'active'),
('ACNT-879625', 'RSDT-000011', 'ADMIN', 'admin', '1234', 'online', '2024-04-15 21:44:10', 'active'),
('ACNT-936781', 'RSDT-000009', 'ADMIN', 'OFCL-00010', 'password', 'online', '2023-06-13 09:29:14', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`aclg_id`, `user_account`, `activity`, `date_time`, `activity_status`) VALUES
('ACLG-016587', 'ACNT-00000', 'Login Successfully', '2024-04-27 14:34:20', 'active'),
('ACLG-027981', 'ACNT-00000', 'Update resident data of Xian  . Lee   (RSDT-381965)', '2023-06-13 08:36:01', 'active'),
('ACLG-038651', 'ACNT-00000', 'Update Item details Tent', '2023-06-13 06:04:31', 'active'),
('ACLG-038721', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 05:58:15', 'active'),
('ACLG-049813', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 05:58:10', 'active'),
('ACLG-051972', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-06-13 09:20:11', 'active'),
('ACLG-054698', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:50:53', 'active'),
('ACLG-059418', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 08:38:59', 'active'),
('ACLG-073186', 'ACNT-00000', 'Returned Tent (New),  Returned by Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:02:07', 'active'),
('ACLG-082674', 'ACNT-00000', 'Login Successfully', '2023-06-14 11:32:04', 'active'),
('ACLG-091543', 'ACNT-00000', 'Returned Chair (Monoblock),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:19:55', 'active'),
('ACLG-092678', 'ACNT-00000', 'Added new Barangay Equipment: Tent', '2023-06-13 05:59:00', 'active'),
('ACLG-093472', 'ACNT-936781', 'Login Successfully', '2023-06-13 09:42:28', 'active'),
('ACLG-098642', 'ACNT-00000', 'Login Successfully', '2023-06-14 10:37:58', 'active'),
('ACLG-103459', 'ACNT-00000', 'Login Successfully', '2024-05-02 08:39:36', 'active'),
('ACLG-103865', 'ACNT-00000', 'Logout Successfully', '2024-05-14 07:29:28', 'active'),
('ACLG-103948', 'ACNT-763528', 'Generate Barangay certificate for Myrna Z. Giron  (RSDT-000009), Purpose: asdasd', '2024-05-13 04:02:46', 'active'),
('ACLG-107268', 'ACNT-00000', 'Update resident data of Myrna 2 Z. Giron 2 2 (RSDT-000009)', '2023-06-13 07:00:31', 'active'),
('ACLG-129045', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:24', 'active'),
('ACLG-130579', 'ACNT-00000', 'Login Successfully', '2024-05-02 04:41:59', 'active'),
('ACLG-130798', 'ACNT-00000', 'Login Successfully', '2023-06-14 11:53:54', 'active'),
('ACLG-134628', 'ACNT-936781', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2024-04-27 08:02:00', 'active'),
('ACLG-135847', 'ACNT-00000', 'Create Blotter Report BLTR-135847', '2023-06-13 05:58:01', 'active'),
('ACLG-150294', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:04:19', 'active'),
('ACLG-158274', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:40', 'active'),
('ACLG-167429', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:37:09', 'active'),
('ACLG-170345', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:53:52', 'active'),
('ACLG-175603', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:51:34', 'active'),
('ACLG-186439', 'ACNT-00000', 'Login Successfully', '2024-04-27 07:41:28', 'active'),
('ACLG-189264', 'ACNT-00000', 'Deactivate resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:51:48', 'active'),
('ACLG-194653', 'ACNT-00000', 'Logout Successfully', '2023-06-13 09:29:20', 'active'),
('ACLG-205746', 'ACNT-00000', 'Update Item details Tent', '2023-06-13 06:03:09', 'active'),
('ACLG-209786', 'ACNT-00000', 'Update resident data of Myrna 2 Z. Giron 2 2 (RSDT-000009)', '2023-06-13 06:48:49', 'active'),
('ACLG-210649', 'ACNT-00000', 'Login Successfully', '2023-06-13 04:25:46', 'active'),
('ACLG-214578', 'ACNT-00000', 'Logout Successfully', '2024-04-27 07:44:08', 'active'),
('ACLG-214675', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: sample, <br> Location: sample', '2024-04-27 14:37:41', 'active'),
('ACLG-217640', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 10:03:52', 'active'),
('ACLG-231784', 'ACNT-936781', 'Updated Incident Report INCD-532497', '2024-04-27 09:56:36', 'active'),
('ACLG-234870', 'ACNT-00000', 'Added new Barangay Equipment: Chair', '2023-06-13 09:06:15', 'active'),
('ACLG-234978', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:16', 'active'),
('ACLG-253049', 'ACNT-00000', 'Login Successfully', '2023-06-13 07:24:18', 'active'),
('ACLG-268175', 'ACNT-763528', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-05-13 04:00:29', 'active'),
('ACLG-270618', 'ACNT-00000', 'Logout Successfully', '2023-06-14 11:49:58', 'active'),
('ACLG-273165', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 05:58:21', 'active'),
('ACLG-284506', 'ACNT-936781', 'Generate Barangay Clearance for Roberto C. Jumaquio . Santiago  (RSDT-000010)', '2024-04-27 10:26:35', 'active'),
('ACLG-285471', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 07:18:21', 'active'),
('ACLG-290453', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: Karenderia, <br> Location: Cavite city', '2023-06-13 09:20:47', 'active'),
('ACLG-294508', 'ACNT-00000', 'Login Successfully', '2024-05-14 07:31:59', 'active'),
('ACLG-295670', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 07:03:15', 'active'),
('ACLG-297081', 'ACNT-936781', 'Login Successfully', '2023-06-13 11:02:53', 'active'),
('ACLG-302697', 'ACNT-00000', 'Logout Successfully', '2023-06-13 09:33:05', 'active'),
('ACLG-305169', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:06:41', 'active'),
('ACLG-307169', 'ACNT-00000', 'Login Successfully', '2023-06-13 05:37:16', 'active'),
('ACLG-307629', 'ACNT-00000', 'Login Successfully', '2023-06-13 08:29:46', 'active'),
('ACLG-307829', 'ACNT-00000', 'restored account ACNT-936781', '2023-06-13 09:32:31', 'active'),
('ACLG-308795', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:54:42', 'active'),
('ACLG-317209', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:32:28', 'active'),
('ACLG-321765', 'ACNT-763528', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-05-13 04:04:08', 'active'),
('ACLG-325894', 'ACNT-763528', 'Login Successfully', '2024-05-13 03:55:37', 'active'),
('ACLG-326457', 'ACNT-00000', 'Added new Barangay Equipment: Chair', '2023-06-13 09:14:40', 'active'),
('ACLG-341270', 'ACNT-763528', 'Logout Successfully', '2024-05-13 04:11:17', 'active'),
('ACLG-346598', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:57:03', 'active'),
('ACLG-347859', 'ACNT-00000', 'Returned Tent (New),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:42:48', 'active'),
('ACLG-354209', 'ACNT-00000', 'Logout Successfully', '2024-05-02 03:57:03', 'active'),
('ACLG-357940', 'ACNT-00000', 'Login Successfully', '2023-06-13 08:56:45', 'active'),
('ACLG-362840', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:42:33', 'active'),
('ACLG-364018', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:32:03', 'active'),
('ACLG-381965', 'ACNT-00000', 'Register Xian . Lee  (RSDT-381965)', '2023-06-13 08:33:20', 'active'),
('ACLG-386274', 'ACNT-00000', 'Borrowed Tent (New),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:44:21', 'active'),
('ACLG-402186', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 08:38:50', 'active'),
('ACLG-405187', 'ACNT-00000', 'Created account for Roberto C. Jumaquio . Santiago  (RSDT-000010)', '2023-06-13 10:57:10', 'active'),
('ACLG-407689', 'ACNT-00000', 'Logout Successfully', '2023-06-13 03:28:09', 'active'),
('ACLG-408637', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:49', 'active'),
('ACLG-420758', 'ACNT-00000', 'Delete account ACNT-936781', '2023-06-13 10:53:36', 'active'),
('ACLG-425378', 'ACNT-00000', 'Borrowed Tent (New),  Borrowed by Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:01:40', 'active'),
('ACLG-428619', 'ACNT-936781', 'Generate Barangay Clearance for Mishelle C. Mejilla  (RSDT-000002)', '2024-04-27 10:15:06', 'active'),
('ACLG-432108', 'ACNT-00000', 'Restore resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:52:30', 'active'),
('ACLG-437269', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:01', 'active'),
('ACLG-465231', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:52:46', 'active'),
('ACLG-471396', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:32:26', 'active'),
('ACLG-486291', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:54:30', 'active'),
('ACLG-489075', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:55:23', 'active'),
('ACLG-497563', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:40:38', 'active'),
('ACLG-497605', 'ACNT-00000', 'Login Successfully', '2024-04-15 18:39:56', 'active'),
('ACLG-503416', 'ACNT-00000', 'Login Successfully', '2023-06-14 10:40:07', 'active'),
('ACLG-506874', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:55:02', 'active'),
('ACLG-509741', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:37:23', 'active'),
('ACLG-510493', 'ACNT-00000', 'Login Successfully', '2024-05-08 10:38:31', 'active'),
('ACLG-517869', 'ACNT-00000', 'Generate Barangay Clearance for Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:05:20', 'active'),
('ACLG-521376', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:57:17', 'active'),
('ACLG-521604', 'ACNT-936781', 'Logout Successfully', '2023-06-13 11:04:23', 'active'),
('ACLG-521786', 'ACNT-00000', 'Logout Successfully', '2024-05-02 04:42:01', 'active'),
('ACLG-523869', 'ACNT-00000', 'Delete account ACNT-936781', '2023-06-13 10:56:30', 'active'),
('ACLG-527460', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:30', 'active'),
('ACLG-529178', 'ACNT-00000', 'Logout Successfully', '2024-05-14 07:32:04', 'active'),
('ACLG-529407', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:53:42', 'active'),
('ACLG-530268', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:08', 'active'),
('ACLG-531462', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 09:18:58', 'active'),
('ACLG-532497', 'ACNT-00000', 'Create Incident Report INCD-532497', '2023-06-13 05:54:02', 'active'),
('ACLG-536014', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:44:41', 'active'),
('ACLG-570381', 'ACNT-936781', 'Generate Barangay Clearance for Xian  . Lee   (RSDT-381965)', '2024-04-27 10:06:52', 'active'),
('ACLG-571302', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:54:04', 'active'),
('ACLG-571463', 'ACNT-00000', 'Login Successfully', '2023-06-13 05:59:53', 'active'),
('ACLG-592360', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:19:25', 'active'),
('ACLG-603142', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:18:57', 'active'),
('ACLG-607439', 'ACNT-00000', 'Register Xian . Tiu  (RSDT-607439)', '2023-06-13 05:49:07', 'active'),
('ACLG-617053', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 14:34:52', 'active'),
('ACLG-620748', 'ACNT-936781', 'Login Successfully', '2023-06-13 09:39:25', 'active'),
('ACLG-621507', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:23:36', 'active'),
('ACLG-624093', 'ACNT-936781', 'Logout Successfully', '2023-06-13 09:40:36', 'active'),
('ACLG-628547', 'ACNT-936781', 'Updated Incident Report INCD-532497', '2024-04-27 09:56:28', 'active'),
('ACLG-635019', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:14:58', 'active'),
('ACLG-642590', 'ACNT-00000', 'Returned Chair (Monoblock),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:06:53', 'active'),
('ACLG-647825', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 10:06:46', 'active'),
('ACLG-648129', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 08:00:47', 'active'),
('ACLG-650349', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:55:43', 'active'),
('ACLG-650431', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:54:25', 'active'),
('ACLG-651473', 'ACNT-936781', 'Generate Barangay Clearance for Xian  . Lee   (RSDT-381965)', '2024-04-27 10:13:57', 'active'),
('ACLG-658402', 'ACNT-00000', 'Update Item details Tent', '2023-06-13 06:27:58', 'active'),
('ACLG-678239', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:56:08', 'active'),
('ACLG-678425', 'ACNT-00000', 'Generate Barangay certificate for Myrna Z. Giron  (RSDT-000009), Purpose: fhhfgfd', '2023-06-13 03:25:54', 'active'),
('ACLG-683159', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 14:40:33', 'active'),
('ACLG-690274', 'ACNT-00000', 'Logout Successfully', '2024-05-14 07:32:12', 'active'),
('ACLG-695872', 'ACNT-00000', 'Login Successfully', '2023-06-13 06:47:47', 'active'),
('ACLG-718304', 'ACNT-00000', 'Login Successfully', '2024-04-27 11:15:12', 'active'),
('ACLG-718906', 'ACNT-763528', 'Generate Indigency certificate for Myrna Z. Giron  (RSDT-000009), Purpose: aasda', '2024-05-13 04:00:58', 'active'),
('ACLG-720634', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:18:03', 'active'),
('ACLG-721038', 'ACNT-936781', 'Generate Barangay Clearance for Alyysa Marie G. Santia  (RSDT-000008)', '2024-04-27 10:26:38', 'active'),
('ACLG-729143', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:55:35', 'active'),
('ACLG-729401', 'ACNT-00000', 'Logout Successfully', '2023-06-13 03:47:19', 'active'),
('ACLG-732159', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 07:18:15', 'active'),
('ACLG-739840', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:43:05', 'active'),
('ACLG-740862', 'ACNT-936781', 'Login Successfully', '2023-06-13 10:28:18', 'active'),
('ACLG-740985', 'ACNT-00000', 'restored account ACNT-936781', '2023-06-13 10:55:19', 'active'),
('ACLG-742608', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: sample, <br> Location: sample', '2024-04-27 14:38:11', 'active'),
('ACLG-750418', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 10:02:09', 'active'),
('ACLG-752183', 'ACNT-936781', 'Login Successfully', '2024-04-27 07:49:06', 'active'),
('ACLG-753801', 'ACNT-936781', 'Login Successfully', '2023-06-13 09:43:08', 'active'),
('ACLG-756842', 'ACNT-00000', 'Login Successfully', '2024-05-14 07:29:24', 'active'),
('ACLG-761385', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:18:09', 'active'),
('ACLG-769804', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Mishelle C. Mejilla  (RSDT-000002)', '2023-06-13 07:21:33', 'active'),
('ACLG-780659', 'ACNT-00000', 'Login Successfully', '2024-05-02 03:56:48', 'active'),
('ACLG-781350', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:52:19', 'active'),
('ACLG-782034', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 11:15:17', 'active'),
('ACLG-784251', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:35', 'active'),
('ACLG-786531', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-15 18:56:51', 'active'),
('ACLG-793856', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-06-13 06:05:14', 'active'),
('ACLG-795261', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:17:07', 'active'),
('ACLG-802534', 'ACNT-00000', 'Borrowed Tent (New),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:41:43', 'active'),
('ACLG-816349', 'ACNT-00000', 'Login Successfully', '2024-05-14 07:32:11', 'active'),
('ACLG-821364', 'ACNT-00000', 'Logout Successfully', '2024-05-02 08:41:28', 'active'),
('ACLG-829176', 'ACNT-00000', 'Added new Barangay Equipment: Tent', '2023-06-13 08:40:59', 'active'),
('ACLG-849265', 'ACNT-00000', 'Logout Successfully', '2024-05-02 04:34:25', 'active'),
('ACLG-867923', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:17:56', 'active'),
('ACLG-875390', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 14:34:37', 'active'),
('ACLG-879625', 'ACNT-00000', 'Created account for Renato J. Buenaventura  (RSDT-000011)', '2024-04-15 21:44:10', 'active'),
('ACLG-894372', 'ACNT-00000', 'Returned Tent (New),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:44:39', 'active'),
('ACLG-907846', 'ACNT-00000', 'Returned Chair (Monoblock),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:15:07', 'active'),
('ACLG-912538', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:05:47', 'active'),
('ACLG-913875', 'ACNT-00000', 'Update resident data of Alyysa Marie G. Santia  (RSDT-000008)', '2023-06-13 09:22:18', 'active'),
('ACLG-931402', 'ACNT-00000', 'Update resident data of Alyysa Marie G. Santia  (RSDT-000008)', '2023-06-13 05:41:27', 'active'),
('ACLG-931684', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-06-13 09:27:27', 'active'),
('ACLG-932156', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:53:23', 'active'),
('ACLG-936480', 'ACNT-00000', 'Returned Tables (Round Table),  Returned by Myrna Z. Giron  (RSDT-000009)', '2023-06-13 07:25:27', 'active'),
('ACLG-936781', 'ACNT-00000', 'Created account for Myrna Z. Giron  (RSDT-000009)', '2023-06-13 09:29:14', 'active'),
('ACLG-938420', 'ACNT-00000', 'Generate Barangay certificate for Xian N. Tiu N/a (RSDT-607439), Purpose: Scholar', '2023-06-13 06:05:57', 'active'),
('ACLG-942835', 'ACNT-00000', 'Login Successfully', '2023-06-13 08:57:12', 'active'),
('ACLG-943275', 'ACNT-00000', 'Update resident data of Alyysa Marie G. Santia  (RSDT-000008)', '2023-06-13 05:43:57', 'active'),
('ACLG-945370', 'ACNT-763528', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-05-13 04:03:09', 'active'),
('ACLG-948057', 'ACNT-00000', 'Delete account ACNT-936781', '2023-06-13 09:32:20', 'active'),
('ACLG-956280', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 10:29:01', 'active'),
('ACLG-957126', 'ACNT-936781', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2024-04-27 10:04:19', 'active'),
('ACLG-960412', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:38:02', 'active'),
('ACLG-963407', 'ACNT-00000', 'Update resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:51:26', 'active'),
('ACLG-975408', 'ACNT-00000', 'Deactivate resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:15:22', 'active'),
('ACLG-980365', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:56:03', 'active'),
('ACLG-980765', 'ACNT-00000', 'Login Successfully', '2024-05-02 04:34:03', 'active'),
('ACLG-982016', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:37:15', 'active'),
('ACLG-984257', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:04:13', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `bltr_id` varchar(50) NOT NULL,
  `bltr_date` datetime NOT NULL DEFAULT current_timestamp(),
  `comp_name` varchar(50) NOT NULL,
  `comp_name_address` varchar(100) NOT NULL,
  `comp_person` varchar(50) NOT NULL,
  `comp_person_address` varchar(100) NOT NULL,
  `regs_by` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_settled` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`bltr_id`, `bltr_date`, `comp_name`, `comp_name_address`, `comp_person`, `comp_person_address`, `regs_by`, `description`, `date_settled`, `status`) VALUES
('BLTR-00000', '2023-06-11 00:36:22', 'Juan Dela Cruz', 'Sample Address 1', 'Pedro Dela Cruz', 'Sample Address 2', 'RSDT-000003', 'Sample case', '2023-06-11 12:57:00', 'settled'),
('BLTR-135847', '2023-06-13 13:57:00', 'Tiu lee', '123 sample', 'Lee Tiu', '123 sample', 'RSDT-00000', 'May utang', NULL, 'new'),
('BLTR-214053', '2024-05-09 07:17:00', 'fefefefe', 'fefefef', 'fefefefe', 'efefefef', 'RSDT-607439', 'fefefefefe', NULL, 'ongoing'),
('BLTR-418267', '2024-05-24 06:40:00', 'cdds', 'adfbvadf', 'vsdvs', 'rthrt', 'RSDT-607439', 'rthrethet', NULL, 'ongoing'),
('BLTR-560973', '2024-05-06 06:43:00', 'dvSADVAS', 'dfsgserfb', 'cascas', 'cascascac', 'RSDT-607439', 'casascasca', NULL, 'ongoing'),
('BLTR-816529', '2024-05-12 06:19:00', 'john', 'bangate', 'test', 'test', 'RSDT-607439', 'rape', NULL, 'ongoing'),
('BLTR-906785', '2023-06-11 14:47:00', 'Juan', 'Sample address', 'Jose', 'Tondo Manila', 'RSDT-00000', 'samlpe sample', NULL, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_houses`
--

CREATE TABLE `tbl_houses` (
  `id` int(10) NOT NULL,
  `coordinates_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `coordinates` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_houses`
--

INSERT INTO `tbl_houses` (`id`, `coordinates_id`, `address`, `coordinates`, `created_at`) VALUES
(1, '353753202', 'De Leon Street, Salay-salay, Cavite City, Cavite, Calabarzon, 4100, Philippines', '14.47926649841063,120.89114260646069', '2024-04-15 10:53:41'),
(2, '694985597', 'Julian Felipe Boulevard, Salay-salay, Cavite City, Cavite, Calabarzon, 4100, Philippines', '14.479510157739504,120.8912256670852', '2024-04-15 10:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incident`
--

CREATE TABLE `tbl_incident` (
  `incd_id` varchar(50) NOT NULL,
  `incd_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `victim_name` varchar(50) NOT NULL,
  `victim_address` varchar(100) NOT NULL,
  `incd_location` varchar(100) NOT NULL,
  `regs_by` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_settled` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ongoing',
  `reportedByName` varchar(255) NOT NULL,
  `incident_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_incident`
--

INSERT INTO `tbl_incident` (`incd_id`, `incd_date_time`, `victim_name`, `victim_address`, `incd_location`, `regs_by`, `description`, `date_settled`, `status`, `reportedByName`, `incident_type`) VALUES
('INCD-00000', '2023-06-11 22:02:55', 'Maria Clara', 'Sample Address', 'Sample location', 'RSDT-00000', 'sample incident', NULL, 'ongoing', '', ''),
('INCD-016472', '2024-05-14 07:16:00', '', 'cascasca', 'cascascasc', 'RSDT-607439', 'cascascasc', NULL, 'ongoing', 'cascascsac', 'cascasca'),
('INCD-026347', '2024-05-15 05:21:00', 'Tiu lee', '123 Sample123123', 'sample1', 'RSDT-607439', 'asdasdasd', NULL, 'ongoing', 'MishelleC.Mejilla', 'sample1'),
('INCD-049628', '2024-05-08 07:53:00', '', '123 Sample123123', 'sampaloc', 'RSDT-607439', 'rape', NULL, 'ongoing', '', 'huenda'),
('INCD-230981', '2024-05-02 08:04:00', '', 'qwer', 'qwert', 'RSDT-607439', 'qwerty', NULL, 'ongoing', 'qwert', 'qwe'),
('INCD-403928', '2024-05-09 06:39:00', '', '123 Sample123123', 'sor', 'RSDT-607439', 'dsfsdfs', NULL, 'ongoing', 'Roberto C. Jumaquio.Santiago', 'cfsdfsds'),
('INCD-532497', '2023-06-13 13:52:00', 'Tiu lee', '123 Sample123123', 'Sample123123', 'RSDT-00000', 'Sunog', '2024-05-02 00:00:00', 'settled', '', ''),
('INCD-538967', '2024-05-14 07:16:00', '', 'cascasca', 'cascascasc', 'RSDT-607439', 'cascascasc', NULL, 'ongoing', 'cascascsac', 'cascasca'),
('INCD-542971', '2023-06-11 22:34:00', 'Jose', 'Tondo Manila', 'Sample Addess', 'RSDT-00000', 'testing', '2023-06-13 00:00:00', 'settled', '', ''),
('INCD-814209', '2024-05-07 20:14:00', '', '123 Sample123123', 'testing', 'RSDT-607439', 'testibfsss', NULL, 'ongoing', 'JhonWick.Wick', 'testing'),
('INCD-891673', '2024-05-15 06:36:00', '', '123 Sample123123', 'test', 'RSDT-607439', 'tezt', NULL, 'ongoing', 'MyrnaZito.Giron', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `updated_qty` varchar(50) NOT NULL,
  `original_qty` varchar(50) NOT NULL,
  `regs_by` varchar(20) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `name`, `description`, `updated_qty`, `original_qty`, `regs_by`, `regs_date`, `status`) VALUES
('ITEM-326457', 'Chair', 'Monoblock', '98', '100', 'RSDT-00000', '2023-06-13 09:14:40', 'active'),
('ITEM-417682', 'asda', 'asdasd', '20', '25', 'RSDT-607439', '2024-05-15 04:41:59', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_history`
--

CREATE TABLE `tbl_item_history` (
  `iths_id` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `borrowed_date` datetime NOT NULL DEFAULT current_timestamp(),
  `borrowed_by` varchar(20) NOT NULL,
  `borrowed_from` varchar(20) NOT NULL,
  `returned_date` datetime DEFAULT NULL,
  `returned_by` varchar(20) DEFAULT NULL,
  `returned_to` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item_history`
--

INSERT INTO `tbl_item_history` (`iths_id`, `item`, `qty`, `purpose`, `borrowed_date`, `borrowed_by`, `borrowed_from`, `returned_date`, `returned_by`, `returned_to`, `status`) VALUES
('ITHS-592360', 'ITEM-326457', '52', 'Birthday', '2023-06-13 17:19:00', 'RSDT-381965', 'RSDT-00000', '2023-06-13 17:19:00', 'RSDT-381965', 'RSDT-00000', 'returned'),
('ITHS-635019', 'ITEM-326457', '60', 'Feeding Program', '2023-06-13 17:14:00', 'RSDT-381965', 'RSDT-00000', '2023-06-13 17:15:00', 'RSDT-381965', 'RSDT-00000', 'returned'),
('ITHS-695837', 'ITEM-417682', '5', 'Wedding', '2024-05-16 04:42:00', 'RSDT-381965', 'RSDT-607439', NULL, NULL, NULL, 'pending');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`ofcl_id`, `resident`, `position`, `rank`, `regs_date`, `ofcl_status`, `photo`) VALUES
('OFCL-00000', 'RSDT-00000', 'Punong Barangay', '1', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00002', 'RSDT-0000012', 'Committee on Chairman on Appropriation', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00003', 'RSDT-000002', 'Committe Chairman on Women & Family, Health & Social Welfare', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00004', 'RSDT-000003', 'Commettee Chairman on Peace and Order', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00005', 'RSDT-000004', 'Commettee Chairman on Human Rights', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00006', 'RSDT-000005', 'Commettee Chairman on Environmental', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00007', 'RSDT-000006', 'Commettee Chairman on Public Works', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00008', 'RSDT-000007', 'Commettee Chairman on Environmental', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00009', 'RSDT-000008', 'SK Chairperson', '3', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00010', 'RSDT-000009', 'Brgy. Secretary', '2', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00011', 'RSDT-000010', 'Brgy. Tresurer', '2', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg'),
('OFCL-00012', 'RSDT-000011', 'Brgy. Chief Tanod', '2', '2024-04-15 23:04:24', 'active', 'sample_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `rsdt_id` varchar(20) NOT NULL,
  `house_id` int(10) DEFAULT NULL,
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
  `photo` varchar(100) DEFAULT NULL,
  `Senior_PWD_NO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`rsdt_id`, `house_id`, `f_name`, `m_name`, `l_name`, `ext_name`, `pr_contact`, `sr_contact`, `hs_num`, `strt_name`, `gender`, `birthdate`, `birthplace`, `cvl_status`, `citizenship`, `voter_status`, `occupation`, `regs_date`, `rsdt_status`, `photo`, `Senior_PWD_NO`) VALUES
('RSDT-00000', NULL, 'Benjamin', 'C', 'Austria', '', '111 111 111', '222 222 222', '01', 'Sample Street', 'Male', '2001-05-20', 'Tondo Manila', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg', ''),
('RSDT-0000012', NULL, 'Ivy Rose', 'T', 'Curambao', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg', ''),
('RSDT-000002', NULL, 'Mishelle', 'C', 'Mejilla', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000003', NULL, 'Edilberto', 'A', 'Toribio', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '2001-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000004', NULL, 'Josilito', 'A', 'Gonzalle', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg', ''),
('RSDT-000005', NULL, 'Ferdnando', 'C', 'Simpelo', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1985-05-20', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000006', NULL, 'Ryan', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000007', NULL, 'Ernesto', '', 'Carlos', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg', ''),
('RSDT-000008', NULL, 'Alyysa Marie', 'G', 'Santia', '', '111-111-111', '222-222-222', '2', 'Sample Street', 'Female', '2023-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000009', NULL, 'Myrna', 'Zito', 'Giron', '', '111-111-111 2', '222-222-222', '01', 'Sample Street', 'Female', '1998-06-06', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000010', NULL, 'Roberto C. Jumaquio', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg', ''),
('RSDT-000011', NULL, 'Renato', 'J', 'Buenaventura', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg', ''),
('RSDT-156728', NULL, '', '', '', '', '', '', '12312321', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:47:24', 'deleted', 'RSDT-156728-', ''),
('RSDT-209456', NULL, '', '', '', '', '', '', 'asdasdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:54:59', 'deleted', 'RSDT-209456-', ''),
('RSDT-249387', NULL, '', '', '', '', '', '', 'asdasdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:46:16', 'deleted', 'RSDT-249387-', ''),
('RSDT-368579', NULL, 'Jhon', 'Wick', 'Wick', '', '123123123', '', 'sdsd', 'sample1', 'Male', '0000-00-00', 'Manila', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2024-05-15 03:36:23', 'active', 'RSDT-368579-435982138_717320327044318_1995875520566411338_n.jpg', 'Senior'),
('RSDT-381965', NULL, 'Xian', ' ', 'Lee', ' ', '09123456890', '01234567890', '123', 'Sample', 'Male', '1997-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Nurse', '2023-06-13 08:33:20', 'active', 'RSDT-381965-IMG_20230613_134704.jpg', ''),
('RSDT-579061', NULL, '', '', '', '', '', '', 'asdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:48:07', 'deleted', 'RSDT-579061-', ''),
('RSDT-607439', NULL, '', '', 'Superadmin', '', '09123456890', '01234567890', '01234567890', 'Di makita', 'Male', '1997-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Nurse', '2023-06-13 05:49:07', 'deleted', 'RSDT-607439-IMG_20230613_134704.jpg', ''),
('RSDT-619207', NULL, '', '', '', '', '', '', 'samplestreet1', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:43:47', 'deleted', 'RSDT-619207-', ''),
('RSDT-648570', NULL, '', '', '', '', '', '', 'asadasdsad', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:57:30', 'deleted', 'RSDT-648570-', ''),
('RSDT-649853', NULL, '', '', '', '', '', '', 'asdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:53:58', 'deleted', 'RSDT-649853-', ''),
('RSDT-679083', NULL, '', '', '', '', '', '', 'asdasdasdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:47:19', 'deleted', 'RSDT-679083-', ''),
('RSDT-752418', NULL, '', '', '', '', '', '', '123123', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:52:04', 'deleted', 'RSDT-752418-', ''),
('RSDT-852017', NULL, '', '', '', '', '', '', 'asdasdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:47:22', 'deleted', 'RSDT-852017-', ''),
('RSDT-907634', NULL, '', '', '', '', '', '', 'street1', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:46:56', 'deleted', 'RSDT-907634-', ''),
('RSDT-967240', NULL, '', '', '', '', '', '', 'asdasdasdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:51:04', 'deleted', 'RSDT-967240-', ''),
('RSDT-982356', NULL, '', '', '', '', '', '', 'asdasd', '', '', '0000-00-00', '', '', '', '', '', '2024-05-13 04:46:07', 'deleted', 'RSDT-982356-', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_accounts`
-- (See below for the actual view)
--
CREATE TABLE `vw_accounts` (
`Resident ID` varchar(20)
,`Account ID` varchar(20)
,`Official ID` varchar(20)
,`Name` varchar(66)
,`User Type` varchar(50)
,`Registration Date` varchar(73)
,`Username` varchar(50)
,`Password` varchar(50)
,`Online Status` varchar(20)
,`Photo` varchar(100)
,`Status` varchar(20)
,`Gender` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_activity_log`
-- (See below for the actual view)
--
CREATE TABLE `vw_activity_log` (
`Log ID` varchar(20)
,`Date` varchar(73)
,`Time` varchar(8)
,`Account ID` varchar(20)
,`User Name` varchar(66)
,`User Type` varchar(50)
,`Activity` varchar(500)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_blotters`
-- (See below for the actual view)
--
CREATE TABLE `vw_blotters` (
`Blotter ID` varchar(50)
,`Blotter Date` varchar(73)
,`Blotter Time` varchar(8)
,`Comp Name` varchar(50)
,`Comp Name Address` varchar(100)
,`Comp Person` varchar(50)
,`Comp Person Address` varchar(100)
,`Description` varchar(500)
,`Official ID` varchar(20)
,`Registered By` varchar(66)
,`Date Settled` varchar(73)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_incident`
-- (See below for the actual view)
--
CREATE TABLE `vw_incident` (
`Incident ID` varchar(50)
,`Incident Date` varchar(73)
,`Incident Time` varchar(8)
,`Victim Name` varchar(50)
,`Victim Address` varchar(100)
,`Incident Address` varchar(100)
,`Description` varchar(500)
,`Official ID` varchar(20)
,`Registered By` varchar(66)
,`Date Settled` varchar(73)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_item`
-- (See below for the actual view)
--
CREATE TABLE `vw_item` (
`Item ID` varchar(20)
,`Name` varchar(20)
,`Description` varchar(50)
,`Current Qty` varchar(50)
,`Original Qty` varchar(50)
,`Registered by` varchar(66)
,`Registration Date` varchar(73)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_item_history`
-- (See below for the actual view)
--
CREATE TABLE `vw_item_history` (
`History ID` varchar(20)
,`Borrowed Date` varchar(73)
,`Borrowed Time` varchar(8)
,`Item ID` varchar(20)
,`Name` varchar(20)
,`Description` varchar(50)
,`Item Qty` varchar(50)
,`Borrowed Qty` varchar(10)
,`Purpose` varchar(100)
,`Borrowed by` varchar(66)
,`Borrowed from` varchar(66)
,`Returned by` varchar(66)
,`Returned Date` varchar(73)
,`Returned Time` varchar(8)
,`Returned to` varchar(66)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_official`
-- (See below for the actual view)
--
CREATE TABLE `vw_official` (
`Official ID` varchar(20)
,`Resident ID` varchar(20)
,`Rank` varchar(5)
,`Name` varchar(66)
,`Position` varchar(100)
,`Registration Date` varchar(73)
,`Year` varchar(4)
,`Status` varchar(50)
,`Photo` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_resident`
-- (See below for the actual view)
--
CREATE TABLE `vw_resident` (
`Resident ID` varchar(20)
,`Name` varchar(66)
,`Name_2` varchar(65)
,`Gender` varchar(6)
,`Birthdate` varchar(73)
,`Age` double(17,0)
,`Birthplace` varchar(50)
,`Primary Contact Number` varchar(15)
,`Secondary Contact Number` varchar(15)
,`Civil Status` varchar(50)
,`Citizenship` varchar(100)
,`Voter Status` varchar(20)
,`Occupation` varchar(100)
,`Address` varchar(121)
,`Registration Date` varchar(73)
,`Resident Status` varchar(50)
,`Photo` varchar(100)
,`f_name` varchar(20)
,`m_name` varchar(20)
,`l_name` varchar(20)
,`ext_name` varchar(20)
,`hs_num` varchar(20)
,`strt_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_accounts`
--
DROP TABLE IF EXISTS `vw_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_accounts`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, `acnt`.`acnt_id` AS `Account ID`, `ofcl`.`ofcl_id` AS `Official ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `acnt`.`user_type` AS `User Type`, date_format(`acnt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `acnt`.`username` AS `Username`, `acnt`.`password` AS `Password`, `acnt`.`online_status` AS `Online Status`, `rsdt`.`photo` AS `Photo`, `acnt`.`status` AS `Status`, `rsdt`.`gender` AS `Gender` FROM ((`tbl_account` `acnt` join `tbl_resident` `rsdt` on(`acnt`.`user_resident` = `rsdt`.`rsdt_id`)) join `tbl_official` `ofcl` on(`acnt`.`user_resident` = `ofcl`.`resident`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_activity_log`
--
DROP TABLE IF EXISTS `vw_activity_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_activity_log`  AS SELECT `aclg`.`aclg_id` AS `Log ID`, date_format(`aclg`.`date_time`,'%M %d, %Y') AS `Date`, date_format(`aclg`.`date_time`,'%h:%i %p') AS `Time`, `acnt`.`Account ID` AS `Account ID`, `acnt`.`Name` AS `User Name`, `acnt`.`User Type` AS `User Type`, `aclg`.`activity` AS `Activity`, `aclg`.`activity_status` AS `Status` FROM (`tbl_activity_log` `aclg` join `vw_accounts` `acnt` on(`aclg`.`user_account` = `acnt`.`Account ID`)) ORDER BY `aclg`.`date_time` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_blotters`
--
DROP TABLE IF EXISTS `vw_blotters`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_blotters`  AS SELECT `bltr`.`bltr_id` AS `Blotter ID`, date_format(`bltr`.`bltr_date`,'%M %d, %Y') AS `Blotter Date`, date_format(`bltr`.`bltr_date`,'%h:%i %p') AS `Blotter Time`, `bltr`.`comp_name` AS `Comp Name`, `bltr`.`comp_name_address` AS `Comp Name Address`, `bltr`.`comp_person` AS `Comp Person`, `bltr`.`comp_person_address` AS `Comp Person Address`, `bltr`.`description` AS `Description`, `bltr`.`regs_by` AS `Official ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered By`, date_format(`bltr`.`date_settled`,'%M %d, %Y') AS `Date Settled`, `bltr`.`status` AS `Status` FROM (`tbl_blotter` `bltr` join `tbl_resident` `rsdt` on(`bltr`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `bltr`.`bltr_date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_incident`
--
DROP TABLE IF EXISTS `vw_incident`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_incident`  AS SELECT `incd`.`incd_id` AS `Incident ID`, date_format(`incd`.`incd_date_time`,'%M %d, %Y') AS `Incident Date`, date_format(`incd`.`incd_date_time`,'%h:%i %p') AS `Incident Time`, `incd`.`victim_name` AS `Victim Name`, `incd`.`victim_address` AS `Victim Address`, `incd`.`incd_location` AS `Incident Address`, `incd`.`description` AS `Description`, `incd`.`regs_by` AS `Official ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered By`, date_format(`incd`.`date_settled`,'%M %d, %Y') AS `Date Settled`, `incd`.`status` AS `Status` FROM (`tbl_incident` `incd` join `tbl_resident` `rsdt` on(`incd`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `incd`.`incd_date_time` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item`
--
DROP TABLE IF EXISTS `vw_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_item`  AS SELECT `item`.`item_id` AS `Item ID`, `item`.`name` AS `Name`, `item`.`description` AS `Description`, `item`.`updated_qty` AS `Current Qty`, `item`.`original_qty` AS `Original Qty`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered by`, date_format(`item`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `item`.`status` AS `Status` FROM (`tbl_item` `item` join `tbl_resident` `rsdt` on(`item`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `item`.`name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item_history`
--
DROP TABLE IF EXISTS `vw_item_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_item_history`  AS SELECT `iths`.`iths_id` AS `History ID`, date_format(`iths`.`borrowed_date`,'%M %d, %Y') AS `Borrowed Date`, date_format(`iths`.`borrowed_date`,'%h:%i %p') AS `Borrowed Time`, `iths`.`item` AS `Item ID`, `item`.`name` AS `Name`, `item`.`description` AS `Description`, `item`.`updated_qty` AS `Item Qty`, `iths`.`qty` AS `Borrowed Qty`, `iths`.`purpose` AS `Purpose`, concat(`brwd`.`f_name`,' ',left(`brwd`.`m_name`,1),'. ',`brwd`.`l_name`,' ',`brwd`.`ext_name`,' ') AS `Borrowed by`, concat(`brf`.`f_name`,' ',left(`brf`.`m_name`,1),'. ',`brf`.`l_name`,' ',`brf`.`ext_name`,' ') AS `Borrowed from`, concat(`rtnd`.`f_name`,' ',left(`rtnd`.`m_name`,1),'. ',`rtnd`.`l_name`,' ',`rtnd`.`ext_name`,' ') AS `Returned by`, date_format(`iths`.`returned_date`,'%M %d, %Y') AS `Returned Date`, date_format(`iths`.`returned_date`,'%h:%i %p') AS `Returned Time`, concat(`rtt`.`f_name`,' ',left(`rtt`.`m_name`,1),'. ',`rtt`.`l_name`,' ',`rtt`.`ext_name`,' ') AS `Returned to`, `iths`.`status` AS `Status` FROM (((((`tbl_item_history` `iths` join `tbl_item` `item` on(`iths`.`item` = `item`.`item_id`)) join `tbl_resident` `brwd` on(`iths`.`borrowed_by` = `brwd`.`rsdt_id`)) join `tbl_resident` `brf` on(`iths`.`borrowed_from` = `brf`.`rsdt_id`)) left join `tbl_resident` `rtnd` on(`iths`.`returned_by` = `rtnd`.`rsdt_id`)) left join `tbl_resident` `rtt` on(`iths`.`returned_to` = `rtt`.`rsdt_id`)) ORDER BY `iths`.`borrowed_date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_official`
--
DROP TABLE IF EXISTS `vw_official`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_official`  AS SELECT `ofcl`.`ofcl_id` AS `Official ID`, `rsdt`.`rsdt_id` AS `Resident ID`, `ofcl`.`rank` AS `Rank`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `ofcl`.`position` AS `Position`, date_format(`ofcl`.`regs_date`,'%M %d, %Y') AS `Registration Date`, date_format(`ofcl`.`regs_date`,'%Y') AS `Year`, `ofcl`.`ofcl_status` AS `Status`, `ofcl`.`photo` AS `Photo` FROM (`tbl_official` `ofcl` join `tbl_resident` `rsdt` on(`ofcl`.`resident` = `rsdt`.`rsdt_id`)) ORDER BY `ofcl`.`rank` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_resident`
--
DROP TABLE IF EXISTS `vw_resident`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER() SQL SECURITY DEFINER VIEW `vw_resident`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, concat(`rsdt`.`l_name`,', ',`rsdt`.`f_name`,' ',`rsdt`.`ext_name`,' ',left(`rsdt`.`m_name`,1),'.') AS `Name`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`) AS `Name_2`, `rsdt`.`gender` AS `Gender`, date_format(`rsdt`.`birthdate`,'%M %d, %Y') AS `Birthdate`, date_format(from_days(to_days(current_timestamp()) - to_days(`rsdt`.`birthdate`)),'%Y') + 0 AS `Age`, `rsdt`.`birthplace` AS `Birthplace`, `rsdt`.`pr_contact` AS `Primary Contact Number`, `rsdt`.`sr_contact` AS `Secondary Contact Number`, `rsdt`.`cvl_status` AS `Civil Status`, `rsdt`.`citizenship` AS `Citizenship`, `rsdt`.`voter_status` AS `Voter Status`, `rsdt`.`occupation` AS `Occupation`, concat(`rsdt`.`hs_num`,' ',`rsdt`.`strt_name`) AS `Address`, date_format(`rsdt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `rsdt`.`rsdt_status` AS `Resident Status`, `rsdt`.`photo` AS `Photo`, `rsdt`.`f_name` AS `f_name`, `rsdt`.`m_name` AS `m_name`, `rsdt`.`l_name` AS `l_name`, `rsdt`.`ext_name` AS `ext_name`, `rsdt`.`hs_num` AS `hs_num`, `rsdt`.`strt_name` AS `strt_name` FROM `tbl_resident` AS `rsdt` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brgy_officials`
--
ALTER TABLE `brgy_officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punongbrgy`
--
ALTER TABLE `punongbrgy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`bltr_id`),
  ADD KEY `rsdt_bltrFK` (`regs_by`);

--
-- Indexes for table `tbl_houses`
--
ALTER TABLE `tbl_houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_incident`
--
ALTER TABLE `tbl_incident`
  ADD PRIMARY KEY (`incd_id`),
  ADD KEY `rsdt_incdFK` (`regs_by`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `rsdt_itemFK` (`regs_by`);

--
-- Indexes for table `tbl_item_history`
--
ALTER TABLE `tbl_item_history`
  ADD PRIMARY KEY (`iths_id`),
  ADD KEY `iths_itemFK` (`item`),
  ADD KEY `rsdt_brwdFK` (`borrowed_by`),
  ADD KEY `rsdt_rtndFK` (`returned_by`),
  ADD KEY `rsdt_brfdFK` (`borrowed_from`),
  ADD KEY `rsdt_rttdFK` (`returned_to`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `brgy_officials`
--
ALTER TABLE `brgy_officials`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `punongbrgy`
--
ALTER TABLE `punongbrgy`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_houses`
--
ALTER TABLE `tbl_houses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD CONSTRAINT `rsdt_bltrFK` FOREIGN KEY (`regs_by`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_incident`
--
ALTER TABLE `tbl_incident`
  ADD CONSTRAINT `rsdt_incdFK` FOREIGN KEY (`regs_by`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `rsdt_itemFK` FOREIGN KEY (`regs_by`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_item_history`
--
ALTER TABLE `tbl_item_history`
  ADD CONSTRAINT `iths_itemFK` FOREIGN KEY (`item`) REFERENCES `tbl_item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rsdt_brfdFK` FOREIGN KEY (`borrowed_from`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rsdt_brwdFK` FOREIGN KEY (`borrowed_by`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rsdt_rtndFK` FOREIGN KEY (`returned_by`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rsdt_rttdFK` FOREIGN KEY (`returned_to`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD CONSTRAINT `rsdt_ofclFK` FOREIGN KEY (`resident`) REFERENCES `tbl_resident` (`rsdt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
