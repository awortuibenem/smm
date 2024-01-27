<?php
include "header.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if ($conn) {
        // SQL query to insert data into the users table
        $sql = "INSERT INTO users (full_name, email, phone, password, balance) VALUES ('$full_name', '$email', '$phone', '$password_hash', 0)";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Insertion successful
            echo '<script>
                    swal.fire({
                        title: "Success",
                        text: "Account created successfully!",
                        icon: "success"
                    }).then((value) => {
                        window.location.href = "signin"; // Redirect to signin page
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
                                <input type="text" class="form-control" name="full_name" placeholder= "John doe" required>
                                <div class="icon">
                                    <i class="ri-user-3-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Email Address</label>
                            <div class="input_group">
                                <input type="email" class="form-control" name="email" placeholder= "example@mail.com"
                                    required>
                                <div class="icon">
                                    <i class="ri-mail-open-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Phone Number</label>
                            <div class="input_group">
                                <input type="text" class="form-control" name="phone" placeholder= "+234-***-***3"
                                    required>
                                <div class="icon">
                                <i class="ri-cellphone-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group icon-left">
                            <label>Password</label>
                            <div class="input_group">
                                <input type="password" class="form-control" name="password" placeholder= "John$99*04" required>
                                <div class="icon">
                                    <i class="ri-lock-password-line"></i>
                                </div>
                            </div>
                            
                        </div>
                        
                <button class="btn btn-sm-arrow bg-primary">
                            <p>Register</p>
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


</body>

</html>