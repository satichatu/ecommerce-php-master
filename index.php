<?php
ob_start();
session_start(); 
include "header.php"; ?>
<?php

?>
<?php include "conn.php"; ?>
       <?php include "conn.php"; ?>
        <!--slider section start-->
        <div class="hero-section section position-relative">

            <div class="tf-element-carousel slider-nav" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": false,
        "dots": true,
        "autoplay" : true
        }' data-slick-responsive='[
        {"breakpoint":768, "settings": {
        "slidesToShow": 1
        }},
        {"breakpoint":575, "settings": {
        "slidesToShow": 1
        }}
        ]'>
                <!--Hero Item start-->
                <div class="hero-item bg-image image-height" data-bg="https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                <!--Hero Content start-->
                                <div class="hero-content-2 left">

                                    <h3>New Arrivals</h3>
                                    <h1>Forma Milkyway <br> Ivory <strong>Chair</strong></h1>
                                    <a class="btn" href="shop.html">shop now</a>

                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->

                <!--Hero Item start-->
                <div class="hero-item bg-image image-height" data-bg="https://images.pexels.com/photos/5706273/pexels-photo-5706273.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                <!--Hero Content start-->
                                <div class="hero-content-2 left">

                                    <h3>New Arrivals</h3>
                                    <h1>Wallnut Time <br> Signal <strong>Wall clock</strong> </h1>
                                    <a class="btn" href="shop.html">shop now</a>

                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->

                <!--Hero Item start-->
                <div class="hero-item bg-image image-height" data-bg="https://images.pexels.com/photos/298863/pexels-photo-298863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                <!--Hero Content start-->
                                <div class="hero-content-2 left">

                                    <h3 style='color:#fff;'>New Arrivals</h3>
                                    <h1 style='color:#ce6c07;'>Otio Thunder <br> Gray <strong>Lounge Chair</strong></h1>
                                    <a class="btn" style='border-color:#ce6c07;color:ce6c07;' href="shop.html">shop now</a>

                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->

            </div>

        </div>
        <!--slider section end-->

        <!--Feature section start-->
        <div class="feature-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-image">
                                <img src="assets\images\icons\free_shipping.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">FREE SHIPPING WORLDWIDE</h4>
                                <p class="short-desc">Mirum est notare quam littera gothica, quam nunc putamus parum
                                    claram</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-image">
                                <img src="assets\images\icons\money_back.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">MONEY BACK GUARANTEE</h4>
                                <p class="short-desc">Mirum est notare quam littera gothica, quam nunc putamus parum
                                    claram</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-image">
                                <img src="assets\images\icons\support247.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">ONLINE SUPPORT 24/7</h4>
                                <p class="short-desc">Mirum est notare quam littera gothica, quam nunc putamus parum
                                    claram</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Feature section end-->

        <!--Product section start-->
        <div class="product-section section pt-80 pt-lg-60 pt-md-50 pt-sm-40 pt-xs-30">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title text-center mb-30 pt-20">
                            <h2>New Arrivals</h2>
                            <p>Browse the collection of our new products.</p>
                        </div>
                    </div>
                </div>
                <div class="row tf-element-carousel normal-nav" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "rows": 2,
                    "arrows": true,
                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right autoClick" }
                    }' data-slick-responsive='[
                    {"breakpoint":1199, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":576, "settings": {
                    "slidesToShow": 1,
                    "arrows": false,
                    "autoplay": true
                    }}
                    ]'>
                    
                    
                   <?php 
    $query = $con->prepare("SELECT * FROM product ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if($result > 0){ 
    //get user id  
    if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $userdetail = $con->prepare("SELECT * FROM user WHERE email = :email");
    $userdetail->bindParam(":email",$email);
    $userdetail->execute();
    $userres = $userdetail->fetch();   
    $userid = $userres['id'];
    }
    else{
        $email = '';
        $userid = '';
    }    
    
        
    foreach($result as $row){
    $id = $row['id'];   
    $name = $row['name'];
    $price = $row['price'];
    $availiblity = $row['stock'];
    $descreption = $row['descreption'];
    $image = $row['image']; ?>
<div class="col">
    <!--  Single Grid product Start -->
    <div class="single-grid-product mb-40">
        <div class="product-image">
            <a href="cart.php?id=<?php echo $id; ?>" id="addtocart">
                <img src="upload/product/<?php echo $image; ?>" class="img-fluid" alt="">
            </a>
            <div class="product-action d-flex justify-content-between">
                <span class="product-btn" style="cursor:pointer" id="addbtnid-<?php echo $id; ?>" >Add to Cart</span>
                <ul class="d-flex">
                 
                    <li><span><i style="color:red;" class="<?php
                       if(isset($_SESSION['email'])){
                       $selwishlist = $con->prepare("SELECT * FROM wishlist WHERE user_id =:userid and product_id =:productid ");
                       $selwishlist->bindParam(":userid",$userid);
                       $selwishlist->bindParam(":productid",$id);
                       $selwishlist->execute();
                       $selresultwishlis = $selwishlist->rowCount();
                       if($selresultwishlis > 0){
                       echo "fa fa-heart";}else{
                           echo "ion-android-favorite-outline";
                       }}else{
                           echo "ion-android-favorite-outline";
                       }
                        ?> wishlist-click" id="wishlist-product-id-<?php echo $id; ?>"></i></span>
                    </li>
                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="ion-ios-search-strong" style="line-height:45px;font-size:16px;"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="product-content">
           <!--
            <div class="product-category-rating">
                <span class="category"><a href="shop.html">Furniture</a></span>
                <span class="rating">
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star-outline"></i>
                </span>
            </div> -->
            
            <h3 class="title"> <a href="single-product.html"><?php echo $name; ?></a></h3>
            <p class="product-price"><span class="discounted-price">Rs.<?php echo $price; ?></span></p>
        </div>
    </div>
    <!--  Single Grid product End -->
</div>
<?php } } ?>
                    
                    
                </div>

            </div>
        </div>
        <!--Product section end-->


        <!--Banner section start-->
        <div class="banner-section section">
            <div class="container-fluid pl-20 pr-20 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner-item mb-30">
                            <div class="banner-image">
                                <a href="shop.html">
                                    <img src="assets\images\banner\h1-banner-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="banner-content banner-content-two">
                                <h4 class="title-light">BLACK FRIDAY</h4>
                                <h3 class="title">Save Up To 50% Off</h3>
                                <a href="shop.html">View Collection <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner-item mb-30">
                            <div class="banner-image">
                                <a href="shop.html">
                                    <img src="assets\images\banner\h1-banner-5.jpg" alt="">
                                </a>
                            </div>
                            <div class="banner-content banner-content-two">
                                <h4 class="title-light">BEST SELLING !</h4>
                                <h3 class="title">Living Room Up To 70% Off</h3>
                                <a href="shop.html">View Collection <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Banner section end-->

       

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