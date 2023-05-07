<!DOCTYPE html>
<html lang="en">
<?php include("../includes/nav-pages.php");

require_once "../config.php";
$category_id = $_GET['cat_id'];

// Get the latest product of the selected category
$latest_product_query = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img, c.category 
FROM stock s 
INNER JOIN products p ON s.prod_id = p.prod_id 
INNER JOIN category c ON s.category_id = c.category_id 
WHERE s.category_id = $category_id
GROUP BY s.prod_id
ORDER BY p.prod_id DESC
LIMIT 1";
$latest_product_result = $conn->query($latest_product_query);
$latest_product = $latest_product_result->fetch_assoc();

$sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
            INNER JOIN products p ON s.prod_id = p.prod_id 
            WHERE s.category_id = $category_id
            GROUP BY s.prod_id";
$result = $conn->query($sql);

$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'name_asc'; // set default order
$order_name = ($order_by === 'name_desc') ? 'p.prod_name DESC' : 'p.prod_name ASC'; // order by name
$order_price = ($order_by === 'price_desc') ? 'p.prod_price DESC' : 'p.prod_price ASC'; // order by price
$sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
            INNER JOIN products p ON s.prod_id = p.prod_id 
            WHERE s.category_id = $category_id
            GROUP BY s.prod_id
            ORDER BY $order_name, $order_price";
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime X Gaming Guild &#x2223; Category Products</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="../assets/css/products.css?<?php echo time(); ?>">
    <style>
        .sort{
            text-align: right;
            margin: 0% 3% 1% 1%;
        }
    </style>
</head>

<body>

    <header>
        <div class="image-header">
            <img id="header-img" src="../../product_images/<?php echo $latest_product['prod_img'] ?>" alt="header">
            <div class="centered"><?php echo $latest_product['category'] ?></div>
        </div>
    </header>
    <div style="margin-top:10vh;">

    </div>
    <div class="sort">
    <select onchange="this.options[this.selectedIndex].value && (window.location.href = '?cat_id=<?php echo $category_id ?>&order_by='+this.options[this.selectedIndex].value);">
        <option value="name_asc" <?php if ($order_by === 'name_asc') echo 'selected'; ?>>Product Name A-Z</option>
        <option value="name_desc" <?php if ($order_by === 'name_desc') echo 'selected'; ?>>Product Name Z-A</option>
        <option value="price_desc" <?php if ($order_by === 'price_desc') echo 'selected'; ?>>Price High to Low</option>
        <option value="price_asc" <?php if ($order_by === 'price_asc') echo 'selected'; ?>>Price Low to High</option>
    </select>
    </div>
    <div class="grid-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                echo '<a href="product.php?id=' . $row["prod_id"] . '">';
                echo '<div class="product_image"><img src="../../product_images/' . $row["prod_img"] . '" style="height:30vh;" alt="new arrivals"></div>';
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
    </div>
    <?php include("../includes/foot-pages.php"); ?>
</body>

</html>