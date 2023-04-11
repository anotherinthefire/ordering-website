<?php
// Get the product id from the URL parameter
$prod_id = $_GET['id'];

// Retrieve product information from the database
require_once("config.php");

$sql = "SELECT * FROM products WHERE prod_id = $prod_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | <?php echo $row['prod_name']; ?></title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="styles/product.css?php echo time(); ?>">
    <script type="text/javascript" src="js/product.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/0ff3a44a7b.js"></script>
  </head>

  <body>
    <?php include("includes/nav.php"); ?>
    <div class="center-container">
      <div class="container">
        <div class="grid-container">
          <div>
            <div class="column-left">
              <div class="product_image"> <img src="<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name']; ?>" class="variant-1"> </div>
            </div>
          </div>
          <div>
            <div class="column-right">
              <div class="content">
                <h3><?php echo $row['prod_name']; ?></h3>
                <br>
                <h2 class="price">₱ <?php echo $row['prod_price']; ?></h2>

                <?php
                $sql = "SELECT DISTINCT color.color, stock.color_id FROM stock
                        INNER JOIN color ON stock.color_id = color.color_id
                        WHERE stock.prod_id = $prod_id";
                $result = mysqli_query($conn, $sql);
                $colors = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $sql = "SELECT DISTINCT size.size, stock.size_id FROM stock
                        INNER JOIN size ON stock.size_id = size.size_id
                        WHERE stock.prod_id = $prod_id";
                $result = mysqli_query($conn, $sql);
                $sizes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>

                <div class="size-color-labels">
                  <label class="label-size" for="#">Size</label>
                  <label class="label-color" for="#">Color</label>
                </div>
                <div class="size-and-color">
                  <select id="second" class="size-select">
                    <?php foreach ($sizes as $size) : ?>
                      <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size']; ?></option>
                    <?php endforeach; ?>
                  </select>

                  <select id="second" class="color-select">
                    <?php foreach ($colors as $color) : ?>
                      <option value="<?php echo $color['color_id']; ?>"><?php echo $color['color']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

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

                <a href="#" class="btn">Add to Cart</a>
                <div class="description">

                <?php
                $prod_id = $_GET['id'];
                require_once("config.php");

                $sql = "SELECT * FROM products WHERE prod_id = $prod_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();

                  echo nl2br("$row[prod_desc]");
                } else {
                  echo '<p>Product not found.</p>';
                }
              } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/footer.html") ?>
  </body>
  </html>