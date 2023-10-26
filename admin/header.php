<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/dataTable.css">
    <title>Admin Panel</title>

    <!--  -->

    <style>
       
    </style>

</head>

<body>


    <?php include "../conn.php"; ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addproduct.php">Add Product</a></li>
                        <li><a href="manageproduct.php">Manage Product</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Coupon
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addcoupon.php">Add Coupon</a></li>
                        <li><a href="managecoupon.php">Manage Coupon</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Order
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       <?php 
                        $newOrderText = 'Order pending';
                        //Count New Order
                        $countNewOrderSql = $con->prepare("SELECT count(*) FROM order_status WHERE status = :neworder");
                        $countNewOrderSql->bindParam(":neworder",$newOrderText);
                        $countNewOrderSql->execute();
                        $totNewOrder = $countNewOrderSql->fetchcolumn();
                        ?>
                        <li><a href="order.php">Order (<?php echo $totNewOrder; ?>)</a></li>
                        <li><a href="manageorder.php">Manage order</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>