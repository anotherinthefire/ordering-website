<?php
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
    header('Location: cart.php');
  }
}
 else {
// Display a message if there are no cart items for the user
echo 'Your cart is empty.';
}