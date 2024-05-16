<!DOCTYPE html>
<?php
include '../../php/config.php';
include '../../php/variables.php';
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maya-maya E-Brgy System | Mapping</title>
    <!-- base:css -->
    <?= $TablePlugins ?>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        #map {
            cursor: crosshair;
        }
    </style>
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
                    <div class="row">
                        <div class="col-6">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                        <div class="col-6">
                            <div class="box-residents d-none">
                                <!-- <div>
                                    <button class="btn btn-primary d-none btnSaveCoordinates">
                                        Save Coordinates
                                    </button>
                                    <button class="btn btn-primary btnAddResidents" data-toggle="modal" data-target="#AddResidents">
                                        Add Residents
                                    </button>
                                </div> -->
                                <div class="mt-3">
                                    <div class="mb-3">
                                        <b>
                                            Address :
                                        </b>
                                        <span class="address">
                                            Loading...
                                        </span>
                                    </div>
                                    <div>
                                        <h4 class="mb-2">Residents : </h4>
                                        <div class="residents">

                                        </div>
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

    <div class="modal fade" id="AddResidents" role="dialog">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-3">
                    <div class="modal-header pl-3">
                        <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">
                            Add Resident
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="FrmAddResident">
                        <div class="modal-body p-3">
                            <input type="hidden" name="coordinates_id" class="CoordinateId">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label pt-0 pb-0">Resident Id: <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="resident_id" placeholder="Resident Id">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-icon-text">
                                Add
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
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