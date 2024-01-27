<?php
include "../database.php"; // Include your database connection file

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the category ID from the POST data
    $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : null;

    // Check if a valid category ID is provided
    if ($categoryId) {
        // Perform category deletion here
        $sqlDeleteCategory = "DELETE FROM categories WHERE category_id = ?";
        $stmtDeleteCategory = $conn->prepare($sqlDeleteCategory);
        $stmtDeleteCategory->bind_param('i', $categoryId);
        $resultDeleteCategory = $stmtDeleteCategory->execute();

        // Check if the deletion was successful
        if ($resultDeleteCategory) {
            $response = ['success' => true];
        } else {
            // Deletion failed
            $response = ['success' => false, 'message' => 'Error deleting category from the database.'];
        }

        // Close the statement for category deletion
        $stmtDeleteCategory->close();
    } else {
        // Invalid category ID provided
        $response = ['success' => false, 'message' => 'Invalid category ID.'];
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
