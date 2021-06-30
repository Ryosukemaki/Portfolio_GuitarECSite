<?php
require_once '../dbConnect.php';
?>

<!-- Sign up function -->
<?php
if (isset($_POST['signup'])){
    //Get image name
    $profilePic = $_FILES['profilePic']['name'];
    //image file directory
    $target = "ProfilePicture/".basename($profilePic);
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwd2 = $_POST["password2"];
    $userType = 1;
    $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM Guitar_users WHERE Email = '$email';";
    $result = $conn->query($sql);

    // We check whether there's a same Email or not before creating user-
    if($result->num_rows > 0){
        header("location: ../signup.php?sameUser=exist");
    // We check whether you put same password or not before creating user-
    }else if($pwd!=$pwd2){
        header("location: ../signup.php?NotSamePWD=exist");
    } else{
        $sql = "INSERT INTO Guitar_users (Profile_Picture, First_Name, Last_Name, Address, Email, PWD, User_Type) VALUES ('$profilePic', '$fName','$lName', '$address',  '$email', '$pwdHashed', '$userType')";

        move_uploaded_file($_FILES['profilePic']['tmp_name'], $target);

            if ($conn->query($sql)) {
                header("location: ../login.php?signup=success");
            } else {
                header("location: ../signup.php?signup=fail" . $conn->error);
            }
    }

} else {
    header("location: ../signup.php");
}
    $conn->close();
?>