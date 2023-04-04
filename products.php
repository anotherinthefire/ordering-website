<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Product View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/products.css">
</head>

<body>
<?php include("includes/nav.php"); ?>
    <!-- PROD 2 -->
    <?php
    // get the selected category ID from the URL parameter
    require_once "config.php";
    $category_id = $_GET['cat_id'];

    // query the products that belong to the selected category
    $sql = "SELECT * FROM products WHERE cat_id = $category_id";
    $result = mysqli_query($conn, $sql);
    // check if any products were found
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo '<div class="grid-container">';
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<div>';
            echo '<div class="card">';
            echo '<div class="product_image"> <img src="images/' . $row["prod_img"] . '" alt="' . $row["prod_name"] . '">';
            echo '</div>';
            echo '<div class="content">';
            echo '<h3>"' . $row["prod_name"] . '"</h3>';
            echo '<h2 class="price">₱ ' . $row["prod_price"] . '</h2>';
            echo '<a href="product.php?prod_id=' . $row["prod_id"] . '" class="btn">buy now</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No products found in this category.";
    }
    ?>
<?php include("includes/footer.html") ?>
</body>

</html>