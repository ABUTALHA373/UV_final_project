<?php
require '../config/db_con.php';
session_start();
$user_id = $_SESSION['user_id'];

function updateDataInDatabase($review_star,$text_review)
{
    global $con;
    global $user_id;
    
    $sql = "INSERT INTO reviews (user_id, comment, rating) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param('iss', $user_id, $text_review, $review_star);


    if ($stmt->execute()) {
        $stmt->close();
        return 'success';
    } else {
        $stmt->close();
        return 'invalid';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have these fields in your update form
    $review_star = $con->real_escape_string($_POST['review_star']);
    $text_review = $con->real_escape_string($_POST['text_review']);

    // Update the data in the database
    $result = updateDataInDatabase($review_star, $text_review);

    // Return the result as a JSON response
    echo $result;
} else {
    echo 'invalid';
}

$con->close();
?>