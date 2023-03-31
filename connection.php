<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "allsia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
    while ($row = $result->fetch_assoc()) {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["first_name"] = $row['first_name'];
        header('Location: index.php');
    }
} else {

    $error_message = "Invalid login credentials.";
}
