<?php
session_start();
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $user_id = $_SESSION['user_id'];

    // Connect to database
include('../config.php');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update user information in the database
    $sql = "UPDATE user SET fullname='$fullname', username='$username', email='$email', contact='$contact' WHERE user_id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("User information updated successfully"); window.history.back();</script>';
        exit;
    } else {
        echo '<script>alert("There is an error in updating your information"); window.history.back();</script>'. mysqli_error($conn);
      exit;
    }
    // Close database connection
    mysqli_close($conn);
}
?>
