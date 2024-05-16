<!DOCTYPE html>
<?php
// include '../../php/config.php';
// include '../../php/variables.php';
?>


<?php
// Include database configuration file
include '../../php/config.php';

// Function to add announcement
function addAnnouncement($conn, $image, $title, $details, $date)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO announcements (image, title, details, date) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssss", $image, $title, $details, $date);

    // Execute the statement
    return $stmt->execute();
}

// Function to read announcements
function getAnnouncements($conn)
{
    // Prepare SQL statement
    $stmt = $conn->query("SELECT * FROM announcements");

    // Fetch all rows as associative array
    return $stmt->fetch_all(MYSQLI_ASSOC);
}

// Retrieve announcements from the database
$announcements = getAnnouncements($conn);

// Create announcements table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS announcements (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(255) NOT NULL,
                title VARCHAR(255) NOT NULL,
                details TEXT NOT NULL,
                date DATE NOT NULL
            )");

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Image upload path
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            // Add announcement to the database
            $image = $targetFile; // Save the image path to database
            $title = $_POST['title'];
            $details = $_POST['details'];
            $date = $_POST['date'];

            if (addAnnouncement($conn, $image, $title, $details, $date)) {
                // echo "Announcement added successfully.";
                $announcements = getAnnouncements($conn);
            } else {
                echo "Error adding announcement.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}




// Function to edit announcement
function editAnnouncement($conn, $id, $image, $title, $details, $date)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE announcements SET image=?, title=?, details=?, date=? WHERE id=?");

    // Bind parameters
    $stmt->bind_param("ssssi", $image, $title, $details, $date, $id);

    // Execute the statement
    return $stmt->execute();
}

// Function to delete announcement
function deleteAnnouncement($conn, $id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("DELETE FROM announcements WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    return $stmt->execute();
}

// Handle edit form submission
// Handle edit form submission
if (isset($_POST['edit'])) {
    $id = $_POST['announcement_id'];
    $title = $_POST['edit_title'];
    $details = $_POST['edit_details'];
    $date = $_POST['edit_date'];

    // Check if a new image is uploaded
    if ($_FILES['edit_image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["edit_image"]["name"]);

        // Check file type
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Move uploaded file
        if (!move_uploaded_file($_FILES["edit_image"]["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        // Update image path in the database
        $image = $targetFile;
    } else {
        // No new image uploaded, retain the existing image path
        $image = $_POST['edit_image_current'];
    }

    // Call the editAnnouncement function with the updated image path
    if (editAnnouncement($conn, $id, $image, $title, $details, $date)) {
        echo "Announcement edited successfully.";
        $announcements = getAnnouncements($conn);
    } else {
        echo "Error editing announcement.";
    }
}


// Handle delete button click
if (isset($_POST['delete'])) {
    $id = $_POST['announcement_id'];

    if (deleteAnnouncement($conn, $id)) {
        echo "Announcement deleted successfully.";
        $announcements = getAnnouncements($conn);
    } else {
        echo "Error deleting announcement.";
    }
}

?>



<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maya-maya E-Brgy System | Announcements</title>
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
                        <div class="col card shadow-sm">

                            <div class="mt-3 d-flex">
                                <button type="button" class="btn btn-sm btn-primary text-uppercase" data-toggle="modal" data-target="#AddAnnouncementModal">Add Announcement</button>
                                <input type="text" class="form-control ml-2" id="searchInput" placeholder="Search">
                            </div>



                            <table class="table text-center" id="announcementTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($announcements as $announcement) : ?>
                                        <tr>
                                            <td><img src="<?php echo $announcement['image']; ?>" alt="Announcement Image" width="100"></td>
                                            <td><?php echo $announcement['title']; ?></td>
                                            <td><?php echo $announcement['details']; ?></td>
                                            <td><?php echo $announcement['date']; ?></td>
                                            <td>
                                                <!-- Add any action buttons or links here, e.g., edit or delete -->
                                                <button class="btn btn-info edit-btn" data-id="<?php echo $announcement['id']; ?>" data-image="<?php echo $announcement['image']; ?>" data-title="<?php echo $announcement['title']; ?>" data-details="<?php echo $announcement['details']; ?>" data-date="<?php echo $announcement['date']; ?>">
                                                    Edit
                                                </button>
                                                <form method="post" style="display: inline-block;">
                                                    <input type="hidden" name="announcement_id" value="<?php echo $announcement['id']; ?>">
                                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="AddAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="AddAnnouncementModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="AddAnnouncementModalLabel">Add Announcement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" id="image" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Details:</label>
                                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Announcement Modal -->
                <div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAnnouncementModalLabel">Edit Announcement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" id="edit_id" name="announcement_id">
                                    <div class="form-group">
                                        <label for="edit_image">Image:</label>
                                        <input type="file" class="form-control-file" id="edit_image" name="edit_image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_title">Title:</label>
                                        <input type="text" class="form-control" id="edit_title" name="edit_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_details">Details:</label>
                                        <textarea class="form-control" id="edit_details" name="edit_details" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_date">Date:</label>
                                        <input type="date" class="form-control" id="edit_date" name="edit_date">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
                                </div>
                            </form>
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

    <!-- <div class="modal fade" id="AddResidents" role="dialog">
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
    </div> -->
    <script src="./script.js"></script>

    <script>
        // JavaScript to handle click event on edit button and populate modal fields
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                // Get data attributes from the edit button
                var id = $(this).data('id');
                var image = $(this).data('image');
                var title = $(this).data('title');
                var details = $(this).data('details');
                var date = $(this).data('date');

                // Set values of modal fields with the retrieved data
                $('#edit_id').val(id);
                // $('#edit_image').val(image);
                $('#edit_title').val(title);
                $('#edit_details').val(details);
                $('#edit_date').val(date);

                // Show the edit modal
                $('#editAnnouncementModal').modal('show');
            });
        });
    </script>


    <script>
        // Get the input field and table
        var input = document.getElementById("searchInput");
        var table = document.getElementById("announcementTable");

        // Add event listener for input field
        input.addEventListener("input", function() {
            var filter = input.value.toUpperCase();
            var rows = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var found = false;
                for (var j = 0; j < cells.length; j++) {
                    var cellText = cells[j].innerText.toUpperCase();
                    if (cellText.indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
                if (found) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        });
    </script>

</body>




</html>