<?php 
session_start();
session_regenerate_id(true);
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}else{
    echo 1;
}
if(isset($_POST['addressdata'])){
    include "conn.php";
    
    $jsons = json_decode($_POST['addressdata']);
    
    $phone = htmlspecialchars($jsons[1]);
    $address = htmlspecialchars($jsons[0]);
    
    //Check if row for this email is availble or not
 $checkAvailblity = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");    
 $checkAvailblity->bindParam(":email",$email);
 $checkAvailblity->execute();
    
    if($checkAvailblity->rowCount() > 0){
    //If row is availble so update the date    
    $result = $checkAvailblity->fetch();
    
    $fetchPhone = $result['user_phone'];
    $fetchAddress = $result['user_address'];    
    
    $updateUserAddress = $con->prepare("UPDATE user_details SET user_phone=:phone,user_address=:address WHERE user_email = :email");
        if($phone == ''){
        $updateUserAddress->bindParam(":phone",$phone);        
        }else{
        $updateUserAddress->bindParam(":phone",$fetchPhone);    
        }
        if($address == ''){
        $updateUserAddress->bindParam(":address",$fetchAddress);        
        }else{
        $updateUserAddress->bindParam(":address",$address);        
        }
    
    $updateUserAddress->bindParam(":email",$email);    
    $updateUserAddress->execute();   
    
    echo 2;
        
    }else{
     //If row is not availble so insert the date    
    
    $insertUseraddress = $con->prepare("INSERT INTO user_details(user_email, user_phone, user_address) VALUES (:email,:phone,:address)");
    $insertUseraddress->bindParam(":email",$email);
    $insertUseraddress->bindParam(":phone",$phone);
    $insertUseraddress->bindParam(":address",$address);
    $insertUseraddress->execute();     
    
    echo 3;
        
    }
    
}


?>