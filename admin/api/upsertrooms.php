<?php
session_start();
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $hotelid = $_SESSION['admin_hotel_id'];
    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $filePath = $_POST['img_addr'];
    $room_type = $_POST['room_type'];
    $bed_type = $_POST['bed_type'];
    $bed_type = $_POST['bed_type'];
    $fare = $_POST['fare'];
    $discount = $_POST['discount'];
    $smoking = $_POST['smoking'];
    $facility = $_POST['facility'];
    $breakfast = $_POST['breakfast'];
    $capacity = $_POST['capacity'];
    $others = $_POST['others'];
    $available_rooms = $_POST['available_rooms'];
    $total_rooms = $_POST['total_rooms'];



    if ($mode === 'update' && !empty($_FILES['image']['name'])) {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/rooms/';
        $norootDirectory = 'images/rooms/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);

        $sql = "UPDATE rooms SET room_type = ?, bed_type = ?, facility = ?, price_per_night = ?, discount = ?, smoking = ?, breakfast = ?, capacity = ?, other_details = ?,image_url=?, available_rooms = ?,total_rooms=? WHERE room_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssssssss",  $room_type, $bed_type, $facility, $fare, $discount, $smoking, $breakfast, $capacity, $others, $dbSaveDirectory, $available_rooms, $total_rooms, $id);
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/fp/' . $filePath;
        if ($stmt->execute()) {
            unlink($filePath);
        }
    } else if ($mode === 'update' && !isset($_FILES['image']['name'])) {

        $sql = "UPDATE rooms SET room_type = ?, bed_type = ?, facility = ?, price_per_night = ?, discount = ?, smoking = ?, breakfast = ?, capacity = ?, other_details = ?,available_rooms = ?,total_rooms=? WHERE room_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssss",  $room_type, $bed_type, $facility, $fare, $discount, $smoking, $breakfast, $capacity, $others, $available_rooms, $total_rooms, $id);

        $stmt->execute();
    } else if ($mode === 'add') {
        $uniqueId = uniqid();
        $originalFileName = $_FILES['image']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $galleryImageName = $uniqueId . '.' . $extension;
        $galleryImageTmpName = $_FILES['image']['tmp_name'];

        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fp/images/rooms/';
        $norootDirectory = 'images/rooms/';

        $dbSaveDirectory = $norootDirectory . $galleryImageName;

        $uploadedImagePath = $uploadDirectory . $galleryImageName;
        move_uploaded_file($galleryImageTmpName, $uploadedImagePath);
        $sql = "INSERT INTO rooms (hotel_id,room_type, bed_type, facility, price_per_night, discount, smoking, breakfast, capacity, other_details, image_url, available_rooms, total_rooms) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssssssss", $hotelid, $room_type, $bed_type, $facility, $fare, $discount, $smoking, $breakfast, $capacity, $others, $dbSaveDirectory, $available_rooms, $total_rooms);

        $stmt->execute();
    }

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
   
    http_response_code(405); 
    echo json_encode(['error' => 'Invalid request method']);
}