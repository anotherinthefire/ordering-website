<?php
session_start();
if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $user_id = $_SESSION['user_id'];

    include('../config.php');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_check = "SELECT user_id FROM user WHERE (username='$user_name' OR email='$email') AND user_id != '$user_id'";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) > 0) {
        // The username or email is already taken
        echo '<script>alert("Username or email is already taken"); window.location.href = "../pages/profile.php";</script>';
        exit;
    }

    $sql = "UPDATE user SET fullname='$fullname', username='$user_name', email='$email', contact='$contact' WHERE user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("User information updated successfully"); window.location.href = "../pages/profile.php";</script>';
        exit;
    } else {
        echo '<script>alert("There is an error in updating your information");window.location.href = "../pages/profile.php";</script>'. mysqli_error($conn);
        exit;
    }
    mysqli_close($conn);
}
?>
