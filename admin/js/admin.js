//
//

$(document).ready(function () {
    const countryOptions = [
        { id: "Afghanistan", text: "Afghanistan" },
        { id: "Aland Islands", text: "Aland Islands" },
        { id: "Albania", text: "Albania" },
        { id: "Algeria", text: "Algeria" },
        { id: "American Samoa", text: "American Samoa" },
        { id: "Andorra", text: "Andorra" },
        { id: "Angola", text: "Angola" },
        { id: "Anguilla", text: "Anguilla" },
        { id: "Antarctica", text: "Antarctica" },
        { id: "Antigua And Barbuda", text: "Antigua And Barbuda" },
        { id: "Argentina", text: "Argentina" },
        { id: "Armenia", text: "Armenia" },
        { id: "Aruba", text: "Aruba" },
        { id: "Australia", text: "Australia" },
        { id: "Austria", text: "Austria" },
        { id: "Azerbaijan", text: "Azerbaijan" },
        { id: "Bahamas", text: "Bahamas" },
        { id: "Bahrain", text: "Bahrain" },
        { id: "Bangladesh", text: "Bangladesh" },
        { id: "Barbados", text: "Barbados" },
        { id: "Belarus", text: "Belarus" },
        { id: "Belgium", text: "Belgium" },
        { id: "Belize", text: "Belize" },
        { id: "Benin", text: "Benin" },
        { id: "Bermuda", text: "Bermuda" },
        { id: "Bhutan", text: "Bhutan" },
        { id: "Bolivia", text: "Bolivia" },
        { id: "Bosnia And Herzegovina", text: "Bosnia And Herzegovina" },
        { id: "Botswana", text: "Botswana" },
        { id: "Bouvet Island", text: "Bouvet Island" },
        { id: "Brazil", text: "Brazil" },
        {
            id: "British Indian Ocean Territory",
            text: "British Indian Ocean Territory",
        },
        { id: "Brunei Darussalam", text: "Brunei Darussalam" },
        { id: "Bulgaria", text: "Bulgaria" },
        { id: "Burkina Faso", text: "Burkina Faso" },
        { id: "Burundi", text: "Burundi" },
        { id: "Cambodia", text: "Cambodia" },
        { id: "Cameroon", text: "Cameroon" },
        { id: "Canada", text: "Canada" },
        { id: "Cape Verde", text: "Cape Verde" },
        { id: "Cayman Islands", text: "Cayman Islands" },
        { id: "Central African Republic", text: "Central African Republic" },
        { id: "Chad", text: "Chad" },
        { id: "Chile", text: "Chile" },
        { id: "China", text: "China" },
        { id: "Christmas Island", text: "Christmas Island" },
        { id: "Cocos (Keeling) Islands", text: "Cocos (Keeling) Islands" },
        { id: "Colombia", text: "Colombia" },
        { id: "Comoros", text: "Comoros" },
        { id: "Congo", text: "Congo" },
        { id: "Congo Democratic Republic", text: "Congo Democratic Republic" },
        { id: "Cook Islands", text: "Cook Islands" },
        { id: "Costa Rica", text: "Costa Rica" },
        { id: "Cote D'Ivoire", text: "Cote D'Ivoire" },
        { id: "Croatia", text: "Croatia" },
        { id: "Cuba", text: "Cuba" },
        { id: "Cyprus", text: "Cyprus" },
        { id: "Czech Republic", text: "Czech Republic" },
        { id: "Denmark", text: "Denmark" },
        { id: "Djibouti", text: "Djibouti" },
        { id: "Dominica", text: "Dominica" },
        { id: "Dominican Republic", text: "Dominican Republic" },
        { id: "Ecuador", text: "Ecuador" },
        { id: "Egypt", text: "Egypt" },
        { id: "El Salvador", text: "El Salvador" },
        { id: "Equatorial Guinea", text: "Equatorial Guinea" },
        { id: "Eritrea", text: "Eritrea" },
        { id: "Estonia", text: "Estonia" },
        { id: "Ethiopia", text: "Ethiopia" },
        { id: "Falkland Islands (Malvinas)", text: "Falkland Islands (Malvinas)" },
        { id: "Faroe Islands", text: "Faroe Islands" },
        { id: "Fiji", text: "Fiji" },
        { id: "Finland", text: "Finland" },
        { id: "France", text: "France" },
        { id: "French Guiana", text: "French Guiana" },
        { id: "French Polynesia", text: "French Polynesia" },
        { id: "French Southern Territories", text: "French Southern Territories" },
        { id: "Gabon", text: "Gabon" },
        { id: "Gambia", text: "Gambia" },
        { id: "Georgia", text: "Georgia" },
        { id: "Germany", text: "Germany" },
        { id: "Ghana", text: "Ghana" },
        { id: "Gibraltar", text: "Gibraltar" },
        { id: "Greece", text: "Greece" },
        { id: "Greenland", text: "Greenland" },
        { id: "Grenada", text: "Grenada" },
        { id: "Guadeloupe", text: "Guadeloupe" },
        { id: "Guam", text: "Guam" },
        { id: "Guatemala", text: "Guatemala" },
        { id: "Guernsey", text: "Guernsey" },
        { id: "Guinea", text: "Guinea" },
        { id: "Guinea-Bissau", text: "Guinea-Bissau" },
        { id: "Guyana", text: "Guyana" },
        { id: "Haiti", text: "Haiti" },
        {
            id: "Heard Island & Mcdonald Islands",
            text: "Heard Island & Mcdonald Islands",
        },
        {
            id: "Holy See (Vatican City State)",
            text: "Holy See (Vatican City State)",
        },
        { id: "Honduras", text: "Honduras" },
        { id: "Hong Kong", text: "Hong Kong" },
        { id: "Hungary", text: "Hungary" },
        { id: "Iceland", text: "Iceland" },
        { id: "India", text: "India" },
        { id: "Indonesia", text: "Indonesia" },
        { id: "Iran}, Islamic Republic Of", text: "Iran}, Islamic Republic Of" },
        { id: "Iraq", text: "Iraq" },
        { id: "Ireland", text: "Ireland" },
        { id: "Isle Of Man", text: "Isle Of Man" },
        { id: "Israel", text: "Israel" },
        { id: "Italy", text: "Italy" },
        { id: "Jamaica", text: "Jamaica" },
        { id: "Japan", text: "Japan" },
        { id: "Jersey", text: "Jersey" },
        { id: "Jordan", text: "Jordan" },
        { id: "Kazakhstan", text: "Kazakhstan" },
        { id: "Kenya", text: "Kenya" },
        { id: "Kiribati", text: "Kiribati" },
        { id: "Korea", text: "Korea" },
        { id: "Kuwait", text: "Kuwait" },
        { id: "Kyrgyzstan", text: "Kyrgyzstan" },
        {
            id: "Lao People's Democratic Republic",
            text: "Lao People's Democratic Republic",
        },
        { id: "Latvia", text: "Latvia" },
        { id: "Lebanon", text: "Lebanon" },
        { id: "Lesotho", text: "Lesotho" },
        { id: "Liberia", text: "Liberia" },
        { id: "Libyan Arab Jamahiriya", text: "Libyan Arab Jamahiriya" },
        { id: "Liechtenstein", text: "Liechtenstein" },
        { id: "Lithuania", text: "Lithuania" },
        { id: "Luxembourg", text: "Luxembourg" },
        { id: "Macao", text: "Macao" },
        { id: "Macedonia", text: "Macedonia" },
        { id: "Madagascar", text: "Madagascar" },
        { id: "Malawi", text: "Malawi" },
        { id: "Malaysia", text: "Malaysia" },
        { id: "Maldives", text: "Maldives" },
        { id: "Mali", text: "Mali" },
        { id: "Malta", text: "Malta" },
        { id: "Marshall Islands", text: "Marshall Islands" },
        { id: "Martinique", text: "Martinique" },
        { id: "Mauritania", text: "Mauritania" },
        { id: "Mauritius", text: "Mauritius" },
        { id: "Mayotte", text: "Mayotte" },
        { id: "Mexico", text: "Mexico" },
        {
            id: "Micronesia}, Federated States Of",
            text: "Micronesia}, Federated States Of",
        },
        { id: "Moldova", text: "Moldova" },
        { id: "Monaco", text: "Monaco" },
        { id: "Mongolia", text: "Mongolia" },
        { id: "Montenegro", text: "Montenegro" },
        { id: "Montserrat", text: "Montserrat" },
        { id: "Morocco", text: "Morocco" },
        { id: "Mozambique", text: "Mozambique" },
        { id: "Myanmar", text: "Myanmar" },
        { id: "Namibia", text: "Namibia" },
        { id: "Nauru", text: "Nauru" },
        { id: "Nepal", text: "Nepal" },
        { id: "Netherlands", text: "Netherlands" },
        { id: "Netherlands Antilles", text: "Netherlands Antilles" },
        { id: "New Caledonia", text: "New Caledonia" },
        { id: "New Zealand", text: "New Zealand" },
        { id: "Nicaragua", text: "Nicaragua" },
        { id: "Niger", text: "Niger" },
        { id: "Nigeria", text: "Nigeria" },
        { id: "Niue", text: "Niue" },
        { id: "Norfolk Island", text: "Norfolk Island" },
        { id: "Northern Mariana Islands", text: "Northern Mariana Islands" },
        { id: "Norway", text: "Norway" },
        { id: "Oman", text: "Oman" },
        { id: "Pakistan", text: "Pakistan" },
        { id: "Palau", text: "Palau" },
        {
            id: "Palestinian Territory}, Occupied",
            text: "Palestinian Territory}, Occupied",
        },
        { id: "Panama", text: "Panama" },
        { id: "Papua New Guinea", text: "Papua New Guinea" },
        { id: "Paraguay", text: "Paraguay" },
        { id: "Peru", text: "Peru" },
        { id: "Philippines", text: "Philippines" },
        { id: "Pitcairn", text: "Pitcairn" },
        { id: "Poland", text: "Poland" },
        { id: "Portugal", text: "Portugal" },
        { id: "Puerto Rico", text: "Puerto Rico" },
        { id: "Qatar", text: "Qatar" },
        { id: "Reunion", text: "Reunion" },
        { id: "Romania", text: "Romania" },
        { id: "Russian Federation", text: "Russian Federation" },
        { id: "Rwanda", text: "Rwanda" },
        { id: "aint Barthelemy", text: "Saint Barthelemy" },
        { id: "Saint Helena", text: "Saint Helena" },
        { id: "Saint Kitts And Nevis", text: "Saint Kitts And Nevis" },
        { id: "Saint Lucia", text: "Saint Lucia" },
        { id: "Saint Martin", text: "Saint Martin" },
        { id: "Saint Pierre And Miquelon", text: "Saint Pierre And Miquelon" },
        { id: "Saint Vincent And Grenadines", text: "Saint Vincent And Grenadines" },
        { id: "Samoa", text: "Samoa" },
        { id: "San Marino", text: "San Marino" },
        { id: "Sao Tome And Principe", text: "Sao Tome And Principe" },
        { id: "Saudi Arabia", text: "Saudi Arabia" },
        { id: "Senegal", text: "Senegal" },
        { id: "Serbia", text: "Serbia" },
        { id: "Seychelles", text: "Seychelles" },
        { id: "Sierra Leone", text: "Sierra Leone" },
        { id: "Singapore", text: "Singapore" },
        { id: "Slovakia", text: "Slovakia" },
        { id: "Slovenia", text: "Slovenia" },
        { id: "Solomon Islands", text: "Solomon Islands" },
        { id: "Somalia", text: "Somalia" },
        { id: "South Africa", text: "South Africa" },
        {
            id: "South Georgia And Sandwich Isl.",
            text: "South Georgia And Sandwich Isl.",
        },
        { id: "Spain", text: "Spain" },
        { id: "Sri Lanka", text: "Sri Lanka" },
        { id: "Sudan", text: "Sudan" },
        { id: "Suriname", text: "Suriname" },
        { id: "Svalbard And Jan Mayen", text: "Svalbard And Jan Mayen" },
        { id: "Swaziland", text: "Swaziland" },
        { id: "Sweden", text: "Sweden" },
        { id: "Switzerland", text: "Switzerland" },
        { id: "Syrian Arab Republic", text: "Syrian Arab Republic" },
        { id: "Taiwan", text: "Taiwan" },
        { id: "Tajikistan", text: "Tajikistan" },
        { id: "Tanzania", text: "Tanzania" },
        { id: "Thailand", text: "Thailand" },
        { id: "Timor-Leste", text: "Timor-Leste" },
        { id: "Togo", text: "Togo" },
        { id: "Tokelau", text: "Tokelau" },
        { id: "Tonga", text: "Tonga" },
        { id: "Trinidad And Tobago", text: "Trinidad And Tobago" },
        { id: "Tunisia", text: "Tunisia" },
        { id: "Turkey", text: "Turkey" },
        { id: "Turkmenistan", text: "Turkmenistan" },
        { id: "Turks And Caicos Islands", text: "Turks And Caicos Islands" },
        { id: "Tuvalu", text: "Tuvalu" },
        { id: "Uganda", text: "Uganda" },
        { id: "Ukraine", text: "Ukraine" },
        { id: "United Arab Emirates", text: "United Arab Emirates" },
        { id: "United Kingdom", text: "United Kingdom" },
        { id: "United States", text: "United States" },
        {
            id: "United States Outlying Islands",
            text: "United States Outlying Islands",
        },
        { id: "Uruguay", text: "Uruguay" },
        { id: "Uzbekistan", text: "Uzbekistan" },
        { id: "Vanuatu", text: "Vanuatu" },
        { id: "Venezuela", text: "Venezuela" },
        { id: "Viet Nam", text: "Viet Nam" },
        { id: "Virgin Islands}, British", text: "Virgin Islands}, British" },
        { id: "Virgin Islands}, U.S.", text: "Virgin Islands}, U.S." },
        { id: "Wallis And Futuna", text: "Wallis And Futuna" },
        { id: "Western Sahara", text: "Western Sahara" },
        { id: "Yemen", text: "Yemen" },
        { id: "Zambia", text: "Zambia" },
        { id: "Zimbabwe", text: "Zimbabwe" },
    ];
    const cityOptions = [
        { id: "Dhaka", text: "Dhaka" },
        { id: "Faridpur", text: "Faridpur" },
        { id: "Gazipur", text: "Gazipur" },
        { id: "Gopalganj", text: "Gopalganj" },
        { id: "Jamalpur", text: "Jamalpur" },
        { id: "Kishoreganj", text: "Kishoreganj" },
        { id: "Madaripur", text: "Madaripur" },
        { id: "Manikganj", text: "Manikganj" },
        { id: "Munshiganj", text: "Munshiganj" },
        { id: "Mymensingh", text: "Mymensingh" },
        { id: "Narayanganj", text: "Narayanganj" },
        { id: "Narsingdi", text: "Narsingdi" },
        { id: "Netrokona", text: "Netrokona" },
        { id: "Rajbari", text: "Rajbari" },
        { id: "Shariatpur", text: "Shariatpur" },
        { id: "Sherpur", text: "Sherpur" },
        { id: "Tangail", text: "Tangail" },
        { id: "Bogra", text: "Bogra" },
        { id: "Joypurhat", text: "Joypurhat" },
        { id: "Naogaon", text: "Naogaon" },
        { id: "Natore", text: "Natore" },
        { id: "Nawabganj", text: "Nawabganj" },
        { id: "Pabna", text: "Pabna" },
        { id: "Rajshahi", text: "Rajshahi" },
        { id: "Sirajgonj", text: "Sirajgonj" },
        { id: "Dinajpur", text: "Dinajpur" },
        { id: "Gaibandha", text: "Gaibandha" },
        { id: "Kurigram", text: "Kurigram" },
        { id: "Lalmonirhat", text: "Lalmonirhat" },
        { id: "Nilphamari", text: "Nilphamari" },
        { id: "Panchagarh", text: "Panchagarh" },
        { id: "Rangpur", text: "Rangpur" },
        { id: "Thakurgaon", text: "Thakurgaon" },
        { id: "Barguna", text: "Barguna" },
        { id: "Barisal", text: "Barisal" },
        { id: "Bhola", text: "Bhola" },
        { id: "Jhalokati", text: "Jhalokati" },
        { id: "Patuakhali", text: "Patuakhali" },
        { id: "Pirojpur", text: "Pirojpur" },
        { id: "Bandarban", text: "Bandarban" },
        { id: "Brahmanbaria", text: "Brahmanbaria" },
        { id: "Chandpur", text: "Chandpur" },
        { id: "Chittagong", text: "Chittagong" },
        { id: "Comilla", text: "Comilla" },
        { id: "Cox's Bazar", text: "Cox's Bazar" },
        { id: "Feni", text: "Feni" },
        { id: "Khagrachari", text: "Khagrachari" },
        { id: "Lakshmipur", text: "Lakshmipur" },
        { id: "Noakhali", text: "Noakhali" },
        { id: "Rangamati", text: "Rangamati" },
        { id: "Habiganj", text: "Habiganj" },
        { id: "Maulvibazar", text: "Maulvibazar" },
        { id: "Sunamganj", text: "Sunamganj" },
        { id: "Sylhet", text: "Sylhet" },
        { id: "Bagerhat", text: "Bagerhat" },
        { id: "Chuadanga", text: "Chuadanga" },
        { id: "Jessore", text: "Jessore" },
        { id: "Jhenaidah", text: "Jhenaidah" },
        { id: "Khulna", text: "Khulna" },
        { id: "Kushtia", text: "Kushtia" },
        { id: "Magura", text: "Magura" },
        { id: "Meherpur", text: "Meherpur" },
        { id: "Narail", text: "Narail" },
        { id: "Satkhira", text: "Satkhira" },
    ];

    $("").select2({
        minimumResultsForSearch: Infinity,
    });

    function getincondition(table, column, value) {
        $.ajax({
            url: './api/getallincondition.php',
            method: 'GET',
            data: {
                table: table,
                column: column,
                value: value
            },
            success: function (response) {
                // Call the callback function with the response
                callback(response);
            },
            error: function (error) {
                console.log(error);
                callback(null, error);
            }
        });
    }

    function loadadmintopdata() {
        $.ajax({
            url: './api/adminnamepic.php',
            type: 'GET',
            data: { table: 'admins' },
            dataType: "json",
            success: function (response) {
                // console.log(response);

                $("#top_image").attr("src", '../' + response[0].profile_image_url);
                $('#top_name').text(response[0].admin_name);

            },
            error: function (error) {
                // Handle errors
                console.log(error);
            }
        });
    }
    loadadmintopdata();
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



    var chartdata = {
        labels: ["Users", "Blog", "Hotels", "Airlines"
        ],
        datasets: [{
            label: "Total",
            backgroundColor: window.theme.primary,
            borderColor: window.theme.primary,
            hoverBackgroundColor: window.theme.primary,
            hoverBorderColor: window.theme.primary,
            data: [0, 0, 0, 0],
        },
        ]
    }
    function updateChartData(index, count) {
        chartdata.datasets[0].data[index] = count;
    }

    function userCount() {
        $.ajax({
            url: "../api/total_count.php",
            method: "GET",
            data: { table: "users" },
            dataType: "json",
            success: function (response) {
                $("#count_users").text(response.count);
                updateChartData(0, response.count);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function blogCount() {
        $.ajax({
            url: "../api/total_count.php",
            method: "GET",
            data: { table: "blog_posts" },
            dataType: "json",
            success: function (response) {
                $("#count_blog").text(response.count);
                updateChartData(1, response.count);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function hotelCount() {
        $.ajax({
            url: "../api/total_count.php",
            method: "GET",
            data: { table: "hotels" },
            dataType: "json",
            success: function (response) {
                $("#count_hotel").text(response.count);
                updateChartData(2, response.count);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function airlineCount() {
        $.ajax({
            url: "../api/total_count.php",
            method: "GET",
            data: { table: "airlines" },
            dataType: "json",
            success: function (response) {
                $("#count_air").text(response.count);
                updateChartData(3, response.count);
            },
            error: function () {
                // console.log("error");
            },
        });
    }

    function blockedUserCount() {
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
    function unpubBlog() {
        $.ajax({
            url: "../api/condition_count.php",
            method: "GET",
            data: {
                table: "blog_posts",
                column: "published",
                value: "0",
            },
            dataType: "json",
            success: function (response) {
                $("#count_blog_unpub").text(response.published);
            },
            error: function () {
                // console.log("error");
            },
        });
    }
    function barchart() {
        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: chartdata,
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    }



    if ($("#dashboard_master").length > 0) {
        userCount();
        blogCount();
        unpubBlog();
        hotelCount();
        airlineCount();
        blockedUserCount();
        setInterval(userCount, 5000);
        setInterval(unpubBlog, 5000);
        setInterval(hotelCount, 5000);
        setInterval(airlineCount, 5000);
        setInterval(blogCount, 5000);
        setInterval(blockedUserCount, 5000);
        setTimeout(function () {
            barchart();
        }, 200);

    }

    //master - users
    if ($("#users").length > 0) {

        function getallfromtable(table) {
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#userDataTable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                            { targets: [4], className: "is-verified-filter" }, // Add class for filtering on "Is Verified"
                        ],

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

                        order: [[1, "asc"]],
                        initComplete: function () {
                            var column = this.api().column(5); // Assuming "Status" is the 6th column (index 5)

                            // Create select element
                            var select = $('<select><option value="">All</option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            // Add list of options
                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },
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
                    var img_url = '../' + response.profile_image_url;
                    $("#profile_image").attr('src', img_url);
                    $("#full_name").text(response.first_name + ' ' + response.last_name);
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

    //master - airlines
    if ($("#airlines_master").length > 0) {

        function getallfromtable(table) {
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#airlinesDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_data" data-primary-id="' +
                                        row.airline_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.airline_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "airline_id", title: "ID" },
                            { data: "airline_name", title: "Name" },
                            { data: "email", title: "Email" },
                            { data: "phone", title: "Contact" },
                            { data: "address", title: "Address" },

                        ],

                        order: [[1, "desc"]],

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("airlines");

        $("#airlinesDatatable").on("click", ".view_data", function () {
            var primaryId = $(this).data("primary-id");
            empty()
            $("#modal_title").text('View and Update Airline');
            $("#add").attr("hidden", true);
            $("#update").attr("hidden", false);
            viewData(primaryId);
        });

        $("#airlinesDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('airlines', primaryId, 'airline_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#airlinesDatatable')) {
                                $('#airlinesDatatable').DataTable().destroy();
                            }
                            getallfromtable("airlines");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });

        //user information by id
        function viewData(primaryId) {
            $.ajax({
                url: '../api/getallincondition.php',
                method: 'GET',
                data: {
                    table: 'airlines',
                    column: 'airline_id',
                    value: primaryId
                },
                dataType: "json",
                success: function (response) {
                    $img2 = '';
                    if (response[0].image_url == '') {
                        $img = '../img/airline.jpg';
                    } else if (response[0].image_url !== '') {
                        $img = '../' + response[0].image_url;
                        $img2 = '' + response[0].image_url;
                    }

                    $("#id").val(response[0].airline_id);
                    $("#img").val($img2);
                    $("#email").val(response[0].email);
                    $("#name").val(response[0].airline_name);
                    $("#phone").val(response[0].phone);
                    $("#address").val(response[0].address);
                    $("#map").val(response[0].maps_link);
                    $("#map_link").attr('href', response[0].maps_link);
                    $("#airline_image").attr('src', $img);
                    $("#others").val(response[0].other_details);


                    $("#view_update_modal").modal("show");

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

        $("#update").on("click", function (e) {
            e.preventDefault();

            if ($("#name").val() !== '' && $("#email").val() !== '' && $("#address").val() !== '' && $("#others").val() !== '' && $("#map").val() !== '') {
                updatedata('update');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }
        });
        $("#add").on("click", function (e) {
            e.preventDefault();
            if ($("#file_profile_image").val('') !== '' && $("#name").val() !== '' && $("#email").val() !== '' && $("#address").val() !== '' && $("#others").val() !== '' && $("#map").val() !== '') {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {
            var formData = new FormData();

            // Append the non-file fields to the FormData
            formData.append('mode', mode);
            formData.append('id', $('#id').val());
            formData.append('img_addr', $('#img').val());
            formData.append('name', $('#name').val());
            formData.append('email', $('#email').val());
            formData.append('phone', $('#phone').val());
            formData.append('address', $('#address').val());
            formData.append('others', $('#others').val());
            formData.append('map', $('#map').val());

            // Check if a file is selected
            var fileInput = $('#file_airline_image')[0];
            if (fileInput.files.length > 0) {
                // Append the file to the FormData
                formData.append('image', fileInput.files[0]);
            }

            $.ajax({
                type: 'POST',
                url: './api/upsertairlines.php',
                data: formData,
                contentType: false,  // Important to set contentType to false when using FormData
                processData: false,  // Important to set processData to false when using FormData
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#airlinesDatatable')) {
                        $('#airlinesDatatable').DataTable().destroy();
                    }
                    getallfromtable("airlines");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });
        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new');
            $("#add").attr("hidden", false);
            $("#update").attr("hidden", true);
            $("#view_update_modal").modal("show");
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#img").val('');
            $("#id").val('');
            $("#name").val('');
            $("#email").val('');
            $("#phone").val('');
            $("#address").val('');
            $("#map").val('');
            $("#map_link").removeAttr('href');
            $("#airline_image").removeAttr('src');
            $("#others").val('');
            $("#file_airline_image").val('');
        }


    }
    //master - hotels
    if ($("#hotel_master").length > 0) {

        function getallfromtable(table) {
            $("#star").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#hotelsDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_data" data-primary-id="' +
                                        row.hotel_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.hotel_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "hotel_id", title: "ID" },
                            { data: "hotel_name", title: "Name" },
                            { data: "email", title: "Email" },
                            // { data: "phone", title: "Contact" },
                            { data: "address", title: "Address" },
                            { data: "location", title: "Location" },
                            { data: "star", title: "Star" },

                        ],

                        order: [[1, "desc"]],
                        initComplete: function () {
                            var table = this.api();

                            // Add filter for "Is Verified" column (assuming it's the 5th column - index 4)
                            var isVerifiedColumn = table.column(6);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });

                            // Add filter for "Status" column (assuming it's the 6th column - index 5)
                            var statusColumn = table.column(7);
                            var statusSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(statusColumn.footer()).empty())
                                .on('change', function () {
                                    statusColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            statusColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    statusSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("hotels");

        $("#hotelsDatatable").on("click", ".view_data", function () {
            var primaryId = $(this).data("primary-id");
            empty()
            $("#modal_title").text('View and Update Hotels');
            $("#add").attr("hidden", true);
            $("#update").attr("hidden", false);
            viewData(primaryId);
        });

        $("#hotelsDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('hotels', primaryId, 'hotel_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#hotelsDatatable')) {
                                $('#hotelsDatatable').DataTable().destroy();
                            }
                            getallfromtable("hotels");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });

        //user information by id
        function viewData(primaryId) {
            $.ajax({
                url: '../api/getallincondition.php',
                method: 'GET',
                data: {
                    table: 'hotels',
                    column: 'hotel_id',
                    value: primaryId
                },
                dataType: "json",
                success: function (response) {
                    $img2 = '';
                    if (response[0].image_url == '') {
                        $img = '../img/hotel.jpg';
                    } else if (response[0].image_url !== '') {
                        $img = '../' + response[0].image_url;
                        $img2 = '' + response[0].image_url;
                    }

                    $("#id").val(response[0].hotel_id);
                    $("#img").val($img2);
                    $("#name").val(response[0].hotel_name);
                    $("#email").val(response[0].email);
                    $("#phone").val(response[0].phone);
                    $("#address").val(response[0].address);
                    $("#location").val(response[0].location);
                    $("#facility").val(response[0].facilities);
                    $("#star").val(response[0].star).change();
                    $("#map").val(response[0].maps_link);
                    $("#map_link").attr('href', response[0].maps_link);
                    $("#view_image").attr('src', $img);
                    $("#others").val(response[0].other_details);


                    $("#view_update_modal").modal("show");

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

        $("#update").on("click", function (e) {
            e.preventDefault();

            if ($("#name").val() !== '' && $("#email").val() !== '' && $("#phone").val() !== '' && $("#address").val() !== '' && $("#location").val() !== '' && $("#facility").val() !== '' && $("#star").val() !== '' && $("#others").val() !== '' && $("#map").val() !== '') {
                updatedata('update');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }
        });
        $("#add").on("click", function (e) {
            e.preventDefault();
            if ($('#file_image')[0].files.length > 0 && $("#name").val() !== '' && $("#email").val() !== '' && $("#phone").val() !== '' && $("#address").val() !== '' && $("#location").val() !== '' && $("#facility").val() !== '' && $("#star").val() !== '' && $("#others").val() !== '' && $("#map").val() !== '') {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {
            var formData = new FormData();

            // Append the non-file fields to the FormData
            formData.append('mode', mode);
            formData.append('id', $('#id').val());
            formData.append('img_addr', $('#img').val());
            formData.append('name', $('#name').val());
            formData.append('email', $('#email').val());
            formData.append('phone', $('#phone').val());
            formData.append('address', $('#address').val());
            formData.append('location', $('#location').val());
            formData.append('facility', $('#facility').val());
            formData.append('star', $('#star').val());
            formData.append('others', $('#others').val());
            formData.append('map', $('#map').val());

            // Check if a file is selected
            var fileInput = $('#file_image')[0];
            if (fileInput.files.length > 0) {
                // Append the file to the FormData
                formData.append('image', fileInput.files[0]);
            }

            $.ajax({
                type: 'POST',
                url: './api/upserthotels.php',
                data: formData,
                contentType: false,  // Important to set contentType to false when using FormData
                processData: false,  // Important to set processData to false when using FormData
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#hotelsDatatable')) {
                        $('#hotelsDatatable').DataTable().destroy();
                    }
                    getallfromtable("hotels");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });
        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new');
            $("#add").attr("hidden", false);
            $("#update").attr("hidden", true);
            $("#view_update_modal").modal("show");
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#img").val('');
            $("#id").val('');
            $("#name").val('');
            $("#email").val('');
            $("#phone").val('');
            $("#address").val('');
            $("#location").val('');
            $("#facility").val('');
            $("#star").val('').change();
            $("#map").val('');
            $("#map_link").removeAttr('href');
            $("#view_image").removeAttr('src');
            $("#others").val('');
            $("#file_image").val('');
        }


    }
    //master - admins
    if ($("#admins_master").length > 0) {

        function getallfromtable(table) {
            $("#location").select2({
                data: cityOptions,
            });
            $("#type").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#adminsDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                            { targets: [4], className: "is-verified-filter" }, // Add class for filtering on "Is Verified"
                        ],

                        data: response.data,
                        columns: [

                            { data: "admin_id", title: "ID" },
                            { data: "admin_name", title: "Name" },
                            { data: "admin_email", title: "Email" },
                            { data: "phone", title: "Phone" },
                            { data: "admin_type", title: "Admin type" },
                            {
                                data: "status",
                                title: "Status",
                                render: function (data, type, row) {
                                    var status = "";
                                    if (data == "blocked") {
                                        statusforblockunblock = 'blocked';
                                        status =
                                            '<span class="badge bg-warning">Blocked</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="' + row.status + '" data-user-id="' + row.admin_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    } else if (data == "active") {
                                        statusforblockunblock = 'active';
                                        status =
                                            '<span class="badge bg-success">Active</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="' + row.status + '" data-user-id="' +
                                            row.admin_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    }

                                    return status;
                                },
                            },
                            { data: "admin_air_id", title: "Airline ID" },
                            { data: "admin_hotel_id", title: "Hotel ID" },

                        ],

                        order: [[4, "desc"]],
                        initComplete: function () {
                            var table = this.api();

                            var isVerifiedColumn = table.column(4);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });

                            var statusColumn = table.column(5);
                            var statusSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(statusColumn.footer()).empty())
                                .on('change', function () {
                                    statusColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            statusColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    statusSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("admins");
        $("#adminsDatatable").on("click", ".change_stats", function () {
            var userId = $(this).data("user-id").toString();
            var statusforblockunblock = $(this).data("user-status");
            var valueToUpdate = '';
            if (statusforblockunblock == 'blocked') {
                valueToUpdate = 'active';
            } else if (statusforblockunblock == 'active') {
                valueToUpdate = 'blocked';
            }
            updateonecolumn('admins', userId, 'admin_id', 'status', valueToUpdate)
                .then(function (result) {
                    if ($.fn.DataTable.isDataTable('#adminsDatatable')) {
                        $('#adminsDatatable').DataTable().destroy();
                    }
                    getallfromtable("admins");
                })
                .catch(function (error) {
                    // console.error(error);
                });
        });

        $("#add").on("click", function (e) {
            e.preventDefault();
            if ($("#name").val() !== '' && $("#email").val() !== '' && $("#phone").val() !== '' && $("#admin_type").val() !== '' && $("#status").val() !== '' && $("#c_id").val() !== '') {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {

            // Collect form data
            var formData = {
                mode: mode,
                password: $('#password').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                admin_type: $('#admin_type').val(),
                status: $('#status').val(),
                c_id: $('#c_id').val(),
            };

            // Make AJAX request to update.php (replace with your server-side script)
            $.ajax({
                type: 'POST',
                url: './api/insertadmin.php',
                data: formData,
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#adminsDatatable')) {
                        $('#adminsDatatable').DataTable().destroy();
                    }
                    getallfromtable("admins");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });

        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new');
            $("#add").attr("hidden", false);
            $("#view_update_modal").modal("show");
            $('#admin_type').change(function () {
                var selectedAdminType = $(this).val();
                if (selectedAdminType === 'master') {
                    $('#c_id').prop('disabled', true).val('0');
                } else {
                    $('#c_id').prop('disabled', false).val('');
                }
            });
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#email").val('');
            $("#admin_type").val('').change();
            $("#name").val('');
            $("#phone").val('');
            $("#c_id").val('');
            $("#status").val('').change();
        }


    }
    //master - blog
    if ($("#blogs_master").length > 0) {

        function getallfromtable(table) {
            $("#star").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#blogsDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center "><a href="../blog/post.php?id=' + row.post_id + '" target="_blank" class="text-info mr-2"><i class="fa fa-expand" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.post_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "post_id", title: "ID" },
                            {
                                data: "title",
                                title: "Title",
                                render: function (data, type, row) {
                                    // Break line after every 45 characters
                                    return data.replace(/(.{70})/g, "$1<br>");
                                },
                            },

                            {
                                data: null,
                                title: "Creator",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center "><a href="javascript:void(0)" class="text-success view_user" data-user-id="' + row.user_id +
                                        '">' + row.user_id + '</a></div>';
                                    return actions;
                                },
                            },
                            {
                                data: "created_at",
                                title: "Date-Time",
                                render: function (data, type, row) {
                                    const dateObj = new Date(data);
                                    const formattedDate = dateObj.toLocaleString('en-US', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: false,
                                    });
                                    return formattedDate.replace(',', '');
                                },
                            },
                            {
                                data: "published",
                                title: "Status",
                                render: function (data, type, row) {
                                    var status = "";
                                    if (data == "0") {
                                        statusforblockunblock = '0';
                                        status =
                                            '<span class="badge bg-warning">Unpublished</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="0" data-user-id="' + row.post_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    } else if (data == "2") {
                                        status = '<span class="badge bg-danger">Deleted</span>';
                                    } else if (data == "1") {
                                        statusforblockunblock = '1';
                                        status =
                                            '<span class="badge bg-success">Published</span><a href="javascript:void(0)" class="text-danger change_stats ml-3" data-user-status="1" data-user-id="' +
                                            row.post_id +
                                            '"><i class="fa fa-refresh" aria-hidden="true"></i></a>';
                                    }

                                    return status;
                                },
                            }

                        ],

                        order: [[1, "desc"]],

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("blog_posts");

        $("#blogsDatatable").on("click", ".change_stats", function () {
            var userId = $(this).data("user-id").toString();
            var statusforblockunblock = $(this).data("user-status");
            var valueToUpdate = '';
            if (statusforblockunblock == '0') {
                valueToUpdate = '1';
            } else if (statusforblockunblock == '1') {
                valueToUpdate = '0';
            }
            updateonecolumn('blog_posts', userId, 'post_id', 'published', valueToUpdate)
                .then(function (result) {
                    if ($.fn.DataTable.isDataTable('#blogsDatatable')) {
                        $('#blogsDatatable').DataTable().destroy();
                    }
                    getallfromtable("blog_posts");
                })
                .catch(function (error) {
                    // console.error(error);
                });
        });

        $("#blogsDatatable").on("click", ".view_user", function () {
            var userId = $(this).data("user-id");
            // console.log(userId);
            viewUser(userId);
        });

        $("#blogsDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('blog_posts', primaryId, 'post_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#blogsDatatable')) {
                                $('#blogsDatatable').DataTable().destroy();
                            }
                            getallfromtable("blog_posts");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });
        function viewUser(userId) {
            $.ajax({
                url: "../api/getuserbyid.php",
                type: "GET",
                data: { user_id: userId },
                dataType: "json",
                success: function (response) {
                    // Update the modal fields with the retrieved data
                    // console.log(response);
                    var img_url = '../' + response.profile_image_url;
                    $("#profile_image").attr('src', img_url);
                    $("#full_name").text(response.first_name + ' ' + response.last_name);
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
    //master - transactions
    if ($("#transaction_master").length > 0) {

        function getallfromtable(table) {
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#transactionDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            { data: "id", title: "ID" },
                            { data: "status", title: "Valid" },
                            {
                                data: "tran_date", title: "Tran_Date",
                                render: function (data, type, row) {
                                    const dateObj = new Date(data);
                                    const formattedDate = dateObj.toLocaleString('en-US', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: false,
                                    });
                                    return formattedDate.replace(',', '');
                                },
                            },
                            { data: "tran_id", title: "Tran_ID" },
                            { data: "amount", title: "Amount" },
                            { data: "card_type", title: "Pay Method" },
                            { data: "card_no", title: "Card No" },

                        ],

                        order: [[2, "desc"]],
                        initComplete: function () {
                            var table = this.api();

                            // Add filter for "Is Verified" column (assuming it's the 5th column - index 4)
                            var isVerifiedColumn = table.column(1);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });

                            // Add filter for "Status" column (assuming it's the 6th column - index 5)
                            var statusColumn = table.column(5);
                            var statusSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(statusColumn.footer()).empty())
                                .on('change', function () {
                                    statusColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            statusColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    statusSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("payments");



    }
    //master - emergency contacts
    if ($("#e_contacts_master").length > 0) {

        function getallfromtable(table) {
            $("#location").select2({
                data: cityOptions,
            });
            $("#type").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#e_contactsDataTable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                            { targets: [4], className: "is-verified-filter" }, // Add class for filtering on "Is Verified"
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_data" data-primary-id="' +
                                        row.contact_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.contact_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "contact_id", title: "ID" },
                            { data: "contact_type", title: "Type" },
                            { data: "name", title: "Name" },
                            { data: "phone_number", title: "Contact" },
                            { data: "address", title: "Address" },
                            { data: "location", title: "Location" },

                        ],

                        order: [[1, "asc"]],
                        initComplete: function () {
                            var table = this.api();

                            // Add filter for "Is Verified" column (assuming it's the 5th column - index 4)
                            var isVerifiedColumn = table.column(2);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });

                            // Add filter for "Status" column (assuming it's the 6th column - index 5)
                            var statusColumn = table.column(6);
                            var statusSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(statusColumn.footer()).empty())
                                .on('change', function () {
                                    statusColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            statusColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    statusSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("emergency_contacts");

        $("#e_contactsDataTable").on("click", ".view_data", function () {
            var primaryId = $(this).data("primary-id");
            empty()
            $("#modal_title").text('View and Update Contacts');
            $("#add").attr("hidden", true);
            $("#update").attr("hidden", false);
            viewData(primaryId);
        });

        $("#e_contactsDataTable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('emergency_contacts', primaryId, 'contact_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#e_contactsDataTable')) {
                                $('#e_contactsDataTable').DataTable().destroy();
                            }
                            getallfromtable("emergency_contacts");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });

        //user information by id
        function viewData(primaryId) {
            $.ajax({
                url: '../api/getallincondition.php',
                method: 'GET',
                data: {
                    table: 'emergency_contacts',
                    column: 'contact_id',
                    value: primaryId
                },
                dataType: "json",
                success: function (response) {

                    $("#id").val(response[0].contact_id);
                    $("#type").val(response[0].contact_type).change();
                    $("#name").val(response[0].name);
                    $("#phone").val(response[0].phone_number);
                    $("#address").val(response[0].address);
                    $("#map").val(response[0].map_link);
                    $("#map_link").attr('href', response[0].map_link);
                    $("#location").val(response[0].location).change();


                    $("#view_update_modal").modal("show");

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

        $("#update").on("click", function (e) {
            e.preventDefault();
            if ($("#type").val() !== '' && $("#name").val() !== '' && $("#phone").val() !== '' && $("#address").val() !== '' && $("#map").val() !== '' && $("#location").val() !== '') {
                updatedata('update');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }
        });
        $("#add").on("click", function (e) {
            e.preventDefault();
            if ($("#type").val() !== '' && $("#name").val() !== '' && $("#phone").val() !== '' && $("#address").val() !== '' && $("#map").val() !== '' && $("#location").val() !== '') {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {

            // Collect form data
            var formData = {
                mode: mode,
                id: $('#id').val(),
                type: $('#type').val(),
                name: $('#name').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
                location: $('#location').val(),
                map: $('#map').val(),
            };

            // Make AJAX request to update.php (replace with your server-side script)
            $.ajax({
                type: 'POST',
                url: './api/upsertecontacts.php',
                data: formData,
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#e_contactsDataTable')) {
                        $('#e_contactsDataTable').DataTable().destroy();
                    }
                    getallfromtable("emergency_contacts");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });

        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new Contact');
            $("#add").attr("hidden", false);
            $("#update").attr("hidden", true);
            $("#view_update_modal").modal("show");
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#id").val('');
            $("#type").val('').change();
            $("#name").val('');
            $("#phone").val('');
            $("#address").val('');
            $("#map").val('');
            $("#map_link").removeAttr('href');
            $("#location").val('').change();
        }


    }
    //airline - flights
    if ($("#flights_airline").length > 0) {

        function getallfromtable(table) {

            $("#cancelation").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "./api/getallflights.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#flightsDataTable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                            { targets: [4], className: "is-verified-filter" },
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_data" data-primary-id="' +
                                        row.flight_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.flight_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "flight_id", title: "ID" },
                            { data: "flight_number", title: "F_number" },
                            { data: "departure_city", title: "Departure city" },
                            { data: "arrival_city", title: "Arrival city" },
                            { data: "flight_date", title: "F_Date" },
                            { data: "departure_time", title: "Departure time" },
                            { data: "arrival_time", title: "Arrival time" },

                        ],

                        order: [[1, "asc"]],
                        initComplete: function () {
                            var table = this.api();

                            var isVerifiedColumn = table.column(3);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });

                            var statusColumn = table.column(4);
                            var statusSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(statusColumn.footer()).empty())
                                .on('change', function () {
                                    statusColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            statusColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    statusSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("flights");

        $("#flightsDataTable").on("click", ".view_data", function () {
            var primaryId = $(this).data("primary-id");
            empty()
            $("#modal_title").text('View and Update Flights');
            $("#add").attr("hidden", true);
            $("#update").attr("hidden", false);
            viewData(primaryId);
        });

        $("#flightsDataTable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('flights', primaryId, 'flight_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#flightsDataTable')) {
                                $('#flightsDataTable').DataTable().destroy();
                            }
                            getallfromtable("flights");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });

        //user information by id
        function viewData(primaryId) {
            $.ajax({
                url: '../api/getallincondition.php',
                method: 'GET',
                data: {
                    table: 'flights',
                    column: 'flight_id',
                    value: primaryId
                },
                dataType: "json",
                success: function (response) {

                    $("#id").val(response[0].flight_id);
                    $("#fnumber").val(response[0].flight_number);
                    $("#air_model").val(response[0].airplane_model);
                    $("#departure_city").val(response[0].departure_city);
                    $("#arrival_city").val(response[0].arrival_city);
                    $("#fare").val(response[0].price);
                    $("#discount").val(response[0].discount);
                    $("#flight_date").val(response[0].flight_date);
                    $("#departure_time").val(response[0].departure_time);
                    $("#arrival_time").val(response[0].arrival_time);
                    $("#bag_cabin").val(response[0].bag_cabin);
                    $("#bag_check_in").val(response[0].bag_check_in);
                    $("#cancelation").val(response[0].cancelation).change();



                    $("#view_update_modal").modal("show");

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

        $("#update").on("click", function (e) {
            e.preventDefault();
            if (
                $("#air_model").val() !== '' &&
                $("#departure_city").val() !== '' &&
                $("#arrival_city").val() !== '' &&
                $("#fare").val() !== '' &&
                $("#discount").val() !== '' &&
                $("#flight_date").val() !== '' &&
                $("#departure_time").val() !== '' &&
                $("#arrival_time").val() !== '' &&
                $("#bag_cabin").val() !== '' &&
                $("#bag_check_in").val() !== '' &&
                $("#cancelation").val() !== ''
            ) {
                updatedata('update');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }
        });
        $("#add").on("click", function (e) {
            e.preventDefault();
            if (
                $("#air_model").val() !== '' &&
                $("#departure_city").val() !== '' &&
                $("#arrival_city").val() !== '' &&
                $("#fare").val() !== '' &&
                $("#discount").val() !== '' &&
                $("#flight_date").val() !== '' &&
                $("#departure_time").val() !== '' &&
                $("#arrival_time").val() !== '' &&
                $("#bag_cabin").val() !== '' &&
                $("#bag_check_in").val() !== '' &&
                $("#cancelation").val() !== ''
            ) {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {

            // Collect form data
            var formData = {
                mode: mode,
                id: $('#id').val(),
                air_model: $('#air_model').val(),
                departure_city: $('#departure_city').val(),
                arrival_city: $('#arrival_city').val(),
                fare: $('#fare').val(),
                discount: $('#discount').val(),
                flight_date: $('#flight_date').val(),
                departure_time: $('#departure_time').val(),
                arrival_time: $('#arrival_time').val(),
                bag_cabin: $('#bag_cabin').val(),
                bag_check_in: $('#bag_check_in').val(),
                cancelation: $('#cancelation').val(),
            };

            // Then you can use formData in your AJAX request


            // Make AJAX request to update.php (replace with your server-side script)
            $.ajax({
                type: 'POST',
                url: './api/upsertflights.php',
                data: formData,
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#flightsDataTable')) {
                        $('#flightsDataTable').DataTable().destroy();
                    }
                    getallfromtable("flights");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });

        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new Flight');
            $("#add").attr("hidden", false);
            $("#update").attr("hidden", true);
            $("#view_update_modal").modal("show");
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#id").val('');
            $("#fnumber").val('');
            $("#air_model").val('');
            $("#departure_city").val('');
            $("#arrival_city").val('');
            $("#fare").val('');
            $("#discount").val('');
            $("#flight_date").val('');
            $("#departure_time").val('');
            $("#arrival_time").val('');
            $("#bag_cabin").val('');
            $("#bag_check_in").val('');
            $("#cancelation").val('').change();
        }


    }

    //airline - booking
    if ($("#booking_airline").length > 0) {

        function getallfromtable(table) {
            $("#star").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#flight_bookingDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            // {
                            //     data: null,
                            //     title: "Actions",
                            //     width: "3%",
                            //     render: function (data, type, row) {
                            //         var actions =
                            //             '<div class="d-flex justify-content-center "><a href="../blog/post.php?id=' + row.id + '" target="_blank" class="text-info mr-2"><i class="fa fa-expand" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                            //             row.id +
                            //             '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                            //         return actions;
                            //     },
                            // },
                            { data: "booking_id", title: "Booking ID" },
                            { data: "flight_id", title: "Flight ID" },
                            {
                                data: null,
                                title: "User",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center "><a href="javascript:void(0)" class="text-success view_user" data-user-id="' + row.user_id +
                                        '">' + row.user_id + '</a></div>';
                                    return actions;
                                },
                            },
                            {
                                data: "booking_date",
                                title: "Booking Time",
                                render: function (data, type, row) {
                                    // Assuming data is in the format 'YYYY-MM-DD HH:mm:ss'
                                    const dateObj = new Date(data);
                                    const formattedDate = dateObj.toLocaleString('en-US', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: false,
                                    });
                                    return formattedDate.replace(',', '');
                                },
                            },
                            {
                                data: "payment_status",
                                title: "Status",
                                render: function (data, type, row) {
                                    return data === 'paid'
                                        ? '<span class="badge bg-success text-white">Paid</span>'
                                        : '<span class="badge bg-danger text-white">Unpaid</span>';
                                },
                            },
                            { data: "transaction_id", title: "Transaction ID" },
                            { data: "total_price", title: "Fare" },
                            { data: "seat_number", title: "Seat No" },



                        ],

                        order: [[1, "desc"]],
                        initComplete: function () {
                            var table = this.api();

                            // Add filter for "Is Verified" column (assuming it's the 5th column - index 4)
                            var isVerifiedColumn = table.column(1);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("flight_bookings");

        // $("#flight_bookingDatatable").on("click", ".change_stats", function () {
        //     var userId = $(this).data("user-id").toString();
        //     var statusforblockunblock = $(this).data("user-status");
        //     var valueToUpdate = '';
        //     if (statusforblockunblock == '0') {
        //         valueToUpdate = '1';
        //     } else if (statusforblockunblock == '1') {
        //         valueToUpdate = '0';
        //     }
        //     updateonecolumn('blog_posts', userId, 'post_id', 'published', valueToUpdate)
        //         .then(function (result) {
        //             if ($.fn.DataTable.isDataTable('#flight_bookingDatatable')) {
        //                 $('#flight_bookingDatatable').DataTable().destroy();
        //             }
        //             getallfromtable("blog_posts");
        //         })
        //         .catch(function (error) {
        //             // console.error(error);
        //         });
        // });

        $("#flight_bookingDatatable").on("click", ".view_user", function () {
            var userId = $(this).data("user-id");
            // console.log(userId);
            viewUser(userId);
        });

        $("#flight_bookingDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('flight_bookings', primaryId, 'id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#flight_bookingDatatable')) {
                                $('#flight_bookingDatatable').DataTable().destroy();
                            }
                            getallfromtable("flight_bookings");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });
        //close update  modal
        function viewUser(userId) {
            $.ajax({
                url: "../api/getuserbyid.php",
                type: "GET",
                data: { user_id: userId },
                dataType: "json",
                success: function (response) {
                    // Update the modal fields with the retrieved data
                    // console.log(response);
                    var img_url = '../' + response.profile_image_url;
                    $("#profile_image").attr('src', img_url);
                    $("#full_name").text(response.first_name + ' ' + response.last_name);
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
    //hotel - rooms
    if ($("#rooms_hotel").length > 0) {

        function getallfromtable(table) {
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#roomsDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            {
                                data: null,
                                title: "Actions",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="text-info mr-2 view_data" data-primary-id="' +
                                        row.room_id +
                                        '"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                                        row.room_id +
                                        '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                                    return actions;
                                },
                            },
                            { data: "room_id", title: "ID" },
                            { data: "room_type", title: "Room type" },
                            { data: "bed_type", title: "Bed type" },
                            { data: "price_per_night", title: "Fare" },
                            { data: "capacity", title: "Capacity" },

                        ],

                        order: [[1, "desc"]],

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("rooms");

        $("#roomsDatatable").on("click", ".view_data", function () {
            var primaryId = $(this).data("primary-id");
            empty()
            $("#modal_title").text('View and Update Room');
            $("#add").attr("hidden", true);
            $("#update").attr("hidden", false);
            viewData(primaryId);
        });

        $("#roomsDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('rooms', primaryId, 'room_id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#roomsDatatable')) {
                                $('#roomsDatatable').DataTable().destroy();
                            }
                            getallfromtable("rooms");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });

        //user information by id
        function viewData(primaryId) {
            $.ajax({
                url: '../api/getallincondition.php',
                method: 'GET',
                data: {
                    table: 'rooms',
                    column: 'room_id',
                    value: primaryId
                },
                dataType: "json",
                success: function (response) {
                    $img2 = '';
                    if (response[0].image_url == '') {
                        $img = '../img/airline.jpg';
                    } else if (response[0].image_url !== '') {
                        $img = '../' + response[0].image_url;
                        $img2 = '' + response[0].image_url;
                    }

                    $("#id").val(response[0].room_id);
                    $("#img").val($img2);
                    $("#room_type").val(response[0].room_type);
                    $("#bed_type").val(response[0].bed_type);
                    $("#fare").val(response[0].price_per_night);
                    $("#discount").val(response[0].discount);
                    $("#smoking").val(response[0].smoking);
                    $("#breakfast").val(response[0].breakfast);
                    $("#facility").val(response[0].facility);

                    $("#capacity").val(response[0].capacity);
                    $("#others").val(response[0].others);
                    $("#total_rooms").val(response[0].total_rooms);
                    $("#available_rooms").val(response[0].available_rooms);

                    $("#map_link").attr('href', response[0].maps_link);
                    $("#airline_image").attr('src', $img);
                    $("#others").val(response[0].other_details);


                    $("#view_update_modal").modal("show");

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

        $("#update").on("click", function (e) {
            e.preventDefault();

            if ($("#others").val() !== '' && $("#map").val() !== '' && $("#room_type").val() !== '' && $("#bed_type").val() !== '' && $("#fare").val() !== '' && $("#discount").val() !== '' && $("#smoking").val() !== '' && $("#facility").val() !== '' && $("#breakfast").val() !== '' && $("#capacity").val() !== '' && $("#total_rooms").val() !== '' && $("#available_rooms").val() !== '') {
                updatedata('update');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }
        });
        $("#add").on("click", function (e) {
            e.preventDefault();
            if ($("#file_profile_image").val('') !== '' && $("#others").val() !== '' && $("#map").val() !== '' && $("#room_type").val() !== '' && $("#bed_type").val() !== '' && $("#fare").val() !== '' && $("#discount").val() !== '' && $("#smoking").val() !== '' && $("#breakfast").val() !== '' && $("#facility").val() !== '' && $("#capacity").val() !== '' && $("#total_rooms").val() !== '' && $("#available_rooms").val() !== '') {
                updatedata('add');
            } else {
                Swal.fire({
                    title: "Empty!",
                    text: "All fields are required",
                    icon: "error",
                });
            }

        });

        function updatedata(mode) {
            var formData = new FormData();

            // Append the non-file fields to the FormData
            formData.append('mode', mode);
            formData.append('id', $('#id').val());
            formData.append('img_addr', $('#img').val());
            formData.append('room_type', $('#room_type').val());
            formData.append('bed_type', $('#bed_type').val());
            formData.append('fare', $('#fare').val());
            formData.append('discount', $('#discount').val());
            formData.append('facility', $('#facility').val());
            formData.append('smoking', $('#smoking').val());
            formData.append('breakfast', $('#breakfast').val());
            formData.append('capacity', $('#capacity').val());
            formData.append('others', $('#others').val());
            formData.append('total_rooms', $('#total_rooms').val());
            formData.append('available_rooms', $('#available_rooms').val());


            // Check if a file is selected
            var fileInput = $('#file_airline_image')[0];
            if (fileInput.files.length > 0) {
                // Append the file to the FormData
                formData.append('image', fileInput.files[0]);
            }

            $.ajax({
                type: 'POST',
                url: './api/upsertrooms.php',
                data: formData,
                contentType: false,  // Important to set contentType to false when using FormData
                processData: false,  // Important to set processData to false when using FormData
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#roomsDatatable')) {
                        $('#roomsDatatable').DataTable().destroy();
                    }
                    getallfromtable("rooms");
                    $("#view_update_modal").modal("hide");
                },
                error: function (error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something is wrong!",
                        icon: "error",
                    });
                }
            });
        }

        //close update  modal
        $("#add_new").on("click", function () {
            empty()
            $("#modal_title").text('Add new');
            $("#add").attr("hidden", false);
            $("#update").attr("hidden", true);
            $("#view_update_modal").modal("show");
        });
        //close update  modal
        $("#modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });
        $("#x_modal_close").on("click", function () {
            empty()
            $("#view_update_modal").modal("hide");
        });

        function empty() {
            $("#img").val('');
            $("#id").val('');
            $("#room_type").val('');
            $("#bed_type").val('');
            $("#fare").val('');
            $("#discount").val('');
            $("#smoking").val('');
            $("#facility").val('');
            $("#breakfast").val('');
            $("#capacity").val('');
            $("#total_rooms").val('');
            $("#available_rooms").val('');
            $("#airline_image").removeAttr('src');
            $("#others").val('');
            $("#file_airline_image").val('');
        }


    }

    //hotel - booking
    if ($("#booking_hotel").length > 0) {

        function getallfromtable(table) {
            $("#star").select2({
                minimumResultsForSearch: Infinity,
            });
            $.ajax({
                url: "../api/getall.php",
                method: "GET",
                data: { table: table },
                dataType: "json",
                success: function (response) {
                    $("#hotel_bookingDatatable").DataTable({
                        fixedHeader: true,
                        info: false,
                        lengthChange: true,
                        searching: true,
                        columnDefs: [
                            { targets: "_all", className: "border-right" },
                            { targets: [0], className: "border-left", orderable: false, width: "5%" },
                            { targets: [1], className: "text-justify", },
                        ],

                        data: response.data,
                        columns: [
                            // {
                            //     data: null,
                            //     title: "Actions",
                            //     width: "3%",
                            //     render: function (data, type, row) {
                            //         var actions =
                            //             '<div class="d-flex justify-content-center "><a href="../blog/post.php?id=' + row.id + '" target="_blank" class="text-info mr-2"><i class="fa fa-expand" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_data" data-primary-id="' +
                            //             row.id +
                            //             '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                            //         return actions;
                            //     },
                            // },
                            { data: "booking_id", title: "Booking ID" },
                            { data: "room_id", title: "Room ID" },
                            {
                                data: null,
                                title: "User",
                                width: "3%",
                                render: function (data, type, row) {
                                    var actions =
                                        '<div class="d-flex justify-content-center "><a href="javascript:void(0)" class="text-success view_user" data-user-id="' + row.user_id +
                                        '">' + row.user_id + '</a></div>';
                                    return actions;
                                },
                            },
                            {
                                data: "booking_date",
                                title: "Booking Time",
                                render: function (data, type, row) {
                                    // Assuming data is in the format 'YYYY-MM-DD HH:mm:ss'
                                    const dateObj = new Date(data);
                                    const formattedDate = dateObj.toLocaleString('en-US', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: false,
                                    });
                                    return formattedDate.replace(',', '');
                                },
                            },
                            {
                                data: "payment_status",
                                title: "Status",
                                render: function (data, type, row) {
                                    return data === 'paid'
                                        ? '<span class="badge bg-success text-white">Paid</span>'
                                        : '<span class="badge bg-danger text-white">Unpaid</span>';
                                },
                            },
                            { data: "transaction_id", title: "Transaction ID" },
                            { data: "total_price", title: "Fare" },
                            { data: "check_in_date", title: "Check-IN" },
                            { data: "check_out_date", title: "Check-Out" },



                        ],

                        order: [[1, "desc"]],
                        initComplete: function () {
                            var table = this.api();
                            var isVerifiedColumn = table.column(1);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                            var isVerifiedColumn = table.column(7);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                            var isVerifiedColumn = table.column(8);
                            var isVerifiedSelect = $('<select><option value="">All</option></select>')
                                .appendTo($(isVerifiedColumn.footer()).empty())
                                .on('change', function () {
                                    isVerifiedColumn
                                        .search($(this).val(), { exact: true })
                                        .draw();
                                });

                            isVerifiedColumn
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    isVerifiedSelect.append('<option value="' + d + '">' + d + '</option>');
                                });
                        },

                    });
                },
                error: function () {
                    console.error("Error fetching user data");
                },
            });
        }
        //for user table
        getallfromtable("hotel_bookings");

        // $("#flight_bookingDatatable").on("click", ".change_stats", function () {
        //     var userId = $(this).data("user-id").toString();
        //     var statusforblockunblock = $(this).data("user-status");
        //     var valueToUpdate = '';
        //     if (statusforblockunblock == '0') {
        //         valueToUpdate = '1';
        //     } else if (statusforblockunblock == '1') {
        //         valueToUpdate = '0';
        //     }
        //     updateonecolumn('blog_posts', userId, 'post_id', 'published', valueToUpdate)
        //         .then(function (result) {
        //             if ($.fn.DataTable.isDataTable('#flight_bookingDatatable')) {
        //                 $('#flight_bookingDatatable').DataTable().destroy();
        //             }
        //             getallfromtable("blog_posts");
        //         })
        //         .catch(function (error) {
        //             // console.error(error);
        //         });
        // });

        $("#hotel_bookingDatatable").on("click", ".view_user", function () {
            var userId = $(this).data("user-id");
            // console.log(userId);
            viewUser(userId);
        });

        $("#hotel_bookingDatatable").on("click", ".delete_data", function () {
            var primaryId = $(this).data("primary-id").toString();
            // console.log(primaryId);
            Swal.fire({
                title: "Do you want to delete?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Go Back`
            }).then((result) => {
                if (result.isConfirmed) {
                    //calling ajax to delete
                    deleteonerecord('hotel_bookings', primaryId, 'id')
                        .then(function (result) {
                            if ($.fn.DataTable.isDataTable('#hotel_bookingDatatable')) {
                                $('#hotel_bookingDatatable').DataTable().destroy();
                            }
                            getallfromtable("hotel_bookings");
                            Swal.fire("Deleted!", "", "success");
                        })
                        .catch(function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete!",
                                icon: "error",
                            });
                        });


                }
            });
        });
        //close update  modal
        function viewUser(userId) {
            $.ajax({
                url: "../api/getuserbyid.php",
                type: "GET",
                data: { user_id: userId },
                dataType: "json",
                success: function (response) {
                    // Update the modal fields with the retrieved data
                    // console.log(response);
                    var img_url = '../' + response.profile_image_url;
                    $("#profile_image").attr('src', img_url);
                    $("#full_name").text(response.first_name + ' ' + response.last_name);
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

    if ($("#profile").length > 0) {

        function loadadmindata() {
            $.ajax({
                url: './api/admindetails.php',
                type: 'GET',
                data: { table: 'admins' },
                success: function (response) {
                    console.log(response);
                    $('#admin_details').empty();
                    $('#admin_details').html(response);

                    $('#cover').on('click', function () {
                        // Reveal the Admin ID
                        $('#cover').css('transform', 'translateX(100%)');

                        // Hide the Admin ID after 3 seconds
                        setTimeout(function () {
                            $('#cover').css('transform', 'translateX(0%)');
                        }, 3000);
                    });
                    $(".add_profile_img").on("click", function () {
                        $("#profile_image_modal").modal("show");
                    });

                    $("#modal_close").on("click", function () {
                        $("#profile_image_modal").modal("hide");
                    });
                    $("#x_modal_close").on("click", function () {
                        $("#profile_image_modal").modal("hide");
                    });
                },
                error: function (error) {
                    // Handle errors
                    console.log(error);
                }
            });
        }
        loadadmindata();


        $("#modal_submit").on("click", function () {
            var formData = new FormData($("#profile_pic_upload")[0]);

            // Make AJAX post request
            $.ajax({
                type: "POST",
                url: "./api/uploadprofileimage.php", // Replace with the actual URL to handle the upload
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $("#file_profile_image").val("");
                    $("#image_preview").attr("src", "");
                    $("#profile_image_modal").modal("hide");
                    loadadmindata();
                    loadadmintopdata();
                },
                error: function (error) {
                    console.log("Error:", error);
                    // Handle error, e.g., display an error message
                }
            });
        });


    }
});
