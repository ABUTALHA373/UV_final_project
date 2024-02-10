// side bar at services
var taka = 'BDT';
function getallincondition(table, column, value, callback) {
  $.ajax({
    url: 'api/getallincondition.php',
    method: 'GET',
    data: {
      table: table,
      column: column,
      value: value
    },
    success: function (response) {
      // Call the callback function with the response
      callback(response);
    },
    error: function (error) {
      // Handle error response
      console.log(error);
      // You might also want to call the callback with an error value
      callback(null, error);
    }
  });
}

// Example usage
// getallincondition('yourTable', 'yourColumn', 'yourValue', function(response, error) {
//   if (error) {
//     // Handle error
//   } else {
//     // Use the response
//     console.log(response);
//   }
// });


$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });

});

//footer to gallery
$("#imgfeed").click(function () {
  window.location.href = "gallery.php";
});

///signup page start
$(document).ready(function () {
  if ($("#page_signup").length > 0) {
    $("#name_error").css("font-size", "12px");
    $("#first_name, #last_name").on("keyup", function () {
      var firstName = $("#first_name").val();
      var lastName = $("#last_name").val();
      if (firstName == "" && lastName == "") {
        $("#name_error").text("");
        $("#first_name, #last_name").removeClass("border-danger");
      } else {
        if (firstName != null || lastName != null) {
          if (firstName === lastName) {
            $("#name_error").text("Cannot be same!");
            $("#first_name, #last_name").addClass("border-danger");
          } else if (/\d/.test(firstName) || /\d/.test(lastName)) {
            $("#name_error").text("Cannot contain any number!");
            $("#first_name, #last_name").addClass("border-danger");
          } else {
            $("#name_error").text("");
            $("#first_name, #last_name").removeClass("border-danger");
          }
        }
      }
    });

    // Validate Email using jQuery AJAX on keyup
    $('input[name="email"]').on("keyup", function () {
      var email = $(this).val();
      $.ajax({
        url: "./api/check_email.php",
        type: "POST",
        data: {
          email: email,
        },
        success: function (response) {
          if (response === "exists") {
            $("#email_error").text(
              "Email already exists. Please use a different email address."
            );
            $("#email").addClass("border-danger");
          } else {
            $("#email_error").text("");
            $("#email").removeClass("border-danger");
          }
        },
      });
    });

    // Validate Password on keyup
    $('input[name="password"]').on("keyup", function () {
      var password = $(this).val();
      if (password != "") {
        if (
          password.length < 8 ||
          !/[A-Z]/.test(password) ||
          !/[a-z]/.test(password) ||
          !/\d/.test(password) ||
          !/[!@#$%^&*(),.?":{}|_<>]/.test(password)
        ) {
          $("#pass_error").text(
            "Must contain a uppercase, lowercase, number and a special character.Minimum 8 characters."
          );
          $("#password").addClass("border-danger");
        } else {
          $("#pass_error").text("");
          $("#password").removeClass("border-danger");
        }
      } else {
        $("#pass_error").text("");
        $("#password").removeClass("border-danger");
      }
    });

    $('input[name="password"]').on("keyup", function () {
      erro();
    });

    $('input[name="con_password"]').on("keyup", function () {
      erro();
    });

    function erro() {
      var password = $('input[name="password"]').val();
      var con_password = $('input[name="con_password"]').val();

      if (con_password.trim() === "") {
        // If con_password is empty, remove the error message and border color
        $("#conpass_error").text("");
        $("#con_password").removeClass("border-danger");
        $("#password").removeClass("border-danger");
      } else if (password !== con_password) {
        // If passwords do not match, show error message and add border color
        $("#conpass_error").text("Must be equal with Password field.");
        $("#con_password").addClass("border-danger");
        $("#password").addClass("border-danger");
      } else {
        // If passwords match, remove the error message and border color
        $("#conpass_error").text("");
        $("#con_password").removeClass("border-danger");
        $("#password").removeClass("border-danger");
      }
    }

    $("form").submit(function (event) {
      if (
        $("#name_error").text() !== "" ||
        $("#email_error").text() !== "" ||
        $("#pass_error").text() !== "" ||
        $("#conpass_error").text() !== ""
      ) {
        event.preventDefault();
      }
    });

    //password view
    // Toggle password visibility
    $("#s_cp_password-toggle").click(function () {
      togglePasswordVisibility("password");
    });
    $("#s_cnp_password-toggle").click(function () {
      togglePasswordVisibility("con_password");
    });
    function togglePasswordVisibility(inputId) {
      var passwordInput = $("#" + inputId);
      var type = passwordInput.attr("type");
      if (type === "password") {
        passwordInput.attr("type", "text");
      } else {
        passwordInput.attr("type", "password");
      }
    }
  }
});
///signup page end

///login page start
$(document).ready(function () {
  if ($("#page_login").length > 0) {
    $('input[name="email"]').on("keyup", function () {
      var email = $(this).val();
      $.ajax({
        url: "./api/check_email.php",
        type: "POST",
        data: {
          email: email,
        },
        success: function (response) {
          if (response === "exists") {
            $("#l_email_error").text("");
            $("#l_email").removeClass("border-danger");
          } else {
            $("#l_email_error").text("Email not registered!");
            $("#l_email").addClass("border-danger");
          }
        },
      });
    });

    $("form").submit(function (event) {
      if ($("#l_email_error").text() !== "") {
        event.preventDefault(); //
      }
    });

    //password view
    // Toggle password visibility
    $("#l_password-toggle").click(function () {
      togglePasswordVisibility("l_password");
    });
    function togglePasswordVisibility(inputId) {
      var passwordInput = $("#" + inputId);

      var type = passwordInput.attr("type");
      if (type === "password") {
        passwordInput.attr("type", "text");
      } else {
        passwordInput.attr("type", "password");
      }
    }
  }
});
///login page end

//country for dropdown
const countryOptions = [
  { id: "Afghanistan", text: "Afghanistan" },
  { id: "Aland Islands", text: "Aland Islands" },
  { id: "Albania", text: "Albania" },
  { id: "Algeria", text: "Algeria" },
  { id: "American Samoa", text: "American Samoa" },
  { id: "Andorra", text: "Andorra" },
  { id: "Angola", text: "Angola" },
  { id: "Anguilla", text: "Anguilla" },
  { id: "Antarctica", text: "Antarctica" },
  { id: "Antigua And Barbuda", text: "Antigua And Barbuda" },
  { id: "Argentina", text: "Argentina" },
  { id: "Armenia", text: "Armenia" },
  { id: "Aruba", text: "Aruba" },
  { id: "Australia", text: "Australia" },
  { id: "Austria", text: "Austria" },
  { id: "Azerbaijan", text: "Azerbaijan" },
  { id: "Bahamas", text: "Bahamas" },
  { id: "Bahrain", text: "Bahrain" },
  { id: "Bangladesh", text: "Bangladesh" },
  { id: "Barbados", text: "Barbados" },
  { id: "Belarus", text: "Belarus" },
  { id: "Belgium", text: "Belgium" },
  { id: "Belize", text: "Belize" },
  { id: "Benin", text: "Benin" },
  { id: "Bermuda", text: "Bermuda" },
  { id: "Bhutan", text: "Bhutan" },
  { id: "Bolivia", text: "Bolivia" },
  { id: "Bosnia And Herzegovina", text: "Bosnia And Herzegovina" },
  { id: "Botswana", text: "Botswana" },
  { id: "Bouvet Island", text: "Bouvet Island" },
  { id: "Brazil", text: "Brazil" },
  {
    id: "British Indian Ocean Territory",
    text: "British Indian Ocean Territory",
  },
  { id: "Brunei Darussalam", text: "Brunei Darussalam" },
  { id: "Bulgaria", text: "Bulgaria" },
  { id: "Burkina Faso", text: "Burkina Faso" },
  { id: "Burundi", text: "Burundi" },
  { id: "Cambodia", text: "Cambodia" },
  { id: "Cameroon", text: "Cameroon" },
  { id: "Canada", text: "Canada" },
  { id: "Cape Verde", text: "Cape Verde" },
  { id: "Cayman Islands", text: "Cayman Islands" },
  { id: "Central African Republic", text: "Central African Republic" },
  { id: "Chad", text: "Chad" },
  { id: "Chile", text: "Chile" },
  { id: "China", text: "China" },
  { id: "Christmas Island", text: "Christmas Island" },
  { id: "Cocos (Keeling) Islands", text: "Cocos (Keeling) Islands" },
  { id: "Colombia", text: "Colombia" },
  { id: "Comoros", text: "Comoros" },
  { id: "Congo", text: "Congo" },
  { id: "Congo Democratic Republic", text: "Congo Democratic Republic" },
  { id: "Cook Islands", text: "Cook Islands" },
  { id: "Costa Rica", text: "Costa Rica" },
  { id: "Cote D'Ivoire", text: "Cote D'Ivoire" },
  { id: "Croatia", text: "Croatia" },
  { id: "Cuba", text: "Cuba" },
  { id: "Cyprus", text: "Cyprus" },
  { id: "Czech Republic", text: "Czech Republic" },
  { id: "Denmark", text: "Denmark" },
  { id: "Djibouti", text: "Djibouti" },
  { id: "Dominica", text: "Dominica" },
  { id: "Dominican Republic", text: "Dominican Republic" },
  { id: "Ecuador", text: "Ecuador" },
  { id: "Egypt", text: "Egypt" },
  { id: "El Salvador", text: "El Salvador" },
  { id: "Equatorial Guinea", text: "Equatorial Guinea" },
  { id: "Eritrea", text: "Eritrea" },
  { id: "Estonia", text: "Estonia" },
  { id: "Ethiopia", text: "Ethiopia" },
  { id: "Falkland Islands (Malvinas)", text: "Falkland Islands (Malvinas)" },
  { id: "Faroe Islands", text: "Faroe Islands" },
  { id: "Fiji", text: "Fiji" },
  { id: "Finland", text: "Finland" },
  { id: "France", text: "France" },
  { id: "French Guiana", text: "French Guiana" },
  { id: "French Polynesia", text: "French Polynesia" },
  { id: "French Southern Territories", text: "French Southern Territories" },
  { id: "Gabon", text: "Gabon" },
  { id: "Gambia", text: "Gambia" },
  { id: "Georgia", text: "Georgia" },
  { id: "Germany", text: "Germany" },
  { id: "Ghana", text: "Ghana" },
  { id: "Gibraltar", text: "Gibraltar" },
  { id: "Greece", text: "Greece" },
  { id: "Greenland", text: "Greenland" },
  { id: "Grenada", text: "Grenada" },
  { id: "Guadeloupe", text: "Guadeloupe" },
  { id: "Guam", text: "Guam" },
  { id: "Guatemala", text: "Guatemala" },
  { id: "Guernsey", text: "Guernsey" },
  { id: "Guinea", text: "Guinea" },
  { id: "Guinea-Bissau", text: "Guinea-Bissau" },
  { id: "Guyana", text: "Guyana" },
  { id: "Haiti", text: "Haiti" },
  {
    id: "Heard Island & Mcdonald Islands",
    text: "Heard Island & Mcdonald Islands",
  },
  {
    id: "Holy See (Vatican City State)",
    text: "Holy See (Vatican City State)",
  },
  { id: "Honduras", text: "Honduras" },
  { id: "Hong Kong", text: "Hong Kong" },
  { id: "Hungary", text: "Hungary" },
  { id: "Iceland", text: "Iceland" },
  { id: "India", text: "India" },
  { id: "Indonesia", text: "Indonesia" },
  { id: "Iran}, Islamic Republic Of", text: "Iran}, Islamic Republic Of" },
  { id: "Iraq", text: "Iraq" },
  { id: "Ireland", text: "Ireland" },
  { id: "Isle Of Man", text: "Isle Of Man" },
  { id: "Israel", text: "Israel" },
  { id: "Italy", text: "Italy" },
  { id: "Jamaica", text: "Jamaica" },
  { id: "Japan", text: "Japan" },
  { id: "Jersey", text: "Jersey" },
  { id: "Jordan", text: "Jordan" },
  { id: "Kazakhstan", text: "Kazakhstan" },
  { id: "Kenya", text: "Kenya" },
  { id: "Kiribati", text: "Kiribati" },
  { id: "Korea", text: "Korea" },
  { id: "Kuwait", text: "Kuwait" },
  { id: "Kyrgyzstan", text: "Kyrgyzstan" },
  {
    id: "Lao People's Democratic Republic",
    text: "Lao People's Democratic Republic",
  },
  { id: "Latvia", text: "Latvia" },
  { id: "Lebanon", text: "Lebanon" },
  { id: "Lesotho", text: "Lesotho" },
  { id: "Liberia", text: "Liberia" },
  { id: "Libyan Arab Jamahiriya", text: "Libyan Arab Jamahiriya" },
  { id: "Liechtenstein", text: "Liechtenstein" },
  { id: "Lithuania", text: "Lithuania" },
  { id: "Luxembourg", text: "Luxembourg" },
  { id: "Macao", text: "Macao" },
  { id: "Macedonia", text: "Macedonia" },
  { id: "Madagascar", text: "Madagascar" },
  { id: "Malawi", text: "Malawi" },
  { id: "Malaysia", text: "Malaysia" },
  { id: "Maldives", text: "Maldives" },
  { id: "Mali", text: "Mali" },
  { id: "Malta", text: "Malta" },
  { id: "Marshall Islands", text: "Marshall Islands" },
  { id: "Martinique", text: "Martinique" },
  { id: "Mauritania", text: "Mauritania" },
  { id: "Mauritius", text: "Mauritius" },
  { id: "Mayotte", text: "Mayotte" },
  { id: "Mexico", text: "Mexico" },
  {
    id: "Micronesia}, Federated States Of",
    text: "Micronesia}, Federated States Of",
  },
  { id: "Moldova", text: "Moldova" },
  { id: "Monaco", text: "Monaco" },
  { id: "Mongolia", text: "Mongolia" },
  { id: "Montenegro", text: "Montenegro" },
  { id: "Montserrat", text: "Montserrat" },
  { id: "Morocco", text: "Morocco" },
  { id: "Mozambique", text: "Mozambique" },
  { id: "Myanmar", text: "Myanmar" },
  { id: "Namibia", text: "Namibia" },
  { id: "Nauru", text: "Nauru" },
  { id: "Nepal", text: "Nepal" },
  { id: "Netherlands", text: "Netherlands" },
  { id: "Netherlands Antilles", text: "Netherlands Antilles" },
  { id: "New Caledonia", text: "New Caledonia" },
  { id: "New Zealand", text: "New Zealand" },
  { id: "Nicaragua", text: "Nicaragua" },
  { id: "Niger", text: "Niger" },
  { id: "Nigeria", text: "Nigeria" },
  { id: "Niue", text: "Niue" },
  { id: "Norfolk Island", text: "Norfolk Island" },
  { id: "Northern Mariana Islands", text: "Northern Mariana Islands" },
  { id: "Norway", text: "Norway" },
  { id: "Oman", text: "Oman" },
  { id: "Pakistan", text: "Pakistan" },
  { id: "Palau", text: "Palau" },
  {
    id: "Palestinian Territory}, Occupied",
    text: "Palestinian Territory}, Occupied",
  },
  { id: "Panama", text: "Panama" },
  { id: "Papua New Guinea", text: "Papua New Guinea" },
  { id: "Paraguay", text: "Paraguay" },
  { id: "Peru", text: "Peru" },
  { id: "Philippines", text: "Philippines" },
  { id: "Pitcairn", text: "Pitcairn" },
  { id: "Poland", text: "Poland" },
  { id: "Portugal", text: "Portugal" },
  { id: "Puerto Rico", text: "Puerto Rico" },
  { id: "Qatar", text: "Qatar" },
  { id: "Reunion", text: "Reunion" },
  { id: "Romania", text: "Romania" },
  { id: "Russian Federation", text: "Russian Federation" },
  { id: "Rwanda", text: "Rwanda" },
  { id: "aint Barthelemy", text: "Saint Barthelemy" },
  { id: "Saint Helena", text: "Saint Helena" },
  { id: "Saint Kitts And Nevis", text: "Saint Kitts And Nevis" },
  { id: "Saint Lucia", text: "Saint Lucia" },
  { id: "Saint Martin", text: "Saint Martin" },
  { id: "Saint Pierre And Miquelon", text: "Saint Pierre And Miquelon" },
  { id: "Saint Vincent And Grenadines", text: "Saint Vincent And Grenadines" },
  { id: "Samoa", text: "Samoa" },
  { id: "San Marino", text: "San Marino" },
  { id: "Sao Tome And Principe", text: "Sao Tome And Principe" },
  { id: "Saudi Arabia", text: "Saudi Arabia" },
  { id: "Senegal", text: "Senegal" },
  { id: "Serbia", text: "Serbia" },
  { id: "Seychelles", text: "Seychelles" },
  { id: "Sierra Leone", text: "Sierra Leone" },
  { id: "Singapore", text: "Singapore" },
  { id: "Slovakia", text: "Slovakia" },
  { id: "Slovenia", text: "Slovenia" },
  { id: "Solomon Islands", text: "Solomon Islands" },
  { id: "Somalia", text: "Somalia" },
  { id: "South Africa", text: "South Africa" },
  {
    id: "South Georgia And Sandwich Isl.",
    text: "South Georgia And Sandwich Isl.",
  },
  { id: "Spain", text: "Spain" },
  { id: "Sri Lanka", text: "Sri Lanka" },
  { id: "Sudan", text: "Sudan" },
  { id: "Suriname", text: "Suriname" },
  { id: "Svalbard And Jan Mayen", text: "Svalbard And Jan Mayen" },
  { id: "Swaziland", text: "Swaziland" },
  { id: "Sweden", text: "Sweden" },
  { id: "Switzerland", text: "Switzerland" },
  { id: "Syrian Arab Republic", text: "Syrian Arab Republic" },
  { id: "Taiwan", text: "Taiwan" },
  { id: "Tajikistan", text: "Tajikistan" },
  { id: "Tanzania", text: "Tanzania" },
  { id: "Thailand", text: "Thailand" },
  { id: "Timor-Leste", text: "Timor-Leste" },
  { id: "Togo", text: "Togo" },
  { id: "Tokelau", text: "Tokelau" },
  { id: "Tonga", text: "Tonga" },
  { id: "Trinidad And Tobago", text: "Trinidad And Tobago" },
  { id: "Tunisia", text: "Tunisia" },
  { id: "Turkey", text: "Turkey" },
  { id: "Turkmenistan", text: "Turkmenistan" },
  { id: "Turks And Caicos Islands", text: "Turks And Caicos Islands" },
  { id: "Tuvalu", text: "Tuvalu" },
  { id: "Uganda", text: "Uganda" },
  { id: "Ukraine", text: "Ukraine" },
  { id: "United Arab Emirates", text: "United Arab Emirates" },
  { id: "United Kingdom", text: "United Kingdom" },
  { id: "United States", text: "United States" },
  {
    id: "United States Outlying Islands",
    text: "United States Outlying Islands",
  },
  { id: "Uruguay", text: "Uruguay" },
  { id: "Uzbekistan", text: "Uzbekistan" },
  { id: "Vanuatu", text: "Vanuatu" },
  { id: "Venezuela", text: "Venezuela" },
  { id: "Viet Nam", text: "Viet Nam" },
  { id: "Virgin Islands}, British", text: "Virgin Islands}, British" },
  { id: "Virgin Islands}, U.S.", text: "Virgin Islands}, U.S." },
  { id: "Wallis And Futuna", text: "Wallis And Futuna" },
  { id: "Western Sahara", text: "Western Sahara" },
  { id: "Yemen", text: "Yemen" },
  { id: "Zambia", text: "Zambia" },
  { id: "Zimbabwe", text: "Zimbabwe" },
];

//profile page
$(document).ready(function () {
  if ($("#page_profile").length > 0) {
    $("#gender").select2({
      minimumResultsForSearch: Infinity,
    });
    $("#marital_status").select2({
      minimumResultsForSearch: Infinity,
    });
    $("#country").select2({
      data: countryOptions,
    });
    getuserdata();
    function getuserdata() {
      $.ajax({
        url: "./api/getuser.php",
        type: "GET",
        // data: {
        //     email: $email,
        //     user_id: $user_id
        // },
        dataType: "json",
        success: function (response) {
          $("#email").val(response[0].email);
          $("#phone_number").val(response[0].phone_number);
          $("#first_name").val(response[0].first_name);
          $("#last_name").val(response[0].last_name);
          $("#nid").val(response[0].nid);
          $("#dob").val(response[0].dob);
          $("#gender").val(response[0].gender).change();
          $("#marital_status").val(response[0].marital_status).change();
          $("#passport").val(response[0].passport);
          $("#country").val(response[0].country).change();
          $("#religion").val(response[0].religion);
        },
        error: function () {
          Swal.fire({
            title: "Error!",
            text: "Something is wrong!",
            icon: "error",
          });
        },
      });
    }

    $("#refreshbutton").click(function (event) {
      event.preventDefault();
      getuserdata();
    });
    $("#updatebutton").click(function (event) {
      event.preventDefault();
      if (
        $("#email").val().trim() === "" ||
        $("#phone_number").val().trim() === "" ||
        $("#first_name").val().trim() === "" ||
        $("#last_name").val().trim() === "" ||
        $("#nid").val().trim() === "" ||
        $("#dob").val().trim() === "" ||
        $("#gender").val().trim() === "" ||
        $("#marital_status").val().trim() === "" ||
        $("#passport").val().trim() === "" ||
        $("#country").val().trim() === "" ||
        $("#religion").val().trim() === ""
      ) {
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "warning",
        });
      } else {
        $.ajax({
          url: "./api/updateuser.php",
          type: "POST",
          data: {
            email: $("#email").val(),
            phone_number: $("#phone_number").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            nid: $("#nid").val(),
            dob: $("#dob").val(), // Correct the id if needed
            gender: $("#gender").val(),
            marital_status: $("#marital_status").val(),
            passport: $("#passport").val(),
            country: $("#country").val(),
            religion: $("#religion").val(),
          },
          success: function (response) {
            console.log(response);
            if (response == "success") {
              Swal.fire({
                title: "Updated!",
                text: "Your data updated successfully!",
                icon: "success",
              });
            } else {
              Swal.fire({
                title: "Invalid!",
                text: "Cannot update your data!",
                icon: "error",
              });
            }
          },
          error: function (error) {
            // Handle the error here
            Swal.fire({
              title: "Error!",
              text: "Something is wrong!",
              icon: "error",
            });
          },
        });
      }
    });

    //update password for error message
    $("#new_password").on("keyup", function () {
      var password = $(this).val();
      if (password != "") {
        if (
          password.length < 8 ||
          !/[A-Z]/.test(password) ||
          !/[a-z]/.test(password) ||
          !/[^A-Za-z0-9]/.test(password)
        ) {
          $("#np_error").text(
            "Must contain a uppercase, lowercase, number and a special character.Minimum 8 characters."
          );
          $("#password").addClass("border-danger");
        } else {
          $("#np_error").text("");
          $("#password").removeClass("border-danger");
        }
      } else {
        $("#np_error").text("");
        $("#password").removeClass("border-danger");
      }
    });
    $("#new_password").on("keyup", function () {
      equlpass_cp();
    });
    $("#con_new_password").on("keyup", function () {
      equlpass_cp();
    });
    function equlpass_cp() {
      var password = $("#new_password").val();
      var con_password = $("#con_new_password").val();
      if (password != con_password) {
        $("#cnp_error").text("Must be equal with Password field.");
        $("#con_new_password").addClass("border-danger");
        $("#new_password").addClass("border-danger");
      } else {
        $("#cnp_error").text("");
        $("#con_new_password").removeClass("border-danger");
        $("#new_password").removeClass("border-danger");
      }
    }

    //upadate password FOR AJAX CALL
    $("#updatepassword").click(function (event) {
      event.preventDefault();
      var newpss = $("#new_password").val();
      var connewpss = $("#con_new_password").val();
      if (
        $("#current_password").val().trim() != "" &&
        newpss.trim() != "" &&
        connewpss.trim() != ""
      ) {
        if (
          newpss.length >= 8 &&
          /[A-Z]/.test(newpss) &&
          /[a-z]/.test(newpss) &&
          /\d/.test(newpss) &&
          /[^\w\d\s]/.test(newpss)
        ) {
          if (newpss === connewpss) {
            $.ajax({
              url: "./api/changepassword.php",
              type: "POST",
              data: {
                current_password: $("#current_password").val(),
                new_password: $("#new_password").val(),
                confirm_password: $("#con_new_password").val(),
              },
              success: function (response) {
                console.log(response);
                if (response === "success") {
                  $("#current_password").val("");
                  $("#new_password").val("");
                  $("#con_new_password").val("");
                  Swal.fire({
                    title: "Password Updated!",
                    text: "Your password has been updated successfully!",
                    icon: "success",
                  });
                } else if (response === "oldpassword") {
                  Swal.fire({
                    title: "Old password!",
                    text: "Cannot use your old password.",
                    icon: "error",
                  });
                } else if (response === "incorrect_password") {
                  Swal.fire({
                    title: "Incorrect password!",
                    text: "Current password was incorrect!",
                    icon: "error",
                  });
                } else {
                  Swal.fire({
                    title: "Invalid!",
                    text: "Cannot update your password.",
                    icon: "error",
                  });
                }
              },
              error: function () {
                Swal.fire({
                  title: "Error!",
                  text: "Something is wrong!",
                  icon: "error",
                });
              },
            });
          }
        }
      } else {
        Swal.fire({
          title: "Empty!",
          text: "All password fields are required!",
          icon: "warning",
        });
      }
    });

    $("#cp_password-toggle").click(function () {
      togglePasswordVisibility("current_password");
    });
    $("#np_password-toggle").click(function () {
      togglePasswordVisibility("new_password");
    });
    $("#cnp_password-toggle").click(function () {
      togglePasswordVisibility("con_new_password");
    });
    function togglePasswordVisibility(inputId) {
      var passwordInput = $("#" + inputId);

      var type = passwordInput.attr("type");
      if (type === "password") {
        passwordInput.attr("type", "text");
      } else {
        passwordInput.attr("type", "password");
      }
    }

    //delete account
    $("#deleteaccount").click(function () {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "./profile/delete.php";
        }
      });
    });

    //upload gallery images from user
    $("#submitgallery").click(function (event) {
      event.preventDefault();
      if (
        $("#gallery_image").val().trim() === "" ||
        $("#gallery_caption").val().trim() === "") {
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "warning",
        });
      } else {
        var formData = new FormData($('#gallery_upload')[0]);

        $.ajax({
          url: './api/uploadgallery.php',
          method: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            $("#gallery_image").val("");
            $("#gallery_caption").val("");
            // console.log(response);
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Your images have been saved',
              showConfirmButton: false,
              timer: 1500
            });
            fetchData();
          },
          error: function (error) {
            // console.log(error);
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
            });
          }
        });
      }
    });
    // Function to fetch data using AJAX
    // function fetchData(table, column, value) {
    // $.ajax({
    //   url: 'api/getallincondition.php',  // Replace with the correct PHP file path
    //   method: 'GET',
    //   data: {
    //     table: table,
    //     column: column,
    //     value: value
    //   },
    //   success: function (response) {
    //     // Handle success response
    //     response = JSON.parse(response)
    //     console.log(response);
    //     var imageElement = '';
    //     $.each(response, function (index, value) {
    //       var imageUrl = value.image_url;
    //       imageElement += '<div class="col-md-4"><a href="' + imageUrl + '" class="img-gal"><div class="single-gallery-image" style="background: url(' + imageUrl + ');"></div></a></div>';
    //     })
    //     $('#gallery-items').empty();
    //     $('#gallery-items').append(imageElement);
    //     initMagnificPopup();
    //   },
    //   error: function (error) {
    //     // Handle error response
    //     console.log(error);
    //   }
    // });
    // }

    fetchData();
    function fetchData(page) {
      $.ajax({
        url: 'api/getmyupload.php',
        method: 'GET',
        data: {
          table: 'gallery',
          column: 'user_id',
          columnvalue: $('#getuserid').val(),
          page: page
        },
        success: function (response) {
          response = JSON.parse(response);

          var data = response.data;
          var paging = response.paging;

          $('#gallery-items').empty().append(data);
          $('.pagination').empty().append(paging);
          initMagnificPopup();



        },
        error: function (error) {
          console.log(error);
        }
      });

    }
    $(document).on('click', '.pagination_link', function () {
      var page = $(this).attr("id");
      fetchData(page);
    });

    // Call the function with your specific parameters
    var table = 'gallery';
    var column = 'user_id';
    var value = $('#getuserid').val();  // Replace with the actual user_id

    fetchData(table, column, value);
    function initMagnificPopup() {
      $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
          enabled: true
        }
      });

      $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
    }

  }

});
$(document).ready(function () {
  if ($("#page_gallery").length > 0) {
    fetchData();
    function fetchData(page) {
      $.ajax({
        url: 'api/getgallery.php',
        method: 'GET',
        data: {
          table: 'gallery',
          column: 'user_id',
          page: page
        },
        success: function (response) {
          response = JSON.parse(response);

          var data = response.data;
          var paging = response.paging;

          $('#gallery-items').empty().append(data);
          $('.pagination').empty().append(paging);
          initMagnificPopup();



        },
        error: function (error) {
          console.log(error);
        }
      });

    }
    $(document).on('click', '.pagination_link', function () {
      var page = $(this).attr("id");
      fetchData(page);
    });

    // Call the function with your specific parameters
    var table = 'gallery';
    var column = 'user_id';
    var value = $('#getuserid').val();  // Replace with the actual user_id

    fetchData(table, column, value);
    function initMagnificPopup() {
      $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
          enabled: true
        }
      });

      $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
    }
  }
});

//profile page end
//reset pass
$(document).ready(function () {
  if ($("#page_reset_pass").length > 0) {
    $('input[name="rp_email"]').on("keyup", function () {
      var email = $(this).val();
      $.ajax({
        url: "./api/check_email.php",
        type: "POST",
        data: {
          email: email,
        },
        success: function (response) {
          if (response === "exists") {
            $("#rp_email_error").text("");
            $("#rp_email").removeClass("border-danger");
          } else {
            $("#rp_email_error").text("Email not registered!");
            $("#rp_email").addClass("border-danger");
          }
        },
      });
    });

    $("form").submit(function (event) {
      if ($("#rp_email_error").text() !== "") {
        event.preventDefault(); //
      }
    });
  }
});

//confirm reset pass
$(document).ready(function () {
  if ($("#page_confirm_reset_pass").length > 0) {
    $("#reset_pass").on("keyup", function () {
      var password = $(this).val();
      if (password != "") {
        if (
          password.length < 8 ||
          !/[A-Z]/.test(password) ||
          !/[a-z]/.test(password) ||
          !/\d/.test(password) ||
          !/[!@#$%^&*(),.?":{}|_<>]/.test(password)
        ) {
          $("#rp_pass_error").text(
            "Must contain a uppercase, lowercase, number and a special character.Minimum 8 characters."
          );
          $("#reset_pass").addClass("border-danger");
        } else {
          $("#rp_pass_error").text("");
          $("#reset_pass").removeClass("border-danger");
        }
      } else {
        $("#rp_pass_error").text("");
        $("#reset_pass").removeClass("border-danger");
      }
    });

    $('input[name="reset_pass"]').on("keyup", function () { });

    $('input[name="confirm_reset_pass"]').on("keyup", function () {
      erro();
    });

    function erro() {
      var password = $('input[name="reset_pass"]').val();
      var con_password = $('input[name="confirm_reset_pass"]').val();

      if (con_password.trim() === "") {
        // If confirm_reset_pass is empty, remove the error message and border color
        $("#rp_conpass_error").text("");
        $("#confirm_reset_pass").removeClass("border-danger");
        $("#reset_pass").removeClass("border-danger");
      } else if (password !== con_password) {
        // If passwords do not match, show error message and add border color
        $("#rp_conpass_error").text("Must be equal with Password field.");
        $("#confirm_reset_pass").addClass("border-danger");
        $("#reset_pass").addClass("border-danger");
      } else {
        // If passwords match, remove the error message and border color
        $("#rp_conpass_error").text("");
        $("#confirm_reset_pass").removeClass("border-danger");
        $("#reset_pass").removeClass("border-danger");
      }
    }

    $("form").submit(function (event) {
      if (
        $("#rp_pass_error").text() !== "" ||
        $("#rp_conpass_error").text() !== ""
      ) {
        event.preventDefault();
      }
    });

    //password view
    // Toggle password visibility
    $("#rp_pass_toggle").click(function () {
      togglePasswordVisibility("reset_pass");
    });
    $("#rp_conpass_toggle").click(function () {
      togglePasswordVisibility("confirm_reset_pass");
    });
    function togglePasswordVisibility(inputId) {
      var passwordInput = $("#" + inputId);
      var type = passwordInput.attr("type");
      if (type === "password") {
        passwordInput.attr("type", "text");
      } else {
        passwordInput.attr("type", "password");
      }
    }
  }
});

$(document).ready(function () {
  if ($("#page_hotel_search").length > 0) {
    $("#hotel_place_select").select2({
      // minimumResultsForSearch: Infinity,
    });

    $.ajax({
      url: 'api/hotels/droplocation.php',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        $('#hotel_place_select').empty();
        $('#hotel_place_select').append('<option disabled selected>Select Place</option>');
        // console.log(data);
        var seenLocations = {};
        // Iterate through the array and append options
        $.each(data, function (index, location) {
          if (!seenLocations[location.location]) {
            $('#hotel_place_select').append('<option value="' + location.location + '">' + location.location + '</option>');
            seenLocations[location.location] = true;
          }
        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    // $('form').submit(function (event) {
    //   event.preventDefault();

    //   // Collect form data
    //   var formData = {
    //     place: $('#hotel_place_select').val(),
    //     checkInDate: $('[name="Check-in-date"]').val(),
    //     checkOutDate: $('[name="Check-out-date"]').val(),
    //     adults: $('[name="adults"]').val()
    //   };

    //   // Send AJAX request
    //   $.ajax({
    //     url: 'api/hotels/searchhotels.php',
    //     type: 'GET',
    //     data: formData,
    //     dataType: 'json',
    //     success: function (response) {
    //       // Assuming you have a container div to append the hotel cards
    //       var container = $('#card_container');
    //       container.empty(); // Clear existing content

    //       $.each(response, function (index, hotel) {
    //         // Create the HTML structure for a hotel card
    //         console.log(hotel);
    //         var hotelCard = `
    //     <div class="card border shadow-soft mb-2">
    //         <div class="row">
    //             <div class="img-col col-sm-12 col-xl-4 col-md-4 p-0">
    //                 <div class="card_image ">
    //                     <div id="CarouselTest" class="carousel slide" data-ride="carousel">
    //                         <!-- Carousel Indicators and Inner -->
    //                         <ol class="carousel-indicators">
    //                             <!-- Indicators should be added dynamically based on the number of images -->
    //                             ${hotel.images.map((image, i) => `<li data-target="#CarouselTest" data-slide-to="${i}" ${i === 0 ? 'class="active"' : ''}></li>`).join('')}
    //                         </ol>
    //                         <div class="carousel-inner">
    //                             <!-- Carousel Items should be added dynamically based on the number of images -->
    //                             ${hotel.images.map((image, i) => `<div class="carousel-item ${i === 0 ? 'active' : ''}">
    //                                 <img class="d-block w-100" src="${image.image_url}" alt="">
    //                             </div>`).join('')}
    //                         </div>
    //                     </div>
    //                     <!-- Carousel Controls -->
    //                     <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
    //                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    //                         <span class="sr-only">Previous</span>
    //                     </a>
    //                     <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
    //                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
    //                         <span class="sr-only">Next</span>
    //                     </a>
    //                 </div>
    //             </div>
    //             <div class="col-sm-12 col-xl-8 col-md-8 p-0">
    //                 <div class="row link h-100">
    //                     <div class="col-9 py-3">
    //                         <div class="py-2 text-left">
    //                             <h3>${hotel.hotel_name}</h3>
    //                         </div>
    //                         <div class="py-1">
    //                             <h4 class="p-0 m-0"><span class="border p-1 badge"><i class="fa fa-star text-primary mr-1"
    //                                 aria-hidden="true"></i>${hotel.star} star</span> <span class="border p-1 badge"><i
    //                                 class="fa fa-map-marker text-primary mr-1"
    //                                 aria-hidden="true"></i>${hotel.address}</span></h4>
    //                         </div>
    //                         <div class="py-1" id="facility">
    //                             <!-- Check if facilities exist before mapping -->
    //                             ${hotel.facilities
    //             ? hotel.facilities.split(',').map(facility => `<span class="badge badge-info mr-1">${facility}</span>`).join('')
    //             : 'No facilities available'}
    //                         </div>
    //                         <div class="py-4">
    //                             <p>${hotel.description}</p>
    //                         </div>
    //                     </div>
    //                     <a href="" class="col-3 pr-3 d-flex align-items-center border-left">
    //                         <div class="p-0 w-100 text-right">
    //                             <p class="p-0 m-0 text-gray">From</p>
    //                             <p class="p-0 m-0 "><span class=" text-danger relative start_price">${taka} ${hotel.low_price[index].price_per_night}</span></p>
    //                             <h5><span class="badge badge-success">${hotel.low_price[index].discount}% OFF</span></h5>
    //                             <h5 class="mb-2 mt-1">${taka} ${(hotel.low_price[index].price_per_night - ((hotel.low_price[index].discount * hotel.low_price[index].price_per_night) / 100))}</h5>
    //                         </div>
    //                     </a>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>`;

    //         container.append(hotelCard);
    //       });
    //     },

    //     error: function () {
    //       console.log('Error in AJAX request');
    //     }
    //   });
    // });


    // Function to handle AJAX request
    $('form').submit(function (event) {
      event.preventDefault();
      function updateHotelResults() {
        // Collect form data
        var formData = {
          place: $('#hotel_place_select').val(),
          checkInDate: $('[name="Check-in-date"]').val(),
          checkOutDate: $('[name="Check-out-date"]').val(),
          adults: $('[name="adults"]').val(),
          totalRoom: $('[name="total-room"]').val()
        };
        // Get selected star ratings
        var selectedStarRatings = $('input[name="hotel_rating[]"]:checked').map(function () {
          return parseInt(this.value); // Convert the value to integer
        }).get();

        // Add selected star ratings to form data
        formData['hotelRating'] = selectedStarRatings;

        // Add "Popularity" filter
        var selectedPopularity = $('input[name="popularity"]:checked').val();
        var selectedPriceOrder = $('input[name="price_order"]:checked').val();

        // Sort hotels based on popularity
        if (selectedPopularity === 'high') {
          response.sort((a, b) => b.popularity - a.popularity);
        } else if (selectedPopularity === 'low') {
          response.sort((a, b) => a.popularity - b.popularity);
        }

        // Sort hotels based on price order
        if (selectedPriceOrder === 'h2l') {
          response.sort((a, b) => b.low_price[0].price_per_night - a.low_price[0].price_per_night);
        } else if (selectedPriceOrder === 'l2h') {
          response.sort((a, b) => a.low_price[0].price_per_night - b.low_price[0].price_per_night);
        }

        // Send AJAX request
        $.ajax({
          url: 'api/hotels/searchhotels.php',
          type: 'GET',
          data: formData,
          dataType: 'json',
          success: function (response) {
            // Assuming you have a container div to append the hotel cards
            var container = $('#card_container');
            container.empty(); // Clear existing content

            // Get selected star ratings
            var selectedStarRatings = $('input[name="hotel_rating[]"]:checked').map(function () {
              return parseInt(this.value); // Convert the value to integer
            }).get();

            // Iterate through each hotel in the response
            $.each(response, function (index, hotel) {
              // Check if the hotel's star rating is among the selected ratings
              if (selectedStarRatings.length === 0 || selectedStarRatings.includes(hotel.star)) {
                // Create the HTML structure for a hotel card
                var hotelCard = `
        <div class="card border shadow-soft mb-2">
            <div class="row">
                <div class="img-col col-sm-12 col-xl-4 col-md-4 p-0">
                    <div class="card_images">
                        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                            <!-- Carousel Indicators and Inner -->
                            <ol class="carousel-indicators">
                                <!-- Indicators should be added dynamically based on the number of images -->
                                ${hotel.images.map((image, i) => `<li data-target="#CarouselTest" data-slide-to="${i}" ${i === 0 ? 'class="active"' : ''}></li>`).join('')}
                            </ol>
                            <div class="carousel-inner">
                                <!-- Carousel Items should be added dynamically based on the number of images -->
                                ${hotel.images.map((image, i) => `<div class="carousel-item ${i === 0 ? 'active' : ''}">
                                    <img class="d-block w-100" src="${image.image_url}" alt="">
                                </div>`).join('')}
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        
                    </div>
                </div>
                <div class="col-sm-12 col-xl-8 col-md-8 p-0">
                    <div class="row link h-100">
                        <div class="col-9">
                            <div class="py-2 text-left">
                                <h3>${hotel.hotel_name} </h3>
                            </div>
                            <div class="py-1">
                                <h4 class="p-0 m-0"><span class="border p-1 badge"><i class="fa fa-star text-primary mr-1"
                                    aria-hidden="true"></i>${hotel.star} star</span> <span class="border p-1 badge"><i
                                    class="fa fa-map-marker text-primary mr-1"
                                    aria-hidden="true"></i>${hotel.address}</span></h4>
                            </div>
                            <div class="py-1" id="facility">
                                <!-- Check if facilities exist before mapping -->
                                ${hotel.facilities
                    ? hotel.facilities.split(',').map(facility => `<span class="badge badge-info mr-1">${facility}</span>`).join('')
                    : 'No facilities available'}
                            </div>
                            <div class="py-4">
                                <p>${hotel.description}</p>
                            </div>
                        </div>
                        <a href="rooms.php" class="col-3 pr-3 d-flex align-items-center border-left">
                            <div class="p-0 w-100 text-right">
                                <p class="p-0 m-0 text-gray">From</p>
                                <p class="p-0 m-0 "><span class=" text-danger relative start_price">${taka} ${hotel.low_price[index].price_per_night}</span></p>
                                <h5><span class="badge badge-success">${hotel.low_price[index].discount}% OFF</span></h5>
                                <h5 class="mb-2 mt-1">${taka} ${(hotel.low_price[index].price_per_night - ((hotel.low_price[index].discount * hotel.low_price[index].price_per_night) / 100))}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                </div>`;
                container.append(hotelCard).find('.card:last').attr('data-hotel-id', hotel.hotel_id);

                // Update the link's href to include parameters
                var roomLink = container.find('.card:last').find('a'); // Assuming the link is a child of the last card
                var roomLinkHref = 'rooms.php?hotelId=' + hotel.hotel_id +
                  '&checkInDate=' + $('[name="Check-in-date"]').val() +
                  '&checkOutDate=' + $('[name="Check-out-date"]').val() + '&totalRoom=' + $('[name="total-room"]').val() +
                  '&adults=' + $('[name="adults"]').val();
                roomLink.attr('href', roomLinkHref);
              }
            });
          },
          error: function () {
            console.log('Error in AJAX request');
          }
        });
      }

      // Handle checkbox change event
      $('input[name="hotel_rating[]"], input[name="popularity"], input[name="price_order"]').change(function () {
        updateHotelResults();
      });

      // Initial AJAX request when the page loads
      updateHotelResults();

    })

  }
});

$(document).ready(function () {
  if ($("#page_hotel_rooms").length > 0) {
    // Function to get query parameters from URL
    // function getQueryParam(name) {
    //   const urlParams = new URLSearchParams(window.location.search);
    //   return urlParams.get(name);
    // }

    // // Retrieve parameters from URL
    // const hotelId = getQueryParam('hotelId');
    // const checkInDate = getQueryParam('checkInDate');
    // const checkOutDate = getQueryParam('checkOutDate');
    // const adults = getQueryParam('adults');

    // // Use these parameters in your new AJAX request
    // // Example:
    // $.ajax({
    //   url: 'api/hotels/roomdetails.php',
    //   type: 'GET',
    //   data: {
    //     hotelId: hotelId,
    //     checkInDate: checkInDate,
    //     checkOutDate: checkOutDate,
    //     adults: adults,
    //   },
    //   dataType: 'json',
    //   success: function (response) {

    //     //for hotels 
    //     $('#hotel_images').html(`<div id="CarouselTest" class="carousel slide" data-ride="carousel">
    //     <!-- Carousel Indicators and Inner -->
    //     <ol class="carousel-indicators">
    //         <!-- Indicators should be added dynamically based on the number of images -->
    //         ${response.hotel[0].images.map((image, i) => `<li data-target="#CarouselTest" data-slide-to="${i}" ${i === 0 ? 'class="active"' : ''}></li>`).join('')}
    //     </ol>
    //     <div class="carousel-inner">
    //         <!-- Carousel Items should be added dynamically based on the number of images -->
    //         ${response.hotel[0].images.map((image, i) => `<div class="carousel-item ${i === 0 ? 'active' : ''}">
    //             <img class="d-block w-100" src="${image.image_url}" alt="">
    //         </div>`).join('')}
    //     </div>
    // </div>
    // <!-- Carousel Controls -->
    // <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
    //     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    //     <span class="sr-only">Previous</span>
    // </a>
    // <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
    //     <span class="carousel-control-next-icon" aria-hidden="true"></span>
    //     <span class="sr-only">Next</span>
    // </a>`);
    //     $('#hotel_name').text(response.hotel[0].hotel_name);
    //     $('#star_address').html(`<span class="border p-1 badge"><i
    //     class="fa fa-star text-primary mr-1" aria-hidden="true"></i>${response.hotel[0].star} star</span> <span
    // class="border p-1 badge"><i class="fa fa-map-marker text-primary mr-1"
    //     aria-hidden="true"></i>${response.hotel[0].address}</span>`);
    //     $('#other_details').text(response.hotel[0].other_details);
    //     $('#facilities').html(`${response.hotel[0].facilities
    //       ? response.hotel[0].facilities.split(',').map(facilities => `<span class="badge badge-info mr-1">${facilities}</span>`).join('')
    //       : 'No facilities available'}`);
    //     $('#show_on_map').html(`<a href="${response.hotel[0].maps_link}"  class="genric-btn primary small">Show on Map</a>`);

    //     // for rooms 
    //     var container = $('#card_container');
    //     container.empty();
    //     $.each(response.rooms, function (index, room) {
    //       var roomcard = `<div class="card border shadow-soft mb-2">
    //     <div class="row">
    //         <div class="img-col col-sm-12 col-xl-4 col-md-4 p-0">
    //             <div class="card_img_room">
    //                 <div class="carousel-item active">
    //                     <img class="d-block w-100" src="${room.image_url}" alt="">
    //                 </div>

    //             </div>
    //         </div>
    //         <div class="col-sm-12 col-xl-8 col-md-8 p-0">
    //             <div class="row link h-100">
    //                 <div class="col-9">
    //                     <div class="py-2 text-left">
    //                         <h3>${room.room_type}</h3>
    //                     </div>
    //                     <div class="py-1">
    //                         <h4 class="p-0 m-0"><span class="border p-1 badge"><i class="fa fa-bed text-primary mr-1" aria-hidden="true"></i>${room.bed_type}</span> <span
    //                                 class="border p-1 badge"><i class="fa fa-info-circle text-primary mr-1" aria-hidden="true"></i>${room.available_rooms} rooms available</span></h4>
    //                     </div>
    //                     <div class="py-1" id="facility">
    //                             <!-- Check if facilities exist before mapping -->
    //                             ${room.facility
    //           ? room.facility.split(',').map(facility => `<span class="badge badge-info mr-1">${facility}</span>`).join('')
    //           : 'No facilities available'}
    //                         </div>
    //                     <div class="py-3">
    //                         <ul>
    //                             <li>${room.breakfast === 0 ? '<i class="fa fa-ban text-primary mr-1" aria-hidden="true"></i> No Breakfast' : '<i class="fa fa-check-circle text-primary mr-1" aria-hidden="true"></i> Breakfast'}</li>
    //                             <li>${room.smoking === 0 ? '<i class="fa fa-ban text-primary mr-1" aria-hidden="true"></i> No Smoking' : '<i class="fa fa-check-circle text-primary mr-1" aria-hidden="true"></i> Smoking'}</li>
    //                         </ul>
    //                     </div>
    //                 </div>
    //                 <div href="" class="col-3 p-3 d-flex align-items-center border-left">
    //                     <div class="p-1 w-100 text-right">
    //                         <p class="p-0 m-0 text-gray">From</p>
    //                         <p class="p-0 m-0 "><span class=" text-danger relative start_price">BDT
    //                         ${room.price_per_night}</span></p>
    //                         <h5><span class="badge badge-success">${room.discount}% OFF</span></h5>
    //                         <h5 class="mb-2 mt-1">${taka} ${(room.price_per_night - ((room.discount * room.price_per_night) / 100))}</h5>
    //                         <button class="genric-btn primary small w-100 add-room-btn">Add</button>
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    // </div>`;
    //       container.append(roomcard);
    //     })

    //   },
    //   error: function () {
    //     // console.log('Error in AJAX request');
    //   }
    // });
    // $('#card_container').on('click', '.add-room-btn', function () {
    //   // Get room details from the clicked button's parent container
    //   var roomContainer = $(this).closest('.card');
    //   var roomPrice = roomContainer.find('.start_price').text().trim(); // Assuming start_price contains the price
    //   var roomDiscount = roomContainer.find('.badge-success').text().trim(); // Assuming badge-success contains the discount
    //   var roomTotal = roomContainer.find('.mb-2:last').text().trim(); // Assuming the last h5 contains the total

    //   // Append a new row to the summary
    //   $('#sticky .p-0.m-0:last').after(`
    //       <div class="row border p-0 m-0">
    //           <div class="col-3 p-0">
    //               <div class="p-2 text-left">
    //                   <p class="p-0 m-0">Price:</p>
    //                   <p class="p-0 m-0">Discount</p>
    //                   <h5 class="mb-2">Total</h5>
    //               </div>
    //           </div>
    //           <div class="col-9 p-0">
    //               <div class="p-2 text-right">
    //                   <p class="p-0 m-0">${roomPrice}</p>
    //                   <label><span class="badge badge-primary w-100">${roomDiscount}</span></label>
    //                   <h6 class="mb-2">${roomTotal}</h6>
    //               </div>
    //           </div>
    //       </div>
    //   `);

    //   // Recalculate the total and update the final total section
    //   updateTotal();
    // });

    // // Function to update the final total section
    // function updateTotal() {
    //   var total = 0;
    //   $('#sticky .mb-2:last').prevAll('.border').each(function () {
    //     var totalPrice = $(this).find('.mb-2').text().trim().split('=')[1];
    //     total += parseFloat(totalPrice);
    //   });

    //   $('#sticky .mb-2.text-center').text(`${total.toFixed(2)} tk`);
    // }




    $(document).ready(function () {
      if ($("#page_hotel_rooms").length > 0) {
        // Function to get query parameters from URL
        function getQueryParam(name) {
          const urlParams = new URLSearchParams(window.location.search);
          return urlParams.get(name);
        }

        // Retrieve parameters from URL
        const hotelId = getQueryParam('hotelId');
        const checkInDate = new Date(getQueryParam('checkInDate'));
        const checkOutDate = new Date(getQueryParam('checkOutDate'));
        const totalRoom = getQueryParam('totalRoom');
        const adults = getQueryParam('adults');

        const totalDays = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));

        // Use these parameters in your new AJAX request
        // Example:
        $.ajax({
          url: 'api/hotels/roomdetails.php',
          type: 'GET',
          data: {
            hotelId: hotelId,
            checkInDate: checkInDate.toISOString(),
            checkOutDate: checkOutDate.toISOString(),
            totalRoom: totalRoom,
            adults: adults,
          },
          dataType: 'json',
          success: function (response) {
            //for hotels 
            $('#hotel_images').html(`<div id="CarouselTest" class="carousel slide" data-ride="carousel">
        <!-- Carousel Indicators and Inner -->
        <ol class="carousel-indicators">
            <!-- Indicators should be added dynamically based on the number of images -->
            ${response.hotel[0].images.map((image, i) => `<li data-target="#CarouselTest" data-slide-to="${i}" ${i === 0 ? 'class="active"' : ''}></li>`).join('')}
        </ol>
        <div class="carousel-inner">
            <!-- Carousel Items should be added dynamically based on the number of images -->
            ${response.hotel[0].images.map((image, i) => `<div class="carousel-item ${i === 0 ? 'active' : ''}">
                <img class="d-block w-100" src="${image.image_url}" alt="">
            </div>`).join('')}
        </div>
    </div>
    <!-- Carousel Controls -->
    <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>`);
            $('#hotel_name').text(response.hotel[0].hotel_name);
            $('#star_address').html(`<span class="border p-1 badge"><i
        class="fa fa-star text-primary mr-1" aria-hidden="true"></i>${response.hotel[0].star} star</span> <span
    class="border p-1 badge"><i class="fa fa-map-marker text-primary mr-1"
        aria-hidden="true"></i>${response.hotel[0].address}</span>`);
            $('#other_details').text(response.hotel[0].other_details);
            $('#facilities').html(`${response.hotel[0].facilities
              ? response.hotel[0].facilities.split(',').map(facilities => `<span class="badge badge-info mr-1">${facilities}</span>`).join('')
              : 'No facilities available'}`);
            $('#show_on_map').html(`<a href="${response.hotel[0].maps_link}"  class="genric-btn primary small">Show on Map</a>`);

            // for rooms 
            var container = $('#card_container');
            container.empty();
            $.each(response.rooms, function (index, room) {
              var roomcard = `<div class="card border shadow-soft mb-2">
        <div class="row">
            <div class="img-col col-sm-12 col-xl-4 col-md-4 p-0">
                <div class="card_img_room">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="${room.image_url}" alt="">
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-xl-8 col-md-8 p-0">
                <div class="row link h-100">
                    <div class="col-8">
                        <div class="py-2 text-left">
                            <h3 id="room_type">${room.room_type}</h3>
                        </div>
                        <div class="py-1">
                            <h4 class="p-0 m-0"><span class="border p-1 badge"><i class="fa fa-bed text-primary mr-1" aria-hidden="true"></i>${room.bed_type}</span> <span
                                    class="border p-1 badge"><i class="fa fa-info-circle text-primary mr-1 avroom" aria-hidden="true"></i>${room.available_rooms} rooms available</span></h4>
                        </div>
                        <div class="py-1" id="facility">
                                <!-- Check if facilities exist before mapping -->
                                ${room.facility
                  ? room.facility.split(',').map(facility => `<span class="badge badge-info mr-1">${facility}</span>`).join('')
                  : 'No facilities available'}
                            </div>
                        <div class="py-3">
                            <ul>
                                <li>${room.breakfast === 0 ? '<i class="fa fa-ban text-primary mr-1" aria-hidden="true"></i> No Breakfast' : '<i class="fa fa-check-circle text-primary mr-1" aria-hidden="true"></i> Breakfast'}</li>
                                <li>${room.smoking === 0 ? '<i class="fa fa-ban text-primary mr-1" aria-hidden="true"></i> No Smoking' : '<i class="fa fa-check-circle text-primary mr-1" aria-hidden="true"></i> Smoking'}</li>
                            </ul>
                        </div>
                    </div>
                    <div href="" class="col-4 p-3 d-flex align-items-center border-left">
                        <div class="p-1 w-100 text-right">
                            <small class="p-0 m-0 text-gray">For ${totalDays} days, ${totalRoom} rooms</small>
                            <p class="p-0 m-0 "><small class=" text-success">${taka}
                            ${room.price_per_night}/Night</small></p>
                            <h5><span class="badge badge-success">${room.discount}% OFF</span></h5>
                            <h5 class="mb-2 mt-1">${taka}<span id="disc_price"> ${((room.price_per_night - ((room.discount * room.price_per_night) / 100)) * totalDays * totalRoom)}</span></h5>
                            <button class="genric-btn primary small w-75 add-room-btn" style="padding:0">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
              container.append(roomcard);
            })

            // // Add click event listener to "Add" buttons
            // $('#card_container').on('click', '.add-room-btn', function () {
            //   // Get room details from the clicked button's parent container
            //   var roomContainer = $(this).closest('.card');
            //   var roomPrice = roomContainer.find('#disc_price').text().trim();
            //   var room = 1;// Assuming 
            //   var roomTotal;
            //   $('#summary').on('click', '.plus-icon', function () {
            //     var roomElement = $(this).siblings('.room-count');
            //     var room = parseInt(roomElement.text());
            //     var roomAvailable = 5; // Replace with your actual available room count
            //     if (roomAvailable >= room) {
            //       // roomElement.text(room + 1);
            //       updateTotal(roomElement.text(room + 1));
            //     }
            //   });

            //   $('#summary').on('click', '.minus-icon', function () {
            //     var roomElement = $(this).siblings('.room-count');
            //     var room = parseInt(roomElement.text());
            //     // Ensure count does not go below 1
            //     if (room > 1) {
            //       // roomElement.text(room - 1);
            //       updateTotal(roomElement.text(room - 1));
            //     }
            //   });
            //   updateTotal(room);

            //   function updateTotal(room) {
            //     roomTotal = (roomPrice * room * totalDays);
            //   };
            //   // Append a new row to the summary
            //   // $('#summary:last').append(`
            //   // <div class="border p-1 m-0">
            //   // <div class="row p-0 m-0">
            //   //     <div class="col-3 p-0 text-left">Price:</div>
            //   //     <div class="col-9 p-0 text-right"><span
            //   //             class=" text-danger relative start_price">${taka}${roomPrice}</span></div>
            //   // </div>
            //   // <h5 class="row p-0 m-0">
            //   //     <div class="col-3 p-0 text-left">Discount:</div>
            //   //     <div class="col-9 p-0 text-right"><span class="badge badge-success">${roomDiscount}</span>
            //   //     </div>
            //   // </h5>
            //   // <div class="row p-0 m-0">
            //   //     <div class="col-3 p-0 text-left">Rooms:</div>
            //   //     <div class="col-9 p-0 text-right">
            //   //         <span class="border p-1 badge plus-icon"><i class="fa fa-plus text-primary" aria-hidden="true"></i></span>
            //   //         <span id="room" class="p-0 m-1">2</span>
            //   //         <span class="border p-1 badge minus-icon"><i class="fa fa-minus text-primary" aria-hidden="true"></i></span>
            //   //     </div>
            //   // </div>
            //   // <h5 class="row p-0 m-0">
            //   //     <div class="col-3 p-0 text-left">Total:</div>
            //   //     <div class="col-9 p-0 text-right">2500</div>
            //   // </h5>
            //   // </div>
            //   //         `);
            //   $('#summary:last').append(`
            //       <div class="border p-1 m-0">
            //           <div class="row p-0 m-0">
            //               <div class="col-3 p-0 text-left">Price:</div>
            //               <div class="col-9 p-0 text-right">${taka} ${roomPrice}</div>
            //           </div>
            //           <div class="row p-0 m-0">
            //               <div class="col-3 p-0 text-left">Rooms:</div>
            //               <div class="col-9 p-0 text-right">
            //                   <span class="border p-1 badge plus-icon">
            //                       <i class="fa fa-plus text-primary" aria-hidden="true"></i>
            //                   </span>
            //                   <span class="room-count p-0 m-1">1</span>
            //                   <span class="border p-1 badge minus-icon">
            //                       <i class="fa fa-minus text-primary" aria-hidden="true"></i>
            //                   </span>
            //               </div>
            //           </div>
            //           <h5 class="row p-0 m-0">
            //               <div class="col-3 p-0 text-left">Total:</div>
            //               <div class="col-9 p-0 text-right">${taka} ${roomTotal}</div>
            //           </h5>
            //       </div>
            //   `);

            var totalPay = 0;

            $('#card_container').on('click', '.add-room-btn', function () {
              var roomContainer = $(this).closest('.card');
              var roomPrice = parseFloat(roomContainer.find('#disc_price').text().trim());
              var roomType = (roomContainer.find('#room_type').text().trim());

              $('.add-room-btn').attr('disabled', true);
              $('.add-room-btn').addClass('disable');
              $('.add-room-btn').removeClass('primary');

              $('#summary:last').append(`
        <div class="border p-1 m-0 cancel_relative bg-gray">
            <div class="cancel"><i class="fa fa-times" aria-hidden="true"></i></div>
            <h6 class="p-2 text-center">${roomType}</h6>
            <h5 class="p-2 m-0 text-center">${taka}${roomPrice}</h5>
        </div>
    `);
              totalPay += roomPrice;
              updatePay();
            });
            $('#summary').on('click', '.fa-times', function () {
              var roomPrice = parseFloat($(this).closest('.border').find('h5').text().trim());

              $(this).closest('.border').remove();
              totalPay -= roomPrice;
              $('.add-room-btn').attr('disabled', false);
              $('.add-room-btn').addClass('primary');
              $('.add-room-btn').removeClass('disable');

              updatePay();
            });

            function updatePay() {
              $('#pay').text(`${totalPay.toFixed(2)} tk`);
            }
          },
          error: function () {
            console.log('Error in AJAX request');
          }
        });
      }
    });


  }
});





