<?php 
ob_start();
session_start();
include "header.php"; ?>

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page-banner text-center">
                            <h2>Shop</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Shop</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

<!-- Shop Section Start -->
<div class="shop-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-area sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-20 pb-xs-20">
                    <div class="row">
                        <div class="col-12">
                            <!-- Grid & List View Start -->
                            <div class="shop-topbar-wrapper d-flex justify-content-between align-items-center">
                                <div class="grid-list-option d-flex">
                                    <ul class="nav">
                                        <li>
                                            <a class="" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#list" class="active show"><i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                    <p>Showing 1–9 of 41 results</p>
                                </div>
                                <!--Toolbar Short Area Start-->
                          <!--      <div class="toolbar-short-area d-md-flex align-items-center">
                                    <div class="toolbar-shorter ">
    <label>Sort By:</label>
    <select class="wide" id="sortProduct">
        <option data-display="Select">Nothing</option>
        <option value="new item">New Coming</option>
        <option value="Name, A to Z">Name, A to Z</option>
        <option value="Name, Z to A">Name, Z to A</option>
        <option value="Price, low to high">Price, low to high</option>
        <option value="Price, high to low">Price, high to low</option>
    </select>
</div>
</div> -->
<!--Toolbar Short Area End-->
</div>
<!-- Grid & List View End -->
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-12">
<div class="shop-product">
<div id="myTabContent-2" class="tab-content">
<div id="grid" class="tab-pane fade">
<div class="product-grid-view">
<div class="row">

 <?php include "conn.php"; ?>  



   <?php 

        //Pagination
        $limit = 10;
        $page =  isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        //Calculate how many rows you have 
        $calRow = $con->prepare("SELECT count(*) AS id FROM product");
        $calRow->execute();

       // $totalRowresult = $calRow->fetchAll(PDO::FETCH_ASSOC);
        $totalRow = $calRow->fetchColumn();
        $totalPages = ceil($totalRow / $limit);

       //Previous page and next page

       $previous = $page != 1 ? $page - 1 : 1;
       $next = $page + 1;
       $lastpage = $totalPages - 1;
        
      

        $selectQuery = $con->prepare("SELECT * FROM product LIMIT :start, :limit");
        $selectQuery->bindValue(":start",$start, PDO::PARAM_INT);
        $selectQuery->bindValue(":limit",$limit, PDO::PARAM_INT);

       // $selectQuery->bindParam(":start",$start);
     //   $selectQuery->bindParam(":limit",$limit);
        $selectQuery->execute();

        $fetchProduct = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        foreach($fetchProduct as $row){
       $id = $row['id'];
    ?>



  <div class="col-lg-3 col-md-6 col-sm-6">
        <!--  Single Grid product Start -->
        <div class="single-grid-product mb-30">
            <div class="product-image">
                <div class="product-label">
                <!--    <span class="sale">-20%</span>
                    <span class="new">New</span> -->
                </div>
                <a href="cart.php?id=<?php echo $id; ?>">
                    <img src="upload/product/<?php echo $row['image']; ?>" class="img-fluid" alt="">
                  <!--  <img src="assets\images\product\1_1-600x800.jpg" class="img-fluid" alt=""> -->
                </a>

                <div class="product-action d-flex justify-content-between">
                    <a class="product-btn" href="cart.html">Add to Cart</a>
                    <ul class="d-flex">
                        <li><a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                        </li>
                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a>
                        </li>
                        <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="ion-ios-search-strong"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
            <!--   
                <div class="product-category-rating">
                   <span class="category"><a href="shop.html">Decor</a></span>
                    <span class="rating">
                        <i class="ion-android-star active"></i>
                        <i class="ion-android-star active"></i>
                        <i class="ion-android-star active"></i>
                        <i class="ion-android-star active"></i>
                        <i class="ion-android-star-outline"></i>
                    </span>
                </div> -->

                <h3 class="title"> <a href="<?php echo $id; ?>"><?php echo $row['name']; ?> </a></h3>
<!-- <p class="product-price"><span class="discounted-price">$100.00</span>
                    <span class="main-price discounted">$120.00</span>
                </p> -->                        
           <p class="product-price">Rs <?php echo $row['price']; ?>
                </p>
            </div>
        </div>
        <!--  Single Grid product End -->
    </div>






<?php       }  ?>

</div>
</div>
</div>


<div id="list" class="tab-pane fade active show">
<div class="product-list-view">
               
               
               
               
<?php foreach($fetchProduct as $row){
$id = $row['id'];
?>
<!-- Single List Product Start -->
<div class="product-list-item mb-40">
<div class="row">
<div class="col-md-4 col-sm-6">
    <div class="single-grid-product">
        <div class="product-image">
            <div class="product-label">
                <!--<span class="sale">-20%</span>
                <span class="new">New</span> -->
            </div>
            <a href="cart.php?id=<?php echo $id; ?>">
                <img src="upload/product/<?php echo $row['image']; ?>" class="img-fluid" alt="">
         <!--       <img src="assets\images\product\5_1-600x800.jpg" class="img-fluid" alt=""> -->
            </a>

            <div class="product-action d-flex justify-content-between">
                <a class="product-btn" href="cart.html">Add to Cart</a>
                <ul class="d-flex">
                    <li><a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                    </li>
                    <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a>
                    </li>
                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="ion-ios-search-strong"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8 col-sm-6">
    <div class="product-content-shop-list">
        <div class="product-content">
        <!--    <span class="category"><a href="shop.html">Vase</a></span> -->
<h3 class="title"> <a href="cart.php?id=<?php echo $id; ?>"><?php echo $row['name']; ?> </a></h3>       <!--
            <div class="product-category-rating">
                <span class="rating">
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star active"></i>
                    <i class="ion-android-star-outline"></i>
                </span>
                <span class="review"><a href="#">(1
                        review)</a></span>
            </div> -->
        <!--   if sometimes want to make discount system
                <p class="product-price"><span class="discounted-price">$17.00</span>
                <span class="main-price discounted">$39.00</span>
            </p> -->

            <p class="product-price"><?php echo $row['price']; ?>
            </p>
            <p class="product-desc"><?php echo $row['descreption']; ?></p>
        </div>
    </div>
</div>
</div>
</div>
<!-- Single List Product Start -->
<?php } ?>
                            
               
               
               
               
               
               
                               
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="row mb-30 mb-sm-40 mb-xs-30">
<div class="col">
<ul class="page-pagination">
   
   <li><a <?php if($page == 1){ ?> href="javascript: void(0)" <?php  }else{ ?>  href="shop.php?page=<?php echo $previous;} ?>  ">Previous</a></li>
   
   <?php  for($i = 1; $i<$totalPages;$i++) :    ?>
   
    <li <?php if($page == $i){ echo "class='active'"; } ?>><a <?php if($page == $i){ ?> href="javascript: void(0)" <?php }else{ ?>  href="shop.php?page=<?php echo $i; }?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
    <li><a <?php if($lastpage == $page){ ?> href="javascript: void(0)" <?php  }else{ ?>  href="shop.php?page=<?php echo $next;} ?>">Next</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Shop Section End -->

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