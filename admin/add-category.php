<?php
include "header.php";

if (!isset($_SESSION['admin'])) {
    // Redirect to login page or handle as appropriate
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Not Logged In',
            text: 'Please log in to access this page.',
            timer: 3000,
            timerProgressBar: true
        }).then(function() {
            window.location.href = './';
        });
    </script>";
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $categoryName = $_POST['category_name'];

    // Check if an image is selected
    if (!empty($_FILES['category_logo']['name'])) {
        // Process and upload the image
        $uploadDir = "../uploads/"; // Directory to store uploaded images
        $uploadFile = $uploadDir . time() . '_' . basename($_FILES['category_logo']['name']);


        if (move_uploaded_file($_FILES['category_logo']['tmp_name'], $uploadFile)) {
            // Image uploaded successfully, continue with database insertion
            if ($conn) {
                // Sanitize the category name to prevent SQL injection
                $categoryName = mysqli_real_escape_string($conn, $categoryName);

                // SQL query to insert data into the categories table
                $sql = "INSERT INTO categories (category_name, category_logo) VALUES ('$categoryName', '$uploadFile')";

                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    // Insertion successful
                    echo '<script>
                            Swal.fire({
                                title: "Success",
                                text: "Category added successfully!",
                                icon: "success"
                            }).then((value) => {
                                window.location.href = "home"; // Redirect to the category page
                            });
                          </script>';
                } else {
                    // Error in insertion
                    echo '<script>
                            Swal.fire({
                                title: "Error",
                                text: "Error adding category. Please try again later.",
                                icon: "error"
                            });
                          </script>';
                }

                // Close the database connection
                mysqli_close($conn);
            } else {
                // Database connection error
                echo '<script>
                        Swal.fire({
                            title: "Error",
                            text: "Database connection error. Please try again later.",
                            icon: "error"
                        });
                      </script>';
            }
        } else {
            // Error in uploading image
            echo '<script>
                    Swal.fire({
                        title: "Error",
                        text: "Error uploading image. Please try again.",
                        icon: "error"
                    });
                  </script>';
        }
    } else {
        // No image selected
        echo '<script>
                Swal.fire({
                    title: "Error",
                    text: "Please select a category logo.",
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
                    <a href="home" class="icon">
                        <i class="ri-arrow-drop-left-line"></i>
                    </a>
                    <h1>Add Account Category</h1>
                </div>
            </header>
            <!-- ===================================
              START THE SPACE STICKY
            ==================================== -->
            <div class="space-sticky"></div>
            <!-- ===================================
              START THE UPLOAD FORM
            ==================================== -->
            <section class="un-create-collectibles">
             
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder='Snapchat' required>
                </div>

                <div class="form-group">
                    <label>Category Logo</label>
                    <input type="file" name="category_logo" class="form-control" required>
                </div>
               
                <button type="submit" class="btn btn-sm-arrow bg-primary">
        <p>Add Category</p>
        <div class="ico">
            <i class="ri-arrow-drop-right-line"></i>
        </div>
    </button>
              
</form>
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