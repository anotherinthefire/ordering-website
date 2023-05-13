<?php
try {
  include('../config.php');
}
catch (Exception $e) {
  echo "ERROR: Could not include config file. " . $e->getMessage();
}

if(isset($_POST['submit'])) 
{
  $user_id = $_SESSION['user_id'];
  $stock_id = $_POST['stock_id'];
  $quantity = $_POST['quantity'];

  // Check if the user_id and stock_id already exist in the cart
  $sql = "SELECT * FROM cart WHERE user_id = $user_id AND stock_id = $stock_id";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + $quantity;
    if($new_quantity <= 0) {
      echo '<script>alert("Quantity must be greater than 0."); window.history.back();</script>';
      exit;
    }
    $sql = "UPDATE cart SET quantity = $new_quantity WHERE user_id = $user_id AND stock_id = $stock_id";
  } else {
    if($quantity <= 0) {
      echo '<script>alert("Quantity must be greater than 0."); window.history.back();</script>';
      exit;
    }
    $sql = "INSERT INTO cart (user_id, stock_id, quantity) VALUES ('$user_id', '$stock_id', '$quantity')";
  }

  if($conn->query($sql) === true)
  {
    header("location:../pages/cart.php");                            
  }
  else
  {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
  }
}

$conn->close();

?>
