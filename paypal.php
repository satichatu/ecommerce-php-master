<?php
ob_start();
session_start(); 
session_regenerate_id(true);
include "header.php" ?>
<?php
    if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
?>
<?php include "conn.php"; 

    //Get user id                                            
    $useremail = $_SESSION['email'];
    $fetchuserid = $con->prepare("SELECT * FROM user WHERE email = :email");
    $fetchuserid->bindParam(":email",$useremail);
    $fetchuserid->execute();
    $fetchresofuser = $fetchuserid->fetch();
    $userid = $fetchresofuser['id'];
    
    //Get subtotal of user
    $fetchtotal = $con->prepare("SELECT total FROM total WHERE user_id =:userid");
    $fetchtotal->bindParam(":userid",$userid);
    $fetchtotal->execute();
    $totalsum = $fetchtotal->fetchColumn();                                            
    //Get cart data of the user
    $fetchcart = $con->prepare("SELECT * FROM cart WHERE user_id = :userid");
    $fetchcart->bindParam(":userid",$userid);
    $fetchcart->execute();
?>
        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Online Payment</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Online Payment</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Checkout section start-->
<div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
<div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
<div class="row">
<div class="col-12">                        
        <!-- Checkout Form Start-->
            <?php
           
            $cart_total = $_SESSION['cart_total'];
            $emailfill =  $_SESSION['emailn'];
            $firstname = $_SESSION['fname'];
            $lastname =  $_SESSION['lname'];
            $transaction_id =  $_SESSION['tid'];

            ?>
            <form class="paypal" action="payments.php" method="post" id="paypal_form">
                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="no_note" value="1" />
                <input type="hidden" name="lc" value="UK" />
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                <input type="hidden" name="first_name" value="<?php echo $firstname;?>" />
                <input type="hidden" name="last_name" value="<?php echo $lastname;?>" />
                <input type="hidden" name="payer_email" value="<?php echo $emailfill;?>" />
                <input type="hidden" name="item_number" value="<?php echo $transaction_id; ?>" / >
                <input type="submit" name="submit" value="Continue to Paypal" class="btn btn-primary" />
                <a href="cancel.php" class="btn btn-danger">Cancel</a>
            </form>
                 <?php 
                /* unset($_SESSION['cart_total']);
                 unset($_SESSION['emailn']);
                 unset($_SESSION['fname']);
                 unset($_SESSION['lname']); */
                 ?>       
                    </div>
                </div>            
            </div>
        </div>
        <!--Checkout section end-->

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