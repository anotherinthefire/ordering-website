<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AXGG | Signup</title>
  <link rel="shortcut icon" href="https://i.ibb.co/wRBNcCd/axegg-1.png" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/signup.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
  <div class="back1">
  <img src="https://i.ibb.co/CWgyD5n/axegg-removebg-preview.png" style="height:50%; width:30%" />
  </div>

  <div class="box col-md-4 align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="p-3 ms-5 mt-5 text-light">
      <h1>Sign up</h1>
      <p>Please enter your details</p>
    </div>

    <div class="form-floating mb-3 ms-5 me-5">
      <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required />
      <label for="floatingInput">Email<label class="text-danger">*</label></label>
    </div>

    <div class="form-floating mb-3 ms-5 me-5">
      <input type="text" class="form-control" id="floatingUser" placeholder="name@example.com" required />
      <label for="floatingInput">Username<label class="text-danger">*</label></label>
    </div>

    <div class="form-floating mb-3 ms-5 me-5">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required />
      <label for="floatingPassword">Password<label class="text-danger">*</label></label>
    </div>

    <div class="row g-3">
      <div class="col-md-6 mb-3 ms-5 me-0">
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingLN" placeholder="name@example.com" required />
          <label for="floatingInputGrid">First Name<label class="text-danger">*</label></label>
        </div>
      </div>
      <div class="col-md mb-3 ms-0 me-5">
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingFN" placeholder="name@example.com" required />
          <label for="floatingInputGrid">Last Name<label class="text-danger">*</label></label>
        </div>
      </div>
    </div>

    <div class="form-floating mb-3 ms-5 me-5">
      <input type="text" class="form-control" id="floatingContact" placeholder="Contact" required />
      <label for="floatingPassword">Contact#<label class="text-danger">*</label></label>
    </div>

    <div class="d-grid gap-2 mb-3 col-10 mx-auto">
      <button class="btn text-light fw-bold fs-5" type="submit" style="background-color: #5876ce">
        Sign Up
      </button>
    </div>

    <div class="col-12">
      <div class="form-check text-light">
        <input class="form-check-input ms-5" type="checkbox" value="" id="invalidCheck" required />
        <label class="form-check-label ms-2 for=" invalidCheck>
          Agree to terms and conditions
        </label>
      </div>
    </div>
  </div>
</body>

</html>