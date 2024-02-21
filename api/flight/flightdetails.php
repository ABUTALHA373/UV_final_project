<?php
// Include your database connection file
require '../../config/db_con.php';

// Function to search for available flights



// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you're sending parameters through POST
    $flightId = $_POST['flightId'];
    $class = $_POST['class'];
    $person = $_POST['person'];

    $query = "SELECT * FROM flights
        WHERE flight_id = ? 
        AND (total_$class" . "_seats - booked_$class" . "_seats) >= ?
        LIMIT 1";

    $statement = $con->prepare($query);
    $statement->bind_param("ii", $flightId, $person);
    $statement->execute();
    $result = $statement->get_result();

    $flight = array();
    while ($row = $result->fetch_assoc()) {
        
        $query2 = "SELECT seat_number FROM flight_bookings
        WHERE flight_id = ? AND payment_status = 'paid'";

        $statement2 = $con->prepare($query2);
        $statement2->bind_param("i", $flightId,);
        $statement2->execute();
        $result2 = $statement2->get_result();
        
        $seats = '';
        while($row2 = $result2->fetch_assoc()){
            $seats.=$row2['seat_number'].',';
        }
        $row['booked_seats'] = $seats;
        
        $flight[] = $row;
    }



    // Return JSON-encoded data
    header('Content-Type: application/json');
    echo json_encode($flight);
}

// Close the database connection
$con->close();