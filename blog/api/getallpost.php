<?php
// require '../../config/db_con.php';

// function get_blog_posts() {
//     global $con; // Avoid using globals explicitly, pass connection as an argument or use dependency injection

//     $sql = "SELECT bp.*, u.first_name, u.last_name, bc.name AS category_name
//     FROM blog_posts bp
//     LEFT JOIN users u ON bp.user_id = u.user_id
//     LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
//     WHERE bp.published = 1
//     ORDER BY bp.created_at DESC;
//     ";

//     $stmt = $con->prepare($sql); // Prepare statement
//     $stmt->execute(); // Execute query
//     $result = $stmt->get_result(); // Get result set

//     if ($result) {
//         $blogposts = [];
//         while ($row = $result->fetch_assoc()) {

//             $post_id = $row['post_id'];
//             $sql2 ="SELECT COUNT(CHAR_LENGTH(content)) AS comments_count FROM blog_comments WHERE post_id = ?
//             ";
//             $stmt2 = $con->prepare($sql2);
//             $stmt2->bind_param("i", $post_id);
//             $stmt2->execute();
//             $result2 = $stmt2->get_result();
//             if ($result2) {
//                 $comments_count = $result2->fetch_assoc()['comments_count'];
//                 $row['total_comments'] = $comments_count;
//             } else {
//                 $row['total_comments'] = 0;
//             }
//             $blogposts[] = $row;
//         }
//         return $blogposts;
//     } else {
//         return false;
//     }
//     $stmt->close();
// }

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $blogposts = get_blog_posts();

//     if ($blogposts) {
//         echo json_encode($blogposts);
//     } else {
//         echo json_encode(['error' => 'Failed to retrieve blog posts']);
//     }
// } else {
//     echo json_encode(['error' => 'Invalid request method']);
// }
// $con->close();


require '../../config/db_con.php';

function get_blog_posts($page, $pageSize) {
    global $con;

    $offset = ($page - 1) * $pageSize;

    $sql = "SELECT bp.*, u.first_name, u.last_name, bc.name AS category_name
            FROM blog_posts bp
            LEFT JOIN users u ON bp.user_id = u.user_id
            LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
            WHERE bp.published = 1
            ORDER BY bp.created_at DESC
            LIMIT ?, ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $offset, $pageSize);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $blogposts = [];
        while ($row = $result->fetch_assoc()) {
            $post_id = $row['post_id'];
            $sql2 ="SELECT COUNT(CHAR_LENGTH(content)) AS comments_count FROM blog_comments WHERE post_id = ?
            ";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("i", $post_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            if ($result2) {
                $comments_count = $result2->fetch_assoc()['comments_count'];
                $row['total_comments'] = $comments_count;
            } else {
                $row['total_comments'] = 0;
            }
            $blogposts[] = $row;
        }
        return $blogposts;
    } else {
        return false;
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $page = 1;
    $pageSize = 7; // Set your desired page size

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $blogposts = get_blog_posts($page, $pageSize);

    $stmt = $con->prepare("SELECT * FROM blog_posts bp WHERE bp.published = 1
    ORDER BY bp.created_at DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;
    $totalpages = ceil($rows / $pageSize);


    if ($blogposts) {
        $output = [
            'data' => $blogposts,
            'pagination' => [
                'currentPage' => $page,
                'pageSize' => $pageSize,
                'totalPages' => $totalpages
            ]
        ];

        echo json_encode($output);
    } else {
        echo json_encode(['error' => 'Failed to retrieve blog posts']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

$con->close();

?>