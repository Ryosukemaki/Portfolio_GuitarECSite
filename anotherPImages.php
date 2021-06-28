<?php
    include_once "header.php";
?>

<!-- Default Value -->
<?php
        $AnotherPImage = '';
        $ProductName = '';
        $ProductId = '';
        $update = false;
        $id = 0;
?>

<!-- Fuction: Stuff Delete -->
<?php
        if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          $sql = "DELETE FROM Another_Product_Images WHERE id = $id;";

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

          $sql ="SELECT * FROM Another_Product_Images WHERE id = $id;";
          $result = $conn->query($sql);
          $update = true;

          if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $AnotherPImage = $row['AnotherP_Image'];
            $ProductName = $row['Product_Name'];
            $ProductId = $row['Product_ID'];
          } else{
            echo "0 result";
          }
        }
?>

<!-- Function: Edit Data -->
<?php
        if(isset($_POST['update'])){
          //Get image name
          $AnotherPImage = $_FILES['anotherPImage']['name'];
          //image file directory
          $target = "GuitarImage/".basename($AnotherPImage);
          $ProductName = $_POST['productName'];
          $ProductId = $_POST['productId'];
          $id = $_POST['id'];

            $sql = "UPDATE Another_Product_Images SET AnotherP_Image = '$AnotherPImage', Product_Name = '$ProductName', Product_ID = '$ProductId' WHERE id = $id;";

            move_uploaded_file($_FILES['anotherPImage']['tmp_name'], $target);
            
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

<!-- Function: Insert Date -->
<?php
        if(isset($_POST['save'])){
        //Get image name
        $AnotherPImage = $_FILES['anotherPImage']['name'];
        //image file directory
        $target = "GuitarImage/".basename($AnotherPImage);
        $ProductName = $_POST['productName'];
        $ProductId = $_POST['productId'];

        //sql to create table
        $sql = "INSERT INTO Another_Product_Images (AnotherP_Image, Product_Name, Product_ID) VALUE('$AnotherPImage','$ProductName','$ProductId')";
        
        move_uploaded_file($_FILES['anotherPImage']['tmp_name'], $target);

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
                <th scope="col">Product_ID</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
            <tbody>
<?php
              $sql = "SELECT * FROM Another_Product_Images";
              $result = $conn->query($sql);

              if($result){
                while($row = $result->fetch_assoc()){
?>
                <tr>
                   <th scope="row"><?php echo $row["id"];?></th>
                   <td><?php echo "<img width='80px' src='GuitarImage/".$row['AnotherP_Image']." '>"; ?></td>
                   <td><?php echo $row["Product_Name"];?></td>
                   <td><?php echo $row["Product_ID"];?></td>
                   <td>
                   <a href="anotherPImages.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">EDIT</a>
                   <a href="anotherPImages.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>     
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
                 Another Product Image
                  <div class="custom-file mb-3">
                    <input type="file" name="anotherPImage" class="custom-file-input" id="AnotherPImage" required>
                    <label class="custom-file-label" for="anotherPImage">Choose product image...</label>
                  </div>
                  <input type="hidden" name="id" value  ="<?php echo $id; ?>">
                  Product Name <input type="text" name="productName" class="form-control" value="<?php echo $ProductName; ?>" >
                  Product ID <input type="text" name="productId" class="form-control" value="<?php echo $ProductId; ?>" >
                  <button type="submit" name="update" class="btn btn-primary my-3">UPDATE</button>
<?php
                } else{
?>
                  Another Product Image
                  <div class="custom-file mb-3">
                    <input type="file" name="anotherPImage" class="custom-file-input" id="AnotherPImage" required>
                    <label class="custom-file-label" for="anotherPImage">Choose product image...</label>
                  </div>
                  Product Name <input type="text" name="productName" class="form-control">
                  Product ID <input type="text" name="productId" class="form-control">
                  <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>
<?php
                  }
?>
              </form>
          </div>

   
<?php
    include_once "footer.php";
?>