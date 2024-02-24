<?php
session_start();
require './config/db_con.php';
require './dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $flb_Id = $_GET['hb_Id'];
    $user_id = $_SESSION['user_id'];

    $sqlbooking = "SELECT hb.*, h.hotel_name, h.location, h.address, h.star, r.room_type, r.price_per_night, r.discount, r.capacity
                    FROM hotel_bookings hb 
                    LEFT JOIN rooms r on hb.room_id  = r.room_id
                    LEFT JOIN hotels h on r.hotel_id = h.hotel_id
                    WHERE booking_id = ? 
                    AND user_id = ?";


    $stmt = $con->prepare($sqlbooking);
    $stmt->bind_param("ss", $flb_Id, $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $b_id = $row['booking_id'];
            $b_date = $row['booking_date'];
            $b_tran_id = $row['transaction_id'];
            $b_date = $row['booking_date'];
            $b_checkin= $row['check_in_date'];
            $b_checkout = $row['check_out_date'];
            $b_total_room = $row['total_room'];
            $b_tprice = $row['total_price'];
            $r_price = $row['price_per_night'];
            $r_room_type = $row['room_type'];
            $h_name= $row['hotel_name'];
            $h_location= $row['location'];
            $h_address= $row['address'];
            $h_capacity= $row['capacity'];
            $h_star= $row['star'];
            $r_discount = $row['discount'];

            if ($row['payment_status'] === 'paid') {
                $b_pay_status = 'Paid';
            } else if ($row['payment_status'] === 'unpaid') {
                $b_pay_status = 'Unpaid';
            }
            


            $dompdf = new Dompdf();

            $content = file_get_contents('api/template/hotel.php');

            $options = new Options;
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            date_default_timezone_set('Asia/Dhaka');
            $placeholders = array(
                '{{date}}' => date('Y-m-d h:i a'),
                '{{booking_id}}' => $b_id,
                '{{booking_date}}' => $b_date,
                '{{pay_status}}' => $b_pay_status,
                '{{tran_id}}' => $b_tran_id,
                '{{basefare}}' => $r_price,
                '{{discount}}' => $r_discount,
                '{{hotel_name}}' => $h_name,
                '{{address}}' => $h_address,
                '{{room}}' => $r_room_type,
                '{{location}}' => $h_location,
                '{{star}}' => $h_star,
                '{{capacity}}' => $h_capacity,
                '{{totalfare}}' => $b_tprice,
                '{{total_room}}' => $b_total_room,
                '{{check_in}}' => $b_checkin,
                '{{check_out}}' => $b_checkout,
                '{{vat}}' => '',
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