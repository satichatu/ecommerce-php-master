<?php
ob_start();
session_start(); 
session_regenerate_id(true);
include "header.php" ?>

<?php

if(!isset($_SESSION['tid']))
{
    header('location:index.php');
}
    if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
?>
<?php include "conn.php"; 

    //Get user id                                            
  
?>
        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Thank You</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Thank You</li>
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
          
            $transaction_id = $_SESSION['tid'];

            ?>
            <p class="alert alert-success">
                Thank You for your order. Your order number is <b><?php echo $transaction_id;
                ?></b>
              </p>
                        
                    </div>
                </div>            
            </div>
        </div>
        <!--Checkout section end-->

<?php

  $product_order_list_query = $con->prepare("SELECT * FROM `product_order_details` WHERE transaction_id =:tracking_id");
  $product_order_list_query->bindParam(":tracking_id",$transaction_id);
  $product_order_list_query->execute();

  $result = $product_order_list_query->fetchAll(PDO::FETCH_ASSOC);



?>





<!--Cart section start-->
<div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
    <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="row">
            
            <div class="col-12">            
                <!-- Cart Table -->
                <div class="cart-table table-responsive mb-30">
                    <table class="table">
                        <thead>
                       
                            <tr>
                               <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Tracking id</th>
                            </tr>
   
                        </thead>
                        <tbody>

                        <?php foreach($result as $row){ ?>     
<tr>

<td class="pro-title"><a href="cart.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a></td>
<td class="pro-price"><span><?php echo $row['price']; ?></span></td>
<td class="pro-subtotal"><span><?php echo $row['qty']; ?></span></td>
<td class="pro-subtotal"><span><?php echo $row['total']; ?></span></td>
<td class="pro-price"><span><?php echo $row['order_unique_id']; ?></span></td>
</tr>
<?php } ?> 

                            
                        </tbody>
                    </table>
                </div>

                <div class="row">

                    <div class="col-lg-6 col-12 mb-5">
                        <!-- Calculate Shipping -->
                        <div class="calculate-shipping">
                            
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-25">
                                       
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                       
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                     
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Discount Coupon -->
                        <div class="discount-coupon">
                           
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-25">
                                       
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                       
                                    </div>
                                </div>
                          
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 mb-30 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Order Summary</h4>
                              <?php 
                   $ordertotal = $con->prepare("SELECT SUM(total) FROM `product_order_details` WHERE transaction_id = :transaction_id");           
                   $ordertotal->bindParam(":transaction_id",$transaction_id);
                   $ordertotal->execute();
                   $totalsum = $ordertotal->fetchColumn();
                   ?>  
                                
                                <h2>Grand Total <span><?php echo $totalsum; ?></span></h2>
                            </div>
                            <div class="cart-summary-button">
                              
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            
        </div>            
    </div>
</div>
<!--Cart section end-->

























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