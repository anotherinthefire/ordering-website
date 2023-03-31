<html>

<head>
    <title>AXGG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/69c308bd4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    <!-- products -->
    <section class="a-products"></section>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>
    <h1>New Products</h1>

    <?php include("includes/footer.html") ?>
</body>

</html>