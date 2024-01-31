<?php
require '../config/db_con.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $con->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $con->real_escape_string($_POST['first_name']);
    $last_name = $con->real_escape_string($_POST['last_name']);

    // Generate a unique confirmation code
    $verification_token = uniqid();

    // Generate a unique token for "stay logged in" functionality
    $stayLoggedInToken = bin2hex(random_bytes(32));

    // Insert data into the "users" table including the stay logged in token and confirmation code
    $query = "INSERT INTO users (email, password, first_name, last_name, confirmation_code, verification_token) VALUES ('$email', '$password', '$first_name', '$last_name', '$verification_token', '$stayLoggedInToken')";

    if ($con->query($query) === TRUE) {
        // Send confirmation email
        $subject = 'Confirm Your Email';
        $message = 'Click the following link to confirm your email: <a href="http://yourdomain.com/confirm.php?code=' . $verification_token . '">Confirm</a>';
        $headers = 'Content-type: text/html';
        mail($email, $subject, $message, $headers);

        // Set a cookie with the stay logged in token
        setcookie('stay_logged_in_token', $stayLoggedInToken, time() + (30 * 24 * 3600), '/'); // Cookie expires in 30 days

        // Redirect to a page indicating that a confirmation email has been sent
        header("Location: ../confirm_sent.php");
        exit;
    } else {
        $errorType = 'Database Error';
        $errorMessage = $con->error;
        header("Location: ../error.php?type=$errorType&message=$errorMessage");
        exit;
    }
}
?>