<?php
include "header.php";

// Check if the 'user' key is set in the session
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle as appropriate
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

// Query to retrieve user information
$sqlUser = "SELECT email, phone, full_name, balance FROM users WHERE user_id = $signedInUserId";
$resultUser = $conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
    $userData = $resultUser->fetch_assoc();
    $email = $userData['email'];
    $phone = $userData['phone'];
    $name = $userData['full_name'];
    $userBalance = $userData['balance'];
} else {
    // Handle the case where user data is not found
    // You can redirect or display an error message
}

if (isset($_GET['transaction_id']) && !empty($_GET['transaction_id'])) {
    $tx_Ref = $_GET['tx_ref'];
    $transaction_id = $_GET['transaction_id'];

    $url = "https://api.flutterwave.com/v3/transactions/" . $transaction_id . "/verify";

    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer FLWSECK_TEST-401c90c2553fb46faaa99d2a3fbc04db-X",
        "Content-Type: Application/json"
    ]);

    // Execute cURL
    $run = curl_exec($curl);

    // Check for errors
    $error = curl_error($curl);
    if ($error) {
        die("Curl returned some errors: " . $error);
    }

    // Convert to JSON object
    $result = json_decode($run);

    // Check if the 'data' property exists in the response
    if (isset($result->data)) {
        // Retrieve user information from the Flutterwave response
        $status = isset($result->data->status) ? $result->data->status : null;
        $reference = isset($result->data->tx_ref) ? $result->data->tx_ref : null;
        $amount = isset($result->data->amount) ? $result->data->amount : null;

        if (($reference != $tx_Ref) OR ($status !== "successful")) {
            // Display error message
            echo '<script>
                    setTimeout(function(){
                        Swal.fire({
                            icon: "error",
                            title: "Transaction Unsuccessful",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }, 1000);
                    setTimeout(function(){
                        window.location.href = "dashboard";
                    }, 4000);
                  </script>';
            exit;
        }

        // Update user's balance after a successful payment
        $newBalance = $userBalance + $amount;

        // Update the user's balance in the session
        $_SESSION['user']['balance'] = $newBalance;

        // Update the user's balance in the users table
        $sqlUpdateBalance = "UPDATE users SET balance = $newBalance WHERE user_id = $signedInUserId";
        $conn->query($sqlUpdateBalance);

        // Insert transaction details into the transactions table
        $sqlInsert = "INSERT INTO transactions (user_id, transaction_reference, transaction_status, amount) 
                      VALUES ($signedInUserId, '$reference', '$status', $amount)";
        $conn->query($sqlInsert);

        // Display success message
        echo '<script>
                setTimeout(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Transaction Successful",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }, 1000);
                setTimeout(function(){
                    window.location.href = "transactions";
                }, 4000);
              </script>';
    } else {
        // Handle the case where 'data' property is not present in the response
        echo '<script>
                setTimeout(function(){
                    Swal.fire({
                        icon: "error",
                        title: "Invalid API Response",
                        text: "Data property not found",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }, 1000);
                setTimeout(function(){
                    window.location.href = "dashboard";
                }, 4000);
              </script>';
    }
} else {
    // Handle other cases if needed
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
                    <h1>Dashboard</h1>
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
            <!-- ===================================
              START THE ACCOUNT DETAILS
            ==================================== -->
            <section class="un-my-account">
                <!-- head -->
                <div class="head">
                    <div class="my-personal-account">
                        <div class="user">
                        <img src="images/home.png" alt="">
                            <div class="txt-user">
                            <h1><?php echo $userInfo['full_name']; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- body -->
                <div class="body">
                   
                    <div class="my-balance-text">
                        <h2>My Balance</h2>
                        <p>₦ <?php echo number_format($userInfo['balance']); ?></p>
            
                        

                        <button type="button"
                            class="btn btn-md-size effect-click border-primary rounded-pill text-primary"
                            data-bs-toggle="modal" data-bs-target="#mdllAddETH">
                            Add Balance
                        </button>
                    </div>
                </div>
            </section>
            <!-- ===================================
              START ACCOUNT LIST
            ==================================== -->
           
<!-- ... (your existing code) ... -->

<!-- ===================================
    START ACCOUNT LIST
==================================== -->
<section class="un-navMenu-default without-visit">
    <ul class="nav flex-column">
        <?php
        $categoriesQuery = "SELECT * FROM categories";
        $categoriesResult = mysqli_query($conn, $categoriesQuery);

        while ($category = mysqli_fetch_assoc($categoriesResult)) {
            $categoryId = $category['category_id'];
            $categoryName = $category['category_name'];
            $logo = $category['category_logo'];
        ?>
            <li class="nav-item">
                <a class="nav-link visited" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $categoryId; ?>">
                    <div class="item-content-link">
                        <div class="icon bg-green-1 color-green">
                            <img src="<?php echo $logo; ?>" alt="Category Image" style="width: 24px; height: 24px;">
                        </div>
                        <h3 class="link-title"><?php echo $categoryName; ?></h3>
                    </div>
                    <div class="other-cc">
                        
                    <div class="icon-arrow">
                        <i class="ri-eye-fill" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $categoryId; ?>"></i>
        </div>
                    </div>
                </a>
            </li>

            <!-- Dynamic Modal for each category -->
            <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal_<?php echo $categoryId; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="title-modal"><?php echo $categoryName; ?> Accounts </h1>
                            <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ri-close-fill"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="content-upload-item">
                                <p class="text-center">
                                    Select one of the Listed Accounts <br> To Purchase
                                </p>
                                <div class="un-navMenu-default margin-t-30 p-0">
                                    <ul class="nav flex-column">
                                        <?php
                                        // Fetch products associated with the current category
                                        $productsQuery = "SELECT * FROM products WHERE category_id = $categoryId";
                                        $productsResult = mysqli_query($conn, $productsQuery);

                                        if (mysqli_num_rows($productsResult) > 0) {
                                            while ($product = mysqli_fetch_assoc($productsResult)) {
                                                $productId = $product['product_id'];
                                                $productName = $product['product_name'];
                                                $age = $product['age'];
                                                $link = $product['preview_link'];
                                                $price = $product['price'];
                                        ?>
                                                <li class="nav-item mb-3">
                                                    <a class="nav-link effect-click">
                                                        <div class="item-content-link">
                                                            <div class="icon color-text w-auto">
                                                            <img src="<?php echo $logo; ?>" alt="Category Image" style="width: 24px; height: 24px;">
                                                            </div>
                                                            <h3 class="link-title"><?php echo $productName; ?></h3>
                                                        </div>
                                                        <div class="other-cc">
                                                            <span class="badge-text"></span>

                                                            <button class="btn btn-primary purchase-now-btn" style="margin-right: 10px;" data-product-id="<?php echo $productId; ?>" data-product-link="<?php echo $link; ?>" data-product-price="<?php echo $price; ?>">
    Purchase
</button>

<button class="btn btn-secondary preview-btn" data-product-link="<?php echo $link; ?>" data-product-price="<?php echo $price; ?>">
    Preview
</button>

                                                        </div>
                                                    </a>
                                                </li>
                                        <?php
                                            }
                                        } else {
                                            echo "<p>No $categoryName Accounts Found.</p>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <div class="env-pb"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </ul>
</section>

<!-- ... (your existing code) ... -->
<script>
    // Add a click event to each "Purchase Now" button
    var purchaseNowButtons = document.querySelectorAll('.purchase-now-btn');
    purchaseNowButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = this.getAttribute('data-product-id');
            var productLink = this.getAttribute('data-product-link');
            var productPrice = this.getAttribute('data-product-price');
            showPurchasePrompt(productId, productLink, productPrice);
        });
    });

    // Add a click event to each "Preview" button
    var previewButtons = document.querySelectorAll('.preview-btn');
    previewButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productLink = this.getAttribute('data-product-link');
            redirectToLink(productLink);
        });
    });

    function showPurchasePrompt(productId, productLink, productPrice) {
        Swal.fire({
            title: 'Purchase',
            text: 'Are you sure you want to purchase this account for ₦' + productPrice + '?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Purchase',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to purchase.php with necessary parameters
                window.location.href = 'purchase?productId=' + productId;
            }
        });
    }

    function redirectToLink(link) {
        // Handle the redirect logic here
        window.location.href = link;
    }
</script>








 





            
        </div>
       
        <?php
        include "footer.php";
        ?>


    









</body>

</html>