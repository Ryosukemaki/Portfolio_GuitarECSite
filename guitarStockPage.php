<?php
    include_once "header.php";
?>

<!-- Default Value -->
<?php
        $ProductName = '';
        $Price = '';
        $Stock = '';
        $Descrip = '';
        $ProductType = '';
        $update = false;
        $id = 0;
?>

<!-- Fuction: Stuff Delete -->
<?php
        if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          $sql = "DELETE FROM products WHERE id = $id;";

          if(mysqli_query($conn, $sql)){
?>
              <div class="alert alert-success" role="alert">
                 Record deleting successfully!
              </div>
<?php
          } else {
?>
              <div class="alert alert-danger" role="alert">
                  Error deleting record:
              </div>
<?php
          }
        }
?>

<!-- Function: Click Edit button -->
<?php
        if(isset($_GET['edit'])){
          $id = $_GET['edit'];

          $sql ="SELECT * FROM products WHERE id = $id;";
          $result = $conn->query($sql);
          $update = true;

          if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $ProductImage = $row['Product_Image'];
            $ProductName = $row['Product_Name'];
            $Price = $row['Price'];
            $Stock = $row['Stock'];
            $Descrip = $row['Descrip'];
            $ProductType = $row['Product_Type'];
          } else{
            echo "0 result";
          }
        }
?>

<!-- Function: Edit Data -->
<?php
        if(isset($_POST['update'])){
          //Get image name
          $ProductImage = $_FILES['product']['name'];
          //image file directory
          $target = "GuitarImage/".basename($ProductImage);
          $ProductName = $_POST['productName'];
          $Price = $_POST['price'];
          $Stock = $_POST['stock'];
          $Descrip = $_POST['descrip'];
          $ProductType = $_POST['productType'];
          $id = $_POST['id'];

            $sql = "UPDATE products SET Product_Image = '$ProductImage' ,Product_Name = '$ProductName', Price = '$Price' , Stock = '$Stock' , Descrip = '$Descrip' , Product_Type = '$ProductType' WHERE id = $id;";

            move_uploaded_file($_FILES['product']['tmp_name'], $target);

              if(mysqli_query($conn, $sql)){
?>
                <div class="alert alert-success" role="alert">
                    Record updating successfully!
                </div>
<?php
              } else {
?>
                <div class="alert alert-danger" role="alert">
                    Error updating record:
                </div>
<?php
              }  
        }
?>

<!-- Function: Click Stock Add button -->
<?php
        if(isset($_GET['stockAdd'])){
          $id = $_GET['stockAdd'];

          $sql ="SELECT * FROM products WHERE id = $id;";
          $result = $conn->query($sql);

          if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $Stock = $row['Stock'];
            $add = '<input type="text" name="add" class="form-control" >';
            $number = $_POST['add'];
            
          } else{
            echo "0 result";
          }
        }
?>


<!-- Function: Insert Date -->
<?php
        if(isset($_POST['save'])){
        //Get image name
        $ProductImage = $_FILES['product']['name'];
        //image file directory
        $target = "GuitarImage/".basename($ProductImage);
        $ProductName = $_POST['productName'];
        $Price = $_POST['price'];
        $Stock = $_POST['stock'];
        $Descrip = $_POST['descrip'];
        $ProductType = $_POST['productType'];

        //sql to create table
        $sql = "INSERT INTO products (Product_Name, Product_Image, Price, Stock, Descrip, Product_Type) VALUE('$ProductName','$ProductImage','$Price', '$Stock','$Descrip','$ProductType')";
        
        move_uploaded_file($_FILES['product']['tmp_name'], $target);

            if($conn->query($sql) === TRUE){
?>
              <div class="alert alert-success" role="alert">
                New record created successfully!
              </div>
<?php
            } else{
?>
              <div class="alert alert-danger" role="alert">
                    Error creating new record <?php echo $conn->error;?>
              </div>
<?php
            }
          }
?>

<!-- Display Stock -->
       <div class="container mt-5"> 
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Product_image</th>
                <th scope="col">Product_Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Description</th>
                <th scope="col">Product Type</th>
                <th scope="col">Warning</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
            <tbody>
<?php
              $sql = "SELECT * FROM products";
              $result = $conn->query($sql);

              if($result){
                while($row = $result->fetch_assoc()){
?>
                <tr>
                   <th scope="row"><?php echo $row["id"];?></th>
                   <td><?php echo "<img width='80px' src='GuitarImage/".$row['Product_Image']." '>"; ?></td>
                   <td><?php echo $row["Product_Name"];?></td>
                   <td><?php echo $row["Price"];?></td>
                   <td><?php echo $row["Stock"];?></td>
                   <td><?php echo $row["Descrip"];?></td>
                   <td><?php echo $row["Product_Type"];?></td>
                   <td>
<?php
// Warning Sign  
              if($row["Stock"] <= 5){
?>
                    <a href="" class="btn btn-warning">Warning</a>
<?php
              }else {
              }
?>
                   </td>
                   <td>
                   <a href="guitarStockPage.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">EDIT</a>
                   <a href="guitarStockPage.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>     
                   <a href="guitarStockPage.php?stockAdd=<?php echo $row["id"]; ?>" class="btn btn-primary">Stock Add</a>
                   <?php echo "$addText"; ?>
                   </td>
                </tr>
<?php
                 }
?>
            </tbody>
          </table>
        </div>
<?php
                } else{
                    echo "0 results";
                }
?>

<!-- Display Insert and Edit Form -->
          <div class="row justify-content-center">
              <form action="" method="POST" enctype="multipart/form-data">
<?php
                if($update == true){
?>
                  <input type="hidden" name="id" value  ="<?php echo $id; ?>">
                  Product Picture
                  <div class="custom-file mb-3">
                    <input type="file" name="product" class="custom-file-input" id="product" required>
                    <label class="custom-file-label" for="product">Choose product image...</label>
                  </div>
                  Product Name <input type="text" name="productName" class="form-control" value="<?php echo $ProductName; ?>" >
                  Price <input type="text" name="price" class="form-control" value="<?php echo $Price; ?>" >
                  Stock <input type="text" name="stock" class="form-control" value="<?php echo $Stock; ?>" >
                  Description <input type="text" name="descrip" class="form-control" value="<?php echo $Descrip; ?>" >
                  Product Type<select class="form-control" name="productType">
                                <option value = 1>Acoustic</option>
                                <option value = 2>Electric</option>
                                <option value = 3>Accessories</option>
                              </select>
                  <button type="submit" name="update" class="btn btn-primary my-3">UPDATE</button>
<?php
                } else{
?>
                  Product Picture
                  <div class="custom-file mb-3">
                    <input type="file" name="product" class="custom-file-input" id="product" required>
                    <label class="custom-file-label" for="product">Choose product image...</label>
                  </div>
                  Product Name <input type="text" name="productName" class="form-control" >
                  Price <input type="text" name="price" class="form-control" >
                  Stock <input type="text" name="stock" class="form-control" >
                  Description <input type="text" name="descrip" class="form-control" >
                  Product Type<select class="form-control" name="productType">
                                <option value = 1>Acoustic</option>
                                <option value = 2>Electric</option>
                                <option value = 3>Accessories</option>
                              </select>
                  <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>
<?php
                  }
?>
              </form>
          </div>

   
<?php
    include_once "footer.php";
?>
