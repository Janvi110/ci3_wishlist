<!doctype html>
<html>
<head>
    <title><?php echo isset($title) ? $title : 'Easy Wishlist'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
</head>

<body>
    <div class="container mz-full-width">

        <div class="col-md-8 mz-left-sidebar">
            <div class="login-left">
                <div class="col-md-12">
                    <div class="mz-app-logo">
                        <a href="https://www.metizsoft.com/" target="_blank"><img src="<?php echo base_url('assets/images/mainlogo.png'); ?>" class="logo-img"></a>
                    </div>
                </div>     
                <div class="col-md-12">
                    <div class="app-div">
                        <div class="main-app-logo">
                            <img src="<?php echo base_url('assets/images/easywishlisticon.png'); ?>" class="logo-size">
                        </div>
                        <span>Easy Wishlist</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <div class="signup-box">
                        <div class="signup-title"> Sign up or sign in to <span class="mz-app-text">Easy Wishlist</span></div>
                        <form class="form-horizontal" role="form" action="" method="post">
                            <input type="text" name="shop" id="shop" placeholder="yourstore.myshopify.com" class="email-text" required="">
                            <p>Enter your Store domain, sub-domain version of myshopify.com<br />
                                (xxx.myshopify.com version not the Naked Domain).</p>
                            <input type="submit" name="submit" class="email-submit" value="Submit">
                        </form>
                    </div>
                </div> 
            </div>
        </div>

        <div class="col-md-4 mz-right-sidebar">
            <div class="login-right">
                <div class="col-md-12">
                    <div class="app-content">
                        <div>Other Awesome Apps</div>
                        <div>by Metizsoft to Boost Your Business</div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="logo-content">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/eucookie/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo2.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <a href="https://metizapps.com/eucookie/login" target="_blank"><h4>GDPR Cookie Compiler</h4></a>
                                    <p class="package">Free</p>
                                    <p class="desc">Get GDPR Cookie Compliance Easier</p>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/ageverification/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo3.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <h4><a href="https://metizapps.com/ageverification/login" target="_blank">Age Verifier</a></h4>
                                    <p class="package">7-day free trial</p>
                                    <p class="desc">Age Verifier App to restrict under-age visitors</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/wishlist/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo4.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <h4><a href="https://metizapps.com/wishlist/login" target="_blank">Easy Wishlist</a></h4>
                                    <p class="package">7-day free trial</p>
                                    <p class="desc">Customer can add favorite items to wishlist</p>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/shippingbanner/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo5.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <h4><a href="https://metizapps.com/shippingbanner/login" target="_blank">Easy Free Shipping Bar</a></h4>
                                    <p class="package">Free</p>
                                    <p class="desc">Offer free shipping to increase your average revenue and boost</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/storelocator/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo1.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <h4><a href="https://metizapps.com/storelocator/login" target="_blank">Store Locator by Metizsoft</a></h4>
                                    <p class="package">Free</p>
                                    <p class="desc">The Most User Friendly Store Locator App</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mz-app-link">
                                    <a href="https://metizapps.com/notificationbar/login" target="_blank">
                                    <div class="mzapp-icon"><img src="<?php echo base_url('assets/images/logo6.png'); ?>" class="logo-size"></a></div>
                                </div>
                                <div class="mz-app-detail">
                                    <h4><a href="https://metizapps.com/notificationbar/login" target="_blank">Country based Announcement Bar</a></h4>
                                    <p class="package">Free</p>
                                    <p class="desc">Easy way to make notification bar based on country</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>