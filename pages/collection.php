<!DOCTYPE html>
<html>

<head>
  <title>AXGG | Collections</title>
<link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/collection.css?<?php echo time(); ?>">
</head>

<body>
<?php include("../includes/nav-pages.php"); ?>
  <header>
    <div class="image-header">
      <img id="header-img" src="../images/collectionn.png" alt="header">
      <div class="centertext">COLLECTIONS</div>
    </div>
  </header>

  <div class="container">
    <a href="allproducts.php" class="bg">
      <img src="../images/all-products.jpg" class="cat-bg" alt="allproducts" />
      <div class="centered">
        <h5 style="font-size:2.7rem;">All Products</h5>
      </div>
    </a>
  </div>
  <?php require_once "../actions/categories.php"; ?>
  </div>
  <?php include("../includes/foot-pages.php"); ?>
</body>

</html>