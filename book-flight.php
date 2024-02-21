<?php
session_start();
require './config/status_check.php';
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
$status = $_SESSION['user_status'];

require './include/nheader.php';
?>
<style>

</style>
<div id="page_book_flight">
    <!-- <section class=" section-bg-gray pt-4 pb-2">
        <div class="container p-0">
            <div class="py-4 px-4 bg-white border row ">
                <div class="col-xl-4 col-md-4 col-xm-12 p-0 m-0">
                    <div class="card_img_hotel" id="hotel_images">
                        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
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
    </section> -->
    <section class=" section-bg-gray py-4">
        <div class="container p-0">
            <div class="row gap-2">
                <div class="col border bg-white p-0 m-0">
                    <div class="card-header">
                        <h4 class="text-center">Flight Details</h4>
                    </div>
                    <div class="p-3" id="card_container">
                        <!-- card -->
                        <div class="card card_flight border mb-2">
                            <div class="row">
                                <div class="img-col col-sm-12 col-xl-3 col-md-3 p-0">
                                    <div class="card_images_flight border">
                                        <img class="d-block w-100" id="air_img"
                                            src="images/airlines/biman-bangladesh-airlines2895.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-9 col-md-9 p-0">
                                    <div class="row link h-100">
                                        <div
                                            class="col-12 text-center py-2 border d-flex justify-content-center align-items-center">
                                            <div class="w-100">
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success" id="der_city"></h6>
                                                        <p class="fw-500" id="dep_time"></p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <i class="fa fa-long-arrow-right fa-2x w-100 py-1"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success" id="ari_city"></h6>
                                                        <p class="fw-500" id="ari_time"></p>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Flight:</small>
                                                        <p class="text-info p-0 m-0 fw-500" id="flight_num"></p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Airplane:</small>
                                                        <p class="text-info p-0 m-0 fw-500" id="airplane_model"></p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Class:</small>
                                                        <p class="text-info p-0 m-0 fw-500" id="ticket_class"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card card_flight border mb-2">
                            <div class="row">
                                <p class="p-1 px-4 m-0 fw-500 border-bottom w-100 card-header">Baggage & Policy</p>
                                <div class="col-12 p-0">
                                    <div class="row link h-100">
                                        <div class="col-12 text-center py-2 px-4">
                                            <div class="row text-left">
                                                <div class="col-4 p-0 m-0">
                                                    <small class="p-0 m-0 fw-500 text-gray">Cabin:</small>
                                                    <p class="text-info p-0 m-0 fw-500" id="bag_cabin"></p>
                                                </div>
                                                <div class="col-4 p-0 m-0">
                                                    <small class="p-0 m-0 fw-500 text-gray">Check-in:</small>
                                                    <p class="text-info p-0 m-0 fw-500" id="bag_check_in"></p>
                                                </div>
                                                <div class="col-4 p-0 m-0">
                                                    <small class="p-0 m-0 fw-500 text-gray">Cancelation:</small>
                                                    <p class="text-info p-0 m-0 fw-500" id="cancelation"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card_flight border mb-2">
                            <div class="row">
                                <p class="p-1 px-4 m-0 fw-500 border-bottom w-100 card-header">Seats</p>
                                <div class="col-12 p-2">
                                    <div class="w-100">
                                        <table id="seats_table">
                                            <thead>
                                                <tr>
                                                    <th>A</th>
                                                    <th>B</th>
                                                    <th class='none'></th>
                                                    <th>C</th>
                                                    <th>D</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 1; $i <= 10; $i++) {
                                                    echo "<tr>
                                                            <td id='seat-A" . sprintf("%02d", $i) . "'>A" . sprintf("%02d", $i) . "</td>
                                                            <td id='seat-B" . sprintf("%02d", $i) . "'>B" . sprintf("%02d", $i) . "</td>
                                                            <td class='none'></td>
                                                            <td id='seat-C" . sprintf("%02d", $i) . "'>C" . sprintf("%02d", $i) . "</td>
                                                            <td id='seat-D" . sprintf("%02d", $i) . "'>D" . sprintf("%02d", $i) . "</td>
                                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card_flight border mb-2">
                            <div class="row">
                                <p class="p-1 px-4 m-0 fw-500 border-bottom w-100 card-header">Personal Details</p>
                                <div class="col-12 p-0">
                                    <div class="row link h-100 p-2">
                                        <div class="col-12 text-center  py-2 px-0" id="person_details">
                                            <!-- from ajax -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card card_flight border mb-2">
                            <div class="row">
                                <div class="img-col col-sm-12 col-xl-3 col-md-3 p-0">
                                    <div class="card_images_flight border">
                                        <img class="d-block w-100"
                                            src="images/airlines/biman-bangladesh-airlines2895.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-9 col-md-9 p-0">
                                    <div class="row link h-100">
                                        <div
                                            class="col-9 text-center py-2 border d-flex justify-content-center align-items-center">
                                            <div class="w-100">
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success">Dhaka</h6>
                                                        <p class="fw-500">10:00:00</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <i class="fa fa-long-arrow-right fa-2x w-100 py-1"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <h6 class="pb-1 text-success">Chittagong</h6>
                                                        <p class="fw-500">13:00:00</p>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Flight:</small>
                                                        <p class="text-info p-0 m-0 fw-500">ABC123</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Airplane:</small>
                                                        <p class="text-info p-0 m-0 fw-500">BOING 747</p>
                                                    </div>
                                                    <div class="col-4 p-0 m-0">
                                                        <small class="p-0 m-0 fw-500 text-gray">Class:</small>
                                                        <p class="text-info p-0 m-0 fw-500">Economy</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 pr-3 d-flex align-items-center border">
                                            <div class="p-0 w-100 text-right">
                                                <p class="p-0 m-0 "><span class=" text-danger relative start_price">৳
                                                        1500</span></p>
                                                <h5 class="mb-2 mt-1"><span class="badge badge-success mr-1">5%</span>৳
                                                    1425</h5>
                                                <a href="book-flight.php?flightId=16&amp;departureCity=Dhaka&amp;arrivalCity=Chittagong&amp;person=1&amp;class=economy_class&amp;flightDate=2024-03-01&amp;totalPrice=1425"
                                                    class="genric-btn primary small w-100 add-room-btn"
                                                    style="padding:0">Continue</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="col-md-12 col-lg-4 p-0 m-0">
                    <div class=" border bg-white" id="sticky">
                        <div class="card-header">
                            <div class=" px-3 text-center">
                                <h4>Summary</h4>
                            </div>
                        </div>
                        <div class="p-2" style="min-height:200px" id="summary">
                            <!-- /// -->
                            <div class="row p-2">
                                <div class="col-4 p-0 m-0 mb-1 fw-500">
                                    <p class="m-0 mb-1 p-0">Fare:</p>
                                    <p class="m-0 mb-1 p-0">Tax:</p>
                                    <p class="m-0 mb-1 p-0 fw-600">Total:</p>
                                </div>
                                <div class="col-8 text-right p-0 m-0 mb-1">
                                    <p class="m-0 mb-1 p-0"><span class="badge badge-success mr-1"><span
                                                id="discount"></span>%</span>৳<span class="ml-1"
                                            id="ticket_fare"></span></p>
                                    <p class="m-0 mb-1 p-0">৳<span class="ml-1" id="ticket_tax"></span></p>
                                    <p class="m-0 mb-1 p-0 fw-600">৳<span class="ml-1" id="ticket_total"></span></p>
                                </div>
                            </div>
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
<!-- <script>
function bookSeat(cell) {
    alert('Booking seat: ' + cell.innerHTML);
    // You can add further logic to handle seat booking here
}
</script>
<script>
// Get the data-seats attribute value
var bookedSeats = $('#seats_table').data('seats').split(',');

// Loop through booked seats and set background colors
bookedSeats.forEach(function(seat) {
    // Find the td element with the corresponding data-seat attribute
    var tdElement = $('td:contains("' + seat + '")');

    // Check if the td element is found
    if (tdElement.length > 0) {
        // Apply different background colors based on conditions
        tdElement.css('background-color', 'red'); // You can adjust the color as needed
    }
});
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Get booked seats from data-seats attribute
    var bookedSeatsAttr = $('#seats_table').attr('data-seats');
    var bookedSeats = bookedSeatsAttr ? bookedSeatsAttr.split(',') : [];

    // Make seats clickable
    $('td[id^="A"], td[id^="B"], td[id^="C"], td[id^="D"]').click(function() {
        var seatId = $(this).attr('id');

        // Check if the seat is booked
        if (bookedSeats.includes(seatId)) {
            alert('Seat ' + seatId + ' is already booked!');
        } else {
            // Toggle seat selection
            $(this).toggleClass('selected');

            // Change background color based on selection
            if ($(this).hasClass('selected')) {
                $(this).css('background-color', 'green');
            } else {
                $(this).css('background-color', 'white');
            }
        }
    });

    // On form submission, collect selected seats
    $('#submitBtn').click(function() {
        var selectedSeats = $('.selected').map(function() {
            return this.id;
        }).get();

        // Display selected seats (you can send this data to the server)
        alert('Selected Seats: ' + selectedSeats.join(', '));
    });
});
</script> -->

</script>
</body>

</html>