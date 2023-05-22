<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $UsernameOrEmail = $_POST['username_or_email'];
    $Password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$UsernameOrEmail' OR email = '$UsernameOrEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
          $hashed_password = $row['password'];
          $user_status = $row['status'];

          if (password_verify($Password, $hashed_password)) {
            if ($user_status == 0 || $user_status == 1) {
              $_SESSION["user_id"] = $row['user_id'];
              header('Location: ../');
              exit;
            } else {
              $error_message = "Login failed. User status is either banned or not found.";
              echo "<script>alert('$error_message'); window.location.replace(document.referrer);</script>";
            }
          } else {
            $error_message = "Invalid password.";
            echo "<script>alert('$error_message'); window.location.replace(document.referrer);</script>";
          }
        }       
    } else {
        $error_message = "Invalid login credentials.";
        echo "<script>alert('$error_message'); window.location.replace(document.referrer);</script>";
    }
}
?>
