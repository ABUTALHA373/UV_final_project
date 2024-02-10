<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$database = 'db_bookitfast';
$con = new mysqli($host, $db_user, $db_password, $database);

if (isset($_SESSION['user_id'])) {
    $q = "SELECT status from users where user_id = ?";
    $prep = $con->prepare($q);
    $prep->bind_param('i', $_SESSION['user_id']);
    $prep->execute();
    $res = $prep->get_result();

    $status = $res->fetch_all(MYSQLI_ASSOC);

    if (!empty($status)) {
        $_SESSION['user_status'] = $status[0]['status'];
        // echo $_SESSION['user_status'];
    }
}
?>