<?php

require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['location']) ) {

    $location = $_GET['location'];
    $sql = "SELECT * FROM emergency_contacts where location = ?";


    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $location);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="card " style="flex-basis: 400px;flex-grow:1">
        <h4 class="card-header fw-600 ">'.$row['contact_type'].'</h4>
        <div class="card-body p-2">
            <h5 class="card-title mb-1">Name: '.$row['name'].'</h5>
            <p class="card-text p-0 mb-1"><strong class="fw-500">Address: </strong>'.$row['address'].'- '.$row['location'].'</p>
            <p class="card-text p-0 mb-1"><strong class="fw-500">Phone: </strong>'.$row['phone_number'].'</p>
            <a href="tel:'.$row['phone_number'].'" class="genric-btn px-2 small primary">Call</a>
            <a href="'.$row['map_link'].'" class="genric-btn px-2 small primary" target="_blank">Google Map</a>
        </div>
    </div>';
    }

    echo $output;
    $stmt->close();
}
?>