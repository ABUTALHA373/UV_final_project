<?php
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
session_start()

?>