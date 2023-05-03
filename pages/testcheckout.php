<?php
// Start session
session_start();

// Connect to database
include('../config.php');

// Retrieve user data
$user_id = $_SESSION["user_id"];
$user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

// Retrieve address data
$address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
$address_data = mysqli_fetch_assoc($address_query);

// Submit order
if (isset($_POST["submit_order"])) {
    $full_name = $user_data["fullname"];
    $contact = $user_data["contact"];
    $mod_ = "n/a";
    $mop = "n/a";
    $total = 0.00;

    $insert_query = "INSERT INTO orders (user_id, add_id, full_name, contact, mod_, mop, total) VALUES ('$user_id', '".$address_data["add_id"]."', '$full_name', '$contact', '$mod_', '$mop', '$total')";

    if (mysqli_query($conn, $insert_query)) {
        // Redirect to success page
        header("Location: myorders.php");
        exit();
    } else {
        // Display error message
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
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

<input type="submit" name="submit_order" value="Submit Order">
</form>
</body>
</html>

