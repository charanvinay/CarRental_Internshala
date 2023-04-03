<?php

session_start();
if (isset($_SESSION['agency_email'])) {
  header('location:../Dashboard/index.php');
  die();
}

?>

<html>

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
  <script type='text/javascript' src='../../../scripts/loginValidate.js'></script>
</head>

<body>
  <div class="m-4">
    <b class=""><a class="text-primary" href="../../Customer/Dashboard/index.php" style="color:primary">< Home </a></b>
  </div>
  <div class="d-flex flex-wrap justify-content-around align-items-center" style="height:80%">
    <!-- Login -->
    <div class="border custom-card mx-4" style="background-color:#fff; width: 400px;">
      <div class="d-flex">
        <div class="p-3 text-center w-50 custom-bg-grey" style="cursor:pointer;"><a href="../../Customer/Login/customerLogin.php" class="text-primary" style="text-decoration:none">Customer</a></div>
        <div class="p-3 text-center w-50"><b class="text-primary">Agency</b></div>
      </div>
      <div class="p-4">
        <h4 class="text-center mb-4 mt-2">Login</h4>
        <form method="post" action="agencyBackend.php" onsubmit="!validate() ? event.preventDefault():''" name="form" autocomplete="off">
          <!-- email -->
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Enter your email">
          </div>
          <!-- password -->
          <div class="form-group">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Enter your password">
          </div>
          <a href="../ForgotPassword/forgetPasswordAgency.php" class="text-primary d-flex ">Forget Password?</a>
          <?php
          if (isset($_SESSION['warning'])) {
            echo ' <small class="text-danger mt-1" id="warn">' . $_SESSION['warning'] . '</small>';
            unset($_SESSION['warning']);
          }
          if (isset($_SESSION['success'])) {
            echo '<small class="text-success mt-1" id="warn">' . $_SESSION['success'] . '</small>';
            unset($_SESSION['success']);
          }
          ?>
          <small class="text-danger mt-1" id='warn'></small>
          <button type="submit" class="btn btn-primary mt-3" style="width:100%">Sign in</button>
        </form>
        <p class="text-center">Did't have an account? <a href="../../../register.php" class="text-primary">Sign Up</a>
      </div>
    </div>
  </div>

</body>

</html>