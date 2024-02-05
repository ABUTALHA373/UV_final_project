$(document).ready(function () {
    function updateUserCount() {
        $.ajax({
            url: "../api/total_count.php",
            method: "GET",
            data: { table: "users" },
            dataType: "json",
            success: function (response) {
                $("#count_users").text(response.userCount);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function updateconditionCount() {
        $.ajax({
            url: "../api/condition_count.php",
            method: "GET",
            data: {
                table: "users",
                column: "status",
                value: "blocked",
            },
            dataType: "json",
            success: function (response) {
                $("#count_blocked").text(response.status);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function updateonecolumn(tableName, primaryKey, primaryColumn, columnToChange, valueToUpdate) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: '../api/updateone.php',
                method: 'POST',
                data: {
                    table: tableName,
                    primaryKey: primaryKey,
                    primaryColumn: primaryColumn,
                    columnToChange: columnToChange,
                    valueToUpdate: valueToUpdate
                },
                dataType: 'json',
                success: function (response) {
                    // Handle success
                    // console.log(response);
                    resolve(response);
                },
                error: function (error) {
                    // Handle error
                    reject(error);
                }
            });
        });
    }
    function deleteonerecord(tableName, primaryKey, primaryColumn) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: '../api/deleteone.php',
                method: 'POST',
                data: {
                    table: tableName,
                    primaryKey: primaryKey,
                    primaryColumn: primaryColumn,
                },
                dataType: 'json',
                success: function (response) {
                    // Handle success
                    console.log(response);
                    resolve(response);
                },
                error: function (error) {
                    // Handle error
                    reject(error);
                }
            });
        });
    }
    if ($("#dashboard").length > 0) {
        updateUserCount();
        updateconditionCount();
        setInterval(updateUserCount, 5000);
        setInterval(updateconditionCount, 5000);
    }
    if ($("#users").length > 0) {
        var dataTable;

        function getallfromtable(table) {
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#userDataTable").DataTable({
                        responsive: true,
                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_user" data-user-id="' +
                                        row.user_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_user" data-user-id="' +
                                        row.user_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "user_id", title: "User ID", width: "5%" },
                            { data: "email", title: "Email" },
                            {
                                data: null,
                                title: "Name",
                                render: function (data, type, row) {
                                    return row.first_name + " " + (row.last_name || "");
                                },
                            },
                            {
                                data: "is_verified",
                                title: "Is Verified",
                                render: function (data, type, row) {
                                    return data == 1
                                        ? '<span class="badge bg-success">Verified</span>'
                                        : '<span class="badge bg-danger">Not Verified</span>';
                                },
                            },
                            {
                                data: "status",
                                title: "Status",
                                render: function (data, type, row) {
                                    var status = "";
                                    if (data == "blocked") {
                                        statusforblockunblock = 'blocked';
                                        status =
                                            '<span class="badge bg-warning">Blocked</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="' + row.status + '" data-user-id="' + row.user_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    } else if (data == "deleted") {
                                        status = '<span class="badge bg-danger">Deleted</span>';
                                    } else if (data == "active") {
                                        statusforblockunblock = 'active';
                                        status =
                                            '<span class="badge bg-success">Active</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="' + row.status + '" data-user-id="' +
                                            row.user_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    }

                                    return status;
                                },
                            },
                            {
                                data: "updated_at",
                                title: "Last Update",
                                render: function (data, type, row) {
                                    var lastEditDate = new Date(data);
                                    var currentDate = new Date();
                                    var dayCount = Math.floor(
                                        (currentDate - lastEditDate) / (1000 * 60 * 60 * 24)
                                    );
                                    return (
                                        '<span class="badge bg-info">' +
                                        dayCount +
                                        "</span> days ago"
                                    );
                                },
                            },
                        ],
                        scrollX: true,
                        scrollCollapse: false,
                        fixedHeader: {
                            headerOffset: $("#navbar").height(),
                        },
                        autoWidth: true,
                        columnDefs: [{ targets: "_all", className: "border-right" }],
                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("users");


        //modal user data view
        $("#userDataTable").on("click", ".change_stats", function () {
            var userId = $(this).data("user-id").toString();
            var statusforblockunblock = $(this).data("user-status");
            var valueToUpdate = '';
            if (statusforblockunblock == 'blocked') {
                valueToUpdate = 'active';
            } else if (statusforblockunblock == 'active') {
                valueToUpdate = 'blocked';
            }
            updateonecolumn('users', userId, 'user_id', 'status', valueToUpdate)
                .then(function (result) {
                    if ($.fn.DataTable.isDataTable('#userDataTable')) {
                        $('#userDataTable').DataTable().destroy();
                    }
                    getallfromtable("users");
                })
                .catch(function (error) {
                    // console.error(error);
                });
        });
        $("#userDataTable").on("click", ".view_user", function () {
            var userId = $(this).data("user-id");
            // console.log(userId);
            viewUser(userId);
        });
        $("#userDataTable").on("click", ".delete_user", function () {
            var userId = $(this).data("user-id").toString();
            // console.log(userId);
            Swal.fire({
                title: "Do you want to delete the user?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('users', userId, 'user_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#userDataTable')) {
                                $('#userDataTable').DataTable().destroy();
                            }
                            getallfromtable("users");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            // console.error(error);
                        });


                }
            });
        });

        //user information by id
        function viewUser(userId) {
            $.ajax({
                url: "../api/getuserbyid.php",
                type: "GET",
                data: { user_id: userId },
                dataType: "json",
                success: function (response) {
                    // Update the modal fields with the retrieved data
                    // console.log(response);
                    $("#email").text(response.email);
                    $("#phone_number").text(response.phone_number);
                    $("#first_name").text(response.first_name);
                    $("#last_name").text(response.last_name);
                    $("#nid").text(response.nid);
                    $("#dob").text(response.dob);
                    $("#gender").text(response.gender);
                    $("#marital_status").text(response.marital_status);
                    $("#passport").text(response.passport);
                    if (response.is_verified == 1) {
                        stats = '<span class="badge bg-success me-1 my-1">Verified</span>';
                        $("#account_stats").html(stats);
                    } else {
                        stats =
                            '<span class="badge bg-danger me-1 my-1">Not Verified</span>';
                        $("#account_stats").html(stats);
                    }
                    if (response.status == "active") {
                        stats += '<span class="badge bg-success me-1 my-1">Active</span>';
                        $("#account_stats").html(stats);
                    } else if (response.status == "blocked") {
                        stats += '<span class="badge bg-warning me-1 my-1">Blocked</span>';
                        $("#account_stats").html(stats);
                    } else if (response.status == "deleted") {
                        stats += '<span class="badge bg-danger me-1 my-1">Deleted</span>';
                        $("#account_stats").html(stats);
                    }

                    $("#country").text(response.country);
                    $("#religion").text(response.religion);

                    // Show the modal
                    $("#user_data").modal("show");
                },
                error: function () {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                },
            });
        }

        //close modal
        $("#modal_close").on("click", function () {
            $("#user_data").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            $("#user_data").modal("hide");
        });


    }
});
