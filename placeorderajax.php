<?php 
/*
session_start(); 

if(isset($_SESSION['email'])){
if(isset($_POST)){
    include "conn.php";
    
$fname = htmlspecialchars($_POST['firstname']);
$lname = htmlspecialchars($_POST['lastname']);
$name = $fname . ' ' . $lname;
$email = htmlspecialchars($_POST['emailform']);
$mobile = htmlspecialchars($_POST['mobileform']);
$address1 = htmlspecialchars($_POST['address1']);
$address2 = htmlspecialchars($_POST['address2']);
$address = $address1 . ' ' . $address2;
$city = htmlspecialchars($_POST['cityform']);
$zipcode = htmlspecialchars($_POST['zipcode']);
$contry = htmlspecialchars($_POST['countryform']);
    
    
    

//Get user id
$useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
$useridquery->bindParam(":email",$_SESSION['email']);
$useridquery->execute();
$userresult = $useridquery->fetch();
$userid = $userresult['id']; 
    
$productQuery = $con->prepare("SELCT * FROM cart WHERE user_id =:user_id");
$productQuery->bindParam(":user_id",$userid);
$productQuery->execute();
    
$productFetch = $productQuery->fetchAll(PDO::FETCH_ASSOC);

foreach($productFetch as $row){
    $product_id = $row['p_id'];
    $product_name = $row['p_name'];
    $qty = $row['qty'];
    $total = $row['total'];
    $date = date('d-m-Y');
    
    
    
    
    
        
}    
echo $contry;
    }}else{
    echo 2;
}*/




?> 