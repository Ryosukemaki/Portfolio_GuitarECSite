<?php
    include_once "header.php";
?>

<!-- Default Value -->
<?php
        $profilePic = '';
        $fName = '';
        $lName = '';
        $address = '';
        $email = '';
        $pwd = '';
        $userType = '';
        $update = false;
        $id = 0;
?>

<!-- Fuction: GuitarUser Delete -->
<?php
        if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          $sql = "DELETE FROM Guitar_users WHERE id = $id;";

          if(mysqli_query($conn, $sql)){
?>
              <div class="alert alert-success" role="alert">
                 Record deleting successfully!
              </div>
<?php
          } else {
?>
              <div class="alert alert-danger" role="alert">
                  Error deleting record:
              </div>
<?php
          }
        }
?>

<!-- Function: Click Edit button -->
<?php
        if(isset($_GET['edit'])){
          $id = $_GET['edit'];

          $sql ="SELECT * FROM Guitar_users WHERE id = $id;";
          $result = $conn->query($sql);
          $update = true;

          if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $profilePic = $row['Profile_Picture'];
            $fName = $row['First_Name'];
            $lName = $row['Last_Name'];
            $address = $row['Address'];
            $email = $row['Email'];
            $pwd = $row['PWD'];
            $userType = $row['User_Type'];
          } else{
            echo "0 result";
          }
        }
?>

<!-- Function: Edit Data -->
<?php
        if(isset($_POST['update'])){
          //Get image name
          $profilePic = $_FILES['profilePic']['name'];
          //image file directory
          $target = "ProfilePicture/".basename($profilePic);
          $fName = $_POST["fName"];
          $lName = $_POST["lName"];
          $Address = $_POST["address"];
          $email = $_POST['email'];
          $pwd = $_POST['password'];
          $userType = $_POST['userType'];
          $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
          $id = $_POST['id'];

            $sql = "UPDATE Guitar_users SET Profile_Picture = '$profilePic', First_name = '$fName', Last_name = '$lName', Address = '$address', Email = '$email' , PWD = '$pwdHashed' , User_Type = '$userType' WHERE id = $id;";

            move_uploaded_file($_FILES['profilePic']['tmp_name'], $target);

              if(mysqli_query($conn, $sql)){
?>
                <div class="alert alert-success" role="alert">
                    Record updating successfully!
                </div>
<?php
              } else {
?>
                <div class="alert alert-danger" role="alert">
                    Error updating record: <?php echo $conn->error;?>
                </div>
<?php
              }  
        }
?>

<!-- Function Insert Date -->
<?php
        if(isset($_POST['save'])){
              //Get image name
        $profilePic = $_FILES['profilePic']['name'];
        //image file directory
        $target = "ProfilePicture/".basename($profilePic);
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $address = $_POST["address"];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $userType = $_POST['userType'];
        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
        
        //sql to create table
        $sql = "INSERT INTO Guitar_users (Profile_Picture, First_Name, Last_Name, Address, Email, PWD, User_Type) VALUE('$profilePic', '$fName', '$lName', '$address', '$email', '$pwdHashed', '$userType')";

        move_uploaded_file($_FILES['profilePic']['tmp_name'], $target);

            if($conn->query($sql) === TRUE){
?>
              <div class="alert alert-success" role="alert">
                New record created successfully!
              </div>
<?php
            } else{
?>
              <div class="alert alert-danger" role="alert">
                    Error creating new record <?php echo $conn->error;?>
              </div>
<?php
            }
          }
?>

<!-- Display Guitar Users -->
       <div class="container mt-5"> 
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Profile</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">User_Type</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
            <tbody>
<?php
              $sql = "SELECT * FROM Guitar_users";
              $result = $conn->query($sql);

              if($result){
                while($row = $result->fetch_assoc()){
?>
                <tr>
                   <th scope="row"><?php echo $row["id"];?></th>
                   <td><?php echo "<img width='80px' height='80px' style='border-radius: 50%;' src='ProfilePicture/".$row['Profile_Picture']." '>"; ?></td>
                   <td><?php echo $row["First_Name"];?></td>
                   <td><?php echo $row["Last_Name"];?></td>
                   <td><?php echo $row["Address"];?></td>
                   <td><?php echo $row["Email"];?></td>
                   <td><?php echo $row["User_Type"];?></td>
                   <td>
                   <a href="guitarUsersPage.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">EDIT</a>
                   <a href="guitarUsersPage.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>     
                   </td>
                </tr>
<?php
                 }
?>
            </tbody>
          </table>
        </div>
<?php
                } else{
                    echo "0 results";
                }
?>

<!-- Display Insert and Edit Form -->
          <div class="row justify-content-center">
              <form action="" method="POST" enctype="multipart/form-data">
<?php
                if($update == true){
?>
                  <input type="hidden" name="id" value  ="<?php echo $id; ?>">
                  Profile Picture
                             <div class="custom-file mb-3">
                                <input type="file" name="profilePic" class="custom-file-input" id="profilePic" required>
                                <label class="custom-file-label" for="profilePic">Choose product image...</label>
                             </div>
                  First Name <input type="text" name="fName" class="form-control" value="<?php echo $fName; ?>" >
                  Last Name <input type="text" name="lName" class="form-control" value="<?php echo $lName; ?>" >
                  Address <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                  Email <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" >
                  Password <input type="password" name="password" class="form-control" value="<?php echo $pwd; ?>" >
                  User Type<select class="form-control" name="userType" value="<?php echo $userType; ?>">
                        <option value = 3>Super Admin</option>
                        <option value = 2>Web Admin</option>
                        <option value = 1>Customer</option>
                      </select>
                  <button type="submit" name="update" class="btn btn-primary my-3">UPDATE</button>
<?php
                } else{
?>
                  Profile Picture
                             <div class="custom-file mb-3">
                                <input type="file" name="profilePic" class="custom-file-input" id="profilePic" required>
                                <label class="custom-file-label" for="profilePic">Choose product image...</label>
                             </div>
                  First Name <input type="text" name="fName" class="form-control" >
                  Last Name <input type="text" name="lName" class="form-control" >
                  Address <input type="text" name="address" class="form-control" >
                  Email <input type="email" name="email" class="form-control" >
                  Password <input type="password" name="password" class="form-control" >
                  User Type<select class="form-control" name="userType" value="<?php echo $userType; ?>">
                        <option value = 3>Super Admin</option>
                        <option value = 2>Web Admin</option>
                        <option value = 1>Customer</option>
                      </select>
                  <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>
<?php
                  }
?>
              </form>
          </div>

   
<?php
    include_once "footer.php";
?>