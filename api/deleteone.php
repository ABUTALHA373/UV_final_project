<?php
require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $primaryKey = $_POST['primaryKey'];
    $primaryColumn = $_POST['primaryColumn'];

    // DELETE FROM `users` WHERE user_id=56
    $sql = "DELETE FROM $table WHERE $primaryColumn = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $primaryKey);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Record deleted successfully']);
    } else {
        echo json_encode(['error' => 'Error deleting record']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

//admin >> users
$con->close();
?>