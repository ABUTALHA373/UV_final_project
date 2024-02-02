<?php
require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $con->real_escape_string($_POST['email']);

    // Use a prepared statement to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'exists';
    }

    // Close the statement
    $stmt->close();
}
?>