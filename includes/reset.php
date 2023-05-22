<?php
session_start();
include('../config.php');
$email = $_SESSION['reset_email'];

// Query the database to check if the email exists
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

// Check if the email exists in the database
if (mysqli_num_rows($result) == 0) {
  $error = "Invalid email address.";
  echo "<script>alert('$error'); window.location.href='../';</script>";
  exit;
}

// Check if the reset token and email are set in the session
if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
  $error = "Invalid password reset request.";
  echo "<script>alert('$error'); window.location.href='../';</script>";
  exit;
}

if (isset($_POST['submit'])) {
  // Get the new password from the form
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the password fields
  if (empty($password) || empty($confirm_password)) {
    $error = "Please enter a password and confirm it.";
    echo "<script>alert('$error');</script>";
  } elseif ($password != $confirm_password) {
    $error = "Passwords do not match.";
    echo "<script>alert('$error');</script>";
  } else {
    // Get the email address from the session
    $email = $_SESSION['reset_email'];

    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $sql = "UPDATE user SET password='$hashedPassword' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      // Password reset successful
      $success = "Your password has been reset.";
      echo "<script>alert('$success'); window.location.href='../';</script>";
      exit;
    } else {
      // Password reset failed
      $error = "Error resetting password: " . mysqli_error($conn);
      echo "<script>alert('$error');</script>";
    }

    // Clear the reset token and email from the session
    unset($_SESSION['reset_token']);
    unset($_SESSION['reset_email']);
    //move int the success if condition
  }
}
?>


<html>
<head>
  <title>AXGG | Reset Password</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://fonts.googlelapis.com/css?family=Poppins" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/Forgot.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background:#5876CE;">
  <div class="box1 col-md-5 align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="p-4 text-center mt-5 text-dark fw-bold">
      <img src="../images/key.png" class="mb-3">
      <p class="text1">Reset Password</p>
    </div>
    <form method="post" action="">
      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" id="floatingPassword1" placeholder="Password1" name="confirm_password">
        <label for="floatingPassword1">Confirm Password</label>
      </div>
      <div class="box2 d-grid gap-2 mb-3 ms-5 me-5 mt-3 rounded-3 text-center">
        <button class="btn text-light fs-4 fw-bold" type="submit" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
