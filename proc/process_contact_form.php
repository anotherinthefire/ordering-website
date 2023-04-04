<?php
include '../config.php';
// check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO messages (mess_name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
if ($stmt->execute()) {
	// redirect to aboutus.php with success message
	header("Location: ../aboutus.php?success=1");
} else {
	// redirect to aboutus.php with error message
	header("Location: ../aboutus.php?success=0");
}
$stmt->close();
$conn->close();
?>