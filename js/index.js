// side bar at services
var taka = '৳';
var BASE_URL = "<?php echo BASE_URL; ?>";
function getallincondition(table, column, value, callback) {
  $.ajax({
    url: './api/getallincondition.php',
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
function formatDateTime(dateTimeString) {
  const options = {
    day: 'numeric',
    month: 'short',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    hour12: false,
  };

  const formattedDate = new Date(dateTimeString).toLocaleString('en-US', options);
  return formattedDate.replace(',', '');
}


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

const cityOptions = [
  { id: "Dhaka", text: "Dhaka" },
  { id: "Faridpur", text: "Faridpur" },
  { id: "Gazipur", text: "Gazipur" },
  { id: "Gopalganj", text: "Gopalganj" },
  { id: "Jamalpur", text: "Jamalpur" },
  { id: "Kishoreganj", text: "Kishoreganj" },
  { id: "Madaripur", text: "Madaripur" },
  { id: "Manikganj", text: "Manikganj" },
  { id: "Munshiganj", text: "Munshiganj" },
  { id: "Mymensingh", text: "Mymensingh" },
  { id: "Narayanganj", text: "Narayanganj" },
  { id: "Narsingdi", text: "Narsingdi" },
  { id: "Netrokona", text: "Netrokona" },
  { id: "Rajbari", text: "Rajbari" },
  { id: "Shariatpur", text: "Shariatpur" },
  { id: "Sherpur", text: "Sherpur" },
  { id: "Tangail", text: "Tangail" },
  { id: "Bogra", text: "Bogra" },
  { id: "Joypurhat", text: "Joypurhat" },
  { id: "Naogaon", text: "Naogaon" },
  { id: "Natore", text: "Natore" },
  { id: "Nawabganj", text: "Nawabganj" },
  { id: "Pabna", text: "Pabna" },
  { id: "Rajshahi", text: "Rajshahi" },
  { id: "Sirajgonj", text: "Sirajgonj" },
  { id: "Dinajpur", text: "Dinajpur" },
  { id: "Gaibandha", text: "Gaibandha" },
  { id: "Kurigram", text: "Kurigram" },
  { id: "Lalmonirhat", text: "Lalmonirhat" },
  { id: "Nilphamari", text: "Nilphamari" },
  { id: "Panchagarh", text: "Panchagarh" },
  { id: "Rangpur", text: "Rangpur" },
  { id: "Thakurgaon", text: "Thakurgaon" },
  { id: "Barguna", text: "Barguna" },
  { id: "Barisal", text: "Barisal" },
  { id: "Bhola", text: "Bhola" },
  { id: "Jhalokati", text: "Jhalokati" },
  { id: "Patuakhali", text: "Patuakhali" },
  { id: "Pirojpur", text: "Pirojpur" },
  { id: "Bandarban", text: "Bandarban" },
  { id: "Brahmanbaria", text: "Brahmanbaria" },
  { id: "Chandpur", text: "Chandpur" },
  { id: "Chittagong", text: "Chittagong" },
  { id: "Comilla", text: "Comilla" },
  { id: "Cox's Bazar", text: "Cox's Bazar" },
  { id: "Feni", text: "Feni" },
  { id: "Khagrachari", text: "Khagrachari" },
  { id: "Lakshmipur", text: "Lakshmipur" },
  { id: "Noakhali", text: "Noakhali" },
  { id: "Rangamati", text: "Rangamati" },
  { id: "Habiganj", text: "Habiganj" },
  { id: "Maulvibazar", text: "Maulvibazar" },
  { id: "Sunamganj", text: "Sunamganj" },
  { id: "Sylhet", text: "Sylhet" },
  { id: "Bagerhat", text: "Bagerhat" },
  { id: "Chuadanga", text: "Chuadanga" },
  { id: "Jessore", text: "Jessore" },
  { id: "Jhenaidah", text: "Jhenaidah" },
  { id: "Khulna", text: "Khulna" },
  { id: "Kushtia", text: "Kushtia" },
  { id: "Magura", text: "Magura" },
  { id: "Meherpur", text: "Meherpur" },
  { id: "Narail", text: "Narail" },
  { id: "Satkhira", text: "Satkhira" },
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
    $("#review_star").select2({
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
          $("#profile_image").attr("src", response[0].profile_image_url);
          $("#email").val(response[0].email);
          $("#phone_number").val(response[0].phone_number);
          $("#first_name").val(response[0].first_name);
          $("#last_name").val(response[0].last_name);
          $("#full_name").text(response[0].first_name + ' ' + response[0].last_name);
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
    $("#update_review").click(function (event) {
      event.preventDefault();
      if (
        $("#text_review").val().trim() === "" ||
        $("#review_star").val().trim() === "") {
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "warning",
        });
      } else {
        $.ajax({
          url: "./api/updatereview.php",
          type: "POST",
          data: {
            text_review: $("#text_review").val(),
            review_star: $("#review_star").val(),
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
        url: './api/getmyupload.php',
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


    $(".add_profile_img").on("click", function () {
      $("#profile_image_modal").modal("show");
    });

    $("#modal_close").on("click", function () {
      $("#profile_image_modal").modal("hide");
    });
    $("#x_modal_close").on("click", function () {
      $("#profile_image_modal").modal("hide");
    });


    $("#modal_submit").on("click", function () {
      var formData = new FormData($("#profile_pic_upload")[0]);

      // Make AJAX post request
      $.ajax({
        type: "POST",
        url: "./api/uploadprofileimage.php", // Replace with the actual URL to handle the upload
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(response);
          $("#file_profile_image").val("");
          $("#image_preview").attr("src", "");
          $("#profile_image_modal").modal("hide");
          getuserdata();
        },
        error: function (error) {
          console.log("Error:", error);
          // Handle error, e.g., display an error message
        }
      });
    });


    //my booking - flight
    $.ajax({
      url: './api/getbooking.php',
      method: 'GET',
      data: {
        table: 'flight_bookings'
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        $("#flightDataTable").DataTable({
          // scrollX: true,
          info: false,
          lengthChange: false,
          searching: false,
          columnDefs: [{ targets: "_all", className: "border-right" }, { targets: [0], className: "border-left" }, { targets: [0], orderable: false }],
          data: response.data,
          columns: [

            {
              data: null,
              title: "Details",
              width: "3%",
              render: function (data, type, row) {
                var actions =
                  '<a class="text-info" href="reportflight.php?flb_Id=' +
                  row.booking_id +
                  '" target="_blank"><i class="fa fa-download mt-1"  aria-hidden="true"></i></a>';
                return actions;
              },
            },
            { data: "booking_id", title: "Booking ID" },
            {
              data: "booking_date",
              title: "Booking Time",
              render: function (data, type, row) {
                // Assuming data is in the format 'YYYY-MM-DD HH:mm:ss'
                const dateObj = new Date(data);
                const formattedDate = dateObj.toLocaleString('en-US', {
                  day: 'numeric',
                  month: 'short',
                  year: 'numeric',
                  hour: '2-digit',
                  minute: '2-digit',
                  hour12: false,
                });
                return formattedDate.replace(',', '');
              },
            },
            { data: "total_price", title: "Fare" },
            {
              data: "payment_status",
              title: "Status",
              render: function (data, type, row) {
                return data === 'paid'
                  ? '<span class="badge bg-success text-white">Paid</span>'
                  : '<span class="badge bg-danger text-white">Unpaid</span>';
              },
            },
            { data: "transaction_id", title: "Transaction ID" },
          ],
          order: [[2, "desc"]],
          lengthMenu: [5],

        });
      },
      error: function (error) {
        // Handle error response
        console.log(error);
      }
    });


    //my booking - hotel
    $.ajax({
      url: './api/getbooking.php',
      method: 'GET',
      data: {
        table: 'hotel_bookings'
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        $("#hotelDataTable").DataTable({
          // scrollX: true,
          info: false,
          lengthChange: false,
          searching: false,
          columnDefs: [{ targets: "_all", className: "border-right" }, { targets: [0], className: "border-left" }, { targets: [0], orderable: false }],
          data: response.data,
          columns: [

            {
              data: null,
              title: "Details",
              width: "3%",
              render: function (data, type, row) {
                var actions =
                  '<a href="reporthotel.php?hb_Id=' +
                  row.booking_id +
                  '" class="text-info" target="_blank"><i class="fa fa-download mt-1" aria-hidden="true"></i></a>';
                return actions;
              },
            },
            { data: "booking_id", title: "Booking ID" },
            {
              data: "booking_date",
              title: "Booking Time",
              render: function (data, type, row) {
                // Assuming data is in the format 'YYYY-MM-DD HH:mm:ss'
                const dateObj = new Date(data);
                const formattedDate = dateObj.toLocaleString('en-US', {
                  day: 'numeric',
                  month: 'short',
                  year: 'numeric',
                  hour: '2-digit',
                  minute: '2-digit',
                  hour12: false,
                });
                return formattedDate.replace(',', '');
              },
            },
            { data: "total_price", title: "Fare" },
            {
              data: "payment_status",
              title: "Status",
              render: function (data, type, row) {
                return data === 'paid'
                  ? '<span class="badge bg-success text-white">Paid</span>'
                  : '<span class="badge bg-danger text-white">Unpaid</span>';
              },
            },
            { data: "transaction_id", title: "Transaction ID" },
          ],
          order: [[2, "desc"]],
          lengthMenu: [5],

        });
      },
      error: function (error) {
        // Handle error response
        console.log(error);
      }
    });


    //my blog details
    function myblog() {
      $.ajax({
        url: './blog/api/myblog.php',
        method: 'GET',
        data: {
          column: 'user_id',
          value: 'user_id',
        },
        dataType: "json",
        success: function (response) {
          console.log(response);
          $("#myblogDataTable").DataTable({
            info: false,
            lengthChange: false,
            searching: false,
            columnDefs: [
              { targets: "_all", className: "border-right" },
              { targets: [0], className: "border-left", orderable: false, width: "5%" },
              { targets: [1], className: "text-justify", },
            ],
            data: response,
            columns: [
              {
                data: null,
                title: "Action",
                render: function (data, type, row) {
                  var actions =
                    '<div class="d-flex justify-content-center mt-1"><a href="./blog/post.php?id=' +
                    row.post_id +
                    '" class="text-info mr-2 view_user"><i class="fa fa-expand" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-danger delete_user" data-post-id="' +
                    row.post_id +
                    '"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                  return actions;
                },
              },
              {
                data: "title",
                title: "Title",
                render: function (data, type, row) {
                  // Break line after every 45 characters
                  return data.replace(/(.{50})/g, "$1<br>");
                },
              },

              { data: "category_name", title: "Category" },
              {
                data: "created_at",
                title: "Date-Time",
                render: function (data, type, row) {
                  const dateObj = new Date(data);
                  const formattedDate = dateObj.toLocaleString('en-US', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                  });
                  return formattedDate.replace(',', '');
                },
              },
              {
                data: "published",
                title: "Status",
                render: function (data, type, row) {
                  return data === 1
                    ? '<span class="badge bg-success text-white">Published</span>'
                    : '<span class="badge bg-danger text-white">Unpublished</span>';
                },
              },
            ],
            order: [[3, "desc"]],
          });

        },
        error: function (error) {
          console.log(error);
        }
      });

    }
    myblog();

    function deletemyblogpost(postId) {
      return new Promise(function (resolve, reject) {
        $.ajax({
          url: './blog/api/deletemyblogpost.php',
          method: 'POST',
          data: {
            postId: postId
          },
          dataType: 'json',
          success: function (response) {
            // Handle success
            console.log(response);
            resolve(response);
          },
          error: function (error) {
            // Handle error
            reject(error);
          }
        });
      });
    }

    //my blog delete
    $("#myblogDataTable").on("click", ".delete_user", function () {
      var postId = $(this).data("post-id").toString();
      // console.log(userId);
      Swal.fire({
        title: "Do you want to delete the post?",
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Delete",
        denyButtonText: `Go Back`
      }).then((result) => {
        if (result.isConfirmed) {
          //calling ajax to delete
          deletemyblogpost(postId)
            .then(function (result) {
              if ($.fn.DataTable.isDataTable('#myblogDataTable')) {
                $('#myblogDataTable').DataTable().destroy();
              }
              myblog();
              Swal.fire("Deleted!", "", "success");
            })
            .catch(function (error) {
              // console.error(error);
            });


        }
      });
    });

  }

});

//gallery
$(document).ready(function () {
  if ($("#page_gallery").length > 0) {
    fetchData();
    function fetchData(page) {
      $.ajax({
        url: './api/getgallery.php',
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

//hotel search
$(document).ready(function () {
  if ($("#page_hotel_search").length > 0) {
    $("#hotel_place_select").select2({
      // minimumResultsForSearch: Infinity,
    });

    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Function to update hotel search form fields with received values
    function updateHotelFormFields() {
      const place = getParameterByName('place');
      const checkInDate = getParameterByName('checkInDate');
      const checkOutDate = getParameterByName('checkOutDate');
      const adults = getParameterByName('adults');
      const totalRooms = getParameterByName('totalRooms');

      // Check if all values are present
      if (place && checkInDate && checkOutDate && adults && totalRooms) {
        // Update form fields
        $('#hotel_place_select').val(place).trigger('change');
        $('[name="Check-in-date"]').val(checkInDate);
        $('[name="Check-out-date"]').val(checkOutDate);
        $('[name="adults"]').val(adults);
        $('[name="total-room"]').val(totalRooms);
      } else {
        // Handle the case where not all values are present
        console.error('Not all values are present in the URL parameters.');
      }
    }

    var lPromise = $.ajax({
      url: './api/hotels/droplocation.php',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        $('#hotel_place_select').empty();
        // $('#hotel_place_select').append('<option disabled selected>Select Place</option>');
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

    $.when(lPromise).done(function () {
      // Handle your data if needed
      updateHotelFormFields();
      updateHotelResults();
    });
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
        url: './api/hotels/searchhotels.php',
        type: 'GET',
        data: formData,
        dataType: 'json',
        success: function (response) {
          if (response.length === 0) {
            $('#card_container').html(`<h4 class="p-4 text-center">Nothing found</h4>`);
          } else {
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
                var hotelCard = `<div class="card border shadow-soft mb-2">
                <div class="row">
                    <div class="img-col col-sm-12 col-xl-4 col-md-4 p-0">
                        <div class="card_images">
                            <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="${hotel.image_url}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-8 col-md-8 p-0">
                        <div class="row link h-100">
                            <div class="col-9">
                                <div class="py-2 text-left">
                                    <h3>${hotel.hotel_name} </h3>
                                </div>
                                <div class="py-1">
                                    <h4 class="p-0 m-0"><span class="border p-1 badge"><i
                                                class="fa fa-star text-primary mr-1" aria-hidden="true"></i>${hotel.star}
                                            star</span> <span class="border p-1 badge"><i
                                                class="fa fa-map-marker text-primary mr-1"
                                                aria-hidden="true"></i>${hotel.address}</span></h4>
                                </div>
                                <div class="py-1" id="facility">
                                    <!-- Check if facilities exist before mapping -->
                                    ${hotel.facilities
                    ? hotel.facilities.split(',').map(facility => `<span
                                        class="badge badge-info mr-1">${facility}</span>`).join('')
                    : 'No facilities available'}
                                </div>
                                <div class="py-4">
                                    
                                </div>
                            </div>
                            <a href="rooms.php" class="col-3 pr-3 d-flex align-items-center border-left">
                                <div class="p-0 w-100 text-right">
                                    <p class="p-0 m-0 text-gray"><small>1 room/night</small></p>
                                    <p class="p-0 m-0 "><span class=" text-danger relative start_price">${taka}
                                            ${hotel.low_price[index].price_per_night}</span></p>
                                    <h5><span class="badge badge-success">${hotel.low_price[index].discount}% OFF</span>
                                    </h5>
                                    <h5 class="mb-2 mt-1">${taka} ${(hotel.low_price[index].price_per_night -
                    ((hotel.low_price[index].discount * hotel.low_price[index].price_per_night) / 100))}
                                    </h5>
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
                  '&checkOutDate=' + $('[name="Check-out-date"]').val() +
                  '&totalRoom=' + $('[name="total-room"]').val() +
                  '&adults=' + $('[name="adults"]').val();

                // Open the link in a new tab
                // roomLink.attr('target', '_blank');
                roomLink.attr('href', roomLinkHref);

              }
            });
          }
        },
        error: function () {
          console.log('Error in AJAX request');
        }
      });
    }

    $('form').submit(function (event) {
      event.preventDefault();
      updateHotelResults();

      // Handle checkbox change event
      $('input[name="hotel_rating[]"], input[name="popularity"], input[name="price_order"]').change(function () {
        updateHotelResults();
      });

      // Initial AJAX request when the page loads
      updateHotelResults();

    })

  }
});

//hotel rooms
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
      url: './api/hotels/roomdetails.php',
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
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img class="d-block w-100" src="${response.hotel[0].image_url}" alt="">
            </div>
        </div>
    </div>`);
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
        // <span
        //   class="border p-1 badge"><i class="fa fa-info-circle text-primary mr-1 avroom" aria-hidden="true"></i>${room.available_rooms} rooms available</span>
        var container = $('#card_container');
        container.empty();
        $.each(response.rooms, function (index, room) {
          roomid = room.room_id;
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
                        <input type="number" value="${roomid}" id="room_id" hidden>
                            <h3 id="room_type">${room.room_type}</h3>
                        </div>
                        <div class="py-1">
                            <h4 class="p-0 m-0"><span class="border p-1 badge"><i class="fa fa-bed text-primary mr-1" aria-hidden="true"></i>${room.bed_type}</span> </h4>
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
        // $('#continue').attr('disabled', true);
        $('#continue').addClass('disable');
        $('#continue').removeClass('primary');
        var totalPay = 0;

        $('#card_container').on('click', '.add-room-btn', function () {
          var roomContainer = $(this).closest('.card');
          var roomPrice = parseFloat(roomContainer.find('#disc_price').text().trim());
          var roomType = (roomContainer.find('#room_type').text().trim());
          var roomid = (roomContainer.find('#room_id').val().trim());

          $('.add-room-btn').attr('disabled', true);
          $('.add-room-btn').addClass('disable');
          $('.add-room-btn').removeClass('primary');
          $('#continue').attr('disabled', false);
          $('#continue').addClass('primary');
          $('#continue').removeClass('disable');

          $('#summary:last').append(`
        <div class="border p-1 m-0 cancel_relative bg-gray">
            <div class="cancel"><i class="fa fa-times" aria-hidden="true"></i></div>
            <p class="p-1 m-0 text-center">${roomType}</p>
            <input type="number" value="${roomid}" id="room_id_cart" hidden>
            <h5 class="p-2 m-0 text-center">${taka} ${roomPrice}</h5>
        </div>
    `); totalPay = roomPrice;
          updatePay(totalPay);
        });
        $('#summary').on('click', '.fa-times', function () {
          $(this).closest('.border').remove();
          totalPay = 0;
          $('#continue').attr('disabled', true);
          $('#continue').addClass('disable');
          $('#continue').removeClass('primary');
          $('.add-room-btn').attr('disabled', false);
          $('.add-room-btn').addClass('primary');
          $('.add-room-btn').removeClass('disable');

          updatePay(totalPay);
        });

        function updatePay(totalPay) {
          if (totalPay > 0) {
            $('#pay').val(totalPay);
          } else {
            $('#pay').val('');
          }
        }
      },
      error: function () {
        console.log('Error in AJAX request');
      }
    });


    $('#continue').on('click', function (event) {
      event.preventDefault();

      var roomId = $('#room_id_cart').val();
      var payable = $('#pay').val();
      var InDate = (checkInDate.toISOString());
      var OutDate = (checkOutDate.toISOString());

      // Check if all required values are set
      if (roomId && payable && InDate && OutDate && totalRoom && adults) {
        var bookingType = 'hotel';
        var redirectUrl = 'ssl/sslpay.php?' +
          'type=' + encodeURIComponent(bookingType) +
          '&roomId=' + encodeURIComponent(roomId) +
          '&checkInDate=' + encodeURIComponent(InDate) +
          '&checkOutDate=' + encodeURIComponent(OutDate) +
          '&totalRoom=' + encodeURIComponent(totalRoom) +
          '&payable=' + encodeURIComponent(payable) +
          '&adults=' + encodeURIComponent(adults);

        // Redirect to the new URL
        window.location.href = redirectUrl;
      }
    });


  }
});



//index page
$(document).ready(function () {
  if ($("#page_index").length > 0) {
    $("#flight_select_class").select2({
      minimumResultsForSearch: Infinity,
    });
    $("#flight_ari_select").select2({
    });
    $("#flight_dep_select").select2({
    });
    $("#hotel_place_select").select2({
      // minimumResultsForSearch: Infinity,
    });
    $.ajax({
      url: './api/flight/locations.php',
      type: 'GET',
      dataType: 'json',
      data: {
        ctype: 'arrival_city',
      },
      success: function (data) {
        $('#flight_ari_select').empty();
        // $('#flight_dep_select').append('<option disabled selected>Select Place</option>');
        console.log(data);
        var deplocations = {};
        // Iterate through the array and append options
        $.each(data, function (index, location) {
          $('#flight_ari_select').append('<option value="' + location.arrival_city + '">' + location.arrival_city + '</option>');

        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    //city name 
    $.ajax({
      url: './api/flight/locations.php',
      type: 'GET',
      dataType: 'json',
      data: {
        ctype: 'departure_city',
      },
      success: function (data) {
        $('#flight_dep_select').empty();
        // $('#flight_dep_select').append('<option disabled selected>Select Place</option>');
        // console.log(data);
        $.each(data, function (index, location) {
          $('#flight_dep_select').append('<option value="' + location.departure_city + '">' + location.departure_city + '</option>');

        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    function constructFlightSearchUrl() {
      const baseUrl = 'flights.php'; // Change this to the actual URL of flights.php
      const from = $('#flight_dep_select').val();
      const to = $('#flight_ari_select').val();
      const date = $('[name="flight_date"]').val();
      const person = $('[name="flight_person"]').val();
      const selectedClass = $('#flight_select_class').val();

      // Construct the URL with parameters
      const url = `${baseUrl}?from=${from}&to=${to}&date=${date}&person=${person}&class=${selectedClass}`;

      return url;
    }

    // Get the search flights button
    $('#search_flight_button').on('click', function () {
      // Validate all fields are filled
      if ($('#flight_dep_select').val() && $('#flight_ari_select').val() && $('[name="flight_date"]').val() && $('[name="flight_person"]').val() && $('#flight_select_class').val()) {
        // Construct the URL with form parameters
        const searchUrl = constructFlightSearchUrl();

        // Redirect the user to the flights.php page with the form parameters
        window.location.href = searchUrl;
      } else {
        // Show an alert or perform other actions for incomplete form
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "error"
        });
      }
    });

    // for flights /////////////////////////////////////////////////////////////////////////////

    $.ajax({
      url: './api/hotels/droplocation.php',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        $('#hotel_place_select').empty();
        // $('#hotel_place_select').append('<option disabled selected>Select Place</option>');
        // console.log(data);
        var seenLocations = {};
        $.each(data, function (index, location) {
          if (!seenLocations[location.location]) {
            $('#hotel_place_select').append('<option value="' + location.location + '">' + location.location + '</option>');
            seenLocations[location.location] = true;
          }
        });
      },
      error: function () {
      }
    });

    function constructHotelSearchUrl() {
      const baseUrl = 'hotels.php'; // 
      const place = $('#hotel_place_select').val();
      const checkInDate = $('[name="Check-in-date"]').val();
      const checkOutDate = $('[name="Check-out-date"]').val();
      const adults = $('[name="adults"]').val();
      const totalRooms = $('[name="total-room"]').val();

      const url = `${baseUrl}?place=${place}&checkInDate=${checkInDate}&checkOutDate=${checkOutDate}&adults=${adults}&totalRooms=${totalRooms}`;

      return url;
    }

    $('#search_hotel_button').on('click', function () {
      if (
        $('#hotel_place_select').val() &&
        $('[name="Check-in-date"]').val() &&
        $('[name="Check-out-date"]').val() &&
        $('[name="adults"]').val() &&
        $('[name="total-room"]').val()
      ) {
        const searchUrl = constructHotelSearchUrl();

        window.location.href = searchUrl;
      } else {
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "error"
        });
      }
    });

    //top from blog
    $.ajax({
      url: './api/topfromblog.php',
      method: 'GET',
      success: function (response) {
        // console.log(response);
        $('#blogPostsContainer').html(response);
        $('.active-recent-blog-carusel').owlCarousel({
          items: 3,
          loop: true,
          margin: 30,
          dots: true,
          autoplayHoverPause: true,
          smartSpeed: 500,
          autoplay: true,
          responsive: {
            0: {
              items: 1
            },
            480: {
              items: 1,
            },
            768: {
              items: 2,
            },
            961: {
              items: 3,
            }
          }
        });
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });

    //reviews 
    $.ajax({
      url: './api/reviewfromusers.php',
      method: 'GET',
      success: function (response) {
        console.log(response);
        $('.active-testimonial').html(response);
        $('.active-testimonial').owlCarousel({
          items: 2,
          loop: true,
          margin: 30,
          autoplayHoverPause: true,
          smartSpeed: 500,
          dots: true,
          autoplay: true,
          responsive: {
            0: {
              items: 1
            },
            480: {
              items: 1,
            },
            992: {
              items: 2,
            }
          }
        });
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });

    //popular hotels 
    $.ajax({
      url: './api/popularhotels.php',
      method: 'GET',
      success: function (response) {
        console.log(response);
        $('#popularhotels').html(response);
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });
    //
  }
});

//flight search
$(document).ready(function () {
  if ($("#page_flight_search").length > 0) {
    //

    $("#flight_select_class").select2({
      minimumResultsForSearch: Infinity,
    });
    $("#flight_ari_select").select2({
    });
    $("#flight_dep_select").select2({
    });

    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Function to update form fields with received values
    function updateFormFields() {
      const from = getParameterByName('from');
      const to = getParameterByName('to');
      const date = getParameterByName('date');
      const person = getParameterByName('person');
      const selectedClass = getParameterByName('class');

      // Check if all values are present
      if (from && to && date && person && selectedClass) {
        // Update form fields
        $('#flight_dep_select').val(from).trigger('change');
        $('#flight_ari_select').val(to).trigger('change');
        $('[name="flight_date"]').val(date);
        $('[name="flight_person"]').val(person);
        $('#flight_select_class').val(selectedClass).trigger('change');
      } else {
        // Handle the case where not all values are present
        console.error('Not all values are present in the URL parameters.');
      }
    }

    var depPromise = $.ajax({
      url: './api/flight/locations.php',
      type: 'GET',
      dataType: 'json',
      data: {
        ctype: 'arrival_city',
      },
      success: function (data) {
        $('#flight_ari_select').empty();
        // $('#flight_dep_select').append('<option disabled selected>Select Place</option>');
        console.log(data);
        var deplocations = {};
        // Iterate through the array and append options
        $.each(data, function (index, location) {
          $('#flight_ari_select').append('<option value="' + location.arrival_city + '">' + location.arrival_city + '</option>');

        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    //city name 
    var arrPromise = $.ajax({
      url: './api/flight/locations.php',
      type: 'GET',
      dataType: 'json',
      data: {
        ctype: 'departure_city',
      },
      success: function (data) {
        $('#flight_dep_select').empty();
        // $('#flight_dep_select').append('<option disabled selected>Select Place</option>');
        // console.log(data);
        $.each(data, function (index, location) {
          $('#flight_dep_select').append('<option value="' + location.departure_city + '">' + location.departure_city + '</option>');

        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    $.when(depPromise, arrPromise).done(function (depData, arrData) {
      // Handle your data if needed

      // Call the updateFormFields function
      updateFormFields();
      resultflightsearch();
    });

    //search filights

    $('#search_flight_button').click(function (e) {
      e.preventDefault();
      resultflightsearch();
    });

    function resultflightsearch() {
      var from = $('#flight_dep_select').val();
      var to = $('#flight_ari_select').val();
      var date = $('input[name="flight_date"]').val();
      var person = $('input[name="flight_person"]').val();
      var classType = $('#flight_select_class').val();
      if (!person || parseInt(person) < 1) {
        person = 1; // Set person to 1
      } else if (parseInt(person) > 4) {
        person = 4; // Set person to 4 if it's more than 4
      }

      $.ajax({
        type: 'POST',
        url: './api/flight/searchflights.php',
        data: {
          departureCity: from,
          arrivalCity: to,
          person: person,
          class: classType,
          flightDate: date
        },
        success: function (response) {
          // console.log(response);
          if (response.length === 0) {
            $('#card_container').html(`<h4 class="p-4 text-center">Nothing found</h4>`);
          } else {
            $('#card_container').html(response);
          }
        },
        error: function (error) {
          console.log('Error:', error);
        }
      });
    }

    //
  }
});

//flight booking
$(document).ready(function () {
  if ($("#page_book_flight").length > 0) {
    function generatePersonForms(personCount) {
      $('#person_details').empty();
      for (let i = 1; i <= personCount; i++) {
        let formHtml = `
              <div class="mb-2 border">
                <p class="p-1 px-4 m-0 fw-500 border-bottom card-header w-100">Person ${i}</p>
                <div class="row gap-3 text-left px-2">
                    <div class="col-6 p-0 m-0">
                        <small class="p-0 m-0 fw-500 text-gray">First Name:</small>
                        <input type="text" class="single-input single-input-primary border" name="personal_fname_${i}" required>
                    </div>
                    <div class="col p-0 m-0">
                        <small class="p-0 m-0 fw-500 text-gray">Last Name:</small>
                        <input type="text" class="single-input single-input-primary border" name="personal_lname_${i}" required>
                    </div>
                </div>
                <div class="row gap-3 mt-1 text-left px-2">
                    <div class="col-6 p-0 m-0">
                        <small class="p-0 m-0 fw-500 text-gray">Passport No:</small>
                        <input type="text" class="single-input single-input-primary border" name="personal_passport_${i}" required>
                    </div>
                    <div class="col p-0 pb-2 m-0">
                        <small class="p-0 m-0 fw-500 text-gray">Contact:</small>
                        <input type="text" class="single-input single-input-primary border" name="personal_contact_${i}" required>
                    </div>
                </div>
              </div>
          `;
        $('#person_details').append(formHtml);
      }
    }

    var urlParams = new URLSearchParams(window.location.search);
    var flightId = urlParams.get('flightId');
    var flightClass = urlParams.get('class');
    var personCount = urlParams.get('person');
    if (!personCount || parseInt(personCount) < 1) {
      personCount = 1; // Set person to 1
    } else if (parseInt(personCount) > 4) {
      personCount = 4; // Set person to 4 if it's more than 4
    }
    if (personCount) {
      generatePersonForms(parseInt(personCount));
    } else {
      // Default to 1 person if the parameter is not provided
      generatePersonForms(1);
    }


    var selectedSeats = [];
    // Make AJAX call
    $.ajax({
      type: 'POST',
      url: './api/flight/flightdetails.php', // Replace with the actual path
      data: {
        flightId: flightId,
        class: flightClass,
        person: personCount
      },
      success: function (response) {
        var fare = ((response[0].price - ((response[0].discount * response[0].price) / 100)) * personCount);
        var tax = ((fare * 5) / 100);
        var total = fare + tax;
        console.log(response);
        $('#air_img').attr('href', response[0].image_url);
        $('#der_city').text(response[0].departure_city);
        $('#dep_time').text(response[0].departure_time);
        $('#ari_city').text(response[0].arrival_city);
        $('#ari_time').text(response[0].arrival_time);
        $('#flight_num').text(response[0].flight_number);
        $('#airplane_model').text(response.airplane_model);
        if (flightClass == 'economy_class') {
          $('#ticket_class').text('Economy');
        } else if (flightClass == 'business_class') {
          $('#ticket_class').text('Business');
        }

        $('#bag_cabin').text(response[0].bag_cabin + ' Kg');
        $('#bag_check_in').text(response[0].bag_check_in + ' Kg');
        $('#cancelation').text(response[0].cancelation);
        $('#discount').text(response[0].discount);
        $('#ticket_fare').text(fare);
        $('#ticket_tax').text(tax);
        $('#ticket_total').text(total);
        $('#pay').val(total);

        // $('#seats_table').data('seats', response[0].booked_seats);
        // Set data attribute using jQuery
        $('#seats_table').data('seats', response[0].booked_seats);

        // Get the seatDiagram using jQuery
        // const seatDiagram = $("#seats_table")[0]; // Convert jQuery object to DOM element
        // let booked_seats = "";

        // if (seatDiagram) {
        //   booked_seats = $(seatDiagram).data('seats');
        // }

        // if (booked_seats) {
        //   // Color the taken seats as purple
        //   booked_seats = booked_seats.split(",");

        //   booked_seats.forEach(seatNo => {
        //     const seat = $('#seat-' + seatNo, seatDiagram);
        //     seat.addClass('booked');
        //   });
        // }

        // // Handle seat selection for the given person value
        // const maxSeatsAllowed = personCount;
        // const selectedSeats = [];

        // $("#seats_table td").click(function () {
        //   const selectedSeat = $(this).attr('id');

        //   // Check if the seat is already booked
        //   if (!booked_seats.includes(selectedSeat)) {
        //     // Check if the selected seat is within the allowed range for the person
        //     const seatNumber = parseInt(selectedSeat.substr(1));

        //     if (selectedSeats.length < maxSeatsAllowed) {
        //       // Check if the seat is not already selected
        //       if (!selectedSeats.includes(selectedSeat)) {
        //         // Add the seat to the selected seats array
        //         selectedSeats.push(selectedSeat);
        //         $(this).toggleClass('selected');
        //       } else {
        //         // Seat is already selected, remove it
        //         const index = selectedSeats.indexOf(selectedSeat);
        //         selectedSeats.splice(index, 1);
        //         $(this).toggleClass('selected');
        //       }
        //     } else {
        //       alert('You can only select ' + maxSeatsAllowed + ' seats.');
        //     }
        //   } else {
        //     alert('This seat is already booked.');
        //   }

        //   // Log the selected seats (you can use this array for further processing)
        //   console.log(selectedSeats);
        // });
        const seatDiagram = $("#seats_table")[0];
        let booked_seats = "";

        if (seatDiagram) {
          booked_seats = $(seatDiagram).data('seats');
          if (booked_seats) {
            booked_seats = booked_seats.split(",");
            booked_seats.forEach(seatNo => {
              const seat = $('#seat-' + seatNo, seatDiagram);
              seat.addClass('booked');
              seat.prop('disabled', true); // Disable already booked seats
            });
          }
        }

        const maxSeatsAllowed = personCount;


        function updateSelectedSeatsDisplay() {
          // Display selected seats somewhere in your UI
          const selectedSeatsDisplay = selectedSeats.join(", ");
          console.log("Selected Seats: ", selectedSeatsDisplay);
          // Update your UI or perform any other action with selected seats
        }

        $("#seats_table td:not(.booked)").click(function () {
          const selectedSeat = $(this).attr('id');

          // Check if the selected seat is within the allowed range for the person
          const seatNumber = parseInt(selectedSeat.substr(5));
          if (seatNumber > personCount) {
            alert('You can only select up to ' + personCount + ' seats for the selected person.');
            return;
          }

          // Toggle seat selection if it's not booked
          const isSelected = $(this).hasClass('selected');
          if (!isSelected && selectedSeats.length < maxSeatsAllowed) {
            // Add seat to selection
            selectedSeats.push(selectedSeat);
            $(this).addClass('selected');
          } else if (isSelected) {
            // Remove seat from selection
            const index = selectedSeats.indexOf(selectedSeat);
            selectedSeats.splice(index, 1);
            $(this).removeClass('selected');
          }

          // Update the display of selected seats
          updateSelectedSeatsDisplay();
        });

      },
      error: function (error) {
        // Handle errors
        console.error('Error:', error);
      }
    });



    // $("#continue").on("click", function () {
    //   selectedSeats = selectedSeats.map(seat => seat.replace('seat-', ''));
    //   var seatsString = selectedSeats.join(',');
    //   // Create an array to store the person details
    //   var personData = [];

    //   for (let i = 1; i <= personCount; i++) {
    //     // Create an object to store individual person's data
    //     let person = {
    //       firstName: $(`input[name="personal_fname_${i}"]`).val(),
    //       lastName: $(`input[name="personal_lname_${i}"]`).val(),
    //       passportNo: $(`input[name="personal_passport_${i}"]`).val(),
    //       contact: $(`input[name="personal_contact_${i}"]`).val(),
    //     };

    //     // Push the person's data to the array
    //     personData.push(person);

    //   }
    //   personData['seatsString'] = seatsString;

    //   console.log(personData);


    $("#continue").on("click", function () {
      // Validate that the number of selected seats matches the person count
      if (selectedSeats.length === parseInt(personCount)) {

        let allFieldsFilled = true;

        for (let i = 1; i <= personCount; i++) {
          if (
            !$(`input[name="personal_fname_${i}"]`).val() ||
            !$(`input[name="personal_lname_${i}"]`).val() ||
            !$(`input[name="personal_passport_${i}"]`).val() ||
            !$(`input[name="personal_contact_${i}"]`).val()
          ) {
            Swal.fire({
              icon: 'warning',
              title: 'Oops...!',
              text: 'Fill in all fields.',
            });

            allFieldsFilled = false;
            break;
          }
        }
        if (allFieldsFilled) {
          selectedSeats = selectedSeats.map(seat => seat.replace('seat-', ''));
          var seatsString = selectedSeats.join(',');
          var bookingdata = [];

          for (let i = 1; i <= personCount; i++) {
            let person = {
              firstName: $(`input[name="personal_fname_${i}"]`).val(),
              lastName: $(`input[name="personal_lname_${i}"]`).val(),
              passportNo: $(`input[name="personal_passport_${i}"]`).val(),
              contact: $(`input[name="personal_contact_${i}"]`).val(),
            };
            bookingdata.push(person);
          }
          console.log(JSON.stringify({
            amount: $('#pay').val(),
            seats: seatsString,
            flightId: flightId,
            ticketClass: flightClass,
            personDetails: bookingdata
          }));

          $.ajax({
            type: "POST",
            url: "./api/flight/flightbooking.php", // Replace with the actual URL of your next page
            data: JSON.stringify({
              amount: $('#pay').val(),
              seats: seatsString,
              flightId: flightId,
              ticketClass: flightClass,
              personDetails: bookingdata
            }),
            dataType: 'json',  // Corrected attribute name
            success: function (response) {
              // Handle the response from the server
              console.log(response);
              // Redirect to the next page if needed
              window.location.href = "./ssl/sslpay.php?type=flight";
            },
            error: function (error) {
              console.log("Error:", error);
            }
          });



        }
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Oops...!',
          text: 'Select all ' + personCount + ' seats.',
        });
      }

    });


    ///
  }
});

// function getblogposts() {
//   $.ajax({
//     url: './api/getallpost.php',
//     type: 'GET',
//     dataType: 'json',
//     success: function (response) {
//       $('#blog_posts').empty();
//       // console.log(response);
//       $.each(response, function (index, post) {
//         console.log(post);

//         var imageUrl = `${post.image_url}`;
//         var dateObject = new Date(post.created_at);

//         var date = dateObject.toISOString().split('T')[0];

//         var content = post.content;
//         var truncatedContent = content.slice(0, 350);
//         if (content.length > 350) {
//           truncatedContent += '...';
//         }
//         var contentcard = `
//           <div class="single-post  mb-2 border">
//                             <div class="p-0">
//                                 <div class="feature-img p-4 m-0">
//                                     <div class="d-flex border p-2 justify-content-center align-items-center">
//                                     <img class="img-fluid" src="${imageUrl}" alt="">
//                                     </div>
//                                 </div>
//                                 <div class="px-4 text-center row">
//                                     <div class="col-6 col-lg-3 py-3 border">
//                                         <a class="fw-500 text-primary anc" href="#">${post.category_name}</a>
//                                     </div>
//                                     <div class="col-6 col-lg-3 py-3 border">
//                                         <p class="user-name p-0 m-0">${post.first_name} ${post.last_name}
//                                         </p>
//                                     </div>
//                                     <div class="col-6 col-lg-3 py-3 border">
//                                         <p class="date p-0  m-0">${date}
//                                     </div>
//                                     <div class="col-6 col-lg-3 py-3  border">
//                                         <p class="comments p-0  m-0">${post.total_comments} comments
//                                     </div>
//                                 </div>
//                                 <div class="p-4 m-0">
//                                     <a class="posts-title text-justify" href="blog-single.html">
//                                         <h3 class=" m-0 mb-3">${post.title}</h3>
//                                     </a>
//                                     <div class="content_blogpost text-justify">${truncatedContent}</div>
//                                     <a href="post.php?id=${post.post_id}" class="genric-btn primary">View More</a>
//                                 </div>
//                             </div>
//                         </div>`;
//         // $('#view_post_content').html(post.content);
//         $('#blog_posts').append(contentcard);

//       }
//       )
//     },
//     error: function (error) {
//       console.log('Error:', error);
//     }
//   });
// }


// function getblogposts(page) {
//   $.ajax({
//     url: './api/getallpost.php',
//     type: 'GET',
//     data: { page: page },
//     dataType: 'json',
//     success: function (response) {
//       $('#blog_posts').empty();

//       $.each(response.data, function (index, post) {
//         var imageUrl = `${post.image_url}`;
//         var dateObject = new Date(post.created_at);
//         var date = dateObject.toISOString().split('T')[0];
//         var content = post.content;
//         var truncatedContent = content.slice(0, 350);
//         if (content.length > 350) {
//           truncatedContent += '...';
//         }

//         var contentcard = `
//           <div class="single-post mb-2 border">
//             <div class="p-0">
//               <div class="feature-img p-4 m-0">
//                 <div class="d-flex border p-2 justify-content-center align-items-center">
//                   <img class="img-fluid" src="${imageUrl}" alt="">
//                 </div>
//               </div>
//               <div class="px-4 text-center row">
//                 <div class="col-6 col-lg-3 py-3 border">
//                   <a class="fw-500 text-primary anc" href="#">${post.category_name}</a>
//                 </div>
//                 <div class="col-6 col-lg-3 py-3 border">
//                   <p class="user-name p-0 m-0">${post.first_name} ${post.last_name}</p>
//                 </div>
//                 <div class="col-6 col-lg-3 py-3 border">
//                   <p class="date p-0 m-0">${date}</p>
//                 </div>
//                 <div class="col-6 col-lg-3 py-3  border">
//                   <p class="comments p-0 m-0">${post.total_comments} comments</p>
//                 </div>
//               </div>
//               <div class="p-4 m-0">
//                 <a class="posts-title text-justify" href="blog-single.html">
//                   <h3 class="m-0 mb-3">${post.title}</h3>
//                 </a>
//                 <div class="content_blogpost text-justify">${truncatedContent}</div>
//                 <a href="post.php?id=${post.post_id}" class="genric-btn primary">View More</a>
//               </div>
//             </div>
//           </div>`;
//         $('#blog_posts').append(contentcard);
//       });

//       // If you want to log the pagination details, you can use:
//       console.log(response.pagination);

//       // Example: Display current page and total pages
//       $('#pagination_info').text('Page ' + response.pagination.currentPage + ' of ' + response.pagination.totalPages);
//     },
//     error: function (error) {
//       console.log('Error:', error);
//     }
//   });
// }


function getBlogPosts(page) {
  $.ajax({
    url: './api/getallpost.php',
    method: 'GET',
    data: {
      page: page
    },
    dataType: 'json',
    success: function (response) {
      var blogPosts = response.data;
      var pagination = response.pagination;
      console.log(response.pagination)

      // Clear existing blog posts
      $('#blog_posts').empty();

      // Append new blog posts
      $.each(blogPosts, function (index, post) {
        var imageUrl = `${post.image_url}`;
        var dateObject = new Date(post.created_at);
        var date = dateObject.toISOString().split('T')[0];
        var content = post.content;
        var truncatedContent = content.slice(0, 350);
        if (content.length > 350) {
          truncatedContent += '...';
        }

        var contentcard = `
          <div class="single-post mb-2 border">
            <div class="p-0">
              <div class="feature-img p-4 m-0">
                <div class="d-flex border p-2 justify-content-center align-items-center">
                  <img class="img-fluid" src="${imageUrl}" alt="">
                </div>
              </div>
              <div class="px-4 text-center row">
                <div class="col-6 col-lg-3 py-3 border">
                  <a class="fw-500 text-primary anc" href="#">${post.category_name}</a>
                </div>
                <div class="col-6 col-lg-3 py-3 border">
                  <p class="user-name p-0 m-0">${post.first_name} ${post.last_name}</p>
                </div>
                <div class="col-6 col-lg-3 py-3 border">
                  <p class="date p-0 m-0">${date}</p>
                </div>
                <div class="col-6 col-lg-3 py-3  border">
                  <p class="comments p-0 m-0">${post.total_comments} comments</p>
                </div>
              </div>
              <div class="p-4 m-0">
                <a class="posts-title text-justify" href="post.php?id=${post.post_id}">
                  <h3 class="m-0 mb-3">${post.title}</h3>
                </a>
                <div class="content_blogpost text-justify">${truncatedContent}</div>
                <a href="post.php?id=${post.post_id}" class="genric-btn primary">View More</a>
              </div>
            </div>
          </div>`;

        $('#blog_posts').append(contentcard);
      });

      // Update pagination
      var paginationHtml = '';
      for (var i = 1; i <= pagination.totalPages; i++) {
        paginationHtml += '<li class="page-item"><span class="page-link pagination_link" data-page="' + i + '">' + i + '</span></li>';
      }

      $('#pagination').empty().append(paginationHtml);
    },
    error: function (error) {
      console.log('Error:', error);
    }
  });
}

//blog home
$(document).ready(function () {
  if ($("#page_blog_home").length > 0) {

    $("#category_blogpost").select2({
      minimumResultsForSearch: Infinity,
    });
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap ',
      height: 300,
      automatic_uploads: true
    });
    getBlogPosts(1)

    $(document).on('click', '.pagination_link', function () {
      var page = $(this).data('page');
      getBlogPosts(page);
    });

    $("#post_blog").click(function (event) {
      event.preventDefault();
      var title = $('#title_blogpost').val();
      var category = $('#category_blogpost').val();
      var image = $('#image_blogpost')[0].files[0];
      var content = tinymce.get('content_blogpost').getContent();

      var formData = new FormData();
      formData.append('title', title);
      formData.append('category', category);
      formData.append('image', image);
      formData.append('content', content);

      if (title.trim() === '' || category.trim() === '' || !image || content.trim() === '') {
        Swal.fire({
          title: "Empty!",
          text: "All fields are required!",
          icon: "warning",
        });
      } else {
        $.ajax({
          url: './api/savepost.php', // Update with your PHP script URL
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function (response) {
            $("#title_blogpost").val("");
            $("#category_blogpost").val('').trigger("change");
            tinymce.get('content_blogpost').setContent('');
            $('#data_blogpost')[0].reset();

            getBlogPosts(1);
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Your blog have been saved.',
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



    //
  }
});
//blog post
$(document).ready(function () {
  if ($("#page_blog_single").length > 0) {

    var currentUrl = window.location.href;
    var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
    var postId = urlParams.get('id');

    $.ajax({
      url: './api/singlepost.php',
      type: 'GET',
      data: {
        postId: postId
      },
      dataType: 'json',
      success: function (response) {
        $('#blog_posts').empty();
        console.log(response);
        // $.each(response, function (index, post) {
        //   console.log(post);

        var imageUrl = `${response.posts[0].image_url}`;
        var dateObject = new Date(response.posts[0].created_at);
        var date = dateObject.toISOString().split('T')[0];
        var content = response.posts[0].content;
        var contentcard = `
            <div class="single-post  mb-2 border">
                              <div class="p-0">
                                  <div class="feature-img p-4 m-0">
                                      <div class="d-flex border p-2 justify-content-center align-items-center">
                                      <img class="img-fluid" src="${imageUrl}" alt="">
                                      </div>
                                  </div>
                                  <div class="px-4 text-center row">
                                      <div class="col-6 col-lg-3 py-3 border">
                                          <a class="fw-500 text-primary anc" href="#">${response.posts[0].category_name}</a>
                                      </div>
                                      <div class="col-6 col-lg-3 py-3 border">
                                          <p class="user-name p-0 m-0">${response.posts[0].first_name} ${response.posts[0].last_name}
                                          </p>
                                      </div>
                                      <div class="col-6 col-lg-3 py-3 border">
                                          <p class="date p-0  m-0">${date}
                                      </div>
                                      <div class="col-6 col-lg-3 py-3  border">
                                          <p class="comments p-0  m-0">${response.posts[0].total_comments} comments
                                      </div>
                                  </div>
                                  <div class="p-4 m-0">
                                      <div class=" text-justify" >
                                          <h3 class="text-primary m-0 mb-3">${response.posts[0].title}</h3>
                                      </div>
                                      <div class="content_blogpost text-justify">${content}</div>
                                      <button onclick="history.back()" class="genric-btn primary mr-2">Back</button>
                                      <a href="home.php" class="genric-btn primary">Back to Blog Feed</a>
                                  </div>
                              </div>
                          </div>`;
        // $('#view_post_content').html(post.content);
        $('#blog_posts').append(contentcard);

        // }
        // )
        var commentcard = '';
        $.each(response.comments, function (index, comment) {
          var dateObject = new Date(comment.created_at);
          var options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
          var date = dateObject.toLocaleString('en-US', options);

          commentcard += `<div class="border p-0 mb-2">
          <h5 class="card-header m-0"><a href="#">${comment.first_name + ' ' + comment.last_name}</a></h5>
          <div class="p-3">
              <p class="date">${date}</p>
              <p class="comment">
              ${comment.content}
              </p>
          </div>
      </div>`
        });
        $('.comment-list').append(commentcard);
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });

  }
})

//emergency 
$(document).ready(function () {
  if ($("#page_services").length > 0) {
    $("#locations").select2({
      // minimumResultsForSearch: Infinity,
    });
    $.ajax({
      url: './api/serviceslocation.php',
      type: 'GET',
      dataType: 'json',
      data: {
        ctype: 'location',
      },
      success: function (data) {
        console.log(data);
        $('#locations').empty();
        // $('#flight_dep_select').append('<option disabled selected>Select Place</option>');
        console.log(data);
        var deplocations = {};
        // Iterate through the array and append options
        $.each(data, function (index, location) {
          $('#locations').append('<option value="' + location.location + '">' + location.location + '</option>');

        });
      },
      error: function () {
        // console.log('Error fetching data');
      }
    });

    $('#searchBtn').on('click', function (event) {
      // Prevent the default form submission
      event.preventDefault();

      // Get the selected location value
      var selectedLocation = $('#locations').val();

      // Check if a location is selected
      if (selectedLocation) {
        // Send an AJAX request
        $.ajax({
          url: './api/emergencysearch.php', // Replace with your actual backend endpoint
          type: 'GET',
          data: { location: selectedLocation },
          success: function (response) {
            console.log(response);
            $('#emergency_services').empty();
            $('#emergency_services').html(response);


          },
          error: function (error) {
            // Handle errors
            console.error(error);
          }
        });
      } else {
        // Handle the case when no location is selected
        alert('Please select a location before searching.');
      }
    });

  }
})




