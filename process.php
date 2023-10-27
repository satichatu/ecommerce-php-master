<?php 

session_start();
session_regenerate_id(true);
 if(!isset($_SESSION['email']))
    {
        header('location:loginregister.php');
    }
 

  if(isset($_POST['checkout_submit'])){
     
     include_once "conn.php";
     //Get user id                                            
    $useremail = $_SESSION['email'];
    $fetchuserid = $con->prepare("SELECT * FROM user WHERE email = :email");
    $fetchuserid->bindParam(":email",$useremail);
    $fetchuserid->execute();
    $fetchresofuser = $fetchuserid->fetch();
    $userid = $fetchresofuser['id'];
      
      
    // Get total of user cart
        $totalqueryoftotal = $con->prepare("SELECT total FROM total WHERE user_id=:userid");
        $totalqueryoftotal->bindParam(":userid",$userid);
        $totalqueryoftotal->execute(); 
      
        $totalAmount = $totalqueryoftotal->fetchColumn();
      
      
      //Genrate Unique Orderid
      function checkKeys($con,$str,$type){
        $checkTransectionIdQuery = $con->prepare("SELECT * FROM product_order_details");
        $checkTransectionIdQuery->execute();
          
        $result = $checkTransectionIdQuery->fetchAll(PDO::FETCH_ASSOC);

        if($type == "transaction_id"){
          foreach($result as $row){
            if($row['transaction_id'] == $str){
              $checkId = true;
                
              break;    
            }else{
              $checkId = false; 
                 
            }
        }
        return $checkId;  
        }
        else if($type == 'order_unique_id'){
          foreach($result as $row){
            if($row['order_unique_id'] == $str){
              $checkId = true;
                
              break;    
            }else{
              $checkId = false; 
                 
            }  
        }
      }
    }
      
      function genrateKey($con,$type){
      $keyLength = 16;
      $str = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      $randStr = substr(str_shuffle($str), 0 ,$keyLength);
      $checkKeys = checkKeys($con,$randStr,$type);
          
      while($checkKeys == true){
        $randStr = substr(str_shuffle($str), 0 ,$keyLength);
        $checkKeys = checkKeys($con,$randStr);  
      }
       return $randStr;      
      }
      
      
      
     $transaction_id = genrateKey($con,'transaction_id');
    // Unique Id ends


    $stockyes = 'Yes';  
    $queryCart = $con->prepare("SELECT * FROM cart WHERE user_id=:ip and stock=:yes");
    $queryCart->bindParam(":ip",$userid);
    $queryCart->bindParam(":yes",$stockyes);
    $queryCart->execute();
    $resultCart = $queryCart->fetchAll(PDO::FETCH_ASSOC);   
      
      
      
      $firstname = htmlspecialchars($_POST['firstname']);
      $lastname = htmlspecialchars($_POST['lastname']);
      $emailfill = htmlspecialchars($_POST['emailform']);
      $mobileno = htmlspecialchars($_POST['mobileform']);
      $address1 = htmlspecialchars($_POST['address1']);
      $address2 = htmlspecialchars($_POST['address2']);
      $country = htmlspecialchars($_POST['countryform']);
      $city = htmlspecialchars($_POST['cityform']);
      $state = htmlspecialchars($_POST['state']);
      $zipcode = htmlspecialchars($_POST['zipcode']);
      
      $fullname = $firstname . " " . $lastname;
      $fullAddress = $address1 . " " . $address2; 
      $paymentMethod = htmlspecialchars($_POST['payment-method']);
      $date = date('d-m-Y'); 
      $status = "Order pending";
      
      
      if($_POST['payment-method']=="cash")
      {
         // now wrtie insert query
        foreach($resultCart as $row){
            $productname = $row['p_name'];
            $price = $row['price'];
            $qty = $row['qty'];    
            $total = $price * $qty;
            $product_id = $row['p_id'];
            
            $transaction_id_product = genrateKey($con,'order_unique_id');
            
            $insertQuery = $con->prepare("INSERT INTO product_order_details(`p_id`, `p_name`, `price`, `qty`, `date`, `total`, `user_id`, `transaction_id`, `payment_mode` ,`order_unique_id`) VALUES (:p_id, :p_name, :price, :qty, :date, :total, :user_id, :transaction_id, :payment_mode, :order_unique_id)");
            
            $insertQuery->bindParam("p_id",$product_id);
            $insertQuery->bindParam("p_name",$productname);
            $insertQuery->bindParam(":price",$price);
            $insertQuery->bindParam(":qty",$qty);
            $insertQuery->bindParam(":date",$date);
            $insertQuery->bindParam(":total",$total);
            $insertQuery->bindParam(":user_id",$userid);
            $insertQuery->bindParam(":transaction_id",$transaction_id);
            $insertQuery->bindParam(":payment_mode",$paymentMethod);
            $insertQuery->bindParam(":order_unique_id",$transaction_id_product);
            $insertQuery->execute();
        
         
        $insertUserDetails = $con->prepare("INSERT INTO product_custoumer_details(transaction_id, user_id, custoumer_name, mobile_no, email, address, country, city, state, zip) VALUES (:transaction_id,:userid,:custoumer_name,:mobile,:email,:address,:country,:city,:state,:zip)");
        $insertUserDetails->bindParam(":transaction_id",$transaction_id);
        $insertUserDetails->bindParam(":userid",$userid);
        $insertUserDetails->bindParam(":custoumer_name",$fullname);    
        $insertUserDetails->bindParam(":mobile",$mobileno);
        $insertUserDetails->bindParam(":email",$emailfill);
        $insertUserDetails->bindParam(":address",$fullAddress);
        $insertUserDetails->bindParam(":country",$country);
        $insertUserDetails->bindParam(":city",$city);
        $insertUserDetails->bindParam(":state",$state);
        $insertUserDetails->bindParam(":zip",$zipcode);
        $insertUserDetails->execute();  

        
        
        $insertOrderStatus = $con->prepare("INSERT INTO `order_status`(`user_id`, `product_id`, `last_status_date`, `amount`, `status`, `payment`, `transaction_id`, `order_unique_id`) 
        VALUES (:user_id,:p_id,:date,:amount,:status,:payment,:t_id,:order_unique_id) ");
        $insertOrderStatus->bindParam(":user_id",$userid);
        $insertOrderStatus->bindParam(":p_id",$product_id);
        $insertOrderStatus->bindParam(":date",$date);
        $insertOrderStatus->bindParam(":amount",$total);
        $insertOrderStatus->bindParam(":status",$status);
        $insertOrderStatus->bindParam(":payment",$paymentMethod);
        $insertOrderStatus->bindParam(":t_id",$transaction_id);
        $insertOrderStatus->bindParam(":order_unique_id",$transaction_id_product);
        $insertOrderStatus->execute();
            
      
     
        
      }
         $delProductQuery = $con->prepare("DELETE FROM `cart` WHERE user_id = :user_id and stock=:yes"); 
         $delProductQuery->bindParam(":user_id",$userid);
         $delProductQuery->bindParam(":yes",$stockyes);
         $delProductQuery->execute();
           
         $_SESSION['tid'] = $transaction_id;
         header("location:thank-you.php");
     }else if($_POST['payment-method']=='paypal'){

          // db save
        // now wrtie insert query
        foreach($resultCart as $row){
            $productname = $row['p_name'];
            $price = $row['price'];
            $qty = $row['qty'];    
            $total = $price * $qty;
            $product_id = $row['p_id']; 
            
            $insertQuery = $con->prepare("INSERT INTO product_order_details(`p_id`, `p_name`, `price`, `qty`, `date`, `total`, `user_id`, `transaction_id`, `payment_mode`) VALUES (:p_id, :p_name, :price, :qty, :date, :total, :user_id, :transaction_id, :payment_mode)");
            
            $insertQuery->bindParam("p_id",$product_id);
            $insertQuery->bindParam("p_name",$productname);
            $insertQuery->bindParam(":price",$price);
            $insertQuery->bindParam(":qty",$qty);
            $insertQuery->bindParam(":date",$date);
            $insertQuery->bindParam(":total",$total);
            $insertQuery->bindParam(":user_id",$userid);
            $insertQuery->bindParam(":transaction_id",$transaction_id);
            $insertQuery->bindParam(":payment_mode",$paymentMethod);
            $insertQuery->execute();
        
         
        $insertUserDetails = $con->prepare("INSERT INTO product_custoumer_details(transaction_id, user_id, custoumer_name, mobile_no, email, address, country, city, state, zip) VALUES (:transaction_id,:userid,:custoumer_name,:mobile,:email,:address,:country,:city,:state,:zip)");
        $insertUserDetails->bindParam(":transaction_id",$transaction_id);
        $insertUserDetails->bindParam(":userid",$userid);
        $insertUserDetails->bindParam(":custoumer_name",$fullname);    
        $insertUserDetails->bindParam(":mobile",$mobileno);
        $insertUserDetails->bindParam(":email",$emailfill);
        $insertUserDetails->bindParam(":address",$fullAddress);
        $insertUserDetails->bindParam(":country",$country);
        $insertUserDetails->bindParam(":city",$city);
        $insertUserDetails->bindParam(":state",$state);
        $insertUserDetails->bindParam(":zip",$zipcode);
        $insertUserDetails->execute(); 

        $insertOrderStatus = $con->prepare("INSERT INTO `order_status`(`user_id`, `product_id`, `last_status_date`, `amount`, `status`, `payment`, `transaction_id`) 
        VALUES (:user_id,:p_id,:date,:amount,:status,:payment,:t_id) ");
        $insertOrderStatus->bindParam(":user_id",$userid);
        $insertOrderStatus->bindParam(":p_id",$product_id);
        $insertOrderStatus->bindParam(":date",$date);
        $insertOrderStatus->bindParam(":amount",$total);
        $insertOrderStatus->bindParam(":status",$status);
        $insertOrderStatus->bindParam(":payment",$paymentMethod);
        $insertOrderStatus->bindParam(":t_id",$transaction_id);
        $insertOrderStatus->execute();
        
        $query = $con->prepare("SELECT SUM(total) AS total FROM product_order_details where transaction_id=:tid");
        $query->bindParam(":tid",$transaction_id);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $k)
        {
          $cart_total = $k['total']; 
          
        }
  
        $_SESSION['cart_total'] = $cart_total;
        $_SESSION['emailn'] = $emailfill;
        $_SESSION['fname'] = $firstname;
        $_SESSION['lname'] = $lastname;
        $_SESSION['tid'] = $transaction_id;

        header("location:paypal.php");
      }
          
      }else{
          
      }
  }

?>