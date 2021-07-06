<?php
    include_once "header.php";
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner position-relative">
          <div class="carousel-item active ">
            <img src="GuitarImage/indexPhoto3.jpg" class="d-block" style="width:100%;" alt="...">
                <div class="container">
                  <div class="carousel-caption text-left d-none d-md-block position-absolute">
                    <h2 class="display-4 "style="width:60%; text-shadow: 2px 3px 5px #808080; ">Welcome Online Guitar Store !</h2>
                    <p style="width:60%; text-shadow: 2px 3px 5px #808080; ">We have a bunch of the Taylor Guitars acoustic line series. Each series features a unique combination of tonewoods and aesthetic details, which add up to a diverse mix of musical personalities.All Taylor models come with a Taylor hardshell case or protective gig bag.</p>
                  </div> 
                </div>
          </div>
          <div class="carousel-item">
            <img src="GuitarImage/indexPhoto2.jpg" class="d-block" style="width: 100%;" alt="...">
                <div class="container">
                  <div class="carousel-caption text-left d-none d-md-block position-absolute">
                    <h2 class="display-4 "style="width:60%; text-shadow: 2px 3px 5px #808080; ">Welcome Online Guitar Store !</h2>
                    <p style="width:60%; text-shadow: 2px 3px 5px #808080; ">We have a bunch of the Taylor Guitars acoustic line series. Each series features a unique combination of tonewoods and aesthetic details, which add up to a diverse mix of musical personalities.All Taylor models come with a Taylor hardshell case or protective gig bag.</p>
                  </div>
                </div>
          </div>
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

<!-- FIND YOUR NEXT GUITAR Display -->
<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 mb-3 text-center">FIND YOUR NEXT GUITAR !!</h1>
          <div class="row">
            <div class="col-md-6 text-center">
                <h3>Acoustic Guitar</h3>
                <a href="acousticGuitar.php">
                <figure class="zoomIn"><img src="GuitarImage/FYNGuitar4.jpg" class="rounded" alt="..." style="width:100%;"></figure>
                <a class="btn btn-outline-secondary mt-3 col-8 mx-auto" href="acousticGuitar.php">Browse</a>
            </div>
            <div class="col-md-6 text-center">
              <h3>Electric Guitar</h3>
              <a href="electricGuitar.php">
              <figure class="zoomIn"><img src="GuitarImage/FYNGuitar3.jpg" class="rounded" alt="..." style="width:100%;"></figure>
              <a class="btn btn-outline-secondary mt-3 col-8 mx-auto" href="electricGuitar.php">Browse</a>
            </div>
          </div>
      </div>


<!-- Recommended Product Display -->
<hr class="mt-5">
  <div class="container">
                <h1 class="display-4 mb-3 text-left">RECOMMENDED PRODUCT !!</h1>
                <div class="row">
<?php
      $sql = "SELECT * FROM products ORDER BY (Product_Type = 3),RAND() limit 3;";
      $result = $conn->query($sql);
              
      if($result){
        while($row = $result->fetch_assoc()){
?>
                    <div class="col-md-4 text-center product"> 
                          <a href="productPage.php?id=<?php echo $row["id"]; ?>"><?php echo "<img width='100%' src='GuitarImage/".$row['Product_Image']." '>"; ?></a>
                          <h5 class="card-title mt-3"><?php echo $row["Product_Name"];?></h5>
                          <p class="card-text"><?php echo $row["Price"];?></p>
                          <a href="productPage.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</a>
                    </div>

<?php
        }
        } else{
           echo "0 results";
      }
        
?>
                </div>

<!-- SNS movie or something -->
<hr class="mt-5">
<h1 class="display-4 my-3 text-left">Discover the #TaylorGuitars Community</h1>
  <div class="row">
      <div class="container col-md-6">
          <div class="card text-center">
              <div class="card-header">
                <div class="j-poster">
                  <h3>Taylor Guitars Facebok</h3>
                </div>
              </div>
              <div class="card-body">
              <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Ftaylorguitars%2Fvideos%2F812779786035002%2F&show_text=false&width=476&t=0" width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
              </div>
          </div>
      </div>
      <div class="container col-md-6">
          <div class="card text-center">
              <div class="card-header">
                <div class="j-poster">
                  <h3>Taylor Guitars Facebok</h3>
                </div>
              </div>
              <div class="card-body">
              <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Ftaylorguitars%2Fvideos%2F1673262792884831%2F&show_text=false&width=476&t=0" width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
              </div>
          </div>
      </div>
  </div>

  
</div>

<?php
    include_once "footer.php";
?>

