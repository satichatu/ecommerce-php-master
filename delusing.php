<?php ob_start();
    session_start();
    include "conn.php";
  if(isset($_POST['id'])){
    if(isset($_SESSION['email'])){
    //Get user id
    $email = $_SESSION['email'];    
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$email);
    $useridquery->execute();
    $userresult = $useridquery->fetch();   
    $userid = $userresult['id'];
    //id for the deleted element    
    $id = $_POST['id'];
      //Delete Row
    $query = $con->prepare( "DELETE FROM cart WHERE id =:id");
    $query->bindParam(":id",$id);
    $query->execute();
    // Calculate all sum from the price
    $carttotal = $con->prepare("SELECT SUM(total) FROM cart WHERE user_id =:ip");
    $carttotal->bindParam(":ip",$userid);
    $carttotal->execute();
    $totalsum = $carttotal->fetchColumn();
    
    //Update Cart
    $totalinsquery = $con->prepare("UPDATE total SET total=:total WHERE user_id=:userid");
    $totalinsquery->bindParam(":total",$totalsum);
    $totalinsquery->bindParam(":userid",$userid);
    $totalinsquery->execute();  
    
    //Get total amount to show in the frontend
    $seltotal = $con->prepare("SELECT * FROM total WHERE user_id = :userid");
    $seltotal->bindParam(":userid",$userid);
    $seltotal->execute();
    
    //fetch total
        
    $totalselresult = $seltotal->fetch();
    $totalres = $totalselresult['total'];
    echo $totalres;    
        
 }}
?>
