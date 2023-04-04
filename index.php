<html>

<head>
    <title>Anime X Gaming &#x2223; Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/69c308bd4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <?php include("includes/nav.php"); ?>
    <?php
    require_once("config.php");
    //retrieve image data from the database
    $sql = "SELECT * FROM carousel_images";
    $result = mysqli_query($conn, $sql);
    ?>
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $active = '';
                    if ($i == 0) {
                        $active = 'active';
                    }
                ?>
                    <div class="carousel-item <?php echo $active; ?>">
                        <img src="images/<?php echo $row['filename']; ?>" class="d-block w-100 h-100" />
                    </div>
                <?php
                    $i++;
                }
                ?>
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
    </section>
    <section class="a-products">
        <h1>NEW ARRIVALS</h1>
        <br>
        <br>
        <div class="grid-container">
            <!-- PROD 1 -->
            <div>
                <div class="box">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                    </div>
                </div>
            </div>
            <!-- PROD 1-->

            <!-- PROD 2 -->
            <div>
                <div class="box">
                    <a href="">
                        <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                        <div class="content">
                            <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                            <h2 class="price">₱ 1,069.<small>00</small></h2>
                    </a>
                </div>
            </div>
        </div>
        <!-- PROD 2 END -->

        <!-- PROD 3 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 3 END -->

        <!-- PROD 4 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 4 END -->

        <!-- PROD 5 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 5 END -->

        <!-- PROD 6 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 6 END -->

        <!-- PROD 7 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 7 END -->

        <!-- PROD 8 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 8 END -->

        <!-- PROD 9 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 9 END -->

        <!-- PROD 10 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 10 END -->

        <!-- PROD 11 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 11 END -->

        <!-- PROD 12 -->
        <div>
            <div class="box">
                <a href="">
                    <div class="product_image"> <img src="https://i.ibb.co/fd7Yq2v/product.png" alt=""> </div>
                    <div class="content">
                        <h3>AXGG "One Piece Strawhat Pirates" Anime Shirt</h3>
                        <h2 class="price">₱ 1,069.<small>00</small></h2>
                </a>
            </div>
        </div>
        </div>
        <!-- PROD 12 END -->
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