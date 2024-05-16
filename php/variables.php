<?php
// $Domain = 'mayamaya311.000webhostapp.com';
// $dbHost = 'localhost';      //phpMyAdmin Host name
// $dbUser = 'id20904155_user_mayamaya'; 
// $dbPass = '>(9Q025V^Vt+=?J1';               //phpMyAdmin Account password //Mayamaya@2023
// $dbName = 'id20904155_db_mayamaya';
$Domain = 'localhost/Maya-maya_E-Brgy_System';
// $Domain = "brave-gifts-thank.loca.lt/Maya-maya_E-Brgy_System";
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'maya-maya_e_brgy_system';
$connectionStatus = '';


// session_start();

// echo $_SESSION['superAdmin'];


$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
?><script>
        alert("Connection Failed, <?php echo $conn->connect_error ?>");
    </script><?php
                //die("Connection failed: " . $conn->connect_error);
                $connectionStatus = 'Connection Failed';
                exit();
            } else {
                $connectionStatus = 'Connection Success';
            }

            date_default_timezone_set('Asia/Manila');
            //$CurrentDate = date("l, F j, Y " );
            $CurrentDate = date("F j, Y");
            $CurrentMonth = date("F");
            $CurrentTime = date("h : i : A");



            $Footer = '
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright 2022</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Maya-maya E-Barangay System</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed: May 2023</span>
            </div>
        </div>
    </div>
';

            $DashboardPlugins = '
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style_v2.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/logo_v1.png"/>
';

            $TablePlugins = '
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style_v2.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo_v1.png" />

  <!-- For Pop up function -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>                            
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
';

            $FormPlugins = '
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style_v2.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/logo_v1.png" />
';

            $Tables_Directory = "http://" . $Domain . "/pages/tables/";
            $Certificates_Directory = "http://" . $Domain . "/pages/certificates/";
            $Forms_Directory = "http://" . $Domain . "/pages/forms/";
            $Admin_Dashboard = "http://" . $Domain . "/admin.php";
            $MappingPage = "http://" . $Domain . "/pages/mapping";
            $ImageDirectory = "http://" . $Domain . "/images/residents/";

            $StreetNamePage = "http://" . $Domain . "/pages/streetname/streetName.php";


            $restorePage = "http://" . $Domain . "/pages/backup-restore/index.php";
            $announcementsPage = "http://" . $Domain . "/pages/announcements/index.php";

            $Admin_Admin_List = $Tables_Directory . "admn_admins.php";
            $Admin_Admin_Add = $Forms_Directory . "add_admins.php";
            $Admin_Mapping = $Tables_Directory . "Mapping.php";
            $Admin_Resident_list = $Tables_Directory . "list_resident.php";
            $Admin_Incident_list = $Tables_Directory . "";
            $Admin_Blotter_list = $Tables_Directory . "list_report_blotter.php";
            $Admin_Accident_list = $Tables_Directory . "list_report_accident.php";
            $Admin_Complaint_list = $Tables_Directory . "list_report_complaint.php";
            $Admin_VAWC_list = $Tables_Directory . "list_report_vawc.php";
            $Admin_Statistics = $Tables_Directory . "statistics.php";

            $Admin_Incident_list = $Tables_Directory . "list_report_incident.php";
            $Admin_Items_list = $Tables_Directory . "list_items.php";
            $Admin_Items_history = $Tables_Directory . "list_items_history.php";
            $Admin_Resident_archived = $Tables_Directory . "list_resident_archived.php";
            $Admin_Users = $Tables_Directory . "list_users.php";
            $Admin_Activity_logs = $Tables_Directory . "list_activity_logs.php";

            $Admin_Resident_Add = $Forms_Directory . "add_resident.php";
            $Admin_Change_password = $Forms_Directory . "change_password.php";

            $Admin_Officials_list = $Tables_Directory . "list_officials.php";
            $Admin_Indigency_list = $Tables_Directory . "list_resident_indigency.php";
            $Admin_Clearance_list = $Tables_Directory . "list_resident_clearance.php";
            $Admin_Bus_Permit_list = $Tables_Directory . "list_resident_bus_permit.php";
            $Admin_Brgy_Cert_list = $Tables_Directory . "list_resident_brgy_cert.php";

            $Admin_Indigency_cert = $Certificates_Directory . "indigency.php";
            $Admin_Business_permit = $Certificates_Directory . "bus_permit.php";
            $Admin_Barangay_clearance = $Certificates_Directory . "brgy_clearance.php";
            $Admin_Brgy_Cert = $Certificates_Directory . "brgy_certification.php";

            $AdminNavigation = '
    <ul class="nav" style="position: fixed;">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="' . $Admin_Dashboard . '">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-info badge-pill d-none">2</div>
            </a>
        </li>

   
' .
                //  </li>
                //  <li class="nav-item">
                //     <a class="nav-link" href="' . $MappingPage . '">
                //          <i class="mdi mdi-map menu-icon"></i>
                //          <span class="menu-title">Mapping</span>
                //          <div class="badge badge-info badge-pill d-none">2</div>
                //     </a>
                //  </li>

                '

              <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mapping" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-map menu-icon"></i>
                <span class="menu-title">Mapping</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mapping">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="' . $MappingPage . '">Map</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Tables_Directory . "mapping-resident.php" . '">Add Resident</a></li>
                         
                </ul>
            </div>
        </li>


         '
                . (!empty($_SESSION['superAdmin']) ? '
              <li class="nav-item">
            <a class="nav-link" href="' . $announcementsPage . '">
                 <i class="mdi mdi-microphone menu-icon"></i>
                 <span class="menu-title">Announcement</span>
       
            </a>
         </li>' : '') .
                '



         ';


            //         $AdminNavigation .= !empty($_SESSION['superAdmin']) ?
            //             '<li class="nav-item">
            //     <a class="nav-link" href="' . $restorePage . '">
            //         <i class="mdi mdi-restore menu-icon"></i>
            //         <span class="menu-title">Backup / Restore</span>
            //     </a>
            // </li>' : '';




            $AdminNavigation .= '
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#residents" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Residents</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="residents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Resident_list . '">Resident List</a></li>
                    <li class="nav-i accordiontem"> <a class="nav-link" href="' . $Admin_Resident_Add . '">Add Resident</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="' . $Admin_Officials_list . '">
                <i class="mdi mdi-clipboard-account menu-icon"></i>
                <span class="menu-title">Barangay Officials</span>
                <div class="badge badge-info badge-pill d-none">2</div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item"> <a class="nav-link" href="' . $Admin_Incident_list . '">Incident
</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Blotter_list . '">Blotter</a></li>
                <li class="nav-item"> <a class="nav-link" href="' . $Admin_Accident_list . '">Accident Report</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Complaint_list . '">Complaint</a></li>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_VAWC_list . '">VAWC</a></li>
                         
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#equipments" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-chair-school menu-icon"></i>
                <span class="menu-title">Brgy. Equipments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="equipments">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Items_list . '">Borrowing Items</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Items_history . '">Return Items
                    <div class="badge badge-info badge-pill" id="pending_item"></div></a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#certifications" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-certificate menu-icon"></i>
                <span class="menu-title">Certifications</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="certifications">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Clearance_list . '">Clearance</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Indigency_list . '">Indigency</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Bus_Permit_list . '">Business Permit</a></li>
                    <li class="nav-item"> <a class="nav-link" href="' . $Admin_Brgy_Cert_list . '">Barangay Certification</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-settings menu-icon"></i>
                <span class="menu-title">System Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="' . $Admin_Activity_logs . '">Audit Trial</a></li>
                <li class="nav-item"> <a class="nav-link" href="' . $Admin_Resident_archived . '">Archived</a></li>
                <li class="nav-item"> <a class="nav-link" href="' . $Admin_Change_password . '">Change Password</a></li>
                <li class="nav-item"> <a class="nav-link" href="' . $Admin_Users . '">Users</a></li>
      
                ' .

                (!empty($_SESSION['superAdmin']) ? '
             <li class="nav-item"> <a class="nav-link" href="' . $StreetNamePage . '">Street Name</a></li>' : '')
                .

                (!empty($_SESSION['superAdmin']) ? '
            <li class="nav-item">
                <a class="nav-link" href="' . $restorePage . '">
                    <span class="menu-title">Backup / Restore</span>
                </a>
            </li>' : '')
                . '
                </ul>
            </div>
        </li>
    </ul>
';



                ?>