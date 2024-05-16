<!DOCTYPE html>
<?php
include 'php/variables.php';
include 'php/login.php';
// include 'php/config.php';
$Forgot_password = "http://" . $Domain . "/forgot_password.php";
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mama-maya | Login</title>
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
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Login to continue.</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="username" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" placeholder="Password" required>
                  </div>
                </div>

                <?php if (isset($_GET['message'])) { ?>
                  <div class="border p-2 mb-2 border-<?php echo $_GET['type']; ?> text-<?php echo $_GET['type']; ?> text-center">
                    <?php echo $_GET['message']; ?>
                  </div>
                <?php } ?>
                <div class="my-3">
                  <button type="submit" name="login" class="btn btn-block btn-success">
                    LOGIN
                  </button>
                </div>

                <div class="my-2 d-flex justify-content-end align-items-center">
                  <a href="<?= $Forgot_password ?>" class="auth-link text-black text-right">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023 All rights reserved.</p>
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