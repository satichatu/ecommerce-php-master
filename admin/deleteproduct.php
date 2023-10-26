<?php 
if(isset($_GET['id'])){
    include "header.php";
    $id = $_GET['id'];
    $del = $con->prepare("DELETE FROM product WHERE id = $id");
    $del->execute();
    header('location:manageproduct.php');
}
if(isset($_GET['coupon'])){
    include "header.php";
    $id = $_GET['coupon'];
    $del = $con->prepare("DELETE FROM coupon WHERE id = $id");
    $del->execute();
    header('location:managecoupon.php');
}


?>