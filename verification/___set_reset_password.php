<?php
require './include/nheader.php';
?>
<div id="page_set_reset_pass">
    <section class="account-info-area section-bg-gray section-gap-sm">
        <div class="container p-0">
            <h2 class="py-4 px-4 bg-white border text-center">Reset password</h2>
            <div class="py-4 px-4 mb-2 bg-white border h-50">
                <div class="py-5">
                    <form action="" style="max-width: 500px;" class=" text-center m-auto">
                        <div class="">
                            <label>Enter your password:</label>
                            <div>
                                <input type="password" id="reset_pass" name="reset_pass"
                                    placeholder="Enter new password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter new password'" required
                                    class="single-input single-input-primary border">
                                <small class=" text-danger error-info" id="rp_pass_error"></small>
                            </div>
                        </div>
                        <div class="">
                            <label>Confirm your password:</label>
                            <div>
                                <input type="password" id="reset_pass" name="reset_pass"
                                    placeholder="Confirm your password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Confirm your password'" required
                                    class="single-input single-input-primary border">
                                <small class=" text-danger error-info" id="rp_conpass_error"></small>
                            </div>
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
require './include/footer.php';
?>
</body>

</html>