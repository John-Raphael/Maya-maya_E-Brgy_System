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
  <title>Maya-maya E-Brgy System | Borrowing Items</title>
  <!-- base:css -->
  <?=$TablePlugins?>
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?=$Navigation?>
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
            <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_v2_wht.png" alt="logo" height="60"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_v2_wht.png" alt="logo" height="80"/></a>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown mr-2">
              <a class="border nav-link dropdown-toggle bg-light p-2 text-dark" id="profileDropdown" href="#" data-toggle="dropdown">
                <img class="mr-1" src="../../images/faces/<?=$_SESSION['userGender']?>.png" height="30px" alt="profile"/>
                <span class="nav-profile-name pl-1"><?=$_SESSION['userName']?> | <?=$_SESSION['userType']?></span>
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
          <?php if (isset($_GET['message'])){?>
            <div class="border p-2 bg-light mb-2 border-<?php echo $_GET['type'];?> text-<?php echo $_GET['type'];?> text-center">
              <?php echo $_GET['message'];?>
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
                      <div class="col-sm-8">
                        <div class="input-group d-flex flex-row-reverse">  
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(7)" placeholder="search item name">
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
                          Add Item
                        </button>
                      </div>
                    </div>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%"> Item ID </th>
                          <th width="25%"> Name </th>
                          <th width="20%"> Description </th>
                          <th width="10%"> Quantity</th>
                          <th width="15%"> Registered By </th>
                          <th width="20%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                      <tbody id="dataTable">  <?php if ($item_list->num_rows>0){
                          while ($itm=$item_list-> fetch_assoc()){
                            if ($itm['Status'] == 'active'){
                              $status = 'badge-success';
                            } else if ($itm['Status'] == 'UNAVAILABLE' || $itm['Status'] == 'WARNING STATUS') {
                              $status = 'badge-warning';
                            } else if ($itm['Status'] == 'deleted' || $itm['Status'] == 'HONORABLE DISMISSAL') {
                              $status = 'badge-danger';
                            } else {
                              $status = 'badge-info';
                            }
                            ?>
                          <tr>
                              <td><label class="badge d-block pt-1 pb-1 m-0 badge-info"><?=$itm['Item ID']?></label>
                                  <label class="badge d-block pt-1 pb-1 m-0 <?=$status?>"><?=$itm['Status']?></label>
                              </td>
                              <td><?=$itm['Name']?>
                              </td>
                              <td>
                                <?=$itm['Description']?>
                              </td>
                              <td>
                                <?=$itm['Current Qty']?>/<?=$itm['Original Qty']?>
                              </td>
                              <td>
                                <?=$itm['Registered by']?><br><br>
                                Date: <?=$itm['Registration Date']?>
                              </td>
                              <td class="text-center">
                                <button type="button" class="btn btn-success m-0 view" data-toggle="modal" data-target="#BorrowModal">
                                  Borrow
                                </button>
                                <button type="button" class="btn btn-info m-0 update_btn" data-toggle="modal" data-target="#UpdateModal">
                                  Update
                                </button>
                              </td>
                              
                              <!-- Col 6 -->
                              <td class="d-none">
                                <?=$itm['Item ID']?>
                              </td>
                              <td class="d-none">
                                <?=$itm['Name']?> (<?=$itm['Description']?>)
                              </td>
                              <td class="d-none">
                                <?=$itm['Current Qty']?>/<?=$itm['Original Qty']?>
                              </td>
                              <td class="d-none">
                                <?=$itm['Current Qty']?>
                              </td>
                              <td class="d-none">
                                <?=$itm['Original Qty']?>
                              </td>


                          </tr>
                          <?php }
                          }else{ ?>
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
          <?=$Footer?>
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


<div class="modal fade" id="BorrowModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Barrow Request Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-12 d-none">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Item ID <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="item_id" id="item_id" readonly required/>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Item <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="item_name" id="item_name" readonly required/>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Current Quantity <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="cur_quantity2" id="cur_quantity2" readonly required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 d-none">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Current Quantity <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="cur_quantity" id="cur_quantity" readonly required/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Date and Time<span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="datetime-local" value="" class="form-control" name="date_time" id="date_time" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Borrower <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-control" id="borrower" name="borrower" required>
                      <option value="">select your answer</option>
                      <?php if ($resident_list->num_rows>0){
                          while ($res=$resident_list-> fetch_assoc()){?>
                      <option value="<?=$res['Resident ID']?>"><?=$res['Name']?></option>
                      <?php } }?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Quantity <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="quantity" id="quantity" required/>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Purpose <span class="text-danger">*</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="purpose" id="purpose" required/>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info btn-icon-text" value="submit" name="borrow_item">
                <i class="mdi mdi-check btn-icon-prepend"></i>
                Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="AddModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Add New Item Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Item Name<span class="text-danger">*</span> </label>
                    <div class="col-sm-12">
                      <input type="text" value="" class="form-control" name="name" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Item Description<span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="description" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Quantity<span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input type="number" value="" class="form-control" name="qty" required/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" value="submit" name="add_item" class="btn btn-success btn-icon-text">
                <i class="mdi mdi-check btn-icon-prepend"></i>
                Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="UpdateModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content p-3">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Update Item Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Item Name<span class="text-danger">*</span> </label>
                    <div class="col-sm-12">
                      <input type="text" value="" class="form-control d-none" name="item_id" id="upd_item_id" readonly required/>
                      <input type="text" value="" class="form-control" name="upd_name" id="upd_name" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Item Description<span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input type="text" value="" class="form-control" name="upd_description" id="upd_description" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label pt-0 pb-0">Original Quantity<span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input type="number" value="" class="form-control" name="upd_qty" id="upd_qty" required/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" value="submit" name="update_item" class="btn btn-success btn-icon-text">
                <i class="mdi mdi-pencil btn-icon-prepend"></i>
                Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.view', function(){
    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    $('#item_id').val(data[6].trim().trimEnd());
    $('#item_name').val(data[7].trim().trimEnd());
    $('#cur_quantity2').val(data[8].trimStart().trimEnd());
    $('#cur_quantity').val(data[9].trimStart().trimEnd());
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.update_btn', function(){
    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    $('#upd_item_id').val(data[6].trim().trimEnd());
    $('#upd_name').val(data[1].trim().trimEnd());
    $('#upd_description').val(data[2].trimStart().trimEnd());
    $('#upd_qty').val(data[10].trimStart().trimEnd());
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
  setInterval(function(){
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("pending_item").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "../../php/count_items_pending.php", true);
   xhttp.send();

  },500);


 }
 loadDoc();
</script>
</html>

