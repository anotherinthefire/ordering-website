<?php
require_once "config.php";
$sql = "SELECT prod_id, prod_name, prod_price, prod_img FROM products";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through the results and store them in an array
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $product = array(
            "prod_id" => $row["prod_id"],
            "prod_name" => $row["prod_name"],
            "prod_price" => $row["prod_price"],
            "prod_img" => $row["prod_img"]
        );
        $products[] = $product;
    }

    // Encode the products array as JSON and return it
    header("Content-Type: application/json");
    echo json_encode($products);
} else {
    // Return an error message
    header("HTTP/1.0 404 Not Found");
    echo "No products found.";
}
