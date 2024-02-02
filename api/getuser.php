<?php
require '../config/db_con.php';

function fetchDataFromDatabase($email,$user_id) {
    global $con;
    $sql = "SELECT email, phone_number, first_name, last_name, nid, dob, gender, marital_status, passport, country, religion FROM users WHERE email=? AND user_id=?";
    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss',$email,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'])  && isset($_GET['user_id'])) {

    $email = $con->real_escape_string($_GET['email']);
    $user_id = $con->real_escape_string($_GET['user_id']);

    $result = fetchDataFromDatabase($email,$user_id);

    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo "Error: Conditions parameter is missing.";
}

$con->close();
?>