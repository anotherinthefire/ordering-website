<?php

?>
<html>
<head>
    <title>Anime X Gaming &#x2223; Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/69c308bd4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles.css?php echo time();" />
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
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
    </section>
    <section class="a-products">
        <h1>NEW ARRIVALS</h1>
        <br>
        <br>
        <div class="grid-container" id="products-container">
            <!-- Products will be added here -->
        </div>

        <script>
            // Fetch the products data from the server
            fetch('./actions/index-products.php')
                .then(response => response.json())
                .then(products => {
                    const productsContainer = document.querySelector('#products-container');

                    // Generate HTML for each product
                    products.forEach(product => {
                        const productBox = document.createElement('div');
                        productBox.classList.add('box');
                        productBox.innerHTML = `
                        <a href="product.php?id=${product.prod_id}">
                            <div class="product_image"><img src="${product.prod_img}" style="height:30vh;" alt="new arrivals"></div>
                            <div class="content">
                                <h3>${product.prod_name}</h3>
                                <h2 class="price">₱ ${product.prod_price}<small>00</small></h2>
                            </div>
                        </a>
                    `;
                        productsContainer.appendChild(productBox);
                    });
                });
        </script>
    </section>
    <section class="all-products-btn">
        <a href="pages/allproducts.php"><button>View All Products</button></a>
    </section>
    <!-- query -->
    <?php
    
    $sql = "SELECT * FROM category LIMIT 3";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="categories">
        <?php while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row["category_id"];
            $category_name = $row["category"];

            $sql =
                "SELECT prod_img FROM products WHERE prod_id IN (SELECT prod_id FROM stock WHERE category_id = $category_id) ORDER BY prod_id DESC LIMIT 1";
            $result2 = mysqli_query($conn, $sql);

            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row2 = mysqli_fetch_assoc($result2);
                $prod_img = $row2["prod_img"];
            } else {
                $prod_img = "";
            }
        ?>
            <div class="card">
                <a href="pages/products.php?cat_id=<?php echo $category_id; ?>" class="btn btn-primary category-link" data-category-id="<?php echo $category_id; ?>">
                    <img src="<?php echo $prod_img; ?>" alt="<?php echo $category_name; ?>">
                    <div class="details">
                        <h2><?php echo $category_name; ?></h2>
                        <p>View Category</p>
                    </div>
                </a>
            </div>
        <?php } ?>
        <div class="card">
            <a href="pages/collection.php" class="btn btn-primary>
            <img src=" https://i.ibb.co/Wg85czh/allcollections-pic.png" alt="All Collections">
                <div class="details">
                    <h2>All Collections</h2>
                    <p>View Category</p>
                </div>
            </a>
        </div>
        <script>
        $(document).ready(function() {
            $("a").click(function(e) {
                e.preventDefault();
                var page = $(this).attr("href");
                if (page != '#home') {
                    $("#content").load(page);
                }
                $("a").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    </div>

</body>

</html>