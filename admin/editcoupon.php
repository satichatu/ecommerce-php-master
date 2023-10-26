<?php include "header.php"; 

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $selquery = $con->prepare("SELECT * FROM coupon WHERE id = :id ");
    $selquery->bindParam(":id",$id);
    $selquery->execute();
    $selrow = $selquery->fetch();
    $code = $selrow['couponcode'];
    $discount = $selrow['discount']; 
    $min_val = $selrow['min_val'];
 ?>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label>Coupon Code</label>
            <input type="text" value="<?php echo $code; ?>" name="code" class="form-control">
        </div>
        <div class="form-group">
            <label>Discount</label>
            <input type="text" name="discount" value="<?php echo $discount; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Minimum Value</label>
            <input type="text" name="min_val" value="<?php echo $min_val; ?>" class="form-control">
        </div>
        <input type="submit" value="Edit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php
  if(isset($_POST['submit'])){
  $code = htmlspecialchars($_POST['code']);
  $discount = htmlspecialchars($_POST['discount']);
  $minFormVal = htmlspecialchars($_POST['min_val']);  
  $query = $con->prepare("UPDATE coupon SET couponcode=:code,discount=:dis,min_val=:minval WHERE id=:id ");
  $query->bindParam(":id",$id);
  $query->bindParam(":code",$code);
  $query->bindParam(":dis",$discount);
  $query->bindParam(":minval",$minFormVal);      
  $query->execute();
  header('location:managecoupon.php');
  }



}?>
<?php include "admin_footer.php"; ?>