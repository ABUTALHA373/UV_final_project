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