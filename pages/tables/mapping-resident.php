<!DOCTYPE html>
<?php
include '../../php/config.php';
include '../../php/variables.php';
// include 'php/config.php';



// if (isset($_POST['add-resident-home-info'])) {
//     // Retrieve data from the form
//     $address = $_POST["address"];
//     $headOfFamilyName = $_POST["head-family-name"];
//     $numMembers = $_POST["numMembers"];

//     // Initialize arrays to store member names
//     $memberNames = array();

//     // Loop through each member to retrieve names
//     for ($i = 0; $i < $numMembers; $i++) {
//         $memberNames[] = $_POST["member-name"][$i];
//     }

//     // Initialize counters for male, female, senior, and pwd
//     $maleCount = 0;
//     $femaleCount = 0;
//     $seniorCount = 0;
//     $pwdCount = 0;

//     // Loop through each member to count genders and pwd/senior status
//     for ($i = 0; $i < $numMembers; $i++) {
//         $sex = $_POST["sex"][$i];
//         $pwdSenior = $_POST["pwd-senior"][$i];

//         // Count males and females
//         if ($sex === "Male") {
//             $maleCount++;
//         } elseif ($sex === "Female") {
//             $femaleCount++;
//         }

//         // Count seniors and pwd
//         if ($pwdSenior === "Senior") {
//             $seniorCount++;
//         } elseif ($pwdSenior === "PWD") {
//             $pwdCount++;
//         }
//     }

//     $headSex = $_POST['head-sex'];
//     $headPwdSenior = $_POST['head-pwd-senior'];

//     if ($headSex == "Male") {
//         $maleCount += 1;
//     } else if ($headSex == "Female") {
//         $femaleCount += 1;
//     }

//     if ($headPwdSenior == "PWD") {
//         $pwdCount += 1;
//     } else if ($headPwdSenior == "Senior") {
//         $seniorCount += 1;
//     }

//     // Now you have all the information
//     echo "Address: " . $address . "<br>";
//     echo "Head of Family Name: " . $headOfFamilyName . "<br>";
//     echo "Total Members: " . $numMembers . "<br>";
//     echo "Member Names: <br>";
//     foreach ($memberNames as $name) {
//         echo "- " . $name . "<br>";
//     }
//     echo "Male Count: " . $maleCount . "<br>";
//     echo "Female Count: " . $femaleCount . "<br>";
//     echo "Senior Count: " . $seniorCount . "<br>";
//     echo "PWD Count: " . $pwdCount . "<br>";
// }


// Select data from the table
$sql = "SELECT * FROM `map-resident-info`";
$result = $conn->query($sql);

$residentInfoArray = array();

if ($result->num_rows > 0) {
    // Fetch associative array of the result set
    while ($row = $result->fetch_assoc()) {
        $residentInfoArray[] = $row;
    }
} else {
    // If no data, initialize an empty array
    $residentInfoArray = array();
}


?>


<?php
if (isset($_POST['add-resident-home-info'])) {
    // Retrieve data from the form
    $address = $_POST["address"];
    $headOfFamilyName = $_POST["head-family-name"];
    $numMembers = $_POST["numMembers"];

    // Initialize arrays to store member names
    $memberNames = array();

    // Loop through each member to retrieve names
    for ($i = 0; $i < $numMembers; $i++) {
        $memberNames[] = $_POST["member-name"][$i];
    }

    // Initialize counters for male, female, senior, and pwd
    $maleCount = 0;
    $femaleCount = 0;
    $seniorCount = 0;
    $pwdCount = 0;

    // Loop through each member to count genders and pwd/senior status
    for ($i = 0; $i < $numMembers; $i++) {
        $sex = $_POST["sex"][$i];
        $pwdSenior = $_POST["pwd-senior"][$i];

        // Count males and females
        if ($sex === "Male") {
            $maleCount++;
        } elseif ($sex === "Female") {
            $femaleCount++;
        }

        // Count seniors and pwd
        if ($pwdSenior === "Senior") {
            $seniorCount++;
        } elseif ($pwdSenior === "PWD") {
            $pwdCount++;
        }
    }

    // Add the head of family info to the counts
    $headSex = $_POST['head-sex'];
    $headPwdSenior = $_POST['head-pwd-senior'];

    if ($headSex == "Male") {
        $maleCount++;
    } else if ($headSex == "Female") {
        $femaleCount++;
    }

    if ($headPwdSenior == "PWD") {
        $pwdCount++;
    } else if ($headPwdSenior == "Senior") {
        $seniorCount++;
    }

    // // Insert data into the database
    // $servername = "localhost"; // Change this if your database is hosted elsewhere
    // $username = "username"; // Change this to your database username
    // $password = "password"; // Change this to your database password
    // $dbname = "your_database_name"; // Change this to your database name

    // // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if table exists, if not create it
    $sqlCheckTable = "SHOW TABLES LIKE 'map-resident-info'";
    $resultCheckTable = $conn->query($sqlCheckTable);

    if ($resultCheckTable->num_rows == 0) {
        // Table does not exist, create it
        $sqlCreateTable = "CREATE TABLE `map-resident-info` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(255) NOT NULL,
    head_of_family_name VARCHAR(255) NOT NULL,
    member_names TEXT NOT NULL,
    num_members INT(6) NOT NULL,
    male_count INT(6) NOT NULL,
    female_count INT(6) NOT NULL,
    senior_count INT(6) NOT NULL,
    pwd_count INT(6) NOT NULL
)
";

        if ($conn->query($sqlCreateTable) === TRUE) {
            echo "Table map-resident-info created successfully. ";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    // Prepare member names separated by comma
    $memberNamesStr = implode(", ", $memberNames);

    // Prepare SQL statement for data insertion
    // Insert data into the database
    $sqlInsertData = "INSERT INTO `map-resident-info` (address, head_of_family_name, member_names, num_members, male_count, female_count, senior_count, pwd_count)
VALUES ('$address', '$headOfFamilyName', '$memberNamesStr', $numMembers, $maleCount, $femaleCount, $seniorCount, $pwdCount)";


    if ($conn->query($sqlInsertData) === TRUE) {
        echo "New record created successfully";
        header("Location: " . $_SERVER['PHP_SELF']);
    } else {
        echo "Error: " . $sqlInsertData . "<br>" . $conn->error;
    }

    // $conn->close();
}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete record from the table
    $sql = "DELETE FROM `map-resident-info` WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        // Redirect to reload the page after deletion
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
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
                                            <!-- <div class="col-sm-8">
                                                <div class="input-group d-flex flex-row-reverse">
                                                    <input class="form-control" type="text" id="searchKeyword" onkeyup="SearchData(0)" placeholder="search blotter ID or blotter status">
                                                    <div class="input-group-append">
                                                        <span onclick="toggleSearch()" class="input-group-text text-light pl-5 pr-5" style="background-color: rgb(91, 178, 235);">
                                                            <i class="icon-search"></i> Search
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddModal">
                                                    <i class="mdi mdi-plus"></i>
                                                    Add Resident
                                                </button>
                                            </div>
                                        </div>
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Address</th>
                                                    <th>Head of Family</th>
                                                    <th>Member Names</th>
                                                    <th>Number of Members</th>
                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Senior Count</th>
                                                    <th>PWD Count</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($residentInfoArray as $residentInfo) : ?>
                                                    <tr>
                                                        <td><?php echo $residentInfo['address']; ?></td>
                                                        <td><?php echo $residentInfo['head_of_family_name']; ?></td>
                                                        <td><?php echo $residentInfo['member_names']; ?></td>
                                                        <td><?php echo $residentInfo['num_members']; ?></td>
                                                        <td><?php echo $residentInfo['male_count']; ?></td>
                                                        <td><?php echo $residentInfo['female_count']; ?></td>
                                                        <td><?php echo $residentInfo['senior_count']; ?></td>
                                                        <td><?php echo $residentInfo['pwd_count']; ?></td>
                                                        <td>
                                                            <a href="?delete_id=<?php echo $residentInfo['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
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
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Date and Time: <span class="text-danger">*</span> </label>
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

                        <div class="row">
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
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Name of Person to Complain: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" value="" class="form-control" name="comp_person" id="comp_person" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Address of Person to Complain: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" value="" class="form-control" name="comp_person_address" id="comp_person_address" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Description: <span class="text-danger">*</span></label>
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
            <form class="form-sample" action="" method="POST">
                <div class="modal-content p-3">
                    <div class="modal-header pl-3">
                        <h5 class="modal-title pt-0 pb-0" id="exampleModalLabel">Resident Home Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-3">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Address: <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="text" value="" class="form-control" name="address" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Head of family name: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" value="" class="form-control" name="head-family-name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Sex: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <select class="form-control" name="head-sex" id="exampleFormControlSelect1">
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Pwd/Senior: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <select class="form-control" name="head-pwd-senior" id="exampleFormControlSelect1">
                                                <option value="" selected></option>
                                                <option value="PWD">Pwd</option>
                                                <option value="Senior">Senior</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label pt-0 pb-0">Number of members: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="number" id="numMembers" name="numMembers" value="1" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="inputFields"></div>
                            </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="submit" name="add-resident-home-info" class="btn btn-success btn-icon-text">
                            <i class="mdi mdi-check btn-icon-prepend"></i>
                            Submit</button>
                    </div>

                </div>
            </form>
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

<script>
    function generateInputs(num) {
        var inputFields = document.getElementById('inputFields');
        inputFields.innerHTML = ''; // Clear previous inputs

        for (var i = 0; i < num; i++) {
            var divRow = document.createElement('div');
            divRow.className = 'row';

            var divCol1 = document.createElement('div');
            divCol1.className = 'col-md-4';

            var divFormGroup1 = document.createElement('div');
            divFormGroup1.className = 'form-group';

            var label1 = document.createElement('label');
            label1.textContent = 'Member Name: ';
            label1.className = 'pt-0 pb-0';

            var span1 = document.createElement('span');
            span1.className = 'text-danger';
            span1.textContent = '*';

            label1.appendChild(span1);

            var input1 = document.createElement('input');
            input1.type = 'text';
            input1.className = 'form-control';
            input1.name = 'member-name[]';
            input1.required = true;

            divFormGroup1.appendChild(label1);
            divFormGroup1.appendChild(input1);

            divCol1.appendChild(divFormGroup1);

            var divCol2 = document.createElement('div');
            divCol2.className = 'col-md-4';

            var divFormGroup2 = document.createElement('div');
            divFormGroup2.className = 'form-group';

            var label2 = document.createElement('label');
            label2.textContent = 'Sex: ';
            label2.className = 'pt-0 pb-0';

            var select2 = document.createElement('select');
            select2.className = 'form-control';
            select2.name = 'sex[]';

            var option21 = document.createElement('option');
            option21.textContent = 'Male';
            option21.value = 'Male';
            select2.appendChild(option21);

            var option22 = document.createElement('option');
            option22.textContent = 'Female';
            option22.value = 'Female';
            select2.appendChild(option22);

            divFormGroup2.appendChild(label2);
            divFormGroup2.appendChild(select2);

            divCol2.appendChild(divFormGroup2);

            var divCol3 = document.createElement('div');
            divCol3.className = 'col-md-4';

            var divFormGroup3 = document.createElement('div');
            divFormGroup3.className = 'form-group';

            var label3 = document.createElement('label');
            label3.textContent = 'Pwd/Senior: ';
            label3.className = 'pt-0 pb-0';

            var select3 = document.createElement('select');
            select3.className = 'form-control';
            select3.name = 'pwd-senior[]';

            var option31 = document.createElement('option');
            option31.textContent = '';
            option31.value = '';
            select3.appendChild(option31);

            var option32 = document.createElement('option');
            option32.textContent = 'PWD';
            option32.value = 'PWD';
            select3.appendChild(option32);

            var option33 = document.createElement('option');
            option33.textContent = 'Senior';
            option33.value = 'Senior';
            select3.appendChild(option33);

            divFormGroup3.appendChild(label3);
            divFormGroup3.appendChild(select3);

            divCol3.appendChild(divFormGroup3);

            divRow.appendChild(divCol1);
            divRow.appendChild(divCol2);
            divRow.appendChild(divCol3);

            inputFields.appendChild(divRow);
        }
    }

    document.getElementById('numMembers').addEventListener('change', function() {
        var num = this.value;
        generateInputs(num);
    });
</script>

</html>