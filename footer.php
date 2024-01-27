
        
    </div>


  
 <!-- ===================================
      START THE MODAL ADD ETH
    ==================================== -->
    <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllAddETH" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="title-modal">Add Funds to your wallet</h1>
                    <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-fill"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content-upload-item">
                        <p class="text-center">
                            Deposit Funds into your wallet
                            <br>
                            Available Payment Method : Flutterwave
                        </p>
                        <br>
                        <form method = "POST">
                        <div class="form-group icon-left">
                            <label>Amount </label>
                            <div class="input_group">
                                <input type="number" id="coins" name ="coins" class="form-control" placeholder="₦ 2000"
                                    required>
                                <div class="icon">
                                    <i class="ri-mail-open-line"></i>
                                </div>
                            </div>
                        </div>
                        <input type="button" onclick="makePayment()" name="submit"  class="btn btn-sm-arrow bg-primary" style="color: white;" value="Deposit">
  
</button>


                    </form>

                    </div>

                </div>
                <div class="modal-footer border-0">
                    <div class="env-pb"></div>
                </div>
            </div>
        </div>
    </div>





    <!-- ===================================
      START THE CART MODAL
    ==================================== --
    <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="cart" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="title-modal">Cart Items</h1>
                    <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-fill"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content-upload-item">
                        <p class="text-center">
                         <h5>  Total Cost: $6 </h5>
                          <h5> Number Of Items: 12</h5>
                        </p>
                        <div class="un-navMenu-default margin-t-30 p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-3">
                                    <a class="nav-link effect-click" href="javascript: void(0)">
                                        <div class="item-content-link">
                                            <div class="icon color-text w-auto">
                                                <i class="ri-exchange-box-line"></i>
                                            </div>
                                            <h3 class="link-title">Deposit from an exchange</h3>
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
      START THE MODAL SIDEBAR MENU - CONNECTED
    ==================================== -->
    <div class="modal sidebarMenu -left fade" id="mdllSidebar-connected" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-block pb-1">

                    <!-- un-user-profile -->
                   

                    <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-fill"></i>
                    </button>

                    <!-- cover-balance -->
                    <img src="./images/favicon.svg" alt="">


                </div>
                <div class="modal-body">
                    <ul class="nav flex-column -active-links">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">
                                <div class="icon_current">
                                    <i class="ri-compass-line"></i>
                                </div>
                                <div class="icon_active">
                                <i class="ri-home-5-fill"></i>
                                </div>
                                <span class="title_link">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transactions">
                                <div class="icon_current">
                                    <i class="ri-compass-line"></i>
                                </div>
                                <div class="icon_active">
                                <i class="ri-exchange-line"></i>
                                </div>
                                <span class="title_link">Transactions</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="accounts">
                                <div class="icon_current">
                                <i class="ri-shopping-bag-line"></i>
                                </div>
                                <div class="icon_active">
                                <i class="ri-shopping-bag-line"></i>
                                </div>
                                <span class="title_link">Accounts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings">
                                <div class="icon_current">
                                <i class="ri-settings-3-line"></i>
                                </div>
                                <div class="icon_active">
                                <i class="ri-settings-3-line"></i>
                                </div>
                                <span class="title_link">Settings</span>
                            </a>
                        </li>
                        <br>
                        <br>
                        <label class="title__label">other</label>

<li class="nav-item">
    <a class="nav-link" href="help">
        <div class="icon_current">
            <i class="ri-questionnaire-line"></i>
        </div>
        <div class="icon_active">
            <i class="ri-questionnaire-fill"></i>
        </div>
        <span class="title_link">Help Center</span>
    </a>
</li>

<li class="nav-item">
                            <a href="logout" class="nav-link">
                                <div class="icon_current">
                                    <i class="ri-logout-box-r-line"></i>
                                </div>
                                <div class="icon_active">
                                    <i class="ri-logout-box-r-fill"></i>
                                </div>
                                <span class="title_link">Sign Out</span>
                            </a>
                        </li>

                        
                    </ul>
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


    <script>
      
      const makePayment = () => {
    let amountOfCoin = document.getElementById('coins').value;
    if (!amountOfCoin) return;

    const generateTransactionRef = () => {
        const timestamp = new Date().getTime();
        return `txref-${timestamp}`;
    }

    FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-2b6ce32d0391633c62d21db745b9b36b-X",
        tx_ref: generateTransactionRef(),
        amount: amountOfCoin ,
        currency: "NGN",
        payment_options: "card, banktransfer, ussd",
        redirect_url: "dashboard",
        meta: {
            source: "docs-inline-test",
            consumer_mac: "92a3-912ba-1192a",
        },
        customer: {
            email: "<?php echo $userInfo['email']; ?>",
            name: "<?php echo $userInfo['full_name']; ?>",
        },
        customizations: {
            title: "Account Spiral",
            description: "Fund Wallet",
            logo: "./images/favicon.svg",
        },
    });
}
</script>



  <!-- JS FILES -->
  <script src="assets/vendors/zuck_stories/zuck.min.js"></script>
    <script src="assets/vendors/smoothscroll/smoothscroll.min.js"></script>
    <script src="assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/nouislider/wNumb.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>