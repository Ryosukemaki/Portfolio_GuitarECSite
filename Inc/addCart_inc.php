<?php
require_once '../dbConnect.php';
session_start();
?>

<!-- Function: When you clicked "Add To Cart" and if you were logged or not -->
<?php
if (isset($_POST["AddToCart"]) && isset($_SESSION["Email"])){

        $id = $_POST['id'];
        $sql = "SELECT * FROM products WHERE id = $id; ";
        $result = $conn->query($sql);
        header("location: ../cart.php");

}else{
        header("location: ../signup.php?signUp=not");
    }
    
    
    
    //Retrieve input from user
        // $fName = $_POST['fName'];
        // $lName = $_POST['lName'];
        // $email = $_POST['email'];
        // $teacher_id = $_POST['teacher_id'];

        // $sql = "INSERT INTO Catr (Product, Price, Quantity, Total) VALUES ('$fName', '$lName', '$email', '$teacher_id')";

        // if(mysqli_query($conn, $sql)){
        //     echo "You Add this item !";
        // } else {
        //     echo "Error adding this item: " .$conn->error();
        // }
    
    $conn->close();
?>