<?php
include "header.php";

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

// Fetch purchase history from the database
$userId = $_SESSION['user']['user_id'];
$sql = "SELECT purchases.*, purchases.email, purchases.password, categories.category_name
        FROM purchases
        JOIN users ON purchases.user_id = users.user_id
        JOIN products ON purchases.product_id = products.product_id
        JOIN categories ON products.category_id = categories.category_id
        WHERE purchases.user_id = $userId
        ORDER BY purchases.purchase_date DESC";

$result = $conn->query($sql);
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
                    <h1>Accounts</h1>
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

        <section class="log-table-simple">
            <h3>Purchase log</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $purchaseDate = date('j M Y, g:i A', strtotime($row['purchase_date']));
                            $productName = $row['product_name'];
                            $categoryName = $row['category_name'];
                            $email = $row['email'];
                            $password = $row['password'];
                    ?>
                            <tr>
                                <td><?php echo $purchaseDate; ?></td>
                                <td><?php echo $productName; ?></td>
                                <td><?php echo $categoryName; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $password; ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No purchase history available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</div>


    <?php
        include "footer.php";
        ?>


</body>

</html>