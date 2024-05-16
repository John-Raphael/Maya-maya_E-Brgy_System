-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 12:20 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20904155_db_mayamaya`
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
('ACNT-405187', 'RSDT-000010', 'ADMIN', 'admin', 'me1234', 'online', '2023-06-13 10:57:10', 'active'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`aclg_id`, `user_account`, `activity`, `date_time`, `activity_status`) VALUES
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
('ACLG-107268', 'ACNT-00000', 'Update resident data of Myrna 2 Z. Giron 2 2 (RSDT-000009)', '2023-06-13 07:00:31', 'active'),
('ACLG-129045', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:24', 'active'),
('ACLG-130798', 'ACNT-00000', 'Login Successfully', '2023-06-14 11:53:54', 'active'),
('ACLG-135847', 'ACNT-00000', 'Create Blotter Report BLTR-135847', '2023-06-13 05:58:01', 'active'),
('ACLG-150294', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:04:19', 'active'),
('ACLG-158274', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:40', 'active'),
('ACLG-167429', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:37:09', 'active'),
('ACLG-170345', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:53:52', 'active'),
('ACLG-175603', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:51:34', 'active'),
('ACLG-189264', 'ACNT-00000', 'Deactivate resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:51:48', 'active'),
('ACLG-194653', 'ACNT-00000', 'Logout Successfully', '2023-06-13 09:29:20', 'active'),
('ACLG-205746', 'ACNT-00000', 'Update Item details Tent', '2023-06-13 06:03:09', 'active'),
('ACLG-209786', 'ACNT-00000', 'Update resident data of Myrna 2 Z. Giron 2 2 (RSDT-000009)', '2023-06-13 06:48:49', 'active'),
('ACLG-210649', 'ACNT-00000', 'Login Successfully', '2023-06-13 04:25:46', 'active'),
('ACLG-234870', 'ACNT-00000', 'Added new Barangay Equipment: Chair', '2023-06-13 09:06:15', 'active'),
('ACLG-234978', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:16', 'active'),
('ACLG-253049', 'ACNT-00000', 'Login Successfully', '2023-06-13 07:24:18', 'active'),
('ACLG-270618', 'ACNT-00000', 'Logout Successfully', '2023-06-14 11:49:58', 'active'),
('ACLG-273165', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 05:58:21', 'active'),
('ACLG-285471', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 07:18:21', 'active'),
('ACLG-290453', 'ACNT-00000', 'Generate Bussiness Permit for Myrna Z. Giron  (RSDT-000009), <br> Bussiness: Karenderia, <br> Location: Cavite city', '2023-06-13 09:20:47', 'active'),
('ACLG-295670', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 07:03:15', 'active'),
('ACLG-297081', 'ACNT-936781', 'Login Successfully', '2023-06-13 11:02:53', 'active'),
('ACLG-302697', 'ACNT-00000', 'Logout Successfully', '2023-06-13 09:33:05', 'active'),
('ACLG-305169', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:06:41', 'active'),
('ACLG-307169', 'ACNT-00000', 'Login Successfully', '2023-06-13 05:37:16', 'active'),
('ACLG-307629', 'ACNT-00000', 'Login Successfully', '2023-06-13 08:29:46', 'active'),
('ACLG-307829', 'ACNT-00000', 'restored account ACNT-936781', '2023-06-13 09:32:31', 'active'),
('ACLG-308795', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:54:42', 'active'),
('ACLG-317209', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:32:28', 'active'),
('ACLG-326457', 'ACNT-00000', 'Added new Barangay Equipment: Chair', '2023-06-13 09:14:40', 'active'),
('ACLG-346598', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:57:03', 'active'),
('ACLG-347859', 'ACNT-00000', 'Returned Tent (New),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:42:48', 'active'),
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
('ACLG-432108', 'ACNT-00000', 'Restore resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:52:30', 'active'),
('ACLG-437269', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:01', 'active'),
('ACLG-465231', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:52:46', 'active'),
('ACLG-471396', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:32:26', 'active'),
('ACLG-486291', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:54:30', 'active'),
('ACLG-489075', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:55:23', 'active'),
('ACLG-497563', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:40:38', 'active'),
('ACLG-503416', 'ACNT-00000', 'Login Successfully', '2023-06-14 10:40:07', 'active'),
('ACLG-506874', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:55:02', 'active'),
('ACLG-509741', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:37:23', 'active'),
('ACLG-517869', 'ACNT-00000', 'Generate Barangay Clearance for Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:05:20', 'active'),
('ACLG-521376', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:57:17', 'active'),
('ACLG-521604', 'ACNT-936781', 'Logout Successfully', '2023-06-13 11:04:23', 'active'),
('ACLG-523869', 'ACNT-00000', 'Delete account ACNT-936781', '2023-06-13 10:56:30', 'active'),
('ACLG-527460', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:30', 'active'),
('ACLG-529407', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:53:42', 'active'),
('ACLG-530268', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:08', 'active'),
('ACLG-531462', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 09:18:58', 'active'),
('ACLG-532497', 'ACNT-00000', 'Create Incident Report INCD-532497', '2023-06-13 05:54:02', 'active'),
('ACLG-536014', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:44:41', 'active'),
('ACLG-571302', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:54:04', 'active'),
('ACLG-571463', 'ACNT-00000', 'Login Successfully', '2023-06-13 05:59:53', 'active'),
('ACLG-592360', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:19:25', 'active'),
('ACLG-603142', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:18:57', 'active'),
('ACLG-607439', 'ACNT-00000', 'Register Xian . Tiu  (RSDT-607439)', '2023-06-13 05:49:07', 'active'),
('ACLG-620748', 'ACNT-936781', 'Login Successfully', '2023-06-13 09:39:25', 'active'),
('ACLG-621507', 'ACNT-00000', 'Login Successfully', '2023-06-13 03:23:36', 'active'),
('ACLG-624093', 'ACNT-936781', 'Logout Successfully', '2023-06-13 09:40:36', 'active'),
('ACLG-635019', 'ACNT-00000', 'Borrowed Chair (Monoblock),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:14:58', 'active'),
('ACLG-642590', 'ACNT-00000', 'Returned Chair (Monoblock),  Returned by Xian  . Lee   (RSDT-381965)', '2023-06-13 09:06:53', 'active'),
('ACLG-650349', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:55:43', 'active'),
('ACLG-650431', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:54:25', 'active'),
('ACLG-658402', 'ACNT-00000', 'Update Item details Tent', '2023-06-13 06:27:58', 'active'),
('ACLG-678239', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:56:08', 'active'),
('ACLG-678425', 'ACNT-00000', 'Generate Barangay certificate for Myrna Z. Giron  (RSDT-000009), Purpose: fhhfgfd', '2023-06-13 03:25:54', 'active'),
('ACLG-695872', 'ACNT-00000', 'Login Successfully', '2023-06-13 06:47:47', 'active'),
('ACLG-720634', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:18:03', 'active'),
('ACLG-729143', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:55:35', 'active'),
('ACLG-729401', 'ACNT-00000', 'Logout Successfully', '2023-06-13 03:47:19', 'active'),
('ACLG-732159', 'ACNT-00000', 'Updated Blotter Report BLTR-135847', '2023-06-13 07:18:15', 'active'),
('ACLG-739840', 'ACNT-00000', 'Update resident data of Myrna Z. Giron  (RSDT-000009)', '2023-06-13 05:43:05', 'active'),
('ACLG-740862', 'ACNT-936781', 'Login Successfully', '2023-06-13 10:28:18', 'active'),
('ACLG-740985', 'ACNT-00000', 'restored account ACNT-936781', '2023-06-13 10:55:19', 'active'),
('ACLG-753801', 'ACNT-936781', 'Login Successfully', '2023-06-13 09:43:08', 'active'),
('ACLG-761385', 'ACNT-00000', 'Logout Successfully', '2023-06-13 10:18:09', 'active'),
('ACLG-769804', 'ACNT-00000', 'Borrowed Tables (Round Table),  Borrowed by Mishelle C. Mejilla  (RSDT-000002)', '2023-06-13 07:21:33', 'active'),
('ACLG-781350', 'ACNT-00000', 'Login Successfully', '2023-06-13 10:52:19', 'active'),
('ACLG-784251', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 05:56:35', 'active'),
('ACLG-793856', 'ACNT-00000', 'Generate Barangay Clearance for Myrna Z. Giron  (RSDT-000009)', '2023-06-13 06:05:14', 'active'),
('ACLG-795261', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:17:07', 'active'),
('ACLG-802534', 'ACNT-00000', 'Borrowed Tent (New),  Borrowed by Xian  . Lee   (RSDT-381965)', '2023-06-13 08:41:43', 'active'),
('ACLG-829176', 'ACNT-00000', 'Added new Barangay Equipment: Tent', '2023-06-13 08:40:59', 'active'),
('ACLG-867923', 'ACNT-00000', 'Updated Incident Report INCD-532497', '2023-06-13 07:17:56', 'active'),
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
('ACLG-948057', 'ACNT-00000', 'Delete account ACNT-936781', '2023-06-13 09:32:20', 'active'),
('ACLG-960412', 'ACNT-00000', 'Updated Incident Report INCD-542971', '2023-06-13 08:38:02', 'active'),
('ACLG-963407', 'ACNT-00000', 'Update resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 05:51:26', 'active'),
('ACLG-975408', 'ACNT-00000', 'Deactivate resident data of Xian N. Tiu N/a (RSDT-607439)', '2023-06-13 06:15:22', 'active'),
('ACLG-980365', 'ACNT-00000', 'Login Successfully', '2023-06-13 09:56:03', 'active'),
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
('BLTR-135847', '2023-06-13 13:57:00', 'Tiu lee', '123 sample', 'Lee Tiu', '123 sample', 'RSDT-00000', 'May utang', NULL, 'new'),
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
('INCD-532497', '2023-06-13 13:52:00', 'Tiu lee', '123 Sample', 'Sample', 'RSDT-00000', 'Sunog', '2023-06-13 00:00:00', 'settled'),
('INCD-542971', '2023-06-11 22:34:00', 'Jose', 'Tondo Manila', 'Sample Addess', 'RSDT-00000', 'testing', '2023-06-13 00:00:00', 'settled');

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
('ITEM-326457', 'Chair', 'Monoblock', '100', '100', 'RSDT-00000', '2023-06-13 09:14:40', 'active');

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
('ITHS-592360', 'ITEM-326457', '52', 'Birthday', '2023-06-13 17:19:00', 'RSDT-381965', 'RSDT-00000', '2023-06-13 17:19:00', 'RSDT-381965', 'RSDT-00000', 'returned'),
('ITHS-635019', 'ITEM-326457', '60', 'Feeding Program', '2023-06-13 17:14:00', 'RSDT-381965', 'RSDT-00000', '2023-06-13 17:15:00', 'RSDT-381965', 'RSDT-00000', 'returned');

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
('RSDT-00000', 'Benjamin', 'C', 'Austria', '', '111 111 111', '222 222 222', '01', 'Sample Street', 'Male', '2001-05-20', 'Tondo Manila', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-0000012', 'Ivy Rose', 'T', 'Curambao', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000002', 'Mishelle', 'C', 'Mejilla', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '1985-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000003', 'Edilberto', 'A', 'Toribio', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Female', '2001-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000004', 'Josilito', 'A', 'Gonzalle', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Service Crew', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000005', 'Ferdnando', 'C', 'Simpelo', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1985-05-20', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000006', 'Ryan', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000007', 'Ernesto', '', 'Carlos', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-000008', 'Alyysa Marie', 'G', 'Santia', '', '111-111-111', '222-222-222', '2', 'Sample Street', 'Female', '2023-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000009', 'Myrna', 'Z', 'Giron', '', '111-111-111 2', '222-222-222', '01', 'Sample Street', 'Female', '2001-05-20', 'Cavite', 'Married', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000010', 'Roberto C. Jumaquio', '', 'Santiago', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1956-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'active', 'sample_photo.jpg'),
('RSDT-000011', 'Renato', 'J', 'Buenaventura', '', '111-111-111', '222-222-222', '01', 'Sample Street', 'Male', '1966-05-20', 'Cavite', 'Single', 'Filipino', 'Registered', 'Barangay Official', '2023-05-15 00:00:00', 'deleted', 'sample_photo.jpg'),
('RSDT-381965', 'Xian', ' ', 'Lee', ' ', '09123456890', '01234567890', '123', 'Sample', 'Male', '1997-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Nurse', '2023-06-13 08:33:20', 'active', 'RSDT-381965-IMG_20230613_134704.jpg'),
('RSDT-607439', 'Xian', 'N/a', 'Tiu', 'N/a', '09123456890', '01234567890', '01234567890', 'Di makita', 'Male', '1997-06-13', 'Cavite', 'Single', 'Filipino', 'Registered', 'Nurse', '2023-06-13 05:49:07', 'deleted', 'RSDT-607439-IMG_20230613_134704.jpg');

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
