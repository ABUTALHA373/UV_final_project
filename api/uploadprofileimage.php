<?php
session_start();
require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from session
    $userId = $_SESSION['user_id'];

    $uniqueId = uniqid();
    $originalFileName = $_FILES['file_profile_image']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $galleryImageName = $uniqueId . '.' . $extension;
    $galleryImageTmpName = $_FILES['file_profile_image']['tmp_name'];

    // Define the upload and root directories
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/profile/';
    $norootDirectory = 'images/profile/';

    // Define the path for saving in the database
    $dbSaveDirectory = $norootDirectory . $galleryImageName;

    // Define the full path for moving the uploaded file
    $uploadedImagePath = $uploadDirectory . $galleryImageName;

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($galleryImageTmpName, $uploadedImagePath)) {
        // Update the user's profile image in the database
        $sql = "UPDATE users SET profile_image_url = ? WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si", $dbSaveDirectory, $userId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Database update failed.']);
        }

        // Close the database connection
        $stmt->close();
    } else {
        echo json_encode(['error' => 'File upload failed.']);
    }

    // Close the database connection
    $con->close();

    // Exit the script
    exit();
}
?>