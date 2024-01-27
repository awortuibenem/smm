<?php
include "header.php";

// Check if the 'user' key is set in the session
if (!isset($_SESSION['user'])) {
    // Redirect to login page or handle as appropriate
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Not Logged In',
            text: 'Please log in to access this page.',
            timer: 3000,
            timerProgressBar: true
        }).then(function() {
            window.location.href = 'signin';
        });
    </script>";
    exit();
}

// Retrieve user information from the session
$userInfo = $_SESSION['user'];

// Get the signed-in user's ID
$signedInUserId = $userInfo['user_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['full_name'];
    $phoneNumber = $_POST['phone_number'];

    // Validate and sanitize input (add more validation as needed)
    $fullName = mysqli_real_escape_string($conn, $fullName);
    $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);

    // Update user information in the database
    $sqlUpdateUser = "UPDATE users SET full_name = '$fullName', phone = '$phoneNumber' WHERE user_id = $signedInUserId";

    if ($conn->query($sqlUpdateUser) === TRUE) {
        // Update user information in the session
        $_SESSION['user']['full_name'] = $fullName;
        $_SESSION['user']['phone'] = $phoneNumber;

        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Profile Updated Successfully',
                timer: 3000,
                timerProgressBar: true
            }).then(function() {
                window.location.href = 'settings';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error updating profile. Please try again.',
                timer: 3000,
                timerProgressBar: true
            });
        </script>";
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
                <div class="un-title-page">
                    <h1>Settings</h1>
                </div>
                <div class="un-block-right">

                    <!-- menu-sidebar -->
                    <div class="menu-sidebar">
                        <button type="button" name="sidebarMenu" aria-label="sidebarMenu" class="btn"
                            data-bs-toggle="modal" data-bs-target="#mdllSidebar-connected">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="9.3" viewBox="0 0 19 9.3">
                                <g id="Group_8081" data-name="Group 8081" transform="translate(-329 -37)">
                                    <rect id="Rectangle_3986" data-name="Rectangle 3986" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 37)" fill="#222032" />
                                    <rect id="Rectangle_3987" data-name="Rectangle 3987" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 44)" fill="#222032" />
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>
            <!-- ===================================
              START THE SPACE STICKY
            ==================================== -->
            <div class="space-sticky"></div>
           
            <section class="padding-20 form-edit-profile margin-b-20">

            <form method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text"  name="full_name" class="form-control" value="<?php echo $userInfo['full_name']; ?>">
                </div>

                <div class="form-group">
                    <label>E-Mail Address</label>
                    <input type="email" class="form-control" value="<?php echo $userInfo['email']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" class="form-control" value="<?php echo $userInfo['phone']; ?>">
                </div>
                <button class="btn btn-sm-arrow bg-primary">
                            <p>Update Profile</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </button>
</form>



            </section>
        
        </div>
    </div>
    <?php
        include "footer.php";
        ?>



</body>

</html>