<?php
require '../config/db_con.php';

// Your security check, for example, checking for a specific parameter in the URL
if (!isset($_GET['secret_key']) || $_GET['secret_key'] !== 'your_secret_key') {
    // Redirect to the error page with appropriate parameters
    $errorType = 'Access Denied';
    $errorMessage = 'You do not have permission to access this page.';
    header("Location:error.php?type=$errorType&message=$errorMessage");
    exit;
}

if ($con->connect_error) {
    $errorType = 'Database Connection Error';
    $errorMessage = $con->connect_error;
    header("Location: error.php?type=$errorType&message=$errorMessage");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $con->real_escape_string($_POST['email']);
    
    // Check if the email exists in the "users" table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        echo 'exists';
    }
}
?>