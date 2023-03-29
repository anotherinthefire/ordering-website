<?php
    require_once "config.php";
    // Query categories from database
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $cat_id = $row['cat_id'];
      $cat_name = $row['cat_name'];

      $sql = "SELECT prod_img FROM products WHERE cat_id = $cat_id ORDER BY prod_id DESC LIMIT 1";
      $result2 = mysqli_query($conn, $sql);
      $row2 = mysqli_fetch_assoc($result2);
      $prod_img = $row2['prod_img'];

      echo '<h5>' . $cat_name . '</h5>';
      echo '<img src="images/' . $prod_img . '" class="cat-bg" alt="' . $cat_name . '" style = "height:200px;">';
      echo '<a href="products.php?cat_id=' . $cat_id . '" class="btn btn-primary">View Products</a>';

    }
    ?>

<!-- $cat_img = $row['cat_img']; // for background image variable -->
<!-- echo '<img src="'.$cat_img.'" class="cat-bg" alt="'.$cat_name.'">'; //call background image -->