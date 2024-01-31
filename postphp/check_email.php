<?php
require '../config/db_con.php';


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