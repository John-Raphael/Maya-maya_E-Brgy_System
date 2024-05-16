<?php
include 'variables.php';
include 'login.php';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `vw_item_history` WHERE `Status` = 'pending'";
$result = $conn->query($sql);
// json_encode($result);

if ($result->num_rows>0) { 
    echo $result->num_rows;
}

//echo '<div class="badge badge-info badge-pill" id="pending_item">0</div></a></li>';
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Notification: " . $row["description"];
    }
} else {
    echo "0 results";
}
*/
$conn->close();

?>