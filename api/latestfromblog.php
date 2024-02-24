<?php
require '../config/db_con.php';

function get_blog_posts() {
    global $con; // Avoid using globals explicitly, pass connection as an argument or use dependency injection

    $sql = "SELECT bp.*, u.first_name, u.last_name, bc.name AS category_name
    FROM blog_posts bp
    LEFT JOIN users u ON bp.user_id = u.user_id
    LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
    WHERE bp.published = 1
    ORDER BY bp.created_at DESC;
    ";

    $stmt = $con->prepare($sql); // Prepare statement
    $stmt->execute(); // Execute query
    $result = $stmt->get_result(); // Get result set

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
                // Fetch comments count
                $comments_count = $result2->fetch_assoc()['comments_count'];
                $row['total_comments'] = $comments_count;
            } else {
                // Handle error in fetching comments count
                $row['total_comments'] = 0;
            }
            $blogposts[] = $row;
        }
        return $blogposts;
    } else {
        // Handle error (logging, error message)
        return false;
    }

    // Close resources (use try-catch-finally for safe resource handling)
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $blogposts = get_blog_posts();

    if ($blogposts) {
        echo json_encode($blogposts);
    } else {
        echo json_encode(['error' => 'Failed to retrieve blog posts']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

// Close database connection (not shown in prompt)
$con->close(); // Replace with appropriate closing action based on connection handling approach


//working
?>