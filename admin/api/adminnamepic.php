<?php
require '../../config/db_con.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['table'])) {
    $table = $_GET['table'];
    $id = $_SESSION['admin_id'];

    $stmt = $con->prepare("SELECT admin_name, profile_image_url FROM $table WHERE admin_id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {

    $flights = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($flights);
    
    }else{
        echo json_encode(['error' => 'no result']);
    }
} else {
    echo json_encode(['error' => 'Table name not provided']);
}

$con->close();
?>