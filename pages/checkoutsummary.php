<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Order Summary</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/checkoutsummary.css">
  <?php
  session_start();

  include('../config.php');

  $user_id = $_SESSION['user_id'];

  $user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
  $user_data = mysqli_fetch_assoc($user_query);

  $address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
  $address_data = mysqli_fetch_assoc($address_query);

  $user_query = mysqli_query($conn, "SELECT email FROM user WHERE user_id = '$user_id'");
  $user_dataa = mysqli_fetch_assoc($user_query);
//phpmailer here
$email = $user_dataa['email'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
if (isset($_POST["submit_order"])) {
  //smtp here

    $full_name = $user_data["fullname"];
    $contact = $user_data["contact"];
    $mod_ = "LBC";
    $mop = $_POST["mop"];
    $note = $_POST["note"];

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

    // Insert order data into orders table
    $insert_order_query = "INSERT INTO orders (user_id, add_id, full_name, contact, mod_, mop, total, note) 
                       VALUES ('$user_id', '" . $address_data["add_id"] . "', '$full_name', '$contact', '$mod_', '$mop', '$total_price'+150 ,'$note')";


    if (mysqli_query($conn, $insert_order_query)) {
      $ord_id = mysqli_insert_id($conn); // Get the order ID

      // Insert cart items into ordered_products table
      if (isset($_SESSION['selected_items'])) {
        $selected_items = $_SESSION['selected_items'];

        foreach ($selected_items as $cart_id) {
          $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE cart_id = '$cart_id' AND user_id = '$user_id'");
          $cart_data = mysqli_fetch_assoc($cart_query);

          $stock_id = $cart_data["stock_id"];
          $quantity = $cart_data["quantity"];

          $insert_ordered_products_query = "INSERT INTO ordered_products (ord_id, stock_id, quantity) VALUES ('$ord_id', '$stock_id', '$quantity')";
          mysqli_query($conn, $insert_ordered_products_query);
        }

        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");

        unset($_SESSION['selected_items']);

        header("Location: ../includes/success-order.php");
        exit();
      } else {
        echo "Error: No items were selected for checkout.";
      }
    } else {
      echo "Error: " . $insert_order_query . "<br>" . mysqli_error($conn);
    }
  }

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
  ?>
</head>

<body>
  <img src="https://i.ibb.co/JdHq6XN/Black-Logo.png" class="logo">
  <form method="post">
    <div class="container1">
      <div class="left">
        <p class="header ms-5">Contact Information</p>
        <div class="info-card">
          <div class="content1">
            <p style="color:979797; width: 3%">Contact
            <p>
            <p><?php echo $user_data["contact"]; ?>
            <p>
              <a href="checkout.php">Change</a>
          </div>
          <hr>
          <div class="content2">
            <p style="color:979797; width: 50%;">Ship to
            <p>
            <p><?php echo $address_data["room"]; ?> <?php echo $address_data["company"]; ?> <?php echo $address_data["house_no"]; ?> <?php echo $address_data["street"]; ?>, <?php echo $address_data["barangay"]; ?>, <?php echo $address_data["city"]; ?>, <?php echo $address_data["province"]; ?>, <?php echo $address_data["postal_code"]; ?>, <?php echo $address_data["region"]; ?>
            <p>
              <a href="checkout.php">Change</a>
          </div>
        </div>
        <br>
        <p class="header ms-5">Shipping Method</p>
        <div class="ship-card">
          <p class="ms-5"> Standard Delivery</p>
          <p class="ms-5">₱150</p>
        </div>
        <div class="mb3 ms-5 me-5">
          <label for="note" class="form-label" style="font-family:'Roboto';font-weight: bold;">Note</label>
          <textarea class="form-control" id="notes" name="note" rows="5" oninput="countCharacters()"></textarea>
          <div id="char-count"></div>
        </div>
        <div class="return">
          <a href="checkout.php">&lt; Return to Information</a>
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
          echo '</tr>';
          $total_price += $row['subtotal'];
          $final_price = $total_price + 150;
          // add subtotal to total price         
        }

      ?>

        <td>
          <br>
          <b>Select Payment Method </b><br>
          <br><select name="mop" id="mop">
            <option value="Maya">Maya</option>
            <option value="Gcash">Gcash</option>
            <option value="BankTransfer">Bank Transfer</option>
          </select>
          <br> <br>
        </td>
        </tr>
        <tr style="border-top-width: 3px; border-bottom-width: 3px; border-color:black;">
        </tr>
        </tbody>
        </table>

        <div class="total">
          <div class="t-left">
            <p>Subtotal:</p>
            <p>Shipping:</p>
            <p><b>Total</b></p>
          </div>
        <?php
        echo '<div class="t-right">';
        echo '<p>P' . $total_price . '</p>';
        echo '<p>P150.00</p>';
        echo '<p><b>P' . $final_price . '</b></p>';
        echo '</div>';
        echo '</div>';
      } else {
        // Display an error message if the selected_items variable is not set in the session
        echo '<h1>Error</h1>';
        echo '<p>No items were selected for checkout.</p>';
      }
        ?>
        <div class="continue">
          <input type="submit" name="submit_order" value="Submit Order" class="btn btn-light"></input>
        </div>

        </div>

  </form>
  <!-- https://codepen.io/vikram_e22/pen/BQNaBB
https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=elegant-success-modal -->
  <script>
    function countCharacters() {
      var message = document.getElementById("notes").value;
      var count = message.length;
      var charCount = document.getElementById("char-count");
      charCount.innerHTML = count + "/500";

      if (count > 500) {
        charCount.style.color = "red";
        document.getElementById("notes").value = message.slice(0, 500);
      } else {
        charCount.style.color = "black";
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>