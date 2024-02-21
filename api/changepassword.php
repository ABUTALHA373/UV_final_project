<?php
require '../config/db_con.php';
session_start();
$email = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];
function checkCurrentPassword($current_password)
{
    global $con;
    global $email;
    global $user_id;
    $sql = "SELECT password FROM users WHERE email=? AND user_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $email, $user_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();
        // Check if the entered current password matches the stored hashed password
        if (password_verify($current_password, $hashed_password)) {
            return true;
        }
    }
    return false;
}
function changePasswordInDatabase($new_password)
{
    global $con;
    global $email;
    global $user_id;
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password=? WHERE email=? AND user_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sss', $hashed_password, $email, $user_id);
    if ($stmt->execute()) {
        $stmt->close();
        return 'success';
    } else {
        $stmt->close();
        return 'invalid';
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $current_password = $con->real_escape_string($_POST['current_password']);
        $new_password = $con->real_escape_string($_POST['new_password']);
        if($current_password===$new_password){
            echo 'oldpassword';
        }else{
            if (checkCurrentPassword($current_password)) {
                $result = changePasswordInDatabase($new_password);
                echo $result;
            } else {
                echo 'incorrect_password';
            }
        }
} else {
    echo 'invalid';
}
$con->close();
?>