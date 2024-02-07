<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/header.php';
?>
<div id="page_gallery">
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Image Gallery
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span
                            class="lnr lnr-arrow-right"></span>
                        <a href="privacy_policy.php"> Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="c-area section-gap-sm section-bg-white">
        <div class="container">
            <!-- Gallery -->
            <div class="section-top-border ">
                <div class="row gallery-item" id="gallery-items">
                    <!-- //loaded form ajax -->
                </div>
            </div>
            <div class="p-4 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                    </ul>
                </nav>
            </div>
    </section>
</div>
<?php
require './include/footer.php';
?>

</body>

</html>