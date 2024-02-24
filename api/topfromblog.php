<?php

require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT bp.*, bc.name AS category_name
            FROM blog_posts bp
            LEFT JOIN blog_categories bc ON bp.category_id = bc.category_id
            WHERE bp.published = 1
            ORDER BY bp.created_at DESC
            LIMIT 6";

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="single-recent-blog-post item bg-white">
        <div class="thumb">
            <img class="img-fluid border-bottom" src="blog/' . $row['image_url'] . '" alt="">
        </div>
        <div class="details px-4 pb-3">
            <div class="tags">
                <ul>
                    <li>
                        <a href="blog/home.php">' . $row['category_name'] . '</a>
                    </li>
                </ul>
            </div>
            <a href="blog/post.php?id=' . $row['post_id'] . '">
                <h4 class="title line2 text-justify">' . $row['title'] . '</h4>
            </a>
            <h6 class="date">' . $row['created_at'] . '</h6>
        </div>
    </div>';
    }

    echo $output;
    $stmt->close();
}
?>