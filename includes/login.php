<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AXGG | Login</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/login.css?php echo time();" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<?php
session_start();
include '../config.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UsernameOrEmail = $_POST['username_or_email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE (username = '$UsernameOrEmail' OR email = '$UsernameOrEmail') AND password = '$Password'";
    $result = $conn->query($sql);

    // for login
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["first_name"] = $row['first_name'];
        header('Location: ../');
        exit(); // Always include an exit after a header redirect to prevent further script execution
    } else {
        $error_message = "Invalid login credentials.";
    }
}

?>
  <div class="back1">
  <div id="content">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="card1 col-md-4 align-items-center position-absolute top-50 start-50 translate-middle">
      <div class="p-5 ms-3 mt-5 text-light">
        <h1 class="font-family: Poppins">Log in</h1>
        <p>Please enter your details</p>
        <?php if(isset($_GET['error_message'])) { ?>
		<div style="color:red;"><?php echo $_GET['error_message']; ?></div>
	<?php } ?>

      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username_or_email" />
        <label for="floatingInput">Email or Username</label>
      </div>
      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" />
        <label for="floatingPassword">Password</label>
      </div>

      <div class="text-end mx-5">
        <a href="forgot.php" class="text-light">Forgot password?</a>
      </div>

      <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
        <button class="btn text-light fs-5" type="submit" style="background-color: #404759">
          Sign in
        </button>
      </div>

      <div class="">
        <p class="text-light text-center">
          Don't have account?
          <a href="includes/signup.php" style="color: #5876ce; text-decoration: none">Create new account</a>
        </p>
      </div>
    </div>
  </form>
  </div>
  </div>
  <script>
        $(document).ready(function() {
            $("a").click(function(e) {
                e.preventDefault();
                var page = $(this).attr("href");
                if (page != '#home') {
                    $("#content").load(page);
                }
                $("a").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>