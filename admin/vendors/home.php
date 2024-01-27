<?php
include "header.php";
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

                    <div class="un-user-profile">
                        <a href="" aria-label="profile">
                        <img class="img-avatar" src="images/avatar/11.jpg" alt="">
                        </a>
                    </div>

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
                        <img src="images/avatar/11.jpg" alt="">
                            <div class="txt-user">
                                <h1>Rocco Gavin</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- body -->
                <div class="body">
                   
                    <div class="my-balance-text">
                        <h2>My Balance</h2>
                        <p>3,650 ETH</p>

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
            <section class="un-navMenu-default without-visit">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link visited" href="page-my-wallet.html">
                            <div class="item-content-link">
                                <div class="icon bg-green-1 color-green">
                                    <i class="ri-wallet-line"></i>
                                </div>
                                <h3 class="link-title">My Wallet</h3>
                            </div>
                            <div class="other-cc">
                                <div class="icon-arrow">
                                    <i class="ri-arrow-drop-right-line"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page-news-list.html">
                            <div class="item-content-link">
                                <div class="icon bg-pink-1 color-pink">
                                    <i class="ri-file-list-2-line"></i>
                                </div>
                                <h3 class="link-title">News List</h3>
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
            </section>
            
        </div>
       
        <?php
        include "footer.php";
        ?>



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