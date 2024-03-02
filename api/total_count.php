<?php
require '../config/db_con.php';
if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $sql = "SELECT COUNT(*) as count FROM $table";
    $stmt = $con->prepare($sql);
    if ($stmt->execute()) {
        $stmt->bind_result($count);
        $stmt->fetch();
        echo json_encode(['count' => $count]);
    } else {
        echo json_encode(['error' => 'Error preparing query']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Table name not provided']);
}
$con->close();
?>