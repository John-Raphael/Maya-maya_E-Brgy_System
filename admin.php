<!DOCTYPE html>
<?php

include 'php/variables.php';
include 'php/config.php';
// include 'php/config.php';

// Function to retrieve announcements
function getAnnouncements()
{
  global $conn;
  $stmt = $conn->query("SELECT * FROM announcements");
  return $stmt->fetch_all(MYSQLI_ASSOC);
}

// Fetch announcements
$announcements = getAnnouncements();

// Format announcements as events
$events = array();
foreach ($announcements as $announcement) {
  $event = array(
    'title' => $announcement['title'],
    'start' => $announcement['date'], // Assuming 'date' field contains the event date
    'image' => $announcement['image'], // Include the image path
    'details' => $announcement['details'], // Include the image path
    // You can add more event properties as needed
  );
  array_push($events, $event);
}

// Convert events array to JSON
$eventsJSON = json_encode($events);
?>


<?php
// Assuming you already established a database connection

// Define the values you want to count occurrences of
$value1 = "Senior";
$value2 = "PWD";

// Construct the SQL query
$query = "SELECT COUNT(*) AS count FROM tbl_resident WHERE Senior_PWD_NO = ? OR Senior_PWD_NO = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameters
mysqli_stmt_bind_param($stmt, "ss", $value1, $value2); // Assuming two columns for demonstration

// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result variable
mysqli_stmt_bind_result($stmt, $count);

// Fetch the result
mysqli_stmt_fetch($stmt);

// Output the count
// echo "Number of rows with value Senior or PWD in Senior_PWD_NO column: $count";

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Maya-maya | Admin</title>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });
  </script>
  <!-- base:css -->
  <?= $DashboardPlugins ?>
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?= $Navigation ?>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo_v2_wht.png" height="50" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo_v2.png" alt="logo" /></a>
          </div>
          <h4 class="font-weight-bold mb-0 d-none mt-1">Barangay 31, Maya-maya,Cavite City, </h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none">Mar 12, 2019 - Apr 10, 2019</h4>
            </li>
            <li class="nav-item dropdown mr-2">
              <a class="border nav-link dropdown-toggle bg-light p-2 text-dark" id="profileDropdown" href="#" data-toggle="dropdown">
                <img class="mr-1" src="images/faces/<?= $_SESSION['userGender'] ?>.png" height="30px" alt="profile" />
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


      <!-- <div class="clock" style="font-family: Arial, sans-serif;
              font-size: 20px;
              background-color: #ADD8E6;
              padding: 10px;
              border: 2px solid #333;
              border-radius: 10px;
              display: flex;
              justify-content: center;
              align-items: center;
              width:10%;">
        <div id="date"></div>
        <div id="time"></div>
      </div> -->

      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row w-100 flex-grow d-flex justify-content-center">



            <div class="col-lg-4 grid-margin">
              <div class="card bg-primary align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-calendar-clock text-white icon-lg mr-3"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <div class="text-white font-weight-bold z-1" id="date"></div>
                      <div class="mt-2 text-white card-text" id="time"></div>


                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 grid-margin">
              <div class="card bg-warning align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-account text-white icon-lg mr-3"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold"><?= $resident_count ?> Residents</h5>
                      <p class="mt-2 text-white card-text">Active Population</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 grid-margin">
              <div class="card bg-success align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-library text-white icon-lg mr-3"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold"><?= $voter_resident_count ?> Voters</h5>
                      <p class="mt-2 text-white card-text">Registered Voters</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row w-100 flex-grow d-flex justify-content-center">
              <div class="col-lg-4 grid-margin">
                <div class="card bg-danger align-items-center">
                  <div class="card-body py-5">
                    <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                      <i class="mdi mdi-gender-female text-white icon-lg mr-3"></i>
                      <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold"><?= $female_resident_count ?> Female</h5>
                        <p class="mt-2 text-white card-text">Active Female Residents</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 grid-margin">
                <div class="card bg-info align-items-center">
                  <div class="card-body py-5">
                    <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                      <i class="mdi mdi mdi-gender-male text-white icon-lg mr-3"></i>
                      <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold"><?= $male_resident_count ?> Male</h5>
                        <p class="mt-2 text-white card-text">Active Male Resident</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 grid-margin">
                <div class="card bg-secondary align-items-center">
                  <div class="card-body py-5">
                    <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                      <i class="mdi mdi-wheelchair-accessibility text-white icon-lg mr-3"></i>
                      <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold"><?= $count; ?> PWD/Senior</h5>
                        <p class="mt-2 text-white card-text">Active PWD/Senior</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-lg-12 col-12">
              <div class="row justify-content-center mb-4">
                <div class="col-12 col-lg-8 card p-3">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="row w-100 flex-grow">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card p-5">
                      <div class="card-body">
                        <h1 class="text-center text-uppercase pb-0">
                          <i class="mdi mdi-book-open-variant text-info display-1"></i>
                        </h1>
                        <h2 class="text-center text-uppercase pb-2 pt-0">Mission</h2>
                        <p class="display-5 text-center">
                          1. To provide program in education. <br>
                          2. To provide livelihood program to low income underemployed residents in the barangay. <br>
                          3. To provide a companionate public.
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- VISION -->
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card p-5">
                      <div class="card-body">
                        <h1 class="text-center text-uppercase pb-0">
                          <i class="mdi mdi-library text-info display-1"></i>
                        </h1>
                        <h2 class="text-center text-uppercase pb-2 pt-0">Vision</h2>
                        <p class="display-5 text-center">
                          A Good Fearing, peaceful, clean and unified
                          Barangay guided by Honest and reponsive officials looking after the
                          Benifit and walfare of its Constituients.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- row end -->

            <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="announcementModalTitle">Announcement Details</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                  </div>
                  <div class="modal-body" id="announcementModalBody">
                    <!-- Announcement details will be displayed here -->
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div> -->
                </div>
              </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:./partials/_footer.html -->
            <footer class="footer d-none">
              <div class="card">
                <div class="card-body">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                  </div>
                </div>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      <!-- base:js -->
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <script src="vendors/chart.js/Chart.min.js"></script>
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <!-- endinject -->
      <!-- plugin js for this page -->
      <!-- End plugin js for this page -->
      <!-- Custom js for this page-->
      <script src="js/dashboard.js"></script>
      <!-- End custom js for this page-->
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
      xhttp.open("GET", "php/count_items_pending.php", true);
      xhttp.send();

    }, 500);


  }
  loadDoc();
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: <?php echo $eventsJSON; ?>,
      eventClick: function(info) {
        // Call a function to display details when an event is clicked
        displayAnnouncementDetails(info.event);
      }
    });

    calendar.render();
  });

  function displayAnnouncementDetails(event) {

    // Get the announcement details
    var title = event.title;
    var details = event.extendedProps.details; // Additional details
    var date = event.start.toDateString(); // Convert date to string format
    var image = event.extendedProps.image; // Assuming the image path is stored in the extendedProps

    // Set the modal title and body
    var modalTitle = document.getElementById('announcementModalTitle');
    var modalBody = document.getElementById('announcementModalBody');
    modalTitle.innerHTML = title;
    modalBody.innerHTML = '<p>Date: ' + date + '</p>';
    modalBody.innerHTML += '<p>Details: ' + details + '</p>';

    // Construct the image HTML with centering
    var imageHTML = '<div class="text-center">';
    imageHTML += '<img src="./pages/announcements/' + event.extendedProps.image + '" alt="Announcement Image" class="img-fluid" style="max-width: 100%; height: auto;">';
    imageHTML += '</div>';

    // Append the image HTML to the modal body
    modalBody.innerHTML += imageHTML;

    // Show the modal
    var announcementModal = new bootstrap.Modal(document.getElementById('announcementModal'));
    announcementModal.show();
  }
</script>

<script>
  function updateClock() {
    const now = new Date();
    const date = now.toDateString();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('date').textContent = date;
    document.getElementById('time').textContent = `${hours}:${minutes}:${seconds}`;
  }

  // Update the clock every second
  setInterval(updateClock, 1000);

  // Initial call to display the clock immediately
  updateClock();
</script>



</html>