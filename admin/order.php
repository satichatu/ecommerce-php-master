<?php include "header.php"; ?>
<div class="box-container">

<?php 

$newOrderText = 'Order pending';
$approveOrderText =  'Order Approve';  
$cancelOrderText = 'Cancel Order';
$orderOutOfStockText = 'Out Of Stock';    
$dispatchOrderText = 'Product Dispatched';
$productDeliverText = 'Product Delivered';
$newReturnRequestText = 'Return Request'; 
$returnApproveText = 'Return Approve';
$returnDisapproveText = 'Return Disapprove';    
$returnDispatchedText = 'Return Dispatched';  
$returnCompleteText = 'Return Complete';    

    
    
//Count New Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$newOrderText);
$countNewOrderSql->execute();
$totNewOrder = $countNewOrderSql->fetchcolumn();
    
//Count Confirm Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$approveOrderText);
$countNewOrderSql->execute();
$totApproveOrder = $countNewOrderSql->fetchcolumn();
    
//Count Custoumer Cancel Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$cancelOrderText);
$countNewOrderSql->execute();
$totCancelOrder = $countNewOrderSql->fetchcolumn();    
    
//Count Out of stock Or rejected Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$orderOutOfStockText);
$countNewOrderSql->execute();
$totOutOfStock = $countNewOrderSql->fetchcolumn();    
    
//Count Dispatch Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$dispatchOrderText);
$countNewOrderSql->execute();
$totDispatchOrder = $countNewOrderSql->fetchcolumn();
    
//Count Deliver Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$productDeliverText);
$countNewOrderSql->execute();
$totDeliverOrder = $countNewOrderSql->fetchcolumn();
    
//Count New Return Request Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$newReturnRequestText);
$countNewOrderSql->execute();
$totNewReturnRequest = $countNewOrderSql->fetchcolumn(); 


//Count Return Approve Request Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$returnApproveText);
$countNewOrderSql->execute();
$totReturnApprove = $countNewOrderSql->fetchcolumn();     

//Count Return Approve Request Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$returnDisapproveText);
$countNewOrderSql->execute();
$totReturnDisapprove = $countNewOrderSql->fetchcolumn();     

    
//Count return Dispatch Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$returnDispatchedText);
$countNewOrderSql->execute();
$totReturnDispatchOrder = $countNewOrderSql->fetchcolumn();
    
//Count Successfully return Order
$countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
$countNewOrderSql->bindParam(":neworder",$returnCompleteText);
$countNewOrderSql->execute();
$totReturnCompleteOrder = $countNewOrderSql->fetchcolumn();     

?>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Order pending">New Order (<?php echo $totNewOrder; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Order Approve">New Order Approve (<?php echo $totApproveOrder; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Order Approve">Out Of stock (<?php echo $totOutOfStock; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Cancel Order">Custoumer Cancel Order (<?php echo $totCancelOrder; ?>)</a></h2></div>


<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Product Dispatched">Order Dispatched (<?php echo $totDispatchOrder; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Product Delivered">Completed Order (<?php echo $totDeliverOrder; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Return Request">New Return Request (<?php echo $totNewReturnRequest; ?>)</a></h2></div>


<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Return Approve">Return Approve (<?php echo $totReturnApprove; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Return Approve">Return Rejected (<?php echo $totReturnDisapprove; ?>)</a></h2></div>

<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Return Dispatched">Return Dispatched (<?php echo $totReturnDispatchOrder; ?>)</a></h2></div>


<div class="col-sm-12 col-md-6 col-lg-6 order-box"><h2><a href="manageorder.php?order=Return Complete">Return Complete (<?php echo $totReturnCompleteOrder; ?>)</a></h2></div>




<?php include "admin_footer.php"; ?>