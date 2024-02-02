<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require '../include/nheader.php';
if($isVerified && !$isLoggedIn){
    header("Location: ../index.php");
}elseif($isVerified && $isLoggedIn){
    header("Location: ../profile.php");
}
?>
<section class="account-info-area section-bg-gray section-gap-sm">
    <div class="container p-0">
        <h2 class="py-4 px-4 mb-2 bg-white border text-center">Email Verification</h2>
        <div class="py-4 px-4 mb-2 bg-white border vh-75">
            <div class=" text-center">
                <h4 class="text-center">Verification email sent here:</h4>
                <p><strong class="bg-pm text-w"><?php echo $_SESSION['user_email'] ?></strong></p>
            </div>
        </div>
    </div>
</section>
<!-- End about-info Area -->
<?php
require '../include/footer.php';
?>

</body>

</html>