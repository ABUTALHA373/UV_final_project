<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $filePath = $_POST['img_addr'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $others = $_POST['others'];
    $map = $_POST['map'];



    if ($mode === 'update' && !empty($_FILES['image']['name'])) {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/airlines/';
        $norootDirectory = 'images/airlines/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);

        $sql = "UPDATE airlines SET airline_name = ?, email = ?, phone = ?, address = ?, other_details = ?, maps_link = ?,image_url=? WHERE airline_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssi",  $name, $email, $phone, $address, $others, $map, $dbSaveDirectory, $id);
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/fp/'. $filePath;
        if ($stmt->execute()) {
            unlink($filePath);
        }
    } else if ($mode === 'update' && !isset($_FILES['image']['name'])) {
     
        $sql = "UPDATE airlines SET airline_name = ?, email = ?, phone = ?, address = ?, other_details = ?, maps_link = ? WHERE airline_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $email, $phone, $address, $others, $map, $id);
    
        $stmt->execute();
    
    
    } else if ($mode === 'add') {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/airlines/';
        $norootDirectory = 'images/airlines/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);
        $sql = "INSERT INTO airlines (airline_name, email, phone, address, other_details, maps_link,image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssss", $name, $email, $phone, $address, $others, $map, $dbSaveDirectory);
        $stmt->execute();
    }

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
    http_response_code(405); 
    echo json_encode(['error' => 'Invalid request method']);
}