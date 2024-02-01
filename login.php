<?php 
require './config/db_con.php';
if (isset($_COOKIE['remember_me'])) {
    // Decode the cookie data
    $cookie_data = json_decode(base64_decode($_COOKIE['remember_me']), true);

    // Retrieve user data from the database based on the cookie information
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND user_id = ? AND remember_token = ?");
    $stmt->bind_param("sis", $cookie_data['user_email'], $cookie_data['user_id'], $cookie_data['user_remember_token']);
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

    <section class="banner-area ">
        <div class="overlay overlay-bg"></div>
        <div class=" container login">
            <div class=" d-flex justify-content-center align-items-center vh-100">
                <div class="col-lg-5 col-md-8 col p-3 bg-light rounded ">
                    <!-- <div class="text-center pb-4 pt-2 ">
                        <a href="index.php"><img src="img/icon.svg" alt="" title="" height="50px" /></a>
                    </div> -->
                    <h2 class="text-center p-2 bb">Login</h2>
                    <div class="border p-2">
                        <!-- <h3 class="text-center p-2 ">Login</h3> -->
                        <form action="postphp/loginpost.php" method="post">
                            <div class="mt-10">
                                <label>Email:</label>
                                <div>
                                    <input type="email" id="l_email" name="email" placeholder="example@mail.com"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@mail.com'"
                                        required class="single-input single-input-primary border">
                                    <small class=" text-danger error-info" id="l_email_error"></small>
                                </div>
                            </div>
                            <div class="mt-10">
                                <label>Password:</label>
                                <div class="relative">
                                    <input type="password" id="l_password" name="password" placeholder="Your Password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'"
                                        required class="single-input single-input-primary border">
                                    <i class="fa fa-eye eye-right" id="l_password-toggle" aria-hidden="true"></i>
                                </div>
                                <small class=" text-danger error-info" id="l_pass_error"></small>
                            </div>
                            <div class="mt-15 row clink">
                                <div class="col"><label class="cyberpunk-checkbox-label">
                                        <input type="checkbox" class="cyberpunk-checkbox" name="remember_me">
                                        Remember me</label></div>
                                <div class="col text-right"><a href="" class=""><b>Forgot Password?</b></a></div>
                            </div>
                            <!-- <div class="mt-15">
                                <label">Password:</label>
                                    <input type="password" name="password" placeholder="Password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                                        class="single-input border">
                            </div> -->
                            <div class="mt-10">
                                <button href="#" class="genric-btn primary circle w-100 fs-16">Login</button>
                            </div>
                            <div class="mt-10 clink text-center">
                                <p>Dont have any account? <a href="signup.php" class=""><b>Sing Up</b></a></p>
                            </div>
                            <div class="mt-10 clink text-center">
                                <div class="text-center pb-4 pt-2 ">
                                    <a href="index.php"><img src="img/icon.svg" alt="" title="" height="50px" /></a>
                                </div>
                                <!-- <p><a href="index.php" class="">Home <i class="fa-solid fa-angles-right"></i></a></p> -->
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>

</body>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
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
    }
}

?>
</body>

</html>