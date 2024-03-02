<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$database = 'db_bookitfast';

// define('BASE_URL', '/fp/');
// $host = 'sql300.infinityfree.com';
// $db_user = 'if0_35799802';
// $db_password = 'Pj24dX76BuWgXyW';
// $database = 'if0_35799802_db_bookitfast';

$con = new mysqli($host, $db_user, $db_password, $database);

// Start the session
session_start();

if (isset($_SESSION['admin_id'])) {
    $q = "SELECT status, admin_type FROM admins WHERE admin_id = ?";
    $prep = $con->prepare($q);

    if (!$prep) {
        die("Error in preparing statement: " . $con->error);
    }

    $prep->bind_param('s', $_SESSION['admin_id']);
    $result = $prep->execute();

    if (!$result) {
        die("Error in executing statement: " . $prep->error);
    }

    $res = $prep->get_result();

    if ($res->num_rows > 0) {
        $status = $res->fetch_assoc();
        $_SESSION['admin_status'] = $status['status'];
        $_SESSION['admin_type'] = $status['admin_type'];
    }
    
    // Close the prepared statement
    $prep->close();
}


?>