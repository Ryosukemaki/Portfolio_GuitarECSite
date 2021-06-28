<?php
    include_once "header.php";
?>
 <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart</li>
      </ol>
 </nav>
 <!-- Cart page -->
 <div class="container">
    <h1 class="display-3 mb-3">Your Cart</h1>
    <hr class="mt-5">
    <form action="Inc/login_inc.php" method="POST">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col"></th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
<?php
              $sql = "SELECT * FROM products WHERE id = 6;";
              $result = $conn->query($sql);

              if($result){
                while($row = $result->fetch_assoc()){
?>
                <tr>
                   <td><?php echo "<img width='400px' src='GuitarImage/".$row['Product_Image']." '>"; ?></td>
                   <td><?php echo $row["Product_Name"];?></td>
                   <td><?php echo $row["Price"];?></td>
                   <td></td>
                   <td></td>
<?php
                 }//While close ?>
          </tbody>
        </table>
<?php
                } else{
                    echo "0 results";
                }?>

            <hr class="mt-5">
        <div class="form-group row text-right">
            <div class="col-sm-12 text-right">
                <a type="submit" class="btn btn-success w-25" href="index.php">Continue Shopping</a>
                <button type="submit" class="btn btn-danger w-25" name="login">Check Out</button>
            </div>
        </div>

    </form>
  </div>



<?php
    include_once "footer.php";
?>