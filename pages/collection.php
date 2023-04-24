<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/collection.css">
</head>

<body>
<?php include("../includes/nav-pages.php"); ?>
  <header>
    <div class="image-header">
      <img id="header-img" src="../images/all-products.jpg" alt="header">
      <div class="centertext">COLLECTIONS</div>
    </div>
  </header>

  <div class="container">
    <a href="allproducts.php" class="btn btn-primary">
      <img src="../images/all-products.jpg" class="cat-bg" alt="allproducts" />
      <div class="centered">
        <h5>All Products</h5>
      </div>
    </a>
  </div>
  <?php require_once "../actions/categories.php"; ?>
  </div>
</body>

</html>