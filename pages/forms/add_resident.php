<!DOCTYPE html>
<?php
include '../../php/variables.php';
// include '../../php/login.php';
include '../../php/config.php';


// Select data from the table
$sql = "SELECT * FROM `streets`";
$result = $conn->query($sql);

$streetsInfoArray = array();

if ($result->num_rows > 0) {
  // Fetch associative array of the result set
  while ($row = $result->fetch_assoc()) {
    $streetsInfoArray[] = $row;
  }
} else {
  echo "0 results";
}


?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mama-maya | Add Resident</title>
  <!-- base:css -->
  <?= $FormPlugins ?>
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?= $Navigation ?>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_v2_wht.png" height="50" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_v2.png" alt="logo" /></a>
          </div>
          <h4 class="font-weight-bold mb-0 d-none mt-1">Barangay 31, Maya-maya,Cavite City, </h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none">Mar 12, 2019 - Apr 10, 2019</h4>
            </li>
            <li class="nav-item dropdown mr-2">
              <a class="border nav-link dropdown-toggle bg-light p-2 text-dark" id="profileDropdown" href="#" data-toggle="dropdown">
                <img class="mr-1" src="../../images/faces/<?= $_SESSION['userGender'] ?>.png" height="30px" alt="profile" />
                <span class="nav-profile-name pl-1"><?= $_SESSION['userName'] ?> | <?= $_SESSION['userType'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <form class="pt-3" action="" method="POST">
                  <button type="submit" class="dropdown-item" name="logout">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </button>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php if (isset($_GET['message'])) { ?>
            <div class="border p-2 bg-light mb-2 border-<?php echo $_GET['type']; ?> text-<?php echo $_GET['type']; ?> text-center">
              <?php echo $_GET['message']; ?>
            </div>
          <?php } ?>

          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Resident Registration Form</h4>
                  <form class="form-sample" action="../../php/config.php" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Given Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="given_name" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Middle Name </label>
                            <input type="text" class="form-control" name="middle_name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Extention Name</label>
                            <input type="text" class="form-control" name="ext_name" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Sex <span class="text-danger">*</span></label>
                            <select class="form-control" name="gender">
                              <option value="">select your answer</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Birhtdate <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="birthdate" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Birhtplace <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="birthplace" required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Civil Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="civil_status" required>
                              <option value="">select your answer</option>
                              <option value="Married">Married</option>
                              <option value="Single">Single</option>
                              <option value="Widowed">Widowed</option>
                              <option value="Divorced">Divorced</option>
                              <option value="Separated">Separated</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Citizenship<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="citizenship" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Occupation</label>
                            <input type="text" class="form-control" name="occupation" required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Resident Photo<span class="text-danger">*</span></label>
                            <input type="file" class="form-control col-md-12" name="photo" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Voter Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="voter_status" required>
                              <option value="">select your answer</option>
                              <option value="Registered">Registered</option>
                              <option value="Not Registered">Not Registered</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Senior/PWD/NO <span class="text-danger">*</span></label>
                            <select class="form-control" name="Senior_PWD_NO" required>
                              <option value="">select your answer</option>
                              <option value="Senior">Senior</option>
                              <option value="PWD">PWD</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <p class="card-description">
                      Address/Location Details
                    </p>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">House Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="house_num" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">

                            <label class="mb-2">Street Name <span class="text-danger">*</span></label>
                            <select class="form-control" name="street_name" required>
                              <option value="">select your answer</option>
                              <?php foreach ($streetsInfoArray as $key => $data) : ?>
                                <option value="<?= $data['street_name']; ?>"><?= $data['street_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <!-- <div class="col-sm-12">
                            <label class="mb-2">Street Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="street_name" required />
                          </div> -->
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Primary Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pr_number" required />
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Secondary Number</label>
                            <input type="text" class="form-control" name="sr_number" required />
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <p class="card-description text-danger d-none">
                      Note: Put "N/A" if not applicable
                    </p>
                    <div class="row text-right">
                      <div class="col-md-12">
                        <button type="reset" class="btn btn-info btn-icon-text">
                          <i class="mdi mdi-reload btn-icon-prepend"></i>
                          Reset
                        </button>
                        <button type="submit" class="btn btn-success btn-icon-text" name="add_resident">
                          <i class="mdi mdi-file-check btn-icon-prepend"></i>
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <?= $Footer ?>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

<script type="text/javascript">
  function loadDoc() {
    setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("pending_item").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../../php/count_items_pending.php", true);
      xhttp.send();

    }, 500);


  }
  loadDoc();
</script>

</html>