<?php
require_once "config.php";
$category_id = $_GET['cat_id'];

$stmt = $conn->prepare("SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
            INNER JOIN products p ON s.prod_id = p.prod_id 
            WHERE s.category_id = ?
            GROUP BY s.prod_id");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $row["prod_img"] . '" alt="' . $row["prod_name"] . '" />';
        echo '<h3>' . $row["prod_name"] . '</h3>';
        echo '<p class="price">$' . $row["prod_price"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No products found.</p>';
}

$stmt->close();
$conn->close();
?>
