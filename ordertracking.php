<?php 
ob_start();
session_start();
include "conn.php";
include "header.php";


?>




<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-banner text-center">
                    <h2>Order Tracking</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Order Tracking</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

 


<!-- Order Tracking Form Start -->
<div class="container">
  <div class="row">
     
     <div class="col-12">
         <form action="" id="ordertrackform" class="checkout-form" method="post" onsubmit="return false;">
            <div class="col-12">
             <input type="text" id="ordertrack" placeholder="Tracking order no" name="trackorder">
             </div>
             <div id="trackIdEmpty" style="display:none;margin:5px 0 15px 15px;" class="text-danger">Field cant be empty.</div>
             <div id="trackIdNotFound" style="display:none;margin:5px 0 15px 15px;" class="text-danger">Tracking id not found.</div>

             <div class="col-12">
                <input type="submit" class="btn" name="submitTrackId" id="trackorderbtn" value="Track order"> 
             </div> 
         </form>
     </div>
     
  </div>
</div> 

<!-- Order Tracking Form End -->





<!-- Order Tracking Timeline start -->

            




<div class="container-for-tracking">
 
    <div id="trackingDetails" style="display:none;">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <div class="container padding-bottom-3x mb-1">
       
        <div class="card mb-3">
          <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium trackingIDFirst"> 34VB5540K83</span></div>
          
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via: </span> UPS Ground</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status: </span><span class="trackOrderStatus"> Checking Quality</span></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Last update: </span><span id="orderLastChange"> SEP 09, 2017</span></div>
          </div>
          
          <div class="card-body">
           
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
             
             <!-- Add Completed Class in step class div to show progress  -->
             
             
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title">Confirmed Order</h4>
              </div>
              
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i></div>
                </div>
                <h4 class="step-title">Processing Order</h4>
              </div>
              
              
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon ordercomplete"><i class="ordercomplete pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Product Dispatched</h4>
              </div>
              
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Product Delivered</h4>
              </div>
            </div>
          </div>
        </div>
      <!--  
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
          <div class="custom-control custom-checkbox mr-3">
            <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
            <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
          </div>
          <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
        </div>
        -->
      </div>

     
    <div class="p-4 text-center text-lg rounded-top" style="background:  #ee3333;color:#fff; font-size:22px;display:none;" id="tracking-id-not-found">Tracking id not found . Please check your id.</div>





  <!-- Order Tracking Timeline end -->



  <!-- Order details -->


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
                <th class="pro-thumbnail">Image</th>
                <th class="pro-title">Product</th>
                <th class="pro-price">Price</th>
                <th class="pro-quantity">Quantity</th>
                <th class="pro-subtotal">Total</th>
                <th class="pro-remove">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pro-thumbnail"><a href="" class="order_track_link"><img src="" class="order_track_img" alt="Product"></a></td>
                <td class="pro-title"><a href="#" class="order_track_link Order_track_product_name">Black Cable Restorer</a></td>
                <td class="pro-price"><span id="order_track_price">$25.00</span></td>
                <td class="pro-price"><div class="pro-price"><span id="order_track_qty">1</span></div></td>
                <td class="pro-subtotal"><span class="order_total">$25.00</span></td>
                <td><a href="myaccount.php" class="btn">Return / Cancel Order</a></td>
            </tr>
            
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
                                        <p>Order Date <span id="track_order_date">22-10-1999</span></p>
                                        <p>Order Status <span class="trackOrderStatus">Dispatch</span></p>
                                        <p>Payment Method <span id="track_payment_method">Cash</span></p>
                                        <p>Transiction ID <span class="trackingIDFirst">45df54f4df44df5</span></p>
                                        <h2>Grand Total <span class="order_total">$75.00</span></h2>
                                        
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
        </div>
 </div>
 <!-- Container of whole tracking id results ends here -->





 <!--NewsLetter section start-->
        <div class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter-wrapper">
                            <p class="small-text">Special Ofers For Subscribers</p>
                            <h3 class="title">Ten Percent Member Discount</h3>
                            <p class="short-desc">Subscribe to our newsletters now and stay up to date with new
                                collections, the latest lookbooks and exclusive offers.</p>

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