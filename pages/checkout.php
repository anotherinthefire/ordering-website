<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Checkout</title>
  <link rel="shortcut icon"href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/checkout.css">
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

?>

</head>
<body>
  <img src="https://i.ibb.co/JdHq6XN/Black-Logo.png" class="logo">
  
  <div class="container1">
    <div class="left">
    <p class="header ms-5">Contact Information</p>
        <div class="form-floating mb-3 ms-5 me-5">
            <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="<?php echo $user_data["email"]; ?>" required>
            <label for="floatingInput" style="font-family:'Roboto';">Email</label>
          </div>
          
            <div class="form-floating mb-3 ms-5 me-5">
              <input type="firstname" class="form-control" id="floatingLN" placeholder="First Name" value="<?php echo $user_data["fullname"]; ?>" required>
              <label for="floatingInputGrid" style="font-family:'Roboto';">Full Name</label>
            </div>
          
          <div class="form-floating mb-3 ms-5 me-5">
            <input type="address" class="form-control" id="floatingEmail" placeholder="Address" value="<?php echo $address_data["room"]; ?> <?php echo $address_data["company"]; ?> <?php echo $address_data["house_no"]; ?>, <?php echo $address_data["street"]; ?>, <?php echo $address_data["barangay"]; ?>, <?php echo $address_data["city"]; ?>"required>
            <label for="floatingInput" style="font-family:'Roboto';">Address</label>
          </div>

          <div class="row g-3">
          <div class="col-md-6 mb-3 ms-5 me-0">
            <div class="form-floating">
              <input type="postalcode" class="form-control" id="floatingLN" placeholder="Postal Code" value="<?php echo $address_data["postal_code"]; ?>" required>
              <label for="floatingInputGrid" style="font-family:'Roboto';">Postal Code</label>
            </div>
          </div>
          <div class="col-md mb-3 ms-0 me-5">
            <div class="form-floating">
              <input type="city" class="form-control" id="floatingFN" placeholder="Province" value="<?php echo $address_data["province"]; ?>" required>
              <label for="floatingInputGrid" style="font-family:'Roboto';">Province</label>
            </div>
          </div>
        </div>

          <div class="form-floating mb-3 ms-5 me-5">
            <input type="region" class="form-control" id="floatingRegion" placeholder="Region" value="<?php echo $address_data["region"]; ?>" required>
            <label for="floatingRegion" style="font-family:'Roboto';">Region</label>
          </div>
        <div class="form-floating mb-3 ms-5 me-5">
          <input type="Phone" class="form-control" id="floatingPhone" placeholder="Phone" value="<?php echo $user_data["contact"]; ?>" required>
          <label for="floatingPhone" style="font-family:'Roboto';">Phone</label>
        </div>
        <div class="mb3 ms-5 me-5">
          <label for="note" class="form-label" style="font-family:'Roboto';font-weight: bold;">Note</label>
          <textarea class="form-control" id="notes" name="note" rows="5"></textarea>
        </div>
        <div class="return">
          <a href="cart.php">&lt; Return to Cart</a>
        </div>
        
        <div class="policies">
          <p>Refund Policy</p>
          <p>Privacy Policy</p>
          <p>Terms and Conditions</p>
        </div>
    </div>

    <?php 
    // Check if the selected_items session variable is set
if (isset($_SESSION['selected_items'])) {
	$selected_items = $_SESSION['selected_items'];
	$total_price = 0; // initialize total price variable

	// Construct the SQL query to retrieve the cart items for the user
	$sql = "SELECT c.cart_id, s.stock_id, p.prod_name, p.prod_price, c.quantity, p.prod_price*c.quantity AS subtotal, 
  color.color, size.size, p.prod_img
  FROM cart c
  JOIN stock s ON c.stock_id = s.stock_id
  JOIN products p ON s.prod_id = p.prod_id
  JOIN color ON s.color_id = color.color_id
  JOIN size ON s.size_id = size.size_id
  WHERE c.cart_id IN (" . implode(',', $selected_items) . ")
  AND c.user_id = " . $user_id;
  
  echo '<div class="right">';
  echo '<p style="font-size: 28px;">Order Summary</p>';

	// Execute the query and store the result
	$result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    echo '<table style="width: 100%;">';
    echo '<tbody>';
    echo '<tr style="border-top-width: 3px; border-bottom-width: 3px; border-color:black;">';
    echo '<td><br>';
    echo '<p style="float: left; padding: 0 20px 20px 0;"><img src="../../product_images/' . $row['prod_img'] . '" alt="Italian Trulli" width="150px;"></p><br><b>' . $row['prod_name'] . '</b>';
    echo '<p>' . $row['size'] . ',' . $row['color'] . '</p>';
    echo '<p>P' . $row['subtotal'] . '</p>';
    echo '</td>
                <td></td>';
                echo '<td><span class="plus">x' . $row['quantity'] . '</span></td>';
                echo '</tr>
            </tbody>
          </table>';
          $total_price += $row['subtotal']; // add subtotal to total price          
           }

           echo '<div class="total">
            <p><b>Total:</b>'. $total_price .'</p> <br><br>
          </div>';
  } else {
    // Display an error message if the selected_items variable is not set in the session
    echo '<h1>Error</h1>';
    echo '<p>No items were selected for checkout.</p>';
  }
          echo '<div class="continue">
          <button type="submit" class="btn btn-light" name="submit_order">Continue Shipping</button>
      </div>';
      
   
      ?>
  </div>
</body>
</html>