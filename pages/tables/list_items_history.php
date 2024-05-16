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
  <title>Maya-maya E-Brgy System | Return Items</title>
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
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(1)" placeholder="search date">
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
                    <table class="table table-stripped">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%"> Borrowing ID </th>
                          <th width="15%"> Time Picker </th>
                          <th width="20%"> Item </th>
                          <th width="5%"> Quantity</th>
                          <th width="20%"> Purpose</th>
                          <th width="20%"> Borrow Details</th>
                          <th width="10%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                        <tbody id="dataTable"> <?php if ($item_history_list->num_rows > 0) {
                                                  while ($itm = $item_history_list->fetch_assoc()) {
                                                    if ($itm['Status'] == 'returned') {
                                                      $status = 'badge-success';
                                                      $return_btn = "d-none";
                                                      $view_btn = "d-block";
                                                    } else if ($itm['Status'] == 'pending') {
                                                      $status = 'badge-warning';
                                                      $return_btn = "d-block";
                                                      $view_btn = "d-none";
                                                    } else {
                                                      $status = 'badge-warning';
                                                    }
                                                ?>
                              <tr>
                                <td><label class="badge d-block pt-1 pb-1 m-0 badge-info"><?= $itm['History ID'] ?></label>
                                  <label class="badge d-block pt-1 pb-1 m-0 <?= $status ?>"><?= $itm['Status'] ?></label>
                                </td>
                                <td>
                                  Date: <?= $itm['Borrowed Date'] ?> <br><br>
                                  Time: <?= $itm['Borrowed Time'] ?>
                                </td>
                                <td>
                                  <?= $itm['Name'] ?> <br> <br>
                                  - <?= $itm['Description'] ?>
                                </td>
                                <td>
                                  <?= $itm['Borrowed Qty'] ?>
                                </td>
                                <td>
                                  <?= $itm['Purpose'] ?>
                                </td>
                                <td>
                                  Borrowed from: <?= $itm['Borrowed from'] ?><br><br>
                                  Borrowed by: <?= $itm['Borrowed by'] ?>
                                </td>
                                <td class="text-right">
                                  <button type="button" class="btn btn-success m-0 <?= $return_btn ?> return_btn" data-toggle="modal" data-target="#ReturnModal">
                                    Return
                                  </button>
                                  <button type="button" class="btn btn-info m-0 <?= $view_btn ?> view_btn" data-toggle="modal" data-target="#ViewModal">
                                    View
                                  </button>
                                </td>

                                <!-- Col 7 -->
                                <td class="d-none">
                                  <?= $itm['History ID'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $itm['Item Qty'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $itm['Item ID'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $itm['Name'] ?> (<?= $itm['Description'] ?>)
                                </td>

                                <!-- Col 11 -->
                                <td class="d-none">
                                  <?= $itm['Returned Date'] ?>, <?= $itm['Returned Time'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $itm['Returned by'] ?>
                                </td>
                                <td class="d-none">
                                  <?= $itm['Returned to'] ?>
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


<div class="modal fade" id="ReturnModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Return Request Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row d-none">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Borrowing ID <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="borrowing_id" id="borrowing_id" readonly required />
                    <input type="text" class="form-control" name="item_id" id="item_id" readonly required />
                    <input type="text" class="form-control" name="cur_qty" id="cur_qty" readonly required />
                    <input type="text" class="form-control" name="rtn_qty" id="rtn_qty" readonly required />
                    <input type="text" class="form-control" name="item_name" id="item_name" readonly required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Time Picker<span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="datetime-local" value="" class="form-control" name="date_time" id="date_time" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Returned by <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-control" id="returned_by" name="returned_by" required>
                      <option value="">select your answer</option>
                      <?php if ($resident_list->num_rows > 0) {
                        while ($res = $resident_list->fetch_assoc()) { ?>
                          <option value="<?= $res['Resident ID'] ?>"><?= $res['Name'] ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-icon-text" value="submit" name="return_item">
            <i class="mdi mdi-check btn-icon-prepend"></i>
            Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="ViewModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Return Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Time Picker:</label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="return_date_time" id="return_date_time" readonly required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Returned by:</label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="return_by" id="return_by" readonly required />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Returned to:</label>
                  <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="return_to" id="return_to" readonly required />
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary btn-icon-text" data-dismiss="modal" aria-label="Close">
            <i class="mdi mdi-close btn-icon-prepend"></i>
            Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.return_btn', function() {
      $tr = $(this).closest("tr");

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#borrowing_id').val(data[7].trim().trimEnd());
      $('#cur_qty').val(data[8].trim().trimEnd());
      $('#item_id').val(data[9].trim().trimEnd());
      $('#item_name').val(data[10].trim().trimEnd());

      $('#rtn_qty').val(data[3].trim().trimEnd());
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.view_btn', function() {
      $tr = $(this).closest("tr");

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#return_date_time').val(data[11].trim().trimEnd());
      $('#return_by').val(data[12].trim().trimEnd());
      $('#return_to').val(data[13].trim().trimEnd());
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