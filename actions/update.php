<?php
try {
    include('../config.php');
}
catch (Exception $e) {
    include('../config.php');
}

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['plus'])) {
        $cart_id = $_POST['cart_id'];
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
        header("location: ../pages/cart.php");
    }
    if (isset($_POST['minus'])) {
        $cart_id = $_POST['cart_id'];
        $sql = "UPDATE cart SET quantity = quantity - 1 WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
        
        // check if quantity is zero and delete the product from cart
        $sql = "SELECT quantity FROM cart WHERE cart_id = $cart_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] == 0) {
            $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
            mysqli_query($conn, $sql);
        }
        
        header("location: ../pages/cart.php");
    }
    if (isset($_POST['delete'])) {
        $cart_id = $_POST['cart_id'];
        $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
        header("location: ../pages/cart.php");
    }
}
