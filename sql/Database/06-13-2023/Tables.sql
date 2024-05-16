-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 12:28 PM
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
('ACLG-079345', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 15:58:06', 'active'),
('ACLG-084123', 'ACNT-00000', 'Password Changed for the account of Benjamin C. Ausria  (ACNT-00000)', '2023-05-25 18:58:59', 'active'),
('ACLG-093284', 'ACNT-00000', 'Added new Barangay Equipment: Chairs', '2023-06-12 17:08:53', 'active'),
('ACLG-106723', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Lallyn Anne G. Bayles  (RSDT-362547)', '2023-06-10 20:36:02', 'active'),
('ACLG-124938', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 17:23:06', 'active'),
('ACLG-125736', 'ACNT-00000', 'Login Successfully', '2023-05-25 07:37:12', 'active'),
('ACLG-129530', 'ACNT-00000', 'Login Successfully', '2023-05-26 10:19:43', 'active'),
('ACLG-132709', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:26', 'active'),
('ACLG-135209', 'ACNT-00000', 'Delete account ACNT-607592', '2023-05-24 21:16:43', 'active'),
('ACLG-140976', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BSCRT-RSDT-000002-5-25-2023, <br> Bussiness: Computer Shop, <br> Purpose: Business Permit', '2023-05-25 12:55:15', 'active'),
('ACLG-142758', 'ACNT-00000', 'restored account ACNT-317045', '2023-05-24 21:20:11', 'active'),
('ACLG-150469', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-26 10:20:57', 'active'),
('ACLG-159760', 'ACNT-00000', 'Generate Barangay Clearance for Mishelle C. Mejilla  (RSDT-000002)', '2023-05-25 16:31:35', 'active'),
('ACLG-170528', 'ACNT-00000', 'Added new Barangay Equipment: Chair', '2023-06-12 17:17:09', 'active'),
('ACLG-195836', 'ACNT-00000', 'Generate Indigency certificate for Angelico A. Forbes  (RSDT-832907), Purpose: testing', '2023-05-25 08:25:59', 'active'),
('ACLG-196703', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:10:43', 'active'),
('ACLG-197520', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Myrna Z. Giron  (RSDT-000009)', '2023-06-10 21:00:07', 'active'),
('ACLG-198342', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:13:11', 'active'),
('ACLG-205436', 'ACNT-00000', 'Update Item details Chair 2', '2023-06-12 17:50:50', 'active'),
('ACLG-208169', 'ACNT-00000', 'Generate Indigency certificate for Myrna Z. Giron  (RSDT-000009), Purpose: for school requirements', '2023-05-22 23:38:29', 'active'),
('ACLG-210796', 'ACNT-00000', 'Logout Successfully', '2023-05-24 21:20:27', 'active'),
('ACLG-230916', 'ACNT-00000', 'Settled Blotter: <br>  Case ID: ', '2023-06-11 00:51:37', 'active'),
('ACLG-257368', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Certificate Number: BRCRT-', '2023-05-25 12:49:52', 'active'),
('ACLG-269341', 'ACNT-00000', 'Delete account ACNT-317045', '2023-05-24 21:20:09', 'active'),
('ACLG-273185', 'ACNT-00000', 'Login Successfully', '2023-06-10 18:24:33', 'active'),
('ACLG-295384', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 20:31:57', 'active'),
('ACLG-301725', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 15:58:36', 'active'),
('ACLG-309584', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:14:58', 'active'),
('ACLG-309852', 'ACNT-00000', 'Login Successfully', '2023-05-27 10:10:08', 'active'),
('ACLG-317045', 'ACNT-00000', 'Created account for Edison P. Rivera  (RSDT-071398)', '2023-05-24 21:09:01', 'active'),
('ACLG-326987', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:05:02', 'active'),
('ACLG-340725', 'ACNT-00000', 'restored account ACNT-317045', '2023-05-24 21:18:31', 'active'),
('ACLG-341658', 'ACNT-00000', 'Login Successfully', '2023-06-10 11:54:18', 'active'),
('ACLG-346952', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:20:40', 'active'),
('ACLG-361798', 'ACNT-00000', 'Returned Tables (Round Table),  Returned by Mishelle C. Mejilla  (RSDT-000002)', '2023-06-10 22:23:38', 'active'),
('ACLG-362547', 'ACNT-00000', 'Register Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 17:19:14', 'active'),
('ACLG-369812', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:26:50', 'active'),
('ACLG-371906', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 15:57:50', 'active'),
('ACLG-375194', 'ACNT-00000', 'Login Successfully', '2023-06-03 18:37:10', 'active'),
('ACLG-379168', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Myrna Z. Giron  (RSDT-000009)', '2023-06-10 20:40:04', 'active'),
('ACLG-382419', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-11 23:22:15', 'active'),
('ACLG-390285', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 15:58:31', 'active'),
('ACLG-390827', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:06', 'active'),
('ACLG-409517', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-05-25 16:30:50', 'active'),
('ACLG-413065', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:46', 'active'),
('ACLG-430815', 'ACNT-00000', 'Update resident data of Angelico 2 A. Forbes 2 2 (RSDT-832907)', '2023-05-25 08:07:58', 'active'),
('ACLG-432108', 'ACNT-00000', 'restored account ACNT-00000', '2023-05-24 21:18:28', 'active'),
('ACLG-451726', 'ACNT-00000', 'Login Successfully', '2023-06-11 14:00:23', 'active'),
('ACLG-456029', 'ACNT-00000', 'Update resident data of Lallyn Anne G. Bayles 1  (RSDT-362547)', '2023-05-25 18:06:15', 'active'),
('ACLG-463271', 'ACNT-00000', 'Delete account of ', '2023-05-24 21:01:48', 'active'),
('ACLG-468092', 'ACNT-00000', 'Update resident data of Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 18:24:32', 'active'),
('ACLG-475319', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Angelico A. Forbes  (RSDT-832907)', '2023-06-10 20:47:29', 'active'),
('ACLG-480795', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Edilberto A. Toribio  (RSDT-000003)', '2023-06-10 21:11:13', 'active'),
('ACLG-491380', 'ACNT-00000', 'Login Successfully', '2023-05-27 13:58:35', 'active'),
('ACLG-496710', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:11:19', 'active'),
('ACLG-498751', 'ACNT-00000', 'Login Successfully', '2023-06-12 14:22:57', 'active'),
('ACLG-528346', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-27 13:13:00', 'active'),
('ACLG-542971', 'ACNT-00000', 'Create Incident Report INCD-542971', '2023-06-11 22:35:34', 'active'),
('ACLG-547239', 'ACNT-00000', 'Generate Indigency certificate for Edison P. Rivera  (RSDT-071398), Purpose: Testing', '2023-05-25 16:35:33', 'active'),
('ACLG-560219', 'ACNT-00000', 'Login Successfully', '2023-06-11 21:17:21', 'active'),
('ACLG-567249', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:38:22', 'active'),
('ACLG-567908', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:47:00', 'active'),
('ACLG-572634', 'ACNT-00000', 'Logout Successfully', '2023-05-22 23:29:06', 'active'),
('ACLG-578264', 'ACNT-00000', 'Update resident data of Angelico A. Forbes  (RSDT-832907)', '2023-05-25 08:09:00', 'active'),
('ACLG-579320', 'ACNT-00000', 'Returned Tables (Round Table),  Returned by Lallyn Anne G. Bayles  (RSDT-362547)', '2023-06-10 22:14:12', 'active'),
('ACLG-603291', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:36:58', 'active'),
('ACLG-607431', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:30', 'active'),
('ACLG-607592', 'ACNT-00000', 'Created account for Angelico A. Forbes  (RSDT-832907)', '2023-05-24 20:52:14', 'active'),
('ACLG-608159', 'ACNT-00000', 'Settled Blotter: <br>  Case ID: ', '2023-06-11 00:49:49', 'active'),
('ACLG-614735', 'ACNT-00000', 'Updated Incident Report ', '2023-06-11 23:03:07', 'active'),
('ACLG-618295', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:14:49', 'active'),
('ACLG-619237', 'ACNT-00000', 'Login Successfully', '2023-05-24 21:37:46', 'active'),
('ACLG-639270', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: Sample, <br> Location: Sample Address', '2023-05-25 16:36:00', 'active'),
('ACLG-640328', 'ACNT-00000', 'Updated Incident Report ', '2023-06-11 23:03:23', 'active'),
('ACLG-647920', 'ACNT-00000', 'deactivate resident ID  Josilito A. Gonzalle  ', '2023-05-22 20:16:39', 'active'),
('ACLG-652194', 'ACNT-00000', 'Generate Indigency certificate for Edison P. Rivera  (RSDT-071398), Purpose: testing', '2023-05-25 13:18:13', 'active'),
('ACLG-670452', 'ACNT-00000', 'Login Successfully', '2023-05-27 10:10:18', 'active'),
('ACLG-683927', 'ACNT-00000', 'deactivate resident ID RSDT-000007 ', '2023-05-22 19:41:40', 'active'),
('ACLG-687015', 'ACNT-00000', 'Login Successfully', '2023-05-26 10:20:28', 'active'),
('ACLG-695184', 'ACNT-00000', 'Returned Tables (Round Table),  Returned by Angelico A. Forbes  (RSDT-832907)', '2023-06-10 22:12:02', 'active'),
('ACLG-702356', 'ACNT-607592', 'Delete account ACNT-607592', '2023-05-24 21:21:06', 'active'),
('ACLG-705126', 'ACNT-00000', 'Login Successfully', '2023-05-27 12:29:35', 'active'),
('ACLG-719684', 'ACNT-00000', 'Delete account ACNT-871542', '2023-06-12 18:12:31', 'active'),
('ACLG-736280', 'ACNT-00000', 'Generate Barangay Clearance for Angelico A. Forbes  (RSDT-832907)', '2023-05-25 16:30:34', 'active'),
('ACLG-739812', 'ACNT-00000', 'Logout Successfully', '2023-06-11 18:12:44', 'active'),
('ACLG-742516', 'ACNT-00000', 'Borrowed Chairs (Monoblock),  Borrowed by Roberto C. Jumaquio . Santiago  (RSDT-000010)', '2023-06-12 17:09:51', 'active'),
('ACLG-746185', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:31', 'active'),
('ACLG-760291', 'ACNT-00000', 'Created account for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-06-12 18:07:43', 'active'),
('ACLG-764910', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:14:00', 'active'),
('ACLG-765398', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BRCRT', '2023-05-25 12:51:46', 'active'),
('ACLG-768430', 'ACNT-00000', 'Generate Barangay Clearance for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 20:31:30', 'active'),
('ACLG-784290', 'ACNT-00000', 'Settled Incident: <br>  Case ID: BLTR-00000', '2023-06-11 00:46:04', 'active'),
('ACLG-785061', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Bussiness: Forbes Computer Shop, <br> Location: 291 P. Burgos Ave., Caridad, Cavite City', '2023-05-25 14:28:00', 'active'),
('ACLG-791230', 'ACNT-00000', 'Login Successfully', '2023-06-11 18:24:27', 'active'),
('ACLG-791623', 'ACNT-00000', 'Login Successfully', '2023-05-25 17:18:31', 'active'),
('ACLG-802571', 'ACNT-00000', 'Generate Bussiness Permit for for Mishelle C. Mejilla  (RSDT-000002), <br> Certificate Number: BRCRT', '2023-05-25 12:50:56', 'active'),
('ACLG-804926', 'ACNT-00000', 'Created account for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-06-12 18:12:39', 'active'),
('ACLG-806537', 'ACNT-00000', 'restored account ACNT-871542', '2023-06-12 18:13:28', 'active'),
('ACLG-810429', 'ACNT-00000', 'Login Successfully', '2023-05-25 20:22:34', 'active'),
('ACLG-819374', 'ACNT-00000', 'Login Successfully', '2023-05-24 19:19:54', 'active'),
('ACLG-821054', 'ACNT-00000', 'Generate Bussiness Permit for for Ryan . Santiago  (RSDT-000006), <br> Certificate Number: BSCRT-5-25-2023-RSDT-000006, <br> Bussiness: Computer Shop, <br> Purpose: Business Permit', '2023-05-25 13:10:57', 'active'),
('ACLG-824673', 'ACNT-00000', 'Deactivate resident data of Ivy Rose T. Curambao  (RSDT-0000012)', '2023-05-24 22:15:26', 'active'),
('ACLG-827103', 'ACNT-00000', 'Generate Bussiness Permit for for Angelico A. Forbes  (RSDT-832907), <br> Certificate Number: BRCRT-', '2023-05-25 12:47:47', 'active'),
('ACLG-830726', 'ACNT-00000', 'Logout Successfully', '2023-06-11 17:39:32', 'active'),
('ACLG-832540', 'ACNT-00000', 'Logout Successfully', '2023-05-27 10:10:14', 'active'),
('ACLG-832907', 'ACNT-00000', 'Register Angelico A. Forbes  (RSDT-832907)', '2023-05-22 23:42:31', 'active'),
('ACLG-836012', 'ACNT-00000', 'Login Successfully', '2023-05-25 15:16:09', 'active'),
('ACLG-839741', 'ACNT-00000', 'Update resident data of Lallyn Anne 1 G. Bayles 1 1 (RSDT-362547)', '2023-05-25 18:04:00', 'active'),
('ACLG-847265', 'ACNT-00000', 'Password Changed for the account of Benjamin C. Ausria  (ACNT-00000)', '2023-05-25 18:58:10', 'active'),
('ACLG-854329', 'ACNT-00000', 'Delete account ACNT-317045', '2023-05-24 21:16:28', 'active'),
('ACLG-857130', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:12:03', 'active'),
('ACLG-860175', 'ACNT-00000', 'Delete account ', '2023-05-24 21:16:31', 'active'),
('ACLG-871542', 'ACNT-00000', 'Created account for Lallyn Anne G. Bayles  (RSDT-362547)', '2023-05-25 18:24:46', 'active'),
('ACLG-879160', 'ACNT-00000', 'Settled Blotter: <br>  Case ID: ', '2023-06-11 00:56:38', 'active'),
('ACLG-892365', 'ACNT-00000', 'Login Successfully', '2023-06-11 18:04:36', 'active'),
('ACLG-905182', 'ACNT-00000', 'Settled Blotter: <br>  Case ID: ', '2023-06-11 00:57:17', 'active'),
('ACLG-906184', 'ACNT-607592', 'Logout Successfully', '2023-05-24 21:37:29', 'active'),
('ACLG-906785', 'ACNT-00000', 'Create Blotter Report BLTR-906785', '2023-06-11 14:48:45', 'active'),
('ACLG-912367', 'ACNT-00000', 'Update resident data of Angelico A. Forbes  (RSDT-832907)', '2023-05-25 08:10:37', 'active'),
('ACLG-916025', 'ACNT-00000', 'Created account for Edison P. Rivera  (RSDT-071398)', '2023-05-24 21:07:55', 'active'),
('ACLG-925084', 'ACNT-00000', 'Logout Successfully', '2023-06-10 20:46:25', 'active'),
('ACLG-926813', 'ACNT-00000', 'Updated Blotter Report BLTR-906785', '2023-06-11 16:14:13', 'active'),
('ACLG-935648', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:11', 'active'),
('ACLG-938054', 'ACNT-00000', 'deactivate resident ID  Maria Clara A. de los Santos  ', '2023-05-22 20:16:33', 'active'),
('ACLG-940526', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Myrna Z. Giron  (RSDT-000009)', '2023-06-10 20:45:05', 'active'),
('ACLG-945768', 'ACNT-00000', 'Delete account ACNT-00000', '2023-05-24 21:13:36', 'active'),
('ACLG-945816', 'ACNT-00000', 'Login Successfully', '2023-06-10 20:46:33', 'active'),
('ACLG-961857', 'ACNT-00000', 'restored account ACNT-607592', '2023-05-24 21:18:34', 'active'),
('ACLG-975104', 'ACNT-00000', 'Generate Indigency certificate for Resident RSDT-0000012 (Ivy Rose T. Curambao ), Purpose: for Schoo', '2023-05-22 23:36:19', 'active'),
('ACLG-975283', 'ACNT-00000', 'Login Successfully', '2023-06-12 16:47:49', 'active'),
('ACLG-976825', 'ACNT-00000', 'Delete account ', '2023-05-24 21:15:06', 'active'),
('ACLG-978246', 'ACNT-00000', 'Settled Incident: <br>  Case ID: CASE-0000', '2023-06-11 00:24:04', 'active'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`bltr_id`, `bltr_date`, `comp_name`, `comp_name_address`, `comp_person`, `comp_person_address`, `regs_by`, `description`, `date_settled`, `status`) VALUES
('BLTR-00000', '2023-06-11 00:36:22', 'Juan Dela Cruz', 'Sample Address 1', 'Pedro Dela Cruz', 'Sample Address 2', 'RSDT-000003', 'Sample case', '2023-06-11 12:57:00', 'settled'),
('BLTR-906785', '2023-06-11 14:47:00', 'Juan', 'Sample address', 'Jose', 'Tondo Manila', 'RSDT-00000', 'samlpe sample', NULL, 'ongoing');

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
  `status` varchar(20) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_incident`
--

INSERT INTO `tbl_incident` (`incd_id`, `incd_date_time`, `victim_name`, `victim_address`, `incd_location`, `regs_by`, `description`, `date_settled`, `status`) VALUES
('INCD-00000', '2023-06-11 22:02:55', 'Maria Clara', 'Sample Address', 'Sample location', 'RSDT-00000', 'sample incident', NULL, 'ongoing'),
('INCD-542971', '2023-06-11 22:34:00', 'Jose', 'Tondo Manila', 'Sample Addess', 'RSDT-00000', 'testing', '2023-06-11 11:22:00', 'settled');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `name`, `description`, `updated_qty`, `original_qty`, `regs_by`, `regs_date`, `status`) VALUES
('ITEM-0000', 'Tables', 'Round Table', '41', '100', 'RSDT-00000', '2023-05-27 11:06:03', 'active'),
('ITEM-093284', 'Chairs', 'Monoblock', '90', '100', 'RSDT-00000', '2023-06-12 17:08:53', 'active'),
('ITEM-170528', 'Chair 2', 'Monoblock 2', '100', '110', 'RSDT-00000', '2023-06-12 17:17:09', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item_history`
--

INSERT INTO `tbl_item_history` (`iths_id`, `item`, `qty`, `purpose`, `borrowed_date`, `borrowed_by`, `borrowed_from`, `returned_date`, `returned_by`, `returned_to`, `status`) VALUES
('ITHS-00000', 'ITEM-0000', '5', 'Testing', '2023-05-27 12:03:13', 'RSDT-0000012', 'RSDT-00000', NULL, NULL, NULL, 'pending'),
('ITHS-197520', 'ITEM-0000', '1', 'testing', '2023-06-10 21:00:00', 'RSDT-000009', 'RSDT-00000', '2023-06-19 22:23:00', 'RSDT-000002', 'RSDT-00000', 'returned'),
('ITHS-480795', 'ITEM-0000', '4', 'testing 22', '2023-06-10 21:11:00', 'RSDT-000003', 'RSDT-00000', '2023-06-12 22:14:00', 'RSDT-362547', 'RSDT-00000', 'returned'),
('ITHS-742516', 'ITEM-093284', '10', 'Feeding Program', '2023-06-12 17:09:00', 'RSDT-000010', 'RSDT-00000', NULL, NULL, NULL, 'pending');

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
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`bltr_id`),
  ADD KEY `rsdt_bltrFK` (`regs_by`);

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
