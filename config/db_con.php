<?php

// define('BASE_URL', '/');
// $host = 'sql300.infinityfree.com';
// $db_user = 'if0_35799802';
// $db_password = 'Pj24dX76BuWgXyW';
// $database = 'if0_35799802_db_bookitfast';

define('BASE_URL', '/fp/');
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$database = 'db_bookitfast';

$con = new mysqli($host, $db_user, $db_password, $database);

if ($con->connect_error) {
    // Redirect to error.php page with error details
    $errorType = 'Database Connection Error';
    $errorMessage = $con->connect_error;
    header("Location: error.php?type=$errorType&message=$errorMessage");
    exit;
}
// session_start();
// $isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
// $isVerified = isset($_SESSION['user_is_verified']);
// if(!$isLoggedIn){
//     header('Location:./login.php');
// }

?>