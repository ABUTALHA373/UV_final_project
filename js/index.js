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
document.getElementById("imgfeed").addEventListener("click", imgfeedFunction);

function imgfeedFunction() {
  window.location.href='gallery.php';
}


///login page 
    $(document).ready(function () {
        // Validate First Name and Last Name
        $('input[name="name"]').on('blur', function () {
            var firstName = $('input[name="name"]').eq(0).val();
            var lastName = $('input[name="name"]').eq(1).val();

            if (firstName === lastName || /^[0-9]+$/.test(firstName) || /^[0-9]+$/.test(lastName)) {
                alert('First Name and Last Name cannot be the same and cannot contain any numbers.');
            }
        });

        // Validate Email using jQuery AJAX
        $('input[name="email"]').on('blur', function () {
            var email = $(this).val();

            // Perform AJAX request to check if email exists on the server
            $.ajax({
                url: 'check_email.php',
                type: 'POST',
                data: {email: email},
                success: function (response) {
                    if (response === 'exists') {
                        alert('Email already exists. Please use a different email address.');
                    }
                }
            });
        });

        // Validate Password
        $('input[name="password"]').on('blur', function () {
            var password = $(this).val();

            // Password should be at least 8 characters, contain an uppercase letter, a lowercase letter, and a special character
            if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
                alert('Password should be at least 8 characters, contain an uppercase letter, a lowercase letter, and a special character.');
            }
        });

        // Add more validation for other form fields if needed
    });

