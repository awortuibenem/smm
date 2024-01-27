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

// Query to retrieve user information
$sqlUser = "SELECT email, phone, full_name FROM users WHERE user_id = $signedInUserId";
$resultUser = $conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
    $userData = $resultUser->fetch_assoc();
    $email = $userData['email'];
    $phone = $userData['phone'];
    $name = $userData['full_name'];
} else {
    // Handle the case where user data is not found
    // You can redirect or display an error message
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
                    <h1>Transactions</h1>
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
              START WALLET ADDRESS
            ==================================== -->
            <section class="un-my-account">
                <!-- head -->
                
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
              START OPERATION LOG
            ==================================== -->
            <section class="log-table-simple">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to retrieve transactions for the signed-in user
                $sqlTransactions = "SELECT * FROM transactions WHERE user_id = $signedInUserId ORDER BY transaction_id DESC";

                $resultTransactions = $conn->query($sqlTransactions);

                if ($resultTransactions->num_rows > 0) {
                    while ($transaction = $resultTransactions->fetch_assoc()) {
                        $transactionType = $transaction['transaction_type'];
                        $amount = $transaction['amount'];
                        $date = date('j M Y, g:i A', strtotime($transaction['created_at']));
                ?>
                        <tr>
                            <td><?php echo $transactionType; ?></td>
                            <td><span class="text-dark"><?php echo number_format($amount); ?></span></td>
                            <td><?php echo $date; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="3">No transactions found</td></tr>';
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