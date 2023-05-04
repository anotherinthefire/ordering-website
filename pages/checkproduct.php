<?php
if (isset($_POST['checkout'])) {
  // Check if at least one item is selected
  if (!empty($_POST['cart_item'])) {
      // Retrieve the selected cart items and store them in the session
      $selected_items = array();
      foreach ($_POST['cart_item'] as $cart_item_id => $value) {
          $selected_items[] = $cart_item_id;
      }
      $_SESSION['selected_items'] = $selected_items;

      // Redirect the user to the checkout page
      header('Location: testcheckout.php');
      exit();
  } else {
      // Display an error message if no items are selected for checkout
      echo 'Error: No items were selected for checkout.';
  }
} else {
  // Display a message if there are no cart items for the user
  echo 'Your cart is empty.';
}
