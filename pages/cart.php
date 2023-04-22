<link rel="stylesheet" href="./assets/css/cart.css">

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
                    <img src="./images/kata.jpg">
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
                    <img src="./images/lam.jpg">
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

            <a href="./">
                <button type="button" class="btn btn-light" style="border:2px solid #0dcaf0;">
                    Continue Shoping
                </button>
            </a>
            <a href="./pages/checkout.php">
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
<script src="./assets/js/cart.js"></script>