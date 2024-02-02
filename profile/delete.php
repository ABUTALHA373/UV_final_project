<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);

// Check if the user is logged in
if (!$isLoggedIn) {
    header('Location: ./login.php');
    exit();
}else{
    require '../config/db_con.php';

    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['user_email'];
    
    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE user_id = ? AND email = ? AND status = 'active'";
    $stmt = $con->prepare($query);
    $stmt->bind_param('is', $user_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // User found, update the status to 'deleted'
        $updateQuery = "UPDATE users SET status = 'deleted' WHERE user_id = ?";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->bind_param('i', $user_id);
    
        if ($updateStmt->execute()) {
            // Update successful
            session_destroy();
            header('Location: ./deleted_account_message.php');
            exit();
        }
        
    $updateStmt->close();
    }
    
    // Close database connection
    $stmt->close();
    $con->close();
}

?>