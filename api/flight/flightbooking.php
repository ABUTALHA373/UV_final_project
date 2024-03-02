<?php
session_start();
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");

    // Decode the JSON data
    $personDetails = json_decode($json_data, true);

    $amount = $personDetails['amount'];
    $seats = $personDetails['seats'];
    $flightId = $personDetails['flightId'];
    $ticketClass = $personDetails['ticketClass'];

    $type = "Flight_";
    $transaction_id = $type . uniqid();

    function generateBookingId($length = 6)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
    $bookingId = generateBookingId();
    $userId = $_SESSION['user_id'];

    $status = 'unpaid';
    $sql = "INSERT INTO flight_bookings (booking_id, user_id, flight_id, payment_status, transaction_id, total_price, ticket_class, seat_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("siisssss", $bookingId, $userId, $flightId, $status, $transaction_id, $amount, $ticketClass, $seats);

    if ($stmt->execute()) {
        global $transaction_id, $amount;
        $sql2 = "INSERT INTO flight_booking_details (booking_id, first_name, last_name, passport_no, contact) VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $con->prepare($sql2);

        foreach ($personDetails['personDetails'] as $person) {
            $stmt2->bind_param("sssss", $bookingId, $person['firstName'], $person['lastName'], $person['passportNo'], $person['contact']);
            $stmt2->execute();
        }

        $stmt2->close();

        $_SESSION['transaction_id'] = $transaction_id;
        $_SESSION['amount'] = $amount;

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert into flight_bookings']);
    }

    $stmt->close();

    $con->close();

}