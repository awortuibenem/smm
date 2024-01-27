<?php
include "header.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($conn) {
        // Check if the user exists
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Check if any row is returned
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Verify the password
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user'] = $row;

                    // Redirect to home
                    echo '<script>
                    swal.fire({
                        title: "Success",
                        text: "Login Successful!",
                        icon: "success"
                    }).then((value) => {
                        window.location.href = "dashboard"; 
                    });
                  </script>';
                } else {
                    // Incorrect password
                    echo '<script>
                            swal.fire({
                                title: "Error",
                                text: "Incorrect password. Please try again.",
                                icon: "error"
                            });
                          </script>';
                }
            } else {
                // User does not exist
                echo '<script>
                        swal.fire({
                            title: "Error",
                            text: "Email Address does not exist.",
                            icon: "error"
                        });
                      </script>';
            }
        } else {
            // Database query error
            echo '<script>
                    swal.fire({
                        title: "Error",
                        text: "Database query error. Please try again later.",
                        icon: "error"
                    });
                  </script>';
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Database connection error
        echo '<script>
                swal.fire({
                    title: "Error",
                    text: "Database connection error. Please try again later.",
                    icon: "error"
                });
              </script>';
    }
}
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
                    <a href="./" class="icon">
                        <i class="ri-arrow-drop-left-line"></i>
                    </a>
                    <h1></h1>
                </div>
                <div class="un-block-right">
                    <a href="signup" class="btn nav-link text-primary size-14 weight-500 pe-0">Create Account</a>
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
                    <h1>Let's Get Started!</h1>
                </div>
                <div class="content__form margin-t-40">
                    <form method = "POST">
                        <div class="form-group icon-left">
                            <label>Email Address</label>
                            <div class="input_group">
                                <input type="email" name = "email" class="form-control" placeholder='e. g. "example@mail.com"'
                                    required>
                                <div class="icon">
                                    <i class="ri-mail-open-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Password</label>
                            <div class="input_group">
                                <input type="password" name= "password" class="form-control" placeholder='e. g. "John$99*04"' required>
                                <div class="icon">
                                    <i class="ri-lock-password-line"></i>
                                </div>
                              
                            </div>
                            <!--
                            <a href="forgot-password" class="text-primary size-13 margin-t-14 d-block text-decoration-none weight-500">Forgot Password?</a>
-->
                        </div>
                    
                        <button class="btn btn-sm-arrow bg-primary">
                            <p>Sign In</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </button>

                    </form>
                </div>
            </section>
           
        </div>
    </div>

    <!-- ===================================
      START STATUS CONNECTION
    ==================================== -->
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