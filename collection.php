<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@900&display=swap');

    .container {
      position: relative;
      height: 30vh;
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
      /* filter: blur(2px) brightness(50%);f */
      filter: brightness(50%);
    }


    /* img:hover{
    filter: blur(0px) brightness(50%);
} */

    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: 'Montserrat Alternates';
      font-style: normal;
      font-size: 50px;
      font-weight: 400;
      color: white;
    }

    .title {
      margin-left: auto;
      margin-right: auto;
      width: 30%;
      text-align: center;
      padding-top:5%;
      font-family: 'Montserrat Alternates';
    }
  </style>
</head>

<body>
  <?php include("includes/nav.php"); ?>

  <h1 class="title"><b>COLELELECTIONS</b></h1>
  <?php

  echo '<div class="container">';
  echo '<a href="allproducts.php" class="btn btn-primary">
  <img src="images/adsss.png" class="cat-bg" alt="allproducts">
  <div class="centered"><h5>All Products</h5></div>
  </a>';
  echo '</div>';

  require_once "config.php";

  $sql = "SELECT * FROM category";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $category_id = $row['category_id'];
    $category_name = $row['category'];

    $sql = "SELECT prod_img FROM products WHERE prod_id IN (SELECT prod_id FROM stock WHERE category_id = $category_id) ORDER BY prod_id DESC LIMIT 1";
    $result2 = mysqli_query($conn, $sql);

    if ($result2 && mysqli_num_rows($result2) > 0) {
      $row2 = mysqli_fetch_assoc($result2);
      $prod_img = $row2['prod_img'];
    } else {
      $prod_img = ""; //ERROR
    }

    echo '<div class="container">';
    echo '<a href="products.php?cat_id=' . $category_id . '" class="btn btn-primary">
    <img src="' . $prod_img . '" class="cat-bg" alt="' . $category_name . '">
    <div class="centered"><h5>' . $category_name . '</h5></div>
    </a>';
    echo '</div>';
  }
  ?>
  <?php include("includes/footer.html"); ?>
</body>

</html>