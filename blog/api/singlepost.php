<?php
require '../../config/db_con.php';

function get_blog_posts($post_id)
{
    global $con; // Avoid using globals explicitly, pass connection as an argument or use dependency injection

    $sql = "SELECT bp.*, u.first_name, u.last_name, bc.name AS category_name
            FROM blog_posts bp 
            LEFT JOIN users u ON bp.user_id = u.user_id
            LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
            WHERE post_id = ? 
            AND  bp.published = 1";

    $stmt = $con->prepare($sql); // Prepare statement
    $stmt->bind_param("i", $post_id);
    $stmt->execute(); // Execute query
    $result = $stmt->get_result(); // Get result set

    if ($result) {
        $blogposts = [];
        while ($row = $result->fetch_assoc()) {

            $post_id = $row['post_id'];
            $sql2 = "SELECT COUNT(CHAR_LENGTH(content)) AS comments_count FROM blog_comments WHERE post_id = ?";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("i", $post_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            if ($result2) {
                // Fetch comments count
                $comments_count = $result2->fetch_assoc()['comments_count'];
                $row['total_comments'] = $comments_count;
            } else {
                // Handle error in fetching comments count
                $row['total_comments'] = 0;
            }

            // $allcomments= array();

            // $sql3 = "SELECT bc.*, u.first_name, u.last_name
            // FROM blog_comments bc
            // left join users u  on bc.user_id = u.user_id
            // WHERE post_id = ?";

            // $stmt3 = $con->prepare($sql3);
            // $stmt3->bind_param("i", $post_id);
            // $stmt3->execute();
            // $result3 = $stmt3->get_result();
            // while($com = $result3->fetch_assoc()){
            //     $allcomments = $com;
            // }
            // $row['all_comments'] = $allcomments;
            $blogposts[] = $row;
        }
        return $blogposts;
    } else {
        // Handle error (logging, error message)
        return false;
    }
}

function get_all_comment($post_id)
{
    global $con;
    $sql = "SELECT bc.*, u.first_name, u.last_name
    FROM blog_comments bc
    left join users u  on bc.user_id = u.user_id
    WHERE post_id = ?";

    $stmt = $con->prepare($sql); // Prepare statement
    $stmt->bind_param("i", $post_id);
    $stmt->execute(); // Execute query
    $result = $stmt->get_result(); // Get result set

    if ($result) {
        $comments = $result->fetch_all(MYSQLI_ASSOC);
        return $comments;
    } else {
        // Handle error (logging, error message)
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $post_id = isset($_GET['postId']) ? $_GET['postId'] : null;
    $blogposts = get_blog_posts($post_id);
    $blogcomments = get_all_comment($post_id);
    if ($blogposts) {
        echo json_encode(['posts' => $blogposts, 'comments' => $blogcomments]);
    } else {
        echo json_encode(['error' => 'Failed to retrieve blog posts']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

// Close database connection (not shown in prompt)
$con->close(); // Replace with appropriate closing action based on connection handling approach

?>