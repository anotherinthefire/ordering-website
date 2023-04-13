<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | All Products</title>
    <link rel="stylesheet" href="./assets/css/allproducts.css?php echo time(); ?>">
</head>
<body>
<section class="a-products">
        <br>
        <br>
        <div class="grid-container">
            <?php require_once "../config.php";
            $sql = "SELECT prod_id, prod_name, prod_price, prod_img FROM products";
            $result = $conn->query($sql);

            // Display the results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<a href="product.php?id=' . $row["prod_id"] . '">';
                    echo '<div class="product_image"><img src="' . $row["prod_img"] . '" style="height:30vh;" alt="new arrivals"></div>';
                    echo '<div class="content">';
                    echo '<h3>' . $row["prod_name"] . '</h3>';
                    echo '<h2 class="price">₱ ' . $row["prod_price"] . '<small>00</small></h2>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "No results found.";
            }

            ?>
            <!-- PROD 1-->
        </div>
    </section>
</body>
</html>