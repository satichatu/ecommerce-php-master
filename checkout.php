<?php
ob_start();
session_start(); 
session_regenerate_id(true);
?>
<?php
    if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
?>
<?php include "header.php"; ?>
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
                            <h2>Checkout</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
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
<form action="process.php" method="POST" class="checkout-form">
<div class="row row-40">

    <div class="col-lg-7">

        <!-- Billing Address -->
        <div id="billing-form" class="mb-10">
            <h4 class="checkout-title">Billing Address</h4>

            <div class="row">

                <div class="col-md-6 col-12 mb-20">
                    <label>First Name*</label>
                    <input type="text" name="firstname" required placeholder="First Name">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Last Name*</label>
                    <input type="text" name="lastname" required placeholder="Last Name">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Email Address*</label>
                    <input type="email" name="emailform" required placeholder="Email Address">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Phone no*</label>
                    <input type="text" name="mobileform" required placeholder="Phone number">
                </div>
                <!--
                <div class="col-12 mb-20">
                    <label>Company Name</label>
                    <input type="text" required placeholder="Company Name">
                </div> -->

                <div class="col-12 mb-20">
                    <label>Address*</label>
                    <input type="text" name="address1" required placeholder="Address line 1">
                    <input type="text" name="address2" required placeholder="Address line 2">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Country*</label>
                    <select name="countryform" required class="nice-select">
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="China">China</option>
                            <option>country</option>
                            <option value="India">India</option>
                            <option value="Japan">Japan</option>
                    </select>
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Town/City*</label>
                    <input type="text" name="cityform" required placeholder="Town/City">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>State*</label>
                    <input type="text" name="state" required placeholder="State">
                </div>

                <div class="col-md-6 col-12 mb-20">
                    <label>Zip Code*</label>
                    <input type="text" name="zipcode" required placeholder="Zip Code">
                </div>

                <div class="col-12 mb-20">

                <!--
                    <div class="check-box">
                        <input type="checkbox" id="create_account">
                        <label for="create_account">Create an Acount?</label>
                    </div>
                    <div class="check-box">
                        <input type="checkbox" id="shiping_address" data-shipping="">
                        <label for="shiping_address">Ship to Different Address</label>
                    </div> -->
                </div>

            </div>

        </div>

    <!-- Shipping Address -->
    <div id="shipping-form">
        <h4 class="checkout-title">Shipping Address</h4>

        <div class="row">

            <div class="col-md-6 col-12 mb-20">
                <label>First Name*</label>
                <input type="text" placeholder="First Name">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Last Name*</label>
                <input type="text" placeholder="Last Name">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Email Address*</label>
                <input type="email" placeholder="Email Address">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Phone no*</label>
                <input type="text" placeholder="Phone number">
            </div>

            <div class="col-12 mb-20">
                <label>Company Name</label>
                <input type="text" placeholder="Company Name">
            </div>

            <div class="col-12 mb-20">
                <label>Address*</label>
                <input type="text" placeholder="Address line 1">
                <input type="text" placeholder="Address line 2">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Country*</label>
                <select class="nice-select">
                        <option>Bangladesh</option>
                        <option>China</option>
                        <option>country</option>
                        <option>India</option>
                        <option>Japan</option>
                </select>
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Town/City*</label>
                <input type="text" placeholder="Town/City">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>State*</label>
                <input type="text" placeholder="State">
            </div>

            <div class="col-md-6 col-12 mb-20">
                <label>Zip Code*</label>
                <input type="text" placeholder="Zip Code">
            </div>

        </div>

    </div>

        </div>

        <div class="col-lg-5">
            <div class="row">

                <!-- Cart Total -->
                <div class="col-12 mb-60">

                    <h4 class="checkout-title">Cart Total</h4>

                    <div class="checkout-cart-total">

                        <h4>Product <span>Total</span></h4>

                        <ul>
                        <?php
    $cartres = $fetchcart->fetchAll(PDO::FETCH_ASSOC);
    foreach($cartres as $row){
        
    ?> 

<li><?php echo $row['p_name']; ?> X <?php echo $row['qty']; ?> <span>$<?php echo $row['price']; ?></span></li>
    <?php } ?>   
                        </ul>

 <p>Sub Total <span><?php echo $totalsum; ?></span></p>
 <p>Shipping Fee <span>$00.00</span></p>
 <h4>Grand Total <span><?php echo $totalsum; ?></span></h4>

                    </div>

                </div>

    <!-- Payment Method -->
    <div class="col-12 mb-30">

        <h4 class="checkout-title">Payment Method</h4>

        <div class="checkout-payment-method">
         <!--
            <div class="single-method">
                <input type="radio" id="payment_check" name="payment-method" value="check">
                <label for="payment_check">Check Payment</label>
                <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
            </div> 

            <div class="single-method">
                <input type="radio" id="payment_bank" name="payment-method" value="bank">
                <label for="payment_bank">Direct Bank Transfer</label>
                <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
            </div> -->

            <div class="single-method">
                <input type="radio" id="payment_cash" name="payment-method" value="cash">
                <label for="payment_cash">Cash on Delivery</label>
                <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
            </div>

            <div class="single-method">
                <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                <label for="payment_paypal">Paypal</label>
                <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
            </div>
  <!--
            <div class="single-method">
                <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                <label for="payment_payoneer">Payoneer</label>
                <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
            </div> -->

            <div class="single-method">
                <input type="checkbox" required id="accept_terms">
                <label for="accept_terms">I’ve read and accept the terms & conditions</label>
            </div>

        </div>

        <input type="submit" name="checkout_submit" value="Place order" class="place-order btn btn-lg btn-round">

    </div>

</div>
</div>

</div>
</form> 

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