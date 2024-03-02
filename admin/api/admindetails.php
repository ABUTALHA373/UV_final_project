<?php
require '../../config/db_con.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['table'])) {
    $table = $_GET['table'];
    $id = $_SESSION['admin_id'];

    $stmt = $con->prepare("SELECT admin_id, admin_name, admin_email, phone, admin_type, profile_image_url FROM $table WHERE admin_id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {

        $admindetails = '';

        while ($row = $result->fetch_assoc()) {
            $admindetails .= '<div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Profile Details</h5>
        </div>
        <div class="card-body text-center">
            <div class="text-center  profile_image_card">
            <div class="add_profile_img"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                <img id="profile_image" alt="Profile Image" class="img-fluid rounded-circle mb-2"
                    src="../' . $row['profile_image_url'] . '">
            </div>
            <h4 class="fw-600 mb-0 text-dark">' . $row['admin_name'] . '</h4>
            <div class="text-muted mb-2">' . $row['admin_type'] . ' Admin</div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <h5 class="h6 card-title">Admin ID</h5>
            <div id="cont">
                <div id="id">' . $row['admin_id'] . '</div>
                <div id="cover"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></div>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <h5 class="h6 card-title">Email</h5>
            <p class="p-0 m-0">' . $row['admin_email'] . '</p>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <h5 class="h6 card-title">Phone</h5>
            <a href="tel:' . $row['phone'] . '">' . $row['phone'] . '</a>
        </div>
    </div>';
        }
        header('Content-Type: application/json');

        echo json_encode($admindetails);
    }else{
        echo json_encode(['error' => 'no result']);
    }
} else {
    echo json_encode(['error' => 'Table name not provided']);
}

$con->close();
?>