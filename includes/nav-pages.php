<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    include('../config.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../includes/styles/nav.css?<?php echo time(); ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/login.css?<?php echo time(); ?>" />
</head>

<body>
    <div class="nav-bar">
        <img src="https://i.ibb.co/CWgyD5n/axegg-removebg-preview.png" class="logo" />
        <nav>
            <ul>
                <li><a class="active" href="../">Home</a></li>
                <li><a href="collection.php">Shop</a></li>
                <li><a href="sizechart.php">Size Charts</a></li>
                <li><a href="faqs.php">FAQs</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </nav>

        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
            <div class="icons">
                <a href="cart.php" class="fa-solid fa-cart-shopping fa-2x"></a>
                <div class="dropdown">
                    <button class="dropbtn">
                        <a class="fa-solid fa-user fa-2x"></a>
                    </button>
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="myorders.php">Orders</a>
                        <a href="../includes/logout.php">Log-out</a>
                    </div>
                </div>
            </div>
    </div>
<?php
        } else {

?>
    <div class="icons">
        <a class="fa-solid fa-cart-shopping fa-2x" id="myBtn1"></a>
        <!-- <a href="../includes/login.php" class="fa-solid fa-cart-shopping fa-2x"></a> -->
        <div class="dropdown">
            <button class="dropbtn">
                <a class="fa-solid fa-user fa-2x"></a>
            </button>
            <div class="dropdown-content">
                <a id="myBtn">Log-in</a>
            </div>
        </div>
    </div>
    </div>
    <div id="myModal" class="modal">
    <div class="modal-content">
      <form action="../actions/connection.php" method="post">
        <div class="card1 col-md-4 align-items-center position-absolute top-50 start-50 translate-middle">
          <div class="p-5 ms-3 mt-3 text-light">
            <span class="close">&times;</span>
            <h1 class="font-family: Poppins">Log in</h1>
            <p>Please enter your details</p>
            <?php if (isset($_GET['error_message'])) { ?>
              <div style="color:red;"><?php echo $_GET['error_message']; ?></div>
            <?php } ?>
          </div>

          <div class="form-floating mb-3 ms-5 me-5">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username_or_email" />
            <label for="floatingInput">Email or Username</label>
          </div>
          <div class="form-floating mb-3 ms-5 me-5">
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" />
            <label for="passwordInput">Password</label>
            <button type="button" id="passwordToggleBtn" onclick="togglePasswordVisibility()">Show</button>
          </div>

          <div class="text-end mx-5">
            <a href="../includes/forgot.php" class="text-light">Forgot password?</a>
          </div>

          <div class="d-grid gap-2 mb-2 ms-5 me-5 mt-3">
            <button class="btn text-light fs-5" type="submit" style="background-color: #404759">
              Sign in
            </button>
          </div>

          <div class="">
            <p class="text-light text-center">
              Don't have account?
              <a href="../includes/signup.php" style="color: #5876ce; text-decoration: none">Create new account</a>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php
        }
?>
<script src="../includes/script/nav.js">
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var btn1 = document.getElementById("myBtn1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    btn1.onclick = function() {
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        var passwordToggleBtn = document.getElementById("passwordToggleBtn");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleBtn.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            passwordToggleBtn.textContent = "Show";
        }
    }
</script>
</body>

</html>