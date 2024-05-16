-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 12:21 PM
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
-- Stand-in structure for view `vw_accounts`
-- (See below for the actual view)
--
CREATE TABLE `vw_accounts` (
`Resident ID` varchar(20)
,`Official ID` varchar(20)
,`Account ID` varchar(20)
,`Name` varchar(66)
,`User Type` varchar(50)
,`Registration Date` varchar(73)
,`Username` varchar(50)
,`Password` varchar(50)
,`Online Status` varchar(20)
,`Photo` varchar(100)
,`Gender` varchar(6)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_accounts`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, `ofcl`.`ofcl_id` AS `Official ID`, `acnt`.`acnt_id` AS `Account ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `acnt`.`user_type` AS `User Type`, date_format(`acnt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `acnt`.`username` AS `Username`, `acnt`.`password` AS `Password`, `acnt`.`online_status` AS `Online Status`, `rsdt`.`photo` AS `Photo`, `rsdt`.`gender` AS `Gender`, `acnt`.`status` AS `Status` FROM ((`tbl_account` `acnt` join `tbl_resident` `rsdt` on(`acnt`.`user_resident` = `rsdt`.`rsdt_id`)) join `tbl_official` `ofcl` on(`rsdt`.`rsdt_id` = `ofcl`.`resident`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_activity_log`
--
DROP TABLE IF EXISTS `vw_activity_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_activity_log`  AS SELECT `aclg`.`aclg_id` AS `Log ID`, date_format(`aclg`.`date_time`,'%M %d, %Y') AS `Date`, date_format(`aclg`.`date_time`,'%h:%i %p') AS `Time`, `acnt`.`Account ID` AS `Account ID`, `acnt`.`Name` AS `User Name`, `acnt`.`User Type` AS `User Type`, `aclg`.`activity` AS `Activity`, `aclg`.`activity_status` AS `Status` FROM (`tbl_activity_log` `aclg` join `vw_accounts` `acnt` on(`aclg`.`user_account` = `acnt`.`Account ID`)) ORDER BY `aclg`.`date_time` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_blotters`
--
DROP TABLE IF EXISTS `vw_blotters`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_blotters`  AS SELECT `bltr`.`bltr_id` AS `Blotter ID`, date_format(`bltr`.`bltr_date`,'%M %d, %Y') AS `Blotter Date`, date_format(`bltr`.`bltr_date`,'%h:%i %p') AS `Blotter Time`, `bltr`.`comp_name` AS `Comp Name`, `bltr`.`comp_name_address` AS `Comp Name Address`, `bltr`.`comp_person` AS `Comp Person`, `bltr`.`comp_person_address` AS `Comp Person Address`, `bltr`.`description` AS `Description`, `bltr`.`regs_by` AS `Official ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered By`, date_format(`bltr`.`date_settled`,'%M %d, %Y') AS `Date Settled`, `bltr`.`status` AS `Status` FROM (`tbl_blotter` `bltr` join `tbl_resident` `rsdt` on(`bltr`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `bltr`.`bltr_date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_incident`
--
DROP TABLE IF EXISTS `vw_incident`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_incident`  AS SELECT `incd`.`incd_id` AS `Incident ID`, date_format(`incd`.`incd_date_time`,'%M %d, %Y') AS `Incident Date`, date_format(`incd`.`incd_date_time`,'%h:%i %p') AS `Incident Time`, `incd`.`victim_name` AS `Victim Name`, `incd`.`victim_address` AS `Victim Address`, `incd`.`incd_location` AS `Incident Address`, `incd`.`description` AS `Description`, `incd`.`regs_by` AS `Official ID`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered By`, date_format(`incd`.`date_settled`,'%M %d, %Y') AS `Date Settled`, `incd`.`status` AS `Status` FROM (`tbl_incident` `incd` join `tbl_resident` `rsdt` on(`incd`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `incd`.`incd_date_time` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item`
--
DROP TABLE IF EXISTS `vw_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_item`  AS SELECT `item`.`item_id` AS `Item ID`, `item`.`name` AS `Name`, `item`.`description` AS `Description`, `item`.`updated_qty` AS `Current Qty`, `item`.`original_qty` AS `Original Qty`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Registered by`, date_format(`item`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `item`.`status` AS `Status` FROM (`tbl_item` `item` join `tbl_resident` `rsdt` on(`item`.`regs_by` = `rsdt`.`rsdt_id`)) ORDER BY `item`.`name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item_history`
--
DROP TABLE IF EXISTS `vw_item_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_item_history`  AS SELECT `iths`.`iths_id` AS `History ID`, date_format(`iths`.`borrowed_date`,'%M %d, %Y') AS `Borrowed Date`, date_format(`iths`.`borrowed_date`,'%h:%i %p') AS `Borrowed Time`, `iths`.`item` AS `Item ID`, `item`.`name` AS `Name`, `item`.`description` AS `Description`, `item`.`updated_qty` AS `Item Qty`, `iths`.`qty` AS `Borrowed Qty`, `iths`.`purpose` AS `Purpose`, concat(`brwd`.`f_name`,' ',left(`brwd`.`m_name`,1),'. ',`brwd`.`l_name`,' ',`brwd`.`ext_name`,' ') AS `Borrowed by`, concat(`brf`.`f_name`,' ',left(`brf`.`m_name`,1),'. ',`brf`.`l_name`,' ',`brf`.`ext_name`,' ') AS `Borrowed from`, concat(`rtnd`.`f_name`,' ',left(`rtnd`.`m_name`,1),'. ',`rtnd`.`l_name`,' ',`rtnd`.`ext_name`,' ') AS `Returned by`, date_format(`iths`.`returned_date`,'%M %d, %Y') AS `Returned Date`, date_format(`iths`.`returned_date`,'%h:%i %p') AS `Returned Time`, concat(`rtt`.`f_name`,' ',left(`rtt`.`m_name`,1),'. ',`rtt`.`l_name`,' ',`rtt`.`ext_name`,' ') AS `Returned to`, `iths`.`status` AS `Status` FROM (((((`tbl_item_history` `iths` join `tbl_item` `item` on(`iths`.`item` = `item`.`item_id`)) join `tbl_resident` `brwd` on(`iths`.`borrowed_by` = `brwd`.`rsdt_id`)) join `tbl_resident` `brf` on(`iths`.`borrowed_from` = `brf`.`rsdt_id`)) left join `tbl_resident` `rtnd` on(`iths`.`returned_by` = `rtnd`.`rsdt_id`)) left join `tbl_resident` `rtt` on(`iths`.`returned_to` = `rtt`.`rsdt_id`)) ORDER BY `iths`.`borrowed_date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_official`
--
DROP TABLE IF EXISTS `vw_official`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_official`  AS SELECT `ofcl`.`ofcl_id` AS `Official ID`, `rsdt`.`rsdt_id` AS `Resident ID`, `ofcl`.`rank` AS `Rank`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`,' ') AS `Name`, `ofcl`.`position` AS `Position`, date_format(`ofcl`.`regs_date`,'%M %d, %Y') AS `Registration Date`, date_format(`ofcl`.`regs_date`,'%Y') AS `Year`, `ofcl`.`ofcl_status` AS `Status`, `ofcl`.`photo` AS `Photo` FROM (`tbl_official` `ofcl` join `tbl_resident` `rsdt` on(`ofcl`.`resident` = `rsdt`.`rsdt_id`)) ORDER BY `ofcl`.`rank` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_resident`
--
DROP TABLE IF EXISTS `vw_resident`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id20904155_user_mayamaya`@`%` SQL SECURITY DEFINER VIEW `vw_resident`  AS SELECT `rsdt`.`rsdt_id` AS `Resident ID`, concat(`rsdt`.`l_name`,', ',`rsdt`.`f_name`,' ',`rsdt`.`ext_name`,' ',left(`rsdt`.`m_name`,1),'.') AS `Name`, concat(`rsdt`.`f_name`,' ',left(`rsdt`.`m_name`,1),'. ',`rsdt`.`l_name`,' ',`rsdt`.`ext_name`) AS `Name_2`, `rsdt`.`gender` AS `Gender`, date_format(`rsdt`.`birthdate`,'%M %d, %Y') AS `Birthdate`, date_format(from_days(to_days(current_timestamp()) - to_days(`rsdt`.`birthdate`)),'%Y') + 0 AS `Age`, `rsdt`.`birthplace` AS `Birthplace`, `rsdt`.`pr_contact` AS `Primary Contact Number`, `rsdt`.`sr_contact` AS `Secondary Contact Number`, `rsdt`.`cvl_status` AS `Civil Status`, `rsdt`.`citizenship` AS `Citizenship`, `rsdt`.`voter_status` AS `Voter Status`, `rsdt`.`occupation` AS `Occupation`, concat(`rsdt`.`hs_num`,' ',`rsdt`.`strt_name`) AS `Address`, date_format(`rsdt`.`regs_date`,'%M %d, %Y') AS `Registration Date`, `rsdt`.`rsdt_status` AS `Resident Status`, `rsdt`.`photo` AS `Photo`, `rsdt`.`f_name` AS `f_name`, `rsdt`.`m_name` AS `m_name`, `rsdt`.`l_name` AS `l_name`, `rsdt`.`ext_name` AS `ext_name`, `rsdt`.`hs_num` AS `hs_num`, `rsdt`.`strt_name` AS `strt_name` FROM `tbl_resident` AS `rsdt` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
