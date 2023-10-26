<?php include "header.php"; 
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $selquery = $con->prepare("SELECT * FROM product WHERE id = :id ");
    $selquery->bindParam(":id",$id);
    $selquery->execute();
    $selrow = $selquery->fetch();
    $pname = $selrow['name'];
    $pprice = $selrow['price'];
    $pdes = $selrow['descreption'];
    $pimg = $selrow['image'];
    
    ?>

<div class="container">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label>Product Name</label>
            <input value="<?php echo $pname; ?>" type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" value="<?php echo $pprice; ?>" name="price" class="form-control">
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
            <input value="<?php echo $pimg; ?>" type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Descreption</label>
            <textarea name="descreption" value="" class="form-control" rows="8" cols="18"><?php echo $pdes; ?></textarea>
        </div>
        <div>
        <input type="submit" name="submit" class="btn btn-primary">
        </div>
    </form>
    <?php 
    if(isset($_POST['submit'])){
        $id = $_GET['edit'];
        $product_name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
        $stock = htmlspecialchars($_POST['stock']);
        $descreption = htmlspecialchars($_POST['descreption']);
        $image = $_FILES['image']['name'];
        if($image == ''){
        $query = $con->prepare("UPDATE product SET name=:name,price=:price,stock=:stock,descreption=:descreption WHERE id=:id ");    
        $query->bindParam(":id",$id);
        $query->bindParam(":name",$product_name);
        $query->bindParam(":price",$price);
        $query->bindParam(":stock",$stock);
        $query->bindParam(":descreption",$descreption);
        $query->execute();
        echo '<div class="alert alert-success" role="alert">
        Product Edited successfully <a href="../cart.php?id=' . $id . '" class="alert-link">Visit product</a>
        </div>';    
        }else{
        $post_image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_tmp,"../upload/product/$image");
        $query = $con->prepare("UPDATE product SET name=:name,price=:price,stock=:stock,descreption=:descreption,image=:image WHERE id=:id ");
        $query->bindParam(":id",$id);
        $query->bindParam(":name",$product_name);
        $query->bindParam(":price",$price);
        $query->bindParam(":stock",$stock);
        $query->bindParam(":descreption",$descreption);
        $query->bindParam(":image",$image);
        $query->execute();
        echo '<div class="alert alert-success m-3" role="alert">
        Product Edited successfully <a href="../cart.php?id=' . $id . '" class="alert-link">Visit product</a>
        </div>';
        }
        
        
    }
    ?>

</div>



<?php } ?>
<?php include "admin_footer.php"; ?>