<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Cart</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
</head>

<body>
    <?php include("../includes/nav-pages.php"); ?>
    <br><br><br><br>

    <div style="text-align:center;">
        <h1><b class="shop">Shopping Cart</b></h1>

        <br>
        <?php
        $user_id = $_SESSION['user_id'];
            $sql = "SELECT count(*) as Total FROM cart WHERE user_id =$user_id";//query
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $total = $row['Total'];
            
                    ?>
                    <table class="pure-table" style="margin-left: 100px;margin-right: 100px;">
                        <tbody style="border-left-width: 0px;">
                            <tr class="item" style="font-size:20px;">
                                <td>Items (Total - <?php echo $total; ?>)</td>
                                <td></td>
                                <td></td>
                                <td>Quantity</td>
                                <td style="padding-left: 60px;">Total</td>
                                <td></td>
                            </tr>
                            <form id="checkprod" action ="../actions/tocheckout.php" method="post">
                <?php
                }                         
                    $query = "SELECT cart.cart_id, size.size_id, color.color_id, size.size, color.color, quantity, products.prod_img, products.prod_price as productPrice, products.prod_name, (quantity * prod_price) as totalPrice 
                                        FROM cart 
                                        JOIN stock ON stock.stock_id = cart.stock_id 
                                        JOIN products ON products.prod_id = stock.prod_id  
                                        JOIN size ON size.size_id = stock.size_id
                                        JOIN color ON color.color_id = stock.color_id
                                        WHERE user_id = $user_id";         
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {//cond start
                        while ($row = mysqli_fetch_array($result)) {//loop start
                        ?>
                        <tr class="Katekyo" style="border-bottom-width: 4.667; padding-bottom:10px;">
                        <td style="padding-left: 75px;"> <input type="checkbox" name="cart_item[]" value="<?php echo $row['cart_id']; ?>"></td>
                        <td style="padding-bottom: 30px;padding-top: 30px;">
                        <img src="../../product_images/<?php echo $row['prod_img']; ?>" style="width: 200px; height: 200px;">
                        </td>
                    <td class="Hit" style="padding-left: 10px;">
                        <b><?php echo $row['prod_name']; ?></b>
                        <p>Size(<?php echo $row['size']; ?>)</p>
                        <p>Color(<?php echo $row['color']; ?>)</p>
                        <p>Price ₱<?php echo $row['productPrice']; ?></p>
                    </td>
                <!-- next -->
                    <td>
                
                        <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                        <button type="submit" name="minus" style="background-color:transparent; border:none;">-</button>
                        <input type="number" min=1 name="quantity" value="<?php echo $row['quantity']; ?>" id="input"  style="text-align: center; width:7vw;">
                        <button type="submit" name="plus" style="background-color:transparent; border:none;">+</button>
               
                    </td>
                    <td style="padding-left: 20px; padding-right: 20px; padding-bottom: 0px;">
                    <div id="">₱<?php echo $row['totalPrice']; ?></div>
                    </td><td>
                
                    <button type="submit" name="delete" class="btn btn-white">X</button>
                    <input type='text' hidden name='cart_id' value="<?php echo $row['cart_id']; ?>">
                
                    </td>
                </tr>
        <?php
            }//loop end
            if (isset($_POST['checkout'])) {
                if (!empty($_POST['cart_item'])) {
                    // If cart_item is not empty, save it in the session
                    // and redirect to the checkout page.
                    $_SESSION['selected_items'] = $_POST['cart_item'];
                    header("location: ../pages/checkout.php");
                    exit;
                } else {
                    // If cart_item is empty, display an error message
                    // and redirect to the cart page.
                    header("location: ../pages/cart.php");
                    die("Error: No items were selected for checkout.");
                }
            }
            
        }
        ?>
                        </tbody>
                    </table>
                    <br>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $query = "SELECT cart.cart_id, size.size_id, color.color_id, 
                        size.size, color.color, cart.quantity, products.prod_img, 
                        products.prod_price as productPrice, products.prod_name, 
                        (cart.quantity * products.prod_price) as totalPrice 
                        FROM cart 
                        JOIN stock ON stock.stock_id = cart.stock_id 
                        JOIN products ON products.prod_id = stock.prod_id 
                        JOIN size ON size.size_id = stock.size_id
                        JOIN color ON color.color_id = stock.color_id
                        WHERE cart.user_id = " . $_SESSION["user_id"];
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $finalPrice = 0;
                    ?>
                            <!-- <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <p><?php echo $row['prod_name'] . ' - ' . $row['quantity'] . ' x P' . $row['productPrice']; ?></p>
                                <?php $finalPrice += $row['totalPrice']; ?>
                            <?php } ?> -->

                            <p class="subtotal"><b>Subtotal: P<?php echo $finalPrice; ?></b></p>
                            <p class="Excluding"><br>Excluding of taxes and shipping</p>
                            <br><br><br>

                            <a href="collection.php">
                                <button type="button" class="btn btn-light" style="border:2px solid #0dcaf0;">
                                    Continue Shoping
                                </button>
                            </a>
                            <button type="submit" name="checkout" value="Checkout" form="checkprod" class="btn btn-Primary" style="
             padding-left: 25px;
             padding-right: 25px;
             border:2px solid transparent;
             ">Checkout</button>    
             
                            <br><br><br>
                </form>
                    <?php
                        }
                    }
                    ?>
        </div>
    <br>
    <!-- <script src="../assets/js/cart.js"></script> -->

    <?php
    include("../includes/foot-pages.php");
    ?>

</body>

</html>