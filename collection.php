<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .container {
      position: relative;
      height: 200px;
      /* or any other desired height */
      margin-left: auto;
      margin-right: auto;
      margin-top: 100px;
      margin-bottom: 100px;
      width: 70%;
    }

    .cat-bg {
      object-fit: cover;
      object-position: center;
      height: 100%;
      width: 100%;
      filter: blur(3px) brightness(50%);
    }

    /* img:hover{
    filter: blur(0px) brightness(50%);
} */

    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-style: normal;
      font-weight: 700;
      font-size: 80px;
      color: white;
    }
  </style>
</head>

<body>
  <?php include("includes/nav.php"); ?>
  <div class="image-header">
    <img id="header-img" src="https://i.ibb.co/ZKQtnfD/axgg-banner2.png" alt="header">
  </div>
  <h1><b>COLELELECTIONS</b></h1>
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

    echo '<div class="container">';

    echo '<a href="products.php?cat_id=' . $cat_id . '" class="btn btn-primary">
  <img src="images/' . $prod_img . '" class="cat-bg" alt="' . $cat_name . '">
  <div class="centered"><h5>' . $cat_name . '</h5></div>
  </a>';
    echo '</div>';
  }
  ?>
  <?php include("includes/footer.html"); ?>
</body>

</html>