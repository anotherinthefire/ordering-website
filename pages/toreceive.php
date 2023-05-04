<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AXGG | To Receive</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        .link-no-decoration a {
            text-decoration: none;
            color:inherit;
        }
    </style>
</head>

<body>
    <?php include("../includes/nav-pages.php");
    $user_id = $_SESSION['user_id'];
    include '../config.php';

    function getOrderStatus($status)
    {
        switch ($status) {
            case 0:
                return "waiting for confirmation";
            case 1:
                return "confirmed";
            case 2:
                return "waiting for payment";
            case 3:
                return "preparing to ship";
            case 4:
                return "ready for delivery";
            case 5:
                return "out for delivery";
            case 6:
                return "received";
            case 7:
                return "refunded";
            case 8:
                return "cancelled";
            default:
                return $status;
        }
    }

    // SQL statement to retrieve ordered products and their details
    $sql = "SELECT op.oprod_id, op.ord_id, op.quantity, p.prod_name, p.prod_price, c.color, s.size, p.prod_desc, p.prod_img, o.status
            FROM ordered_products op
            INNER JOIN stock stk ON op.stock_id = stk.stock_id
            INNER JOIN products p ON stk.prod_id = p.prod_id
            INNER JOIN orders o ON op.ord_id = o.ord_id
            INNER JOIN color c ON stk.color_id = c.color_id
            INNER JOIN size s ON stk.size_id = s.size_id
            WHERE o.user_id = $user_id 
            AND o.status = 5
            ORDER BY op.ord_id DESC";

    $result = mysqli_query($conn, $sql);

    ?>
    <div align="center" style="vertical-align: bottom; font-family: 'Montserrat', sans-serif; ">
        <div style="font-family: 'Montserrat', sans-serif;">
            <br /><br /><br />
            <h1><b>My Orders</b></h1>
        </div>
        <br /><br /><br />
        <table>
            <tbody>
                <tr style="font-family: 'Montserrat', sans-serif; " class="link-no-decoration">
                    <td><b style="padding-left:20px; color: #4F4F4F;"><a href="myorders.php">ALL</a></b></td>
                    <td style="height: 20px; padding-left: 120px; color: #4F4F4F;"><b><a href="topay.php">TO PAY</a></b></td>
                    <td style="padding-left: 50px; color: #4F4F4F;"><b><a href="toship.php">TO SHIP</a></b></td>
                    <td style="padding-left: 70px; color: #5876CE;"><b><a href="toreceive.php">TO RECEIVE</a></b></td>
                    <td></td>
                    <td style="height: 20px; padding-left: 205px; color: #4F4F4F;"><b><a href="completed.php">COMPLETED</a></b></td>
                </tr>


                <?php
                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Initialize variables to store the current order ID and total price
                    $current_order_id = null;
                    $total_price = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $status = $row['status'];
                        $status = getOrderStatus($status);

                        if ($current_order_id != $row['ord_id']) {
                            // Add a row for the total for the previous order, if it exists
                            if ($current_order_id !== null) {
                                echo "<tr>
                                        <td colspan='9'>
                                            <p style='text-align: right; background: #F7F7F7; padding-right:20px; padding-bottom:20px'>Total:<b>₱" . $total_price . "</b></p>
                                            <hr>
                                        </td>
                                </tr>";
                            } ?>

                        <?php
                            $current_order_id = $row['ord_id'];
                            $total_price = 0;
                            echo "<tr>
                            <td colspan='9' style='padding-top:20px; padding-left:20px;  background: #F7F7F7; '>
                                <strong>Order #" . $current_order_id . " is " . $status . "</strong>
                            </td>
                    </tr>";
                        }
                        ?>
                        <tr class="Katekyo" style="border-bottom-width: 0px; background: #F7F7F7;">
                            <td></td>
                            <td>
                                <br /><br />
                                <img src="../../product_images/<?php echo $row["prod_img"]; ?>" style="background: #F7F7F7; padding-top: 0px; padding-right: 40px; width:300px;" />
                            </td>
                            <td>
                                <b style="font-family: 'Montserrat', sans-serif; font-size: 20px"><?php echo $row["prod_name"]; ?></b>
                                <p><?php echo $row["size"]; ?>,
                                    <?php echo $row["color"]; ?></p>
                                <?php
                                $total = $row['quantity'] * $row['prod_price']; ?>
                                <p style=" margin-right: 100px; border-right-width: 100px; padding-right: 100px; font-family: 'Montserrat', sans-serif;">
                                    x<?php echo $row["quantity"]; ?>
                                </p>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <p style=" padding-right:20px; margin-left: 240px; border-bottom-width: 100px; margin-top: 145px; font-family: 'Montserrat', sans-serif; font-size: 20px;">
                                    ₱<?php echo $total; ?>

                            </td>
                        </tr>

                <?php
                        // Add the total for this ordered product to the total price for the current order
                        $total_price += $total;
                    }
                    echo '<hr>';
                    // Display the total for the last order
                    echo "<tr>
                            <td colspan='9'>
                                <p style='padding-right:20px; padding-bottom:20px; background: #F7F7F7; text-align: right; font-family: 'Montserrat', sans-serif;'>Total:<b>₱" . $total_price . "</b></p>
                                <hr>
                            </td>
                        </tr>";
                } else {
                    echo "<tr><td colspan='9'>No ordered products found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
            <tbody></tbody>
        </table>
        <br />
        <br />
        <br />
        <br />
        <br /><br /><br />
    </div>
    <?php include("../includes/foot-pages.php"); ?>
</body>

</html>