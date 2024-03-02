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
                    <p class="text-white link-nav"><a href="<?php echo BASE_URL; ?>index.php">Home </a> <span
                            class="lnr lnr-arrow-right"></span>
                        <a href="<?php echo BASE_URL; ?>blog/home.php">Blog</a>
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
                                            <option value="14">Adventure</option>
                                            <option value="13">Architecture</option>
                                            <option value="12">Art</option>
                                            <option value="11">Fashion</option>
                                            <option value="1">Food</option>
                                            <option value="10">Lifestyle</option>
                                            <option value="9">Technology</option>
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
                        <!-- <div class="single-post  mb-2 row border">
                            <div class="p-0">
                                <div class="feature-img p-4 m-0">
                                    <img class="img-fluid" src="<?php echo BASE_URL; ?>img/b2.jpg" alt="">
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
                    <div class="d-flex justify-content-center p-4 border mb-2">
                        <ul id="pagination" class="pagination"></ul>
                    </div>
                </div>

                <div class="col-lg-3 p-0">
                    <div class="widget-wrap">
                        <!-- <div class="single-sidebar-widget search-widget">
                        <form class="search-form" action="#">
                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Search Posts'">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div> -->
                        <!-- <div class="single-sidebar-widget user-info-widget">
                        <img src="img/blog/user-info.png" alt="">
                        <a href="#">
                            <h4>Charlie Barber</h4>
                        </a>
                        <p>
                            Senior blog writer
                        </p>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                        <p>
                            Boot camps have its supporters andit sdetractors. Some people do not understand why you
                            should have to spend money on boot camp when you can get. Boot camps have itssuppor ters
                            andits detractors.
                        </p>
                    </div> -->
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Post Catgories</h4>
                            <ul class="cat-list">
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Technology</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Lifestyle</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Fashion</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Art</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Food</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <p>Architecture</p>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
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
                        <!-- <div class="single-sidebar-widget ads-widget">
                        <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
                    </div> -->

                        <!-- <div class="single-sidebar-widget newsletter-widget">
                        <h4 class="newsletter-title">Newsletter</h4>
                        <p>
                            Here, I focus on a range of items and features that we use in life without
                            giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                            <div class="col-autos">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Enter email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'">
                                </div>
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>
                        <p class="text-bottom">
                            You can unsubscribe at any time
                        </p>
                    </div> -->
                        <!-- <div class="single-sidebar-widget tag-cloud-widget">
                        <h4 class="tagcloud-title">Tag Clouds</h4>
                        <ul>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Adventure</a></li>
                        </ul>
                    </div> -->
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