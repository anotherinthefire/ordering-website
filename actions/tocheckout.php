<?php
try {
    include('../config.php');
  }
  //catch exception
  catch (Exception $e) {
    include('../config.php');
  }

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

// If the user is logged in, handle cart updates and deletions.
if (isset($_SESSION['user_id'])) {
    if (isset($_POST['plus'])) {
        // If the plus button is clicked, update the quantity of the cart item
        // and redirect to the cart page.
        $cart_id = $_POST['cart_id'];
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
        header("location: ../pages/cart.php");
        exit;
    }
    if (isset($_POST['minus'])) {
        // If the minus button is clicked, update the quantity of the cart item
        // and delete the item if the quantity becomes zero. Then redirect to the cart page.
        $cart_id = $_POST['cart_id'];
        $sql = "UPDATE cart SET quantity = quantity - 1 WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);

        $sql = "SELECT quantity FROM cart WHERE cart_id = $cart_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] == 0) {
            $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
            mysqli_query($conn, $sql);
        }

        header("location: ../pages/cart.php");
        exit;
    }

    if (isset($_POST['delete'])) {
        // If the delete button is clicked, delete the cart item and redirect to the cart page.
        $cart_id = $_POST['cart_id'];
        $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
        header("location: ../pages/cart.php");
        exit;
    }
}

// If the delete button is clicked and the user is not logged in,
// delete the cart item and redirect to the cart page.
if(isset($_POST['delete'])) {
    $cart_id = $_POST['cart_id'];
    $sql = "DELETE FROM cart WHERE cart_id = $cart_id";

    if ($conn->query($sql) === true) {
        header("location: ../pages/cart.php");
        exit;
    } else {
        echo "Error: Could not execute $sql. " . $conn->error;
        exit;
    }
}

