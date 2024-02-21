<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/nheader.php';
?>
<div id="page_hotel_search">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <div class="py-4 px-4 mb-2 bg-white border">
                <form class="m-0 p-0" action="" method="GET">
                    <div class="row gap-2">
                        <div class="col-lg-2 col-md-12 col-sm-12 p-1">
                            <div>
                                <label class="m-0 pl-1 w-100">Place:</label>
                                <select class="w-100 " id="hotel_place_select">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 p-1">
                            <div class="">
                                <label class="m-0 pl-1 w-100">Check-in date:</label>
                                <input type="text" value="<?php echo date('Y-m-d'); ?>"
                                    class="single-input single-input-primary border date-picker" name="Check-in-date"
                                    placeholder="Select a date " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Select a date'">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md col-sm p-1">
                            <div class=""><label class="m-0 pl-1 w-100">Check-out date:</label>
                                <input type="text" value="<?php echo date('Y-m-d', strtotime('+2 days')); ?>"
                                    class="single-input single-input-primary border date-picker" name="Check-out-date"
                                    placeholder="Select a date " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Select a date'">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 p-1">
                            <div class=""><label class="m-0 pl-1 w-100">Adults:<small>(Per room)</small></label>
                                <input type="number" value="2" name="adults" placeholder="Adults"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults'" required
                                    class="single-input single-input-primary border">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md col-sm p-1">
                            <div class=""><label class="m-0 pl-1 w-100">Total rooms:</label>
                                <input type="number" value="1" name="total-room" placeholder="Total rooms"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Total rooms'" required
                                    class="single-input single-input-primary border">
                            </div>
                        </div>
                        <div class="col-lg col-md-12 col-sm-12 p-1">
                            <div class="">
                                <div style="height: 22.75px;"></div>
                                <button type="submit" class="genric-btn primary w-100">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row gap-2">
                <div class="col-md-12 col-lg-3 border bg-white p-0 m-0">
                    <div class="card-header row">
                        <div class="col-10 px-3">
                            <h4>Filters</h4>
                        </div>
                        <div class="col-2 px-3">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample"><b><i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></b>
                            </a>
                        </div>
                    </div>
                    <div class="collapse show p-3" id="collapseExample">
                        <div class=" border px-2 pt-2">
                            <h6 class="border-bottom mb-2">Hotel Rating:</h6>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating5" value="5">
                                <label class="" for="rating5">5 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating4" value="4">
                                <label class="" for="rating4">4 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating3" value="3">
                                <label class="" for="rating3">3 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating2" value="2">
                                <label class="" for="rating2">2 star</label>
                            </div>
                            <div class="">
                                <input class="" type="checkbox" name="hotel_rating[]" id="rating1" value="1">
                                <label class="" for="rating1">1 star</label>
                            </div>
                        </div>
                        <div class="border mt-3 px-2 pt-2">
                            <h6 class="border-bottom mb-2">Popularity:</h6>
                            <div class="">
                                <input class="" type="radio" name="popularity" id="high" value="high">
                                <label class="" for="high">High</label>
                            </div>
                            <div class="">
                                <input class="" type="radio" name="popularity" id="medium" value="low">
                                <label class="" for="medium">Medium</label>
                            </div>
                        </div>
                        <div class="border mt-3 px-2 pt-2">
                            <h6 class="border-bottom mb-2">Price order:</h6>
                            <div class="">
                                <input class="" type="radio" name="price_order" id="l2h" value="l2h">
                                <label class="" for="l2h">Low to High</label>
                            </div>
                            <div class="">
                                <input class="" type="radio" name="price_order" id="h2l" value="h2l">
                                <label class="" for="h2l">High to Low</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border bg-white p-0 m-0">
                    <div class="card-header">
                        <h4 class="text-center">Hotels</h4>
                    </div>
                    <div class="p-3" id="card_container">
                        <!-- from js  -->

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
<script>
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
</script>
</body>

</html>