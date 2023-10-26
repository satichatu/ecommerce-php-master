<?php include "header.php";
//Add multiple products
if(isset($_POST['checkBoxarr'])){
foreach($_POST['checkBoxarr'] as $row){
$productid = htmlspecialchars($row);
$bulkoption = htmlspecialchars($_POST['bulkoption']);
 switch($bulkoption){
     case 'select':
      echo '<div class="alert alert-danger text-center" role="alert">
    No option selected
    </div>';   
      break;   
     case 'Yes':
    $stockquery = $con->prepare("UPDATE product SET stock = :yes WHERE id = :id;");
    $stockquery->bindParam(":yes",$bulkoption);     
    $stockquery->bindParam(":id",$productid);
    $stockquery->execute();
    break; 

    case 'No':    
    $stockquery = $con->prepare("UPDATE product SET stock = :no WHERE id = :id;");
    $stockquery->bindParam(":no",$bulkoption);     
    $stockquery->bindParam(":id",$productid);
    $stockquery->execute();     
    break;

     case 'delete':
     $deleteQuery = $con->prepare("DELETE FROM product WHERE id = :id");
     $deleteQuery->bindParam(":id",$productid);
     $deleteQuery->execute(); 
     break;

     case 'clone':
     $clonequery = $con->prepare("SELECT * FROM product WHERE id = :id");
     $clonequery->bindParam(":id",$productid);
     $clonequery->execute();
     $cloneresult = $clonequery->fetchAll(PDO::FETCH_ASSOC);     
     foreach($cloneresult as $rownew){
     $name = $rownew['name'];
     $price = $rownew['price'];
     $stock = $rownew['stock'];
     $descreption = $rownew['descreption'];
     $image = $rownew['image'];
   
    $query = $con->prepare("INSERT INTO product (name, price, stock, descreption, image) VALUES (:name,:price,:stock,:descreption,:image)");
    $query->bindParam(":name",$name);
    $query->bindParam(":price",$price);
    $query->bindParam(":stock",$stock);
    $query->bindParam(":descreption",$descreption);
    $query->bindParam(":image",$image);
    $query->execute();     
     }   
     break; 
                 
    //switch statement ends here             
         }
     //all checkbox loops ends here
    }
}


$selquery = $con->prepare("SELECT * FROM product");
$selquery->execute();
$result = $selquery->fetchAll(PDO::FETCH_ASSOC);
if($result > 0){
 ?>
 
 <div class="row">
 <div class="col-lg-12">
  <div class="table-responsive">
   <form method="post" action="">
   <table id="table-pagination" class="table table-striped table-bordered">
   
   
   
   
    <div class="selectClass">               
    <div id="bulkoption" class="col-xs-4">
        <select class="form-control" name="bulkoption" id="">
            <option value="select">Select</option>
            <option value="Yes">Back to stock</option>
            <option value="No">Out of stock</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone Product</option>
        </select>
    </div>               
    </div>   
                
    <div class="col-xs-4">
        <input type="submit" onclick="javascript: return confirm('Are you sure to do this action');" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="addproduct.php">Add product</a>
    </div> 
                  
    <thead class="thead-dark">
        <tr>
            <th><input type='checkbox' id="selectAllBoxes"></th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Availibity</th>
            <th>Descreption</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>   
    <?php 
    foreach($result as $row){
     $id = $row['id'];   
     $name = $row['name'];
     $price = $row['price'];
     $availiblity = $row['stock'];
     $descreption = substr($row['descreption'],0,50) ;
     $image = $row['image'];
     echo "<tr>
     <td><input type='checkbox' class='checkBoxes' name='checkBoxarr[]' value='$id'></td>
     <td>$name</td>
     <td>$price</td>
     <td>$availiblity</td>
     <td>$descreption</td>
     <td><img src='../upload/product/$image' height='100px'></td>
     <td><a onclick=\"javascript: return confirm('Are you sure to delete this?'); \" href='deleteproduct.php?id=$id' class='btn btn-danger'>Delete</a></td>
     <td><a href='editproduct.php?edit=$id' class='btn btn-primary'>EDIT</a></td>
     </tr>";   
        
    }
    ?>

       </tbody>
       </table>
       </form>
       </div>
       </div>
       </div>
       <?php }
 else{
?>
    <div class="alert alert-danger text-center" role="alert">
    No product added yet <a href="addproduct.php" class="alert-link">Add product</a>
    </div>
  <?php } ?>

<?php include "admin_footer.php"; ?>


