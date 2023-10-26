<?php include_once "header.php"; ?>
<?php 

    $orderID = isset($_GET['orderUniquID']) ? htmlspecialchars($_GET['orderUniquID']) : 'notavailble';
    
    if($orderID == 'notavailble'){
        ?>
    <div class="order_id_not_availble alert-danger text-center" style="padding-top:10px;padding-bottom:30px;">
        <h1 style="color:#000;">Please Select Any Order Id</h1>
        <a href="manageorder.php">Visit Here to select any order</a>
    </div>    
<?php        
    }else{
 
    //Submit Form change status
    if(isset($_POST['submit'])){
    
    $bulkoption = htmlspecialchars($_POST['bulkoption']);
    echo "<script>alert('$bulkoption');</script>";      
        if($bulkoption == 'Change Status'){
              echo '<div class="alert alert-danger text-center" role="alert">
                No option selected
                </div>';   
          }else{
              $date = date('d-m-Y');
              $changeStatusSql = $con->prepare("UPDATE order_status SET last_status_date=:date,status=:status WHERE order_unique_id = :order_id");
              $changeStatusSql->bindParam(":date",$date);
              $changeStatusSql->bindParam(":status",$bulkoption);
              $changeStatusSql->bindParam(":order_id",$orderID);
              $changeStatusSql->execute();
          }
}    
        
        
        
    $order_custoumer_details_sql = $con->prepare("SELECT * FROM product_order_details WHERE order_unique_id	=:order_unique_id");
    $order_custoumer_details_sql->bindParam(":order_unique_id",$orderID);
    $order_custoumer_details_sql->execute();
        
    $getProductDetails = $order_custoumer_details_sql->fetch();
    
    $transactionID = $getProductDetails['transaction_id'];  
    $product_id = $getProductDetails['p_id'];
    $product_name = $getProductDetails['p_name'];
    $product_price = $getProductDetails['price'];
    $product_qty = $getProductDetails['qty'];
    $product_date = $getProductDetails['date'];
    $product_total = $getProductDetails['total'];
    $product_payment_mode = $getProductDetails['payment_mode'];     
    
    $custoumer_address_details_sql = $con->prepare("SELECT * FROM product_custoumer_details WHERE transaction_id = :t_id");
    $custoumer_address_details_sql->bindParam(":t_id",$transactionID);
    $custoumer_address_details_sql->execute();
        
    $getAddressDetails = $custoumer_address_details_sql->fetch();
        
    $mobile_number = $getAddressDetails['mobile_no'];    
    $email = $getAddressDetails['email'];
    $custoumerName = $getAddressDetails['custoumer_name'];    
    $address = $getAddressDetails['address'];
    $country = $getAddressDetails['country'];
    $city = $getAddressDetails['city'];
    $state = $getAddressDetails['state'];
    $zip = $getAddressDetails['zip'];    
        
    $orderStatusSql = $con->prepare("SELECT * FROM order_status WHERE order_unique_id =:orderID");
    $orderStatusSql->bindParam(":orderID",$orderID);
    $orderStatusSql->execute();
        
    $order_status_data = $orderStatusSql->fetch();    
    $order_status = $order_status_data['status'];
    $orderReturnLastDate = $order_status_data['return_last_date'];    
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>Invoice for purchase #<?php echo $orderID; ?></h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <strong><?php echo $custoumerName; ?>:</strong><br>
                            
                            <strong><?php echo $address; ?></strong><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Order Information</div>
                        <div class="panel-body">
                            <strong>Payment Method:</strong> <?php echo $product_payment_mode; ?><br>
                            <strong>Order Date:</strong> <?php echo $product_date; ?> <br>
                            <strong>Status:</strong> <?php echo $order_status; ?> <br>
                            <?php if($orderReturnLastDate != ''){ ?>
                            <strong>Return Last Date:</strong> <?php echo $orderReturnLastDate; ?> <br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Contact Details</div>
                        <div class="panel-body">
                            <strong>Email:</strong> <?php echo $email; ?><br>
                            <strong>Phone:</strong> <?php echo $mobile_number; ?><br>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Shipping Country</div>
                        <div class="panel-body">
                            <strong>Zip Code:</strong> <?php echo $zip; ?><br>
                            <strong>City:</strong> <?php echo $city; ?><br>
                            <strong>State:</strong> <?php echo $state; ?><br>
                            <strong>Country:</strong> <?php echo $country; ?><br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form action="" method="post">
                           <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="../cart.php?id=<?php echo $product_id; ?>"> <?php echo $product_name; ?> </a></td>
                                    <td class="text-center">€<?php echo $product_price; ?></td>
                                    <td class="text-center"><?php echo $product_qty; ?></td>
                                    <td class="text-right">€<?php echo $product_total; ?></td>
                                </tr>
                                <!--
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right">$958.00</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Shipping</strong></td>
                                    <td class="emptyrow text-right">$20</td>
                                </tr> -->
                                
                                <tr style="border-top:2px solid #000">
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">€<?php echo $product_total; ?></td>
                                </tr>
                                
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
<td class="emptyrow text-center">
        <div class="selectClass">               
    <div id="bulkoption">
        <select class="form-control" name="bulkoption">
            <option value="Change Status">Change Status</option>
            <option value="Order Approve">Approve Order Request</option>
            <option value="Out Of Stock">Out Of Stock</option>
            <option value="Product Dispatched">Product Dispatched</option>
            <option value="Product Delivered">Product Delivered</option>
            <option value="Return Approve">Return Approve</option>
            <option value="Return Disapprove">Reject Return Request</option>
            <option value="Return Dispatched">Return Dispatched</option>
            <option value="Return Complete">Return Complete</option>
        </select>
    
    </div>               
    </div>
</td>
                                   
<td class="emptyrow text-right">
    <input type="submit" onclick="javascript: return confirm('Are you sure to do this action');" name="submit" class="btn btn-success" value="Change Status">                                        
</td>
                               
</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<?php

?>
<?php  } ?>

<?php include_once "header.php"; ?>