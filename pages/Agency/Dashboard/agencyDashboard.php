<?php
session_start();
include '../../../db_connect.php';
include '../../../navbar.php';
if (!isset($_SESSION['agency_email'])) {
  header('location:../Login/agencyLogin.php');
  die();
}
?>

<html>

<head>
  <title>Agency Dashboard</title>
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
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
      <p class="h4">List of added cars</p>
      <div class="d-flex">
        <a href="../CRUD/addCar.php" class="btn btn-primary mr-2">Add Car</a>
        <a href="../Booking/bookedCars.php" class="btn btn-primary">Booked Cars</a>
      </div>
    </div>
    <?php
    if (isset($_SESSION['error'])) {
      echo "
              <div class='row mt-3'>
                <div class='col d-flex justify-content-center'>
                  <div class='rounded bg-success text-light'>
                    <p class='my-1 px-2'>" . $_SESSION['error'] . "</p>
                  </div>
                </div>
              </div>";
      unset($_SESSION['error']);
    } elseif (isset($_SESSION['msg'])) {
      echo "
                <div class='row mt-3'>
                  <div class='col d-flex justify-content-center'>
                    <div class='rounded bg-success text-light'>
                      <p class='my-1 px-2'><i class='fas fa-check mr-2' style='color:white'></i>" . $_SESSION['msg'] . "</p>
                    </div>
                  </div>
                </div>";
      unset($_SESSION['msg']);
    }
    ?>
  </div>
  <div class="container-md py-2">
    <div class="row">
      <?php
      $user = $_SESSION['agency_email'];
      $query = mysqli_query($db, "select * from added_cars where added_by='$user'");
      if ($query) {
        $total_rows = mysqli_num_rows($query);
        if ($total_rows == 0) {
          echo ' <p class="h4 mx-auto h-100 mt-5 text-secondary"> No Cars added</p>';
        } else {
          while ($fetch = mysqli_fetch_assoc($query)) {
      ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="card mx-auto my-3">
                <div class="card-body text-center">
                  <h3 class="card-title"><?php echo $fetch['car_model'] ?></h4>
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="bg-light d-flex flex-column justify-content-center align-items-center car-details-block">
                        <div>
                          <img src="https://img.icons8.com/ios/50/null/licence-plate.png" style="width:30px" />
                        </div>
                        <small class="card-text"><?php echo $fetch['car_number'] ?></small>
                      </div>
                      <span class="mx-2"></span>
                      <div class="bg-light d-flex flex-column justify-content-center align-items-center car-details-block">
                        <div>
                          <img src="https://img.icons8.com/ios-filled/50/null/people-in-car.png" style="width:30px" />
                        </div>
                        <small class="card-text"><?php echo $fetch['capacity'] ?></small>
                      </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                      <div class="d-flex align-items-center justify-content-center">
                        <h4><sup>₹</sup></h4>
                        <h3 class="text-primary"><?php echo $fetch['rent'] ?></h3><sub class="card-text mr-2">/ day</sub>
                      </div>
                      <a href="../CRUD/editCarDetails.php?v_id='<?php echo $fetch['car_id'] ?>'" class="btn btn-primary" style="width:50%">Edit</a>
                    </div>
                </div>
              </div>
            </div>
      <?php }
        }
      } ?>
    </div>
  </div>
</body>

</html>