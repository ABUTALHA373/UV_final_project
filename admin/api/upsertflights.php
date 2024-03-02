<?php
session_start();
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airid = $_SESSION['admin_air_id'];
    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $air_model = $_POST['air_model'];
    $departure_city = $_POST['departure_city'];
    $arrival_city = $_POST['arrival_city'];
    $fare = $_POST['fare'];
    $discount = $_POST['discount'];
    $flight_date = $_POST['flight_date'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $bag_cabin = $_POST['bag_cabin'];
    $bag_check_in = $_POST['bag_check_in'];
    $cancelation = $_POST['cancelation'];

    $sql_source = "SELECT image_url FROM airlines WHERE airline_id = ?";

    $stmt_source = $con->prepare($sql_source);
    $stmt_source->bind_param("i", $airid);
    $stmt_source->execute();

    $result_source = $stmt_source->get_result();
    $row_source = $result_source->fetch_assoc();

    $stmt_source->close();

    if ($row_source) {
        $image_url = $row_source['image_url'];
    }

    if ($mode === 'update') {
        $sql = "UPDATE flights SET airplane_model = ?, departure_city = ?, arrival_city = ?, price = ?, discount = ?, flight_date = ?, departure_time = ?, arrival_time = ?, bag_cabin = ?, bag_check_in = ?, cancelation = ? WHERE flight_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssssssi", $air_model, $departure_city, $arrival_city, $fare, $discount, $flight_date, $departure_time, $arrival_time, $bag_cabin, $bag_check_in, $cancelation, $id);
    } else if ($mode === 'add') {
        function generateBookingId($length = 6)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $randomString = '';
    
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
    
            return $randomString;
        }
        $fnumber = generateBookingId();
        $sql = "INSERT INTO flights (flight_number,airline_id, airplane_model, departure_city, arrival_city, price, discount, flight_date, departure_time, arrival_time, bag_cabin, bag_check_in,image_url, cancelation) VALUES (?,?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $fnumber,$airid, $air_model, $departure_city, $arrival_city, $fare, $discount, $flight_date, $departure_time, $arrival_time, $bag_cabin, $bag_check_in,$image_url, $cancelation);
    }

    $stmt->execute();

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
    http_response_code(405); 
    echo json_encode(['error' => 'Invalid request method']);
}