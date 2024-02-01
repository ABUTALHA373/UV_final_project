<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require './include/header.php';
?>


<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Terms and Conditions
                </h1>
                <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="terms_&_conditions.php"> Terms and Conditions</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="c-area section-gap">
    <div class="container">

        <p>Welcome to BOOKITFAST! These Terms and Conditions ("Terms") govern your use of the
            BOOKITFAST website and
            services ("Services") to book tours, flights, and hotels, and make payments for these bookings. By accessing
            or using the Services, you agree to be bound by these Terms. If you disagree with any of these Terms, you
            may not use the Services.</p>
        <h3>1. Your Booking:</h3>
        <h4>1.1 Eligibility:</h4>
        <ul class="unordered-list">
            <li>You must be at least 18 years old to make a booking through BOOKITFAST.</li>
            <li>If booking for others, you confirm you have their full consent and authority.</li>
        </ul>
        <h4>1.2 Booking Process:</h4>
        <ul class="unordered-list">
            <li>Bookings are made online through the BOOKITFAST website.</li>
            <li>Provide accurate and complete information during booking.</li>
            <li>You're responsible for travel documents, visas, and vaccinations.</li>
            <li>BOOKITFAST acts as an intermediary with tour operators, airlines, and hotels.</li>
        </ul>
        <h4>1.3 Prices and Payments:</h4>
        <ul class="unordered-list">
            <li>Prices displayed include tour, flight, and hotel costs, but may not include:
                <ul>
                    <li>Taxes</li>
                    <li>Airport charges</li>
                    <li>Resort fees</li>
                    <li>Travel insurance</li>
                </ul>
            </li>
            <li>You're responsible for all applicable fees and charges.</li>
            <li>Pay in full at booking using accepted credit or debit cards.</li>
            <li>We're not responsible for currency conversion charges.</li>

        </ul>
        <h4>1.4 Cancellations and Changes:</h4>
        <ul class="unordered-list">
            <li>Policies vary depending on providers. They'll be displayed during booking and confirmed in your email.
            </li>
            <li>Cancellation fees may apply.</li>
            <li>Changes may incur additional fees.</li>
            <li>Refer to specific provider policies before booking.</li>
        </ul>
        <h3>2. Payment System:</h3>
        <ul class="unordered-list">
            <li>BOOKITFAST uses a secure payment gateway for processing.</li>
            <li>We do not store your credit card information.</li>
            <li>All transactions are conducted encrypted in a secure environment.</li>
            <li>We're not responsible for unauthorized credit card use.</li>
        </ul>
        <h3>3. Disclaimer of Warranties:</h3>

        <ul class="unordered-list">
            <li>Services are provided "as is" without warranties, express or implied.</li>
            <li>BOOKITFAST does not warrant uninterrupted, error-free, or completely secure services.</li>
            <li>We're not responsible for damages arising from your use of the Services.</li>
        </ul>
        <h3>4. Limitation of Liability:</h3>
        <ul class="unordered-list">
            <li>BOOKITFAST will not be liable for any direct, indirect, incidental, consequential, or punitive damages
                arising from your use of the Services, even if advised of such possibilities.</li>
        </ul>
        <h3>5. Force Majeure:</h3>
        <ul class="unordered-list">
            <li>BOOKITFAST is not liable for any delay or failure to perform its obligations due to causes beyond its
                reasonable control, such as acts of God, natural disasters, strikes, wars, or terrorism.</li>
        </ul>
        <h3>6. Governing Law and Jurisdiction:</h3>
        <ul class="unordered-list">
            <li>These Terms shall be governed by and construed in accordance with the laws of [Country], without regard
                to its conflict of laws provisions.</li>
            <li>Any dispute arising out of or relating to these Terms shall be subject to the exclusive jurisdiction of
                the courts of [Country].</li>
        </ul>
        <h3>7. Amendments:</h3>
        <ul class="unordered-list">
            <li>BOOKITFAST reserves the right to amend these Terms by posting them on the BOOKITFAST website.</li>
            <li>Your continued use of the Services after posting amended Terms constitutes acceptance of the amended
                Terms.</li>
        </ul>
        <h3>8. Entire Agreement:</h3>
        <ul class="unordered-list">
            <li>These Terms constitute the entire agreement between you and BOOKITFAST with respect to your use of
                the Services.</li>
        </ul>
        <h3>9. Contact Us:</h3>
        <ul class="unordered-list">
            <li>If you have any questions about these Terms, please contact us at <a
                    href="mailto:info@example.com">info@bookitfast.com</a>.</li>
        </ul>
        <h3>Additional Information</h3>
        <ul class="unordered-list">
            <li>BOOKITFAST is committed to protecting your privacy. Please refer to our Privacy Policy for more
                information.</li>
            <li>These Terms are subject to change at any time without prior notice.</li>
            <li>By using BOOKITFAST, you agree to comply with all applicable laws and regulations.</li>
        </ul>

        <p"><em class="bg-pm text-w">Last Updated: [01-01-2024]</em></p>
    </div>
</section>


<?php
require './include/footer.php';
?>

</body>

</html>