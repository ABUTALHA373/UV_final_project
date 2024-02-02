<?php

session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);

if($isLoggedIn){
    header("Location: ../profile.php");
    exit;
}elseif($_SESSION['user_id']==null){
    header("Location: ../index.php");
    exit;
}
require '../include/nheader.php';
?>
<section class="account-info-area section-bg-gray section-gap-sm">
    <div class="container p-0">
        <h2 class="py-4 px-4 mb-2 bg-white border text-center">Account Deleted!</h2>
    </div>
</section>
<!-- End about-info Area -->
<?php

require '../include/footer.php';
?>

</body>

</html>