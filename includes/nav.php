<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="includes/styles/nav.css" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="nav-bar">
    <img src="https://i.ibb.co/CWgyD5n/axegg-removebg-preview.png" class="logo" />
    <nav>
      <ul>
        <li><a class="active" href="pages/index.php">Home</a></li>
        <li><a href="pages/collection.php">Shop</a></li>
        <li><a href="pages/sizechart.php">Size Charts</a></li>
        <li><a href="pages/faqs.php">FAQs</a></li>
        <li><a href="pages/aboutus.php">About Us</a></li>
      </ul>
    </nav>
    <div class="icons">
    <?php
             if(isset($_SESSION['user_id'])){
                 echo '<a href="pages/cart.php" class="fa-solid fa-cart-shopping fa-2x"></a> ';
             }else{
                 echo '<a href="includes/login.php" class="fa-solid fa-cart-shopping fa-2x"></a>';
             }
         ?>
    
      <?php if (isset($_SESSION['user_id'])) { ?>
          
        <a href="pages/profile.php" class="fa-solid fa-user fa-2x"></a>
      <?php } else { ?>
        <a href="includes/login.php" class="fa-solid fa-user fa-2x"></a>
      <?php } ?>
    </div>
  </div>
  <script src="includes/script/nav.js"></script>
</body>
</html>
