<?php
require_once "./config.php";

// Retrieve filter options from AJAX request
$category_id = $_POST['category_id'];
$sort_option = $_POST['sort_option'];

// Construct SQL query based on selected filter options
$sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
        INNER JOIN products p ON s.prod_id = p.prod_id 
        WHERE s.category_id = $category_id";

switch ($sort_option) {
    case 'name_asc':
        $sql .= " ORDER BY p.prod_name ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY p.prod_name DESC";
        break;
    case 'price_asc':
        $sql .= " ORDER BY p.prod_price ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY p.prod_price DESC";
        break;
    case 'date_asc':
        $sql .= " ORDER BY s.stock_date ASC";
        break;
    case 'date_desc':
        $sql .= " ORDER BY s.stock_date DESC";
        break;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="box">';
        echo '<a href="product.php?id=' . $row["prod_id"] . '">';
        echo '<div class="product_image"><img src="' . $row["prod_img"] . '" style="height:30vh;" alt="new arrivals"></div>';
        echo '<div class="content">';
        echo '<h3>' . $row["prod_name"] . '</h3>';
        echo '<h2 class="price">₱ ' . $row["prod_price"] . '</h2>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "No results found.";
}
?>
