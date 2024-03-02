<?php
session_start();
require './config/status_check.php';
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
$status = $_SESSION['user_status'];
if (!$isLoggedIn) {
    header('Location:./login.php');
} else if ($status == 'blocked') {
    session_destroy();
    header('Location:./login.php?error=user_blocked');
}else if ($status == 'deleted') {
    session_destroy();
    header('Location:./login.php?error=account_deleted');
}
require './include/nheader.php';
?>

<div id="page_profile">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <!-- <h2 class="py-4 px-4 mb-2 bg-white border text-center">Account Settings</h2> -->
            <div class="row gap-2">
                <div class="col border bg-white p-0 m-0">
                    <div class="">
                        <div class="border">
                            <div class="card-body text-center position-relative profile_image_card">
                                <div class="add_profile_img"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                                <img id="profile_image" alt="Profile Image" class="img-fluid rounded-circle mb-2" />
                                <h5 class="card-title mb-0" id="full_name"></h5>
                            </div>
                        </div>
                        <div class="list-group corner-border" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action d-flex active" id="my-profile-list"
                                data-toggle="list" href="#my-profile" role="tab" aria-controls="home">
                                <i class="fa fa-user col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My
                                    Profile</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="my-booking-list"
                                data-toggle="list" href="#my-booking" role="tab" aria-controls="home">
                                <i class="fa fa-list-ul col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My
                                    Booking</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="my-uploads-list"
                                data-toggle="list" href="#my-uploads" role="tab" aria-controls="home">
                                <i class="fa fa-cloud-upload col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My Uploads</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="myblog-list"
                                data-toggle="list" href="#myblog" role="tab" aria-controls="home">
                                <i class="fa fa-window-maximize col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">My Blog</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="list-review-list"
                                data-toggle="list" href="#list-review" role="tab" aria-controls="home">
                                <i class="fa fa-commenting col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Add Review comment</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " id="change-password-list"
                                data-toggle="list" href="#list-change-password" role="tab" aria-controls="home">
                                <i class="fa fa-lock col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Change Password</div>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex " href="javascript:void(0);"
                                id="deleteaccount" role="tab" aria-controls="home">
                                <i class="fa fa-user-times col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Delete Your Account</div>
                            </a>
                            <a href="<?php echo BASE_URL; ?>profile/logout.php"
                                class="list-group-item list-group-item-action d-flex ">
                                <i class="fa fa-sign-out col-1" aria-hidden="true"></i>
                                <div class="col-auto text-left">Logout</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 border bg-white p-0 m-0">
                    <div class="">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- my profie -->
                            <div class="tab-pane fade show active" id="my-profile" role="tabpanel"
                                aria-labelledby="my-profile-list">
                                <div class="card-header">
                                    <h4 class="text-center">My Profile</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="updateForm">
                                        <div class="row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">First Name:</label>
                                                <input type="text" id="first_name" name="first_name" placeholder="John"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'John'"
                                                    required class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Last Name:</label>
                                                <input type="text" id="last_name" name="last_name" placeholder="Doe"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Doe'"
                                                    required class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Email:</label>
                                                <input type="email" id="email" name="email"
                                                    placeholder="example@mail.com" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'example@mail.com'" required readonly
                                                    class="single-input border bg-gray">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Phone Number:</label>
                                                <input type="tel" pattern="^[0-9 ()-]+$" id="phone_number"
                                                    name="phone_number" placeholder="Enter phone number"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter phone number'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Date of
                                                    Birth:<small>(yyyy-mm-dd)</small></label>
                                                <input type="text" id="dob" name="dob" placeholder="Enter Your DOB"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Your DOB'" autoComplete="off"
                                                    required
                                                    class="single-input single-input-primary border date-picker">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">National ID (NID):</label>
                                                <input type="number" id="nid" name="nid" placeholder="Enter NID"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter NID'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Gender:</label>
                                                <div>
                                                    <select id="gender" name="gender" required class>
                                                        <option value="" disabled selected>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Marital Status:</label>
                                                <div><select id="marital_status" name="marital_status" required
                                                        class="">
                                                        <option value="" disabled selected>Select Marital Status
                                                        </option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="widowed">Widowed</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Passport:</label>
                                                <input type="number" id="passport" name="passport"
                                                    placeholder="Enter Passport Number" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Passport Number'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0 req">Country:</label>
                                                <div><select id="country" name="country" required class="">
                                                        <option value="" disabled selected>Select Your Country</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <label class="mb-0 req">Religion:</label>
                                                <input type="text" id="religion" name="religion"
                                                    placeholder="Enter Religion" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Enter Religion'" required
                                                    class="single-input single-input-primary border">
                                            </div>
                                            <div class="col m-0 p-0 col-sm">
                                                <label class="mb-0">Email verification:</label>
                                                <div>
                                                    <?php
                                                    if ($_SESSION['user_is_verified'] == 1) {
                                                        echo '<span class="badge badge-success">Verified</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Not verified</span>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row gap-3">
                                            <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                <div class="row gap-3">
                                                    <div class="col p-0">
                                                        <button id="refreshbutton"
                                                            class="genric-btn info mr-5 w-100">Refresh</button>
                                                    </div>
                                                    <div class="col p-0">
                                                        <button id="updatebutton"
                                                            class="genric-btn primary w-100">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col m-0 p-0 col-sm">
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- booking -->
                            <div class="tab-pane fade" id="my-booking" role="tabpanel"
                                aria-labelledby="my-booking-list">
                                <div class="card-header">
                                    <h4 class="text-center">My Booking</h4>
                                </div>
                                <div class="py-2 px-2">

                                    <div class="card mb-2">
                                        <div class="card-header p-2 px-5 fw-600">Flights</div>
                                        <div class="p-1 table_overflow">
                                            <table class="table  display  nowrap" id="flightDataTable" width="100%">
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card mb-2">
                                        <div class="card-header p-2 px-5 fw-600">Hotels</div>
                                        <div class="p-1 table_overflow">
                                            <table class="table  display  nowrap" id="hotelDataTable" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- uploads -->
                            <div class="tab-pane fade" id="my-uploads" role="tabpanel"
                                aria-labelledby="my-uploads-list">
                                <div class="card-header">
                                    <h4 class="text-center ">Uploads</h4>
                                </div>
                                <div class="p-3 border-bottom">
                                    <form action="" method="post" id="gallery_upload">
                                        <div class="row justify-content-between">
                                            <div class="col-3 p-0 m-0">
                                                <!-- <label class="mb-0">Image:</label> -->
                                                <div class=" file">
                                                    <input type="file" name="gallery_image" id="gallery_image"
                                                        class="single-input single-input-primary border"
                                                        accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-5 p-0 m-0">
                                                <!-- <label class="mb-0">Caption:</label> -->
                                                <div class="">
                                                    <input type="text" id="gallery_caption" name="gallery_caption"
                                                        placeholder="write small caption"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Write small caption'" required
                                                        class="single-input single-input-primary border">
                                                </div>
                                            </div>
                                            <div class="col-3 p-0 m-0">
                                                <div class="">
                                                    <button id="submitgallery"
                                                        class="genric-btn primary w-100">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- for load gallery image by user -->
                                <input type="text" name="" id="getuserid" hidden
                                    value=<?php echo $_SESSION['user_id'] ?>>
                                <div class="px-3 pb-3 border-bottom">

                                    <div class="row gallery-item" id="gallery-items">
                                        <!-- will be loaded from ajax -->
                                    </div>
                                </div>
                                <div class="p-4 d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">

                                        </ul>
                                    </nav>
                                </div>

                            </div>
                            <!-- myblog -->
                            <div class="tab-pane fade" id="myblog" role="tabpanel" aria-labelledby="myblog-list">
                                <div class="card-header">
                                    <h4 class="text-center">My Blog</h4>
                                </div>
                                <div class="py-2 px-2">
                                    <div class="p-1 table_overflow">
                                        <table class="table  display  nowrap" id="myblogDataTable" width="100%">
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- change password -->
                            <div class="tab-pane fade" id="list-review" role="tabpanel"
                                aria-labelledby="list-review-list">
                                <div class="card-header">
                                    <h4 class="text-center">Add review</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="add_review">
                                        <div class="px-lg-5">

                                            <div class="mt-3">
                                                <label class="mb-0">Your comment:</label>
                                                <div class="relative">
                                                    <textarea id="text_review"
                                                        class="single-input single-input-primary border"
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <label class="mb-0">Review:</label>
                                                <div>
                                                    <select id="review_star" name="review_star" required class>
                                                        <option value="" disabled selected>Select one</option>
                                                        <option value="1">1 star</option>
                                                        <option value="2">2 star</option>
                                                        <option value="3">3 star</option>
                                                        <option value="4">4 star</option>
                                                        <option value="5">5 star</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                    <button id="update_review"
                                                        class="genric-btn primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- change password -->
                            <div class="tab-pane fade" id="list-change-password" role="tabpanel"
                                aria-labelledby="change-password-list">
                                <div class="card-header">
                                    <h4 class="text-center">Change password</h4>
                                </div>
                                <div class="p-3">
                                    <form action="" method="post" id="change_pass">
                                        <div class="px-lg-5">
                                            <div class="">
                                                <label class="mb-0">Current password:</label>
                                                <div class="relative">
                                                    <input type="password" id="current_password" name="current_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="cp_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="pass_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <label class="mb-0">New password:</label>
                                                <div class="relative">
                                                    <input type="password" id="new_password" name="new_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="np_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="np_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <label class="mb-0">Confirm new password:</label>
                                                <div class="relative">
                                                    <input type="password" id="con_new_password" name="con_new_password"
                                                        placeholder="Your Password" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Password'" required
                                                        class="single-input single-input-primary border">
                                                    <i class="fa fa-eye eye-right" id="cnp_password-toggle"
                                                        aria-hidden="true"></i>
                                                </div>
                                                <small class=" text-danger error-info" id="cnp_error"></small>
                                            </div>
                                            <div class="mt-3">
                                                <div class="col-lg-6 col-sm m-0 p-0 col-sm">
                                                    <button id="updatepassword"
                                                        class="genric-btn primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="profile_image_modal" tabindex="-1" role="dialog" aria-labelledby="user_dataTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post" id="profile_pic_upload">
                    <div class="modal-header">
                        <h5 class="card-title mb-0 text-primary">Change Your Profile Picture</h5>
                        <button type="button" class="close" id="x_modal_close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="p-0 m-0">
                            <div class="px-4 file">
                                <input type="file" name="file_profile_image" id="file_profile_image"
                                    class="single-input single-input-primary border" accept="image/*" required>
                            </div>
                            <div class="p-4 text-center">
                                <p class="m-0 fw-500 border">Preview:</p>
                                <div class="p-4 profile_image_card">
                                    <img id="image_preview" src="#" class="hidden img-fluid rounded-circle mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn info" id="modal_close">Close</button>
                        <button type="button" class="genric-btn primary" id="modal_submit">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require './include/footer.php';
if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
    if ($message == 'verified') {

        echo '<script>Swal.fire({
            title: "Success!",
            text: "Your email is verified now!",
            icon: "success"
          });</script>';
    } else if ($message == 'already_verified') {

        echo '<script>Swal.fire({
            title: "Already Verified!",
            text: "Your email has already been verified!",
            confirmButtonColor: "#f8b600",
            icon: "info"
          });</script>';
    } else if ($message == 'invalid') {

        echo '<script>Swal.fire({
            title: "Invalid!",
            text: "Email verification invalid!",
            icon: "error"
          });</script>';
    } else if ($message == 'token_error') {

        echo '<script>Swal.fire({
            title: "Token error!",
            text: "Something is wrong with the token!",
            icon: "error"
          });</script>';
    }
}
?>
<script>
// jQuery
$(document).ready(function() {
    $("#file_profile_image").on("change", function(e) {
        var input = e.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            $("#image_preview").attr("src", dataURL).removeClass("hidden");
        };

        reader.readAsDataURL(input.files[0]);
    });
});
</script>



</body>

</html>