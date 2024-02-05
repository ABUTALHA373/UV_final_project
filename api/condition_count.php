<?php
require '../config/db_con.php';

if (isset($_GET['table']) && isset($_GET['column']) && isset($_GET['value'])) {
    $table = $_GET['table'];
    $column = $_GET['column'];
    $value = $_GET['value'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT COUNT(*) as concount FROM $table WHERE $column = ?";
    $stmt = $con->prepare($sql);

    $stmt->bind_param('s', $value);

    if ($stmt->execute()) {
        $stmt->bind_result($concount);
        $stmt->fetch();
        echo json_encode([$column => $concount]);
    } else {
        echo json_encode(['error' => 'Error preparing query']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Incomplete parameters']);
}

$con->close();
?>