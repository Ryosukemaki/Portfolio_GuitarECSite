<?php
    include_once "header.php";
?>

<!-- Navbar -->
<div class="jumbotron jumbotron-fluid pt-2">
 <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Accessories</li>
      </ol>
 </nav>
<!-- Accessories -->
      <div class="container">
        <h1 class="display-4 mb-3 text-center">Accessories</h1>
          <div class="row">
<?php
// Function: Display Accessories
              $sql = "SELECT * FROM products WHERE Product_Type = 3; ";
              $result = $conn->query($sql);
              
              if($result){
                while($row = $result->fetch_assoc()){
?>
                  <div class="col-md-4 text-center product">
                      <a href="productPage.php?id=<?php echo $row["id"]; ?>"><?php echo "<img width='100%' src='GuitarImage/".$row['Product_Image']." '>"; ?></a>
                      <h5 class="card-title mt-3"><?php echo $row["Product_Name"];?></h5>
                      <p class="card-text">$<?php echo $row["Price"];?></p>
<?php
// Warning Sign  
                   if($row["Stock"] <= 3 && $row["Stock"] >= 1){?>
                      <a href="" class="btn btn-warning mt-3 col-8 mx-auto mb-5 product_warning"><?php echo $row["Stock"];?> in stock</a>
<?php              
                   } else if($row["Stock"] == 0){?>
                      <a href="" class="btn btn-danger mt-3 col-8 mx-auto mb-5 product_warning">Out Of stock</a>
<?php             
                   }?>
                       <a href="productPage.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW DETAILS</a>
                  </div>
<?php
                  }?>
       </div>
<?php
                  } else{
                    echo "0 results";
              }?>

          <hr class="mt-5">
          <h5 class="text-uppercase text-center">Page 1/1</h5>

      </div>
</div>



<?php
    include_once "footer.php";
?>