<?php
include '../config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Username = $_POST['username'];
$Password = $_POST['password'];

$sql = "SELECT * from user where username ='$Username' and password ='$Password'";
$result = $conn->query($sql);

// for login
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $_SESSION["userid"] = $row['userid'];
    $_SESSION["first_name"] = $row['first_name'];
    header('Location: ../index.php');
    exit(); // Always include an exit after a header redirect to prevent further script execution
} else {
    $error_message = "Invalid login credentials.";
    echo "<script>console.log('$error_message');</script>"; // Log error message to console using JavaScript
    header('Location: ../login.php');
    exit(); // Always include an exit after a header redirect to prevent further script execution
}
