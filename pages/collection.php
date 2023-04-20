<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/css/collection.css?<?php echo time(); ?>">
</head>

<body>
  <?php require_once "../config.php"; ?>

  <header>
    <div class="image-header">
      <img id="header-img" src="./images/all-products.jpg" alt="header">
      <div class="centertext">COLLECTIONS</div>
    </div>
  </header>

  <a href="./pages/allproducts.php" class="btn btn-primary">
    <img src="images/all-products.jpg" class="cat-bg" alt="allproducts" />
    <div class="centered">
      <h5>All Products</h5>
    </div>
  </a>
  </div>
  <?php require_once "../actions/categories.php"; ?>
  </div>
  <script>
    $(document).ready(function() {
      $("a").click(function(e) {
        e.preventDefault();
        var page = $(this).attr("href");
        if (page != '#home') {
          $("#content").load(page);
        }
        $("a").removeClass("active");
        $(this).addClass("active");
      });
    });
  </script>
</body>

</html>