<?php
    include_once "header.php";
?>

<!-- Default Value -->
<?php
        $ProductName = '';
        $Price = '';
        $Stock = '';
        $Descrip = '';
        $update = false;
        $id = 0;
?>

<!-- Function Insert Date -->
<?php
        if(isset($_POST['save'])){
        $ProductName = $_POST['productName'];
        $Price = $_POST['price'];
        $Stock = $_POST['stock'];
        $Descrip = $_POST['descrip'];

//sql to create table
        $sql = "INSERT INTO products (Product_Name, Price, Stock, Descrip) VALUE('$ProductName', '$Price', '$Stock', '$Descrip')";

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
                <th scope="col">Product_Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Description</th>
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
                   <td><?php echo $row["Product_Name"];?></td>
                   <td><?php echo $row["Price"];?></td>
                   <td><?php echo $row["Stock"];?></td>
                   <td><?php echo $row["Descrip"];?></td>
                   <td>
                   <a href="" class="btn btn-warning">Warning</a>
                   </td>
                   <td>
                   <a href="guitarStockPage.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">EDIT</a>
                   <a href="guitarStockPage.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>     
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
              <form action="" method="POST">
<?php
                if($update == true){
?>
                  <input type="hidden" name="id" value  ="<?php echo $id; ?>">
                  Product Name <input type="text" name="productName" class="form-control" value="<?php echo $ProductName; ?>" >
                  Price <input type="text" name="price" class="form-control" value="<?php echo $Price; ?>" >
                  Stock <input type="text" name="stock" class="form-control" value="<?php echo $Stock; ?>" >
                  Description <input type="text" name="descrip" class="form-control" value="<?php echo $Descrip; ?>" >
                  <button type="submit" name="update" class="btn btn-primary my-3">UPDATE</button>
<?php
                } else{
?>
                  Product Name <input type="text" name="productName" class="form-control" >
                  Price <input type="text" name="price" class="form-control" >
                  Stock <input type="text" name="stock" class="form-control" >
                  Description <input type="text" name="descrip" class="form-control" >
                  <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>
<?php
                  }
?>
              </form>
          </div>

   
<?php
    include_once "footer.php";
?>