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
        <div class="form-group row mb-5">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email"placeholder="Email">
            </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group row mt-3">
              <a href="">Forgotten Password? ></a>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary w-50" name="login">Login</button>
            </div>
            <div class="col-sm-12 text-right mt-3">
              <a type="submit" class="btn btn-outline-secondary" href="signup.php">Register for free now ></a>
            </div>
        </div>

    </form>
  </div>



<?php
    include_once "footer.php";
?>