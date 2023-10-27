<?php 
//error_reporting(E_ALL);
error_reporting(1);
include "conn.php";
if(isset($_SESSION)){
session_regenerate_id(true);
}

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Home 02 || Ginza</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico in the root directory -->
<link href="assets\images\favicon.bin" type="img/x-icon" rel="shortcut icon">
<!-- All css files are included here. -->
<link rel="stylesheet" href="assets\css\bootstrap.min.css">
<link rel="stylesheet" href="assets\css\iconfont.min.css">
<link rel="stylesheet" href="assets\css\plugins.css">
<link rel="stylesheet" href="assets\css\helper.css">
<link rel="stylesheet" href="assets\css\style.css">
<!-- Modernizr JS -->
<script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}
    
</style>


</head>

<body>

<div id="main-wrapper">

<!--Header section start-->
<header class="header header-sticky d-none d-lg-block">
<div class="header-default">
<div class="container-fluid pl-115 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-115 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
<div class="row align-items-center">
<!-- Header Top Social Start -->
<div class="col-lg-5 d-flex justify-content-start">
<nav class="main-menu main-menu-two">
<ul>
<li><a href="index.php">Home</a>
<!-- <ul class="sub-menu">
<li><a href="index.html">Home One</a></li>
<li><a href="index-2.html">Home Two</a></li>
<li><a href="index-3.html">Home Three</a></li>
<li><a href="index-4.html">Home Four</a></li>
</ul> -->
</li>
<li><a href="shop.php">Shop</a>
<ul class="mega-menu four-column left-0">
<li><a href="#" class="item-link">Pages</a>
<ul>
<li><a href="compare.html">Compare</a></li>
<li><a href="cartlist.php">Shopping Cart</a></li>
<li><a href="checkout.php">Checkout</a></li>
<li><a href="wishlist.php">Wishlist</a></li>
<li><a href="myaccount.php">My Account</a></li>
<li><a href="login-register.html">Login Register</a></li>
<li><a href="faq.html">Frequently Questions</a></li>
<li><a href="404.html">Error 404</a></li>
</ul>
</li>
<li><a href="#" class="item-link">Shop Layout</a>
<ul>
<li><a href="shop.php">Shop</a></li>
<li><a href="shop-three-column.html">Shop Three Column</a></li>
<li><a href="shop-four-column.html">Shop Four Column</a></li>
<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
<li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a></li>
<li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
</li>
<li><a href="shop-list-right-sidebar.html">Shop List Right
        Sidebar</a></li>
</ul>
</li>
<li><a href="#" class="item-link">Product Details</a>
<ul>
<li><a href="single-product.html">Single Product</a></li>
<li><a href="single-product-variable.html">Variable Product</a></li>
<li><a href="single-product-affiliate.html">Affiliate Product</a>
</li>
<li><a href="single-product-group.html">Group Product</a></li>
<li><a href="single-product-tabstyle-2.html">Product Left Tab</a>
</li>
<li><a href="single-product-tabstyle-3.html">Product Right Tab</a>
</li>
<li><a href="single-product-gallery-left.html">Product Gallery
        Left</a></li>
<li><a href="single-product-gallery-right.html">Product Gallery
        Right</a></li>
</ul>
</li>
<li><a href="#" class="item-link">Product Details</a>
<ul>
<li><a href="single-product-sticky-left.html">Product Sticky
        Left</a></li>
<li><a href="single-product-sticky-right.html">Product Sticky
        Right</a></li>
<li><a href="single-product-slider-box.html">Product Box Slider</a>
</li>
</ul>
</li>
</ul>
</li>
<li><a href="blog.html">Blog</a>
<!--
<ul class="sub-menu">
<li><a href="blog.html">Blog</a></li>
<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
<li><a href="blog-grid.html">Blog Grid</a></li>
<li><a href="blog-large-image.html">Blog Large Image</a></li>
<li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
<li><a href="blog-details.html">Blog Details</a></li>
<li><a href="blog-details-gallery.html">Blog Details Gallery</a></li>
<li><a href="blog-details-audio.html">Blog Details Audio</a></li>
<li><a href="blog-details-video.html">Blog Details Video</a></li>
</ul> -->
</li>

<li><a href="contact.php">Contact Us</a></li>
</ul>
</nav>
</div>
<!-- Header Top Social End -->

<!-- Header Logo Start -->
<div class="col-lg-2">
<div class="header-logo text-center">
<a href="index.php"><img src="assets\images\logo.png" alt=""></a>
</div>
</div>
<!-- Header Logo Start -->

<!-- Header Cart Start -->
<div class="col-lg-5 d-flex justify-content-end">
<div class="header-search">
<button class="header-search-toggle"><i class="ion-ios-search-strong"></i></button>
<div class="header-search-form">
<form action="shop.php" method="get">
<input type="text" id="searchInput" name="search" placeholder="Type and hit enter">
<button><i class="ion-ios-search-strong"></i></button>
</form>
</div>
</div>

<?php if(isset($_SESSION['email'])){
    session_regenerate_id(true);
//Get user id             
$useridquery = $con->prepare("SELECT * FROM user WHERE email =:email ");
$useridquery->bindParam(":email",$_SESSION['email']);
$useridquery->execute();
$useridresult = $useridquery->fetch();
//user id
$userid = $useridresult['id'];
//Get total sum of all item in the cart
$stockyeas = "Yes";    
$totalcart = $con->prepare("SELECT sum(total) FROM cart WHERE user_id = :userid and stock = :yes ");
$totalcart->bindParam(":userid",$userid);
$totalcart->bindParam(":yes",$stockyeas);    
$totalcart->execute();
$cartsum = $totalcart->fetchColumn();
// Get Cart item
$cartquery = $con->prepare("SELECT * FROM cart WHERE user_id = :userid");
$cartquery->bindParam(":userid",$userid);
$cartquery->execute();   
$cartresult = $cartquery->fetchAll(PDO::FETCH_ASSOC);
//Now its turn of TOOTAL table

$countCartQuery = $con->prepare("SELECT COUNT(*) FROM cart WHERE user_id = :userid");
$countCartQuery->bindParam(":userid",$userid);
$countCartQuery->execute();

$countCartItem = $countCartQuery->fetchColumn();    
?>
<div class="header-cart">
<a href="cartlist.php"><i class="ion-bag"></i><span><?php echo $countCartItem; ?></span></a>
<!--Mini Cart Dropdown Start-->
<div class="header-cart-dropdown" style="overflow-y:scroll;max-height: 100vh;overflow-x: hidden;">
<ul class="cart-items">
<?php 

foreach($cartresult as $row){
$id = $row['id'];    
$productname = $row['p_name'];
$price = $row['price'];
$qty = $row['qty'];
$total = $price * $qty;
$p_id = $row['p_id'];
$stock = $row['stock'];    
$proquery = $con->prepare("SELECT image FROM product WHERE id=:id");
$proquery->bindParam(":id",$p_id);
$proquery->execute();
$image = $proquery->fetchColumn();


?> 

<li class="single-cart-item">
<div class="cart-img">
<a href="cartlist.php"><img src="upload/product/<?php echo $image; ?>" alt=""></a>
</div>
<div class="cart-content">
<h5 class="product-name"><a href="single-product.html"><?php echo $productname; ?></a></h5>
<span class="product-quantity"><?php echo $qty; ?> ×</span>
<span class="product-price">$<?php echo $price; ?></span>
<?php if($stock == 'No'){
    ?><br>
    <span class="out-stock" style="color:red;font-size:13px;">Out of stock</span>
    
<?php    } ?>

</div>
<div class="cart-item-remove">
<span title="Remove"><i class="fa fa-trash headertrash" id="headcartdel-<?php echo $id; ?>"></i></span>
</div>
</li>
<?php } ?>




</ul>
<div class="cart-total">
<!--
<h5>Subtotal :<span class="float-right">$39.79</span></h5>
<h5>Eco Tax (-2.00) :<span class="float-right">$7.00</span></h5>
<h5>VAT (20%) : <span class="float-right">$0.00</span></h5> -->
<h5>Total : <span class="float-right">
<?php 
    echo $cartsum; 
    ?>

</span></h5>


</div>
<div class="cart-btn">
<a href="cartlist.php">View Cart</a>
<a href="checkout.php">checkout</a>
</div>
</div>
<!--Mini Cart Dropdown End-->
</div>
<?php } ?>




<ul class="ht-us-menu">
<li><a href="#"><i class="ion-android-settings"></i></a>
<ul class="ht-dropdown right">
<?php if(isset($_SESSION['email'])){ ?>
<li><a href="myaccount.php">My Account</a></li>
<li><a href="wishlist.php">My Wish List</a></li>
<li><a href="cartlist.php">My Cart</a></li>
<li><a href="logout.php">Logout</a></li>
<?php    }else{ ?>
<li><a href="loginregister.php">Sign In</a></li>
<?php } ?>
</ul>
</li>
</ul>
</div>
<!-- Header Cart End -->

</div>

</div>
</div>
</header>
<!--Header section end-->

<!--Header Mobile section start-->
<header class="header-mobile d-block d-lg-none">
<div class="header-bottom menu-right">
<div class="container">
<div class="row">
<div class="col-12">
<div class="header-mobile-navigation d-block d-lg-none">
<div class="row align-items-center">
<div class="col-6 col-md-6">
<div class="header-logo">
<a href="index.php">
<img src="assets\images\logo.png" class="img-fluid" alt="">
</a>
</div>
</div>
<div class="col-6 col-md-6">
<div class="mobile-navigation text-right">
<div class="header-icon-wrapper">
<ul class="icon-list justify-content-end">
<li>
    <div class="header-cart-icon">
        <a href="cartlist.php"><i class="ion-bag"></i><span>2</span></a>
    </div>
</li>
<li>
    <a href="javascript:void(0)" class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!--Mobile Menu start-->
<div class="row">
<div class="col-12 d-flex d-lg-none">
<div class="mobile-menu"></div>
</div>
</div>
<!--Mobile Menu end-->

</div>
</div>
</header>
<!--Header Mobile section end-->

<!-- Offcanvas Menu Start -->
<div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
<a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
<i class="ion-android-close"></i>
</a>

<div class="offcanvas-wrapper">

<div class="offcanvas-inner-content">
<div class="offcanvas-mobile-search-area">
<form action="#">
<input type="search" placeholder="Search ...">
<button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
<nav class="offcanvas-navigation">
<ul>
<li class="menu-item-has-children"><a href="#">Home</a>
<ul class="submenu2">
<li><a href="index.php">Home 01</a></li>
<li><a href="index-2.html">Home 02</a></li>
<li><a href="index-3.html">Home 03</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">Shop</a>
<ul class="submenu2">
<li class="menu-item-has-children"><a href="#">Pages</a>
<ul class="submenu2">
<li><a href="compare.html">Compare</a></li>
<li><a href="cartlist.php">Shopping Cart</a></li>
<li><a href="checkout.php">Checkout</a></li>
<li><a href="wishlist.php">Wishlist</a></li>
<li><a href="myaccount.php">My Account</a></li>
<li><a href="loginregister.php">Login Register</a></li>
<li><a href="faq.html">Frequently Questions</a></li>
<li><a href="404.html">Error 404</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">Shop Layout</a>
<ul class="submenu2">
<li><a href="shop.php">Shop</a></li>
<li><a href="shop-three-column.html">Shop Three Column</a></li>
<li><a href="shop-four-column.html">Shop Four Column</a></li>
<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
<li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a></li>
<li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
</li>
<li><a href="shop-list-right-sidebar.html">Shop List Right
Sidebar</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">Product Details</a>
<ul class="submenu2">
<li><a href="single-product.html">Single Product</a></li>
<li><a href="single-product-variable.html">Variable Product</a></li>
<li><a href="single-product-affiliate.html">Affiliate Product</a>
</li>
<li><a href="single-product-group.html">Group Product</a></li>
<li><a href="single-product-tabstyle-2.html">Product Left Tab</a>
</li>
<li><a href="single-product-tabstyle-3.html">Product Right Tab</a>
</li>
<li><a href="single-product-gallery-left.html">Product Gallery
Left</a></li>
<li><a href="single-product-gallery-right.html">Product Gallery
Right</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">Product Details</a>
<ul class="submenu2">
<li><a href="single-product-sticky-left.html">Product Sticky
Left</a></li>
<li><a href="single-product-sticky-right.html">Product Sticky
Right</a></li>
<li><a href="single-product-slider-box.html">Product Box Slider</a>
</li>
</ul>
</li>

</ul>
</li>
<li class="menu-item-has-children"><a href="#">Blog</a>
<ul class="submenu2">
<li><a href="blog.html">Blog</a></li>
<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
<li><a href="blog-grid.html">Blog Grid</a></li>
<li><a href="blog-large-image.html">Blog Large Image</a></li>
<li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
<li><a href="blog-details.html">Blog Details</a></li>
<li><a href="blog-details-gallery.html">Blog Details Gallery</a></li>
<li><a href="blog-details-audio.html">Blog Details Audio</a></li>
<li><a href="blog-details-video.html">Blog Details Video</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="about.html">About Us</a>
</li>
<li class="menu-item-has-children"><a href="contact.php">Contact Us</a>
</li>

</ul>
</nav>

<div class="offcanvas-settings">
<nav class="offcanvas-navigation">
<ul>
<li class="menu-item-has-children"><a href="#">MY ACCOUNT </a>
<ul class="submenu2">
<li><a href="loginregister.php">Register</a></li>
<li><a href="loginregister.php">Login</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">CURRENCY: USD </a>
<ul class="submenu2">
<li><a href="javascript:void(0)">€ Euro</a></li>
<li><a href="javascript:void(0)">$ US Dollar</a></li>
</ul>
</li>
<li class="menu-item-has-children"><a href="#">LANGUAGE: EN-GB </a>
<ul class="submenu2">
<li><a href="javascript:void(0)"><img src="assets\images\icons\en-gb.png" alt=""> English</a></li>
<li><a href="javascript:void(0)"><img src="assets\images\icons\de-de.png" alt=""> Germany</a></li>
</ul>
</li>
</ul>
</nav>
</div>

<div class="offcanvas-widget-area">
<div class="off-canvas-contact-widget">
<div class="header-contact-info">
<ul class="header-contact-info-list">
<li><i class="ion-android-phone-portrait"></i> <a href="tel://12452456012">(1245)
2456 012 </a></li>
<li><i class="ion-android-mail"></i> <a href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
</ul>
</div>
</div>
<!--Off Canvas Widget Social Start-->
<div class="off-canvas-widget-social">
<a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
<a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
<a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
<a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
<a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
</div>
<!--Off Canvas Widget Social End-->
</div>
</div>
</div>

</div>
<!-- Offcanvas Menu End -->
