<?php
    include_once "header.php";
?>

<!-- Default Value -->
<?php
        $fullName = '';
        $email = '';
        $pwd = '';
        $role = '';
        $update = false;
        $id = 0;
?>

<!-- Function Delete Data -->
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

<!-- Function Click Edit button -->
<?php
        if(isset($_GET['edit'])){
          $id = $_GET['edit'];

          $sql ="SELECT * FROM Guitar_users WHERE id = $id;";
          $result = $conn->query($sql);
          $update = true;

          if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $fullName = $row['Full_Name'];
            $email = $row['Email'];
            $pwd = $row['PWD'];
            $role = $row['role'];
          } else{
            echo "0 result";
          }
        }
?>

<!-- Function Insert Date -->
<?php
        if(isset($_POST['save'])){
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $role = $_POST['role'];
        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);

//sql to create table
        $sql = "INSERT INTO Guitar_users (Full_Name, Email, PWD, role) VALUE('$fullName', '$email', '$pwdHashed', '$role')";

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
                <th scope="col">Full_Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
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
                   <td><?php echo $row["Full_Name"];?></td>
                   <td><?php echo $row["Email"];?></td>
                   <td><?php echo $row["role"];?></td>
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
              <form action="" method="POST">
<?php
                if($update == true){
?>
                  <input type="hidden" name="id" value  ="<?php echo $id; ?>">
                  Full Name <input type="text" name="fullName" class="form-control" value="<?php echo $fullName; ?>" >
                  Email <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" >
                  Password <input type="password" name="password" class="form-control" value="<?php echo $pwd; ?>" >
                  Role<select class="form-control" name="role" value="<?php echo $role; ?>">
                        <option value = 2>Admin</option>
                        <option value = 1>Cosutomor</option>
                      </select>
                  <button type="submit" name="update" class="btn btn-primary my-3">UPDATE</button>
<?php
                } else{
?>
                  Full Name <input type="text" name="fullName" class="form-control" >
                  Email <input type="email" name="email" class="form-control" >
                  Password <input type="password" name="password" class="form-control" >
                  Role<select class="form-control" name="role" value="<?php echo $role; ?>">
                        <option value = 2>Admin</option>
                        <option value = 1>Cosutomor</option>
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