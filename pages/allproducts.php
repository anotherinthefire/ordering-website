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
    <header>
        <div class="image-header">
            <img id="header-img" src="../images/all-products.jpg" alt="header">
            <div class="centered">ALL PRODUCTS</div>
        </div>
    </header>
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
                    echo '<div class="product_image"><img src="../' . $row["prod_img"] . '" style="height:30vh;" alt="new arrivals"></div>';
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