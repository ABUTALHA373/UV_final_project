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

    <section class="banner-area sing-area">
        <div class="overlay overlay-bg"></div>
        <div class=" container login">
            <div class=" d-flex justify-content-center align-items-center vh-100">
                <div class="col-lg-5 col-md-8 col p-3 bg-light rounded ">
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
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@mail.com'"
                                        required class="single-input single-input-primary border">
                                    <small class=" text-danger error-info" id="email_error"></small>
                                </div>

                            </div>
                            <div class="mt-10">
                                <label>Password:</label>
                                <input type="password" id="password" name="password" placeholder="Your Password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'" required
                                    class="single-input single-input-primary border">
                                <small class=" text-danger error-info" id="pass_error"></small>
                            </div>
                            <div class="mt-10">
                                <label>Confirm Password:</label>
                                <input type="password" id="con_password" name="con_password"
                                    placeholder="Confirm Your Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Confirm Your Password'" required
                                    class="single-input single-input-primary border">
                                <small class=" text-danger error-info" id="conpass_error"></small>
                            </div>

                            <div class="mt-10">
                                <button href="#" class="genric-btn primary circle w-100 fs-16">Sign Up</button>
                            </div>
                            <div class="mt-10 clink text-center">
                                <p>Already have an account? <a href="Login.php" class=""><b>Login</b></a></p>
                            </div>
                            <div class="mt-10 clink text-center">
                                <div class="text-center pb-4 pt-2 ">
                                    <a href="index.php"><img src="img/icon.svg" alt="Logo" title="" height="50px" /></a>
                                </div>
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
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
<script src="js/index.js"></script>

<script>
$(document).ready(function() {
    $('#name_error').css('font-size', '12px');
    // Validate First Name and Last Name on keyup
    $('#first_name, #last_name').on('keyup', function() {
        var firstName = $('#first_name').val();
        var lastName = $('#last_name').val();

        if (firstName == '' && lastName == '') {
            $('#name_error').text('');
            $('#first_name, #last_name').removeClass('border-danger');
        } else {
            if (firstName != null || lastName != null) {
                if (firstName === lastName) {
                    $('#name_error').text('Cannot be same!');
                    $('#first_name, #last_name').addClass('border-danger');
                } else if (/\d/.test(firstName) || /\d/.test(lastName)) {
                    $('#name_error').text('Cannot contain any number!');
                    $('#first_name, #last_name').addClass('border-danger');
                } else {
                    $('#name_error').text('');
                    $('#first_name, #last_name').removeClass('border-danger');
                }
            }
        }
    });

    // Validate Email using jQuery AJAX on keyup
    $('input[name="email"]').on('keyup', function() {
        var email = $(this).val();

        // Perform AJAX request to check if email exists on the server
        $.ajax({
            url: './postphp/check_email.php',
            type: 'POST',
            data: {
                email: email
            },
            success: function(response) {
                if (response === 'exists') {
                    $('#email_error').text(
                        'Email already exists. Please use a different email address.');
                    $('#email').addClass('border-danger');
                } else {
                    $('#email_error').text('');
                    $('#email').removeClass('border-danger');
                }
            }
        });
    });

    // Validate Password on keyup
    $('input[name="password"]').on('keyup', function() {
        var password = $(this).val();

        // Password should be at least 8 characters, contain an uppercase letter, a lowercase letter, and a special character
        if (password != '') {
            if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !
                /[^A-Za-z0-9]/
                .test(password)) {
                $('#pass_error').text(
                    'Must contain a uppercase, lowercase, number and a special character.Minimum 8 characters.'
                );
                $('#password').addClass('border-danger');
            } else {
                $('#pass_error').text('');
                $('#password').removeClass('border-danger');
            }
        } else {
            $('#pass_error').text('');
            $('#password').removeClass('border-danger');
        }
    });

    $('input[name="password"],input[name="con_password"]').on('keyup', function() {
        var password = $('input[name="password"]').val();
        var con_password = $(this).val();

        // Password should be at least 8 characters, contain an uppercase letter, a lowercase letter, and a special character
        if (password != con_password) {
            $('#conpass_error').text(
                'Must be equal with Password field.'
            );
            $('#con_password').addClass('border-danger');
        } else {
            $('#conpass_error').text('');
            $('#con_password').removeClass('border-danger');
        }
    });

    $('form').submit(function(event) {
        if ($('#name_error').text() !== '' || $('#email_error').text() !== '' || $('#pass_error')
            .text() !== '' || $('#conpass_error').text() !== '') {
            event.preventDefault(); // Prevent form submission
            // Optionally, you can display a message or handle the error in some way


        }
    });

    //password view
    // Toggle password visibility
    $('#password-toggle').click(function() {
        togglePasswordVisibility('password', 'eye-icon');
    });

    // Toggle confirm password visibility
    $('#con-password-toggle').click(function() {
        togglePasswordVisibility('con_password', 'con-eye-icon');
    });

    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = $('#' + inputId);
        var eyeIcon = $('#' + iconId);

        var type = passwordInput.attr('type');
        if (type === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }
});
</script>




</html>