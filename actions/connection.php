<?php
include '../config.php';

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
    header('Location: index.php');
    exit(); // Always include an exit after a header redirect to prevent further script execution
} else {
    $error_message = "Invalid login credentials.";
    $url = "../includes/login.php?error_message=" . urlencode($error_message);
    header('Location: ' . $url);
    exit(); // Always include an exit after a header redirect to prevent further script execution
}

