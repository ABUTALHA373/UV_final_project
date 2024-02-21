<?php
session_start();
require '../config/db_con.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $userId = $_SESSION['user_id'];

    // Get all user data and column information
    $sql = "SELECT * FROM $table where user_id=$userId and payment_status='paid'";
    $result = $con->query($sql);

    if ($result) {
        $data = array();
        $columns = array();

        // Fetch column names
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            $columns[] = $field->name;
        }

        // Fetch user data
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(['columns' => $columns, 'data' => $data]);
    } else {
        echo json_encode(['error' => 'Error executing query']);
    }

    $result->close();
} else {
    echo json_encode(['error' => 'Table name not provided']);
}

$con->close();
?>