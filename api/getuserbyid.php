<?php
require '../config/db_con.php';

function fetchUserData($user_id)
{
    global $con;
    $sql = "SELECT email, phone_number, first_name, last_name, nid, dob, gender, marital_status, passport, status, is_verified, country, religion FROM users WHERE user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    } else {
        return ['error' => 'Error executing query'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['user_id'];  // Change this line
    $result = fetchUserData($user_id);
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

$con->close();
?>