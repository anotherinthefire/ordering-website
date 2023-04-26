<?php
// Start session
session_start();

// Retrieve the form data using $_POST superglobal
$region = $_POST['region'] ?? '';
$province = $_POST['province'] ?? '';
$city = $_POST['city'] ?? '';
$barangay = $_POST['barangay'] ?? '';
$street = $_POST['street'] ?? '';
$house_no = $_POST['house_no'] ?? '';
$postal_code = $_POST['postal_code'] ?? '';
$company = $_POST['company'] ?? '';
$room = $_POST['room'] ?? '';

// Retrieve user id from session
$user_id = $_SESSION['user_id'];

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "sia");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement for inserting data
$sql = "INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, add_date)
        VALUES ('$user_id', '$region', '$province', '$city', '$barangay', '$street', '$house_no', '$postal_code', '$company', '$room', NOW())";

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