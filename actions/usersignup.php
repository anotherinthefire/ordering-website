<?php
require_once("../config.php");
if(isset($_POST['signup'])) {
  // Get values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $fullname = $first_name . " " . $last_name;
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Insert user data into database
  $query = "INSERT INTO user (fullname, username, password, email, contact ) VALUES ('$fullname', '$username', '$password','$email', '$contact')  ";
  $result = mysqli_query($conn, $query);
  
  // Redirect to login page
  header('Location: ../');
  exit;
}
