<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./assets/css/collection.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <h1 class="title"><b>COLELELECTIONS</b></h1>
  <div class="container">
    <a href="allproducts.php" class="btn btn-primary">
      <img src="images/adsss.png" class="cat-bg" alt="allproducts" />
      <div class="centered">
        <h5>All Products</h5>
      </div>
    </a>
  </div>

  <?php
  require_once "../config.php";
  require_once "../actions/categories.php";
  ?>
</body>

</html>