<?php
// include '../../php/variables.php';
// include '../../php/login.php';
include '../../php/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Create the streets table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS streets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    street_name VARCHAR(255) NOT NULL
)";
if ($conn->query($sqlCreateTable) === FALSE) {
    echo "Error creating table: " . $conn->error;
}


// Handle form submission
if (isset($_POST['add_street'])) {

    echo $_POST['add_street']; // This line is likely for debugging purposes

    // Retrieve street name from form
    $street_name = $_POST['house_num']; // There might be a typo here, are you sure it should be 'house_num'?

    // Insert street name into the database
    $sql = "INSERT INTO streets (street_name)
VALUES ('$street_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: {$_SERVER['PHP_SELF']}");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



$sql = "SELECT * FROM streets";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Initialize an empty array to store the data
    $streets_data = array();

    // Loop through each row and store the data in the array
    while ($row = $result->fetch_assoc()) {
        $streets_data[] = $row;
    }
} else {
    $streets_data[] = [];
}


// Function to delete a street record
function deleteStreet($conn, $street_id)
{
    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM streets WHERE id = ?");

    // Check if the query preparation was successful
    if (!$stmt) {
        die("Error in query preparation: " . $conn->error);
    }

    // Bind the street ID parameter to the statement
    $stmt->bind_param("i", $street_id);

    // Execute the query
    if ($stmt->execute()) {
        return true; // Return true if deletion was successful
    } else {
        return false; // Return false if deletion failed
    }
}

// Check if the delete form is submitted
if (isset($_POST['delete_street'])) {
    // Get the street ID from the form
    $street_id = $_POST['street_id'];

    // Call the deleteStreet function and pass the database connection and street ID
    $deleted = deleteStreet($conn, $street_id);

    // Check if deletion was successful
    if ($deleted) {
        echo "Street deleted successfully.";
        header("Location: {$_SERVER['PHP_SELF']}");
    } else {
        echo "Failed to delete street.";
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mama-maya | Add Resident</title>
    <!-- base:css -->
    <?= $FormPlugins ?>
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
                        <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_v2_wht.png" height="50" alt="logo" /></a>
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_v2.png" alt="logo" /></a>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none mt-1">Barangay 31, Maya-maya,Cavite City, </h4>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item">
                            <h4 class="mb-0 font-weight-bold d-none">Mar 12, 2019 - Apr 10, 2019</h4>
                        </li>
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

                    <div class="row">
                        <div class="col-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Street Registration Form</h4>
                                    <form class="form-sample" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <!-- <p class=" card-description">
                                        Street
                                        </p> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label class="mb-2">Street Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="house_num" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-right">
                                            <div class="col-md-12">
                                                <button type="reset" class="btn btn-info btn-icon-text">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i>
                                                    Reset
                                                </button>
                                                <button type="submit" class="btn btn-success btn-icon-text" name="add_street">
                                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 grid-margin">
                            <div class="card">
                                <!-- Search input field -->
                                <div class="form-group container mt-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search by street name">
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Street name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($streets_data as $key => $data) : ?>

                                            <tr>
                                                <th scope="row"><?= $key + 1; ?></th>
                                                <td><?= $data['street_name']; ?></td>
                                                <td>

                                                    <!-- Delete button -->
                                                    <form action="" method="post" style="display: inline;">
                                                        <input type="hidden" name="street_id" value="<?= $data['id']; ?>">
                                                        <button type="submit" name="delete_street" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this street?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
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
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../js/file-upload.js"></script>
    <!-- End custom js for this page-->
</body>

<!-- <script type="text/javascript">
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
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('searchInput');
        var tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('keyup', function() {
            var searchValue = this.value.toLowerCase();

            tableRows.forEach(function(row) {
                var streetName = row.cells[1].innerText.toLowerCase(); // Index 1 is the column with street name

                if (streetName.includes(searchValue)) {
                    row.style.display = ''; // Show row if it matches search query
                } else {
                    row.style.display = 'none'; // Hide row if it doesn't match
                }
            });
        });
    });
</script>

</html>