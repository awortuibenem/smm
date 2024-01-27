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
                    <h1>Help Center</h1>
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
              START THE SEARCH
            ==================================== -->
            <section class="help-search-support">
                <div class="content">
                    <div class="head">
                        <h2>How can we Help?</h2>
                        <p>A fully functional search system.</p>
                    </div>
                    <div class="form-group with_icon m-0">
                        <div class="input_group">
                            <input type="search" class="form-control border-0" placeholder="Write something here...">
                            <div class="icon">
                                <i class="ri-search-2-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ===================================
              START THE DESCRIPTION
            ==================================== -->
            <section class="about-section">
                <div class="un-navMenu-default without-icon py-0">
                    <ul class="nav flex-column">
     
                        <li class="nav-item mb-0">
                            <a class="nav-link" href="mailto:acctscript@gmail.com">
                                <div class="item-content-link">
                                    <div class="icon color-green w-auto">
                                        <i class="ri-mail-open-line"></i>
                                    </div>
                                    <h3 class="link-title">Email Support</h3>
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
                <div class="descriptio">
                    <h2>Frequent Questions</h2>
                    <p>
                        We get asked these questions a lot, so we made this small section to help you out identifying
                        what you need faster.
                    </p>
                </div>
                <div class="accordion padding-x-20" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How does the purchasing process work on your website?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            The purchasing process is straightforward. Simply browse through our available social media accounts, choose the one that suits your needs, and proceed to the checkout. Once the payment is confirmed, you'll receive instructions on accessing your newly acquired account.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Are the social media accounts you're selling legitimate and safe to use?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong> Yes,</strong> all the social media accounts available on our platform are legitimate and safe. We ensure that our accounts comply with the respective platform's terms of service. You can buy with confidence, knowing that your purchased accounts meet industry standards.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What measures do you take to protect the privacy and security of purchased accounts?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            We take privacy and security seriously. After the purchase is completed, we recommend updating the account credentials and enabling any additional security features provided by the social media platform. This helps to ensure the confidentiality and security of your purchased account.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What happens if I encounter issues with the purchased account after the transaction?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            We strive to provide a smooth experience, but if you encounter any issues with your purchased account, please reach out to our customer support. We're here to assist you and will work to resolve any problems promptly.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I change the username or other details of the purchased social media account?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            In most cases, you can customize the details of your purchased account, such as the username or profile information. However, please be aware that certain platforms have specific limitations or waiting periods for making such changes. Refer to the platform's guidelines or contact our support team for more information on account customization.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        include "footer.php";
        ?>

</body>

</html>