<!DOCTYPE html>
<?php
include '../../php/config.php';
// include '../../php/variables.php';
// include 'php/config.php';

?>

<?php
// Database connection details

// Create table if it doesn't exist
$tableName = "punongbrgy";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    image_url VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Process form submission

// if (isset($_POST['punongbrgy'])) {
//   // Escape user inputs for security
//   $name = $conn->real_escape_string($_POST['editName']);
//   $image_url = $conn->real_escape_string($_POST['editImage']);

//   // Check if the record already exists
//   // SQL query to check if the table exists
//   $checkTableSql = "SHOW TABLES LIKE '$tableName'";

//   // Execute the query
//   $result = $conn->query($checkTableSql);

//   if ($result->num_rows > 0) {
//     // Update existing record
//     $update_sql = "UPDATE $tableName SET image_url='$image_url', name='$name'";
//     if ($conn->query($update_sql) === TRUE) {
//       echo "Record updated successfully";
//     } else {
//       echo "Error updating record: " . $conn->error;
//     }
//   } else {
//     // Record doesn't exist, display an error message or take appropriate action
//     echo "Record does not exist for name: $name";
//   }
// }

if (isset($_POST['punongbrgy'])) {
  // Escape user inputs for security
  $name = $conn->real_escape_string($_POST['editName']);

  // Check if file has been uploaded
  if (isset($_FILES['editImage']) && $_FILES['editImage']['error'] === 0) {
    $file = $_FILES['editImage'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Check file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($file_ext, $allowed_extensions)) {
      // Generate a unique file name to prevent overwriting files with the same name
      $file_name_new = uniqid('', true) . '.' . $file_ext;
      $file_destination = 'uploads/' . $file_name_new;

      // Move the file to the uploads directory
      if (move_uploaded_file($file_tmp, $file_destination)) {
        // File uploaded successfully, now update the database
        $image_url = $conn->real_escape_string($file_destination);

        // Check if the record already exists
        // SQL query to check if the table exists
        $checkTableSql = "SHOW TABLES LIKE '$tableName'";

        // Execute the query
        $result = $conn->query($checkTableSql);

        if ($result->num_rows > 0) {
          // Update existing record
          $update_sql = "UPDATE $tableName SET image_url='$image_url', name='$name'";
          if ($conn->query($update_sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
        } else {
          // Record doesn't exist, display an error message or take appropriate action
          echo "Record does not exist for name: $name";
        }
      } else {
        echo "There was an error uploading the file.";
      }
    } else {
      echo "Invalid file extension. Allowed extensions: jpg, jpeg, png, gif";
    }
  } else {
    echo "No file uploaded or an error occurred.";
  }
}


// Fetch data from the table
$select_sql = "SELECT * FROM $tableName";
$result = $conn->query($select_sql);
$punongbrgyData = $result->fetch_assoc();

// Display fetched data
if ($result->num_rows > 0) {
  // echo "<table>";
  // echo "<tr><th>Name</th><th>Image URL</th></tr>";
  // while ($row = $result->fetch_assoc()) {
  //   echo "<tr><td>" . $row['name'] . "</td><td>" . $row['image_url'] . "</td></tr>";
  // }
  // echo "</table>";
} else {
  echo "No records found";
}



// Table name
$tableName = "brgy_officials";

// Check if the table exists
$checkTableSql = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($checkTableSql);

// If the table doesn't exist, create it
if ($result->num_rows == 0) {
  $createTableSql = "CREATE TABLE $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        image_url VARCHAR(255),
        position VARCHAR(50)
    )";

  if ($conn->query($createTableSql) === TRUE) {
    echo "Table $tableName created successfully.<br>";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Insert data into the table
if (isset($_POST['add_member'])) {
  // Escape user inputs for security
  $name = $conn->real_escape_string($_POST['name']);
  $position = $conn->real_escape_string($_POST['position']);

  // Check if file has been uploaded
  if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
    $file = $_FILES['image_url'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Move the uploaded file to a permanent location
    $upload_directory = 'member/'; // Specify the directory where you want to store uploaded images
    $file_destination = $upload_directory . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
      // File uploaded successfully, now update the database
      $image_url = $conn->real_escape_string($file_destination);

      // Insert data into the database
      $insertSql = "INSERT INTO $tableName (name, image_url, position) VALUES ('$name', '$image_url', '$position')";

      if ($conn->query($insertSql) === TRUE) {
        echo "New record added successfully.<br>";
      } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
    } else {
      echo "There was an error uploading the file.<br>";
    }
  } else {
    echo "No file uploaded or an error occurred.<br>";
  }
}



// Fetch data from the table
$select_sql1 = "SELECT * FROM $tableName";
$result1 = $conn->query($select_sql1);
$brgy_members = $result1->fetch_all(MYSQLI_ASSOC);


// Function to update member details
function updateMemberDetails($conn, $id, $name, $image_url, $position)
{
  // Prepare the update query
  $stmt = $conn->prepare("UPDATE brgy_officials SET name = ?, image_url = ?, position = ? WHERE id = ?");

  // Check if the query preparation was successful
  if (!$stmt) {
    die("Error in query preparation: " . $conn->error);
  }

  // Bind parameters to the statement
  $stmt->bind_param("sssi", $name, $image_url, $position, $id);

  // Execute the query
  $stmt->execute();

  // Check if the query execution was successful
  if ($stmt->affected_rows > 0) {
    return true; // Return true if update was successful
  } else {
    return false; // Return false if update failed
  }
}


// Check if the form is submitted
// Check if the form is submitted
if (isset($_POST['update_member'])) {
  // Get the form data
  $id = $_POST['memberId'];
  $name = $_POST['name'];
  $position = $_POST['position'];

  // Check if file has been uploaded
  if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
    $file = $_FILES['image_url'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Move the uploaded file to a permanent location
    $upload_directory = 'updateimage/'; // Specify the directory where you want to store uploaded images
    $file_destination = $upload_directory . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
      // File uploaded successfully, now update the database
      $image_url = $conn->real_escape_string($file_destination);

      // Call the updateMemberDetails function and pass the form data
      $result = updateMemberDetails($conn, $id, $name, $image_url, $position);

      // Check the result of the update operation
      if ($result) {
        echo "Member details updated successfully.";
        header("Location: " . $_SERVER['REQUEST_URI']);
      } else {
        echo "Failed to update member details.";
      }
    } else {
      echo "There was an error uploading the file.";
    }
  } else {
    // If no file uploaded, update member details without changing the image
    $image_url = $_POST['current_image_url']; // Assuming you have a hidden input field in your form to store the current image URL
    $result = updateMemberDetails($conn, $id, $name, $image_url, $position);

    // Check the result of the update operation
    if ($result) {
      echo "Member details updated successfully.";
      header("Location: " . $_SERVER['REQUEST_URI']);
    } else {
      echo "Failed to update member details.";
    }
  }
}


// Close connection
$conn->close();
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Maya-maya E-Brgy System | Barangay Officials </title>
  <!-- base:css -->
  <!-- DataTables CSS -->


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
                <div class="card-body pt-3 pt-3">
                  <h4 class="card-title-center m-0">Rresident | List</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="row d-flex justify-content-center">

            <div class="col-lg-12">
              <div class="d-flex justify-content-between">
                <h1>Brgy. Officials</h1>
                <button id="addMemberBtn" class="btn btn-danger">ADD BRGY. MEMBER</button>

              </div>
              <div class="row mt-4 mb-3">
                <div class="col-2">
                  <img src="<?= $punongbrgyData['image_url']; ?>" alt="" height="250" width="250">
                  <div class="text-center mt-3">
                    <h3><?= $punongbrgyData['name']; ?></h3>
                    <p>Punong Barangay</p>
                    <button id="editDetailsBtn" class="btn btn-danger">EDIT DETAILS</button>
                  </div>
                </div>
                <div class="col-10 card">
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search">
                  </div>
                  <table class="table" id="officialsTable">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($brgy_members as $key => $data) : ?>
                        <tr>
                          <th><img src="<?php echo $data['image_url']; ?>" class="d-block" width="110" height="110"></th>
                          <td class="memberName"><?php echo $data['name']; ?></td>
                          <td class="memberPosition"><?php echo $data['position']; ?></td>
                          <td class="memberImageUrl" style="display: none;"><?php echo $data['image_url']; ?></td>
                          <td>
                            <button class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal<?= $data['id']; ?>">Edit</button>
                          </td>
                        </tr>

                        <div class="modal fade" id="editModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form action="" method="post" enctype="multipart/form-data">
                              <div class=" modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editModalLabel">Edit Official</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <input type="hidden" id="memberId" name="memberId" value="<?php echo $data['id']; ?>">
                                  <div class="form-group">
                                    <label for="memberName">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $data['name']; ?>" name="name" id="memberName" placeholder="Enter name">
                                  </div>
                                  <div class="form-group">
                                    <label for="memberImageUrl">Image</label>
                                    <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" value="<?php echo $data['image_url']; ?>" name="image_url" id="memberImageUrl" placeholder="Enter image URL" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="memberPosition">Position</label>
                                    <select class="form-control" name="position" id="memberPosition">
                                      <option value="Kagawad" <?php if ($data['position'] == 'Kagawad') echo 'selected'; ?>>Kagawad</option>
                                      <option value="Secretary" <?php if ($data['position'] == 'Secretary') echo 'selected'; ?>>Secretary</option>
                                      <option value="Treasurer" <?php if ($data['position'] == 'Treasurer') echo 'selected'; ?>>Treasurer</option>
                                      <option value="Sk Chairman" <?php if ($data['position'] == 'Sk Chairman') echo 'selected'; ?>>Sk Chairman</option>
                                    </select>

                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                  <button type="Submit" class="btn btn-primary" name="update_member" id="saveChanges">Save changes</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                      <?php endforeach; ?>
                      <!-- <tr>
                        <td><img src="https://media.assettype.com/sunstar%2Fimport%2Fuploads%2Fimages%2F2020%2F04%2F24%2F225920.jpg" width="50" height="50"></th>
                        <td>Mark</td>
                        <td>Sk Chairman</td>
                        <td><button class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal">Edit</button></td>
                      </tr>
                      <tr>
                        <th><img src="https://media.assettype.com/sunstar%2Fimport%2Fuploads%2Fimages%2F2020%2F04%2F24%2F225920.jpg" width="50" height="50"></th>
                        <td>John Wick 2</td>
                        <td>Kagawad</td>
                        <td><button class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal">Edit</button></td>
                      </tr> -->
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            <!-- <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <h2 class="text-center text-light bg-dark p-3 text-uppercase display-4">Barangay Officials</h2>
                <div class="card-body">
                  <h4 class="card-title d-none">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="input-group d-flex flex-row-reverse">
                          <input class="form-control" type="text" id="searchKeyword" onkeyup="searchData(6)" placeholder="search resident id or resident name">
                          <div class="input-group-append">
                            <span onclick="togglesearch()" class="input-group-text text-light pl-5 pr-5" style="background-color: rgb(91, 178, 235);">
                              <i class="icon-search"></i> search
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-light d-none">
                        <tr>
                          <th> Designation </th>
                          <th> Name </th>
                        </tr>
                      </thead>
                      <form class="form-sample" action="../../php/config.php" method="post">
                        <tbody id="dataTable"> num_rows > 0) {
                          while ($ofcl = $official_list->fetch_assoc()) { ?>
                          <tr>
                            <td width="35%" class="font-weight-bold"></td>
                            <td width="65%"></td>
                          </tr>

                          <div class="p-3 mb-2 bg-info text-white text-center">
                            No data Recorded
                          </div>

                        </tbody>
                      </form>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>


        <!-- edit modal for punong barangay -->
        <div class="modal fade" id="editDetailsModal" tabindex="-1" role="dialog" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form id="editDetailsForm" method="post" enctype="multipart/form-data">
              <div class=" modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editDetailsModalLabel">Edit Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="editName">Name</label>
                    <input type="text" class="form-control" id="editName" name="editName" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="editImage">Image</label>
                    <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" id="editImage" name="editImage" placeholder="Enter image URL">
                  </div>

                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary" name="punongbrgy" id="saveChanges">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Add Barangay Member Modal -->
        <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form id="addMemberForm" method="post" action="" enctype="multipart/form-data">
              <div class=" modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addMemberModalLabel">Add Barangay Member</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="memberName">Name</label>
                    <input type="text" class="form-control" name="name" id="memberName" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="memberImage">Image</label>
                    <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="image_url" id="memberImage">
                  </div>
                  <div class="form-group">
                    <label for="memberPosition">Position</label>
                    <select class="form-control" name="position" id="memberPosition">
                      <option value="Kagawad">Kagawad</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                      <option value="Sk Chairman">Sk Chairman</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary" name="add_member" id="addMemberBtn">Add Member</button>
                </div>
              </div>
            </form>
          </div>
        </div>




        <!-- Edit modal -->
        <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editForm">
                  <input type="hidden" id="memberId" value="">
                  <div class="form-group">
                    <label for="memberName">Name</label>
                    <input type="text" class="form-control" name="name" id="memberName" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="memberImageUrl">Image URL</label>
                    <input type="text" class="form-control" name="image_url" id="memberImageUrl" placeholder="Enter image URL">
                  </div>
                  <div class="form-group">
                    <label for="memberPosition">Position</label>
                    <select class="form-control" id="memberPosition">
                      <option value="Kagawad">Kagawad</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                      <option value="Sk Chairman">Sk Chairman</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
              </div>
            </div>
          </div>
        </div> -->



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
<script>
  function searchData(dataCol) {
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
  $(document).ready(function() {
    // Trigger modal on button click
    $('#editDetailsBtn').click(function() {
      $('#editDetailsModal').modal('show');
    });

    // Save changes
    $('#saveChanges').click(function() {
      var name = $('#editName').val();
      var image = $('#editImage').val();
      // You can perform further actions like sending data to the server here
      // For now, just log the data
      console.log("Name: " + name + ", Image: " + image);
      $('#editDetailsModal').modal('hide');
    });
  });
</script>


<script>
  $(document).ready(function() {
    // Trigger modal on button click
    $('#addMemberBtn').click(function() {
      $('#addMemberModal').modal('show');
    });

    // Add member
    $('#addMemberBtn').click(function() {
      var name = $('#memberName').val();
      var image = $('#memberImage').val();
      var position = $('#memberPosition').val();
      // You can perform further actions like sending data to the server here
      // For now, just log the data
      console.log("Name: " + name + ", Image: " + image + ", Position: " + position);
      $('#addMemberModal').modal('hide');
    });
  });
</script>

<script>
  // Get the input field and table
  var input = document.getElementById("searchInput");
  var table = document.getElementById("officialsTable");

  // Add event listener for input field
  input.addEventListener("input", function() {
    var filter = input.value.toUpperCase();
    var rows = table.getElementsByTagName("tr");

    // Loop through all table rows, starting from index 1 (to skip the header row)
    for (var i = 1; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName("td");
      var found = false;
      for (var j = 1; j < cells.length; j++) { // Start from index 1 to skip the first cell (Image)
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

<!-- <script>
  // Add event listener to edit buttons
  var editButtons = document.querySelectorAll('.editBtn');
  editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var row = button.closest('tr');
      var cells = row.querySelectorAll('td');
      var name = cells[1].innerText.trim();
      var position = cells[2].innerText.trim();
      document.getElementById('editName').value = name;
      document.getElementById('editPosition').value = position;
    });
  });
</script> -->

<!-- <script>
  // Script to populate modal fields with member data
  $('.editBtn').on('click', function() {
    var row = $(this).closest('tr');
    var memberId = row.find('.memberId').text();
    var name = row.find('.memberName').text();
    var imageUrl = row.find('.memberImageUrl').text();
    var position = row.find('.memberPosition').text();

    $('#memberId').val(memberId);
    $('#memberName').val(name);
    $('#memberImageUrl').val(imageUrl);
    $('#memberPosition').val(position);
  });

  // Script to save changes and update table row
  $('#saveChanges').on('click', function() {
    var memberId = $('#memberId').val();
    var name = $('#memberName').val();
    var imageUrl = $('#memberImageUrl').val();
    var position = $('#memberPosition').val();

    // Update table row with edited values
    var row = $('tr[data-memberid="' + memberId + '"]');
    row.find('.memberName').text(name);
    row.find('.memberImageUrl').text(imageUrl);
    row.find('.memberImageUrl').prev('th').find('img').attr('src', imageUrl);
    row.find('.memberPosition').text(position);

    $('#editModal').modal('hide'); // Hide modal after updating
  });
</script> -->


</html>