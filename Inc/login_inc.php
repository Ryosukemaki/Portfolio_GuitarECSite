<?php
require_once '../dbConnect.php';

// Login function
if (isset($_POST['login'])){
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $sql = "SELECT * FROM Guitar_users WHERE Email = '$email';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $email = $row['Email'];
        $pwdhashed = $row['PWD'];
        // $checkPwd = $pwd->password_verify($pwdhashed); <- Not uses this code!!
        $checkPwd = password_verify($pwd, $pwdhashed);

            if ($checkPwd === false){
                header("location: ../login.php?login=fail&username=$email+$pwdhashed");
            } else {
                session_start();
                $_SESSION["id"] = $row['id'];
                $_SESSION["Email"] = $row['Email'];
                $_SESSION["PWD"] = $row['PWD'];
                header("location: ../index.php");
            }

        } else {
        header("location: ../login.php?login=fail");
    }

} else {
    header("location: ../login.php");
}
$conn->close();


?>