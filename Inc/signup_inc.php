<?php
require_once '../dbConnect.php';
?>

<!-- Sign up function -->
<?php
if (isset($_POST['signup'])){
    $name = $_POST["fullname"];
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
        $sql = "INSERT INTO Guitar_users (Full_Name, Email, PWD, User_Type) VALUES ('$name', '$email', '$pwdHashed', '$userType')";
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