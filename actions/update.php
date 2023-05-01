<?php
try {
    include('../config.php');
  }
  //catch exception
  catch (Exception $e) {
    include('../config.php');
  }

if(isset($_POST['submit']))
{
    $quantity = $_POST['quantity'];
    $cart_id = $_POST['cart_id'];
    $sql = "UPDATE cart SET quantity= $quantity WHERE cart_id= $cart_id";   

			if($conn->query($sql)===true)
			{
				header("location: ../pages/cart.php");               
			}
			else
			{
				echo "Could not able to execute $sql." .$conn->error;
			}
            $conn->close();
        }

        
?>
