<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/nheader.php';
?>
<div id="page_flight_search">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <div class="py-4 px-4 mb-2 bg-white border">
                <form class="m-0 p-0" action="" method="GET">
                    <div class="row gap-2">
                        <div class="col-lg-2 col-md-12 col-sm-12 p-1">
                            <div>
                                <label class="m-0 pl-1 w-100">From:</label>
                                <select class="w-100" id="flight_dep_select" name="from"
                                    value="<?php echo isset($_GET['from']) ? $_GET['from'] : 'h'; ?>">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12 p-1">
                            <div>
                                <label class="m-0 pl-1 w-100">To:</label>
                                <select class="w-100" id="flight_ari_select" name="to">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md col-sm p-1">
                            <div class=""><label class="m-0 pl-1 w-100">Flight date:</label>
                                <input type="text" class="single-input single-input-primary border date-picker"
                                    name="flight_date" name="flight_date" value="<?php echo date('Y-m-d'); ?>"
                                    placeholder="Select a date " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Select a date'">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 p-1">
                            <div class=""><label class="m-0 pl-1 w-100">Person<small>(max 4)</small>:</label>
                                <input type="number" name="flight_person" name="flight_person" min="1" max="4"
                                    placeholder="Person" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Person'" value="1" required
                                    class="single-input single-input-primary border">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12 p-1">
                            <div>
                                <label class="m-0 pl-1 w-100">Selcet type:</label>
                                <select class="w-100 " id="flight_select_class">
                                    <Option value="economy_class">Ecomony</Option>
                                    <Option value="business_class">Business</Option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg col-md-12 col-sm-12 p-1">
                            <div class="">
                                <div style="height: 22.75px;"></div>
                                <button type="button" id="search_flight_button"
                                    class="genric-btn primary w-100">Search</button>
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
                        <h4 class="text-center">Flights</h4>
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