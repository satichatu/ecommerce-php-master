<?php 
session_start();
if(isset($_SESSION['email'])){

    //Delete wishlist from wishlist cart
    
    if(isset($_GET['delwishlistid'])){
    include "conn.php";
    //Wishlist id
    $wishlistid = htmlspecialchars($_GET['delwishlistid']);

     //Delete Row
    $query = $con->prepare( "DELETE FROM wishlist WHERE id =:id");
    $query->bindParam(":id",$wishlistid);
    $query->execute();
    exit();    
        
    }
    
    
    
    
    
    
    
    //Wishlist in the index page
if(isset($_POST['ids'])){
    $email = $_SESSION['email'];  
    $productid = htmlspecialchars($_POST['ids']);
    include "conn.php";
    $userdetail = $con->prepare("SELECT * FROM user WHERE email = :email");
    $userdetail->bindParam(":email",$email);
    $userdetail->execute();
    $userres = $userdetail->fetch();   
    $userid = $userres['id'];
   
    //Check WHether product is already on wishlist table or not
    $selwishlist = $con->prepare("SELECT * FROM wishlist WHERE user_id =:userid and product_id =:productid ");
    $selwishlist->bindParam(":userid",$userid);
    $selwishlist->bindParam(":productid",$productid);
    $selwishlist->execute();
    $selresultwishlis = $selwishlist->rowCount();
    if($selresultwishlis > 0){ 
    $wishlistid = $selwishlist->fetch();
    $wishid = $wishlistid['id'];
 
    //Delete from wishlist if there is data and user click on the heart icon again
    $delwishlistitemquery = $con->prepare("DELETE FROM wishlist WHERE id = :id ");
    $delwishlistitemquery->bindParam(":id",$wishid);
    $delwishlistitemquery->execute();
    echo 1;
    exit();
    }else{
     //If item is not in the wishlist table insert it into the database  
    $insertquery = $con->prepare("INSERT INTO wishlist (product_id, user_id) VALUES (:productid, :userid)");
    $insertquery->bindParam(":productid",$productid);
    $insertquery->bindParam(":userid",$userid);    
    $insertquery->execute();
    echo 2;
     exit();    
    }
    }
//Session ends
}
/*
    else{
        echo 3;
        exit();
    } */


?>