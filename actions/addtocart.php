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

  $sql = "INSERT INTO cart (user_id, stock_id, quantity)
  VALUES ('$user_id', '$stock_id', '$quantity')";

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
