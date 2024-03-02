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

<main class="content" id="flights_airline">
    <div class="container-fluid p-0">

        <div class="py-2 d-flex justify-content-between">
            <h1 class="h3"><strong>Flights </strong></h1>
            <div><button class="btn btn-success" id="add_new"></i>Add New</button></div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="p-3 table_overflow">
                        <table class="table display nowrap" id="flightsDataTable">
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

        <!-- Modal update-->
        <div class="modal fade" id="view_update_modal" tabindex="-1" role="dialog" aria-labelledby="user_dataTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="updateForm" method="post">
                        <div class="modal-header">
                            <h5 class="card-title mb-0 text-primary" id="modal_title">View and Update Contacts</h5>
                            <button type="button" class="close" id="x_modal_close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <table class="table table-sm table-bordered  mb-0" style="vertical-align:middle;">
                                        <tbody>
                                            <input type="text" class="form-control" id="id" hidden>
                                            <tr>
                                                <th class="text-bold">Flight Number</td>
                                                <td>
                                                    <input type="text" class="form-control" id="fnumber" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold">Airplane Model</td>
                                                <td>
                                                    <input type="text" class="form-control" id="air_model" re>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Departure city
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="departure_city">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Arrival city
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="arrival_city">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Fare
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="fare">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Discount
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="discount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Flight Date
                                                    </td>
                                                <td>
                                                    <input type="date" class="form-control" id="flight_date">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">D_Time
                                                    </td>
                                                <td>
                                                    <input type="time" class="form-control" id="departure_time">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">A_Time
                                                    </td>
                                                <td>
                                                    <input type="time" class="form-control" id="arrival_time">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Baggage <small>(cabin)</small>
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="bag_cabin">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Baggage <small>(check-in)</small>
                                                    </td>
                                                <td>
                                                    <input type="text" class="form-control" id="bag_check_in">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class=" text-bold">Cancelation
                                                    </td>
                                                <td>
                                                    <select class="form-select" id="cancelation">
                                                        <option value="" disabled selected>- Select One -</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
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
</body>

</html>
<?php 
}else{
    header('Location: ./index.php');
}
?>