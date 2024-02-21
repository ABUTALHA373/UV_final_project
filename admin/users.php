<?php
require '../include/c_header.php';
?>

<main class="content" id="users">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Users</strong></h1>
        <div class="row">
            <!-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
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
            </div> -->
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <!-- <div class="card-header">
                        <h5 class="card-title mb-0 text-primary">Registered User:</h5>
                    </div> -->
                    <div class="p-3">
                        <table class="table  display  nowrap" id="userDataTable">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell text-center">Action
                                    </th>
                                    <th class="d-none d-xl-table-cell">User ID</th>
                                    <th class="d-none d-xl-table-cell">Email</th>
                                    <th class="d-none d-xl-table-cell">Name</th>
                                    <th class="d-none d-md-table-cell">Is Verified</th>
                                    <th class="d-none d-md-table-cell">Status</th>
                                    <th class="d-none d-md-table-cell">Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
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
                                <img src="img/avatars/avatar-4.jpg" alt="Christina Mason"
                                    class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                <h5 class="card-title mb-0">Christina Mason</h5>

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
</body>

</html>