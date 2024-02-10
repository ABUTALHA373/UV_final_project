<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require '../config/db_con.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $con->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $con->real_escape_string($_POST['first_name']);
    $last_name = $con->real_escape_string($_POST['last_name']);
    $name = $first_name . " " . $last_name;

    // Generate a unique confirmation code
    $verification_token = uniqid();
    // Generate a unique token for "stay logged in" functionality
    $stayLoggedInToken = bin2hex(random_bytes(32));
    $status = 'active';

    // Insert user data into the "users" table
    $insert_query = "INSERT INTO users (email, password, first_name, last_name, verification_token, remember_token, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $con->prepare($insert_query);
    $insert_stmt->bind_param("sssssss", $email, $password, $first_name, $last_name, $verification_token, $stayLoggedInToken, $status);

    if ($insert_stmt->execute()) {

        $_SESSION['user_email'] = $email;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_last_name'] = $last_name;

        // Select user data to set session variables
        $select_query = "SELECT user_id, is_verified FROM users WHERE email=? AND first_name=? AND last_name=?";
        $select_stmt = $con->prepare($select_query);
        $select_stmt->bind_param("sss", $email, $first_name, $last_name);

        if ($select_stmt->execute()) {
            $select_stmt->bind_result($user_id, $is_verified);
            if ($select_stmt->fetch()) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_is_verified'] = $is_verified;
                $_SESSION['user_status'] = $row['status'];
            } else {
                $errorType = 'Database Error';
                $errorMessage = 'User with the provided details not found.';
                header("Location: ../error.php?type=$errorType&message=$errorMessage");
                exit;
            }

            $select_stmt->close();
        } else {
            // Handle the query execution error
            $errorType = 'Database Error';
            $errorMessage = $con->error;
            header("Location: ../error.php?type=$errorType&message=$errorMessage");
            exit;
        }

        // Sending email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info.bookitfast@gmail.com';
        $mail->Password = 'adnftozakekfsbpf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('info.bookitfast@gmail.com');

        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Confirm Your Email';

        $htmlContent = file_get_contents('email_verification_template.php');
        $htmlContent = str_replace('{{verification_token}}', $verification_token, $htmlContent);
        $htmlContent = str_replace('{{Username}}', $name, $htmlContent);

        $mail->Body    = $htmlContent;
        try {
            $mail->send();

            // Set a cookie with the stay logged in token
            $cookie_data = base64_encode(json_encode([
                'user_email' => $email,
                'user_id' => $user_id,
                'user_remember_token' => $stayLoggedInToken,
            ]));
            setcookie('remember_me', $cookie_data, time() + (7 * 24 * 60 * 60), '/');

            header("Location: ../profile/confirm_email.php");
            exit;
        } catch (Exception $e) {
            $errorType = 'Email Error';
            $errorMessage = $mail->ErrorInfo;
            header("Location: ../error.php?type=$errorType&message=$errorMessage");
            exit;
        }
    } else {
        $errorType = 'Database Error';
        $errorMessage = $con->error;
        header("Location: ../error.php?type=$errorType&message=$errorMessage");
        exit;
    }
}
?>