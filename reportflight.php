<?php
session_start();
require './config/db_con.php';
require './dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $flb_Id = $_GET['flb_Id'];
    $user_id = $_SESSION['user_id'];

    $sqlbooking = "SELECT fb.*, f.flight_number, f.departure_city, f.arrival_city, f.flight_date, f.departure_time, f.arrival_time, f.price, f.discount, a.airline_name
                    FROM flight_bookings fb 
                    LEFT JOIN flights f on fb.flight_id = f.flight_id
                    LEFT JOIN airlines a on f.airline_id  = a.airline_id
                    WHERE booking_id = ? 
                    AND user_id = ?";


    $stmt = $con->prepare($sqlbooking);
    $stmt->bind_param("ss", $flb_Id, $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $b_id = $row['booking_id'];
            $b_tprice = $row['total_price'];
            $b_date = $row['booking_date'];
            $b_tran_id = $row['transaction_id'];
            $b_tclass = $row['ticket_class'];
            $b_seats = $row['seat_number'];
            $f_flight_number = $row['flight_number'];
            $f_departure_city = $row['departure_city'];
            $f_arrival_city = $row['arrival_city'];
            $f_flight_date = $row['flight_date'];
            $f_departure_time = $row['departure_time'];
            $f_arrival_time = $row['arrival_time'];
            $f_price = $row['price'];
            $f_discount = $row['discount'];
            $a_airline_name = $row['airline_name'];

            if ($row['payment_status'] === 'paid') {
                $b_pay_status = 'Paid';
            } else if ($row['payment_status'] === 'unpaid') {
                $b_pay_status = 'Unpaid';
            }
            if ($row['ticket_class'] === 'economy_class') {
                $b_tclass = 'Ecomony Class';
            } else if ($row['ticket_class'] === 'business_class') {
                $b_tclass = 'Business Class';
            }

            $sqlpassenger = "SELECT * FROM flight_booking_details WHERE booking_id=?";
            $stmt2 = $con->prepare($sqlpassenger);
            $stmt2->bind_param("s", $row['booking_id']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $passengers = $result2->fetch_all(MYSQLI_ASSOC);

            $output = '';
            $counter = 1;
            foreach ($passengers as $passenger) {
                $output .='<table class="center-table" style="margin-bottom: 5px;">
                <tr>
                    <th colspan="4" style="background-color: #d3ffcf;">Person ' . $counter . '</th>
                </tr>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Passport</th>
                    <th>Contact</th>
                </tr>
                <tr>
                    <td>'.$passenger['first_name'].'</td>
                    <td>'.$passenger['last_name'].'</td>
                    <td>'.$passenger['passport_no'].'</td>
                    <td>'.$passenger['contact'].'</td>
                </tr>
            </table>';
            $counter++; 
            }


            $dompdf = new Dompdf();

            $content = file_get_contents('api/template/flight.php');

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
                '{{ticket_class}}' => $b_tclass,
                '{{seats}}' => $b_seats,
                '{{Flight Number}}' => $f_flight_number,
                '{{Departure}}' => $f_departure_city,
                '{{Arrival}}' => $f_arrival_city,
                '{{flight_date}}' => $f_flight_date,
                '{{Departure Date}}' => $f_flight_date . ' ' . $f_departure_time,
                '{{Arrival Date}}' => $f_flight_date . ' ' . $f_arrival_time,
                '{{basefare}}' => $f_price,
                '{{totalfare}}' => $b_tprice,
                '{{discount}}' => $f_discount . '%',
                '{{Airline}}' => $a_airline_name,
                '{{vat}}' => '5%',
                '{{persondetails}}' => $output,
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