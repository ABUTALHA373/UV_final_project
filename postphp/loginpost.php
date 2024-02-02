<?php
require '../config/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $con->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Prepare a statement to retrieve user data from the database
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row['status']=='active'){
            if (password_verify($password, $row['password'])) {
                // Set up a login session
                session_start();
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_first_name'] = $row['first_name'];
                $_SESSION['user_last_name'] = $row['last_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_is_verified'] = $row['is_verified'];
    
                // Check if "Remember Me" is checked
                if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                    // Set a cookie for 7 days (adjust the time according to your needs)
                    $cookie_data = base64_encode(json_encode([
                        'user_email' => $row['email'],
                        'user_id' => $row['user_id'],
                        'user_remember_token' => $row['remember_token'],
                    ]));
                    setcookie('remember_me', $cookie_data, time() + (7 * 24 * 60 * 60), '/');
                }
    
                // Redirect to profile.php or another page after successful login
                header("Location: ../profile.php");
                exit;
            } else {
                $message = urlencode('error_password');
                header("Location: ../login.php?error=$message");
                exit;
            }
        }elseif($row['status']=='blocked'){
            $message = urlencode('user_blocked');
            header("Location: ../login.php?error=$message");
            exit;
        }elseif($row['status']=='deleted'){
            $message = urlencode('account_deleted');
            header("Location: ../login.php?error=$message");
            exit;
        }
    } else {
        $message = urlencode('user_not_found');
        header("Location: ../login.php?error=$message");
        exit;
    }

    $stmt->close();
}
?>