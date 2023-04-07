<html>

<head>
    <title>Anime X Gaming &#x2223; Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/69c308bd4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("includes/nav.php"); ?>

    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.ibb.co/JvLv7Jd/carousel1.png" class="d-block w-100 h-100" />
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/s1YW6DD/carousel2.png" class="d-block w-100 h-100" />
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/R3nCMxT/carousel3.png" class="d-block w-100 h-100" />
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/w0nVpdw/carousel4.png" class="d-block w-100 h-100" />
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="a-products">
        <h1>NEW ARRIVALS</h1>
        <br>
        <br>
        <div class="grid-container">
            <?php require_once "config.php";
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
    <!--  -->
    <section class="all-products-btn">
        <button>View All Products</button>
    </section>
    <section class="categories">
        <div class="card">
            <img src="https://i.ibb.co/TYMf5YZ/lanyard-pic.png" alt="Lanyard">
            <div class="details">
                <h2>Lanyard</h2>
                <p>View Category</p>
            </div>
        </div>

        <div class="card">
            <img src="https://i.ibb.co/sm70V1s/shirt-pic.png" alt="Shirt Collections">
            <div class="details">
                <h2>Shirt Collections</h2>
                <p>View Category</p>
            </div>
        </div>

        <div class="card">
            <img src="https://i.ibb.co/C6Y91zF/accessories-pic.png" alt="Accessories">
            <div class="details">
                <h2>Accessories</h2>
                <p>View Category</p>
            </div>
        </div>

        <div class="card">
            <img src="https://i.ibb.co/Wg85czh/allcollections-pic.png" alt="All Collections">
            <div class="details">
                <h2>All Collections</h2>
                <p>View Category</p>
            </div>
        </div>
    </section>
    <?php include("includes/footer.html"); ?>
</body>

</html>