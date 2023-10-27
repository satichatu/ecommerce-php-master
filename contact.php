<?php ob_start();
session_start(); 
include "header.php"; ?>

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Contact</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Contact Map section start-->
        <div class="contact-map-section section">
            <div id="contact-map" class="contact-map"></div>
        </div>
        <!--Contact Map section End-->
        
        <!--Contact section start-->
        <div class="conact-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
            <div class="container sb-border pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
               
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="contact-information">
                            <h3>Contact Us</h3>
                            <ul>
                                <li>
                                    <span class="icon"><i class="fa fa-home"></i></span>
                                    <h4 class="text">Address</h4>
                                    <p>123 Main Street, Anytown, CA 12345 – USA</p>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-envelope-open-o"></i></span>
                                    <h4 class="text">Email</h4>
                                    <p>yourmail@domain.com<br>
                                        support@roadthemes.com</p>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-phone"></i></span>
                                    <h4 class="text">Phone</h4>
                                    <p>Mobile: (08) 123 456 789<br>
                                        Hotline: 1009 678 456</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="contact-form-wrap">
                            <h3 class="contact-title">Tell Us Your Message</h3>
<form id="contact-form" action="" method="post">
<div class="row">
    <div class="col-md-12">
        <div class="contact-form-style mb-20">
            <input required id="con_name" name="con_name" placeholder="Name*" type="text">
        </div>
    </div>
    <div class="col-md-12">
        <div class="contact-form-style mb-20">
            <input required name="con_email" id="con_email" placeholder="Email*" type="email">
        </div>
    </div>
    <div class="col-md-12">
        <div class="contact-form-style mb-20">
            <input required id="subject" name="subject" placeholder="Subject*" type="text">
        </div>
    </div>
    <div class="col-md-12">
        <div class="contact-form-style">
            <textarea required id="con_message" name="con_message" placeholder="Type your message here.."></textarea>
            <button class="btn" id="contactsubmit" type="submit"><span>Send message</span></button>
        </div>
    </div>
</div>
</form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Contact section end-->

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