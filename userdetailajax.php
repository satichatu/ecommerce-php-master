<?php 
session_start();
session_regenerate_id(true);
include "conn.php";

if(isset($_POST['userdetail'])){

   
    if(!isset($_SESSION['email'])){
        header("location:loginregister.php");
    }
    
    $email = $_SESSION['email'];
    
    $jsondata = json_decode($_POST['userdetail']);
    $firstname = htmlspecialchars($jsondata[0]);
    $lastname = htmlspecialchars($jsondata[1]);
    $displayname = htmlspecialchars($jsondata[2]);
    $useremail = htmlspecialchars($jsondata[3]);
    $currentpassword = htmlspecialchars($jsondata[4]);
    $newpassword = htmlspecialchars($jsondata[5]);
    $newmatchpassword = htmlspecialchars($jsondata[6]);
    
    //Check if row for this email is availble or not
    $checkAvailblity = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");    
    $checkAvailblity->bindParam(":email",$email);
    $checkAvailblity->execute();
    //If above value is empty then use these previous value which is save in database
    $result = $checkAvailblity->fetch();
    $fetchFirstname = $result['user_first_name'];
    $fetchLastname = $result['user_last_name'];
    $fetchDisplayname = $result['user_display_name'];
    $fetch_email = $result['user_email'];
    
    //Change password Query
    if($currentpassword != ''){
        $currentpassword = md5($currentpassword);
        $checkPasswordQuery = $con->prepare("SELECT * FROM user WHERE email = :email and password = :password");
        $checkPasswordQuery->bindParam(":email",$email);
        $checkPasswordQuery->bindParam(":password",$currentpassword);
        $checkPasswordQuery->execute();
        if($checkPasswordQuery->rowCount() > 0){
          if($newpassword == $newmatchpassword){
              if(strlen($newpassword) < 6){
                echo 3;
                exit();  
              }else{
                  
                  $newpassword = md5($newpassword);
                  $changePasswordQuery = $con->prepare("UPDATE user SET password=:password WHERE email = :email");
                  $changePasswordQuery->bindParam(":password",$newpassword);
                  $changePasswordQuery->bindParam(":email",$email);
                  $changePasswordQuery->execute();
                  echo 4;
                  exit();
              }
          }else{
              echo 2;
              exit();
          }  
        }else{
            echo 1;
            exit();
        }
    }
    
    //Fetch email
    $registerquery = $con->prepare("SELECT * FROM user WHERE email = :email");
    $registerquery->bindParam(":email",$useremail);
    $registerquery->execute();
   
    
    
    
    $fetch_user_detail_email_query = $con->prepare("SELECT * FROM user_details WHERE user_email = :email");
    $fetch_user_detail_email_query->bindParam(":email",$useremail);
    $fetch_user_detail_email_query->execute();
    
    $resultFetchUserEmail = $fetch_user_detail_email_query->fetch();
    
    
    if($checkAvailblity->rowCount() > 0){
     
    $updateQuery = $con->prepare("UPDATE user_details SET user_email=:newmail,user_first_name=:firstname,user_last_name=:lastname,user_display_name=:displayname WHERE user_email = :email");
    
        
        if($useremail != ''){
              if($fetch_user_detail_email_query->rowCount() > 0){
                 $updateQuery->bindParam(":newmail",$email);
                  echo 5;
              }else{
                  if($registerquery->rowCount() > 0){
                      if($useremail == $email){
                        $updateQuery->bindParam(":newmail",$email); 
                         echo 5; 
                     }
                  }
                     else{
                         $updateQuery->bindParam(":newmail",$useremail);
                     }   
                  
              }
          }else{
            $updateQuery->bindParam(":newmail",$email); 
          }    

        
    if($firstname != ''){
     $updateQuery->bindParam(":firstname",$firstname);
    }else{
     $updateQuery->bindParam(":firstname",$fetchFirstname);    
    }
        
    if($lastname != ''){
     $updateQuery->bindParam(":lastname",$lastname);
    }else{
     $updateQuery->bindParam(":lastname",$fetchLastname);    
    }
        
    if($displayname != ''){
     $updateQuery->bindParam(":displayname",$displayname);
    }else{
     $updateQuery->bindParam(":displayname",$fetchDisplayname);    
    }    
    
    $updateQuery->bindParam(":email",$email);
    $updateQuery->execute();  
        
        
        if($useremail != ''){
              if($fetch_user_detail_email_query->rowCount() > 0){
                 //echo "Email is availble in user details table";   
                  echo 5;
              }else{
                  if($registerquery->rowCount() > 0){
                   //echo "Email is availble in user table"; 
                      if($useremail == $email){
                        //echo "Email is same"; 
                         echo 5;
                     }
                  }else{
                     
                $update_user_email = $con->prepare("UPDATE `user` SET email=:newemail WHERE email = :email");
                $update_user_email->bindParam(":newemail",$useremail);
                $update_user_email->bindParam(":email",$email);
                $update_user_email->execute();
                //Change session veribal value
                $email = $useremail; 
                $_SESSION['email']  = $email;
                echo 7;  
                     }   
                  }
              }
              
        
        
        
        
    echo 6;
    exit();
    
        
        
    }else{
   
    $insertQuery = $con->prepare("INSERT INTO user_details(user_email, user_first_name, user_last_name, user_display_name) VALUES (:email,:first_name,:last_name,:display_name)");
        
        
    if($useremail != ''){
              if($fetch_user_detail_email_query->rowCount() > 0){
                 $insertQuery->bindParam(":email",$email);
                  echo 5;
              }else{
                  if($registerquery->rowCount() > 0){
                   if($useremail == $email){
                        $insertQuery->bindParam(":email",$email); 
                         echo 5; 
                     }
                  }
                     else{
                         $insertQuery->bindParam(":email",$useremail);
                     }   
              }
          }else{
            $insertQuery->bindParam(":email",$email); 
          }
     
        
        
        
    if($firstname != ''){
     $insertQuery->bindParam(":first_name",$firstname);
    }else{
     $insertQuery->bindParam(":first_name",$fetchFirstname);    
    }
        
    if($lastname != ''){
     $insertQuery->bindParam(":last_name",$lastname);
    }else{
     $insertQuery->bindParam(":last_name",$fetchLastname);    
    }
        
    if($displayname != ''){
     $insertQuery->bindParam(":display_name",$displayname);
    }else{
     $insertQuery->bindParam(":display_name",$fetchDisplayname);    
    }    
    
    $insertQuery->execute();
        
        if($useremail != ''){
              if($fetch_user_detail_email_query->rowCount() > 0){
                 //echo "Email is availble in user details table";   
                  echo 5;
              }else{
                  if($registerquery->rowCount() > 0){
                   //echo "Email is availble in user table"; 
                      if($useremail == $email){
                        //echo "Email is same"; 
                         echo 5;
                     }
                  }
                     else{
                $update_user_email = $con->prepare("UPDATE `user` SET email=:newemail WHERE email = :email");
                $update_user_email->bindParam(":newemail",$useremail);
                $update_user_email->bindParam(":email",$email);
                $update_user_email->execute();
                //Change session veribal value
                $email = $useremail; 
                $_SESSION['email']  = $email;
                echo 7;         
                     }   
              }
          }
    echo 6;
    exit();    
    }
    
    
    
    
}


    if(isset($_POST['track_order'])){
    $trackingId = htmlspecialchars($_POST['track_order']);
    
    $checkTrackingid = $con->prepare("SELECT * FROM order_status WHERE order_unique_id = :transaction_id");
    $checkTrackingid->bindParam(":transaction_id",$trackingId);
    $checkTrackingid->execute();

    $resultTrackingId = $checkTrackingid->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($resultTrackingId) > 0){
       
    
        //$order_status_details = $checkTrackingid->fetch();
        foreach($resultTrackingId as $row){
            $last_status_change_date = $row['last_status_date'];
            $order_status = $row['status'];
        }
        

        $order_details_query = $con->prepare("SELECT * FROM product_order_details WHERE order_unique_id = :transaction_id");
        $order_details_query->bindParam(":transaction_id",$trackingId);
        $order_details_query->execute();
        
        $order_details_data = $order_details_query->fetch();
        
        $product_id = $order_details_data['p_id'];
        $product_name = $order_details_data['p_name'];
        $product_price = $order_details_data['price'];
        $product_qty = $order_details_data['qty'];
        $product_total = $order_details_data['total'];
        $order_date = $order_details_data['date'];
        $payment_method = $order_details_data['payment_mode'];

        $proquery = $con->prepare("SELECT image FROM product WHERE id=:id");
        $proquery->bindParam(":id",$product_id);
        $proquery->execute();
        $image = $proquery->fetchColumn(); 
        
        

        switch($order_status){
            case "confirm order":
            $order_status_number = 0;
            break;
            case "Processing Order" :
            $order_status_number = 1;
            break;
            case "Product Dispatched" :
            $order_status_number = 2;
            break;
            case "Product Delivered" :
            $order_status_number = 3;
            break;
            case "Product Return" :
            $order_status_number = 4;
            break;
            default: $order_status_number = 8;

        }

        $data = ["lastStatusDate"=>$last_status_change_date,"order_status"=>$order_status,"product_id"=>$product_id,
        "product_name"=>$product_name,"product_image"=>$image,"price"=>$product_price,
        "qty"=>$product_qty,"total"=>$product_total,"order_date"=>$order_date,"payment"=>$payment_method,"trackId"=>$trackingId,
        "orderStatusNumber"=>$order_status_number];

        echo json_encode($data);
        exit();
    } else{
        //ID Not EXISTS
        echo "1";
        exit();

    }
    }
//Track Order Ends Here


//Order Cancel Button
if(isset($_POST['cancelOrderId'])){
    if(!isset($_SESSION['email'])){
        header("location:loginregister.php");
    }
    
    $orderUniqueID = htmlspecialchars($_POST['cancelOrderId']);
    
    $email = $_SESSION['email'];
    //Get user Id
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$email);
    $useridquery->execute();
    $userresult = $useridquery->fetch();   
    $userid = $userresult['id'];
    
    //Check if the user who order the button is making this request
    
    $checkUserQuery = $con->prepare("SELECT * FROM order_status WHERE user_id = :user_id and order_unique_id = :orderID");
    $checkUserQuery->bindParam(":user_id",$userid);
    $checkUserQuery->bindParam(":orderID",$orderUniqueID);
    $checkUserQuery->execute();
    
    
    if($checkUserQuery->rowCount() > 0){
        $fetchOrderData = $checkUserQuery->fetch();
        $order_status = $fetchOrderData['status'];
        if($order_status != 'Product Dispatched'){
          $cancelOrderQuery = $con->prepare("UPDATE order_status SET last_status_date=:date,status=:status WHERE order_unique_id = :uniqueId");
          $date = date('d-m-Y');
          $cancelOrderText = 'Cancel Order';    
          $cancelOrderQuery->bindParam(":date",$date);
          $cancelOrderQuery->bindParam(":status",$cancelOrderText);
          $cancelOrderQuery->bindParam(":uniqueId",$orderUniqueID);
          $cancelOrderQuery->execute();
          exit();    
        }else{
          echo 1;
            exit();
        }
        
    }else{
       echo 2;  
    }
    
}

//Order Return Button
if(isset($_POST['returnOrderId'])){
    
    if(!isset($_SESSION['email'])){
        header("location:loginregister.php");
    }
    
    $orderUniqueID = htmlspecialchars($_POST['returnOrderId']);
    
    $email = $_SESSION['email'];
    //Get user Id
    $useridquery = $con->prepare("SELECT * FROM user WHERE email =:email");    
    $useridquery->bindParam(":email",$email);
    $useridquery->execute();
    $userresult = $useridquery->fetch();   
    $userid = $userresult['id'];
    
    //Check if the user who order the button is making this request
    
    $checkUserQuery = $con->prepare("SELECT * FROM order_status WHERE user_id = :user_id and order_unique_id = :orderID");
    $checkUserQuery->bindParam(":user_id",$userid);
    $checkUserQuery->bindParam(":orderID",$orderUniqueID);
    $checkUserQuery->execute();
    
    
    if($checkUserQuery->rowCount() > 0){
    $fetchOrderData = $checkUserQuery->fetch();
    $returnLastDate = $fetchOrderData['return_last_date'];
    $date = date('d-m-Y');
        if($date == $returnLastDate){
            $return_status = $fetchOrderData['status'];
            echo $return_status;
            exit();
        }else{
          $returnRequestText = 'Return Request';
          $cancelOrderQuery = $con->prepare("UPDATE order_status SET last_status_date=:date,status=:status WHERE order_unique_id = :uniqueId");    
          $cancelOrderQuery->bindParam(":date",$date);
          $cancelOrderQuery->bindParam(":status",$returnRequestText);
          $cancelOrderQuery->bindParam(":uniqueId",$orderUniqueID);
          $cancelOrderQuery->execute();
            echo 1;
            exit();
        }
        
    }else{
       echo 2;
        exit();
    }
    
}




?>


