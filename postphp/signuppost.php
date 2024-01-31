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
    $name = $first_name ." ". $last_name;

    // Generate a unique confirmation code
    $verification_token = uniqid();
    // Generate a unique token for "stay logged in" functionality
    $stayLoggedInToken = bin2hex(random_bytes(32));

    $query = "INSERT INTO users (email, password, first_name, last_name, verification_token, remember_token) VALUES ('$email', '$password', '$first_name', '$last_name', '$verification_token', '$stayLoggedInToken')";

    if ($con->query($query) === TRUE) {

        $_SESSION['user_email'] = $email;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_last_name'] = $last_name;

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

        $htmlContent = file_get_contents('email_template.php');
        $htmlContent = str_replace('{{verification_token}}', $verification_token, $htmlContent);
        $htmlContent = str_replace('{{Username}}', $name, $htmlContent);

        // $mail->Body = 'Click the following link to confirm your email: <a href="localhost/fp/profile/confirm.php?code=' . $verification_token . '">Confirm</a>';
        $mail->Body    = $htmlContent;
        try {
            $mail->send();
            // Set a cookie with the stay logged in token
            setcookie('stay_logged_in_token', $stayLoggedInToken, time() + (30 * 24 * 3600), '/'); 

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