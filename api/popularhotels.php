<?php

require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT h.hotel_name, h.location,h.image_url, h.location,h.star, h.hotel_id, MAX(ih.image_url) AS aimage_url
        FROM hotels h
        LEFT JOIN images_hotel ih ON h.hotel_id = ih.hotel_id
        GROUP BY h.hotel_id
        ORDER BY h.popularity DESC
        LIMIT 4";


    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $today = date('Y-m-d');
    $next2day = date('Y-m-d', strtotime('+2 days'));

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="col-lg-3 col-md-6 mb-2">
        <div class="single-other-issue">
            <div class="thumb">
                <img class="img-fluid" src="' . $row['image_url'] . '" alt="">
            </div>
            <div class="px-2 border">
                <a href="rooms.php?hotelId=' . $row['hotel_id'] . '&checkInDate=' . $today. '&checkOutDate=' . $next2day. '&totalRoom=1&adults=2">
                    <h4 class="line1">' . $row['hotel_name'] . '</h4>
                </a>
                <p class="line1"><span class="border p-1 badge"><i class="fa fa-star text-primary mr-1" aria-hidden="true"></i>' . $row['star'] . '</span>
                <span class="border p-1 badge "><i class="fa fa-map-marker text-primary mr-1" aria-hidden="true"></i>' . $row['location'] . '</span>
                </p>
            </div>
        </div>
    </div>';
    }

    echo $output;
    $stmt->close();
}
?>