<?php
require '../config/db_con.php';
require '../config/status_admin.php';
$adminloggedin = (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])  && isset($_SESSION['admin_type']) && isset($_SESSION['admin_status']));

if ($adminloggedin) {
    $adminmaster = (!isset($_SESSION['admin_hotel_id']) && !isset($_SESSION['admin_air_id'])  && $_SESSION['admin_type'] === 'master' && $_SESSION['admin_status'] === 'active');
    $adminhotel = (isset($_SESSION['admin_hotel_id']) && $_SESSION['admin_type'] === 'hotel' && $_SESSION['admin_status'] === 'active');
    $adminairline = (isset($_SESSION['admin_air_id']) && $_SESSION['admin_type'] === 'airline' && $_SESSION['admin_status'] === 'active');
}
if($adminloggedin && $adminairline){

require '../include/c_header.php';
?>

<main class="content" id="booking_airline">
    <div class="container-fluid p-0">
        <div class="py-2 d-flex justify-content-between">
            <h1 class="h3"><strong>Flight Bookings</strong></h1>
            <!-- <div><button class="btn btn-success" id="add_new"></i>Add New</button></div> -->
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="p-3 table_overflow">
                        <table class="table display nowrap" id="flight_bookingDatatable">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="user_data" tabindex="-1" role="dialog" aria-labelledby="user_dataTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="card-title mb-0 text-primary">Profile Details</h5>
                        <button type="button" class="close" id="x_modal_close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-3">

                            <div class="card-body text-center">
                                <div class="">
                                    <div class="text-center  profile_image_card">
                                        <img id="profile_image" alt="Profile Image"
                                            class="img-fluid rounded-circle mb-2" />
                                        <h5 class="text-dark card-title mt-2 mb-0" id="full_name"></h5>
                                    </div>
                                </div>

                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">Account</h5>
                                <div id="account_stats">

                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">About</h5>
                                <table class="table table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="text-bold">First Name</td>
                                            <td id="first_name"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Last Name</td>
                                            <td id="last_name"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Email</td>
                                            <td id="email"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Phone Number</td>
                                            <td id="phone_number"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">NID</td>
                                            <td id="nid"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Date of Birth</td>
                                            <td id="dob"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Gender</td>
                                            <td id="gender"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Marital Status</td>
                                            <td id="marital_status"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Passport</td>
                                            <td id="passport"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Country</td>
                                            <td id="country"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-bold">Religion</td>
                                            <td id="religion"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="modal_close">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
require '../include/s_footer.php';
?>
<script>
// jQuery
$(document).ready(function() {
    $("#file_image").on("change", function(e) {
        var input = e.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            $("#view_image").attr("src", dataURL).removeClass("hidden");
        };

        reader.readAsDataURL(input.files[0]);
    });
});
</script>
</body>

</html>
<?php 
}else{
    header('Location: ./index.php');
}
?>