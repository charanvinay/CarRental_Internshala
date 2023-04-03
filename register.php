<?php
session_start();
if (isset($_SESSION['agency_email']) || isset($_SESSION['custo_mail'])) {
  header('location:./pages/Customer/Dashboard/index.php');
  die();
}
?>

<html>

<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script type='text/javascript' src='scripts/regValidate.js'></script>
</head>

<body>
<div class="m-4">
    <b><a href="./pages/Customer/Dashboard/index.php" class="text-primary">< Home </a></b>
  </div>

  <div class="d-flex flex-wrap justify-content-around align-items-center">
    <!-- Login -->
    <div class="border custom-card mx-4" style="background-color:#fff; width: 400px; margin-bottom: 80px">
      <div class="p-4">
        <h4 class="text-center mb-4 mt-2">Register</h4>
        <form name="form" method="post" onsubmit="return validate()" action="registerBackend.php" autocomplete="off">
          <div class="form-row align-items-center justify-content-center">
            <!-- customer -->
            <div class="form-check mr-2">
              <input class="form-check-input" type="radio" name="type" value="customer" id="cust">
              <label class="form-check-label" for="gridRadios1">Customer </label>
            </div>
            <!-- agent -->
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type" value="agency" id="agent">
              <label class="form-check-label" for="gridRadios2">Agency </label>
            </div>
          </div>
          <!-- email -->
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
          </div>
          <!-- password -->
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter your password">
          </div>
          <!-- re password -->
          <div class="form-group">
            <label for="inputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="inputPassword1" placeholder="Re-Enter your password">
          </div>
          <!-- security -->
          <div class="form-group">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Security Question</label>
            <select class="custom-select mr-sm-2" name="secQuestion" id="inlineFormCustomSelect" required="true">
              <option selected>Choose...</option>
              <option value="Your Nickname">Your Nickname</option>
              <option value="Your Pet name">Your Pet name</option>
              <option value="Your Favourite place">Your Favourite place</option>
            </select>
          </div>
          <!-- answer -->
          <div class="form-group">
            <label for="yourAnswer">Your answer</label>
            <input type="text" class="form-control" name="securityvalue" id="yourAnswer" placeholder="Enter Your Answer">
          </div>
          <small class="text-danger" id='warn'></small>
          <button type="submit" class="btn btn-primary mt-3" style="width:100%">Register</button>
        </form>
        <p class="text-center">Already a user? <a href="./pages/Customer/Login/customerLogin.php" class="text-primary">Login</a>
      </div>
    </div>
  </div>

</body>

</html>