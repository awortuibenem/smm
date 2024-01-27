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
?>
<!-- START WRAPPER -->
<div id="wrapper">
    <!-- START CONTENT -->
    <div id="content">
        <!-- START THE HEADER -->
        <header class="default heade-sticky">
            <div class="un-block-right">
                <button type="button" class="btn btn-box-icon bg-snow text-dark" data-bs-toggle="modal"
                    data-bs-target="#mdllShareProfile">
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
        </header>

        <!-- START THE SPACE STICKY -->
        <div class="space-sticky"></div>

        <!-- START - PROFILES DETAILS -->
        <section class="un-creator-ptofile">
            <!-- head -->
            <div class="head">
                <div class="cover-image">
                    <img src="../images/other/20.jpg" alt="cover image">
                </div>
                <div class="text-user-creator">
                    <div class="d-flex align-items-center">
                        <div class="user-img">
                            <picture>
                                <source srcset="../images/avatar/11.jpg" type="image/jpg">
                                <img src="../images/avatar/11.jpg" alt="creator image">
                            </picture>
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                        <div class="text">
                            <h3><?php echo isset($_SESSION['admin']['full_name']) ? $_SESSION['admin']['full_name'] : ''; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- body -->
            <div class="body"></div>

            <div class="tab-creatore-profile">
                <ul class="nav nav-pills nav-pilled-tab w-100" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-Items-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Items" type="button" role="tab" aria-controls="pills-Items"
                            aria-selected="true">Accounts</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Selling-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Selling" type="button" role="tab" aria-controls="pills-Selling"
                            aria-selected="false">Account Categories</button>
                    </li>
                </ul>

                <div class="tab-content content-custome-data" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-Items" role="tabpanel"
                        aria-labelledby="pills-Items-tab">
                        <!-- item-card-gradual for Products -->
                        <?php
                        if ($conn) {
                            $productsQuery = "SELECT * FROM products";
                            $productsResult = mysqli_query($conn, $productsQuery);

                            while ($product = mysqli_fetch_assoc($productsResult)) {
                                $productId = $product['product_id'];
                                $accountName = $product['product_name'];
                                $categoryId = $product['category_id'];
                                $previewLink = $product['preview_link'];
                                $price = $product['price'];
                                $age = $product['age'];

                                // Fetch category name based on category_id
                                $categoryQuery = "SELECT category_name FROM categories WHERE category_id = '$categoryId'";
                                $categoryResult = mysqli_query($conn, $categoryQuery);
                                $categoryName = ($categoryResult && mysqli_num_rows($categoryResult) > 0) ? mysqli_fetch_assoc($categoryResult)['category_name'] : 'N/A';
                        ?>
                                <div class="item-card-gradual" data-id="<?php echo $productId; ?>">
                                    <a href="<?php echo $previewLink; ?>" class="body-card py-0" target="_blank">
                                        <div class="cover-nft">
                                            <img class="img-cover" src="../images/home.png" alt="image NFT">
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>₦ <?php echo number_format($price); ?></h4>
                                            <h5><?php echo $accountName; ?></h5>
                                            <span><?php echo $categoryName; ?> <?php echo $age; ?> - Yr(s)</span>
                                        </div>
                                        <button type="button" class="btn btn-md-size effect-click bg-red text-white rounded-pill" onclick="deleteProduct(<?php echo $productId; ?>)">
                        Delete
                    </button>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- End of product display loop -->
                    </div>

                    <div class="tab-pane fade" id="pills-Selling" role="tabpanel" aria-labelledby="pills-Selling-tab">
                        <!-- item-card-gradual for Categories -->
                        <?php
                        if ($conn) {
                            $categoriesQuery = "SELECT * FROM categories";
                            $categoriesResult = mysqli_query($conn, $categoriesQuery);

                            while ($category = mysqli_fetch_assoc($categoriesResult)) {
                                $categoryId = $category['category_id'];
                                $categoryName = $category['category_name'];
                                $categoryLogo = $category['category_logo'];
                        ?>
                                <div class="item-card-gradual" data-id="<?php echo $categoryId; ?>">
                                    <a href="#" class="body-card py-0">
                                        <div class="cover-nft">
                                            <picture>
                                                <source srcset="<?php echo $categoryLogo; ?>" type="image/jpg">
                                                <img class="img-cover" src="<?php echo $categoryLogo; ?>" alt="<?php echo $categoryName; ?>">
                                            </picture>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4><?php echo $categoryName; ?></h4>
                                        </div>
                                        <button type="button" class="btn btn-md-size effect-click bg-red text-white rounded-pill" onclick="deleteCategory(<?php echo $categoryId; ?>)">
                        Delete
                    </button>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- End of category display loop -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>



<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllShareProfile" tabindex="-1"
    aria-labelledby="modalShareProfile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="item-shared">
                    <div class="txt">
                    <h3><?php echo isset($_SESSION['admin']['full_name']) ? $_SESSION['admin']['full_name'] : ''; ?></h3>
                
                    </div>
                </div>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-share-socials">

                    <div class="un-navMenu-default p-0">
                        <div class="sub-title-pkg">
                            <h2>Actions</h2>
                        </div>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link facebook" href="add">
                                    <div class="item-content-link">
                                        <h3 class="link-title">Add Account</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link facebook" href="add-category">
                                    <div class="item-content-link">
                                        <h3 class="link-title">Add Account Category</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link facebook" href="">
                                    <div class="item-content-link">
                                        <h3 class="link-title">Manage Accounts</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
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






<script>
function deleteProduct(productId) {
    // Show SweetAlert confirmation dialog for product deletion
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request to delete product
            $.ajax({
                type: 'POST',
                url: 'deletep.php',
                data: { productId: productId },
                success: function (response) {
                    handleDeleteResponse(response);
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.error(xhr.responseText);
                }
            });
        }
    });
}

function handleDeleteResponse(response) {
    // Handle the AJAX response for product deletion
    if (response.success) {
        Swal.fire({
            icon: 'success',
            title: 'Product deleted successfully!',
            showConfirmButton: false,
            timer: 1500
        }).then(function () {
            // Reload the page or update the UI as needed
            location.reload();
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error deleting product',
            text: response.message
        });
    }
}
</script>



<script>
function deleteCategory(categoryId) {
    // Show SweetAlert confirmation dialog for category deletion
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request to delete category
            $.ajax({
                type: 'POST',
                url: 'deletec.php', // Update with the actual PHP file handling category deletion
                data: { categoryId: categoryId },
                success: function (response) {
                    handleDeleteResponse(response);
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.error(xhr.responseText);
                }
            });
        }
    });
}
</script>











</body>

</html>