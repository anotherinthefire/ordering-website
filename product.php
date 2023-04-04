<?php
// get the product ID from the URL parameter
require_once "config.php";
$prod_id = $_GET['prod_id'];

// query the database to get the product info
$sql = "SELECT * FROM products WHERE prod_id = $prod_id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// query the database to get the colors of the product
$sql = "SELECT * FROM color WHERE prod_id = $prod_id";
$result = mysqli_query($conn, $sql);
$colors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// query the database to get the sizes of the product
$sql = "SELECT * FROM sizes WHERE col_id IN (SELECT col_id FROM color WHERE prod_id = $prod_id)";
$result = mysqli_query($conn, $sql);
$sizes = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | <?php echo $product['prod_name']; ?></title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link rel="stylesheet" href="styles/product.css">
  <script type="text/javascript" src="js/product.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/0ff3a44a7b.js"></script>
</head>

<body>
<?php include("includes/nav.php"); ?>
  <div class="center-container">
    <div class="container">
      <div class="grid-container">
        <!--////////////////////////// LEFT COLUMN ///////////////////////////////// -->

        <!--START LEFT -->
        <div>
          <div class="column-left">
            <div class="product_image"> <img src="images/<?php echo $product['prod_img']; ?>" alt="<?php echo $product['prod_name']; ?>" class="variant-1"> </div>
          </div>
        </div>
        <!-- END LEFT-->

        <!--////////////////////////// RIGHT COLUMN ///////////////////////////////// -->

        <!-- RIGHT START -->
        <div>
          <div class="column-right">
            <div class="content">

              <!--//////////// PRODUCT NAME /////////// -->
              <h3><?php echo $product['prod_name']; ?></h3>
                <br>
              <!--//////////// PRICE /////////// -->
              <h2 class="price">₱ <?php echo $product['prod_price']; ?></h2>

              <!--//////////// COLOR AND SIZES COMPONENTS /////////// -->
              <div class="size-color-labels">
                <label class="label-size" for="#">Size</label>
                <label class="label-color" for="#">Color</label>
              </div>
              <div class="size-and-color">
                <!-- 
                  - NOTE: Use to retrive data from selected option
                  -
                  - $(document).ready(function () {
                  -     $('.size-selectt').change(function () {
                  -          alert( $('.size-select option:selected').text());
                  -     });
                  - });
                  -
                 -->

                <select id="second" class="size-select">
                <?php foreach ($colors as $color): ?>
        <option value="<?php echo $color['col_id']; ?>"><?php echo $color['color']; ?></option>
    <?php endforeach; ?>
                </select>

                <select id="second" class="color-select">
                <?php foreach ($sizes as $size): ?>
        <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_code']; ?></option>
    <?php endforeach; ?>
                </select>

              </div>
              <!--//////////// QUANTITY /////////// -->

              <label class="label-quantity" for="#">Quantity</label>

              <div class="quantity-container">

                <input type="text" id="quantity" class="quantity-field" value="1">
                
                <div class="button-container">
                  <button id="up" onclick="setQuantity('up');">
                    <i class="fa fa-chevron-up"></i>
                  </button>
                  <button id="down" onclick="setQuantity('down');">
                    <i class="fa fa-chevron-down"></i>
                  </button>
                </div>
              </div>
              <br>
              <br>
              <!--//////////// BUTTON /////////// -->
              <a href="#" class="btn">Add to Cart</a>
              <!--//////////// DESCRIPTION /////////// -->
              <div class="description">
              <?php echo $product['prod_desc']; ?>
              </div>
            </div>
          </div>
        </div>
        <!--RIGHT END-->
      </div>
    </div>
  </div>
  <?php include("includes/footer.html") ?>
</body>

</html>