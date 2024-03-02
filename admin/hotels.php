<?php
require '../config/db_con.php';
require '../config/status_admin.php';
$adminloggedin = (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])  && isset($_SESSION['admin_type']) && isset($_SESSION['admin_status']));

if ($adminloggedin) {
    $adminmaster = (!isset($_SESSION['admin_hotel_id']) && !isset($_SESSION['admin_air_id'])  && $_SESSION['admin_type'] === 'master' && $_SESSION['admin_status'] === 'active');
    $adminhotel = (isset($_SESSION['admin_hotel_id']) && $_SESSION['admin_type'] === 'hotel' && $_SESSION['admin_status'] === 'active');
    $adminairline = (isset($_SESSION['admin_air_id']) && $_SESSION['admin_type'] === 'airline' && $_SESSION['admin_status'] === 'active');
}
if($adminloggedin && $adminmaster){

require '../include/c_header.php';
?>

<main class="content" id="hotel_master">
    <div class="container-fluid p-0">

        <div class="py-2 d-flex justify-content-between">
            <h1 class="h3"><strong>Hotels</strong></h1>
            <div><button class="btn btn-success" id="add_new"></i>Add New</button></div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="p-3 table_overflow">
                        <table class="table display nowrap" id="hotelsDatatable">
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
                                    <!-- <th></th> -->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal update-->
        <div class="modal fade" id="view_update_modal" tabindex="-1" role="dialog" aria-labelledby="user_dataTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="updateForm" method="post">
                        <div class="modal-header">
                            <h5 class="card-title mb-0 text-primary" id="modal_title">View and Update Hotels</h5>
                            <button type="button" class="close" id="x_modal_close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-0">
                                <div class="card-body text-center">
                                    <div class="">
                                        <div class="px-3 pb-3 file">
                                            <input type="file" name="file_image" id="file_image" class="form-control"
                                                accept="image/*" required>

                                        </div>
                                        <div class="text-center  profile_image_card">
                                            <img id="view_image" alt="Hotel Image"
                                                class="img-fluid rounded-circle mb-2" />
                                            <h5 class="text-dark card-title mt-2 mb-0" id="full_name"></h5>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">
                                    <table class="table table-sm table-bordered  mb-0" style="vertical-align:middle;">
                                        <tbody>
                                            <input type="text" class="form-control" id="id" hidden>
                                            <input type="text" class="form-control" id="img" hidden>
                                            <tr>
                                                <th class="text-bold">Name</td>
                                                <td>
                                                    <input type="text" class="form-control" id="name" re>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Email
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Phone
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="phone">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Address
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="address">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Location
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="location">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Facility
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="facility">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Star</th>
                                                <td>
                                                    <select class="form-select" id="star">
                                                        <option value="" disabled selected>- Select star -</option>
                                                        <option value="1"> 1 star </option>
                                                        <option value="2"> 2 star </option>
                                                        <option value="3"> 3 star </option>
                                                        <option value="4"> 4 star </option>
                                                        <option value="5"> 5 star </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Others
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="others">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><a id="map_link">Map Link</a></td>
                                                <td>
                                                    <input type="text" class="form-control" id="map">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" id="modal_close">Close</button>
                            <button type="submit" class="btn btn-primary" id="update">Update</button>
                            <button type="submit" class="btn btn-primary" id="add" hidden>Add New</button>
                        </div>
                    </form>
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