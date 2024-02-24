<?php
session_start();
require './config/db_con.php';
require './dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $booktId = $_GET['booktId'];
    $user_id = $_SESSION['user_id'];

    $sqlbooking = "SELECT * FROM flight_bookings WHERE booking_id = ? AND user_id = ?";
    $stmt = $con->prepare($sqlbooking);
    $stmt->bind_param("ss", $booktId, $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $b_id = $row['booking_id'];
            $b_date = $row['booking_date'];
            $b_pay_status = $row['payment_status'];
            $b_tran_id = $row['transaction_id'];
            $b_tclass = $row['ticket_class'];
            $b_seats = $row['seat_number'];

            $dompdf = new Dompdf();

            $content = file_get_contents('api/template/flight.php');

            $options = new Options;
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $placeholders = array(
                '{{date}}' => date('Y-m-d h:i a'),
                '{{booking_id}}' => $b_id,
                '{{booking_date}}' => $b_date,
                '{{pay_status}}' => $b_pay_status,
                '{{tran_id}}' => $b_tran_id,
                '{{ticket_class}}' => $b_tclass,
                '{{seats}}' => $b_seats,
            );

            $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);

            $dompdf->loadHtml($content);

            $dompdf->setPaper('A4', 'horizontal');

            $dompdf->render();

            $dompdf->stream('document', array('Attachment' => 0));
            
            // echo $dompdf ->output();
        }
    } 
}
?>