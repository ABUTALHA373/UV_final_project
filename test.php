<?php
session_start();
require './config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'personDetails' is set in $_POST
    if (isset($_POST['personDetails'])) {
        $personDetails = json_decode($_POST['personDetails'], true);

        // Check if decoding was successful
        if ($personDetails !== null) {
            // Access the person details and seats string
            $seatsString = $personDetails['seatsString'];
            $personData = $personDetails;

            // Echo the data for testing purposes
            echo "Seats String: " . $seatsString . "<br>";

            foreach ($personData as $person) {
                echo "First Name: " . $person['firstName'] . "<br>";
                echo "Last Name: " . $person['lastName'] . "<br>";
                echo "Passport No: " . $person['passportNo'] . "<br>";
                echo "Contact: " . $person['contact'] . "<br>";
                echo "<hr>";
            }
        } else {
            echo "Failed to decode JSON data.";
        }
    } else {
        echo "personDetails not set in POST data.";
    }
}
?>