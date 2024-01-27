<?php
include "header.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if ($conn) {
        // SQL query to insert data into the admin table
        $sql = "INSERT INTO admin (full_name, email, password) VALUES ('$full_name', '$email', '$password_hash')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Insertion successful
            echo '<script>
                    swal.fire({
                        title: "Success",
                        text: "Account created successfully!",
                        icon: "success"
                    }).then((value) => {
                        window.location.href = "./"; // Redirect to signin page
                    });
                  </script>';
        } else {
            // Error in insertion
            echo '<script>
                    swal.fire({
                        title: "Error",
                        text: "Error creating account. Please try again later.",
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
                    <a href="signin" class="btn nav-link text-primary size-14 weight-500 pe-0">Sign in</a>
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
                            <label>Full Name</label>
                            <div class="input_group">
                                <input type="text" name="full_name" class="form-control" placeholder="John doe" required>
                                <div class="icon">
                                    <i class="ri-user-3-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Email Address</label>
                            <div class="input_group">
                                <input type="email" name="email" class="form-control" placeholder="example@mail.com"
                                    required>
                                <div class="icon">
                                    <i class="ri-mail-open-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Password</label>
                            <div class="input_group">
                                <input type="password" name="password" class="form-control" placeholder="John$99*04" required>
                                <div class="icon">
                                    <i class="ri-lock-password-line"></i>
                                </div>
                            </div>
                            <div class="feedback-text">Password must be at least <span class="text-dark">6
                                    characters</span> long.</div>
                        </div>
                        <button class="btn btn-sm-arrow bg-primary">
                            <p>Create Account</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </button>
                        
                    </form>
                </div>
            </section>
            <!-- ===================================
              START ACCOUT FOOTER
            ==================================== -->
            <footer class="footer-account">
                <div class="env-pb">
                    <div class="display-actions">
                        
                    </div>
                   
                </div>
            </footer>
        </div>
    </div>

    <!-- ===================================
      START STATUS CONNECTION
    ==================================== -->
    <div class="d-flex justify-content-center">
        <div class="toast status-connection" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>


  <!-- JS FILES -->
  <script src="../assets/vendors/zuck_stories/zuck.min.js"></script>
    <script src="../assets/vendors/smoothscroll/smoothscroll.min.js"></script>
    <script src="../assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="../assets/vendors/nouislider/wNumb.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- PWA APP SERVICE REGISTRATION AND WORKS JS -->
    <script src="../assets/js/pwa-services.js"></script>
</body>

</html>

