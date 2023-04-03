<?php
session_start();
include '../../../navbar.php';
include '../../../db_connect.php';

?>

<html>

<head>
  <title>Edit Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../../css/styles.css" />
</head>

<body>

  <?php

  $v_id = $_GET['v_id'];
  $query = mysqli_query($db, "select * from added_cars where car_id = $v_id");
  if ($query) {
    $fetch = mysqli_fetch_assoc($query);
    echo '
    <div class="container d-flex justify-content-center align-items-center" style="height:90%;">
      <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="row border w-100" style="background-color:#fff; margin-top: 10px;">
          <div class="col-12 p-4">
            <h4 class="text-center mb-4 mt-2">Edit Car</h4>
            <form method="post" action="updateCarDetails.php?v_id=' . $fetch['car_id'] . '">
              <div class="row">
                <div class="col-lg-6 col-mg-12">
                  <div class="form-group">
                    <label for="inputEmail4">Vehicle Model</label>
                    <input type="text" class="form-control" name="vmodel" value="' . $fetch['car_model'] . '" placeholder="Enter vehicle model" required>
                  </div>
                </div>
                <div class="col-lg-6 col-mg-12">
                  <div class="form-group">
                    <label for="inputEmail4">Vehicle Number</label>
                    <input type="text" class="form-control" name="vnumber" value="' . $fetch['car_number'] . '" placeholder="Enter vehicle number" required>
                  </div>
                </div>
                <div class="col-lg-6 col-mg-12">
                  <div class="form-group">
                    <label for="inputEmail4">Vehicle Capacity</label>
                    <input type="text" class="form-control" name="vcapacity" value="' . $fetch['capacity'] . '" placeholder="Enter vehicle capacity" required>
                  </div>
                </div>
                <div class="col-lg-6 col-mg-12">
                  <div class="form-group">
                    <label for="inputEmail4">Rent Per/day</label>
                    <input type="number" class="form-control" name="rent" value="' . $fetch['rent'] . '" placeholder="Enter vehicle rent" required>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <a href="../Dashboard/agencyDashboard.php" class="btn btn-outline bg-light border text-primary" style="width:100%">Cancel</a>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>';
  } else {
    $_SESSION['error'] = 'Something Went Wrong, Try Again';
    header('location:agencyPortal.php');
  }

  ?>


</body>

</html>