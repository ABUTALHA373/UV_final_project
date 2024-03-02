<?php
session_start();
require '../../config/db_con.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $id  = $_SESSION['admin_air_id'];

    $sql = "SELECT * FROM $table where airline_id = $id";
    $result = $con->query($sql);

    if ($result) {
        $data = array();
        $columns = array();

        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            $columns[] = $field->name;
        }

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