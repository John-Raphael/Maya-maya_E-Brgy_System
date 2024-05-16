<!DOCTYPE html>
<?php
include '../../php/config.php';
include '../../php/variables.php';
// include 'php/config.php';
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Maya-maya E-Brgy System | Resident List</title>
  <!-- base:css -->
  <?= $TablePlugins ?>
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
            <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_v2_wht.png" alt="logo" height="60" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_v2_wht.png" alt="logo" height="80" /></a>
          </div>
          <ul class="navbar-nav navbar-nav-right">
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
          <div class="row d-none">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body pb-3 pt-3">
                  <h4 class="card-title m-0">Rresident | List</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> <!-- searh bar -->
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="input-group d-flex flex-row-reverse">
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(7)" placeholder="search resident id or resident name">
                          <div class="input-group-append">
                            <span onclick="toggleSearch()" class="input-group-text text-light pl-5 pr-5" style="background-color: rgb(91, 178, 235);">
                              <i class="icon-search"></i> Search
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%"> Resident ID </th>
                          <th width="15%"> Name </th>
                          <th width="10%"> Gender </th>
                          <th width="10%"> Age </th>
                          <th width="20%"> Address </th>
                          <th width="20%"> Voter Status</th>
                          <th width="15%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">


                        <tbody id="dataTable"> <?php if ($resident_list->num_rows > 0) {
                                                  while ($rsd = $resident_list->fetch_assoc()) {

                                                    // print_r($rsd);

                                                    if ($rsd['Resident Status'] == 'active') {
                                                      $status = 'badge-success';
                                                    } else if ($rsd['Resident Status'] == 'UNAVAILABLE' || $rsd['Resident Status'] == 'WARNING STATUS') {
                                                      $status = 'badge-warning';
                                                    } else if ($rsd['Resident Status'] == 'deleted' || $rsd['Resident Status'] == 'HONORABLE DISMISSAL') {
                                                      $status = 'badge-danger';
                                                    } else {
                                                      $status = 'badge-info';
                                                    }
                                                ?>
                              <tr>
                                <td><label class="badge d-block pt-1 pb-1 m-0 badge-info"><?= $rsd['Resident ID'] ?></label>
                                  <label class="badge d-block pt-1 pb-1 m-0 <?= $status ?>"><?= $rsd['Resident Status'] ?></label>
                                </td>
                                <td><?= $rsd['Name'] ?>
                                </td>
                                <td>
                                  <?= $rsd['Gender'] ?>
                                </td>
                                <td>
                                  <?= $rsd['Age'] ?>
                                </td>
                                <td>
                                  <?= $rsd['Address'] ?>
                                </td>
                                <td>
                                  <?= $rsd['Voter Status'] ?>
                                </td>

                                <?php
                                                    $residentID = mysqli_real_escape_string($conn, $rsd['Resident ID']);
                                                    $query = "SELECT Senior_PWD_NO FROM tbl_resident where rsdt_id = '$residentID'";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                      // Fetch associative array
                                                      $row = mysqli_fetch_assoc($result);
                                                    } else {
                                                      // Query failed
                                                      echo "Error: " . mysqli_error($conn);
                                                    }



                                                    $row['Senior_PWD_NO'];
                                ?>

                                <td class="text-center">
                                  <button type="button" class="btn btn-info btn-icon m-0 view" data-toggle="modal" data-target="#ViewModal" data-senior-pwd-no="<?php echo htmlspecialchars($row['Senior_PWD_NO']); ?>">
                                    <i class="mdi mdi-eye"></i>
                                  </button>
                                  </button><button type="submit" class="btn btn-danger btn-icon m-0" value="<?= $rsd['Resident ID'] ?>" name="deactivate_resident">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Resident ID'] ?>
                                  <?= $rsd['Name'] ?>
                                </td>

                                <!-- Col 7 -->
                                <td class="d-none">
                                  <?= $rsd['Resident ID'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Registration Date'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['f_name'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['m_name'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['l_name'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['ext_name'] ?>
                                </td>

                                <td class="d-none">
                                  <?= $rsd['Gender'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Birthdate'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Birthplace'] ?>
                                </td>

                                <td class="d-none">
                                  <?= $rsd['Primary Contact Number'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Secondary Contact Number'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['hs_num'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['strt_name'] ?>
                                </td>

                                <td class="d-none">
                                  <?= $rsd['Civil Status'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Citizenship'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Voter Status'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Occupation'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $rsd['Photo'] ?>
                                </td>

                              </tr>
                            <?php }
                                                } else { ?>
                            <div class="p-3 mb-2 bg-info text-white text-center">
                              No data Recorded
                            </div>
                          <?php } ?>
                        </tbody>
                      </form>
                    </table>
                  </div>
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

<div class="modal fade" id="ViewModal" role="dialog">
  <div class="modal-dialog modal-xl">
    <!-- Modal content-->
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Resident Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group row border border-dark">
                  <img id="resident_photo" src="" alt="Resident Photo" width="100%">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label pt-0 pb-0">Resident ID</label> <br>
                    <input type="text" class="form-control" name="res_id" id="res_id" required readonly />
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label pt-0 pb-0">Registration Date</label><br>
                    <input type="text" class="form-control" name="res_date" id="res_date" required readonly />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">First Name <span class="text-danger">*</span></label> <br>
                    <input type="text" class="form-control" name="f_name" id="f_name" required />
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">Middle Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="m_name" id="m_name" required />
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">Last Name <span class="text-danger">*</span></label> <br>
                    <input type="text" class="form-control" name="l_name" id="l_name" required />
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">Extension Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="ext_name" id="ext_name" />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">Gender <span class="text-danger">*</span></label> <br>
                    <div class="col-sm-12">
                      <select class="form-control" id="gender" name="gender">
                        <option value="">select your answer</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label pt-0 pb-0">Birthdate <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="birth_date" id="birth_date" required disabled />
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label pt-0 pb-0">Birthplace <span class="text-danger">*</span></label> <br>
                    <input type="text" class="form-control" name="birth_place" id="birth_place" required />
                  </div>
                  <div class="col-sm-3">
                  </div>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Contact Number <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="pr_num" id="pr_num" required />
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Secondary Contact Number</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="sr_num" id="sr_num" required />
                  </div>
                </div>
              </div> -->
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">House Number <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="hs_num" id="hs_num" required />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Street Name <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="str_name" id="str_name" required />
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <label class="col-form-label pt-0 pb-0">Senior/PWD/NO<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="Senior/PWD/NO" id="seniorc" required disabled />
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Civil Status <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-control" id="civil_status" name="civil_status" required>
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
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Citizenship <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="citizenship" id="citizenship" required />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Voter Status <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-control" id="voter_status" name="voter_status" required>
                      <option value="">select your answer</option>
                      <option value="Registered">Registered</option>
                      <option value="Not Registered">Not Registered</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Occupation</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="occupation" id="occupation" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info btn-icon-text" value="submit" name="updated_resd_data">
                <i class="mdi mdi-lead-pencil btn-icon-prepend"></i>
                Update Resident Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.view', function() {
      $tr = $(this).closest("tr");

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      var seniorPWDNo = $(this).data('senior-pwd-no');

      $('#res_id').val(data[8].trim());
      $('#res_date').val(data[9].trim());
      $('#f_name').val(data[10].trimStart().trimEnd());
      $('#m_name').val(data[11].trimStart().trimEnd());
      $('#l_name').val(data[12].trimStart().trimEnd());
      $('#ext_name').val(data[13].trimStart().trimEnd());
      $('#gender').val(data[14].trimStart().trimEnd());
      $('#birth_date').val(data[15].trimStart().trimEnd());
      $('#birth_place').val(data[16].trimStart().trimEnd());
      $('#pr_num').val(data[17].trimStart().trimEnd());
      $('#sr_num').val(data[18].trimStart().trimEnd());
      $('#hs_num').val(data[19].trimStart().trimEnd());
      $('#str_name').val(data[20].trimStart().trimEnd());

      $('#civil_status').val(data[21].trimStart().trimEnd());

      // console.log(seniorPWDNo);

      $('#citizenship').val(data[22].trimStart().trimEnd());
      $('#voter_status').val(data[23].trimStart().trimEnd());
      $('#occupation').val(data[24].trimStart().trimEnd());
      // $('#resident_photo').src='../../images/residents/RSDT-362547-face2.jpg';
      $('#resident_photo').attr('src', '../../images/residents/' + data[14].trimStart().trimEnd() + '.png');
      // $('#Senior/PWD/NO').val(data[25].trimStart().trimEnd());

      // Update modal content with the Senior_PWD_NO value
      $('#seniorc').val(seniorPWDNo);
    });
  });
</script>

<script>
  function SearchData(dataCol) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchKeyword");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[dataCol];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

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