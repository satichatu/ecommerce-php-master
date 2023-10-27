<?php 

include "conn.php";

$name = 'azeez';
$phoneno = 7007863331;
$address = '448/242 near hayat masjid';

$cartItemQuery = $con->prepare("SELECT * FROM cart WHERE user_id = 1");
$cartItemQuery->execute();

$res = $cartItemQuery->fetchAll(PDO::FETCH_ASSOC);

foreach($res as $row){
    $product id = $row['p_id'];
    $price = $
}



?>