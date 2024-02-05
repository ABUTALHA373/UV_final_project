<?php
require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $primaryKey = $_POST['primaryKey'];
    $primaryColumn = $_POST['primaryColumn'];
    $columnToChange = $_POST['columnToChange'];
    $valueToUpdate = $_POST['valueToUpdate'];
    //UPDATE `users` SET `status`='blocked' WHERE user_id=56

    $sql = "UPDATE $table SET $columnToChange = ? WHERE $primaryColumn = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $valueToUpdate, $primaryKey);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Record updated successfully']);
    } else {
        echo json_encode(['error' => 'Error updating record']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

$con->close();

//called from admin/users
?>