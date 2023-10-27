<?php ob_start(); session_start();  ?>
        <?php include "header.php";
if(isset($_SESSION['email'])){
    header("location:index.php");
}
?>

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="./assets/images/bg/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Login Register</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Login Register</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Login Register section start-->
        <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
                <div class="row">
                        <!--Login Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register">
                                <div class="form-login-title">
                                    <h2>Login</h2>
                                </div>
                                <div class="login-form">
                                   
                                   
                                    <form action="#" method="post">
                                        <div class="form-fild">
                                            <p><label>Email address <span class="required">*</span></label></p>
                                            <input name="email" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Password <span class="required">*</span></label></p>
                                            <input name="password" value="" type="password">
                                        </div>
                                        <div class="login-submit">
                                            <input type="submit" name="login" class="btn" value="login">
                                            <label>
                                                <input class="checkbox" name="rememberme" value="" type="checkbox">
                                                <span>Remember me</span>
                                            </label>
                                        </div>
                                        <div class="lost-password">
                                            <a href="forgetpassword.php">Lost your password?</a>
                                        </div>
                                    </form>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!--Login Form End-->
                        <?php include "conn.php";
                    
                       if(isset($_POST['login'])){
                           $email = htmlspecialchars($_POST['email']);
                           $password = htmlspecialchars($_POST['password']);
                           $password = md5($password);
                           $selquery = $con->prepare("SELECT * FROM user WHERE email =:email and password =:password");
                           $selquery->bindParam(":email",$email);
                           $selquery->bindParam(":password",$password);
                           $selquery->execute();
                           $resultres = $selquery->fetchAll(PDO::FETCH_ASSOC);
                           if(count($resultres) > 0){
                                        
		                   $_SESSION['email'] = $email;
		                   header("location:cartlist.php");  
                            exit();   
                           }else{
                           echo "<script>alert('Record not found!');</script>";    
                           }
                       }
                        ?>
                        <!--Register Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register register-pt-0">
                                <div class="form-register-title">
                                    <h2>Register</h2>
                                </div>
                                <div class="register-form">
                                    <form action="" method="post">
                                        <div class="form-fild">
                                            <p><label>Email address <span class="required">*</span></label></p>
                                            <input name="emailreg" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Password <span class="required">*</span></label></p>
                                            <input name="passwordreg" value="" type="password">
                                        </div>
                                        <div class="register-submit">
                                            <input name="register" value="Register" type="submit" class="btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Register Form End-->
        <?php
    if(isset($_POST['register'])){
        $email = htmlspecialchars($_POST['emailreg']);
        $password = htmlspecialchars($_POST['passwordreg']);
        $password = md5($password);
        $registerquery = $con->prepare("SELECT * FROM user WHERE email = :email");
        $registerquery->bindParam(":email",$email);
        $registerquery->execute();
        $result = $registerquery->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) > 0){
        echo "<script>alert('This Email already availble');</script>";
        exit();
        }else{
        $register = $con->prepare("INSERT INTO user (email, password) VALUES (:email,:password)");
        $register->bindParam(":email",$email);
        $register->bindParam(":password",$password);
        $register->execute();
        echo "<script>alert('Value Inserrted');</script>";  
                    }    
            }
    ?>
                        
                        
                        
                    </div>            
            </div>
        </div>
        <!--Login Register section end-->

        <!--NewsLetter section start-->
        <div class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter-wrapper">
                            <p class="small-text">Special Ofers For Subscribers</p>
                            <h3 class="title">Ten Percent Member Discount</h3>
                            <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
    
                            <div class="newsletter-form">
                                <form id="mc-form" class="mc-form">
                                    <input type="email" placeholder="Enter Your Email Address Here..." required="">
                                    <button type="submit" value="submit">SUBSCRIBE!</button>
                                </form>
    
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--NewsLetter section end-->

        <?php include "footer.php"; ?>