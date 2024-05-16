<?php

include 'login.php';
include 'variables.php';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$userID = $_SESSION['userID'];
$accountID = $_SESSION['accountID'];
$userType = $_SESSION['userType'];
$randomKey = substr(str_shuffle("1234567890"), 0, 6);
date_default_timezone_set('Asia/Manila');
//$CurrentDate = date("l, F j, Y " );
$CurrentDateForDatabase = date("Y-n-j");
$CurrentDate = date("F j, Y");
$CurrentDateNumbered = date("n-j-Y");
$CurrentDate2 = date("jS") . " of " . date("F, Y");
$CurrentYear = date("Y");
$CurrentMonth = date("F");
$CurrentDayDate = date("j");
$CurrentTime = date("h : i : A");

// echo ($userID);
if ($userType == NULL || $userType == NULL) {
    session_destroy();
    header('Location: http://' . $Domain . '/index.php?type=danger&message=User Must Login First');
}

if (isset($_POST['logout'])) {
    session_destroy();

    LogActivity($conn, $randomKey, $accountID, "Logout Successfully");
    header('Location: http://' . $Domain . '/index.php');
}

function PageJump($Domain, $PageType, $PageName, $MsgType, $MsgContent)
{
    if ($MsgType == NULL) {
        header('Location: http://' . $Domain . '/pages/' . $PageType . '/' . $PageName . '');
    } else {
        header('Location: http://' . $Domain . '/pages/' . $PageType . '/' . $PageName . '?type=' . $MsgType . '&message=' . $MsgContent . '');
    }
}

if ($_SESSION['userType'] == 'ADMIN') {
    $Navigation = $AdminNavigation;
} else if ($_SESSION['userType'] == 'Faculty') {
    $Navigation = $FacultyNavigation;
} else if ($_SESSION['userType'] == 'resident') {
    $Navigation = $residentNavigation;
} else {
    $Navigation = '';
}

$GetUserData = mysqli_query($conn, "SELECT * FROM `vw_resident` WHERE `Resident ID` = '$userID'");
if ($userType == 'ADMIN') {
    while ($user = mysqli_fetch_array($GetUserData)) {
        $_SESSION['userGender'] = $user['Gender'];
        $_SESSION['userName'] = $user['Name'];
    }
}

if (isset($_POST['add_resident'])) {
    $Given_name = $_POST['given_name'];
    $Middle_name = $_POST['middle_name'];
    $Last_name = $_POST['last_name'];
    $Ext_name = $_POST['ext_name'];
    $Gender = $_POST['gender'];
    $Birthdate = $_POST['birthdate'];
    $Birthplace = $_POST['birthplace'];
    $Civil_status = $_POST['civil_status'];
    $Citizenship = $_POST['citizenship'];
    $Voter_regs = $_POST['voter_status'];
    $Occupation = $_POST['occupation'];

    $House_number = $_POST['house_num'];
    $Street_Name = $_POST['street_name'];
    $Pr_number = $_POST['pr_number'];
    $Sr_number = $_POST['sr_number'];
    $Senior_PWD_NO = $_POST['Senior_PWD_NO'];

    $Resident_ID = "RSDT-" . $randomKey;
    // $Photo = $_POST['photo'];

    $AttachFile = $Resident_ID . "-" . $_FILES["photo"]["name"];
    $tname = $_FILES["photo"]["tmp_name"];

    #upload directory path
    // $ImageFolder = 'C:\xampp\htdocs\Maya-maya_E-Brgy_System\images\residents';
    $ImageFolder = 'https://mayamaya311.000webhostapp.com/images/residents/';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $ImageFolder . '/' . $AttachFile);

    $AddResident = mysqli_query($conn, "INSERT INTO `tbl_resident`(`rsdt_id`
    , `f_name`
    , `m_name`
    , `l_name`
    , `ext_name`
    , `pr_contact`
    , `sr_contact`
    , `hs_num`
    , `strt_name`
    , `gender`
    , `birthdate`
    , `birthplace`
    , `cvl_status`
    , `citizenship`
    , `voter_status`
    , `occupation`
    , `photo`
    ,`Senior_PWD_NO`
    ) 
    VALUES ('$Resident_ID','$Given_name','$Middle_name','$Last_name','$Ext_name','$Pr_number','$Sr_number'
    ,'$House_number','$Street_Name','$Gender','$Birthdate','$Birthplace','$Civil_status','$Citizenship','$Voter_regs','$Occupation','$AttachFile', '$Senior_PWD_NO')");

    $AddResident = mysqli_query($conn, "INSERT INTO `vw_resident`(`rsdt_id`
    , `f_name`
    , `m_name`
    , `l_name`
    , `ext_name`
    , `pr_contact`
    , `sr_contact`
    , `hs_num`
    , `strt_name`
    , `gender`
    , `birthdate`
    , `birthplace`
    , `cvl_status`
    , `citizenship`
    , `voter_status`
    , `occupation`
    , `photo`
    ,`Senior_PWD_NO`
    ) 
    VALUES ('$Resident_ID','$Given_name','$Middle_name','$Last_name','$Ext_name','$Pr_number','$Sr_number'
    ,'$House_number','$Street_Name','$Gender','$Birthdate','$Birthplace','$Civil_status','$Citizenship','$Voter_regs','$Occupation','$AttachFile', '$Senior_PWD_NO')");


    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Register $ResidentName ($Resident_ID)");
    PageJump($Domain, "forms", "add_resident.php", "success", "Resident is successfully registered");
}

$item = "SELECT * FROM `vw_item`";
$item_list = mysqli_query($conn, $item);
$item_count = mysqli_num_rows($item_list);

$item_history = "SELECT * FROM `vw_item_history`";
$item_history_list = mysqli_query($conn, $item_history);
$item_history_count = mysqli_num_rows($item_history_list);

$blotter_case = "SELECT * FROM `vw_blotters`";
$blotter_list = mysqli_query($conn, $blotter_case);
$blotter_count = mysqli_num_rows($blotter_list);

$incident_case = "SELECT * FROM `vw_incident`";
$incident_list = mysqli_query($conn, $incident_case);
$incident_count = mysqli_num_rows($incident_list);

$resident = "SELECT * FROM `vw_resident` WHERE `Resident Status` = 'active' ORDER BY `Name`";
$resident_list = mysqli_query($conn, $resident);
$resident_count = mysqli_num_rows($resident_list);

$users = "SELECT * FROM `vw_accounts`";
$users_list = mysqli_query($conn, $users);
$users_count = mysqli_num_rows($users_list);

$resident_deleted = "SELECT * FROM `vw_resident` WHERE `Resident Status` = 'deleted' ORDER BY `Name`";
$resident_deleted_list = mysqli_query($conn, $resident_deleted);
$resident_deleted_count = mysqli_num_rows($resident_deleted_list);

$male_resident = "SELECT * FROM `vw_resident` WHERE `Gender` = 'Male'";
$male_resident_list = mysqli_query($conn, $male_resident);
$male_resident_count = mysqli_num_rows($male_resident_list);

$female_resident = "SELECT * FROM `vw_resident` WHERE `Gender` = 'Female'";
$female_resident_list = mysqli_query($conn, $female_resident);
$female_resident_count = mysqli_num_rows($female_resident_list);;

$voter_resident = "SELECT * FROM `vw_resident` WHERE `Voter Status` = 'Registered' AND `Resident Status` = 'active'";
$voter_resident_list = mysqli_query($conn, $voter_resident);
$voter_resident_count = mysqli_num_rows($voter_resident_list);

$activity_logs = "SELECT * FROM `vw_activity_log`";
$activity_logs_list = mysqli_query($conn, $activity_logs);
$activity_logs_count = mysqli_num_rows($activity_logs_list);

if (isset($_POST['change_password'])) {
    $Account_ID = $_POST['account_id'];
    $Resident_ID = $_POST['resident_id'];
    $Old_Pass = $_POST['old_pass'];
    $New_Pass1 = $_POST['new_pass1'];
    $New_Pass2 = $_POST['new_pass2'];

    if ($New_Pass1 == $New_Pass2) {
        $AutheticateAccount = mysqli_query($conn, "SELECT * FROM `vw_accounts` WHERE `Account ID` = '$Account_ID' AND `Password` = '$Old_Pass'");
        if ($AutheticateAccount->num_rows > 0) {
            $ChangePassword = mysqli_query($conn, "UPDATE `tbl_account` 
                SET `password`= '$New_Pass2'
                WHERE `acnt_id` = '$Account_ID'");

            $ResidentName = GetResidentName($conn, $Resident_ID);
            LogActivity($conn, $randomKey, $accountID, "Password Changed for the account of $ResidentName ($Account_ID)");
            PageJump($Domain, "forms", "change_password.php", "success", "Passwrod is successfully changes");
            echo ($Resident_ID);
        } else {
            PageJump($Domain, "forms", "change_password.php", "danger", "Old Password is wrong");
        }
    } else {
        PageJump($Domain, "forms", "change_password.php", "danger", "New Passwords did not match");
    }
}

if (isset($_POST['add_blotter'])) {
    $Date_Time = $_POST['blotter_date_time'];
    $Comp_name = $_POST['comp_name'];
    $Comp_name_address = $_POST['comp_name_address'];

    $Comp_person = $_POST['comp_person'];
    $Comp_person_address = $_POST['comp_person_address'];

    $Description = $_POST['description'];

    $Blotter_ID = "BLTR-" . $randomKey;
    $OfficialName = GetResidentName($conn, $userID);

    $AddBlotterReport = mysqli_query($conn, "INSERT INTO `tbl_blotter`(
        `bltr_id`
        , `bltr_date`
        , `comp_name`
        , `comp_name_address`
        , `comp_person`
        , `comp_person_address`
        , `regs_by`
        , `description`) 
        VALUES (
        '$Blotter_ID'
        ,'$Date_Time'
        , '$Comp_name'
         ,'$Comp_name_address'
         ,'$Comp_person'
         ,'$Comp_person_address'
         ,'$userID'
         ,'$Description')");

    LogActivity($conn, $randomKey, $accountID, "Create Blotter Report $Blotter_ID");
    PageJump($Domain, "tables", "list_report_blotter.php", "info", "Blotter Report is recorded");
}

if (isset($_POST['update_blotter'])) {
    $Blotter_ID = $_POST['blotter_id'];
    $Comp_name = $_POST['comp_name'];
    $Comp_name_address = $_POST['comp_name_address'];

    $Comp_person = $_POST['comp_person'];
    $Comp_person_address = $_POST['comp_person_address'];

    $Description = $_POST['description'];
    $Status = $_POST['status'];

    if ($_POST['status'] == 'settled') {
        $AddBlotterReport = mysqli_query($conn, "UPDATE `tbl_blotter`
        SET `comp_name` = '$Comp_name'
        , `comp_name_address` = '$Comp_name_address'
        , `comp_person` = '$Comp_person'
        , `comp_person_address` = '$Comp_person_address'
        , `description` = '$Description'
        , `status` = '$Status'
        , `date_settled` = '$CurrentDateForDatabase'
        WHERE `bltr_id` = '$Blotter_ID'");
    } else {
        $AddBlotterReport = mysqli_query($conn, "UPDATE `tbl_blotter`
        SET `comp_name` = '$Comp_name'
        , `comp_name_address` = '$Comp_name_address'
        , `comp_person` = '$Comp_person'
        , `comp_person_address` = '$Comp_person_address'
        , `description` = '$Description'
        , `status` = '$Status'
        , `date_settled` = null
        WHERE `bltr_id` = '$Blotter_ID'");
    }

    $OfficialName = GetResidentName($conn, $userID);

    LogActivity($conn, $randomKey, $accountID, "Updated Blotter Report $Blotter_ID");
    PageJump($Domain, "tables", "list_report_blotter.php", "info", "Blotter Report is updated");
}

if (isset($_POST['blotter_settled'])) {
    $Blotter_ID = $_POST['blotter_settled'];

    $updateCase = mysqli_query($conn, "UPDATE `tbl_blotter` 
            SET `status`= 'settled' 
                , `date_settled`= '$CurrentDateForDatabase' 
            WHERE `bltr_id` = '$Blotter_ID'");

    // $ResidentName = GetResidentName($conn, $userID);
    LogActivity($conn, $randomKey, $accountID, "Settled Blotter: <br>  Case ID: $Case_ID");
    PageJump($Domain, "tables", "list_report_blotter.php", "info", "Blotter is settled");
}

if (isset($_POST['add_incident'])) {
    $Date_Time = $_POST['incident_date_time'];
    $Victim_name = $_POST['victim_name'];
    $Victim_address = $_POST['victim_address'];
    $reportedByName = $_POST['reportedByName'];
    $incident_type = $_POST['incident_type'];
    $Incident_location = $_POST['incident_location'];

    $Description = $_POST['description'];

    $Incident_ID = "INCD-" . $randomKey;

    $AddIncidentReport = mysqli_query($conn, "INSERT INTO `tbl_incident`(
        `incd_id`
        , `incd_date_time`
        , `victim_name`
        , `victim_address`
        , `incd_location`
        , `regs_by`
        , `description`
        , `reportedByName`
        ,`incident_type`) 
        VALUES (
        '$Incident_ID'
        ,'$Date_Time'
        , '$Victim_name'
         ,'$Victim_address'
         ,'$Incident_location'
         ,'$userID'
         ,'$Description'
         ,'$reportedByName'
         ,'$incident_type')");

    LogActivity($conn, $randomKey, $accountID, "Create Incident Report $Incident_ID");
    PageJump($Domain, "tables", "list_report_incident.php", "info", "Incident Report is recorded");
}

if (isset($_POST['update_incident'])) {
    $Incident_id = $_POST['incident_id'];
    $Victim_name = $_POST['victim_name'];
    $Victim_address = $_POST['victim_address'];

    $Incd_location = $_POST['incd_location'];

    $Description = $_POST['description'];
    $Status = $_POST['status'];

    if ($_POST['status'] == 'settled') {
        $UpdateIncedentrReport = mysqli_query($conn, "UPDATE `tbl_incident`
        SET `victim_name` = '$Victim_name'
        , `victim_address` = '$Victim_address'
        , `incd_location` = '$Incd_location'
        , `description` = '$Description'
        , `status` = '$Status'
        , `date_settled` = '$CurrentDateForDatabase'
        WHERE `incd_id` = '$Incident_id'");
    } else {
        $AddBlotterReport = mysqli_query($conn, "UPDATE `tbl_incident`
        SET `victim_name` = '$Victim_name'
        , `victim_address` = '$Victim_address'
        , `incd_location` = '$Incd_location'
        , `description` = '$Description'
        , `status` = '$Status'
        , `date_settled` = null
        WHERE `incd_id` = '$Incident_id'");
    }

    LogActivity($conn, $randomKey, $accountID, "Updated Incident Report $Incident_id");
    PageJump($Domain, "tables", "list_report_incident.php", "info", "Incident Report is updated");
}

if (isset($_POST['deactivate_resident'])) {
    $Resident_ID = $_POST['deactivate_resident'];
    $ResidentName = GetResidentName($conn, $Resident_ID);
    $DeacResident = mysqli_query($conn, "UPDATE `tbl_resident` 
                SET `rsdt_status`= 'deleted' 
                WHERE `rsdt_id` = '$Resident_ID'");

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Deactivate resident data of $ResidentName ($Resident_ID)");
    PageJump($Domain, "tables", "list_resident.php", "info", "Resident data is deleted");
}

if (isset($_POST['restore_resident'])) {
    $Resident_ID = $_POST['restore_resident'];
    $DeacResident = mysqli_query($conn, "UPDATE `tbl_resident` 
            SET `rsdt_status`= 'active'
            WHERE `rsdt_id` = '$Resident_ID'");

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Restore resident data of $ResidentName ($Resident_ID)");
    PageJump($Domain, "tables", "list_resident.php", "success", "Resident is successfully restored");
    echo ($Resident_ID);
}

$official = "SELECT * FROM `vw_official` WHERE `Year` = '$CurrentYear'";
$official_list = mysqli_query($conn, $official);
$official_count = mysqli_num_rows($official_list);

if (isset($_POST['generate_ind_cert'])) {
    $Resident_ID = $_POST['res_id'];
    $Purpose = $_POST['purpose'];

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Generate Indigency certificate for $ResidentName ($Resident_ID), Purpose: $Purpose");

    $CertPage = $Admin_Indigency_cert . "?resident=" . $Resident_ID . "&purpose=" . $Purpose;
    header('Location:' . $CertPage);
}


if (isset($_POST['generate_brgy_cert'])) {
    $Resident_ID = $_POST['res_id'];
    $Purpose = $_POST['purpose'];

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Generate Barangay certificate for $ResidentName ($Resident_ID), Purpose: $Purpose");

    $CertPage = $Admin_Brgy_Cert . "?resident=" . $Resident_ID . "&purpose=" . $Purpose;
    header('Location:' . $CertPage);
}

if (isset($_POST['generate_bus_permit'])) {
    $Resident_ID = $_POST['res_id'];
    $Business = $_POST['bus_name'];
    $Location = $_POST['location'];

    // $Cert_Num = 'BSCRT-'.$CurrentDateNumbered.'-'.$Resident_ID;

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Generate Bussiness Permit for $ResidentName ($Resident_ID), <br> Bussiness: $Business, <br> Location: $Location");

    $CertPage = $Admin_Business_permit . '?resident=' . $Resident_ID . '&business=' . $Business . '&location=' . $Location;
    header('Location:' . $CertPage);
}

if (isset($_POST['generate_brgy_clearance'])) {
    $Resident_ID = $_POST['generate_brgy_clearance'];

    // $Cert_Num = 'BSCRT-'.$CurrentDateNumbered.'-'.$Resident_ID;

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Generate Barangay Clearance for $ResidentName ($Resident_ID)");

    $CertPage = $Admin_Barangay_clearance . "?resident=" . $Resident_ID;
    header('Location:' . $CertPage);
}

if (isset($_POST['create_account'])) {
    $Resident_ID = $_POST['resident_id'];
    $Account_Type = 'ADMIN';
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    $Account_ID = "ACNT-" . $randomKey;

    $ResidentName = GetResidentName($conn, $Resident_ID);

    $hashedPassword = md5($_POST['password']);

    $CheckExisitngAccounts = mysqli_query($conn, "SELECT * FROM `vw_accounts` WHERE `Resident ID` = '$Resident_ID' AND `Status` = 'active'");
    $CheckExisitngUsernamePassword = mysqli_query($conn, "SELECT * FROM `vw_accounts` WHERE `Username` = '$Username' AND `Password` = '$Password'");

    if ($CheckExisitngAccounts->num_rows > 0) {
        PageJump($Domain, "tables", "list_users.php", "danger", "User has already have an active account");
    } else if ($CheckExisitngUsernamePassword->num_rows > 0) {
        PageJump($Domain, "tables", "list_users.php", "danger", "Username and Password is already been used");
    } else {
        $AddAccount = mysqli_query($conn, "INSERT INTO `tbl_account`(
            `acnt_id`, `user_resident`, `user_type`, `username`,  `password`) 
            VALUES ('$Account_ID','$Resident_ID', '$Account_Type' ,'$Username','$Password')");
        LogActivity($conn, $randomKey, $accountID, "Created account for $ResidentName ($Resident_ID)");
        PageJump($Domain, "tables", "list_users.php", "success", "Account is successfully registered");
    }
}

if (isset($_POST['delete_account'])) {
    $Account_ID = $_POST['delete_account'];
    $DeleteAccount = mysqli_query($conn, "UPDATE `tbl_account` 
            SET `status`= 'deleted' 
            WHERE `acnt_id` = '$Account_ID'");

    $ResidentName = GetResidentName($conn, $Account_ID);
    LogActivity($conn, $randomKey, $accountID, "Delete account $Account_ID");
    PageJump($Domain, "tables", "list_users.php", "info", "Account is deleted");
}

if (isset($_POST['restore_account'])) {
    $Account_ID = $_POST['restore_account'];
    $DeleteAccount = mysqli_query($conn, "UPDATE `tbl_account` 
            SET `status`= 'active' 
            WHERE `acnt_id` = '$Account_ID'");

    $ResidentName = GetResidentName($conn, $Account_ID);
    LogActivity($conn, $randomKey, $accountID, "restored account $Account_ID");
    PageJump($Domain, "tables", "list_users.php", "info", "Account is restored");
}



if (isset($_POST['updated_resd_data'])) {
    $Resident_ID = $_POST['res_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $ext_name = $_POST['ext_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $birth_place = $_POST['birth_place'];
    $pr_num = $_POST['pr_num'];
    $sr_num = $_POST['sr_num'];
    $hs_num = $_POST['hs_num'];
    $str_name = $_POST['str_name'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $voter_status = $_POST['voter_status'];
    $occupation = $_POST['occupation'];

    $UpdateResident = mysqli_query($conn, "UPDATE `tbl_resident` 
        SET `f_name` = '$f_name'
            , `m_name` = '$m_name'
            , `l_name` = '$l_name'
            , `ext_name` = '$ext_name'
            , `pr_contact` = '$pr_num'
            , `sr_contact` = '$sr_num'
            , `hs_num` = '$hs_num'
            , `strt_name` = '$str_name'
            , `gender` = '$gender'
            , `birthdate` = '$birth_date'
            , `birthplace` = '$birth_place'
            , `cvl_status` = '$civil_status'
            , `citizenship` = '$citizenship'
            , `voter_status` = '$voter_status'
            , `occupation` = '$occupation'
        WHERE `rsdt_id` = '$Resident_ID'");

    $ResidentName = GetResidentName($conn, $Resident_ID);
    LogActivity($conn, $randomKey, $accountID, "Update resident data of $ResidentName ($Resident_ID)");
    PageJump($Domain, "tables", "list_resident.php", "info", "Resident data is updated");
}

if (isset($_POST['add_item'])) {
    $Name = $_POST['name'];
    $Description = $_POST['description'];
    $Qty = $_POST['qty'];
    $randomKey = substr(str_shuffle("1234567890"), 0, 6);
    $Item_ID = "ITEM-" . $randomKey;
    $userID = $_SESSION['userID'];

    $AddItem = mysqli_query($conn, "INSERT INTO `tbl_item`(
        `item_id`, `name`, `description`, `updated_qty`, `original_qty`, `regs_by`) 
        VALUES ('$Item_ID','$Name', '$Description' ,'$Qty','$Qty','$userID')");

    if ($AddItem) {
        // Check if any rows were affected by the insert operation
        if (mysqli_affected_rows($conn) > 0) {
            LogActivity($conn, $randomKey, $accountID, "Added new Barangay Equipment: $Name");
            PageJump($Domain, "tables", "list_items.php", "success", "Item is successfully registered");
        } else {
            // No rows were affected, handle the case if required
            echo "Error: No rows were inserted.";
        }
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_item'])) {
    $Item_ID = $_POST['item_id'];
    $Item_Name = $_POST['upd_name'];
    $Description = $_POST['upd_description'];
    $Qty = $_POST['upd_qty'];

    $UpdateItemData = mysqli_query($conn, "UPDATE `tbl_item` 
    SET `name` = '$Item_Name'
        , `description` = '$Description'
        , `original_qty` = '$Qty'
    WHERE `item_id` = '$Item_ID'");

    LogActivity($conn, $randomKey, $accountID, "Update Item details $Item_Name");
    PageJump($Domain, "tables", "list_items.php", "info", "Item details successfully updated");
}

if (isset($_POST['borrow_item'])) {
    $Item_ID = $_POST['item_id'];
    $Item_Name = $_POST['item_name'];
    $Date_time = $_POST['date_time'];
    $Borrower = $_POST['borrower'];
    $Purpose = $_POST['purpose'];

    $Current_quantity = $_POST['cur_quantity'];
    $Borrow_quantity = $_POST['quantity'];
    $New_quantity = $Current_quantity - $Borrow_quantity;


    $Borrowing_ID = "ITHS-" . $randomKey;

    if ($Borrow_quantity > $Current_quantity) {
        PageJump($Domain, "tables", "list_items.php", "warning", "No enough item quantity");
    } else if ($Borrow_quantity <= 0) {
        PageJump($Domain, "tables", "list_items.php", "warning", "Invalid borrowed quantity");
    } else {
        $UpdateItemData = mysqli_query($conn, "UPDATE `tbl_item` 
            SET `updated_qty` = '$New_quantity'
            WHERE `item_id` = '$Item_ID'");

        $AddBarrowRecord = mysqli_query($conn, "INSERT INTO `tbl_item_history`(
            `iths_id`, `item`, `qty`, `purpose`, `borrowed_date`, `borrowed_by`, `borrowed_from`) 
            VALUES ('$Borrowing_ID','$Item_ID', '$Borrow_quantity' ,'$Purpose','$Date_time','$Borrower','$userID')");

        $BorrowerName = GetResidentName($conn, $Borrower);
        LogActivity($conn, $randomKey, $accountID, "Borrowed $Item_Name,  Borrowed by $BorrowerName ($Borrower)");
        PageJump($Domain, "tables", "list_items.php", "info", "Borrowed item is recorded");
    }
}

if (isset($_POST['return_item'])) {
    $History_ID = $_POST['borrowing_id'];
    $Item_ID = $_POST['item_id'];
    $Item_Name = $_POST['item_name'];

    $Date_time = $_POST['date_time'];
    $Returner = $_POST['returned_by'];

    $Current_quantity = $_POST['cur_qty'];
    $Returned_quantity = $_POST['rtn_qty'];
    $New_quantity = $Current_quantity + $Returned_quantity;

    $UpdateItemData = mysqli_query($conn, "UPDATE `tbl_item` 
        SET `updated_qty` = '$New_quantity'
        WHERE `item_id` = '$Item_ID'");


    $UpdateItemHistory = mysqli_query($conn, "UPDATE `tbl_item_history` 
        SET `returned_date` = '$Date_time'
            , `returned_by` = '$Returner'
            , `returned_to` = '$userID'
            , `status` = 'returned'
        WHERE `iths_id` = '$History_ID'");

    $ReturnerName = GetResidentName($conn, $Returner);
    LogActivity($conn, $randomKey, $accountID, "Returned $Item_Name,  Returned by $ReturnerName ($Returner)");
    PageJump($Domain, "tables", "list_items_history.php", "info", "Returbned item is recorded");
}

function LogActivity($conn, $randomKey, $accountID, $activity)
{
    $actLog_ID = "ACLG-" . $randomKey;

    $ActivityLog = mysqli_query($conn, "INSERT INTO `tbl_activity_log`(
        `aclg_id`, `user_account`, `activity`) 
        VALUES ('$actLog_ID','$accountID','$activity')");
}

function GetResidentName($conn, $residentID)
{
    $resData = mysqli_query($conn, "SELECT * FROM `vw_resident` WHERE `Resident ID` = '$residentID' LIMIT 1");
    //$resData_list = mysqli_query($conn,$resData);
    while ($data = mysqli_fetch_array($resData)) {
        $resName = $data['Name_2'];
        return $resName;
    }
}
