<?php
session_start();
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $userId = $_SESSION['admin_id'];

    $uniqueId = uniqid();
    $originalFileName = $_FILES['file_profile_image']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $galleryImageName = $uniqueId . '.' . $extension;
    $galleryImageTmpName = $_FILES['file_profile_image']['tmp_name'];

  
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/profile/';
    $norootDirectory = 'images/profile/';

  
    $dbSaveDirectory = $norootDirectory . $galleryImageName;

  
    $uploadedImagePath = $uploadDirectory . $galleryImageName;

   
    if (move_uploaded_file($galleryImageTmpName, $uploadedImagePath)) {
     
        $sql = "UPDATE admins SET profile_image_url = ? WHERE admin_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $dbSaveDirectory, $userId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Database update failed.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'File upload failed.']);
    }

    $con->close();

    exit();
}
?>