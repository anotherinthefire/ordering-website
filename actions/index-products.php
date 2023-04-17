<?php
require_once "../config.php";

$sql = "SELECT prod_id, prod_name, prod_price, prod_img FROM products LIMIT 28";
$result = $conn->query($sql);

$products = array();

// Store the results in an array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Output the results in JSON format
header('Content-Type: application/json');
echo json_encode($products);
?>
