<!DOCTYPE html>
<?php 
  include 'php/variables.php';
  include 'php/login.php';
  // include 'php/config.php';
  
  $Login = "http://".$Domain."/index.php";

  if(isset($_POST['reset_pass'])){
    $Resident_ID = $_POST['resd_id'];
    $FindAccount = mysqli_query($conn, "SELECT * FROM `vw_accounts` WHERE `Official ID` = '$Resident_ID'");
    echo "reset_password";

    if ($FindAccount->num_rows>0) { 
        while ($itm=$FindAccount-> fetch_assoc()){
        $resd_id = $itm['Resident ID'];
        $DeleteAccount = mysqli_query($conn, "UPDATE `tbl_account` 
            SET `status`= 'active' 
                , username = '$Resident_ID'
                , password = 'password'
        WHERE `user_resident` = '$resd_id'");
        }
    // PageJump($Domain, "tables", "list_users.php", "success", "Default Username and Password has been restored!");
        header('Location: http://'.$Domain.'/index.php?type=success&message=Default Username and Password has been restored!');
        echo "correct";
    } else {
        header('Location: http://'.$Domain.'/forgot_password.php?type=danger&message=Invalid Barangay Official ID!');
        echo "wrong";
    
    }

}
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mama-maya | Forgot Password</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style_v3.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo_v1.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo d-flex">
                <img src="images/logo_v2_blk.png" alt="logo" style="width: 100%;">
              </div>
              <h4>Password Reset</h4>
              <h6 class="font-weight-light">Use your Barangay Official ID to reset your password</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Barangay Official ID</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" 
                      name="resd_id" 
                      placeholder="Barangay Official ID"
                      required>
                  </div>
                </div>
                
                <?php if (isset($_GET['message'])){?>
                  <div class="border p-2 mb-2 border-<?php echo $_GET['type'];?> text-<?php echo $_GET['type'];?> text-center">
                    <?php echo $_GET['message'];?>
                  </div>
                <?php } ?>
                <div class="my-3">
                  <button type="submit" value="submit" name="reset_pass" class="btn btn-block btn-warning">
                    Reset Password
                  </button>
                </div>
                <a href="<?=$Login?>" class="btn btn-block btn-success">Login</a>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>  
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>
