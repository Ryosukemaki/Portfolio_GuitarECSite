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

<script>
function confirm_test() {
    var select = confirm("問い合わせますか？n「OK」で送信n「キャンセル」で送信中止");
    return select;
}
</script>


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
                   <td>
<?php
                   if($row["User_Type"] ==1){
                     echo "Customer";
                   } else if($row["User_Type"] ==2){
                    echo "Web Admin";
                   } else{
                    echo "Super Admin";
                   }
?>
                  </td>
                   <td>
                   <a href="guitarUsersPage.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">EDIT</a>
                   <form method="POST" action="test.php" onsubmit="return confirm_test()">
                     <a href="guitarUsersPage.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>     
                   </form>
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



<!-- Button trigger modal -->
<div class="container mt-3 text-right"> 
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adduser">
    <i class="fas fa-user-plus"></i> Add User
    </button>
</div>

<form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="adduser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="adduser" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                </div>
                <div class="modal-body">
                    <div class="row justify-content col-10">
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
                            <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
         </div>
</form>

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
                  
                }
?>
              </form>
          </div>

   
<?php
    include_once "footer.php";
?>