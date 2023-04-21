<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo("successful");
// }


$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    print_r($_SESSION["user_id"]);
    $UsernameOrEmail = $_POST['username_or_email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$UsernameOrEmail' OR email = '$UsernameOrEmail' AND password = '$Password'";
    $result = $conn->query($sql);

    // for login
    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $_SESSION["user_id"] = $row['user_id'];
          $_SESSION["fullname"] = $row['fullname'];
          header('Location: ../');
        }       
    } 
    else 
      {
          $error_message = "Invalid login credentials.";
      }
}

?>  