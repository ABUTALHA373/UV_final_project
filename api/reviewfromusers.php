<?php

require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT r.*, u.first_name, u.last_name, u.profile_image_url
            FROM reviews r
            LEFT JOIN users u ON r.user_id = u.user_id
            WHERE u.status = 'active'
            ORDER BY RAND()
            LIMIT 6";

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $rating = $row['rating'];

        $output .= '<div class="single-testimonial item d-flex flex-row">
        <div class="thumb">
            <div class="img-con">
                <img class="j-fluid" src="'.$row['profile_image_url'].'" alt="">
            </div>
        </div>
        <div class="desc">
            <p class="line3">
                 '.$row['comment'].'
            </p>
            <h4>'.$row['first_name'].' '.$row['last_name'].'</h4>
            <div class="star">';

        // Generate stars dynamically based on the rating
        for ($i = 1; $i <= 5; $i++) {
            $output .= '<span class="fa fa-star';
            if ($i <= $rating) {
                $output .= ' checked';
            }
            $output .= '"></span>';
        }

        $output .= '</div>
        </div>
    </div>';
    }

    echo $output;
    $stmt->close();
}
?>