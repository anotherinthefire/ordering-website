<?php
try {
  include('../config.php');
}
//catch exception
catch (Exception $e) {
  include('../config.php');
}



//Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($_POST['verify'])) {

  //php mailer here
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
      <title>Anime X Gaming Guild &#x2223; Profile</title>
      <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
      <link rel="stylesheet" href="profile.css">
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap');

        body {
          margin: 0;
          padding: 0;
          box-sizing: border-box;

        }

        .info p {
          font-family: 'Montserrat Alternates';
          text-align: justify;
          font-weight: 700;
        }

        /* modal insert new */
        .container {
          width: 100%;
          height: 120vh;
          align-items: center;
          justify-content: center;
          font-size: 23px;
          display: flex;
        }

        .profile-box {
          background: #F6F6F6;
          padding: 100px 80px;
          width: 700px;
          height: 700px;
          font-family: 'Montserrat Alternates';
          align-self: center;
        }

        .row {
          font-family: 'Roboto';
          width: 50%;
          padding: 15px;
          height: 300px;
        }

        .buttons {
          padding-top: 4%;
        }

        .press {
          text-align: center;
          font-family: 'Roboto';
          font-weight: bold;
          background-size: 10px;
          text-decoration-color: black;
          margin-left: 1%;
        }

        .press button {
          width: 40.3%;
          background-color: #5876CE;
          border: none;
          border-radius: 0;
          font-size: 16px;
          padding: 10px;
        }

        .press button:hover {
          width: 40.3%;
          background-color: #404759;
          border: none;

        }

        .address {
          color: #1e1e1e;
          text-decoration: none;
          font-family: 'Roboto';
          font-weight: lighter;
        }

        .address:hover {
          text-decoration: underline;
        }

        .modal1 {
          display: none;
          /* Hidden by default */
          position: fixed;
          /* Stay in place */
          z-index: 1;
          /* Sit on top */
          padding-top: 100px;
          /* Location of the box */
          left: 0;
          top: 0;
          width: 100%;
          /* Full width */
          height: 100%;
          /* Full height */
          overflow: auto;
          /* Enable scroll if needed */
          background-color: rgb(0, 0, 0);
          /* Fallback color */
          background-color: rgba(0, 0, 0, 0.4);
          /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 40%;
        }

        /* The Close Button */
        .close1 {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close1:hover,
        .close1:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
      </style>

    </head>

    <body>
      <?php


      include '../includes/nav-pages.php';

      ?>
      <div class="container">
        <div class="profile-box">
          <div class="User">
            <h3><b>
                <?php echo $user['fullname'] . ' (' . $user['username'] . ')'; ?>
              </b></h3>
          </div>
          <!-- <p>Username: <b><?php echo $user['username']; ?></b></p>--><br>
          <div class="info">
            <?php if (!empty($addresses)) { ?>
              <p><span style="font-family:'Roboto';font-weight: lighter;">Mobile:</span> <?php echo $user['contact']; ?>
              </p>
              <p>
                <span style="font-family:'Roboto';font-weight: lighter;"> Shipping Address:</span>

                <?php foreach ($addresses as $address) { ?>

                  <?php echo $address['label']; ?>:
                  <?php echo $address['house_no'] . ' ' . $address['street'] . ', ' . $address['barangay'] . ', ' . $address['city'] . ', ' . $address['province'] . ', ' . $address['postal_code']; ?>
              </p>
            <?php } ?>
          <?php } else { ?>
            <p>You have no shipping addresses.</p>
          <?php } ?>
          <p><a href="add-address.php" class="address"> + Add New Shipping Address</a></p>


          <form method="post" action="">
            <span style="font-family:'Roboto';">Email:</span>
            <input type="text" name="email" style="background-color:transparent; border:none;;" value="<?php echo $user['email']; ?>">
            <br>
            <span style="font-family:'Roboto';">Status: </span>
            <b><?php echo $user['status'] == 1 ? 'Verified' : 'Not Verified'; ?></b>

            <div class="buttons">
              <div class="press">
                <button type="button" style="color:#fff; text-decoration:none; font-weight:bold;" id="myBtn1">EDIT PROFILE</button>
                </button>
              </div>
              <?php
              if (isset($_POST['submit'])) {
                $fullname = $_POST['fullname'];
                $user_name = $_POST['username'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $user_id = $_SESSION['user_id'];

                include('../config.php');
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $sql_check = "SELECT user_id FROM user WHERE (username='$user_name' OR email='$email') AND user_id != '$user_id'";
                $result = mysqli_query($conn, $sql_check);
                if (mysqli_num_rows($result) > 0) {
                  // The username or email is already taken
                  echo '<script>alert("Username or email is already taken"); window.location.href = "";</script>';
                  exit;
                }

                $sql = "UPDATE user SET fullname='$fullname', username='$user_name', email='$email', contact='$contact' WHERE user_id='$user_id'";
                if (mysqli_query($conn, $sql)) {
                  echo '<script>alert("User information updated successfully");window.location.href = ""; </script>';
                  exit;
                } else {
                  echo '<script>alert("There is an error in updating your information");window.location.href = ""; </script>' . mysqli_error($conn);
                  exit;
                }
              }
              ?>
              <!-- The Modal -->
              <div id="myModal1" class="modal1">
                <div class="modal-content1">
                  <!-- <span class="close1">&times;</span> -->
                  <form method="POST" action="" id="edit">
                    <h1>EDIT PROFILE </h1>
                    <div class="form-group mt-3">
                      <label for="fullname">Full Name:</label>
                      <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>

                    <div class="form-group mb-4">
                      <label for="contact">Contact Number:</label>
                      <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $user['contact']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                  </form>

                  <a href="../includes/change-pass.php"><button type="button" class="btn btn-primary ">Change Password</button></a>
                  <button class="close1 btn btn-light">Cancel</button>
                </div>
              </div>

              <br>
              <div class="press">
                <a href="myorders.php"><button type="button" style="color:#fff; text-decoration:none; font-weight:bold;">VIEW ORDERS</button></a>
              </div>
              <br>
              <?php
              // Assuming $status contains the status value
              if ($user['status'] == 1) {
              } else {
              ?>
                <div class="press">
                  <button type="submit" name="verify" style="color:#fff; text-decoration:none; font-weight:bold;">VERIFY ACCOUNT</button>
                </div>
              <?php
              }
              ?>
          </form>

          </div>
        </div>

      </div>
      </div>
      </div>
      <?php include '../includes/foot-pages.php'; ?>
      <script>
        // Get the modal
        var modal = document.getElementById("myModal1");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn1");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close1")[0];

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