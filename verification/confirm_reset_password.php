<?php
ob_start();
session_start();
$isLoggedIn = isset($_SESSION['user_id'] ) && isset($_SESSION['user_email']) && isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name']);
$isVerified = isset($_SESSION['user_is_verified']);
require '../include/nheader.php';

if (isset($_GET['code'])) {
    $confirmationCode = $con->real_escape_string($_GET['code']);

    // Check if the confirmation code exists in the database
    $query = $con->prepare("SELECT * FROM users WHERE password_reset_token = ?");
    $query->bind_param("s", $confirmationCode);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Load content when the condition is true
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $newPassword = $con->real_escape_string($_POST['reset_pass']);
            $row = $result->fetch_assoc();

            // Update the user's password in the database (assuming you have a 'password' column)
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = $con->prepare("UPDATE users SET password = ? WHERE email = ?");
            $updatePasswordQuery->bind_param("ss", $hashedPassword, $row['email']);
            if ($updatePasswordQuery->execute()) {
                $message = urlencode('set_pass_success');
                header("Location: ../login.php?message=$message");
                exit;
            }
        }
?>
<div id="page_confirm_reset_pass">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <h2 class="py-4 px-4 bg-white border text-center">Reset password</h2>
            <div class="py-4 px-4 mb-2 bg-white border h-50">
                <div class="py-5">
                    <form action="" method="post" style="max-width: 500px;" class=" text-center m-auto">
                        <div class="">
                            <label>Enter your password:</label>
                            <div class="relative">
                                <input type="password" id="reset_pass" name="reset_pass"
                                    placeholder="Enter new password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter new password'" required
                                    class="single-input single-input-primary border">
                                <i class="fa fa-eye eye-right" id="rp_pass_toggle" aria-hidden="true"></i>
                            </div>
                            <small class=" text-danger error-info" id="rp_pass_error"></small>
                        </div>
                        <div class="mt-3">
                            <label>Confirm your password:</label>
                            <div class="relative">
                                <input type="password" id="confirm_reset_pass" name="confirm_reset_pass"
                                    placeholder="Confirm your password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Confirm your password'" required
                                    class="single-input single-input-primary border">
                                <i class="fa fa-eye eye-right" id="rp_conpass_toggle" aria-hidden="true"></i>
                            </div>
                            <small class=" text-danger error-info" id="rp_conpass_error"></small>
                        </div>
                        <div class="mt-3">
                            <button class="genric-btn primary ">Save password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
        require '../include/footer.php';

?>
</body>

</html>
<?php
    }
} else {
    $message = urlencode('token_error');
    header("Location: ../profile.php?message=$message");
    exit;
}
ob_end_flush();
?>