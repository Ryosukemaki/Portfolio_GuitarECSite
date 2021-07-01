<?php
    include_once "header.php";
?>


<!-- Function: When you clicked "Add To Cart" and if you were logged or not -->
<?php
if (isset($_POST["AddToCart"]) && isset($_SESSION["Email"])){

//When the second time that I put product in the cart runs the below cord.
	if(isset($_SESSION["shopping_cart"])){
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST["hidden_id"], $item_array_id)){
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_POST["hidden_id"],
				'item_image'		=>	$_POST["hidden_image"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		} else {
			//echo '<script>alert("Item Already Added")</script>';
			for ($i = 0; $i < count($item_array_id); $i++){
				if ($item_array_id[$i] == $_POST["hidden_id"]){
					$_SESSION["shopping_cart"][$i]['item_quantity'] += $_POST["quantity"];
				}
			}
		}
	}
//When the first time that I put product in the cart runs the below cord.
	else {
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
            'item_image'		=>	$_POST["hidden_image"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
    }
?>

<?php
    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $values){
                if($values["item_id"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
?>

<!-- Cart display -->
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
    <form action=".php" method="POST">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

<?php
        if(!empty($_SESSION["shopping_cart"])){
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $key => $values){
?>
                <tr>
                   <td class="align-middle"><?php echo $values["item_image"];?></td>
                   <td class="align-middle"><?php echo $values["item_name"];?></td>
                   <td class="align-middle">$<?php echo $values["item_price"];?></td>
                   <td class="align-middle"><?php echo $values["item_quantity"];?></td>
                   <td class="align-middle">$<?php echo number_format($values["item_quantity"] * $values["item_price"],2);?></td>
                   <td class="align-middle">
                        <div>
                            <a href="cart.php?action=delete&id=<?php echo $values["item_id"];?>" class="btn btn-outline-secondary mt-2">Remove</a>
                        </div>
                   </td>
                </tr>
<?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
?>
                <tr>
                    <td colspan="4">Total</td>
                    <td colspan="2">$<?php echo number_format($total,2);?></td>
                </tr>
<?php
            }
?>

          </tbody>
        </table>
                

<!-- Button Display -->
    <form>
        <div class="form-group row text-right">
            <div class="col-sm-12 text-right">
                <a type="submit" class="btn btn-success w-25" href="index.php">Continue Shopping</a>
                <button type="submit" class="btn btn-danger w-25" name="login">Check Out</button>
            </div>
        </div>

    </form>
  </div>



<?php
    include_once "footer.php";
?>
