<?php
// Start session
session_start();

// Retrieve the form data using $_POST superglobal
$user_id = $_SESSION['user_id'];
$region = $_POST['region_text'];
$province = $_POST['province_text'];
$city = $_POST['city_text'];
$barangay_text = $_POST['barangay_text']; 
$street = $_POST['street'];
$house_no = $_POST['house_no'];
$postal_code = $_POST['postal_code'];
$company = $_POST['company'];
$room = $_POST['room'];
$label = $_POST['label'];

// Retrieve user id from session
$user_id = $_SESSION['user_id'];

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "sia");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement for inserting data
$sql = "INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, label, add_date)
        VALUES ('$user_id', '$region', '$province', '$city', '$barangay_text', '$street', '$house_no', '$postal_code', '$company', '$room', '$label', NOW())";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    // Redirect to profile page
    header("Location: ../pages/profile.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
