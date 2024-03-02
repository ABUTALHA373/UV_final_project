<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $map = $_POST['map'];

    if ($mode === 'update') {

        $sql = "UPDATE emergency_contacts SET contact_type = ?, name = ?, phone_number = ?, address = ?, location = ?, map_link = ? WHERE contact_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $type, $name, $phone, $address, $location, $map, $id);
    } else if ($mode === 'add') {
        $sql = "INSERT INTO emergency_contacts (contact_type, name, phone_number, address, location, map_link) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssss", $type, $name, $phone, $address, $location, $map,);
    }


    $stmt->execute();

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
 
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method']);
}