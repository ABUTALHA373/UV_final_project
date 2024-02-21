// $(document).ready(function () {
//     // AJAX call to fetch locations from PHP
//     $.ajax({
//         url: 'api/hotels/droplocation.php',
//         type: 'GET',
//         dataType: 'json',
//         success: function (data) {
//             // Populate select input with location options
//             $.each(data, function (index, location) {
//                 $('#hotel_place_select').append('<option value="' + location.location + '">' + location.location + '</option>');
//             });
//         },
//         error: function () {
//             console.log('error');
//         }
//     });
// });
