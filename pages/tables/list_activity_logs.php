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
  <title>Maya-maya E-Brgy System | Audit Trial</title>
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
                      <div class="col-sm-12">
                        <div class="input-group d-flex flex-row-reverse">  
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(0)" placeholder="search date of the activity">
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
                    <table class="table table-striped table-bordered">
                      <thead class="thead-light">
                        <tr>
                          <th width="15%"> Date </th>
                          <th width="15%"> Time </th>
                          <th width="15%"> Log ID </th>
                          <th width="15%"> User </th>
                          <th width="10%"> Type </th>
                          <th width="30%"> Activity </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                      <tbody id="dataTable">  <?php if ($activity_logs_list->num_rows>0){
                          while ($act=$activity_logs_list-> fetch_assoc()){?>
                          <tr>
                              <td>
                                <?=$act['Date']?>
                              </td>
                              <td>
                                <?=$act['Time']?>
                              </td>
                              <td>
                                <?=$act['Log ID']?>
                              </td>
                              <td>
                                <?=$act['User Name']?>
                              </td>
                              <td>
                                <?=$act['User Type']?>
                              </td>
                              <td>
                                <?=$act['Activity']?>
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

