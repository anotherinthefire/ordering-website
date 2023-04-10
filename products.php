<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Product View</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/products.css?php echo time(); ?>">
</head>

<body>
    <?php include("includes/nav.php"); ?>

    <section class="homepic">
        <img src="https://i.ibb.co/ZKQtnfD/axgg-banner2.png" class="homepic img-fluid" style="width: 100%;" />
    </section>

    <!-- dropdown -->
    <div>
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="all">All</option>
            <option value="name_asc">Name A-Z</option>
            <option value="name_desc">Name Z-A</option>
            <option value="price_asc">Price low to high</option>
            <option value="price_desc">Price high to low</option>
            <option value="date_asc">Oldest to newest</option>
            <option value="date_desc">Newest to oldest</option>
        </select>
    </div>

    <?php
    require_once "config.php";
    $category_id = $_GET['cat_id'];
    ?>

    <div class="grid-container">
        <?php
        $sql = "SELECT s.*, p.prod_name, p.prod_price, p.prod_img FROM stock s 
            INNER JOIN products p ON s.prod_id = p.prod_id 
            WHERE s.category_id = $category_id
            GROUP BY s.prod_id";
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
    </div>
    <?php include("includes/footer.html") ?>
</body>

</html>