<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .img-header {
      position: relative;
      height: 30vh;
      margin-left: auto;
      margin-right: auto;
      margin-top: 100px;
      margin-bottom: 100px;
      width: 70vw;
      overflow: hidden;
    }

    #header-img {
      object-fit: cover;
      object-position: center;
      height: 70vh;
      width: 100%;
      filter: brightness(50%);
    }

    .centertext {
      position: absolute;
      top: 38vh;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: "Montserrat Alternates";
      font-style: normal;
      font-size: 50px;
      font-weight: 400;
      color: white;
    }
  </style>
</head>

<body>


  <header>
    <div class="image-header">
      <img id="header-img" src="./images/all-products.jpg" alt="header">
      <div class="centertext">COLLECTIONS</div>
    </div>
  </header>

  <div class="container">
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