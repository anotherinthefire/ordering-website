<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | All Products</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/allproducts.css?<?php echo time(); ?>">
</head>

<body>
    <?php include("../includes/nav-pages.php"); ?>
    <?php
    $order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'name_asc';
    $order_name = ($order_by === 'name_desc') ? 'p.prod_name DESC' : 'p.prod_name ASC';
    $order_price = ($order_by === 'price_desc') ? 'p.prod_price DESC' : 'p.prod_price ASC'; 
    $sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
        INNER JOIN products p ON s.prod_id = p.prod_id 
        GROUP BY s.prod_id
        ORDER BY $order_price, $order_name"; 
    $result = $conn->query($sql);
    ?>
    <header>
        <div class="image-header">
            <img id="header-img" src="../images/all-products.jpg" alt="header">
            <div class="centered">ALL PRODUCTS</div>
        </div>
    </header>
    <select onchange="this.options[this.selectedIndex].value && (window.location.href = '?order_by='+this.options[this.selectedIndex].value);">
        <option value="name_asc" <?php if ($order_by === 'name_asc') echo 'selected'; ?>>Product Name A-Z</option>
        <option value="name_desc" <?php if ($order_by === 'name_desc') echo 'selected'; ?>>Product Name Z-A</option>
        <option value="price_desc" <?php if ($order_by === 'price_desc') echo 'selected'; ?>>Price High to Low</option>
        <option value="price_asc" <?php if ($order_by === 'price_asc') echo 'selected'; ?>>Price Low to High</option>
    </select>
    <section class="a-products">
        <br>
        <br>
        <div class="grid-container">
            <?php

            // Display the results
            if ($result->num_rows > 0) { ?>

            <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<a href="product.php?id=' . $row["prod_id"] . '">';
                    echo '<div class="product_image"><img src="../../product_images/' . $row["prod_img"] . '" style="height:30vh;" alt="new arrivals"></div>';
                    echo '<div class="content">';
                    echo '<h3><b>' . $row["prod_name"] . '</b></h3>';
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
    <?php include("../includes/foot-pages.php"); ?>
</body>

</html>