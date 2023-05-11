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
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime X Gaming Guild &#x2223; Category Products</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="../assets/css/products.css?<?php echo time(); ?>">

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