<?php
session_start();
require './config/status_check.php';
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
$status = $_SESSION['user_status'];

require './include/nheader.php';
?>
<div id="page_hotel_rooms">
    <section class=" section-bg-gray pt-4 pb-2">
        <div class="container p-0">
            <div class="py-4 px-4 bg-white border row ">
                <div class="col-xl-4 col-md-4 col-xm-12 p-0 m-0">
                    <div class="card_img_hotel" id="hotel_images">
                        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                            <!-- Carousel Indicators and Inner -->
                            <ol class="carousel-indicators">
                                <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                                <li data-target="#CarouselTest" data-slide-to="1"></li>
                                <li data-target="#CarouselTest" data-slide-to="2"></li>
                                <li data-target="#CarouselTest" data-slide-to="3"></li>
                                <li data-target="#CarouselTest" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="" src="https://picsum.photos/300/300?image=1072" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class=" " src="https://picsum.photos/300/300?image=855" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="" src="https://picsum.photos/300/300?image=355" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="" src="https://picsum.photos/300/300?image=355" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class=" " src="https://picsum.photos/300/300?image=355" alt="">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-8 col-xm-12 p-4 m-0">
                    <div class="p-0">
                        <h2 id="hotel_name"></h2>
                    </div>
                    <div class="py-2">
                        <h4 class="p-0 m-0" id="star_address"></h4>
                    </div>
                    <div class="py-1">
                        <p class="text-gray m-0" id="other_details"></p>
                    </div>
                    <div class="py-1">
                        <p class="p-0 mt-1 m-0"><label class="p-0 m-0">Facility:</label></p>
                        <div id="facilities" class="p-0 m-0"></div>
                    </div>
                    <div class="pt-3" id="show_on_map">
                        <a href="#" class="genric-btn primary small">Show on Map</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" section-bg-gray pb-4">
        <div class="container p-0">
            <div class="row gap-2">
                <div class="col border bg-white p-0 m-0">
                    <div class="card-header">
                        <h4 class="text-center">Rooms</h4>
                    </div>
                    <div class="p-3" id="card_container">

                    </div>
                </div>
                <div class="col-md-12 col-lg-3 p-0 m-0">
                    <div class=" border bg-white" id="sticky">
                        <div class="card-header">
                            <div class=" px-3 text-center">
                                <h4>Summary</h4>
                            </div>
                        </div>
                        <div class="p-2" style="min-height:200px" id="summary">
                            <!-- /// -->
                        </div>
                        <div class="mx-4 mb-2">
                            <p class=" mb-1 text-center text-success fw-400">Payable:(BDT)</p>
                            <input type="text" class="text-center" id="pay" readonly />
                        </div>
                        <?php if (!$isLoggedIn || $status=='blocked' || $status=='deleted') {
                            echo '<div class="pb-4 text-center"><a href="'.BASE_URL.'login.php">Login</a> to Continue.</div>';
                        }else if ($isLoggedIn && !$isVerified) {
                            echo '<div class="pb-4 text-center"><a href="'.BASE_URL.'profile.php">Verify</a> your account.</div>';
                        }else{
                            echo '<div class="p-2"><button href="" class="genric-btn primary small w-100" id="continue">Continue</button>
                            </div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End about-info Area -->


<?php
require './include/footer.php';
?>
<!-- <script>
// JavaScript code to remove the "show" class when screen size is less than lg
const filterToggle = document.getElementById('filterToggle');
const filterCollapse = document.getElementById('collapseExample');

function checkScreenSize() {
    if (window.innerWidth < 992) { // 992px is the lg breakpoint in Bootstrap
        filterCollapse.classList.remove('show');
    } else {
        filterCollapse.classList.add('show');
    }
}

// Initial check on page load
checkScreenSize();

// Check on window resize
window.addEventListener('resize', checkScreenSize);


// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#select2').select2();
});
</script> -->
</body>

</html>