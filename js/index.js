// side bar at services
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
  var page = 1;

  function loadImages() {
    $.ajax({
      url: "postphp/gallerypost.php",
      type: "GET",
      data: { page: page },
      dataType: "json",
      success: function (data) {
        // Handle the received data and update the HTML
        // Assume there is a div with id "imageContainer" to display images
        $("#imageContainer").empty();
        data.forEach(function (image) {
          $("#imageContainer").append(
            '<div class="image-item">' +
            '<img src="' +
            image.image_url +
            '" alt="Image">' +
            "<p>" +
            image.caption +
            "</p>" +
            "</div>"
          );
        });
      },
      error: function () {
        console.error("Error fetching images");
      },
    });
  }

  // Load images on page load
  loadImages();

  // Handle next page button click
  $("#nextPageButton").on("click", function () {
    page++;
    loadImages();
  });

  // Handle previous page button click
  $("#prevPageButton").on("click", function () {
    if (page > 1) {
      page--;
      loadImages();
    }
  });
});
