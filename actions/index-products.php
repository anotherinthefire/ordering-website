<?php
require_once "../config.php";

// $sql = "SELECT prod_id, prod_name, prod_price, prod_img FROM products ORDER BY prod_id DESC LIMIT 28";
$sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
INNER JOIN products p ON s.prod_id = p.prod_id 
GROUP BY s.prod_id
ORDER BY prod_id DESC LIMIT 28";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($products);
?>
