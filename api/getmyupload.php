<?php
require '../config/db_con.php';

$imageElement = '';
$output = '';

if (isset($_GET['table']) && isset($_GET['column']) && isset($_GET['columnvalue'])) {
    $table = $_GET['table'];
    $column = $_GET['column'];
    $value = $_GET['columnvalue'];
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $pageSize = 9;
    $offset = (($page - 1) * $pageSize);

    $stmt = $con->prepare("SELECT * FROM $table WHERE $column = ? ORDER BY image_id DESC LIMIT ?, ?");
    $stmt->bind_param('sii', $value, $offset, $pageSize);
    $stmt->execute();
    
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $imageElement .= '<div class="col-md-4"><a href="' . $row["image_url"] . '" class="img-gal"><div class="single-gallery-image" style="background: url(' . $row["image_url"] . ');"></div></a></div>';
    }

    $stmt = $con->prepare("SELECT * FROM $table WHERE $column = ?");
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;
    $totalpages = ceil($rows / $pageSize);

    for ($i = 1; $i <= $totalpages; $i++) {
        
        $output .= '<li class="page-item"><span class="page-link pagination_link" id="'.$i.'">'. $i .'</span></li>';
    }

    echo json_encode(['data' => $imageElement, 'paging' => $output]);
    $stmt->close();
} else {
    echo json_encode(['error' => 'Table name, column name, or value not provided']);
}

$con->close();
?>