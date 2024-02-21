<?php
require '../config/db_con.php';

function fetchDataFromDatabase($email,$user_id) {
    global $con;
    $sql = "SELECT email, phone_number, first_name, last_name, nid, dob, gender, marital_status, passport,status,is_verified, country, religion,profile_image_url FROM users WHERE email=? AND user_id=?";
    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss',$email,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    session_start();
    $email = $_SESSION['user_email'];
    $user_id = $_SESSION['user_id'];

    $result = fetchDataFromDatabase($email,$user_id);

    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo "Error: Conditions parameter is missing.";
}

$con->close();
?>