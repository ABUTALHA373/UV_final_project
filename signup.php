<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
if($isLoggedIn){
    header('Location:./profile.php');
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
    <div id="page_signup">
        <section class="">
            <div class="bg-gray"></div>
            <div class=" container login">
                <div class=" d-flex justify-content-center align-items-center vh-100">
                    <div class="col-lg-5 col-md-8 col p-3 bg-light rounded shadow-soft">
                        <!-- <section class="banner-area sing-area">
            <div class="overlay overlay-bg"></div>
            <div class=" container login">
                <div class=" d-flex justify-content-center align-items-center vh-100">
                    <div class="col-lg-5 col-md-8 col p-3 bg-light rounded shadow-soft"> -->
                        <h2 class="text-center p-2 bb">Sign Up</h2>
                        <div class="border p-2">
                            <form action="postphp/signuppost.php" method="POST">
                                <div class="mt-10 row m-0">
                                    <div class="col-6 m-0 p-0 pr-1">
                                        <label>First Name:</label>
                                        <input type="text" id="first_name" name="first_name" placeholder="John"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'John'" required
                                            class="single-input single-input-primary border">
                                    </div>
                                    <div class="col-6 m-0 p-0 pl-1">
                                        <label>Last Name:</label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Doe"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Doe'" required
                                            class="single-input single-input-primary border">
                                    </div>
                                    <small class="text-danger error-info" id="name_error"></small>
                                </div>
                                <div class="mt-10">
                                    <label>Email:</label>
                                    <div>
                                        <input type="email" id="email" name="email" placeholder="example@mail.com"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'example@mail.com'" required
                                            class="single-input single-input-primary border">
                                        <small class=" text-danger error-info" id="email_error"></small>
                                    </div>

                                </div>
                                <div class="mt-10">
                                    <label>Password:</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password" placeholder="Your Password"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'"
                                            required class="single-input single-input-primary border">
                                        <i class="fa fa-eye eye-right" id="s_cp_password-toggle" aria-hidden="true"></i>
                                    </div>
                                    <small class=" text-danger error-info" id="pass_error"></small>
                                </div>
                                <div class="mt-10">
                                    <label>Confirm Password:</label>
                                    <div class="relative">
                                        <input type="password" id="con_password" name="con_password"
                                            placeholder="Confirm Your Password" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Confirm Your Password'" required
                                            class="single-input single-input-primary border">
                                        <i class="fa fa-eye eye-right" id="s_cnp_password-toggle"
                                            aria-hidden="true"></i>
                                    </div>
                                    <small class=" text-danger error-info" id="conpass_error"></small>
                                </div>

                                <div class="mt-10">
                                    <button href="#" class="genric-btn primary circle w-100 fs-16">Sign Up</button>
                                </div>
                                <div class="mt-10 clink text-center">
                                    <p>Already have an account? <a href="login.php" class=""><b>Login</b></a></p>
                                </div>
                                <div class="mt-10 clink text-center">
                                    <div class="text-center pb-4 pt-2 ">
                                        <a href="index.php"><img src="img/icon.svg" alt="Logo" title=""
                                                height="50px" /></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
<script src="js/index.js"></script>

</html>