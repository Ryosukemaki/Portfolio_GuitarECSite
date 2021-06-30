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
    <form action=".php" method="POST">
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
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id = $id;";
            $result = $conn->query($sql);

              if($result){
                while($row = $result->fetch_assoc()){
?>
                <tr>
                   <td class=><?php echo "<img width='350px' src='GuitarImage/".$row['Product_Image']." '>"; ?></td>
                   <td class="align-middle"><?php echo $row["Product_Name"];?></td>
                   <td class="align-middle"><?php echo $row["Price"];?></td>
                   <td class="align-middle">
                        <div class="form-group">
                            <select class="form-control" id="howManyYouWant">
                                <option>1</option>
                            </select>
                            <button type="submit" class="btn btn-outline-secondary mt-2" name="remove">Remove</button>
                        </div>
                   </td>
                   <td class="align-middle">$1234</td>
<?php
                 }//While close ?>
          </tbody>
        </table>
<?php
                } else{
                    echo "0 results";
                }
            }?>
                

<!-- Order Total Display -->
 <form>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Order Total</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col">$1234</th>
                </tr>
            </thead>
            <tbody>
            
          </tbody>
        </table>


        <div class="form-group row">
            <div class="col-sm-12 text-left">
                <h4>Order Total</h4>
            </div>
            <div class="col-sm-12 text-right">
                <h4>$1234</h4>
            </div>
        </div>
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