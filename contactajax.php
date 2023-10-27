<?php 

    if(isset($_POST)){
    
    $name = htmlspecialchars($_POST['con_name']);
    $email = htmlspecialchars($_POST['con_email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['con_message']); 
        
    include "conn.php";
        
    $contactquery = $con->prepare("INSERT INTO contactform(name, email, subject, message) VALUES (:name,:email,:subject,:message)");
    
    $contactquery->bindParam(":name",$name);
    $contactquery->bindParam(":email",$email);
    $contactquery->bindParam(":subject",$subject);
    $contactquery->bindParam(":message",$message);    
    $contactquery->execute();  
        
    echo "Message has been sent";    
    }


?>