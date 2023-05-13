<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require '../vendor/autoload.php';
include('../config.php');
if (isset($_POST['submit'])) {

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  // Generate a unique session token
  $email = $_POST['email'];
  $token = uniqid();

  // Store the token and email address in a session variable
  $_SESSION['reset_token'] = $token;
  $_SESSION['reset_email'] = $email;

  $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 0) {
    // Email not found in database, display error message
    echo "Email not found in database";
  } else {
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'rongodfreyultra@gmail.com';                     //SMTP username
      $mail->Password   = 'mxsd sjen asbr wkit';                              //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients remove before commit
      $mail->setFrom('rongodfreyultra@gmail.com', 'AnimeXGamingGuild');
      $mail->addAddress($email);     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      $mail->addReplyTo('rongodfreyultra@gmail.com', 'AnimeXGamingGuild');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      // $mail->addAttachment('assets/mail/logo.png');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $email_subject = 'Reset Your Password';
      $mail_body = 'Click the link below to reset your password: <br>' .
        '<a href="http://localhost/overallsia/AXGG-WEB/includes/reset.php?token=' . $token . '">Reset Password</a>';


      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $email_subject;
      $mail->Body    = $mail_body;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      header('Location: reset-sent.php');
      exit;
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
  $conn->close();
} ?>
<html>

<head>
  <title>AXGG | Forgot Password</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />

  <link href="https://fonts.googlelapis.com/css?family=Poppins" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/Forgot.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style=" background:#5876CE;">
  <div class="box1 col-md-5 align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="p-4 text-center mt-5 text-dark fw-bold">
      <img src="../images/a.png" class="mb-3">
      <form method="post">
        <p class="text1 ">Forgot Password?</p>
        <p class="text2">Enter your username associated with your account</p>
    </div>

    <div class="form-floating mb-3 ms-5 me-5">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>

    <div class="box2 d-grid gap-2 mb-3 ms-5 me-5 mt-3 rounded-3 text-center">
      <button class="btn text-light fs-4 fw-bold " type="submit" name="submit">Next</button>
    </div>

    <div class="">
      <a href="../" class="text-dark text-decoration-none position-absolute bottom-0 start-0 mb-3 ms-3 fw-bold">
        << Back</a>
    </div>
    </form>


  </div>
</body>

</html>