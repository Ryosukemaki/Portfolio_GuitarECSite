<?php
    require_once 'dbConnect.php';
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/6641173341.js" crossorigin="anonymous"></script>
  <!-- CSS Part -->
  <style>
    .carousel-caption{
    width: 40%;
    right: 10%;
    bottom: 70%;

    }
  </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fas fa-guitar"></i><h5>GUITAR STORE</h5></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="acousticStuff.php">Acoustic</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="electricStuff.php">Electric</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="accessoriesStuff.php">Accessories</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              
<?php
              if(isset($_SESSION['Email'])){
                    $user = $_SESSION['Email'];
?>
                    <li class="nav-item">
                        <a class="nav-link" href="">USERS</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><?php echo "Welcome $user" ?></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Inc/logout_inc.php">LOG OUT</a>
                    </li>
<?php
              } else {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="guitarStockPage.php">仮stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">SIGN UP</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href=""><i class="fas fa-shopping-cart"></i></a>
                    </li>
<?php 
              }
?>
            </ul>
            
        </div>
      </div>
    </nav>