<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Cart</title>
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
</head>
<body>
    <?php include("../includes/nav-pages.php"); ?>
<br><br><br><br>

<div style="text-align:center;">
    <h1><b class="shop">Shopping Cart</b></h1>

    <br>
    <table class="pure-table" style="margin-left: 100px;margin-right: 100px;">
        <tbody style="border-left-width: 0px;">
            <tr class="item" style="font-size:20px;">
                <td>Items (Total - 2)</td>
                <td></td>
                <td></td>
                <td>Quantity</td>
                <td style="padding-left: 60px;">Total</td>
                <td></td>
            </tr>

            <tr class="Katekyo" style="border-bottom-width: 4.667; padding-bottom:10px;">
                <td style="padding-left: 75px;"><input type="checkbox"></td>
                <td style="padding-bottom: 30px;padding-top: 30px;">
                    <img src="../images/kata.jpg">
                </td>
                <td class="Hit" style="padding-left: 10px;">
                    <b>Katekyo - Hitman Reborn</b>
                    <p>Size(if applicable)</p>
                    <p>Price</p>
                </td>

                <td>
                    <input type="number" value="0" id="input" style="width: 104px;" onchange="updateResult()">
                </td>
                <td style="padding-left: 20px; padding-right: 20px; padding-bottom: 0px;">
                    <div id="result">P0</div>
                </td>
                <td>
                    <button type="button" class="btn btn-white">X</button>
                </td>
            </tr>
            <tr class="Katekyo" style="border-bottom-width: 4.667; padding-bottom:10px;">
                <td style="padding-left: 75px;"><input type="checkbox"></td>
                <td style="padding-bottom: 30px;padding-top: 30px;">
                    <img src="../images/lam.jpg">
                </td>
                <td class="Hit" style="padding-left: 10px;">
                    <b>Katekyo - Hitman Reborn</b>
                    <p>Size(if applicable)</p>
                    <p>Price</p>
                </td>
                <td>
                    <input type="number" value="0" id="input2" style="width: 104px;" onchange="updateResult(),updateResult1()">
                </td>
                <td style="padding-left: 20px; padding-right: 20px; padding-bottom: 0px;">
                    <div id="result2">P0</div>
                </td>
                <td>
                    <button type="button" class="btn btn-white">X</button>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="subtotal"><b>Subtotal: P<span id="subtotal">0</span><br>

            <p class="Excluding"><br>Excluding of taxes and shipping</p>
            <br><br><br>

            <a href="collection.php">
                <button type="button" class="btn btn-light" style="border:2px solid #0dcaf0;">
                    Continue Shoping
                </button>
            </a>
            <a href="checkout.php">
                <button type="button" class="btn btn-Primary" style="
             padding-left: 25px;
             padding-right: 25px;
             border:2px solid transparent;
             ">
                    Checkout
                </button>
            </a>
            <br><br><br>
</div>
<br>
<?php include("../includes/foot-pages.php"); ?>
<script src="../assets/js/cart.js"></script>
</body>
</html>