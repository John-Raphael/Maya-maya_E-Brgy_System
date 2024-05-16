<?php
include '../../php/config.php';
include '../../php/variables.php';



// backup.php
// backup.php

// if (isset($_POST['backup'])) {
//     $database = $_POST['database'];
//     // $host = "localhost";
//     // $user = "your_username";
//     // $password = "your_password";

//     // $conn = new mysqli($host, $user, $password);
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     $database = $conn->real_escape_string($database); // Escape the database name
//     $backup_file = $database . '_' . date('Y-m-d_H-i-s') . '.sql';
//     $backup_content = ''; // Initialize with an empty string

//     $sql = "SHOW TABLES FROM `$database`"; // Use backticks to enclose the database name
//     $result = $conn->query($sql);

//     if ($result) {
//         $backup_content = "-- Database: `$database`\n\n";
//         while ($row = $result->fetch_row()) {
//             $table = $row[0];
//             $table_query = "SHOW CREATE TABLE `$database`.`$table`";
//             $result_table_query = $conn->query($table_query);
//             if ($result_table_query) {
//                 $row_table_query = $result_table_query->fetch_row();
//                 $backup_content .= "\n\n" . $row_table_query[1] . ";\n\n";

//                 $data_query = "SELECT * FROM `$database`.`$table`";
//                 $result_data_query = $conn->query($data_query);
//                 if ($result_data_query) {
//                     while ($row_data = $result_data_query->fetch_row()) {
//                         $backup_content .= "INSERT INTO `$table` VALUES(";
//                         $values = implode("', '", array_map(array($conn, 'real_escape_string'), $row_data));
//                         $backup_content .= "'" . $values . "');\n";
//                     }
//                 } else {
//                     echo "Error fetching data: " . $conn->error;
//                 }
//             } else {
//                 echo "Error fetching table structure: " . $conn->error;
//             }
//         }
//     } else {
//         echo "Error fetching tables: " . $conn->error;
//     }

//     $conn->close();

//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename=' . $backup_file);
//     echo $backup_content;
//     exit;
// }

if (isset($_POST['backup'])) {
    $database = $dbName;
    // $host = "localhost";
    // $user = "your_username";
    // $password = "your_password";

    // $conn = new mysqli($host, $user, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $database = $conn->real_escape_string($database); // Escape the database name
    $backup_file = $database . '_' . date('Y-m-d_H-i-s') . '.sql';
    $backup_content = ''; // Initialize with an empty string

    // Check if the database exists
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Database exists, proceed with backup
        $sql = "SHOW TABLES FROM `$database`"; // Use backticks to enclose the database name
        $result = $conn->query($sql);

        if ($result) {

            while ($row = $result->fetch_row()) {
                $table = $row[0];
                $table_query = "SHOW CREATE TABLE `$database`.`$table`";
                $result_table_query = $conn->query($table_query);
                if ($result_table_query) {
                    $row_table_query = $result_table_query->fetch_row();
                    $backup_content .= "\n\n" . $row_table_query[1] . ";\n\n";

                    $data_query = "SELECT * FROM `$database`.`$table`";
                    $result_data_query = $conn->query($data_query);
                    if ($result_data_query) {
                        while ($row_data = $result_data_query->fetch_row()) {
                            $backup_content .= "INSERT INTO `$table` VALUES(";
                            $values = implode("', '", array_map(array($conn, 'real_escape_string'), $row_data));
                            $backup_content .= "'" . $values . "');\n";
                        }
                    } else {
                        echo "Error fetching data: " . $conn->error;
                    }
                } else {
                    echo "Error fetching table structure: " . $conn->error;
                }
            }
        } else {
            echo "Error fetching tables: " . $conn->error;
        }
    } else {
        echo "Error: Unknown database '{$database}'";
    }



    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $backup_file);
    echo $backup_content;
    exit;
}

if (isset($_POST['restore'])) {
    $database = $dbName;
    $database = $conn->real_escape_string($database); // Escape the database name

    // Check if the database exists
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Database exists, proceed with restore
        $sql_file = $_FILES['sql_file']['tmp_name'];
        $sql = file_get_contents($sql_file);

        $stmt = $conn->multi_query($sql);
        if ($stmt) {
            echo "Database restored successfully.";
        } else {
            echo "Error restoring database: " . $conn->error;
        }
    } else {
        echo "Error: Unknown database '{$database}'";
    }
}

?>
<!DOCTYPE html>
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
                        <!-- <div class="col">
                            <div id="map" style="height: 500px;"></div>
                        </div> -->
                        <div class="col-sm-12 col-md-2 text-center">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="mb-3">Backup Database</h5>
                                    <form action="" method="post">
                                        <!-- <label for="database">Database Name:</label>
                                <input type="text" name="database" id="database" required> -->
                                        <input class="btn btn-sm btn-primary" type="submit" name="backup" value="Backup">
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="col-sm-12 col-md-4 r">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="mb-3 text-center">Restore Database</h5>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- <label for="database">Database Name:</label>
                                        <input type="text" name="database" id="database" required> -->
                                        <!-- <label for="sql_file">SQL File:</label> -->
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input type="file" class="form-control" name="sql_file" id="sql_file" accept=".sql" required>
                                            </div>
                                            <div>
                                                <input class="btn btn-sm btn-primary ml-3" type="submit" name="restore" value="Restore">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <!-- <footer class="footer mt-auto">
                        <?= $Footer ?>
                    </footer> -->
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



</html>