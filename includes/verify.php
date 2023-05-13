<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify Account</title>
    
    <style>
      body {
	 padding: 4rem;
	 text-align: center;
     background-color: #e0ebf6;
}
 h1 {
	 font-family: "Google Sans", Roboto, Arial, sans-serif;
	 font-weight: 400;
	 margin: 0 0 2rem;
}
 .wrapper {
	 width: 100%;
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
}
 button {
	 margin: 2rem 0 0;
	 height: 40px;
	 width: 180px;
	 border-radius: 4px;
	 background: none;
	 font-size: 16px;
     border-color: #404759;
     color: #404759;
}
 .checkmark {
	 width: 200px;
	 height: 200px;
	 border-radius: 50%;
	 display: inline-block;
	 margin: 0;
	 box-shadow: inset 0 0 0 #5876CE;
}
 .checkmark__circle {
	 stroke: none;
	 fill: none;
}
 .checkmark__check {
	 transform-origin: 50% 50%;
	 fill: none;
	 stroke-dasharray: 110;
	 stroke-dashoffset: -110;
	 stroke-width: 0;
	 stroke: #fff;
	 stroke-linecap: round;
	 stroke-linejoin: round;
}
 .spinner-wrapper {
	 position: relative;
	 height: 200px;
	 width: 200px;
}
 .spinner-wrapper.loaded .spinner {
	 border-color: #5876CE;
}
 .spinner-wrapper.loaded .checkmark {
	 animation: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 50ms forwards, scale 200ms cubic-bezier(0.4, 0, 0.2, 1) 300ms both;
}
 .spinner-wrapper.loaded .checkmark__check {
	 animation: stroke 300ms cubic-bezier(0.4, 0, 0.2, 1) 200ms forwards;
}
 .spinner {
	 position: absolute;
	 top: 0;
	 left: 0;
	 z-index: -1;
	 border-radius: 50%;
	 width: 190px;
	 height: 190px;
	 border: 2px solid #dcdee1;
	 border-left: 2px solid #5876CE;
	 animation: e 1.3s infinite linear;
	 transform-origin: center;
	 transform: translateZ(0);
	 transition: border 50ms cubic-bezier(0.4, 0, 0.2, 1);
}
 @keyframes e {
	 0% {
		 transform: rotate(0deg);
	}
	 to {
		 transform: rotate(1turn);
	}
}
 @keyframes stroke {
	 0% {
		 stroke-width: 1.5px;
		 stroke-dashoffset: 110;
	}
	 100% {
		 stroke-width: 1.5px;
		 stroke-dashoffset: 0;
	}
}
 @keyframes scale {
	 0%, 100% {
		 transform: none;
	}
	 50% {
		 transform: scale3d(1.1, 1.1, 1);
	}
}
 @keyframes fill {
	 100% {
		 box-shadow: inset 0 0 0 100px #5876CE;
	}
}
 
    </style>
	<?php

include('../config.php');
$email = $_SESSION['email'];

// Query the database to check if the email exists
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

// Check if the email exists in the database
if (mysqli_num_rows($result) == 0) {
  echo "Invalid email address.";
  exit;
}

// Check if the reset token and email are set in the session
if (!isset($_SESSION['reset_token']) || !isset($_SESSION['email'])) {
  echo "Invalid password reset request.";
  exit;
}

if(isset($_POST['finalverify'])) {
  // Get the new password from the form
    // Update the user's password in the database
    $sql = "UPDATE user SET status = 1 WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Password reset successful
        $success = "You are now verified.";
        header('Location: ../pages/profile.php');
        exit;
    } else {
        // Password reset failed
        $error = "Error resetting password: " . mysqli_error($conn);
    }

    // Clear the reset token and email from the session
    unset($_SESSION['reset_token']);
    unset($_SESSION['email']);
  }

?>
  </head>
  <body>
<!--<h1>Animated circle loader with checkmark completed state</h1>
<div class="spinner-v2" id="spinner">
  <div class="checkmark-v2"></div>
</div>-->
<form action="" method="post">
<div class="wrapper">
    <div class="spinner-wrapper" id="wrapper">
      <div class="spinner"></div>
      <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0      0 24 24" >
        <circle class="checkmark__circle" cx="12" cy="12" r="12"></circle>
        <polyline class="checkmark__check" points="5.33333333 12.1666667 10 16.8333333 18.6666667 8.16666667"></polyline>
      </svg>
    </div>
    <button type="submit" name="finalverify" id="verify-btn" onclick="myFunction()">Verify Account</button>
    <p id="status" style="display:none; font-size: large; font-family:Verdana, Geneva, Tahoma, sans-serif;">Successful<a href="../"></a></p>
  </div>
  </form>
  <script>
    function myFunction() {
      var element = document.getElementById("wrapper");
      element.classList.toggle("loaded");
      document.getElementById("status").style.display = "block";
      document.getElementById("verify-btn").style.display = "none";
    //   document.forms[0].submit();
    }
  </script>

  
  
  </body>
</html>
