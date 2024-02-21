<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/header.php';
?>
<!-- start banner Area -->
<section class="relative about-banner">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Contact Us
                </h1>
                <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="contact.php"> Contact Us</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="map-wrap" style="width:100%; height: 445px;" id="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d550.0725001667165!2d90.37746650857007!3d23.786871615671625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7d046e14d25%3A0xaabaf696a3c03aa7!2sGreen%20University%20Dhaka%20City%20Information%20Center!5e0!3m2!1sen!2sbd!4v1708227648116!5m2!1sen!2sbd"
                    width="100%" height="100%" style="border: 1px solid #ced4da;" allowfullscreen="" loading=""
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5>Mirpur, Dhaka</h5>
                        <p>
                            Shewrapara Mirpur
                        </p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>+8801700-123123</h5>
                        <p>Sun to Thu 9am to 6 pm</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>info@bookitfast@gmail.com</h5>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control"
                                required="" type="text">

                            <input name="email" placeholder="Enter email address"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control"
                                required="" type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'"
                                required=""></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <button class="genric-btn primary" style="float: right;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
<?php
require './include/footer.php';
?>
</body>

</html>