

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
    function updateAddress($conn, $user_id, $address_data) {
      $sql = "UPDATE address SET 
        room = '{$address_data['room']}',
        company = '{$address_data['company']}',
        house_no = '{$address_data['house_no']}',
        street = '{$address_data['street']}',
        barangay = '{$address_data['barangay']}',
        city = '{$address_data['city']}',
        province = '{$address_data['province']}',
        postal_code = '{$address_data['postal_code']}',
        region = '{$address_data['region']}'
        WHERE user_id = '{$user_id}' AND `set` = 1";
    
      if (mysqli_query($conn, $sql)) {
          header('Location: checkoutsummary.php');
        exit();
      } else {
          header("Location: checkout.php");
          exit();
      }
    }
  $user_id = $_SESSION['user_id'];

  $user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
  $user_data = mysqli_fetch_assoc($user_query);

  $address_query = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$user_id' AND `set` = 1");
  $address_data = mysqli_fetch_assoc($address_query);


  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  
  
  //Load Composer's autoloader
  require '../vendor/autoload.php';
  if (isset($_POST["submit_order"])) {
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'dummydummy@gmail.com';                     //SMTP username
      $mail->Password   = 'test pass word test';                              //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients remove before commit
      $mail->setFrom('dummydummy@gmail.com', 'AXGG');
      $mail->addAddress('dummy.receiver@gmail.com', 'AXGG');     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      $mail->addReplyTo('dummydummygmail.com', 'AXGG');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');
  
      //Attachments
      $mail->addAttachment('../assets/mail/logo.png');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $email_subject = 'Your order has been received and is being reviewed.';
      $email_body = "Dear customer,
  
      Thank you for placing your order with us. We have received it and are currently reviewing it. 
      
      Please note that we may contact you within the next three business days to confirm your order and discuss any additional details.
      
      If you have any questions or concerns, please don't hesitate to contact us at [insert your contact information here]. We appreciate your business and look forward to serving you.
      
      Best regards,
      AXGG
      ";
  
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $email_subject;
      $mail->Body    = $email_body;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }    
  
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
        
  
  
  
        header("Location: myorders.php");
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
            <p>l<?php echo $user_data["email"]; ?>
            <p>
              <a href="">Change</a>
          </div>
          <hr>
          <div class="content2">
            <p style="color:979797; width: 50%;">Ship to
            <p>
            <p><?php echo $address_data["room"]; ?> <?php echo $address_data["company"]; ?> <?php echo $address_data["house_no"]; ?> <?php echo $address_data["street"]; ?>, <?php echo $address_data["barangay"]; ?>, <?php echo $address_data["city"]; ?>, <?php echo $address_data["province"]; ?>, <?php echo $address_data["postal_code"]; ?>, <?php echo $address_data["region"]; ?>
            <p>
              <a href="">Change</a>
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
        <a href="privacycheckout.php" style="text-decoration: none; color: black;"><p>Refund Policy</p></a>
        <a href="privacycheckout.php" style="text-decoration: none; color: black;"><p>Privacy policy</p></a>
        <a href="privacycheckout.php" style="text-decoration: none; color: black;"><p>Terms and Conditions</p></a>
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
</body>

</html>