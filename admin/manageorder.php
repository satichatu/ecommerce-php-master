<?php include_once "header.php"; ?>
<?php 
   
  $orderType = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : 'allorder';
    
  if(isset($_POST['checkBoxarr'])){
      foreach($_POST['checkBoxarr'] as $row){
          $order_id = htmlspecialchars($row);
          $bulkoption = htmlspecialchars($_POST['bulkoption']);
          if($bulkoption == 'Change Status'){
              echo '<div class="alert alert-danger text-center" role="alert">
                No option selected
                </div>';   
          }else{
              if($bulkoption == 'Product Delivered'){
              
                //Check if The field is alread fill or not
              $checkQuery = $con->prepare("SELECT return_last_date FROM order_status WHERE id = :order_id");
              $checkQuery->bindParam(":order_id",$order_id);
              $checkQuery->execute();
              
              $returnDateCheck = $checkQuery->fetchColumn();      
              
              if($returnDateCheck != ''){
                  echo "<script>alert('Product already delivered')";
              }else{      
              $date = date('d-m-Y');
                  
              $orderReturnLastDate = date('d-m-Y', strtotime($date. ' + 30 days'));
                  
              $changeStatusSql = $con->prepare("UPDATE order_status SET last_status_date=:date,status=:status,return_last_date=:return_date WHERE id = :order_id");
              $changeStatusSql->bindParam(":date",$date);
              $changeStatusSql->bindParam(":status",$bulkoption);
              $changeStatusSql->bindParam(":order_id",$order_id);
              $changeStatusSql->bindParam(":return_date",$orderReturnLastDate);      
              $changeStatusSql->execute();
              }
             }else{
              $date = date('d-m-Y');
              $changeStatusSql = $con->prepare("UPDATE order_status SET last_status_date=:date,status=:status WHERE id = :order_id");
              $changeStatusSql->bindParam(":date",$date);
              $changeStatusSql->bindParam(":status",$bulkoption);
              $changeStatusSql->bindParam(":order_id",$order_id);
              $changeStatusSql->execute();
                 }       
          }
          
      }
  }

  if($orderType == 'allorder'){
   $orderSql = $con->prepare('SELECT * FROM order_status');
   $orderSql->execute();      
  }else{
   $orderSql = $con->prepare('SELECT * FROM order_status WHERE status = :status');
   $orderSql->bindParam(":status",$orderType);
   $orderSql->execute();      
  }

  $orderResult = $orderSql->fetchAll(PDO::FETCH_ASSOC);
?>



<form action="" method="post">



<div class="table-responsive">
  <table id="table-pagination" class="table table-condensed table-striped table-hover table-bordered">
   
   
    <div class="selectClass">               
    <div id="bulkoption" class="col-xs-4">
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
    
    <div class="col-xs-4">
        <input type="submit" onclick="javascript: return confirm('Are you sure to do this action');" name="submit" class="btn btn-success" value="Apply">
    </div>
    
    <!--                 
    <div class="col-xs-4">
       
       
       
       
            <div id="nav-links-order">Hover me
            <div class="order-links">
            <div><a href="manageorder.php?order=Order pending">New Order</a></div>
            <div><a href="manageorder.php?order=Order Approve">Approve Order</a> </div>
            <div><a href="manageorder.php?order=Order Approve">Out Of stock</a></div>
            <div><a href="manageorder.php?order=Cancel Order">Custoumer Cancel Order</a></div>
            <div><a href="manageorder.php?order=Product Dispatched">Order Dispatched</a></div>
            <div><a href="manageorder.php?order=Product Delivered">Completed Order</a></div>
            <div><a href="manageorder.php?order=Return Request">New Return Request</a></div>
            <div><a href="manageorder.php?order=Return Approve">Return Approve</a></div>
            <div><a href="manageorder.php?order=Return Approve">Return Rejected</a></div>
            <div><a href="manageorder.php?order=Return Dispatched">Return Dispatched</a></div>
            <div><a href="manageorder.php?order=Return Complete">Return Complete</a></div>
            </div></div> 
    
    </div>   -->            
  
    
    
    
     <thead class="thead-dark">
       <tr>
           <td><input type="checkbox" id="selectAllBoxes"> </td>
           <td>User Email </td>
           <td>Product Name </td>
           <td>Order Date </td>
           <td>Last Change On</td>
           <td>Status </td>
           <td>Payment </td>
           <td>Order Id </td>
           <td>Return Last Date</td>
           <td>Order Details</td>
       </tr>     
     </thead>
     <tbody>
        <?php foreach($orderResult as $row){
         
         $user_id = $row['user_id'];
         $getUserEmailSql = $con->prepare("SELECT email FROM user WHERE id = :user_id");
         $getUserEmailSql->bindParam(":user_id",$user_id);
         $getUserEmailSql->execute();
         
         $user_email = $getUserEmailSql->fetchColumn();
         
         $orderUniqueID = $row['order_unique_id'];    
         $orderDateSql = $con->prepare("SELECT date FROM product_order_details WHERE order_unique_id = :order_unique_id");
         $orderDateSql->bindParam(":order_unique_id",$orderUniqueID);
         $orderDateSql->execute();
    
         $orderDate = $orderDateSql->fetchColumn();
    
         $product_id = $row['product_id'];
         
         $productNameSql = $con->prepare("SELECT name FROM product WHERE id = :product_id");
         $productNameSql->bindParam(":product_id",$product_id);
         $productNameSql->execute();
    
         $productName = $productNameSql->fetchColumn();
         ?>
         <tr>
           <td><input class='checkBoxes' name='checkBoxarr[]' value="<?php echo $row['id']; ?>" type="checkbox"> </td>
           <td><?php echo $user_email; ?> </td>
           <td><?php echo  $productName;?> </td>
           <td><?php echo $orderDate; ?> </td>
           <td><?php echo $row['last_status_date']; ?> </td>
           <td><?php echo $row['status']; ?> </td>
           <td><?php echo $row['payment']; ?> </td>
           <td><?php echo $orderUniqueID; ?> </td>
           <?php if($row['return_last_date'] == ''){ ?>
           <td class="text-center">---- </td><?php }else{ ?>
           <td class="text-center"><?php echo $row['return_last_date']; ?> </td>
            <?php } ?>
             <td><a href="orderdetails.php?orderUniquID=<?php echo $orderUniqueID; ?>" class="btn btn-primary"> Order Details </a>  </td>
       </tr>
       <?php } ?>
     </tbody>
  </table>
</div>
</form>


<?php include_once "admin_footer.php"; ?>