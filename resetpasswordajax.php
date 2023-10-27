<?php 
if(isset($_POST['login'])){
include "conn.php";    
$email = htmlspecialchars($_POST['login']);
$selquery = $con->prepare("SELECT * FROM user WHERE email =:email");
$selquery->bindParam(":email",$email);
$selquery->execute();
$resultres = $selquery->fetchAll(PDO::FETCH_ASSOC);
if(count($resultres) > 0){
 
    //Genrate otp
    $otp = random_int(100000,999999);
    
    //Check if otp from that specific user exist or not
    $checkotpquery = $con->prepare("SELECT * FROM forgetpassword WHERE email =:email");
    $checkotpquery->bindParam(":email",$email);
    $checkotpquery->execute();
    $checkotpresult = $checkotpquery->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($checkotpresult) > 0){
    //Update otp code to existing user
    $updateotp = $con->prepare("UPDATE forgetpassword SET otp=:otp WHERE email =:email");
    $updateotp->bindParam(":otp",$otp);
    $updateotp->bindParam(":email",$email);
    $updateotp->execute();
    echo 1 ;
    exit();
    }else{
    //otp saves into the database for new user
    $otpquery = $con->prepare("INSERT INTO forgetpassword(email, otp) VALUES (:email,:otp)");
    $otpquery->bindParam(":email",$email);
    $otpquery->bindParam(":otp",$otp);
    $otpquery->execute();    
    echo 1 ;
    exit();
    }
    
}else{
echo "Record not found!";
exit();    
}
}





?>