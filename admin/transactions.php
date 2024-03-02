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

<main class="content" id="transaction_master">
    <div class="container-fluid p-0">



        <div class="py-2 d-flex justify-content-between">
            <h1 class="h3"><strong>Transactions</strong></h1>
            <!-- <div><button class="btn btn-success" id="add_new"></i>Add New</button></div> -->
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="p-3 table_overflow">
                        <table class="table display nowrap" id="transactionDatatable">
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
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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