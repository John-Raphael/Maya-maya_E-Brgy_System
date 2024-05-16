-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:49 PM
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
-- Stand-in structure for view `vw_accounts`
-- (See below for the actual view)
--
CREATE TABLE `vw_accounts` (
`Resident ID` varchar(20)
,`Account ID` varchar(20)
,`Name` varchar(66)
,`User Type` varchar(50)
,`Registration Date` varchar(73)
,`Username` varchar(50)
,`Password` varchar(50)
,`Online Status` varchar(20)
,`Status` varchar(20)
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
,`Activity` varchar(100)
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
,`Name` varchar(66)
,`Position` varchar(100)
,`Registration Date` varchar(73)
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
);

-- --------------------------------------------------------

--
-- Structure for view `vw_accounts`
--
DROP TABLE IF EXISTS `vw_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_accounts`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, `acnt`.`acnt_id` AS `Account ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `acnt`.`user_type` AS `User Type`, date_format(`acnt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `acnt`.`username` AS `Username`, `acnt`.`password` AS `Password`, `acnt`.`online_status` AS `Online Status`, `acnt`.`status` AS `Status` FROM (`tbl_account` `acnt` join `tbl_resident` `rsdt` on(`acnt`.`user_resident` = `rsdt`.`rsdt_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_activity_log`
--
DROP TABLE IF EXISTS `vw_activity_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_activity_log`  AS SELECT `aclg`.`aclg_id` AS `Log ID`, date_format(`aclg`.`date_time`,'%M %d, %Y') AS `Date`, date_format(`aclg`.`date_time`,'%h:%i %p') AS `Time`, `acnt`.`Account ID` AS `Account ID`, `acnt`.`Name` AS `User Name`, `acnt`.`User Type` AS `User Type`, `aclg`.`activity` AS `Activity`, `aclg`.`activity_status` AS `Status` FROM (`tbl_activity_log` `aclg` join `vw_accounts` `acnt` on(`aclg`.`user_account` = `acnt`.`Account ID`)) ORDER BY `aclg`.`date_time` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_official`
--
DROP TABLE IF EXISTS `vw_official`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_official`  AS SELECT `ofcl`.`ofcl_id` AS `Official ID`, `rsdt`.`rsdt_id` AS `Resident ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `ofcl`.`position` AS `Position`, date_format(`ofcl`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `ofcl`.`ofcl_status` AS `Status`, `ofcl`.`photo` AS `Photo` FROM (`tbl_official` `ofcl` join `tbl_resident` `rsdt` on(`ofcl`.`resident` = `rsdt`.`rsdt_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_resident`
--
DROP TABLE IF EXISTS `vw_resident`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_resident`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, concat(`rsdt`.`l_name`,', ',`rsdt`.`f_name`,' ',`rsdt`.`ext_name`,' ',left(`rsdt`.`m_name`,1),'.') AS `Name`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`) AS `Name_2`, `rsdt`.`gender` AS `Gender`, date_format(`rsdt`.`birthdate`,'%M %d, %Y') AS `Birthdate`, date_format(from_days(to_days(current_timestamp()) - to_days(`rsdt`.`birthdate`)),'%Y') + 0 AS `Age`, `rsdt`.`birthplace` AS `Birthplace`, `rsdt`.`pr_contact` AS `Primary Contact Number`, `rsdt`.`sr_contact` AS `Secondary Contact Number`, `rsdt`.`cvl_status` AS `Civil Status`, `rsdt`.`citizenship` AS `Citizenship`, `rsdt`.`voter_status` AS `Voter Status`, `rsdt`.`occupation` AS `Occupation`, concat(`rsdt`.`hs_num`,' ',`rsdt`.`strt_name`) AS `Address`, date_format(`rsdt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `rsdt`.`rsdt_status` AS `Resident Status`, `rsdt`.`photo` AS `Photo` FROM `tbl_resident` AS `rsdt``rsdt`  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
