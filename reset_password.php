<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);

if ($isLoggedIn) {
    header("location:javascript://history.go(-1)");
} else {

    require './include/nheader.php';
?>
<div id="page_reset_pass">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <h2 class="py-4 px-4 bg-white border text-center">Reset password</h2>
            <div class="py-4 px-4 mb-2 bg-white border h-50">
                <div class="py-5">
                    <form action="postphp/reset_passwordpost.php" method="post" style="max-width: 500px;"
                        class=" text-center m-auto">
                        <div class="">
                            <label>Enter your email:</label>
                            <div>
                                <input type="email" id="rp_email" name="rp_email" placeholder="example@mail.com"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@mail.com'"
                                    required class="single-input single-input-primary border">
                                <small class=" text-danger error-info" id="rp_email_error"></small>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="genric-btn primary ">Send verification email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    require './include/footer.php';
    if (isset($_GET['message'])) {
        $message = urldecode($_GET['message']);
        if ($message == 'mail_error') {
            echo '<script>Swal.fire({
            title: "Error!",
            text: "Could not send verification email!",
            icon: "error"
          });</script>';
        } else if ($message == 'success') {
            echo '<script>Swal.fire({
            title: "Success!",
            text: "Password reset link sent! Please check your email.",
            icon: "success"
          });</script>';
        } else if ($message == 'token_error') {
            echo '<script>Swal.fire({
            title: "Error!",
            text: "Error with the token!",
            icon: "error"
          });</script>';
        } else if ($message == 'blocked') {
            echo '<script>Swal.fire({
            title: "Blocked!",
            text: "User account has been blocked! Please contact us.",
            icon: "error"
          });</script>';
        } else if ($message == 'deleted') {
            echo '<script>Swal.fire({
            title: "Deleted!",
            text: "Account was Deleted by user!",
            icon: "error"
          });</script>';
        } else if ($message == 'user_not_found') {
            echo '<script>Swal.fire({
            title: "Error!",
            text: "Email not registered!",
            icon: "error"
          });</script>';
        }
    }
}
?>
</body>

</html>