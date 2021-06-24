<?php
    include_once "header.php";
?>

 <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Acoustic</li>
      </ol>
 </nav>

<!-- Acoustic stuff -->
<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 mb-3 text-center">Acoustic Guitars</h1>
          <div class="row">
<?php
// Function: Display acoustic guitars
              $sql = "SELECT * FROM products WHERE Product_Type = 1; ";
              $result = $conn->query($sql);
              
              if($result){
                while($row = $result->fetch_assoc()){
?>
                  <div class="col-md-6 text-center">
                      <?php echo "<img width='500px' src='GuitarImage/".$row['product_Image']." '>"; ?>
                      <h5 class="card-title mt-3"><?php echo $row["Product_Name"];?></h5>
                      <p class="card-text"><?php echo $row["Price"];?></p>
                      <button type="button" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</button>
                  </div>
<?php
                  }
?>
          </div>
<?php
                  } else{
                    echo "0 results";
              }
?>

          <hr class="mt-5">
          <div class="container text-right mt-3 mx-auto">
          <button type="button" class="btn btn-outline-secondary col-2">></button>
          </div>
          <h5 class="text-uppercase text-center">Page 1/2</h5>

      </div>
</div>

<?php
    include_once "footer.php";
?>