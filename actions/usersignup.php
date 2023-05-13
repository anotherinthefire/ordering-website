<?php
require_once("../config.php");

if (isset($_POST['signup'])) {
  // Get values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $fullname = $first_name . " " . $last_name;
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $user_name = $_POST['username'];
  $password = $_POST['password'];

  if (empty($first_name) || empty($last_name) || empty($email) || empty($contact) || empty($user_name) || empty($password)) {
    // Handle empty fields error
    echo "<script>alert('Please fill in all the required fields.'); window.history.back();</script>";
    exit;
  }

  // Validate phone number  
  $pattern = "/^(09|\+639)\d{9}$/";
  if (!preg_match($pattern, $contact)) {
    echo "<script>alert('Invalid phone number. Please enter a valid Philippines mobile number.'); window.history.back();</script>";
    exit;
  }
  // Check if username or email already exists
  $query = "SELECT * FROM user WHERE username = ? OR email = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ss", $user_name, $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $existing_user = mysqli_fetch_assoc($result);
  if ($existing_user) {
    echo "<script>alert('Username or email already exists.'); window.history.back();</script>";
    exit;
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO user (fullname, username, password, email, contact) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssss", $fullname, $user_name, $hashed_password, $email, $contact);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    header('Location: ../includes/signup-success.php');
    exit;
  } else {
    // Handle database insertion error
    echo "<script>alert('An error occurred. Please try again.'); window.history.back();</script>";
    exit;
  }
}
