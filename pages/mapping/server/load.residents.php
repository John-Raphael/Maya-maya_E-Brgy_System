<?php
// Include the file containing database connection variables
include '../../../php/variables.php';

// Initialize response array
$response = array();

// Check if address is provided in the POST request
if (isset($_POST['display_name'])) {
    // Retrieve address from the POST request
    // $address = $_POST['display_name'];
    $address = mysqli_real_escape_string($conn, $_POST['display_name']);
    // Log the value of $address
    // echo "Address received: " . $address;

    // Create a connection to the database
    // $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        $response = array(
            'success' => false,
            'message' => 'Connection failed: ' . mysqli_connect_error()
        );
    } else {
        // Prepare SQL statement to fetch resident information
        $sql = "SELECT * FROM `map-resident-info` WHERE address = ?";

        // Bind parameters and execute the statement
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $address);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch rows as associative array
            $residents = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $residents[] = $row;
            }
            // Prepare success response JSON
            $response = array(
                'success' => true,
                'extra' => $residents
            );
        } else {
            // No residents found for the provided address
            $response = array(
                'success' => false,
                'message' => 'No residents found for the provided address'
            );
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    // Address not provided in the POST request
    $response = array(
        'success' => false,
        'message' => 'Address not provided in the request'
    );
}

// Send response JSON
echo json_encode($response);
