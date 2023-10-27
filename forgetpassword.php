<?php ob_start(); session_start();  ?>
        <?php include "header.php"; ?>

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Forget Password</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Forget Password</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Login Register section start-->
        <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
                <div class="row">
                       <!--Register Form Start-->
                        <div class="col-md-2 col-sm-2">
                            
                        </div>
                        <!--Register Form End-->
                        <!--Login Form Start-->
<div class="col-md-8 col-sm-8">
    <div class="customer-login-register">
        <div class="form-login-title">
            <h2>Forget Password</h2>
        </div>
        <div class="login-form">


            <form method="post" id="forgetpassform" onsubmit="preventfromreload()">
                <div class="form-fild">
                    <p><label>Enter your email here <span class="required">*</span></label></p>
                    <input id="resetpasswordvalue" name="email" value="" type="text">
                </div>
                <div id="forgetpassworddiv"></div>
                <div class="login-submit">
                    <input id="resetpasswordbtn" type="submit" name="login" onsubmit="preventfromreload()" class="btn" value="Reset password">

                </div>

            </form>



        </div>
    </div>
</div>
                        <!--Login Form End-->
                        
                        <!--Register Form Start-->
                        <div class="col-md-2 col-sm-2">
                            
                        </div>
                        <!--Register Form End-->
                        
                        
                        
                        
                    </div>            
            </div>
        </div>
        <!--Login Register section end-->

        <!--NewsLetter section start-->
        <div class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter-wrapper">
                            <p class="small-text">Special Ofers For Subscribers</p>
                            <h3 class="title">Ten Percent Member Discount</h3>
                            <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
    
                            <div class="newsletter-form">
                                <form id="mc-form" class="mc-form">
                                    <input type="email" placeholder="Enter Your Email Address Here..." required="">
                                    <button type="submit" value="submit">SUBSCRIBE!</button>
                                </form>
    
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--NewsLetter section end-->

        <?php include "footer.php"; ?>