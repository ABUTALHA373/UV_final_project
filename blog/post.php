<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require '../include/header.php'
?>
<div id="page_blog_single">
    <section class="relative about-banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Blog Details Page
                    </h1>
                    <p class=" text-center text-white link-nav"><a href="<?php echo BASE_URL; ?>index.php">Home </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="<?php echo BASE_URL; ?>blog/home.php">Blog</a><span class="lnr lnr-arrow-right"></span>
                        <a>Blog Details Page</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area section-bg-gray p-2">
        <div class="container border bg-white p-0">
            <div class="p-3 mb-3 bg-primary">
                <h4 class="text-white text-center br-0">Blog Post</h4>
            </div>
            <div class="row">
                <div class="col-lg-9 posts-list">
                    <div id="blog_posts">
                        <!-- <div class="single-post  mb-2 row border">
                            <div class="p-0">
                                <div class="feature-img p-4 m-0">
                                    <div class="d-flex border p-2 justify-content-center align-items-center">
                                        <img class="img-fluid" src="<?php echo BASE_URL; ?>img/b2.jpg" alt="">
                                    </div>
                                </div>

                                <div class="px-4 text-center row">
                                    <div class="col-6 col-lg-3 py-3 border">
                                        <a class="fw-500 text-primary anc" href="#">Technology</a>
                                    </div>
                                    <div class="col-6 col-lg-3 py-3 border">
                                        <p class="user-name p-0 m-0">Shohel Islam
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 py-3 border">
                                        <p class="date p-0  m-0">12 Dec, 2022
                                    </div>
                                    <div class="col-6 col-lg-3 py-3  border">
                                        <p class="comments p-0  m-0">06 Comments
                                    </div>
                                </div>
                                <div class="p-4 m-0">
                                    <a class="posts-title text-justify" href="blog-single.html">
                                        <h3 class=" m-0 mb-3">Unveiling the Future: A Dive into Cutting-Edge Technology
                                            Trends</h3>
                                    </a>
                                    <p class="excert text-justify">
                                        In the fast-paced realm of technology, innovation is the driving force that
                                        propels
                                        us
                                        into
                                        an era of endless possibilities. As we stand on the cusp of the digital
                                        frontier,
                                        let's
                                        embark on a journey to explore some of the most exciting and transformative
                                        technology
                                        trends shaping our world.
                                    </p>
                                    <a href="blog-single.html" class="genric-btn primary">View More</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="comments-area my-3 py-3 border">
                        <h3 class="p-3 text-center">Comments</h3>
                        <div class="border p-0 mb-2">
                            <h5 class="card-header m-0 text-center">Add New Comment</h5>
                            <div class="p-2">
                                <textarea class="single-textarea single-input-primary" name="commentbox" id="commentbox"
                                    cols="30"></textarea>
                            </div>
                            <div class="px-2 pb-2">
                                <button class="genric-btn primary" id="add_comment">Comment</button>
                            </div>
                        </div>
                        <div class="comment-list">

                            <!-- <div class="border p-0 mb-2">
                                <h5 class="card-header m-0"><a href="#">Sohel Islam</a></h5>
                                <div class="p-3">
                                    <p class="date">December 1, 2022 at 2:17 pm </p>
                                    <p class="comment">
                                        Good!
                                    </p>
                                </div>
                            </div>
                            <div class="border p-0 mb-2">
                                <h5 class="card-header m-0"><a href="#">Sujon Islam</a></h5>
                                <div class="p-3">
                                    <p class="date">December 14, 2022 at 1:02 pm </p>
                                    <p class="comment">
                                        Nice!
                                    </p>
                                </div>
                            </div> -->
                        </div>

                    </div>
                    <!-- <div class="comment-form">
                    <h4>Leave a Comment</h4>
                    <form>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12 name">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            <div class="form-group col-lg-6 col-md-12 email">
                                <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                required=""></textarea>
                        </div>
                        <a href="#" class="primary-btn text-uppercase">Post Comment</a>
                    </form>
                </div> -->
                </div>
                <div class="col-lg-3 p-0">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Post Catgories</h4>
                            <ul class="cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Technology</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Lifestyle</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Fashion</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Art</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Food</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Architecture</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Adventure</p>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Popular Posts</h4>
                            <div class="popular-post-list">
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="img/blog/pp1.jpg" alt="">
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
                                        <img class="img-fluid" src="img/blog/pp2.jpg" alt="">
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
                                        <img class="img-fluid" src="img/blog/pp3.jpg" alt="">
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
                                        <img class="img-fluid" src="img/blog/pp4.jpg" alt="">
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
<?php

require '../include/footer.php'
?>
</body>

</html>