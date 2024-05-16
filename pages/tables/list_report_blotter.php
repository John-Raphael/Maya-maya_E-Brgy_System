<!DOCTYPE html>
<?php
include '../../php/config.php';
include '../../php/variables.php';
// include 'php/config.php';
// Construct the SQL query to select only the name column
$query = "SELECT * FROM tbl_resident where l_name <> 'Superadmin'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
  // Initialize an empty array to store names
  $names = array();

  // Fetch associative array
  while ($row = mysqli_fetch_assoc($result)) {
    // Store each name in the array
    $names[] = $row["f_name"] .  $row["m_name"] . "." .  $row["l_name"];
  }

  // Output the names array (optional)
  // print_r($names);
} else {
  // Query failed
  echo "Error: " . mysqli_error($conn);
}



?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Maya-maya E-Brgy System | Blotter Report</title>
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
                  <h4 class="card-title m-0">Resident | List</h4>
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
                      <div class="col-sm-8">
                        <div class="input-group d-flex flex-row-reverse">
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(0)" placeholder="Search Blotter ID or Blotter status">
                          <div class="input-group-append">
                            <span onclick="toggleSearch()" class="input-group-text text-light pl-5 pr-5" style="background-color: rgb(91, 178, 235);">
                              <i class="icon-search"></i> Search
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddModal">
                          <i class="mdi mdi-plus"></i>
                          Add Blotter Report
                        </button>
                      </div>
                    </div>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-stripped">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%"> Case ID </th>
                          <th width="20%"> Reported </th>
                          <th width="20%"> Accusation </th>
                          <th width="20%"> Person to Suspect</th>
                          <th width="20%"> Reported by</th>
                          <th width="20%"> Status</th>
                          <th width="10%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                        <tbody id="dataTable"> <?php if ($blotter_list->num_rows > 0) {
                                                  while ($case = $blotter_list->fetch_assoc()) {
                                                    if ($case['Status'] == 'settled') {
                                                      $status = 'badge-success';
                                                      $settled_btn = "d-none";
                                                      $return_btn = "d-none";
                                                      $view_btn = "d-block";
                                                    } else if ($case['Status'] == 'ongoing') {
                                                      $status = 'badge-warning';
                                                      $settled_btn = "d-block";
                                                      $return_btn = "d-none";
                                                      $view_btn = "d-none";
                                                    } else {
                                                      $status = 'badge-warning';
                                                    }
                                                ?>
                              <tr>
                                <td><label class="badge d-block pt-1 pb-1 m-0 badge-info"><?= $case['Blotter ID'] ?></label>
                                  <label class="badge d-block pt-1 pb-1 m-0 <?= $status ?>"><?= $case['Status'] ?></label>
                                </td>
                                <td>
                                  Date: <?= $case['Blotter Date'] ?> <br><br>
                                  Time: <?= $case['Blotter Time'] ?>
                                </td>
                                <td>
                                  Name: <?= $case['Comp Name'] ?> <br> <br>
                                  Address: <?= $case['Comp Name Address'] ?>
                                </td>
                                <td>
                                  Name: <?= $case['Comp Person'] ?> <br> <br>
                                  Address: <?= $case['Comp Person Address'] ?>
                                </td>
                                <td>
                                  Name: <?= $case['Comp Person'] ?> <br> <br>
                                  Address: <?= $case['Comp Person Address'] ?>
                                </td>
                                <td>
                                  Status: <?= $case['Status'] ?><br><br>
                                  Date Settled: <?= $case['Date Settled'] ?>
                                </td>
                                <td class="text-right">
                                  <button type="button" class="btn btn-info m-0 view_btn" data-toggle="modal" data-target="#ViewModal">
                                    View
                                  </button>
                                </td>

                                <!-- Col 6 -->
                                <td class="d-none">
                                  <?= $case['Blotter ID'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Blotter Date'] ?>, <?= $case['Blotter Time'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Status'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Comp Name'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Comp Name Address'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Comp Person'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Comp Person Address'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Description'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $case['Date Settled'] ?>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Blotter Report Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Barangay Case ID: <span class="text-danger">*</span> </label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="blotter_id" id="blotter_id" readonly required />
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Reported: <span class="text-danger">*</span> </label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="blotter_date_time" id="blotter_date_time" readonly required />
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Update Status: <span class="text-danger">*</span> </label>
                  <div class="col-sm-12">
                    <select class="form-control" id="status" name="status" required>
                      <option value="">select your answer</option>
                      <option value="ongoing">ongoing</option>
                      <option value="settled">settled</option>
                      <option value="new">new</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Name of Complainant: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_name" id="comp_name" required />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Address of Complainant: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_name_address" id="comp_name_address" required />
                  </div>
                </div>
              </div>
            </div> -->

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Accusation: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_person" id="comp_person" required />
                  </div>
                </div>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Suspect's Name: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_person" id="comp_person" required />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Suspect's Address: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_person_address" id="comp_person_address" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Statement: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" cols="50" class="form-control" name="description" id="description" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Reported by: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" cols="50" class="form-control" name="description" id="description" required></textarea>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Current Status: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="cur_status" readonly required />
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Date Settled: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="date_settled" id="date_settled" readonly required />
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" value="submit" name="update_blotter" class="btn btn-success btn-icon-text">
            <i class="mdi mdi-check btn-icon-prepend"></i>
            Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



<div class="modal fade" id="AddModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Blotter Report Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Reported: <span class="text-danger">*</span> </label>
                  <div class="col-sm-12">
                    <input type="datetime-local" value="" class="form-control" name="blotter_date_time" required />
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Name of Complainant: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_name" required />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Address of Complainant: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_name_address" required />
                  </div>
                </div>
              </div>
            </div> -->

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Accusation: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" cols="50" class="form-control" name="description" required></textarea>
                  </div>
                </div>
              </div>
            </div>


            <br>
           

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Suspect's Name: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_person" required />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Suspect's Address: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="comp_person_address" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Statement: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" cols="50" class="form-control" name="description" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Reported by: <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" cols="50" class="form-control" name="description" required></textarea>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" value="submit" name="add_blotter" class="btn btn-success btn-icon-text">
            <i class="mdi mdi-check btn-icon-prepend"></i>
            Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.view_btn', function() {
      $tr = $(this).closest("tr");

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#blotter_id').val(data[6].trim().trimEnd());
      $('#blotter_date_time').val(data[7].trim().trimEnd());
      $('#status').val(data[8].trim().trimEnd());
      $('#cur_status').val(data[8].trim().trimEnd());
      $('#comp_name').val(data[9].trim().trimEnd());
      $('#comp_name_address').val(data[10].trim().trimEnd());
      $('#comp_person').val(data[11].trim().trimEnd());
      $('#comp_person_address').val(data[12].trim().trimEnd());
      $('#description').val(data[13].trim().trimEnd());
      $('#date_settled').val(data[14].trim().trimEnd());
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