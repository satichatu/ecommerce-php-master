<?php 
    include "conn.php";
    session_start();
    if(isset($_POST['valin'])){
    if(isset($_SESSION['email'])){    
    $useremail = $_SESSION['email'];
    $userquery = $con->prepare("SELECT * FROM user WHERE email = :email");
    $userquery->bindParam(":email",$useremail);
    $userquery->execute();
    $result = $userquery->fetch();
    //Get user id
    $userid = $result['id'];

        
    // Calculate all sum from the price
    $stockyes = 'Yes';    
    $carttotal = $con->prepare("SELECT SUM(total) FROM cart WHERE user_id = :ip and stock =:yes");
    $carttotal->bindParam(":ip",$userid);
    $carttotal->bindParam(":yes",$stockyes);    
    $carttotal->execute();
        
    $totalamount = $carttotal->fetchColumn();    
        
    if($totalquery->rowCount() > 0){
        
    
        
    
    $couponCode = htmlspecialchars($_POST['valin']);
    $couponquery = $con->prepare("SELECT * FROM coupon WHERE couponcode =:code ");
    $couponquery->bindParam(":code",$couponCode);
    $couponquery->execute();
    if ($couponquery->rowCount() > 0) {
        
     $result = $couponquery->fetch();
     $discount = $result['discount']; 
     $minval = $result['min_val'];
        
    $checkNegative = $totalamount - $discount;    
       
        
        if($minval > $totalamount){
          echo "cant-discount-$minval";
          exit();    
        }else if($checkNegative < 0){
         
          echo 2;
          exit();    
        }else{
        $totalbalance = $totalamount - $discount;
        //Update total amount in total table
        $updatetotal = $con->prepare("UPDATE total SET `total`=:amount WHERE user_id = :user ");
        $updatetotal->bindParam(":amount",$totalbalance);
        $updatetotal->bindParam(":user",$userid);
        $updatetotal->execute();
        
        echo $discount;
        exit();    
        }
        
        

    }else{
        echo 3;
        exit();
    } 
}}
} ?>