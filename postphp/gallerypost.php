<?php
// Include your database connection
require_once '../config/db_con.php';

$limit = 10; // Number of images per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query to fetch images with paging
$query = "SELECT image_id, user_id, image_url, upload_time, caption FROM gallery LIMIT $offset, $limit";
$result = mysqli_query($your_db_connection, $query);

$images = [];
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}

echo json_encode($images);