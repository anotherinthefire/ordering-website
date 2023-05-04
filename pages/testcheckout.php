<?php
session_start();

include('../config.php');

$user_id = $_SESSION['user_id'];

$user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

$address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
$address_data = mysqli_fetch_assoc($address_query);

// Submit order
if (isset($_POST["submit_order"])) {
	$full_name = $user_data["fullname"];
	$contact = $user_data["contact"];
	$mod_ = "LBC";
	$mop = $_POST["mop"];
	$note = $_POST["note"];

	//total price
	$selected_items = $_SESSION['selected_items'];
	$total_price = 0; // initialize total price variable

	// Construct the SQL query to retrieve the cart items for the user
	$sql = "SELECT c.cart_id, s.stock_id, p.prod_name, p.prod_price, c.quantity, p.prod_price*c.quantity AS subtotal
            FROM cart c
            JOIN stock s ON c.stock_id = s.stock_id
            JOIN products p ON s.prod_id = p.prod_id
            WHERE c.cart_id IN (" . implode(',', $selected_items) . ")
            AND c.user_id = " . $user_id;

	// Execute the query and store the result
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$total_price += $row['subtotal']; // add subtotal to total price
	}

	// Insert order data into orders table
	$insert_order_query = "INSERT INTO orders (user_id, add_id, full_name, contact, mod_, mop, total, note) VALUES ('$user_id', '" . $address_data["add_id"] . "', '$full_name', '$contact', '$mod_', '$mop', '$total_price' ,'$note')";

	if (mysqli_query($conn, $insert_order_query)) {
		$ord_id = mysqli_insert_id($conn); // Get the order ID

		// Insert cart items into ordered_products table
		if (isset($_SESSION['selected_items'])) {
			$selected_items = $_SESSION['selected_items'];

			foreach ($selected_items as $cart_id) {
				$cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE cart_id = '$cart_id' AND user_id = '$user_id'");
				$cart_data = mysqli_fetch_assoc($cart_query);

				$stock_id = $cart_data["stock_id"];
				$quantity = $cart_data["quantity"];

				$insert_ordered_products_query = "INSERT INTO ordered_products (ord_id, stock_id, quantity) VALUES ('$ord_id', '$stock_id', '$quantity')";
				mysqli_query($conn, $insert_ordered_products_query);
			}

			mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
			unset($_SESSION['selected_items']);
			header("Location: myorders.php");
			exit();
		} else {
			echo "Error: No items were selected for checkout.";
		}
	} else {
		echo "Error: " . $insert_order_query . "<br>" . mysqli_error($conn);
	}
}

// Check if the selected_items session variable is set
if (isset($_SESSION['selected_items'])) {
	$selected_items = $_SESSION['selected_items'];
	$total_price = 0; // initialize total price variable

	// Construct the SQL query to retrieve the cart items for the user
	$sql = "SELECT c.cart_id, s.stock_id, p.prod_name, p.prod_price, c.quantity, p.prod_price*c.quantity AS subtotal
            FROM cart c
            JOIN stock s ON c.stock_id = s.stock_id
            JOIN products p ON s.prod_id = p.prod_id
            WHERE c.cart_id IN (" . implode(',', $selected_items) . ")
            AND c.user_id = " . $user_id;

	// Execute the query and store the result
	$result = mysqli_query($conn, $sql);

	// Display the selected cart items in a table
	echo '<table>';
	echo '<tr><th>Stock ID</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>';

	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' . $row['stock_id'] . '</td>';
		echo '<td>' . $row['prod_name'] . '</td>';
		echo '<td>' . $row['prod_price'] . '</td>';
		echo '<td>' . $row['quantity'] . '</td>';
		echo '<td>' . $row['subtotal'] . '</td>';
		echo '</tr>';

		$total_price += $row['subtotal']; // add subtotal to total price
	}

	echo '<tr><td colspan="4">Total Price:</td><td>' . $total_price . '</td></tr>';
	echo '</table>';
} else {
	// Display an error message if the selected_items variable is not set in the session
	echo '<h1>Error</h1>';
	echo '<p>No items were selected for checkout.</p>';
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>User Information</title>
</head>

<body>
	<form method="post">
		<h1>User Information</h1>
		<label>Full Name:</label>
		<input type="text" value="<?php echo $user_data["fullname"]; ?>"><br>
		<!-- <label>Username:</label>
	<input type="text" value="<?php echo $user_data["username"]; ?>"><br> -->
		<label>Email:</label>
		<input type="text" value="<?php echo $user_data["email"]; ?>"><br>
		<label>Contact:</label>
		<input type="text" value="<?php echo $user_data["contact"]; ?>"><br>

		<h2>Address Information</h2>
		<label>Region:</label>
		<input type="text" value="<?php echo $address_data["region"]; ?>"><br>
		<label>Province:</label>
		<input type="text" value="<?php echo $address_data["province"]; ?>"><br>
		<label>City:</label>
		<input type="text" value="<?php echo $address_data["city"]; ?>"><br>
		<label>Barangay:</label>
		<input type="text" value="<?php echo $address_data["barangay"]; ?>"><br>
		<label>Street:</label>
		<input type="text" value="<?php echo $address_data["street"]; ?>"><br>
		<label>House No:</label>
		<input type="text" value="<?php echo $address_data["house_no"]; ?>"><br>
		<label>Postal Code:</label>
		<input type="text" value="<?php echo $address_data["postal_code"]; ?>"><br>
		<label>Company:</label>
		<input type="text" value="<?php echo $address_data["company"]; ?>"><br>


		<label>Room:</label>
		<input type="text" value="<?php echo $address_data["room"]; ?>"><br>
		<label>Label:</label>
		<input type="text" value="<?php echo $address_data["label"]; ?>"><br>
		<!-- no choosing of mode of delivery. only lbc -->
		<label>Mode of Payment:</label>
		<select name="mop" id="mop">
			<option value="">Select mode of payment</option>
			<option value="Gcash">Gcash</option>
			<option value="Paypal">Paypal</option>
			<option value="Maya">Maya</option>
		</select><br>
		<label>Note:</label>
		<textarea name="note"></textarea><br>
		<input type="submit" name="submit_order" value="Submit Order">
	</form>
	<a href="privacycheckout.php">pricay</a>
</body>

</html>