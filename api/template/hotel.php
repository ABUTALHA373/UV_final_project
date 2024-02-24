<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Bookitfast</title>
    <style>
    * {
        box-sizing: border-box;
        font-size: 12px;
    }


    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h3 {
        font-size: 16px;
        text-align: center;
        background-color: #f8b600;
        padding: 5px;
        color: white;
        margin: 15px 0 8px 0;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .fare-details td,
    .booking-details td {
        text-align: left !important;
    }


    .center-table th,
    .center-table td {
        padding: 5px;
        border: 1px solid #c4c4c4;
        text-align: left;
        text-align: center;
    }

    .right {
        text-align: right;
    }

    th {
        font-weight: bold;
        background-color: #dde9ff;

    }

    .tf {
        background-color: #d3ffcf !important;
    }


    .footer {
        text-align: center;
        margin-top: 20px;
    }
    </style>

</head>

<body>
    <div class="container">
        <header class="header">
            <table style="border-bottom: 2px solid black;">
                <tr>
                    <td><img src="img/logo.jpeg" height="50px" class=""></td>
                    <td>
                        <p class="right">Issued by: Bookitfast</p>
                        <p class="right">Issue Date:{{date}}</p>
                    </td>
                </tr>
            </table>
        </header>


        <section class="hotel-details">
            <h3>Hotel Details</h3>
            <table class="center-table">
                <tr>
                    <th>Hotel Name</th>
                    <td>{{hotel_name}}</td>
                    <th>Location</th>
                    <td>{{location}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{address}}</td>
                    <th>Star</th>
                    <td>{{star}}</td>
                </tr>
                <tr>
                    <th>Room</th>
                    <td>{{room}}</td>
                    <th>Capacity(adults)</th>
                    <td>{{capacity}}</td>
                </tr>
            </table>
        </section>
        <section class="booking-details">
            <h3>Booking Details</h3>

            <table class="center-table">
                <tr>
                    <th>Booking Id</th>
                    <td>{{booking_id}}</td>
                    <th>Booking Date</th>
                    <td>{{booking_date}}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>{{pay_status}}</td>
                    <th>Transaction Id</th>
                    <td>{{tran_id}}</td>
                </tr>
                <tr>
                    <th>Check-In</th>
                    <td>{{check_in}}</td>
                    <th>Check-Out</th>
                    <td>{{check_out}}</td>
                </tr>
                <tr>
                    <th>Total room</th>
                    <td>{{total_room}}</td>
                    <th></th>
                    <td></td>
                </tr>
            </table>
        </section>
        <section class="fare-details">
            <h3>Fare Details</h3>
            <table class="center-table">
                <tr>
                    <th>Base Fare</th>
                    <td>{{basefare}}</td>
                    <th>Discount</th>
                    <td>{{discount}}</td>

                </tr>
                <tr>
                    <th>Vat</th>
                    <td>{{vat}}</td>
                    <th class="tf">Total Fare</th>
                    <td>{{totalfare}}</td>
                </tr>
            </table>
        </section>
        <footer class="footer">

            <p>For any inquiries, please contact <b>Bookitfast</b> customer service at <b>01700123123</b> or
                <b>info.bookitfast@gmail.com</b>
            </p>
        </footer>
    </div>

</body>

</html>