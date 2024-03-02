<?php
session_start();
require '../config/status_check.php';
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
$status = isset($_SESSION['user_status']);

require '../include/header.php'
?>


<!-- start banner Area -->
<div id="page_blog_home">
    <section class="relative about-banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Blog
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span
                            class="lnr lnr-arrow-right"></span>
                        <a href="contact.php">Blog</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="post-content-area section-bg-gray p-2">
        <div class="container border bg-white p-0">
            <div class="p-3 mb-3 bg-primary">
                <h4 class="text-white text-center br-0">Blog Feed</h4>
            </div>
            <div class="row">
                <div class="col-lg-9 posts-list">
                    <div class="card-header border mb-2">
                        <?php if($isLoggedIn && $status == 'active'){
                            echo '<form id="data_blogpost" action="post" enctype="multipart/form-data">
                            <div>
                                <label class="ml-1 mb-0 inputarea">Title:</label>
                                <input type="text" id="title_blogpost" name="title_blogpost" placeholder="Post Title"
                                    onfocus="this.placeholder = """ onblur="this.placeholder = "Post Title" required
                                    class="single-input single-input-primary border">
                            </div>
                            <div class="row column-gap-2 p-0 m-0">
                                <div class="col-xl-6 col-sm-12 p-0 m-0">
                                    <div class="mt-2">
                                        <label class="ml-1 mb-0 inputarea">Category:</label>
                                        <select id="category_blogpost" name="category_blogpost" required>
                                            <option value="" selected disabled>Select a Category</option>
                                            <option value="1">Food</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl col-sm-12 p-0 m-0">
                                    <div class="mt-2">
                                        <label class="ml-1 mb-0 inputarea">Image:</label>
                                        <div class=" file">
                                            <input type="file" name="image_blogpost" id="image_blogpost"
                                                class="single-input single-input-primary border" accept="image/*"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="ml-1 mb-0 inputarea">Content:</label>
                                <textarea name="content_blogpost" id="content_blogpost" required></textarea>
                            </div>
                            <div class="mt-2">
                                <button id="post_blog" class="genric-btn primary w-100">Post</button>
                            </div>
                        </form>';
                        } else{
                            echo '<div class="p-4">
                            <p class="text-center p-0 m-0">Please <a href="'.BASE_URL.'login.php">Login</a> to create a new post.</p>
                        </div>';
                        }?>


                    </div>
                    <div id="blog_posts">
                    </div>

                </div>
                <div class="col-lg-3 p-0">
                    <div class="widget-wrap">

                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Post Catgories</h4>
                            <ul class="cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Technology</p>
                                        <p>37</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Lifestyle</p>
                                        <p>24</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Fashion</p>
                                        <p>59</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Art</p>
                                        <p>29</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Food</p>
                                        <p>15</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Architecture</p>
                                        <p>09</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Adventure</p>
                                        <p>44</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Popular Posts</h4>
                            <div class="popular-post-list">
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="blog-single.html">
                                            <h6>Space The Final Frontier</h6>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="blog-single.html">
                                            <h6>The Amazing Hubble</h6>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="blog-single.html">
                                            <h6>Astronomy Or Astrology</h6>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="blog-single.html">
                                            <h6>Asteroids telescope</h6>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End post-content Area -->
<?php

require '../include/footer.php'
?>

</body>

</html>