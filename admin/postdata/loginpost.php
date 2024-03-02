<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $con->real_escape_string($_POST['id']);
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM admins WHERE admin_id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == 'active') {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_hotel_id'] = $row['admin_hotel_id'];
                $_SESSION['admin_air_id'] = $row['admin_air_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_type'] = $row['admin_type'];
                $_SESSION['admin_status'] = $row['status'];

                header("Location: ../index.php");
                exit;
            } else {
                $message = urlencode('error_password');
                header("Location: ../login.php?error=$message");
                exit;
            }
        } elseif ($row['status'] == 'blocked') {
            $message = urlencode('user_blocked');
            header("Location: ../login.php?error=$message");
            exit;
        }
    } else {
        $message = urlencode('error_id');
        header("Location: ../login.php?error=$message");
        exit;
    }

    $stmt->close();
}