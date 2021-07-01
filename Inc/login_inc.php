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
                header("location: ../login.php?login=fail&username=$email+$pwd");
            } else {
                session_start();
                $_SESSION["id"] = $row['id'];
                $_SESSION["Profile_Picture"] = $row['Profile_Picture'];
                $_SESSION["First_Name"] = $row['First_Name'];
                $_SESSION["Last_Name"] = $row['Last_Name'];
                $_SESSION["Address"] = $row['Address'];
                $_SESSION["Email"] = $row['Email'];
                $_SESSION["PWD"] = $row['PWD'];
                $_SESSION["User_Type"] = $row['User_Type'];
                header("location: ../index.php");
            }

        } else {
        header("location: ../login.php?login=fail" . $conn->error);
    }

} else {
    header("location: ../login.php" . $conn->error);
}
$conn->close();


?>