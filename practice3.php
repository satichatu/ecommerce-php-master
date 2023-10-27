<?php
//ob_start();
session_start(); 
 
    if(isset($_GET['id'])){
    if(isset($_SESSION['email'])){
    include "conn.php"; 
    $p_id = htmlspecialchars($_GET['id']);
        
    //Get product detail by the id
        
    $productquery = $con->prepare("SELECT * FROM product WHERE id =:id ");
    $productquery->bindParam(":id",$p_id);
    $productquery->execute();
    
    //Fetch each result one by one from the product
    $productfetch = $productquery->fetch();    
    $name = $productfetch['name'];
    $price = $productfetch['price'];
    $qty = 1;
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("d-m-Y");
    $total = $price * $qty;    
    $stock = $productfetch['stock'];    
        
        //Get user id
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$_SESSION['email']);
    $useridquery->execute();
    $userresult = $useridquery->fetch();
    $userid = $userresult['id'];
    
   //Insert data Into cart
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
    $totalinsquery->execute();} // else Insert New Value
    else{$totalinsquery = $con->prepare("INSERT INTO `total`(total, user_id) VALUES (:total,:userid)");
   $totalinsquery->bindParam(":total",$totalsum);
   $totalinsquery->bindParam(":userid",$userid);
   $totalinsquery->execute();}
    
    $query = $con->prepare("SELECT * FROM cart WHERE user_id = :user");
    $query->bindParam(":user",$userid);    
    $query->execute();}
        
    $resultcart = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultcart as $row){
     $id = $row['id'];    
     $productname = $row['p_name'];
     $price = $row['price'];
     $qty = $row['qty'];
     $total = $price * $qty;
     $p_id = $row['p_id']; 
    $proquery = $con->prepare("SELECT image FROM product WHERE id=:id");
    $proquery->bindParam(":id",$p_id);
    $proquery->execute();
    $image = $proquery->fetchColumn();    
     echo "<li class='single-cart-item'>
    <div class='cart-img'>
        <a href='cart.html'><img src='upload/product/$image' alt=''></a>
    </div>
    <div class='cart-content'>
        <h5 class='product-name'><a href='single-product.html'> $productname </a></h5>
        <span class='product-quantity'> $qty ×</span>
        <span class='product-price'>$ $price </span>
    </div>
    <div class='cart-item-remove'>
        <span title='Remove'><i class='fa fa-trash headertrash' id='headcartdel-$id'></i></span>
    </div>
</li>";
   
  echo "<script>location.replace('cartlist.php');</script>";

?>

<?php 
    }
        
    }
    else{
        echo 0;
    }
    }
    
   
    
?>