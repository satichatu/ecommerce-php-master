<?php 
session_start(); 
if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
 if(isset($_GET['jsons'])){
     $jsons = json_decode($_GET['jsons']); 
     $qty = $jsons[0];
     $productid = $jsons[1];
     $cartid = $jsons[2];
     
     //include db
     include "conn.php";
     
     //User email
     $email = $_SESSION['email'];
     
     //Check If product is in stock or not and fetch product data
     $product = $con->prepare("SELECT * FROM product WHERE id =:id");
     $product->bindParam(":id",$productid);
     $product->execute();
     
     $productresult = $product->fetch();
     $productprice = $productresult['price'];
     $availiblity = $productresult['stock'];
     //Exit ajax request if product is out of stock
     if($availiblity == 'No'){
         echo 3;
         exit();
     }else{
         if($qty == 0){
            $qty = '1'; 
         }
         //Get user id
        $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
        $useridquery->bindParam(":email",$email);
        $useridquery->execute();
        $userresult = $useridquery->fetch();
        $userid = $userresult['id'];
         
        $producttotal = $qty * $productprice;
        //Update product qty and total in cart table
        $updateproduct = $con->prepare("UPDATE cart SET qty=:qty,total=:total WHERE id =:id");
        $updateproduct->bindParam(":qty",$qty);
        $updateproduct->bindParam(":total",$producttotal);
        $updateproduct->bindParam(":id",$cartid);
        $updateproduct->execute();
         
        //Do sum of all product in cart
        $stockyes = 'Yes';    
        $carttotal = $con->prepare("SELECT SUM(total) FROM cart WHERE user_id = :id and stock =:yes");
        $carttotal->bindParam(":id",$userid);
        $carttotal->bindParam(":yes",$stockyes);    
        $carttotal->execute();
        $totalsum = $carttotal->fetchColumn();
        
        //update total in total table of specific user
        $totalinsquery = $con->prepare("UPDATE total SET total=:total WHERE user_id=:userid");
        $totalinsquery->bindParam(":total",$totalsum);
        $totalinsquery->bindParam(":userid",$userid);
        $totalinsquery->execute();
         
         
         
        //Select total of cart from specific user
         $getcarttotal = $con->prepare("SELECt * FROM total Where user_id =:userid");
         $getcarttotal->bindParam(":userid",$userid);
         $getcarttotal->execute();
         $cartresult = $getcarttotal->fetch();
         $carttotal = $cartresult['total'];
         
         echo "$producttotal-$carttotal";
     }
     
 }else{
     echo 0;
     exit();
 }


?>