<?php include "header.php";
$selquery = $con->prepare("SELECT * FROM coupon");
$selquery->execute();
$result = $selquery->fetchAll(PDO::FETCH_ASSOC);
if($result > 0){
 ?>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Coupon Code</th>
            <th>Discount</th>
            <th>Minimum Value</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
    foreach($result as $row){
     $id = $row['id'];   
     $code = $row['couponcode'];
     $discount = $row['discount'];
     $minval = $row['min_val'];
     echo "<tr>
     <td>$code</td>
     <td>$discount</td>
     <td>$minval</td>
     <td><a href='delete.php?coupon=$id' class='btn btn-danger'>Delete</a></td>
     <td><a href='editcoupon.php?edit=$id' class='btn btn-primary'>EDIT</a></td>
     </tr>";   
        
    }
    ?>
        <?php }
?>
    </tbody>
</table>
<?php include "admin_footer.php"; ?>