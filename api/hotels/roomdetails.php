<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Collect form data
  $hotelId = isset($_GET['hotelId']) ? $_GET['hotelId'] : '';
  $checkInDate = isset($_GET['checkInDate']) ? $_GET['checkInDate'] : '';
  $checkOutDate = isset($_GET['checkOutDate']) ? $_GET['checkOutDate'] : '';
  $totalRoom = isset($_GET['totalRoom']) ? $_GET['totalRoom'] : '';
  $capacity = isset($_GET['adults']) ? $_GET['adults'] : '';

  $queryhotel = "SELECT * FROM hotels WHERE hotel_id = ?";

  $stmthotel = $con->prepare($queryhotel);
  $stmthotel->bind_param('i', $hotelId);
  $stmthotel->execute();
  $resulthotel = $stmthotel->get_result();

  $hotel = array();
  while ($rowhotel = $resulthotel->fetch_assoc()) {

    //searching images 
    $queryimg = "SELECT * FROM images_hotel WHERE hotel_id = ? ";
    $stmtimg = $con->prepare($queryimg);
    $stmtimg->bind_param('i', $hotelId);
    $stmtimg->execute();
    $resultimg = $stmtimg->get_result();
    $images = array();
    while ($imageRow = $resultimg->fetch_assoc()) {
      $images[] = $imageRow;
    }
    $rowhotel['images'] = $images; //will make images array into hotels details
    $hotel[] = $rowhotel;
  }
  $queryrooms = "SELECT * FROM rooms 
  WHERE hotel_id = ? 
    AND capacity = ?
    AND available_rooms >= ? 
    AND NOT EXISTS (
      SELECT 1  FROM hotel_bookings 
      WHERE rooms.room_id = hotel_bookings.room_id 
        AND (
          (? <= hotel_bookings.check_in_date AND ? >= hotel_bookings.check_out_date)
          OR ( hotel_bookings.check_in_date BETWEEN ? AND ?)
          OR ( hotel_bookings.check_out_date BETWEEN ? AND ?)
        )
    )";

  $stmtrooms = $con->prepare($queryrooms);
  $stmtrooms->bind_param('iiissssss', $hotelId, $capacity,$totalRoom, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate);

  $stmtrooms->execute();
  $resulrooms = $stmtrooms->get_result();

  $rooms = array();
  while ($rowrooms = $resulrooms->fetch_assoc()) {
    $rooms[] = $rowrooms;
  }


  $con->close();

  header('Content-Type: application/json');
  echo json_encode(['hotel' => $hotel, 'rooms' => $rooms]);
} else {

  echo 'invalid';
}