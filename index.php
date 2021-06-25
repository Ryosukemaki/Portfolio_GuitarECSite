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
                    <h2 class="display-4 "style="width:60%;">Welcome Online Guitar Store!</h2>
                    <p style="width:60%;">We have a bunch of the Taylor Guitars acoustic line series. Each series features a unique combination of tonewoods and aesthetic details, which add up to a diverse mix of musical personalities.All Taylor models come with a Taylor hardshell case or protective gig bag.</p>
                  </div>
                </div>
          </div>
          <div class="carousel-item">
            <img src="GuitarImage/indexPhoto2.jpg" class="d-block" style="width: 100%;" alt="...">
                <div class="container">
                  <div class="carousel-caption text-left d-none d-md-block position-absolute">
                    <h2 class="display-4 "style="width:60%;">Welcome Online Guitar Store!</h2>
                    <p style="width:60%;">We have a bunch of the Taylor Guitars acoustic line series. Each series features a unique combination of tonewoods and aesthetic details, which add up to a diverse mix of musical personalities.All Taylor models come with a Taylor hardshell case or protective gig bag.</p>
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
        <h1 class="display-4 mb-3 text-center">FIND YOUR NEXT GUITAR!!</h1>
          <div class="row">
            <div class="col-md-6 text-center">
                <h3>Acoustic Guitar</h3>
                <img src="GuitarImage/FYNGuitar4.jpg" class="rounded " alt="..." style="width:100%;">
                <a class="btn btn-outline-secondary mt-3 col-8 mx-auto" href="acousticGuitar.php">Browse</a>
            </div>
            <div class="col-md-6 text-center">
              <h3>Electric Guitar</h3>
              <img src="GuitarImage/FYNGuitar3.jpg" class="rounded" alt="..." style="width:100%;">
              <a class="btn btn-outline-secondary mt-3 col-8 mx-auto" href="electricGuitar.php">Browse</a>
            </div>
          </div>
      </div>
</div>

<!-- NEW RELEASE Display -->
<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 mb-3 text-center">NEW RELEASES!!</h1>
          <div class="row">
            <div class="col-md-4 text-center">
                <img src="GuitarImage/Acoustic1.png" class="rounded " alt="..." style="width:100%;">
                <h5 class="card-title mt-3">Card title</h5>
                <p class="card-text">$1,234</p>
                <button type="button" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</button>
            </div>
            <div class="col-md-4 text-center">
              <img src="GuitarImage/Acoustic2.png" class="rounded" alt="..." style="width:100%;">
              <h5 class="card-title mt-3">Card title</h5>
                <p class="card-text">$1,234</p>
                <button type="button" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</button>
            </div>
            <div class="col-md-4 text-center">
              <img src="GuitarImage/Acoustic3.png" class="rounded" alt="..." style="width:100%;">
              <h5 class="card-title mt-3">Card title</h5>
                <p class="card-text">$1,234</p>
                <button type="button" class="btn btn-outline-secondary mt-3 col-8 mx-auto mb-5">VIEW GUITAR DETAILS</button>
            </div>
          </div>
      </div>
</div>


<?php
    include_once "footer.php";
?>

