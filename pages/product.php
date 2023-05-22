<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";

$prod_id = $_GET['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
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
    <link rel="stylesheet" href="../assets/css/product.css">
    <script type="text/javascript" src="assets/js/product.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/0ff3a44a7b.js"></script>
  </head>

  <body>
    <?php include("../includes/nav-pages.php"); ?>

    <div class="center-container">
      <div class="container">
        <div class="grid-container">

          <!-- product image -->
          <div>
            <div class="column-left">
              <div class="product_image"> <img src="../../product_images/<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name']; ?>" class="variant-1"> </div>
            </div>
          </div>

          <div>
            <div class="column-right">
              <div class="content">
                <!-- product name and price -->
                <h3><?php echo $row['prod_name']; ?></h3>
                <br>
                <h2 class="price">₱ <?php echo $row['prod_price']; ?></h2>

                <?php
                $sql = "SELECT DISTINCT s.stock_id, sz.size, c.color 
                FROM stock s 
                INNER JOIN color c ON s.color_id = c.color_id 
                INNER JOIN size sz ON s.size_id = sz.size_id 
                WHERE s.prod_id = $prod_id";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                if (mysqli_num_rows($result) > 0) {
                ?>

<form action="../actions/addtocart.php" method="post">
                    <input name="prod_id" hidden value="<?php echo $prod_id; ?>">
                  <?php
                  $display_dropdown = true;
                  $display_size = false;
                  $display_color = false;

                  foreach ($rows as $row) {
                    if ($row['size'] == 'n/a' && $row['color'] == 'n/a') {
                      $display_dropdown = false;
                      break;
                    } elseif ($row['size'] != 'n/a' && $row['color'] == 'n/a') {
                      $display_size = true;
                    } elseif ($row['size'] == 'n/a' && $row['color'] != 'n/a') {
                      $display_color = true;
                    }
                  }
                  ?>

                  <div class="size-color-labels">
                    <label class="label-size" for="#">Size and Color</label>
                  </div>

                  <?php if ($display_dropdown) : ?>
                    <div class="size-and-color">
                      <select id="second" class="size-select" name="stock_id">
                        <?php foreach ($rows as $row) : ?>
                          <option value="<?php echo $row['stock_id']; ?>">
                            <?php
                            if ($row['size'] != 'n/a' && $row['color'] != 'n/a') {
                              echo $row['size'] . ' - ' . $row['color'];
                            } elseif ($row['size'] == 'n/a' && $display_color) {
                              echo $row['color'];
                            } elseif ($row['color'] == 'n/a' && $display_size) {
                              echo $row['size'];
                            }
                            ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  <?php else : ?>
                    <input type="hidden" name="stock_id" value="<?php echo $row['stock_id']; ?>" />
                  <?php endif; ?>


              </div>

              <label class="label-quantity" for="#">Quantity</label>
              <div class="quantity-container">
                <input type="number" id="quantity" name="quantity" class="quantity-field" value="1">
                <div class="button-container">
                </div>
              </div>
              <br>
              <br>
              <?php
                  if (isset($_SESSION['user_id'])) { ?>
                <button type="submit" name="submit" class="btn">Add to Cart</button>
              <?php } else {
                  }
              ?>
              <div class="description">
                </form>
            <?php }
                $prod_id = $_GET['id'];
                // require_once("../config.php");

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
    <?php include("../includes/foot-pages.php"); ?>
  </body>

  </html>