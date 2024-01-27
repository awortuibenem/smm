<?php
include "header.php";
?>
    <!-- START WRAPPER -->
    <div id="wrapper">
        <!-- START CONTENT -->
        <div id="content">
            <!-- ===================================
              START THE HEADER
            ==================================== -->
            <header class="default heade-sticky">
                <div class="un-title-page go-back">
                    <a href="signin" class="icon">
                        <i class="ri-arrow-drop-left-line"></i>
                    </a>
                    <h1></h1>
                </div>
            </header>
            <!-- ===================================
              START THE SPACE STICKY
            ==================================== -->
            <div class="space-sticky"></div>
            <!-- ===================================
              START THE FORM
            ==================================== -->
            <section class="account-section padding-20">
                <div class="display-title">
                    <h1>Reset Password</h1>
                    <p>A password reset link will be sent to the email entered below</p>
                </div>
                <div class="content__form margin-t-40">
                    <form>
                        <div class="form-group icon-left">
                            <label>Email Address</label>
                            <div class="input_group">
                                <input type="email" class="form-control" placeholder='e. g. "example@mail.com"'
                                    required>
                                <div class="icon">
                                    <i class="ri-mail-open-line"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <footer class="footer-account">
                <div class="env-pb">
                    <div class="display-actions">
                        <a href="#" class="btn btn-sm-arrow bg-primary">
                            <p>Send Link</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </footer>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="toast status-connection" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>



    <!-- JS FILES -->
    <script src="assets/vendors/zuck_stories/zuck.min.js"></script>
    <script src="assets/vendors/smoothscroll/smoothscroll.min.js"></script>
    <script src="assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/nouislider/wNumb.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- PWA APP SERVICE REGISTRATION AND WORKS JS -->
    <script src="assets/js/pwa-services.js"></script>
</body>

</html>