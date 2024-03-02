<?php
require '../../config/db_con.php';

// Check the con
if ($con->connect_error) {
    die("con failed: " . $con->connect_error);
}

function searchFlights($departureCity, $arrivalCity, $person, $class, $flightDate)
{
    global $con;

    $query = "SELECT * FROM flights
              WHERE departure_city = ? 
              AND arrival_city = ? 
              AND (total_$class" . "_seats - booked_$class" . "_seats) >= ?
              AND flight_date = ?
              ORDER BY departure_time";

    $statement = $con->prepare($query);

    $statement->bind_param("ssis", $departureCity, $arrivalCity, $person, $flightDate);

    $statement->execute();

    $result = $statement->get_result();

    $flights = $result->fetch_all(MYSQLI_ASSOC);

    $statement->close();

    return $flights;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departureCity = $_POST['departureCity'];
    $arrivalCity = $_POST['arrivalCity'];
    $person = $_POST['person'];
    $class = $_POST['class'];
    $flightDate = $_POST['flightDate']; // Format: 'YYYY-MM-DD'

    // Search for flights
    $searchResults = searchFlights($departureCity, $arrivalCity, $person, $class, $flightDate);

    if ($class == 'economy_class') {
        $flightClass = 'Economy';
    } else if ($class == 'business_class') {
        $flightClass = 'Business';
    }
    $output = '';
    // Output flight cards
    foreach ($searchResults as $flight) {

        $totalPrice = (($flight['price'] - (($flight['discount'] * $flight['price']) / 100)) * $person);
        
        $link = 'book-flight.php?';
        $link .= 'flightId=' . $flight['flight_id'] . '&';
        $link .= 'departureCity=' . $departureCity . '&';
        $link .= 'arrivalCity=' . $arrivalCity . '&';
        $link .= 'person=' . $person . '&';
        $link .= 'class=' . $class . '&';
        $link .= 'flightDate=' . $flightDate . '&';
        $link .= 'totalPrice=' . $totalPrice;
        $output .= '<div class="card card_flight border shadow-soft mb-2" data-hotel-id="1">
                            <div class="row">
                                <div class="img-col col-sm-12 col-xl-3 col-md-3 p-0">
                                    <div class="card_images_flight border">
                                        <img class="d-block w-100"
                                            src="' . $flight['image_url'] . '" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-9 col-md-9 p-0">
                                    <div class="row link h-100">
                                        <div
                                            class="col-9 text-center py-2 border d-flex justify-content-center align-items-center">
                                            <div class="w-100">
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success">' . $flight['departure_city'] . '</h6>
                                                        <p class="fw-500">' . $flight['departure_time'] . '</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <i class="fa fa-long-arrow-right fa-2x w-100 py-1"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success">' . $flight['arrival_city'] . '</h6>
                                                        <p class="fw-500">' . $flight['arrival_time'] . '</p>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Flight:</small>
                                                        <p class="text-info p-0 m-0 fw-500">' . $flight['flight_number'] . '</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Airplane:</small>
                                                        <p class="text-info p-0 m-0 fw-500">BOING 747</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Class:</small>
                                                        <p class="text-info p-0 m-0 fw-500">' . $flightClass . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 pr-3 d-flex align-items-center border">
                                            <div class="p-0 w-100 text-right">
                                                <p class="p-0 m-0 "><span class=" text-danger relative start_price">৳
                                                ' . ($flight['price'] * $person) . '</span></p>
                                                <h5 class="mb-2 mt-1"><span
                                                        class="badge badge-success mr-1">' . $flight['discount'] . '%</span>৳ ' . $totalPrice . '</h5>
                                                <a href="'.$link.'" class="genric-btn primary small w-100 add-room-btn"
                                                    style="padding:0">Continue</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
    }

    header('Content-Type: application/json');
    echo json_encode($output);
}

// Close the database con
$con->close();