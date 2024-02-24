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

        <section class=" flight-details">
            <h3>Flight Details</h3>
            <table class="center-table">
                <tr>
                    <th>Airline</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                </tr>

                <tr>
                    <td>{{Airline}}</td>

                    <td>{{Departure}}</td>
                    <td>{{Arrival}}</td>
                </tr>
                <tr>
                    <th>Flight Number</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                </tr>
                <tr>
                    <td>{{Flight Number}}</td>
                    <td>{{Departure Date}}</td>
                    <td>{{Arrival Date}}</td>
                </tr>
            </table>
        </section>

        <section class="passenger-details">
            <h3>Passenger Details</h3>
            {{persondetails}}
        </section>



        <section class="booking-details">
            <h3>Booking Details</h3>
            <table class="center-table">
                <tr>
                    <th>Booking Id</th>
                    <td>{{booking_id}}</td>
                    <th>Payment Status</th>
                    <td>{{pay_status}}</td>
                    <th>Ticket</th>
                    <td>{{ticket_class}}</td>
                </tr>
                <tr>
                    <th>Booking Date</th>
                    <td>{{booking_date}}</td>
                    <th>Transaction Id</th>
                    <td>{{tran_id}}</td>
                    <th>Seat(s)</th>
                    <td>{{seats}}</td>
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