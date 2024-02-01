// side bar at services

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

// //ontop button 
// // Get the button:
// let mybutton = document.getElementById("scroll-up");

// // When the user scrolls down 20px from the top of the document, show the button
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//     mybutton.style.display = "block";
//   } else {
//     mybutton.style.display = "none";
//   }
// }

// // When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//     const scrollToTop = () => {
//         const c = document.documentElement.scrollTop || document.body.scrollTop;
//         if (c > 0) {
//             window.requestAnimationFrame(scrollToTop);
//             window.scrollTo(0, c - c / 8);
//         }
//     };
//     scrollToTop();
// }

//footer to gallery

$('#imgfeed').click(function(){
    window.location.href='gallery.php';
})



///signup page start 
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
///signup page end 
///login page start 
$(document).ready(function() {
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
                    $('#l_email_error').text(
                        '');
                    $('#l_email').removeClass('border-danger');
                } else {
                    $('#l_email_error').text('Email not registered!');
                    $('#l_email').addClass('border-danger');
                }
            }
        });
    });

    $('form').submit(function(event) {
        if ($('#l_email_error').text() !== '') {
            event.preventDefault(); // Prevent form submission
        }
    });

    //password view
    // Toggle password visibility
    $('#l_password-toggle').click(function() {
        togglePasswordVisibility('l_password', 'eye-icon');
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
///login page end 


