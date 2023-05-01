<?php
// Get the product id from the URL parameter

// Get the product id from the URL parameter
$prod_id = $_GET['id'];

// Retrieve product information from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM products WHERE prod_id = $prod_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Add product to cart
  // if (isset($_POST['add_to_cart'])) {
  //   // Get product information
  //   $prod_name = $row['prod_name'];
  //   $prod_price = $row['prod_price'];
  //   $color_id = $_POST['color'];
  //   $size_id = $_POST['size'];
  //   $quantity = $_POST['quantity'];
  //   $user_id = $_SESSION['user_id'];

  //   // Check if product is already in the cart
  //   $sql = "SELECT * FROM cart WHERE user_id = $user_id AND stock_id IN (SELECT stock_id FROM stock WHERE prod_id = $prod_id AND color_id = $color_id AND size_id = $size_id)";
  //   $result = $conn->query($sql);

  //   if ($result->num_rows > 0) {
  //     // Update cart quantity
  //     $row = $result->fetch_assoc();
      
  //     $cart_id = $row['cart_id'];
  //     $stock_id = $row['stock_id'];
  //     $new_quantity = $row['quantity'] + $quantity;
  //     $sql = "UPDATE cart SET quantity = $new_quantity WHERE cart_id = $cart_id";
  //     if ($conn->query($sql) === TRUE) {
  //       echo "Product quantity updated successfully.";
  //     } else {
  //       echo "Error updating product quantity: " . $conn->error;
  //     }
  //   } else {
  //     // Add product to cart
  //     $sql = "INSERT INTO cart (user_id, stock_id, quantity) VALUES ($user_id, (SELECT stock_id FROM stock WHERE prod_id = $prod_id AND color_id = $color_id AND size_id = $size_id), $quantity)";
  //     if ($conn->query($sql) === TRUE) {
  //       echo "Product added to cart successfully.";
  //     } else {
  //       echo "Error adding product to cart: " . $conn->error;
  //     }
  //   }
  // }

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
          <div>
            <div class="column-left">
              <div class="product_image"> <img src="../../product_images/<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name']; ?>" class="variant-1"> </div>
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

                $sql1 = "SELECT DISTINCT size.size, stock.size_id FROM stock
                        INNER JOIN size ON stock.size_id = size.size_id
                        WHERE stock.prod_id = $prod_id";
                $result1 = mysqli_query($conn, $sql1);
                $sizes = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                
                $query = "SELECT products.prod_id, stock.prod_id, stock.stock_id 
                FROM products 
                INNER JOIN stock ON products.prod_id = stock.prod_id 
                WHERE stock.prod_id = $prod_id";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) > 0)
                    {
                      while($row = mysqli_fetch_array($result))
                         {  
                          // print_r($row['stock_id']);
                         
                    
                ?>
              <form action="../actions/addtocart.php" method="post">
              <input name="stock_id" hidden value= <?php echo $row['stock_id'];?>>
              <input name="prod_id" hidden value= <?php echo $row['prod_id'];?>>  
              
                <div class="size-color-labels">
                  <label class="label-size" for="#">Size</label>
                  <label class="label-color" for="#">Color</label>
                </div>
                <div class="size-and-color">
                  <select id="second" class="size-select" name = "size_id">
                    <?php foreach ($sizes as $size) : ?>
                      <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size']; ?></option>
                    <?php endforeach; ?>
                  </select>

                  <select id="second" name ="color_id" class="color-select">
                    <?php foreach ($colors as $color) : ?>
                      <option value="<?php echo $color['color_id']; ?>"><?php echo $color['color']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <label class="label-quantity" for="#">Quantity</label>
                <div class="quantity-container">
                  <input type="number" id="quantity" name="quantity" class="quantity-field" value="1">
                  <div class="button-container">
                    <!-- <button id="up" onclick="setQuantity('up');">
                      <i class="fa fa-chevron-up"></i>
                    </button>
                    <button id="down" onclick="setQuantity('down');">
                      <i class="fa fa-chevron-down"></i>
                    </button> -->
                  </div>
                </div>
                <br>
                <br>
                <?php
                if(isset($_SESSION['user_id']))
                {
                ?>      
                <button type="submit" name="submit" class="btn">Add to Cart</button>
                <?php
                }else
                {

                }
                ?>
                <div class="description">
                </form>
                <?php
                }
              }
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