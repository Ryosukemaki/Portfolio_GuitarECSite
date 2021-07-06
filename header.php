<?php
    require_once 'dbConnect.php';
    session_start();
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
    width: 60%;
    left: 55%;
    bottom: 55%;
    }

    .product{
      position: relative;
    }

    .product_warning{
      position: absolute;
      top: 20%;
      opacity: 0.8;
    }

    .zoomIn {
      overflow:hidden; //
    }

    .zoomIn img {
    transition: .3s ease-in-out;
    }

    .zoomIn:hover img {
    transform: scale(1.3);
    }

    .product img {
    transition: .3s ease-in-out;
    }

    .product:hover img {
    transform: scale(1.1);
    }
  </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top p-3">
      <div class="container">
      <a class="navbar-brand pb-0" href="index.php"><h5><i class="fas fa-guitar"></i> GUITAR STORE</h5></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="acousticGuitar.php">Acoustic</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="electricGuitar.php">Electric</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="accessories.php">Accessories</a>
                  </li>
                </ul>
                <ul class="navbar-nav">
              
<?php
              // Super Admin Page
              if(isset($_SESSION['Email']) && $_SESSION['User_Type'] == 3){
                    $user = $_SESSION['Email'];
?>
                    <li class="nav-item">
                        <a class="nav-link" href="guitarStockPage.php">Stuff Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="anotherPImages.php">AnotherP_Image</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guitarUsersPage.php">Users</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="Inc/logout_inc.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out"><?php echo "<img width='50px' height='50px' style='border-radius: 50%;' src='ProfilePicture/".$_SESSION['Profile_Picture']." '>"; ?><?php echo "  $user" ?></a>
                      </li>
                 </ul>
<?php
              // Web Admin Page
              } else if(isset($_SESSION['Email']) && $_SESSION['User_Type'] == 2) {
                $user = $_SESSION['Email'];
?>
                    <li class="nav-item">
                        <a class="nav-link" href="guitarStockPage.php">Stuff Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="anotherPImages.php">AnotherP_Image</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="Inc/logout_inc.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out"><?php echo "<img width='50px' height='50px' style='border-radius: 50%;' src='ProfilePicture/".$_SESSION['Profile_Picture']." '>"; ?><?php echo "  $user" ?></a>
                      </li>
                 </ul>
                
<?php
              // Ordinary Customer Page
              } else if(isset($_SESSION['Email']) && $_SESSION['User_Type'] == 1) {
                $user = $_SESSION['Email'];
                ?>
                <?php
                      if(isset($_SESSION["shopping_cart"])){
                          foreach ($_SESSION["shopping_cart"] as $key => $values){
                          $quantity = $values["item_quantity"];
                          echo $quantity;
                          }
                      }
                ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart mx-2"></i></a>
                    </li>
                 </ul>
                 <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="Inc/logout_inc.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out"><?php echo "<img width='50px' height='50px' style='border-radius: 50%;' src='ProfilePicture/".$_SESSION['Profile_Picture']." '>"; ?><?php echo "  $user" ?></a>
                      </li>
                 </ul>
<?php
              
              } else {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    </li>
<?php 
              }
?>
            </ul>
            
        </div>
      </div>
    </nav>