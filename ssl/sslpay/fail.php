<?php
require '../../config/db_con.php';
echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Success!</title>
    
        <link rel="stylesheet" href="'.BASE_URL.'css/bootstrap.css">
    </head>
    
    <body class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="container py-5 text-center">
            <h1 class="display-4 mb-4 text-success text-center">Payment Failde!</h1>
            <!-- <img src="checkmark.png" alt="Checkmark icon" class="img-fluid mx-auto" width="100px"> -->
            <p class="lead my-4 te">Your order has been confirmed and is being processed.</p>
            <a href="'.BASE_URL.'index.php" class="btn btn-danger btn-lg">Back to Home</a>
        </div>
    </body>
    
    </html>';
?>