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
    $accountName = $_POST['account_name'];
    $categoryId = $_POST['category_id'];
    $previewLink = $_POST['preview_link'];
    $price = $_POST['price'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($conn) {
        // Sanitize input to prevent SQL injection
        $accountName = mysqli_real_escape_string($conn, $accountName);
        $categoryId = mysqli_real_escape_string($conn, $categoryId);
        $previewLink = mysqli_real_escape_string($conn, $previewLink);
        $price = mysqli_real_escape_string($conn, $price);
        $age = mysqli_real_escape_string($conn, $age);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // SQL query to insert data into the products table
        $sql = "INSERT INTO products (product_name, category_id, email, password,  preview_link, price, age) 
                VALUES ('$accountName', '$categoryId', '$email', '$password', '$previewLink', '$price', '$age')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Insertion successful
            echo '<script>
                    Swal.fire({
                        title: "Success",
                        text: "Product added successfully!",
                        icon: "success"
                    }).then((value) => {
                        window.location.href = "home"; // Redirect to the home page
                    });
                  </script>';
        } else {
            // Error in insertion
            echo '<script>
                    Swal.fire({
                        title: "Error",
                        text: "Error adding product. Please try again later.",
                        icon: "error"
                    });
                  </script>';
        }

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
}

// Fetch categories from the database
if ($conn) {
    $categoryOptions = '';
    $result = mysqli_query($conn, "SELECT * FROM categories");

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryId = $row['category_id'];
            $categoryName = $row['category_name'];
            $categoryOptions .= "<option value='$categoryId'>$categoryName</option>";
        }
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
                    <h1>Add Account</h1>
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
        <label>Account Name</label>
        <input type="text" name="account_name" class="form-control" placeholder='Facebook Account' required>
    </div>

    <div class="form-group">
        <label>Account Category</label>
        <select name="category_id" class="form-control" required>
            <?php echo $categoryOptions; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Preview Link</label>
        <input type="text" name="preview_link" class="form-control" placeholder='https://instagram.com/instagram' required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" placeholder='₦ 2,000' required>
    </div>

    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control" placeholder='2 Yrs' required>
    </div>

    <div class="form-group">
        <label>Account Email</label>
        <input type="email" name="email" class="form-control" placeholder='Email Address' required>
    </div>

    <div class="form-group">
        <label>Account Password</label>
        <input type="password" name="password" class="form-control" placeholder='Password' required>
    </div>

    <button type="submit" class="btn btn-sm-arrow bg-primary">
        <p>Add Product</p>
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