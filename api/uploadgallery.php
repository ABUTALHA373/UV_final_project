<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    $galleryCaption = $_POST['gallery_caption'];
    $uniqueId = uniqid();
    $originalFileName = $_FILES['gallery_image']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $galleryImageName = $uniqueId . '.' . $extension;
    $galleryImageTmpName = $_FILES['gallery_image']['tmp_name'];

    // need change for online host
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/gallery/';

    $uploadedImagePath = $uploadDirectory . $galleryImageName;
    move_uploaded_file($galleryImageTmpName, $uploadedImagePath);

    require '../config/db_con.php';

    $insertQuery = "INSERT INTO gallery (user_id, image_url, caption) VALUES (?, ?, ?)";
    $insertStmt = $con->prepare($insertQuery);
    $insertStmt->bind_param('iss', $user_id, $uploadedImagePath, $galleryCaption);

    if ($insertStmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to insert into the database']);
    }
    $insertStmt->close();
    $con->close();
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>