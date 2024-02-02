<?php
require '../config/db_con.php';
session_start();
$email = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];

function updateDataInDatabase($phone_number, $first_name, $last_name, $nid, $gender, $marital_status, $passport, $country, $religion, $dob)
{
    global $con;
    global $email;
    global $user_id;
    
    $sql = "UPDATE users SET phone_number=?, first_name=?, last_name=?, nid=?, gender=?, marital_status=?, passport=?, country=?, religion=?, dob=? WHERE email=? AND user_id=?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssssssssssss', $phone_number, $first_name, $last_name, $nid, $gender, $marital_status, $passport, $country, $religion, $dob, $email, $user_id);

    if ($stmt->execute()) {
        $stmt->close();
        return 'success';
    } else {
        $stmt->close();
        return 'invalid';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have these fields in your update form
    $phone_number = $con->real_escape_string($_POST['phone_number']);
    $first_name = $con->real_escape_string($_POST['first_name']);
    $last_name = $con->real_escape_string($_POST['last_name']);
    $nid = $con->real_escape_string($_POST['nid']);
    $gender = $con->real_escape_string($_POST['gender']);
    $marital_status = $con->real_escape_string($_POST['marital_status']);
    $passport = $con->real_escape_string($_POST['passport']);
    $country = $con->real_escape_string($_POST['country']);
    $religion = $con->real_escape_string($_POST['religion']);
    $dob = $con->real_escape_string($_POST['dob']);

    // Update the data in the database
    $result = updateDataInDatabase($phone_number, $first_name, $last_name, $nid, $gender, $marital_status, $passport, $country, $religion, $dob);

    // Return the result as a JSON response
    echo $result;
} else {
    echo 'invalid';
}

$con->close();
?>