<?php
require '../config/db_con.php';
session_start();

if (isset($_GET['code'])) {
    $confirmationCode = $con->real_escape_string($_GET['code']);

    // Check if the confirmation code exists in the database
    $query = $con->prepare("SELECT * FROM users WHERE verification_token = ?");
    $query->bind_param("s", $confirmationCode);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    $token = $row['verification_token'];
    $verified = $row['is_verified'];

    if ($token == $confirmationCode && $verified==null) {
        // Update the user's status as confirmed
        $updateQuery = "UPDATE users SET is_verified = 1 WHERE verification_token = ?";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->bind_param("s", $confirmationCode);
        $updateStmt->execute();

        $select_query = "SELECT user_id, email, first_name, last_name, is_verified FROM users WHERE verification_token = ?";
        $stmt = $con->prepare($select_query);
        $stmt->bind_param("s", $confirmationCode);

        if ($stmt->execute()) {
            $stmt->bind_result($user_id, $email, $first_name, $last_name, $is_verified);
            if ($stmt->fetch()) {
                $_SESSION['user_email'] = $email;
                $_SESSION['user_first_name'] = $first_name;
                $_SESSION['user_last_name'] = $last_name;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_is_verified'] = $is_verified;
        
            } else {
                $errorType = 'Database Error';
                $errorMessage = 'User with the provided details not found.';
                header("Location: ../error.php?type=$errorType&message=$errorMessage");
                exit;
            }

            $stmt->close();
            } else {
                // Handle the query execution error
                $errorType = 'Database Error';
                $errorMessage = $con->error;
                header("Location: ../error.php?type=$errorType&message=$errorMessage");
                exit;
        }
        //urlencode : encode special characters
        $message = urlencode('verified');
        header("Location: ../profile.php?message=$message");
        exit;
    }else if($token == $confirmationCode && $verified==1){
        $message = urlencode('already_verified');
        header("Location: ../profile.php?message=$message");
        exit;
    }else {
        $message = urlencode('invalid');
        header("Location: ../profile.php?message=$message");
        exit;
    }
} else {
    $message = urlencode('token_error');
        header("Location: ../profile.php?message=$message");
    exit;
}
?>