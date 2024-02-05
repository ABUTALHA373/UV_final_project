<?php
require '../config/db_con.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Get all user data and column information
    $sql = "SELECT * FROM $table";
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