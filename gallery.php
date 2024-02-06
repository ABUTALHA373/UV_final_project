<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/header.php';
?>

<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Image Gallery
                </h1>
                <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="privacy_policy.php"> Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="c-area section-gap-sm">
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="image">Choose Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
            <br>
            <label for="caption">Image Caption:</label>
            <input type="text" name="caption" id="caption" required>
            <br>
            <label for="caption">User ID:</label>
            <input type="number" name="user_id" id="user_id" required>
            <br>
            <button type="submit">Upload</button>
        </form>
    </div>
</section>


<section class="c-area section-gap-sm">
    <div class="container">
        <!-- Gallery -->
        <div class="section-top-border ">
            <div class="row gallery-item">
                <div class="col-md-4">
                    <a href="img/elements/g1.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g1.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g2.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g2.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g3.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g3.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g4.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g4.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g5.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g5.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g6.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g6.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g7.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g7.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g8.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g8.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/elements/g8.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/elements/g8.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="img/top-banner.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(img/top-banner.jpg);"></div>
                    </a>
                </div>
            </div>
        </div>
</section>
<section>
    <div id="imageContainer"></div>
    <button id="prevPageButton">Previous Page</button>
    <button id="nextPageButton">Next Page</button>
</section>


<?php
require './include/footer.php';
?>

</body>

</html>