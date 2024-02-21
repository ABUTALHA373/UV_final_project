<?php
session_start();
require '../../config/db_con.php';

if (isset($_GET['column']) && isset($_GET['value'])) {
    $column = $_GET['column'];
    if($_GET['value']==='user_id'){
        $value = $_SESSION['user_id'];
    }else{
        $value = $_GET['value'];
    }

    $sql = "SELECT bp.*, bc.name AS category_name
        FROM blog_posts bp
        LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
        WHERE $column = ? AND (published = 1 OR published = 0)";


    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo json_encode("error");
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Table name, column name, or value not provided']);
}
//profile.php
$con->close();
?>