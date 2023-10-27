<?php 
session_start();
if(isset($_GET['review'])){
    if(isset($_SESSION['email'])){
        
    $json_data = json_decode($_GET['review']);
    $review_comment = htmlspecialchars($json_data[0]);
    $product_id = htmlspecialchars($json_data[1]);        
    $email = $_SESSION['email'];
        
    include "conn.php";    
        
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$email);
    $useridquery->execute();
    $userresult = $useridquery->fetch();   
    $userid = $userresult['id'];
    
    $date = date('d-m-Y');    
        
        
    //Insert in the review table    
    $reviewInsertQuery = $con->prepare("INSERT INTO product_review(product_id, user_id, review_comment,date) VALUES (:product,:user_id,:review,:date)");
    $reviewInsertQuery->bindParam(":product",$product_id);
    $reviewInsertQuery->bindParam(":user_id",$userid);
    $reviewInsertQuery->bindParam(":review",$review_comment);
    $reviewInsertQuery->bindParam(":date",$date);    
    $reviewInsertQuery->execute();        
    
    
        
        
    $userNameQuery = $con->prepare("SELECT user_first_name FROM user_details WHERE user_email = :email");
    $userNameQuery->bindParam(":email",$email);
    $userNameQuery->execute();
        
    $user_name = $userNameQuery->fetchColumn();
        
    $review_user_name = ($user_name == '') ? $email : $user_name;
    
    
        
    $allreviewQuery = $con->prepare("SELECT * FROM product_review WHERE product_id = :product");
    $allreviewQuery->bindParam(":product",$product_id);
    $allreviewQuery->execute();
    
    $allreview = $allreviewQuery->fetchAll(PDO::FETCH_ASSOC);
        
    //echo $review_user_name;
        
     echo "<li>
    <div class='product-comment'>
        <img src='assets\images\icons\author.png' alt=''>
        <div class='product-comment-content'>
            
            <p class='meta'>
                <strong>$review_user_name</strong> - <span>$date</span>
                <div class='description'>
                    <p>$review_comment</p>
                </div>
        </div>
    </div>
</li>";                  
        
        
        
    }else{
      echo 2;
    }
}
   


?>