<?php
require '../include/nheader.php';

?>
<section class="account-info-area section-bg-gray ">
    <div class="container p-0">
        <h2 class="py-4 px-4 mb-2 bg-white border text-center">Email Verification</h2>
        <div class="py-4 px-4 mb-2 bg-white border vh-100">
            <div class=" text-center">
                <p class="text-center">Verification email send
                    to:<br><strong class="bg-pm text-w"><?php echo $_SESSION['user_email'] ?></strong></p>
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