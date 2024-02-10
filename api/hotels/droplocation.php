<?php
// Include your database connection file
require '../../config/db_con.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch location data from the hotels table using a prepared statement
    $query = "SELECT DISTINCT location FROM hotels";
    $stmt = $con->prepare($query);

    if (!$stmt) {
        die('Prepare statement failed: ' . $con->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the locations
    $locations = array();

    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $con->close();

    // Set the Content-Type header and echo the JSON-encoded data
    header('Content-Type: application/json');
    echo json_encode($locations);
}