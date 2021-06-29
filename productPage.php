<?php
    include_once "header.php";
?>

<!-- Navbar -->
<div class="jumbotron jumbotron-fluid pt-2">
 <nav aria-label="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
      </ol>
 </nav>

<?php
// Function: Display Electric guitars
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id; ";
    $result = $conn->query($sql);
              
      if($result){
        while($row = $result->fetch_assoc()){
?>
<!-- Product Name -->
      <div class="container">
          <div class="row">
            <div class="container col-md-8 mt-5">
            <!-- Product Image -->
               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                        <?php echo "<img width='100%' src='GuitarImage/".$row['Product_Image']." '>"; ?>
                      </div>
    
<!-- Display another images form Another database -->
<?php
           $sql = "SELECT * FROM Another_Product_Images WHERE Product_id = $id; ";
           $result = $conn->query($sql);

               if($result){
                    while($row = mysqli_fetch_assoc($result)){
?>
                      <div class="carousel-item">
                        <?php echo "<img width='100%' src='GuitarImage/".$row['AnotherP_Image']." '>";?>
                      </div>
<?php
                          } //while close
                } else{
                     echo "0 results";
                }?>
                
                  </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
              </div>
            </div>

<!-- Display product detail -->
            <div class="container col-md-4 mt-5">
<?php
                $sql = "SELECT * FROM products WHERE id = $id; ";
                  $result = $conn->query($sql);
                            
                    if($result){
                      while($row = $result->fetch_assoc()){
?>


                        <h4 class="display-4 mb-3"><?php echo $row["Product_Name"];?></h4>
                        <h5 class="">Price: <?php echo $row["Price"];?></h5>
                        <p class=""><h5>Description: </h5><?php echo $row["Descrip"];?></p>

                        <form action="Inc/addCart_inc.php" method="POST">
                            <div class="form-group col-4 "><h5>Quantity:</h5>
                              <input type="number" class="form-control" value="1">
                            </div>
                            <div class="container mt-3 text-right">
                                <button type="submit" class="btn btn-danger w-25" name="AddToCart">Add To Cart</button>
                                <!-- <a href="../addCart_inc.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger col-12" name="AddToCart">Add To Cart</a> -->
                                <button type="submit" class="btn btn-warning w-25" name="BuyIt">Buy It Now</button>
                                <!-- <a href="cart.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning col-12 mt-2" name="BuyIt">Buy It Now</a> -->
                            </div>
                        </form>
      </div>
<?php
                      } //while close
                    } else{
                        echo "0 results";
                    }
?>
            </div>
          </div>

          
                

<?php
        } //while close
        } else{
           echo "0 results";
        }
?>
<?php
  } else {
?>
              <div class="alert alert-danger" role="alert">
                  Error:
              </div>
<?php
  }
        
?>


<!-- You may also like -->
  <hr class="mt-5">
  <div class="container">
                <h1 class="display-4 mb-3 text-left">You may also like</h1>
                <div class="row">
<?php
      $sql = "SELECT * FROM products ORDER BY (Product_Type = 3),RAND() limit 2;";
      $result = $conn->query($sql);
              
      if($result){
        while($row = $result->fetch_assoc()){
?>
                    <div class="col-md-6 text-center">
                          <?php echo "<img width='100%' src='GuitarImage/".$row['Product_Image']." '>"; ?>
                          <h5 class="card-title mt-3"><?php echo $row["Product_Name"];?></h5>
                          <p class="card-text"><?php echo $row["Price"];?></p>
                          <a href="productPage.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</a>
                    </div>

<?php
        } //while close
      } else{
           echo "0 results";
      }
        
?>
                </div>
  </div>
</div>
<?php
    include_once "footer.php";
?>