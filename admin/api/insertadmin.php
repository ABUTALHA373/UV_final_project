<?php
require '../../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $mode = $_POST['mode'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $admin_type = $_POST['admin_type'];
    $status = $_POST['status'];
    $c_id = $_POST['c_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($admin_type==='airline'){
        $idname='admin_air_id';
    }else if($admin_type==='hotel'){
        $idname='admin_hotel_id';
    }else if($admin_type==='master'){
        $idname='admin_hotel_id';
        $c_id=null;
    }

    function generateBookingId($length = 6)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
    $adminid = generateBookingId();

    if ($mode === 'add') {
        $sql = "INSERT INTO admins (admin_id , admin_name, admin_email, phone, admin_type, password,status,$idname) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssss", $adminid, $name, $email, $phone, $admin_type, $password,$status,$c_id);
    }


    $stmt->execute();

    $response = ['success' => true, 'message' => 'Update successful'];
    echo json_encode($response);
} else {
    http_response_code(405); 
    echo json_encode(['error' => 'Invalid request method']);
}