<?php
ob_start();
session_start(); 
include "header.php" ?>
<?php
    if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
?>
<?php include "conn.php"; ?>
<?php  
                    include "conn.php"; 
                    if(isset($_SESSION['email'])){
                                $email = $_SESSION['email'];
                                $userdetail = $con->prepare("SELECT * FROM user WHERE email = :email");
                                $userdetail->bindParam(":email",$email);
                                $userdetail->execute();
                                $userres = $userdetail->fetch();   
                                $userid = $userres['id'];
                                $useremail = $userres['email'];
                                }
                    $checkorderquery = $con->prepare("SELECT * FROM order_status WHERE user_id = :userid");
                    $checkorderquery->bindParam(":userid",$userid);
                    $checkorderquery->execute();
                    
                
                         $checkAvailblity = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");    
                         $checkAvailblity->bindParam(":email",$useremail);
                         $checkAvailblity->execute();
                         if($checkAvailblity->rowCount() > 0){
                         $result = $checkAvailblity->fetch();
                         $fetchPhone = $result['user_phone'];
                         $fetchFirstname = $result['user_first_name'];
                         $fetchLastname = $result['user_last_name'];
                         $fetchDisplayname = $result['user_display_name'];
                             
                             
                             
                         $fetchAddress = $result['user_address'];
                        }else{
                             
                         $fetchFirstname = '';
                         $fetchLastname = '';
                         $fetchDisplayname = '';       
                         $fetchPhone = '';
                         $fetchAddress = '';    
                         }     
                        
                    ?>
        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>My Account</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--My Account section start-->
        <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container sb-border pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
<div class="row">

<div class="col-12">
    <div class="row">
        <!-- My Account Tab Menu Start -->
        <div class="col-lg-3 col-12">
            <div class="myaccount-tab-menu nav" role="tablist">
            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                Dashboard</a>

            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

        <!--    <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>

            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                Method</a> -->

            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
    <!-- My Account Tab Menu End -->

    <!-- My Account Tab Content Start -->
    <div class="col-lg-9 col-12">
        <div class="tab-content" id="myaccountContent">
            <!-- Single Tab Content Start -->
            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                <div class="myaccount-content">
                   
                   
                    <h3>Dashboard</h3>

                    <div class="welcome mb-20">
                        <p>Hello, <strong><?php if($fetchDisplayname == ''){ echo $email; }else{ echo $fetchDisplayname; } ?></strong> (If Not <strong><?php if($fetchDisplayname == ''){ echo $email . ' '; }else{ echo $fetchDisplayname . ' '; } ?></strong><a href="logout.php" class="logout"> Logout</a>)</p>
                    </div>

                    <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                        recent orders, manage your shipping and billing addresses and edit your
                        password and account details.</p>
                </div>
            </div>
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="tab-pane fade" id="orders" role="tabpanel">
                <div class="myaccount-content">
                    <h3>Orders</h3>
                     

                    <div class="myaccount-table table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                              
                                <th>Name</th>
                                
                                <th>Status</th>
                                <th>Total</th>
                                
                                <th>Tracking Id</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                        <?php if($checkorderquery->rowCount() > 0){
                                $fetchorder = $checkorderquery->fetchAll(PDO::FETCH_ASSOC);
                               foreach($fetchorder as $row){
                                $product_id = $row['product_id'];
                                $fetchproductQuery = $con->prepare("SELECT name FROM product WHERE id = :id");
                                $fetchproductQuery->bindParam(":id",$product_id);
                                $fetchproductQuery->execute();
                                $product_name = $fetchproductQuery->fetchColumn();  
                               
                                ?> 
                            <tr>
                                
                                <td class="pro-title">
                                <a class="user-order-hover" href="cart.php?id=<?php echo $product_id; ?>">    
                                <?php echo $product_name; ?></a>
                                </td>
                               
                                <td><?php echo $row['status']; ?></td>
                                <td>RS<?php echo $row['amount'] ?></td>
                               
                                <td><?php echo $row['order_unique_id'] ?></td>

                                 
                                <?php 
if($row['status'] == 'Order Approve' || $row['status'] == 'Cancel Order' || $row['status'] == 'Order pending' || $row['status'] == 'Out Of Stock' || $row['status'] == 'Product Dispatched'){
    
if($row['status'] == 'Cancel Order'){ ?>
<td><a href="" class="btn">Cancelled </a></td>                                     
                            <?php     }else{ ?>
    <td><a href="#" id="orderUniqueId-<?php echo $row['order_unique_id']; ?>" class="btn cancelOrderBtn">Cancel Order</a></td>                                    
                         <?php        }}else if($row['status'] == 'Return Approve' || $row['status'] == 'Return Dispatched' || $row['status'] == 'Return Request'){
                                ?>
                            

<td><a href="" id="orderUniqueId-<?php echo $row['order_unique_id']; ?>" class="btn">Return Processing</a></td> 
<?php }else if($row['status'] == 'Return Disapprove'){ ?>

<td><a href="" id="orderUniqueId-<?php echo $row['order_unique_id']; ?>" class="btn">Return not approve</a></td> 
<?php }else if($row['status'] == 'Return Complete'){ ?>
    

<td><a href="" id="orderUniqueId-<?php echo $row['order_unique_id']; ?>" class="btn">Return Complete</a></td> 
<?php }else{ ?>

<td><a href="#" id="orderUniqueId-<?php echo $row['order_unique_id']; ?>" class="btn returnOrderBtn">Return Order</a></td> 
<?php } ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                                                                                                           
                            </tr>
                            <?php  }}else{ ?>
                    <h3 class="text-center"><span style="color:gray;">No order yet </span>. . . . . . <a href="shop.php">Start Shopping</a> </h3> 
                        <?php  } ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="tab-pane fade" id="download" role="tabpanel">
                <div class="myaccount-content">
                    <h3>Downloads</h3>

                    <div class="myaccount-table table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Expire</th>
                                <th>Download</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Mostarizing Oil</td>
                                <td>Aug 22, 2018</td>
                                <td>Yes</td>
                                <td><a href="#" class="btn">Download File</a></td>
                            </tr>
                            <tr>
                                <td>Katopeno Altuni</td>
                                <td>Sep 12, 2018</td>
                                <td>Never</td>
                                <td><a href="#" class="btn">Download File</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                <div class="myaccount-content">
                    <h3>Payment Method</h3>

                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                </div>
            </div>
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                <div class="myaccount-content">
                   <div class="editaddressform">
                    <h3>Billing Address</h3>

                    <address>
                       
                       
                        <p><strong><?php echo $fetchAddress; ?></strong></p>
                        
                        <p>Mobile: +91 <?php echo $fetchPhone; ?></p>
                    </address>

                    <a href="" id="editaddressbtn" data-toggle="tab" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>
                    </div>
                    
                    
                    
                    
                    
                    <div class="account-details-form" id="addressform" style="display:none;">
                        <form action="#">
                            <div class="row">

                                <div class="col-12 mb-30">
                                    <input id="formaddressfield" value="<?php echo $fetchAddress; ?>" placeholder="Address" name="address" type="text">
                                </div>

                                <div class="col-12 mb-30">
                                    <input id="numbermobile" value="<?php echo $fetchPhone; ?>" placeholder="Phone no." type="number">
                                </div>
                                   <p class="text-danger" id="errorphoneno" style="font-size:14px; display:none;padding-left:25px;">Please fill valid phone number.</p>
                                <div class="col-12">
                                    <button class="save-change-btn" id="saveaddress">Save Address</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    
                    
                </div>
            </div>
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="tab-pane fade" id="account-info" role="tabpanel">
                <div class="myaccount-content">
                    <h3>Account Details</h3>

                    <div class="account-details-form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-30">
                                    <input id="first-name" value="<?php echo $fetchFirstname; ?>" placeholder="First Name" type="text">
                                </div>

                                <div class="col-lg-6 col-12 mb-30">
                                    <input id="last-name" placeholder="Last Name" value="<?php echo $fetchLastname; ?>" type="text">
                                </div>

                                <div class="col-12 mb-30">
                                    <input id="display-name" placeholder="Display Name" value="<?php echo $fetchDisplayname; ?>" type="text">
                                </div>

                                <div class="col-12 mb-30">
                                    <input id="emaileditform" placeholder="Email Address" value="<?php echo $useremail; ?>" type="email">
                                </div> 
                               
                                 <div class="col-lg-12 col-12 mb-30">
                                   <p class="text-danger" style="display:none;" id="emailExists"> Email already exists </p>
                                    <p class="text-success" style="display:none;" id="emailchanged"> Email changed </p>
                                </div>
                                
                                <div class="col-12 mb-30"><h4>Password change</h4></div>

                                <div class="col-12 mb-30">
                                    <input id="current-pwd" placeholder="Current Password" type="password">
                                </div>
                                
                                <div class="col-lg-12 col-12 mb-30">
                                <p class="text-danger" style="display:none;" id="wrongcurrentpassword"> Wrong password</p> 
                                </div>
                                
                                
                               
                                <div class="col-lg-6 col-12 mb-30">
                                    <input id="new-pwd" placeholder="New Password" type="password">
                                </div>

                                <div class="col-lg-6 col-12 mb-30">
                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password">
                                </div>

                                <div class="col-lg-6 col-12 mb-30">
                                <a href="forgetpassword.php">Forget Password?</a>
                                </div>
                                
                                <div class="col-lg-6 col-12 mb-30">   
                                    <p class="text-danger" style="display:none;" id="passwordLengtherror"> New password cant be less then 6 </p>
                                    <p class="text-danger" style="display:none;" id="passwordNotmatcherror"> Password does not match </p>
                                    <p class="text-danger" style="display:none;" id="passwordOlderror"> Old password is not correct </p>
                                    <p class="text-success" style="display:none;" id="passwordchanged"> Password changed successfully. </p>
                                     
                                </div>
                                
                                <div class="col-12">
                                    <button class="save-change-btn" id="savenamedetails">Save Changes</button>
                                </div>

                            </div> 
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Tab Content End -->
        </div>
    </div>
    <!-- My Account Tab Content End -->
</div>

</div>

</div> 
</div>           
</div>
<!--My Account section end-->

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