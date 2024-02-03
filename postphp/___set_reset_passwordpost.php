<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require '../config/db_con.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['rp_email'])) {
    $email = $con->real_escape_string($_POST['rp_email']);
    // Generate a unique confirmation code
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['first_name'] . ' ' . $row['first_name'];
        if ($row['status'] == 'active') {
            $verification_token = uniqid();
            $insert_query = "UPDATE users SET password_reset_token = ? WHERE email = ?";
            $insert_stmt = $con->prepare($insert_query);
            $insert_stmt->bind_param("ss", $verification_token, $email);
            if ($insert_stmt->execute()) {
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

                $htmlContent = file_get_contents('reset_pass_template.php.php');
                $htmlContent = str_replace('{{verification_token}}', $verification_token, $htmlContent);
                $htmlContent = str_replace('{{Username}}', $name, $htmlContent);

                $mail->Body = $htmlContent;
                try {
                    $mail->send();
                    header("Location: ../profile/confirm_email.php");
                    exit;
                } catch (Exception $e) {
                    $message = urlencode('mail_error');
                    header("Location: ../reset_password.php?message=$message&message=$errorMessage");
                    exit;
                }
            } else {
                $message = urlencode('token_error');
                header("Location: ../reset_password.php?message=$message");
                exit;
            }
        } elseif ($row['status'] == 'blocked') {
            $message = urlencode('blocked');
            header("Location: ../reset_password.php?message=$message");
            exit;
        } elseif ($row['status'] == 'deleted') {
            $message = urlencode('deleted');
            header("Location: ../reset_password.php?message=$message");
            exit;
        }
    } else {
        $message = urlencode('user_not_found');
        header("Location: ../reset_password.php?message=$message");
        exit;
    }
}