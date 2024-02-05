<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="<?php echo BASE_URL; ?>index.php" target="_blank"><strong
                            class="text-dark">BookitFast</strong></a>
                    - Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                    </script> All rights reserved
                </p>
            </div>
            <!-- <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Terms</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</footer>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>

<!-- <script src="js/jquery.nice-select.min.js"></script> -->
<script src="<?php echo BASE_URL; ?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/popper.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/vendor/bootstrap.min.js"></script>

<script src="<?php echo BASE_URL; ?>js/jquery-ui.js"></script>
<script src="<?php echo BASE_URL; ?>js/easing.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/hoverIntent.js"></script>
<script src="<?php echo BASE_URL; ?>js/superfish.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?php echo BASE_URL; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/index.js"></script>
<script src="<?php echo BASE_URL; ?>admin/js/app.js"></script>

<script src="<?php echo BASE_URL; ?>admin/js/admin.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>admin/js/include.js"></script>
<script>
$(document).ready(function() {
    // Get the current page URL
    var currentPageUrl = window.location.href;

    // Loop through each sidebar link and check if its href matches the current page URL
    $('.sidebar-link').each(function() {
        var linkUrl = $(this).attr('href');

        // Compare the URLs and add the "active" class if they match
        if (currentPageUrl.includes(linkUrl)) {
            $(this).closest('.sidebar-item').addClass('active');
        }
    });
});
</script>