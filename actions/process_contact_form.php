<?php
include '../config.php';

// get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO messages (subject, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
if ($stmt->execute()) {
	// redirect to aboutus.php with success message
	header("Location: ../pages/faqs.php?success=1");
} else {
	// redirect to aboutus.php with error message
	header("Location: ../pages/faqs.php?success=0");
}
$stmt->close();
$conn->close();
?>