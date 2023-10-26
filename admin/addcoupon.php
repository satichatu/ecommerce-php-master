<?php include "header.php"; ?>
<div class="container">
 <form action="" method="post">
                  <div class="form-group">
                       <label>Coupon Code</label>
                       <input type="text" name="code" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Discount</label>
                       <input type="text" name="discount" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Minimum Value</label>
                       <input type="text" name="min_val" class="form-control">
                   </div>
                    <input type="submit" name="submit" class="btn btn-primary">
</form></div>
<?php 
  if(isset($_POST['submit'])){
      $code = htmlspecialchars($_POST['code']);
      $discount = htmlspecialchars($_POST['discount']);
      $minval = htmlspecialchars($_POST['min_val']);
      $query = $con->prepare("INSERT INTO coupon (couponcode, discount, min_val) VALUES (:code,:discount,:minval)");
      $query->bindParam(":code",$code);
      $query->bindParam(":discount",$discount);
      $query->bindParam(":minval",$minval);
      $query->execute();
      header('location:managecoupon.php');
  }
?>
<?php include "admin_footer.php"; ?>
