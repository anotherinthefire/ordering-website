<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
  header("Location: ../includes/login.php");
  exit();
}
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Card Design</title>
  <link rel="stylesheet" href="./assets/css/profile.css?php echo time();">
</head>

<body>
  <div class="container">
    <div class="profile-box">
      <div class="User">
        <h3><b>Simon Riley (Ghost)</b></h3>
      </div>
      <p>Username</p><br>
      <div class="info">
        <p>Mobile: <b>01234567890</b><br>
          Shipping Address: <b>Blk.2 Lot 10Covenant Vill. Brgy.Bagong Silangan, Q.C., Philippines</b><br>
          <p><a href="">+ Add New Shipping Address</a></p>
          Email: <b>example@email.com</b><br>
          Password: <b>*******************</b></p>
        <div class="press">
          <button type="button" class="btn btn-Primary">
            Update Profile
          </button>
        </div><br>
        <div class="press">
          <button type="button" class="btn btn-Primary">
            View Orders
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
