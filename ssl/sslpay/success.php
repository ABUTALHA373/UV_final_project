<?php
require '../../config/db_con.php';

// Your table name
$tableName = "your_payments_table";

$msg = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success!</title>

    <link rel="stylesheet" href="' . BASE_URL . 'css/bootstrap.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="container py-5 text-center">
        <h1 class="display-4 mb-4 text-success text-center">Payment Successful!</h1>
        <!-- <img src="checkmark.png" alt="Checkmark icon" class="img-fluid mx-auto" width="100px"> -->
        <p class="lead my-4 te">Your booking has been confirmed and is being processed.</p>
        <a href="' . BASE_URL . 'index.php" class="btn btn-success btn-lg">Back to Home</a>
    </div>
</body>

</html>';

$val_id = urlencode($_POST['val_id']);
$store_id = urlencode("booki65c847218fca0");
$store_passwd = urlencode("booki65c847218fca0@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {

    $result = json_decode($result);

    // TRANSACTION INFO
    $status = $result->status;
    $tran_date = $result->tran_date;
    $tran_id = $result->tran_id;
    $val_id = $result->val_id;
    $amount = $result->amount;
    $store_amount = $result->store_amount;
    $bank_tran_id = $result->bank_tran_id;
    $card_type = $result->card_type;

    // EMI INFO
    $emi_instalment = $result->emi_instalment;
    $emi_amount = $result->emi_amount;
    $emi_description = $result->emi_description;
    $emi_issuer = $result->emi_issuer;

    // ISSUER INFO
    $card_no = $result->card_no;
    $card_issuer = $result->card_issuer;
    $card_brand = $result->card_brand;
    $card_issuer_country = $result->card_issuer_country;
    $card_issuer_country_code = $result->card_issuer_country_code;

    // API AUTHENTICATION
    $APIConnect = $result->APIConnect;
    $validated_on = $result->validated_on;
    $gw_version = $result->gw_version;

    // Inserting data into the payments table

    $firstThreeLetters = substr($tran_id, 0, 3);

    // Check if it starts with "fli" or "hot"
    if ($firstThreeLetters === "Fli") {
        $sqlbooking = "UPDATE flight_bookings SET payment_status='paid' WHERE transaction_id=? AND total_price=?";
    $stmtbooking = $con->prepare($sqlbooking);
    $stmtbooking->bind_param("ss", $tran_id, $amount);
    $stmtbooking->execute();
    } else if ($firstThreeLetters === "Hot") {
        $sqlbooking = "UPDATE hotel_bookings SET payment_status='paid' WHERE transaction_id=? AND total_price=?";
        $stmtbooking = $con->prepare($sqlbooking);
        $stmtbooking->bind_param("ss", $tran_id, $amount);
        $stmtbooking->execute();
    }




    $sql = "INSERT INTO payments (tran_id, status, tran_date, amount, store_amount, bank_tran_id, card_type, emi_instalment, emi_amount, emi_description, emi_issuer, card_no, card_issuer, card_brand, card_issuer_country, card_issuer_country_code, APIConnect, validated_on, gw_version) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssss",
        $tran_id,
        $status,
        $tran_date,
        $amount,
        $store_amount,
        $bank_tran_id,
        $card_type,
        $emi_instalment,
        $emi_amount,
        $emi_description,
        $emi_issuer,
        $card_no,
        $card_issuer,
        $card_brand,
        $card_issuer_country,
        $card_issuer_country_code,
        $APIConnect,
        $validated_on,
        $gw_version
    );
    $stmt->execute();

    echo $msg;
} else {
    echo "Failed to connect with SSLCOMMERZ";
}