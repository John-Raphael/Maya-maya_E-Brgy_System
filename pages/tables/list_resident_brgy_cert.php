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
                          <th width="20%"> Resident Info </th>
                          <th width="20%"> Birthdate </th>
                          <th width="20%"> Address</th>
                          <th width="15%" class="text-center"> Action </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                      <tbody id="dataTable">  <?php if ($resident_list->num_rows>0){
                          while ($rsd=$resident_list-> fetch_assoc()){
                            if ($rsd['Resident Status'] == 'active'){
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
                              <td class="d-none">
                                <?=$rsd['Resident ID']?>
                              </td>
                              <td><label class="badge d-block pt-1 pb-1 m-0 badge-info"><?=$rsd['Resident ID']?></label>
                                  <label class="badge d-block pt-1 pb-1 m-0 <?=$status?>"><?=$rsd['Resident Status']?></label>
                              </td>
                              <td><?=$rsd['Name']?>
                              </td>
                              <td>Gender: <?=$rsd['Gender']?><br><br>
                                  Citizenship: <?=$rsd['Citizenship']?><br><br>
                                  Civil Status: <?=$rsd['Civil Status']?><br><br>
                                  Voter Status: <?=$rsd['Voter Status']?><br>
                              </td>
                              <td>Birthdate: <?=$rsd['Birthdate']?><br><br>
                                  Age: <?=$rsd['Age']?><br><br>
                                  Birthplace: <?=$rsd['Birthplace']?><br>
                              </td>
                              <td>Address: <?=$rsd['Address']?><br><br>
                                  Primary Contact No.: <?=$rsd['Primary Contact Number']?><br><br>
                                  Secondary Contact Nor: <?=$rsd['Secondary Contact Number']?>
                              </td>
                              <td class="text-center">
                                <button type="button" class="btn btn-inverse-info btn-icon m-0 d-none edit" data-toggle="modal" data-target="#EditModal">
                                  <i class="mdi mdi-eye"></i>
                                </button>
                                <?php $IndigencyCertPage = $Admin_Indigency_cert."?resident=".$rsd['Resident ID']."&purpose=".$rsd['Resident ID'] ?>
                                <!-- <button type="button" class="btn btn-info m-0" 
                                  onclick="window.open('<?=$IndigencyCertPage?>','_blank')">
                                  Generate 
                                </button> -->
                                <button type="button" class="btn btn-info m-0 details" data-toggle="modal" data-target="#PopupModal">
                                  Generate
                                </button>

                              </td>
                              <td class="d-none">
                                <?=$rsd['Resident ID']?>
                                <?=$rsd['Name']?>
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

<div class="modal fade" id="PopupModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header pl-3">
          <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Certificate Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          <form class="form-sample" action="../../php/config.php" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Resident ID</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="res_id" id="res_id" required readonly/>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Resident Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" id="name" required readonly/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label pt-0 pb-0">Purpose</label>
                  <div class="col-sm-12">
                    <textarea type="text" rows="4" class="form-control" name="purpose" id="purpose" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" value="submit" name="generate_brgy_cert">Generate Certificate</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.details', function(){
    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    $('#res_id').val(data[0].trim());
    $('#name').val(data[2].trimEnd());
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
<script>
  function generate_ind_cert(){
    const resID = document.querySelector("#res_id");
    const purpose = document.querySelector("#purpose");
    let certDirectory = <?=$Certificates_Directory?>;
    
    let certLink = certDirectory.concat("?resident=", resID, "&purpose=", purpose);

    console.log(certLink);
    window.open(certLink, '_blank');
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

