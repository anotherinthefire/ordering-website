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
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile Card Design</title>
      <link rel="stylesheet" href="../assets/css/profile.css?v=<?php echo time(); ?>">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
      <?php include("../includes/nav-pages.php"); ?>
      <div class="container">
        <div class="profile-box">
          <div class="User">
            <h3><b><?php echo $user['fullname'] . ' (' . $user['username'] . ')'; ?></b></h3>
          </div>
          <!-- <p>Username: <b><?php echo $user['username']; ?></b></p>--><br>
          <div class="info">
            <p>Mobile: <b><?php echo $user['contact']; ?></b><br>
              Shipping Address: <b>Blk.2 Lot 10Covenant Vill. Brgy.Bagong Silangan, Q.C., Philippines</b><br>
            <p><a href="">+ Add New Shipping Address</a></p>
            Email: <b><?php echo $user['email']; ?></b><br>
            Password: <b>*******************</b></p>
            <div class="press">
              <button id="myBtn">
                Update Profile
              </button>
              <div id="myModal" class="modal btn-info">

                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <h2>Add Address</h2>

                  <form action="insert_address.php" method="post">
                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" required><br>
                    <label for="company">Company:</label><br>
                    <input type="text" id="company" name="company"><br>
                    <label for="room">Room:</label><br>
                    <input type="text" id="room" name="room"><br>
                    <label for="post_code">Post Code:</label><br>
                    <input type="text" id="post_code" name="post_code" required><br>
                    <label for="city">City:</label><br>
                    <input type="text" id="city" name="city" required><br>
                    <label for="region">Region:</label><br>
                    <input type="text" id="region" name="region" required><br>
                    <input type="submit" value="Submit">
                  </form>
                </div>
              </div><br>
              <div class="press">
                <button type="button" class="">
                  View Orders
                </button>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          // Get the modal
          var modal = document.getElementById("myModal");

          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks the button, open the modal 
          btn.onclick = function() {
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
        </script>
    </body>

    </html>
<?php
  }
}
?>