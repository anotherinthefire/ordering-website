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
if (mysqli_num_rows($result) > 0) {
  // Display the cart items in a table with checkboxes
  echo '<form method="post" action="">';
  echo '<table>';
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td><input type="checkbox" name="cart_item[]" value="' . $row['cart_id'] . '"></td>';
    echo '<td>' . $row['stock_id'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
  echo '<input type="submit" name="checkout" value="Checkout">';
  echo '</form>';

  // Check if the checkout button was clicked
  if (isset($_POST['checkout'])) {
    // Check if at least one item is selected
    if (!empty($_POST['cart_item'])) {
      // Retrieve the selected cart items and store them in the session
      $_SESSION['selected_items'] = $_POST['cart_item'];

      // Redirect the user to the checkout page
      header('Location: testcheckout.php');
      exit();
    } else {
      // Display an error message if no items are selected for checkout
      echo 'Error: No items were selected for checkout.';
    }
  }
} else {
  // Display a message if there are no cart items for the user
  echo 'Your cart is empty.';
}

// Close the database connection
mysqli_close($conn);
?>
