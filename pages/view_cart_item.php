<?php
// Start the session
session_start();

// Include the database connection
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

// Check if the cart ID is set
if (!isset($_GET['cart_id'])) {
    // Redirect to the cart page
    header('Location: cart.php');
    exit();
}

// Get the cart ID from the URL parameter
$cart_id = $_GET['cart_id'];

// Get the cart item from the database
$sql = "SELECT cart.*, stock.*, products.* FROM cart
        JOIN stock ON cart.stock_id = stock.stock_id
        JOIN products ON stock.prod_id = products.prod_id
        WHERE cart.cart_id = $cart_id AND cart.user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $sql);

// Check if the cart item exists
if (mysqli_num_rows($result) != 1) {
    // Redirect to the cart page
    header('Location: cart.php');
    exit();
}

// Fetch the cart item data
$row = mysqli_fetch_assoc($result);

// Display the cart item details
echo '<h1>Cart Item Details</h1>';
echo '<p>Product Name: '.$row['prod_name'].'</p>';
echo '<p>Product Image: <img src="'.$row['prod_img'].'" width="100"></p>';
echo '<p>Product Price: '.$row['prod_price'].'</p>';
echo '<p>Size: '.$row['size'].'</p>';
echo '<p>Color: '.$row['color'].'</p>';
echo '<p>Quantity: '.$row['quantity'].'</p>';
echo '<p>Total Price: '.$row['total_price'].'</p>';

// Close the database connection
mysqli_close($conn);
?>
