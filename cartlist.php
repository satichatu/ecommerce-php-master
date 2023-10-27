<?php
ob_start();
session_start(); 
include "header.php"; ?>
<?php
    if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
?>
<?php include "conn.php"; ?>


<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-banner text-center">
                    <h2>Shopping Cart</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->



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
<th class="pro-stock">Stock Status</th>
<th class="pro-subtotal">Total</th>
<th class="pro-remove">Remove</th>
</tr>
</thead>
<tbody>
<?php 
//Get user id
$useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
$useridquery->bindParam(":email",$_SESSION['email']);
$useridquery->execute();
$userresult = $useridquery->fetch();
$userid = $userresult['id']; 

//Get all data from the user
$query = $con->prepare("SELECT * FROM cart WHERE user_id=:ip");
$query->bindParam(":ip",$userid);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC); 
// Calculate all sum from the price
$stockyes = 'Yes';    
$carttotal = $con->prepare("SELECT SUM(total) FROM cart WHERE user_id = :ip and stock =:yes");
$carttotal->bindParam(":ip",$userid);
$carttotal->bindParam(":yes",$stockyes);    
$carttotal->execute();
$totalsum = $carttotal->fetchColumn();

//insert value 


if(count($result) > 0){

//Check if user id availble in total table or not
$totalqueryoftotal = $con->prepare("SELECT * FROM total WHERE user_id=:userid");
$totalqueryoftotal->bindParam(":userid",$userid);
$totalqueryoftotal->execute();  
//Update exiting table    
if($totalqueryoftotal->rowCount() > 0){
$totalinsquery = $con->prepare("UPDATE total SET total=:total WHERE user_id=:userid");
$totalinsquery->bindParam(":total",$totalsum);
$totalinsquery->bindParam(":userid",$userid);
$totalinsquery->execute();     
} // else Insert New Value
else{
$totalinsquery = $con->prepare("INSERT INTO `total`(total, user_id) VALUES (:total,:userid)");
$totalinsquery->bindParam(":total",$totalsum);
$totalinsquery->bindParam(":userid",$userid);
$totalinsquery->execute();
}    
foreach($result as $row){
//While($row= $result->fetch()){
$cartid = $row['id'];    
$productname = $row['p_name'];
$price = $row['price'];
$qty = $row['qty'];
$stock = $row['stock'];    
$total = $price * $qty;
$product_id = $row['p_id']; 
$proquery = $con->prepare("SELECT image FROM product WHERE id=:id");
$proquery->bindParam(":id",$product_id);
$proquery->execute();
$image = $proquery->fetchColumn();    
?>
<tr>
<td class="pro-thumbnail"><a href="cart.php?id=<?php echo $product_id; ?>"><img src="upload/product/<?php echo $image; ?>" alt="Product"></a></td>
<td class="pro-title"><a href="cart.php?id=<?php echo $product_id; ?>"><?php echo $productname; ?></a></td>
<td class="pro-price"><span><?php echo $price; ?></span></td>


<td class="pro-quantity">
<div class="pro-qty proqtychange"><input type="number" id="quantityvalcart-<?php echo $product_id; ?>-<?php echo $cartid; ?>" class="qtychangeclass" value="<?php echo $qty; ?>"></div>
</td>

<?php if($stock == 'Yes'){
    ?>

<td class="pro-stock"><span class="in-stock">in stock</span></td>
    
<?php }else{ ?>
<td class="pro-stock"><span class="out-stock">Out of stock</span></td>
<?php } ?>


<td class="pro-subtotal" id="producttotal-<?php echo $cartid; ?>" ><span><?php echo $total; ?></span></td>
<td class="pro-remove"><span class="delspan"><i id="delete-<?php echo $cartid; ?>" class="fa fa-trash-o click"></i></span></td>
</tr>
<?php }} ?>
</tbody>
</table>
</div>

<div class="row">

<div class="col-lg-6 col-12 mb-5">
<!-- Calculate Shipping -->
<div class="calculate-shipping">
<h4>Calculate Shipping</h4>
<form action="#">
<div class="row">
<div class="col-md-6 col-12 mb-25">
    <select class="nice-select">
        <option>Bangladesh</option>
        <option>China</option>
        <option>country</option>
        <option>India</option>
        <option>Japan</option>
    </select>
</div>
<div class="col-md-6 col-12 mb-25">
    <select class="nice-select">
        <option>Dhaka</option>
        <option>Barisal</option>
        <option>Khulna</option>
        <option>Comilla</option>
        <option>Chittagong</option>
    </select>
</div>
<div class="col-md-6 col-12 mb-25">
    <input type="text" placeholder="Postcode / Zip">
</div>
<div class="col-md-6 col-12 mb-25">
    <button class="btn">Estimate</button>
</div>
</div>
</form>
</div>
<!-- Discount Coupon -->
<div class="discount-coupon">
<h4>Discount Coupon Code</h4>

<div class="row">
<div class="col-md-6 col-12 mb-25">
<input type="text" id="couponcode" placeholder="Coupon Code">
</div>
<div class="col-md-6 col-12 mb-25">
<button class="btn" id="couponbtn">Apply Code</button>
</div>
</div>

</div>
</div>

<!-- Cart Summary -->
<div class="col-lg-6 col-12 mb-30 d-flex">
<div class="cart-summary">
<div class="cart-summary-wrap">
<h4>Cart Summary</h4>
<p>Sub Total <span id="subtotalcart"><?php echo $totalsum; ?></span></p>
<p>Shipping Cost <span>$00.00</span></p>
<h2>Grand Total <span id="couponcodedes"><?php echo $totalsum; ?></span></h2>
</div>
<div class="cart-summary-button">
<button class="btn" onclick="redirecttocartlist()">Checkout</button>
<button class="btn" onclick="redirecttoindex()">Update Cart</button>
</div>
</div>
</div>

</div>

</div>

</div>
</div>
</div>
<!--Cart section end-->



<?php include "footer.php"; ?>