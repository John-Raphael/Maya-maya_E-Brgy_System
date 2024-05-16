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
  <title>Maya-maya E-Brgy System | Users</title>
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
                  <h4 class="card-title d-flex justify-content-end"> <!-- searh bar -->
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <div class="input-group d-flex flex-row-reverse">  
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(2)" placeholder="search resident/user name">
                          <div class="input-group-append">
                            <span onclick="toggleSearch()" class="input-group-text text-light pl-5 pr-5" style="background-color: rgb(91, 178, 235);">
                              <i class="icon-search"></i> Search
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#PopupModal">
                          <i class="mdi mdi-plus"></i>
                          Add User
                        </button>
                      </div>

                    </div>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%"> </th>
                          <th width="10%"> Brgy. Official ID </th>
                          <th width="35%"> User name </th>
                          <th width="20%"> Registration Date </th>
                          <th width="10%" class="text-center"> Status </th>
                          <th width="15%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                      <tbody id="dataTable"> 
                        <?php if ($users_list->num_rows>0){
                          while ($usr=$users_list-> fetch_assoc()){
                            if ($usr['Status'] == 'active'){
                              $status = 'badge-success';
                              $btn_color = 'btn-danger';
                              $btn_text = 'Delete';
                              $btn_icon = 'mdi-delete';
                              $btn_value = 'delete_account';
                            } else if ($usr['Status'] == 'deleted') {
                              $status = 'badge-danger';
                              $btn_color = 'btn-success';
                              $btn_text = 'Restore';
                              $btn_icon = 'mdi-backup-restore';
                              $btn_value = 'restore_account';
                            } else {
                              $status = 'badge-info';
                            }?>
                          <tr>
                            <td class="text-center">
                              <img src="<?=$ImageDirectory?><?=$usr['Gender']?>.png" alt="" width="100%"> <br>
                            </td>
                            <td>
                              <?=$usr['Official ID']?>
                            </td>
                            <td>
                              <?=$usr['Name']?>
                            </td>
                            <td>
                              <?=$usr['Registration Date']?>
                            </td>
                            <td class="text-center">
                              <label class="badge p-2 <?=$status?>"><?=$usr['Status']?></label>
                            </td>
                            <td class="text-center">
                              <button type="submit" class="btn <?=$btn_color?>" value="<?=$usr['Account ID']?>" name="<?=$btn_value?>">
                                <i class="mdi <?=$btn_icon?>"></i>
                                <?=$btn_text?>
                              </button>
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
        <div class="modal fade" id="PopupModal" role="dialog">
          <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header pl-3">
                  <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Account Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body p-3">
                  <form class="form-sample" action="../../php/config.php" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="mb-2">Barangay Official<span class="text-danger">*</span></label>
                            <select class="form-control" name="resident_id" required>
                              <option value="">select barangay official</option>
                                 <?php if ($official_list->num_rows>0){
                                while ($ofcl=$official_list-> fetch_assoc()){?>
                                  <option value="<?=$ofcl['Resident ID']?>"><?=$ofcl['Name']?></option>
                                <?php  } }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label pt-0 pb-0">Username</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" name="username" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label pt-0 pb-0">Password</label>
                          <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" value="submit" name="create_account">Create Account</button>
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

