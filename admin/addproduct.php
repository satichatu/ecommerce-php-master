<?php include "header.php"; ?>


   <?php 
    if(isset($_POST['submit'])){
        $product_name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
        $stock = htmlspecialchars($_POST['stock']);
        $descreption = htmlspecialchars($_POST['descreption']);
        $image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_tmp,"../upload/product/$image");
        $query = $con->prepare("INSERT INTO product (name, price, stock, descreption, image) VALUES (:name,:price,:stock,:descreption,:image)");
        $query->bindParam(":name",$product_name);
        $query->bindParam(":price",$price);
        $query->bindParam(":stock",$stock);
        $query->bindParam(":descreption",$descreption);
        $query->bindParam(":image",$image);
        $query->execute();
        
        //Get the data which is inserted right now
        
        $selectQuery = $con->prepare("SELECT id FROM product ORDER BY id DESC LIMIT 1;");
        $selectQuery->execute();
        $currentProductId = $selectQuery->fetchColumn();
        
        echo '<div class="alert alert-success" role="alert">
  Product Added successfully <a href="../cart.php?id=' . $currentProductId . '" class="alert-link">Visit product</a> or <a href="addproduct.php" class="alert-link">Add a new product</a>
</div>';
        ?>
        
        <?php } ?>
<div class="container">
    <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                       <label>Product Name</label>
                       <input type="text" name="name" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Price</label>
                       <input type="text" name="price" class="form-control">
                   </div>
                   <div class="form-group">
                      <label>Availiblity</label>
                       <select name="stock" class="form-control">
                           <option>Yes</option>
                           <option>No</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Select Image</label>
                       <input type="file" name="image" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Descreption</label>
                       <textarea name="descreption" class="form-control" rows="8" cols="18"></textarea>
                   </div>
                   <input type="submit" name="submit" class="btn btn-primary">
    </form>
 
    
</div>
<?php include "admin_footer.php"; ?>
