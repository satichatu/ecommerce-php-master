<?php
ob_start();
session_start(); 
include "header.php" ?>
<?php
    

if(isset($_GET['id'])){
$id = htmlspecialchars($_GET['id']);
$selquery = $con->prepare("SELECT * FROM product WHERE id = :id ");
$selquery->bindParam(":id",$id);
$selquery->execute();
$selrow = $selquery->fetch();

$name = $selrow['name'];
$price = $selrow['price'];
$descreption = $selrow['descreption'];
$image = $selrow['image'];
$stock = $selrow['stock'];
if($stock !== 'Yes'){
   
     ?>
 <form action="" method="post">



    <div class="container" style='margin-top:10px;margin-bottom:70px;'>
        <div class="row">

            <div class="col-xs-6 col-md-6 justify-content-center d-flex">
                <img src="upload/product/<?php echo $image; ?>" height="400px">
            </div>

            <div class="col-xs-6 col-md-6 flex-column">
                <div class="productdescreption" style="margin-top:46px;">
                    <div class="p-2 bd-highlight">
                        <h2><?php echo $name; ?></h2><input type='hidden' name="p_name" value="<?php echo $name; ?>">
                        <div class="single-product-reviews">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star-o"></i>
                            <a class="review-link" href="#">(1 customer review)</a>
                            <span class="outofstock" style="color:red;">Product is out of stock</span>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight">
                        <div class="single-product-price">
                            <span class="price new-price"><?php echo $price; ?><input type='hidden' name="price" value="<?php echo $price; ?>"> </span>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight align-middle">
                        <div class="product-description">
                            <p><?php echo $descreption; ?></p>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight">
                        <div class="single-product-quantity">

                            <div class="product-quantity">
                                <input value="1" type="number" name="qty">
                            </div>
                            <div class="add-to-link" onclick="outofstock()">
                                <button class="btn" disabled><i class="ion-bag" ></i>add to cart</button>
                            </div>
                            <br>
                            <div class="add-to-link">
                                <button class="btn"><i class="ion-bag"></i>Notify me</button>
                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</form>
   
    
<?php    
}else{          

echo "<script>alert('product availble $stock');</script>";
?>
<form action="" method="post">



    <div class="container" style='margin-top:10px;margin-bottom:70px;'>
        <div class="row">

            <div class="col-xs-6 col-md-6 justify-content-center d-flex">
                <img src="upload/product/<?php echo $image; ?>" height="400px">
            </div>

            <div class="col-xs-6 col-md-6 flex-column">
                <div class="productdescreption" style="margin-top:46px;">
                    <div class="p-2 bd-highlight">
                        <h2><?php echo $name; ?></h2><input type='hidden' name="p_name" value="<?php echo $name; ?>">
                        <div class="single-product-reviews">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star-o"></i>
                            <a class="review-link" href="#">(1 customer review)</a>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight">
                        <div class="single-product-price">
                            <span class="price new-price"><?php echo $price; ?><input type='hidden' name="price" value="<?php echo $price; ?>"> </span>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight align-middle">
                        <div class="product-description">
                            <p><?php echo $descreption; ?></p>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight">
                        <div class="single-product-quantity">

                            <div class="product-quantity">
                                <input value="1" type="number" name="qty">
                            </div>
                            <div class="add-to-link">
                                <input type="submit" class="btn" name="submit" value="add to cart">
                                
                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</form>
<?php 

if(isset($_POST['submit'])){
    if(isset($_SESSION['email'])){
    
    $email = $_SESSION['email'];    
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$email);
    $useridquery->execute();
    $userresult = $useridquery->fetch();   
    $userid = $userresult['id']; 
        
    $p_id = htmlspecialchars($_GET['id']);
    $name = htmlspecialchars($_POST['p_name']);
    $price = htmlspecialchars($_POST['price']);
    $qty = htmlspecialchars($_POST['qty']);
    $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
    $date = htmlspecialchars(date("d-m-Y"));
    $total = $price * $qty;
    
    
    $cart = $con->prepare("INSERT INTO cart (p_id, p_name, price, qty, ip, date, total, user_id, stock) VALUES (:pid,:name,:price,:qty,:ip,:date,:total,:userid,:stock)");
    $cart->bindParam(":pid",$p_id);
    $cart->bindParam(":name",$name);
    $cart->bindParam(":price",$price);
    $cart->bindParam(":qty",$qty);
    $cart->bindParam(":ip",$ip);
    $cart->bindParam(":date",$date);
    $cart->bindParam(":total",$total);
    $cart->bindParam(":userid",$userid);
    $cart->bindParam(":stock",$stock);    
    $cart->execute();
        
    echo "<p class'alert alert-success'>Added To Cart</p>";
}else{
    header('location:loginregister.php');
}
}
    //If product ends end  
     }
    //checking id ends here      
      }
?>


<!--Product Description Review Section Start-->
<div class="product-description-review-section section">
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="product-review-tab">
        <!--Review And Description Tab Menu Start-->
        <ul class="nav dec-and-review-menu">
            <li>
                <a class="active" data-toggle="tab" href="#description">Description</a>
            </li>
            <li>
                <a data-toggle="tab" href="#reviews">Reviews (1)</a>
            </li>
        </ul>
        <!--Review And Description Tab Menu End-->
        <!--Review And Description Tab Content Start-->
        <div class="tab-content product-review-content-tab" id="myTabContent-4">
            <div class="tab-pane fade active show" id="description">
                <div class="single-product-description">
                    <p><?php echo $descreption; ?></p>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews">
                <div class="review-page-comment">
                    <h2>1 review for Sit voluptatem</h2>
                    <ul class="review-list">
    <?php 
        
                         
                        
    $allreviewQuery = $con->prepare("SELECT * FROM product_review WHERE product_id = :product");
    $allreviewQuery->bindParam(":product",$id);
    $allreviewQuery->execute();
    
    $allreview = $allreviewQuery->fetchAll(PDO::FETCH_ASSOC);                    

        $userNameQuery = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");
        $userNameQuery->bindParam(":email",$email);
        $userNameQuery->execute();    
        
        $user_name_result = $userNameQuery->fetch();
        //User first name
        $user_review_name = $user_name_result['user_first_name'];
        //If first name is not availble so use user email to display in user name 
        $review_user_name = ($user_review_name == '') ? $email : $user_review_name;                        
                        
                        
    foreach($allreview as $row){                    
        //To get name of user Who review
        $useridReview = $row['user_id'];
        //Get user Email from user table by id
        $getUserEmailQuery = $con->prepare("SELECT * FROM user WHERE id = :id");
        $getUserEmailQuery->bindParam(":id",$useridReview);
        $getUserEmailQuery->execute();
        
        $fetchUserID = $getUserEmailQuery->fetch();
        //User email
        $user_review_user_email = $fetchUserID['email'];
        //Now check if user first name availble or not
        $userNameQuery = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");
        $userNameQuery->bindParam(":email",$user_review_user_email);
        $userNameQuery->execute();    
        
        $user_name_result = $userNameQuery->fetch();
        //User first name
        $user_review_name = $user_name_result['user_first_name'];
        //If first name is not availble so use user email to display in user name 
        $review_user_name = ($user_review_name == '') ? $user_review_user_email : $user_review_name;
            
                        ?>                       
    <li>
        <div class="product-comment">
            <img src="assets\images\icons\author.png" alt="">
            <div class="product-comment-content">
            <!--   
                <div class="product-reviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div> -->
                <p class="meta">
                    <strong><?php echo $review_user_name; ?></strong> - <span><?php echo $row['date']; ?></span>
                    <div class="description">
                        <p><?php echo $row['review_comment']; ?></p>
                    </div>
            </div>
        </div>
    </li>
                        
                <?php } ?>        
                        
                    </ul>
                    
<div class="review-form-wrapper">
<div class="review-form">
<span class="comment-reply-title">Add a review </span>
<form action="" method="post">
    <p class="comment-notes">

        Required fields are marked
        <span class="required">*</span>
    </p>
    <!--
    <div class="comment-form-rating">
        <label>Your rating</label>
        <div class="rating">
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
        </div>
    </div> -->

    <div class="input-element">
        <div class="comment-form-comment">
            <label>Comment</label>
            <textarea id="review_comment" name="review_message" cols="40" rows="8"></textarea>

        </div>

        <div class="comment-submit">
            <input type="submit" id="submit_review" class="form-button" name="submit_review_btn" value="Submit">
        </div>

    </div>
</form>
                             
      <?php 
        
        if(isset($_POST['submit_review_btn'])){
            if(!isset($_SESSION['email'])){
        header('location:loginregister.php');
         }
            
            
            //Get user name 
            
            $getUserNamequery = $con->prepare("SELECT user_first_name FROM user_details WHERE user_email = :email");
            $getUserNamequery->bindParam(":email",$email);
            $getUserNamequery->execute();
            
            $getuserData = $getUserNamequery->fetchColumn();
            
            echo "<script> alert('$getuserData'); </script>";
            echo "Hello";
            
            $review_msg = htmlspecialchars($_POST['review_message']);   
        }
        
        ?>                         
                              <p id="review_blank" class="text-danger" style="display:none;">Sorry ! Review Cant be blank.</p>
                <p id="review_lee_word" class="text-danger" style="display:none;">Review cant be less then 10 words</p>
                <p id="review_submitted" class="text-success" style="display:none;">Thanks for the awesome review, <?php echo $review_user_name; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        
        
        
        
        <!--Review And Description Tab Content End-->
    </div>
</div>
</div>
</div>
</div>
<!--Product Description Review Section Start-->



<?php include "footer.php"; ?>