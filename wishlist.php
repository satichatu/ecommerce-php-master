<?php 
ob_start();
session_start(); 
if(!isset($_SESSION['email']))
{
header('location:loginregister.php');
}
include "header.php"; 
?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
<div class="container">
<div class="row">
<div class="col">

<div class="page-banner text-center">
<h2>Wishlist</h2>
<ul class="page-breadcrumb">
<li><a href="index.html">Home</a></li>
<li>Wishlist</li>
</ul>
</div>

</div>
</div>
</div>
</div>
<!-- Page Banner Section End -->

<!--Wishlist section start-->
<div class="wishlist-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
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
<th class="pro-stock">Stock Status</th>
<th class="pro-addtocart">Add to cart</th>
<th class="pro-remove">Remove</th>
</tr>
</thead>
<tbody>


<?php
//Fetch user id
$email = $_SESSION['email'];
$userdetail = $con->prepare("SELECT * FROM user WHERE email = :email");
$userdetail->bindParam(":email",$email);
$userdetail->execute();
$userres = $userdetail->fetch();   
$userid = $userres['id'];
//Get all row from the specific user                            
$wishlistquery = $con->prepare("SELECT * FROM wishlist WHERE user_id =:userid ");                            
$wishlistquery->bindParam(":userid",$userid);
$wishlistquery->execute();

//Print row from the specific table

$wishlistresult = $wishlistquery->fetchAll(PDO::FETCH_ASSOC);                           
foreach($wishlistresult as $row){
$productid = $row['product_id'];
$wishlistid = $row['id'];    
//Fetch product by product id         
$productquery = $con->prepare("SELECT * FROM product WHERE id =:productid ");
$productquery->bindParam(":productid",$productid);
$productquery->execute();

$productresult = $productquery->fetch();

$image = $productresult['image'];
$productid = $productresult['id'];
$productname = $productresult['name'];
$productStatus = $productresult['stock'];
$productPrice = $productresult['price'];
if($productStatus == 'Yes'){
?> 

<tr>
<td class="pro-thumbnail"><a href="cart.php?id=<?php echo $productid; ?>"><img src="upload/product/<?php echo $image; ?>" alt="Product"></a></td>
<td class="pro-title"><a href="cart.php?id=<?php echo $productid; ?>"><?php echo $productname; ?></a></td>
<td class="pro-price"><span>Rs<?php echo $productPrice; ?></span></td>
<td class="pro-stock"><span class="in-stock">in stock</span></td>
<td class="pro-addtocart">
<button class="btn btn-wishlist-addtocart" id="wishlistaddtocartid-<?php echo $productid; ?>">Add to cart</button>
</td>
<td class="pro-remove"><span><i id="wishdel-<?php echo $wishlistid; ?>" class="fa fa-trash-o delwishlist"></i></span></td>
</tr>
<?php } else{ ?>
<tr>
<td class="pro-thumbnail"><a href="cart.php?id=<?php echo $productid; ?>"><img src="upload/product/<?php echo $image; ?>" alt="Product"></a></td>
<td class="pro-title"><a href="cart.php?id=<?php echo $productid; ?>"><?php echo $productname; ?></a></td>
<td class="pro-price"><span>Rs<?php echo $productPrice; ?></span></td>
<td class="pro-stock"><span class="out-stock">Out of stock</span></td>
<td class="pro-addtocart"><button disabled class="btn">Add to cart</button></td>
<td class="pro-remove"><span><i id="wishdel-<?php echo $wishlistid; ?>" class="fa fa-trash-o delwishlist"></i></span></td>
</tr><?php } } ?>    
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
<!--Wishlist section end-->

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