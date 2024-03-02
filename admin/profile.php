<?php
require '../config/db_con.php';
require '../config/status_admin.php';
$adminloggedin = (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])  && isset($_SESSION['admin_type']) && isset($_SESSION['admin_status']));

if ($adminloggedin) {
    $adminmaster = (!isset($_SESSION['admin_hotel_id']) && !isset($_SESSION['admin_air_id'])  && $_SESSION['admin_type'] === 'master' && $_SESSION['admin_status'] === 'active');
    $adminhotel = (isset($_SESSION['admin_hotel_id']) && $_SESSION['admin_type'] === 'hotel' && $_SESSION['admin_status'] === 'active');
    $adminairline = (isset($_SESSION['admin_air_id']) && $_SESSION['admin_type'] === 'airline' && $_SESSION['admin_status'] === 'active');
}
if($adminloggedin && ($adminmaster || $adminairline || $adminhotel)){

require '../include/c_header.php';
?>

<main class="content" id="profile">
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>

        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3" id="admin_details">

            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Activities</h5>
                    </div>

                </div>
            </div>
        </div>

    </div>
</main>
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

<?php
require '../include/s_footer.php';
?>
<script>
$("#file_profile_image").on("change", function(e) {
    var input = e.target;
    var reader = new FileReader();

    reader.onload = function() {
        var dataURL = reader.result;
        $("#image_preview").attr("src", dataURL).removeClass("hidden");
    };

    reader.readAsDataURL(input.files[0]);
});
</script>
</body>

</html>
<?php 
}else{
    header('Location: ./login.php');
}
?>