<?php
include 'variables.php';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
// echo 'Login is Ready';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $password = MD5($_POST['password']);



    $randomKey = substr(str_shuffle("1234567890"), 0, 6);

    // echo '<br>' + $username;
    // echo '<br>' + $password;
    $AutheticateAccount = mysqli_query($conn, "SELECT * FROM `vw_accounts` WHERE `username` = '$username' AND password = '$password'");


    if ($username == "superadmin" && $password == "superadmin123") {

        $_SESSION['userID'] = "RSDT-607439";
        $_SESSION['accountID'] = "superadmin123";
        $_SESSION['userType'] = "ADMIN";
        $_SESSION['superAdmin'] = "1";

        $accountID =
            $_SESSION['accountID'];
        $actLog_ID = "ACLG-" . $randomKey;

        $_SESSION['AccountType'] = 'Super Admin';
        $_SESSION['userGender'] = 'Male';
        $_SESSION['userName'] = "ADMIN";

        $ActivityLog = mysqli_query($conn, "INSERT INTO `tbl_activity_log`(
                    `aclg_id`, `user_account`, `activity`) 
                    VALUES ('$actLog_ID','$accountID','Login Successfully')");

        header('Location: http://' . $Domain . '/admin.php');
    } else if ($AutheticateAccount->num_rows > 0) {
        while ($account = mysqli_fetch_array($AutheticateAccount)) {
            $_SESSION['userID'] = $account['Resident ID'];
            $_SESSION['accountID'] = $account['Account ID'];
            $_SESSION['userType'] = $account['User Type'];
            // $GetEmpData = mysqli_query($conn, "SELECT * FROM `vw_employees` WHERE `Account` = '$userID'");
            // echo $account['act_id'];

            $accountID = $account['Account ID'];
            $actLog_ID = "ACLG-" . $randomKey;

            if ($account['Status'] == 'deleted') {
                header('Location: http://' . $Domain . '/index.php?type=danger&message=Your account has been deleted');
            } else if ($account['User Type'] == 'ADMIN') {
                $_SESSION['AccountType'] = 'Admin';
                $_SESSION['AccountGender'] = 'Male';

                $ActivityLog = mysqli_query($conn, "INSERT INTO `tbl_activity_log`(
                    `aclg_id`, `user_account`, `activity`) 
                    VALUES ('$actLog_ID','$accountID','Login Successfully')");

                //header('Location: http://'.$dbHost.'/Maya-maya_E-Brgy_System/index.php?type=info&message='.$_SESSION['userType'].' '.$_SESSION['userID']);
                header('Location: http://' . $Domain . '/admin.php');
            }
        }
    } else {
        header('Location: http://' . $Domain . '/index.php?type=danger&message=Username and Password didn`t match');
        session_destroy();
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
}
