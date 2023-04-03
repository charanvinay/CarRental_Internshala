<?php
session_start();
include '../../../navbar.php';
if (!isset($_SESSION['agency_email'])) {
  header('location:../Login/agencyLogin.php');
  die();
}
?>

<html>

<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type='text/javascript' src='../../../scripts/addCarValidate.js'></script>
  <link rel="stylesheet" href="../../../css/styles.css" />
</head>

<body>
  <div class="container container d-flex justify-content-center align-items-center" style="height:90%;">
    <div class="d-flex justify-content-center mb-4">
      <div class="row border w-100" style="background-color:#fff; margin-top: 10px;">
        <div class="col-12 p-4">
          <h4 class="text-center mb-4 mt-2">Add New Car</h4>
          <form method="post" action="addCarBackend.php" name="form" onsubmit="return validate()" autocomplete="off">
            <div class="row">
              <div class="col-lg-6 col-mg-12">
                <div class="form-group">
                  <label for="inputEmail4">Vehicle Model</label>
                  <input type="text" class="form-control" name="vmodel" placeholder="Enter vehicle model">
                </div>
              </div>
              <div class="col-lg-6 col-mg-12">
                <div class="form-group">
                  <label for="inputEmail4">Vehicle Number</label>
                  <input type="text" class="form-control" name="vnumber" placeholder="Enter vehicle number">
                </div>
              </div>
              <div class="col-lg-6 col-mg-12">
                <div class="form-group">
                  <label for="inputEmail4">Vehicle Capacity</label>
                  <input type="text" class="form-control" name="vcapacity" placeholder="Enter vehicle capacity">
                </div>
              </div>
              <div class="col-lg-6 col-mg-12">
                <div class="form-group">
                  <label for="inputEmail4">Rent Per/day</label>
                  <input type="number" class="form-control" name="rent" placeholder="Enter rent per day">
                </div>
              </div>
            </div>
            <small class="text-danger mt-1" id='warn'></small>
            <div class="row mt-4">
              <div class="col">
                <a href="../Dashboard/agencyDashboard.php" class="btn btn-outline bg-light text-primary border" style="width:100%">Cancel</a>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary" style="width:100%">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>