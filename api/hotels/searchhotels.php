<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Collect form data
  $place = isset($_GET['place']) ? $_GET['place'] : '';
  $checkInDate = isset($_GET['checkInDate']) ? $_GET['checkInDate'] : '';
  $checkOutDate = isset($_GET['checkOutDate']) ? $_GET['checkOutDate'] : '';
  $totalRoom = isset($_GET['totalRoom']) ? $_GET['totalRoom'] : '';
  $adults = isset($_GET['adults']) ? $_GET['adults'] : '';

  $query = "SELECT DISTINCT hotels.* 
    FROM hotels 
    JOIN rooms ON hotels.hotel_id = rooms.hotel_id 
    WHERE hotels.location = ? 
      AND rooms.capacity = ? 
      AND rooms.available_rooms	 >= ? 
      AND rooms.is_booked = 0 
      AND NOT EXISTS (
          SELECT 1 
          FROM hotel_bookings 
          WHERE rooms.room_id = hotel_bookings.room_id 
            AND (
              (? <= hotel_bookings.check_in_date AND ? >= hotel_bookings.check_out_date)
              OR ( hotel_bookings.check_in_date BETWEEN ? AND ?)
              OR ( hotel_bookings.check_out_date BETWEEN ? AND ?)
            )
    )";

  $stmt = $con->prepare($query);
  $stmt->bind_param('siissssss', $place, $adults,$totalRoom, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate);
  $stmt->execute();
  $result = $stmt->get_result();

  $hotels = array();
  while ($row = $result->fetch_assoc()) {

    //searching images 
    $queryimg = "SELECT * FROM images_hotel WHERE hotel_id = ? ";
    $stmtimg = $con->prepare($queryimg);
    $stmtimg->bind_param('i', $row['hotel_id']);
    $stmtimg->execute();
    $resultimg = $stmtimg->get_result();

    $images = array();
    while ($imageRow = $resultimg->fetch_assoc()) {
      $images[] = $imageRow;
    }

    $row['images'] = $images;//will make images array into hotels details
//searching images 

//searching low prices 

    $queryprice = "SELECT * FROM rooms WHERE hotel_id = ? AND available_rooms >= ? ORDER BY price_per_night ASC LIMIT 1";
    $stmtprice = $con->prepare($queryprice);
    $stmtprice->bind_param('ii', $row['hotel_id'],$totalRoom);
    $stmtprice->execute();
    $resultprice = $stmtprice->get_result();

    $lowpricerow = array();
    while ($lowpricerow = $resultprice->fetch_assoc()) {
      $lowprice[] = $lowpricerow;
    }
    $row['low_price'] = $lowprice;

    $hotels[] = $row;
  }

  $stmt->close();
  $con->close();

  header('Content-Type: application/json');
  echo json_encode($hotels);
} else {

  echo 'invalid';
}
?>