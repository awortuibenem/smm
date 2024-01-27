<?php
include "header.php";


// Check if the 'user' key is set in the session
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle as appropriate
    header("Location: signin");
    exit();
}

// Retrieve user information from the session
$userInfo = $_SESSION['user'];

// Get the signed-in user's ID and balance
$signedInUserId = $userInfo['user_id'];
$userBalance = $userInfo['balance'];

// Retrieve product ID from the GET parameter
$productId = isset($_GET['productId']) ? $_GET['productId'] : null;

if (!$productId) {
    // Redirect to an error page or handle as appropriate
    header("Location: error");
    exit();
}

// Fetch product details from the database
$sqlProduct = "SELECT product_name, price, email, password FROM products WHERE product_id = $productId";
$resultProduct = $conn->query($sqlProduct);

if ($resultProduct->num_rows > 0) {
    $productData = $resultProduct->fetch_assoc();
    $productName = $productData['product_name'];
    $productPrice = $productData['price'];
    $email = $productData['email'];
    $password = $productData['password'];

    // Check if the user has enough balance to make the purchase
    if ($userBalance >= $productPrice) {
        // Subtract the cost from the user's balance
        $newBalance = $userBalance - $productPrice;

        // Update the user's balance in the session
        $_SESSION['user']['balance'] = $newBalance;

        // Update the user's balance in the users table
        $sqlUpdateBalance = "UPDATE users SET balance = $newBalance WHERE user_id = $signedInUserId";
        $conn->query($sqlUpdateBalance);

        // Insert purchase details into the purchases table
        $sqlInsertPurchase = "INSERT INTO purchases (user_id, product_id, product_name,  email, password) 
                              VALUES ($signedInUserId, $productId, '$productName','$email','$password')";
        $conn->query($sqlInsertPurchase);

        // Redirect to accounts with success message
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Purchase Successful",
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location.href = "accounts";
                });
              </script>';
        exit();
    } else {
        // Redirect to accounts with error message (insufficient balance)
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Insufficient Balance",
                    text: "You do not have enough balance to make this purchase.",
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location.href = "accounts";
                });
              </script>';
        exit();
    }
} else {
    // Redirect to accounts with error message (product not found)
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "Product Not Found",
                text: "The selected product was not found.",
                showConfirmButton: false,
                timer: 3000
            }).then(function() {
                window.location.href = "accounts";
            });
          </script>';
    exit();
}
?>
