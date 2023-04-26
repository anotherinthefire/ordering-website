<?php
try {
  include('../config.php');
}
//catch exception
catch (Exception $e) {
  include('../config.php');
}

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  // Query to select user information from the database
  $sql = "SELECT * FROM user WHERE user_id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':user_id' => $user_id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Display user information in the profile
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scaled=1.0">
    <title>Profile Card Design - </title>
    <link rel="stylesheet" href="profile.css">
</head>
 <body>
 <?php
    include '../includes/nav-pages.php';
?>
    <div class="container">
    <div class="profile-box">
          <div class="User">
            <h3><b><?php echo $user['fullname'] . ' (' . $user['username'] . ')'; ?></b></h3>
          </div>
          <!-- <p>Username: <b><?php echo $user['username']; ?></b></p>--><br>
          <div class="info">
            <p>Mobile: <b><?php echo $user['contact']; ?></b><br>
              Shipping Address: <b>Blk.2 Lot 10Covenant Vill. Brgy.Bagong Silangan, Q.C., Philippines</b><br>
            <p><a href="address.php">+ Add New Shipping Address</a></p>
            Email: <b><?php echo $user['email']; ?></b><br>
            Password: <b>*******************</b></p>
            <div class="press">
            <button type="button" class="">
                  edit profile
                </button>
            </div>
              <div class="press">
                <button type="button" class="">
                  View Orders
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php include '../includes/foot-pages.php'; ?>
</body>

</html>     
<?php
  }
}
?>