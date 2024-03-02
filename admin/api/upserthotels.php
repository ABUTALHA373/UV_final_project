<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $filePath = $_POST['img_addr'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $facility = $_POST['facility'];
    $star = $_POST['star'];
    $others = $_POST['others'];
    $map = $_POST['map'];



    if ($mode === 'update' && !empty($_FILES['image']['name'])) {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/hotels/';
        $norootDirectory = 'images/hotels/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);

        $sql = "UPDATE hotels SET hotel_name = ?, email = ?, phone = ?, address = ?, location = ?, facilities = ?, star = ?, other_details = ?, maps_link = ?,image_url=? WHERE hotel_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssi",  $name, $email, $phone, $address,$location,$facility,$star, $others, $map, $dbSaveDirectory, $id);
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/fp/'. $filePath;
        if ($stmt->execute()) {
            unlink($filePath);
        }
    } else if ($mode === 'update' && !isset($_FILES['image']['name'])) {
        
    
        $sql = "UPDATE hotels SET hotel_name = ?, email = ?, phone = ?, address = ?, location = ?, facilities = ?, star = ?, other_details = ?, maps_link = ? WHERE hotel_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssssi",  $name, $email, $phone, $address,$location,$facility,$star, $others, $map, $id);
    
  
        $stmt->execute();
    
    
    } else if ($mode === 'add') {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/hotels/';
        $norootDirectory = 'images/hotels/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);
        $sql = "INSERT INTO hotels (hotel_name, email, phone, address,location, facilities, star, other_details, maps_link,image_url) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssss",  $name, $email, $phone, $address,$location,$facility,$star, $others, $map, $dbSaveDirectory);
        $stmt->execute();
    }

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
    http_response_code(405); 
    echo json_encode(['error' => 'Invalid request method']);
}