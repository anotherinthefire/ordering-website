<?php
// Start the session
session_start();

// Function to display items in cart for the logged-in user

// Connect to the MySQL database
include('../config.php');

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Construct the SQL query to retrieve the cart items for the user
$sql = "SELECT c.cart_id, s.stock_id, c.quantity
        FROM cart c
        JOIN stock s ON c.stock_id = s.stock_id
        WHERE c.user_id = $user_id";

// Execute the query and store the result
$result = mysqli_query($conn, $sql);

// Check if there are any cart items for the user
if (mysqli_num_rows($result) > 0) {//cond start
  // Display the cart items in a table with checkboxes
  echo '<form method="post" id="checkprod">';
  echo '<table>';
  while ($row = mysqli_fetch_assoc($result)) {//loop start
    echo '<tr>';
    echo '<td><input type="checkbox" name="cart_item[]" value="' . $row['cart_id'] . '"></td>';
    echo '<td>' . $row['stock_id'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '</tr>';
  }//loop end
  echo '</table>';
  echo '</form>';

  // Check if the checkout button was clicked
  if (isset($_POST['checkout'])) {
    if (!empty($_POST['cart_item'])) {
      $_SESSION['selected_items'] = $_POST['cart_item'];
      echo "<script>window.location.href='checkout.php';</script>";
      exit();
    } else {
      echo "<script>window.location.href='cart.php';</script>";
      echo 'Error: No items were selected for checkout.';
    }
  }
}//cond end
 else {
  echo 'Your cart is empty.';
}
echo '<input type="submit" name="checkout" value="Checkout" form="checkprod">';
// Close the database connection
mysqli_close($conn);
?>
