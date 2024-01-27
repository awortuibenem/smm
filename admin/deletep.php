<?php
include "../database.php"; // Include your database connection file

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the POST data
    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;

    // Check if a valid product ID is provided
    if ($productId) {
        // Remove associated records from purchases table
        $sqlDeletePurchases = "DELETE FROM purchases WHERE product_id = ?";
        $stmtDeletePurchases = $conn->prepare($sqlDeletePurchases);
        $stmtDeletePurchases->bind_param('i', $productId);
        $resultDeletePurchases = $stmtDeletePurchases->execute();

        // Check if the deletion from purchases was successful
        if ($resultDeletePurchases) {
            // Now, delete the product from the products table
            $sqlDeleteProduct = "DELETE FROM products WHERE product_id = ?";
            $stmtDeleteProduct = $conn->prepare($sqlDeleteProduct);
            $stmtDeleteProduct->bind_param('i', $productId);
            $resultDeleteProduct = $stmtDeleteProduct->execute();

            // Check if the deletion from products was successful
            if ($resultDeleteProduct) {
                $response = ['success' => true];
            } else {
                // Deletion from products failed
                $response = ['success' => false, 'message' => 'Error deleting product from the database.'];
            }

            // Close the statement for product deletion
            $stmtDeleteProduct->close();
        } else {
            // Deletion from purchases failed
            $response = ['success' => false, 'message' => 'Error deleting associated purchases from the database.'];
        }

        // Close the statement for purchases deletion
        $stmtDeletePurchases->close();
    } else {
        // Invalid product ID provided
        $response = ['success' => false, 'message' => 'Invalid product ID.'];
    }

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error
    http_response_code(405);
    echo 'Method Not Allowed';
}
?>
