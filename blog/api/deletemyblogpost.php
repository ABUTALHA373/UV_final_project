<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];


    $sql = "UPDATE blog_posts SET published=2 WHERE post_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $postId);

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