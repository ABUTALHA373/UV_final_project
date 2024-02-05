<?php 
require '../config/db_con.php';
require '../include/inc_css.php';
if (isset($_COOKIE['remember_me'])) {
    // Decode the cookie data
    $cookie_data = json_decode(base64_decode($_COOKIE['remember_me']), true);
    $status = 'active';

    // Retrieve user data from the database based on the cookie information
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND user_id = ? AND remember_token = ? AND status = ? ");
    $stmt->bind_param("siss", $cookie_data['user_email'], $cookie_data['user_id'], $cookie_data['user_remember_token'],$status);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, set up a login session
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_first_name'] = $row['first_name'];
        $_SESSION['user_last_name'] = $row['last_name'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_is_verified'] = $row['is_verified'];

        // Update the cookie expiration time for the next 7 days
        setcookie('remember_me', $_COOKIE['remember_me'], time() + (7 * 24 * 60 * 60), '/');

        // Redirect to the profile or dashboard page
        header("Location: ./profile.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Travel</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="page_login">
        <section class=" ">
            <div class=" bg-gray"></div>
            <div class=" container login">
                <div class=" d-flex justify-content-center align-items-center vh-100">
                    <div class="col-lg-5 col-md-8 col p-3 bg-light rounded shadow-soft">
                        <!-- <section class="banner-area ">
            <div class="overlay bg-white"></div>
            <div class=" container login">
                <div class=" d-flex justify-content-center align-items-center vh-100">
                    <div class="col-lg-5 col-md-8 col p-3 bg-light rounded "> -->

                        <h2 class="text-center p-2 bb">Admin Login</h2>
                        <div class="border p-2">
                            <form action="postphp/loginpost.php" method="post">
                                <div class="">
                                    <label>User id:</label>
                                    <div>
                                        <input type="number" id="al_user_id" name="al_user_id"
                                            placeholder="Your admin user id" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Your admin user id'" required
                                            class="single-input single-input-primary border">
                                        <!-- <small class=" text-danger error-info" id=""></small> -->
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label>Password:</label>
                                    <div class="relative">
                                        <input type="password" id="al_password" name="al_password"
                                            placeholder="Your Password" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Your Password'" required
                                            class="single-input single-input-primary border">
                                        <i class="fa fa-eye eye-right" id="l_password-toggle" aria-hidden="true"></i>
                                    </div>
                                    <!-- <small class=" text-danger error-info" id=""></small> -->
                                </div>
                                <div class="mt-3">
                                    <button class="genric-btn primary circle w-100 fs-16">Login</button>
                                </div>
                                <!-- <div class="mt-10 clink text-center">
                                    <div class="text-center pb-4 pt-2 ">
                                        <a href="<?php echo BASE_URL ?>index.php"><img
                                                src="<?php echo BASE_URL ?>img/icon.svg" alt="" title=""
                                                height="50px" /></a>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<?php
require '../include/inc_scripts.php';

if (isset($_GET['error'])) {
    $message = urldecode($_GET['error']);
    if ($message=='error_password') {
        
        echo '<script>$("#l_pass_error").text("Password is not Valid!.");
                    $("#l_password").addClass("border-danger");</script>';
    }else if ($message=='user_not_found') {
        
        echo '<script>Swal.fire({
            title: "Not Found!",
            text: "Email not registered!",
            icon: "error"
          });</script>';
    }else if ($message=='user_blocked') {
        
        echo '<script>Swal.fire({
            title: "Blocked!",
            text: "User account has been blocked! Please contact us.",
            icon: "error"
          });</script>';
    }else if ($message=='account_deleted') {
        
        echo '<script>Swal.fire({
            title: "Account Deleted!",
            text: "Account was deleted by User!",
            icon: "error"
          });</script>';
    }else if ($message=='set_pass_success') {
        
        echo '<script>Swal.fire({
            title: "Updated!",
            text: "Password updated successfully!",
            icon: "success"
          });</script>';
    }
}

?>
</body>

</html>