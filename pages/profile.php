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
  $sql_user = "SELECT * FROM user WHERE user_id = :user_id";
  $stmt_user = $pdo->prepare($sql_user);
  $stmt_user->execute(array(':user_id' => $user_id));
  $user = $stmt_user->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Query to select the address information for the user with set=1
    $sql = "SELECT * FROM address WHERE user_id = :user_id AND `set` = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id));
    $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php if (!empty($addresses)) { ?>
              <p>Mobile: <b><?php echo $user['contact']; ?></b><br>
                Shipping Address:</p>
              <ul>
                <?php foreach ($addresses as $address) { ?>
                  <li><?php echo $address['label']; ?>: <?php echo $address['house_no'] . ' ' . $address['street'] . ', ' . $address['barangay'] . ', ' . $address['city'] . ', ' . $address['province'] . ', ' . $address['postal_code']; ?></li>
                <?php } ?>
              </ul>
            <?php } else { ?>
              <p>You have no shipping addresses.</p>
            <?php } ?>
            <p><a href="add-address.php">+ Add New Shipping Address</a></p>
            Email: <b><?php echo $user['email']; ?></b><br>
            Password: <b>*******************</b></p>
            <div class="press">
              <button type="button" class="">
                edit profile
              </button>
            </div>
            <div class="press">
              <button type="button" class="">
                <a href="myorders.php">View Orders</a>
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