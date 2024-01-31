<?php
require '../config/db_con.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $con->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $con->real_escape_string($_POST['first_name']);
    $last_name = $con->real_escape_string($_POST['last_name']);

    // Insert data into the "users" table
    $query = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$password', '$first_name', '$last_name')";

    if ($con->query($query) === TRUE) {
        // Set up a login session
        $_SESSION['user_email'] = $email;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_last_name'] = $last_name;

        // Redirect to profile.php
        header("Location: ../profile.php");
        exit;
    } else {
        $errorType = 'Database Error';
        $errorMessage = $con->error;
        header("Location: ../error.php?type=$errorType&message=$errorMessage");
        exit;
    }
}
?>