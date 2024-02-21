<?php
session_start();
require '../config/db_con.php';

if (isset($_GET['table']) && isset($_GET['column']) && isset($_GET['value'])) {
    $table = $_GET['table'];
    $column = $_GET['column'];
    if($_GET['value']==='user_id'){
        $value = $_SESSION['user_id'];
    }else{
        $value = $_GET['value'];
    }

    $stmt = $con->prepare("SELECT * FROM $table WHERE $column = ?");
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo json_encode("error");
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Table name, column name, or value not provided']);
}
//profile.php
$con->close();
?>