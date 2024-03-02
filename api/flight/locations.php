<?php
require '../../config/db_con.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $ctype = $_GET['ctype'];
    $query = "SELECT DISTINCT $ctype FROM flights";
    $stmt = $con->prepare($query);

    if (!$stmt) {
        die('Prepare statement failed: ' . $con->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $locations = array();

    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }

    $stmt->close();

    $con->close();

    header('Content-Type: application/json');
    echo json_encode($locations);
}