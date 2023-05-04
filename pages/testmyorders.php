<!DOCTYPE html>
<html>

<head>
    <title>Ordered Products</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Order ID</th>
                <th>Quantity</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Size</th>
                <th>Color</th>
                <th>Product Description</th>
                <th>Product Image</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            // Replace {user_id} with the actual value of the user id session
            $user_id = $_SESSION['user_id'];
            include '../config.php';

            // SQL statement to retrieve ordered products and their details
            $sql = "SELECT op.oprod_id, op.ord_id, op.quantity, p.prod_name, p.prod_price, c.color, s.size, p.prod_desc, p.prod_img, o.status
                    FROM ordered_products op
                    INNER JOIN stock stk ON op.stock_id = stk.stock_id
                    INNER JOIN products p ON stk.prod_id = p.prod_id
                    INNER JOIN orders o ON op.ord_id = o.ord_id
                    INNER JOIN color c ON stk.color_id = c.color_id
                    INNER JOIN size s ON stk.size_id = s.size_id
                    WHERE o.user_id = $user_id 
                    AND o.status = 1
                    ORDER BY op.ord_id DESC";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $current_order_id = null;
                $total_price = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($current_order_id != $row['ord_id']) {
                        if ($current_order_id !== null) {
                            ?>
                            <tr>
                                <td colspan='11'><strong>Total for Order #<?php echo $current_order_id; ?>:</strong></td>
                                <td><?php echo $total_price; ?></td>
                            </tr>
                        <?php
                        } ?>
                        <tr>
                            <td colspan='11'><strong>Order # <?php echo $row['ord_id']; ?></strong></td>
                        </tr>
                    <?php
                        $current_order_id = $row['ord_id'];
                        $total_price = 0;
                    }
                    ?>
                    <tr>
                        <td><?php echo $row["oprod_id"]; ?></td>
                        <td><?php echo $row["ord_id"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["prod_name"]; ?></td>
                        <td><?php echo $row["prod_price"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["size"]; ?></td>
                        <td><?php echo $row["prod_desc"]; ?></td>
                        <td><img src='../../product_images/<?php echo $row["prod_img"]; ?>' width='50'></td>
                        <?php
                        $total = $row['quantity'] * $row['prod_price'];
                        ?>
                        <td><?php echo $total; ?></td>

                    </tr>
            <?php
                    // Add the total for this ordered product to the total price for the current order
                    $total_price += $total;
                }
                // Display the total for the last order
                echo "<tr><td colspan='9'><strong>Total for Order #" . $current_order_id . ":</strong></td><td>" . $total_price . "</td></tr>";
            } else {
                echo "<tr><td colspan='9'>No ordered products found.</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>



        </tbody>
    </table>
</body>

</html>