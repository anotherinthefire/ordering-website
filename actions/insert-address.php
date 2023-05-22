<?php
session_start();
include_once('../config.php');

$user_id = $_SESSION['user_id'];
$region = $_POST['region_text'];
$province = $_POST['province_text'];
$city = $_POST['city_text'];
$barangay = $_POST['barangay_text'];
$street = $_POST['street'];
$house_no = $_POST['house_no'];
$postal_code = $_POST['postal_code'];
$company = $_POST['company'];
$room = $_POST['room'];
$label = $_POST['label'];

$barangay_text = "";
if (isset($_POST['barangay_text'])) {
    $barangay_text = $_POST['barangay_text'];
}

$checkSql = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $checkSql);

if (mysqli_num_rows($result) > 0) {
    // Existing address found, perform any necessary actions
    $sql = "INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, label) VALUES ('$user_id', '$region', '$province', '$city', '$barangay_text', '$street', '$house_no', '$postal_code', '$company', '$room', '$label')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/profile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // No existing address found, insert a new address
    $sql = "INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, label, `set`) VALUES ('$user_id', '$region', '$province', '$city', '$barangay_text', '$street', '$house_no', '$postal_code', '$company', '$room', '$label', 1)";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/profile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
