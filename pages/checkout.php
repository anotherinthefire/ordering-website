<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Checkout</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/checkout.css?<?php echo time(); ?>">
  <?php
  session_start();

  include('../config.php');


  $user_id = $_SESSION['user_id'];

  $user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
  $user_data = mysqli_fetch_assoc($user_query);

  $address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
  $address_data = mysqli_fetch_assoc($address_query);

  $address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
  $address_data = mysqli_fetch_assoc($address_query);
  //total price
  $selected_items = $_SESSION['selected_items'];
  $total_price = 0; // initialize total price variable

  // Construct the SQL query to retrieve the cart items for the user
  $sql = "SELECT c.cart_id, s.stock_id, p.prod_name, p.prod_price, c.quantity, p.prod_price*c.quantity AS subtotal
            FROM cart c
            JOIN stock s ON c.stock_id = s.stock_id
            JOIN products p ON s.prod_id = p.prod_id
            WHERE c.cart_id IN (" . implode(',', $selected_items) . ")
            AND c.user_id = " . $user_id;

  // Execute the query and store the result
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $total_price += $row['subtotal']; // add subtotal to total price
  }
  if (empty($address_data)) {
    echo "<script>alert('You didn't set any address yet')</script>";
    echo "<script>window.history.back()</script>";
    exit;
  }

  if (isset($_POST['submit'])) {
    // Get the updated values from the form
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $room = $_POST['room'];
    $company = $_POST['company'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $region = $_POST['region'];
    $contact = $_POST['contact'];
  
    // Update the user and address data with the new values
    $user_data = array(
      "email" => $email,
      "fullname" => $fullname,
      "contact" => $contact
    );
  
    $address_data = array(
      "room" => $room,
      "company" => $company,
      "house_no" => $house_no,
      "street" => $street,
      "barangay" => $barangay,
      "city" => $city,
      "province" => $province,
      "postal_code" => $postal_code,
      "region" => $region
    );
  
    // Build the SQL query
    $sql = "UPDATE user SET email = '$email', fullname = '$fullname', contact = '$contact' WHERE user_id = $user_id;";
    $sql .= "UPDATE address SET room = '$room', company = '$company', house_no = '$house_no', street = '$street', barangay = '$barangay', city = '$city', province = '$province', postal_code = '$postal_code', region = '$region' WHERE `user_id` = $user_id AND `set` = 1";
  
    // Execute the SQL query
    if (mysqli_multi_query($conn, $sql)) {
      header('Location: checkoutsummary.php');
      exit();
    } else {
      header("Location: checkout.php");
      exit();
    }
  }
?>  

</head>

<body>
  <img src="https://i.ibb.co/JdHq6XN/Black-Logo.png" class="logo">
  <form method="post" id="update_form" action="">
    <div class="container1">
      <div class="left">
        <p class="header ms-5">Contact Information</p>
        <div class="form-floating mb-3 ms-5 me-5">
          <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email" value="<?php echo $user_data["email"]; ?>" required>
          <label for="floatingInput" style="font-family:'Roboto';">Email</label>
        </div>

        <div class="form-floating mb-3 ms-5 me-5">
          <input type="text" class="form-control" id="floatingLN" placeholder="First Name" name="fullname" value="<?php echo $user_data["fullname"]; ?>" required>
          <label for="floatingInputGrid" style="font-family:'Roboto';">Full Name</label>
        </div>

        <div class="row g-3 ms-5 me-5">
          <div class="col-md-4 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingRoom" placeholder="Room" name="room" value="<?php echo $address_data["room"]; ?>">
              <label for="floatingRoom" style="font-family:'Roboto';">Room</label>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingCompany" placeholder="Company" name="company" value="<?php echo $address_data["company"]; ?>">
              <label for="floatingCompany" style="font-family:'Roboto';">Company</label>
            </div>
          </div>
        </div>

        <div class="row g-3 ms-5 me-5">
          <div class="col-md-4 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingHouseNo" placeholder="House No." name="house_no" value="<?php echo $address_data["house_no"]; ?>" required>
              <label for="floatingHouseNo" style="font-family:'Roboto';">House No.</label>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingStreet" placeholder="Street" name="street" value="<?php echo $address_data["street"]; ?>" required>
              <label for="floatingStreet" style="font-family:'Roboto';">Street</label>
            </div>
          </div>
        </div>

        <div class="row g-3 ms-5 me-5">
          <div class="col-md-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingBarangay" placeholder="Barangay" name="barangay" value="<?php echo $address_data["barangay"]; ?>" required>
              <label for="floatingBarangay" style="font-family:'Roboto';">Barangay</label>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingCity" placeholder="City" name="city" value="<?php echo $address_data["city"]; ?>" required>
              <label for="floatingCity" style="font-family:'Roboto';">City</label>
            </div>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-6 mb-3 ms-5 me-0">
            <div class="form-floating">

              <input type="city" class="form-control" id="floatingFN" placeholder="Province" name="province" value="<?php echo $address_data["province"]; ?>" required>
              <label for="floatingInputGrid" style="font-family:'Roboto';">Province</label>
            </div>
          </div>
          <div class="col-md mb-3 ms-0 me-5">
            <div class="form-floating">
              <input type="postalcode" class="form-control" id="floatingLN" placeholder="Postal Code" name="postal_code" value="<?php echo $address_data["postal_code"]; ?>" required>
              <label for="floatingInputGrid" style="font-family:'Roboto';">Postal code</label>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3 ms-5 me-5">
          <input type="region" class="form-control" id="floatingRegion" placeholder="Region" name="region" value="<?php echo $address_data["region"]; ?>" required>
          <label for="floatingRegion" style="font-family:'Roboto';">Region</label>
        </div>

        <div class="form-floating mb-3 ms-5 me-5">
          <input type="Phone" class="form-control" id="floatingPhone" placeholder="Phone" name="contact" value="<?php echo $user_data["contact"]; ?>" required>
          <label for="floatingPhone" style="font-family:'Roboto';">Phone</label>
        </div>
  </form>
  <div class="return">
    <a href="cart.php">&lt; Return to Cart</a>
  </div>

  <div class="policies">
    <a style="text-decoration: none; color: black;" data-toggle="modal" data-target="#refundPolicyModal">
      <p>Refund Policy</p>
    </a>
    <a style="text-decoration: none; color: black;" data-toggle="modal" data-target="#privacyPolicyModal">
      <p>Privacy policy</p>
    </a>
    <a style="text-decoration: none; color: black;" data-toggle="modal" data-target="#termsAndConditionsModal">
      <p>Terms and Conditions</p>
    </a>

    <!-- Modal -->

    <div class="modal fade" id="refundPolicyModal" tabindex="-1" role="dialog" aria-labelledby="refundPolicyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?php include('refundpolicy.php'); ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?php include('privacycheckout.php'); ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsAndConditionsModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?php include('termsncocheckout.php'); ?>
        </div>
      </div>
    </div>
  </div>

  </div>

  <?php
  // Check if the selected_items session variable is set
  if (isset($_SESSION['selected_items'])) {
    $selected_items = $_SESSION['selected_items'];
    $total_price = 0; // initialize total price variable

    // Construct the SQL query to retrieve the cart items for the user
    $sql = "SELECT c.cart_id, s.stock_id, p.prod_name, p.prod_price, c.quantity, p.prod_price*c.quantity AS subtotal, 
              color.color, size.size, p.prod_img
              FROM cart c
              JOIN stock s ON c.stock_id = s.stock_id
              JOIN products p ON s.prod_id = p.prod_id
              JOIN color ON s.color_id = color.color_id
              JOIN size ON s.size_id = size.size_id
              WHERE c.cart_id IN (" . implode(',', $selected_items) . ")
              AND c.user_id = " . $user_id;

    echo '<div class="right">';
    echo '<p style="font-size: 28px;">Order Summary</p>';

    // Execute the query and store the result
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<table style="width: 100%;">';
      echo '<tbody>';
      echo '<tr style="border-top-width: 3px; border-bottom-width: 3px; border-color:black;">';
      echo '<td><br>';
      echo '<p style="float: left; padding: 0 20px 20px 0;"><img src="../../product_images/' . $row['prod_img'] . '" alt="Italian Trulli" width="150px;"></p><br><b>' . $row['prod_name'] . '</b>';
      echo '<p>' . $row['size'] . ',' . $row['color'] . '</p>';
      echo '<p>P' . $row['subtotal'] . '</p>';
      echo '</td>
                <td></td>';
      echo '<td><span class="plus">x' . $row['quantity'] . '</span></td>';
      echo '</tr>
            </tbody>
          </table>';
      $total_price += $row['subtotal']; // add subtotal to total price          
    }

    echo '<div class="total">
            <p><b>Total:</b>P' . $total_price . '</p> <br><br>
          </div>';
  } else {
    // Display an error message if the selected_items variable is not set in the session
    echo '<h1>Error</h1>';
    echo '<p>No items were selected for checkout.</p>';
  }
  echo '<div class="continue">
    <input type="submit" form="update_form" name="submit" class="btn btn-light" value="Continue to shipping"></input>
      </div>';
  ?>

  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>