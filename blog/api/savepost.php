<?php

session_start();
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $title = $_POST['title'];
    $category_id = $_POST['category'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Handle image upload
    $uniqueId = uniqid();
    $originalFileName = $_FILES['image']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $blogImageName = $uniqueId . '.' . $extension;
    $blogImageTmpName = $_FILES['image']['tmp_name'];

    // Directory paths
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/blog/images/';
    $norootDirectory = 'images/';
    $dbSaveDirectory = $norootDirectory . $blogImageName;
    $uploadedImagePath = $uploadDirectory . $blogImageName;

    // Move uploaded image
    if (move_uploaded_file($blogImageTmpName, $uploadedImagePath)) {
        // Insert blog post into the 'blog_posts' table
        $query = "INSERT INTO blog_posts (user_id, title, content, category_id, image_url, published, created_at, updated_at) 
                  VALUES (?, ?, ?, ?, ?, 1, NOW(), NOW())";
        $stmt = $con->prepare($query);
        $stmt->bind_param('issis',$user_id, $title, $content, $category_id,$dbSaveDirectory);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to insert into the database']);
        }
    } else {
        echo json_encode(['error' => 'Failed to move uploaded image']);
    }
} else {
    // Handle other HTTP methods or direct access
    echo json_encode(['error' => 'Invalid request']);
}

?>