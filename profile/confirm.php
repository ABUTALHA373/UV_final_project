<?php
require '../config/db_con.php';
session_start();

if (isset($_GET['code'])) {
    $confirmationCode = $con->real_escape_string($_GET['code']);

    // Check if the confirmation code exists in the database
    $query = "SELECT * FROM users WHERE verification_token = '$confirmationCode'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // Update the user's status as confirmed
        $updateQuery = "UPDATE users SET is_verified = 1 WHERE verification_token = '$confirmationCode'";
        $con->query($updateQuery);

        // Redirect to a success page
        header("Location: ../confirm_success.php");
        exit;
    } else {
        // Redirect to a page indicating that the confirmation code is invalid
        header("Location: ../confirm_invalid.php");
        exit;
    }
} else {
    // Redirect to a page indicating that the confirmation code is missing
    header("Location: ../confirm_missing.php");
    exit;
}
?>