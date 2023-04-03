<?php
session_start();
if (isset($_SESSION['agency_email'])) {
  header('location:../../../index.php');
  die();
}
?>

<html>

<head>
  <title>Forget Password Agency</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
  <script type='text/javascript' src='../../../scripts/forgetPassword.js'></script>
</head>

<body>
  <div class="m-4">
    <b><a href="../../Customer/Dashboard/index.php" class="text-primary">< Home </a></b>
  </div>

  <div class="d-flex justify-content-around align-items-center">
    <!-- Login -->
    <div class="border custom-card mx-4" style="background-color:#fff; width: 400px; margin-bottom: 40px">
      <div class="p-4">
        <h4 class="text-center mb-4 mt-2">Agency Forget Password</h4>
        <form name="form" method="post" onsubmit="return forgetPasswordValidate()" action="forgetPasswordAgencyBackend.php" autocomplete="off">
          <!-- email -->
          <div class="form-group">
            <label for="inputEmail4">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your registered email">
          </div>
          <!-- security -->
          <div class="form-group">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Security Question you've choosen</label>
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
            <input type="text" class="form-control" name="securityvalue" id="yourAnswer" placeholder="Your Answer">
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
          <?php
          if (isset($_SESSION['warning'])) {
            echo ' <small class="text-danger mt-1">' . $_SESSION['warning'] . '</small>';
            unset($_SESSION['warning']);
          }
          ?>
          <small class="text-danger my-1" id='warn'></small>
          <button type="submit" class="btn btn-primary mt-2" style="width:100%">Submit</button>
        </form>
        <p class="text-center">Go back to Login?  <a href="../../Agency/Login/agencyLogin.php" class="text-primary">Sign In</a>
        <p class="text-center">Did't have an account? <a href="../../../register.php" class="text-primary">Sign Up</a>
      </div>
    </div>
  </div>

</body>

</html>