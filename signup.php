<?php
    include_once "header.php";
?>
 <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
      </ol>
 </nav>
 <div class="container">
    <h1 class="display-3 my-5">Sign Up</h1>
    <form action="Inc/signup_inc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group row mb-5">
           <label for="text" class="col-sm-2 col-form-label">Profile Picture</label>
              <div class="custom-file col-sm-10">
                <input type="file" name="profilePic" class="custom-file-input" id="profilePic" required>
                <label class="custom-file-label" for="profilePic">Choose Profile Picture...</label>
              </div>
        </div>

        <div class="form-group row mb-5">
          <label for="text" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="text" name="fName" placeholder="Full Name">
            </div>
        </div>

        <div class="form-group row mb-5">
          <label for="text" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="text" name="lName" placeholder="Full Name">
            </div>
        </div>

        <div class="form-group row mb-5">
          <label for="text" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="text" name="address" placeholder="Address">
            </div>
        </div>

        <div class="form-group row mb-5">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>

        <div class="form-group row mb-5">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group row mb-5">
          <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password2" placeholder="Confirm Password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-warning w-50" name="signup">Sign Up</button>
            </div>
        </div>

    </form>
  </div>



<?php
    include_once "footer.php";
?>