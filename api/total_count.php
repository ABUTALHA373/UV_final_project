<?php
require '../config/db_con.php';
if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $sql = "SELECT COUNT(*) as userCount FROM $table";
    $stmt = $con->prepare($sql);
    if ($stmt->execute()) {
        $stmt->bind_result($userCount);
        $stmt->fetch();
        echo json_encode(['userCount' => $userCount]);
    } else {
        echo json_encode(['error' => 'Error preparing query']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Table name not provided']);
}
$con->close();
?>