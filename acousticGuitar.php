<?php
    include_once "header.php";
?>


<!-- Navbar -->
<div class="jumbotron jumbotron-fluid pt-2">
 <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Acoustic</li>
      </ol>
 </nav>
<!-- What is the acoustic -->
      <div class="container">
        <h1 class="display-4 mb-3 text-center">Acoustic Guitars</h1>
            <div class="jumbotron jumbotron-fluid pt-2">
            <div class="row">
              <div class="container col-md-6 mt-5">
                  <h2>What is the Acoustic guitar</h2>
                  <p>The guitar is equally at home in a classical concerto, a jazz improvisation, or a punk rock anthem. And while the electric guitar suits many genres, it is its older cousin—the acoustic guitar—that offers the greatest versatility.</p>
              </div>
                  <img src="GuitarImage/What'sAGUitar.jpg" class="img-fluid col-md-6" style="width:100%;" alt="...">
            </div>
            </div>
       <div class="row">          
<?php
// Function: Display acoustic guitars
              $sql = "SELECT * FROM products WHERE Product_Type = 1; ";
              $result = $conn->query($sql);
              
              if($result){
                while($row = $result->fetch_assoc()){
?>
                  <div class="col-md-6 text-center">
                      <?php echo "<img width='100%' src='GuitarImage/".$row['product_Image']." '>"; ?>
                      <h5 class="card-title mt-3"><?php echo $row["Product_Name"];?></h5>
                      <p class="card-text"><?php echo $row["Price"];?></p>
                      <a href="productPage.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</a>
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