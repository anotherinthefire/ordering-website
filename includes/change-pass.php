<html>

<head>
  <title>AXGG | Change Password</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://fonts.googlelapis.com/css?family=Poppins" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/Forgot.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  include('../config.php');

  if (count($_POST) > 0) {
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if (!empty($row)) {
      $hashedPassword = $row["password"];
      $password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);

      if (password_verify($_POST["current_password"], $hashedPassword)) {
        $sql = "UPDATE user SET password = ? WHERE user_id = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('si', $password, $user_id);
        $statement->execute();
?>
        <script>
          alert("<?php echo ('password changed succesfully'); ?>");
          window.location.href = "../pages/profile.php";
        </script>
      <?php
      } else {
        $message = "Current Password is not correct"; ?>
        <script>
          alert("<?php echo $message; ?>");
        </script>
<?php
      }
    }
  }
} else {
  header('Location: change-pass.php');
  exit;
}
?>

<body style=" background:#5876CE;">
  <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
    <div class="box1 col-md-5 align-items-center position-absolute top-50 start-50 translate-middle">
      <div class="p-4 text-center mt-5 text-dark fw-bold">
        <img src="../images/key.png" class="mb-3">

        <div class="validation-message text-center">

        </div>

        <p class="text1">Change Password</p>

      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Password">
        <label for="current_password">Old Password</label>
      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password">
        <label for="new_password">New Password</label>
      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password1">
        <label for="confirm_password">Confirm Password</label>
      </div>

      <div class="box2 d-grid gap-2 mb-3 ms-5 me-5 mt-3 rounded-3 text-center">
        <a href="../"><button class="btn  text-light fs-4 fw-bold" type="submit" name="submit">Change</button></a>
      </div>

      <div class="">
        <a href="../pages/profile.php" class="text-dark text-decoration-none position-absolute bottom-0 start-0 mb-3 ms-3 fw-bold">Back</a>
      </div>
    </div>
  </form>

  <script>
    function validatePassword() {
      var currentPassword, newPassword, confirmPassword, output = true;

      currentPassword = document.frmChange.current_password;
      newPassword = document.frmChange.new_password;
      confirmPassword = document.frmChange.confirm_password;

      if (!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
      } else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
      } else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
      }
      if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
      }
      return output;
    }
  </script>
</body>

</html>