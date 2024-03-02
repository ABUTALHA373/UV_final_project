<?php
require '../config/db_con.php';
require '../config/status_admin.php';
$adminloggedin = (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])  && isset($_SESSION['admin_type']) && isset($_SESSION['admin_status']));

if ($adminloggedin) {
    $adminmaster = (!isset($_SESSION['admin_hotel_id']) && !isset($_SESSION['admin_air_id'])  && $_SESSION['admin_type'] === 'master' && $_SESSION['admin_status'] === 'active');
    $adminhotel = (isset($_SESSION['admin_hotel_id']) && $_SESSION['admin_type'] === 'hotel' && $_SESSION['admin_status'] === 'active');
    $adminairline = (isset($_SESSION['admin_air_id']) && $_SESSION['admin_type'] === 'airline' && $_SESSION['admin_status'] === 'active');
}
if ($adminloggedin && $adminmaster) {

    require '../include/c_header.php';
?>
<main class="content" id="dashboard_master">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-primary">General Users</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-white">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span>Total:</span>
                                        <h1 class="d-inline" id="count_users">0</h1>
                                    </div>
                                    <div class="mb-0">
                                        <span class="text-muted">Blocked:</span>
                                        <span class="badge bg-danger " id="count_blocked"> 0
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-primary">Blog Posts</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span>Total:</span>
                                        <h1 class="d-inline" id="count_blog">0</h1>
                                    </div>
                                    <div class="mb-0">
                                        <span class="text-muted">Unpublished:</span>
                                        <span class="badge bg-danger " id="count_blog_unpub"> 0
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-primary">Airlines</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fa fa-plane fa-2 text-white" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span>Total:</span>
                                        <h1 class="d-inline" id="count_air">0</h1>
                                    </div>
                                    <div class="mb-0">
                                        <span class="text-muted">New:</span>
                                        <span class="badge bg-success " id="count_blog_unpub"> 0
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-primary">Hotels</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="home"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span>Total:</span>
                                        <h1 class="d-inline" id="count_hotel">0</h1>
                                    </div>
                                    <div class="mb-0">
                                        <span class="text-muted">New:</span>
                                        <span class="badge bg-success " id="count_blog_unpub"> 0
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Display</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Projects</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Start Date</th>
                                <th class="d-none d-xl-table-cell">End Date</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Assignee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Project Apollo</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Fireball</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project Hades</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Nitro</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Phoenix</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project X</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Romeo</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Christina Mason</td>
                            </tr>
                            <tr>
                                <td>Project Wombat</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Monthly Sales</h5>
                    </div>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <canvas id="chartjs-dashboard-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</main>

<?php
    require '../include/s_footer.php';
    ?>
</body>

</html>



<?php
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
} else if ($adminloggedin && $adminairline) {

    require '../include/c_header.php';
?>
<main class="content" id="airline_dashboard">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body py-3">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body py-3">
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
} else if ($adminloggedin && $adminhotel) {

    require '../include/c_header.php';
?>
<main class="content" id="airline_dashboard">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body py-3">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body py-3">
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
} else {
    header('Location: ./logout.php');
}
?>