<?php
session_start();
include 'navbar.php';
include 'db_connect.php';

?>

<html>

<head>
  <title>Car Rental Agency</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between mt-5">
      <p class="h4">List of Available Cars</p>
      <div class="d-flex">
        <?php if (isset($_SESSION['custo_mail'])) {
          echo '<a href="myBookings.php" class="btn btn-primary">My Bookings</a>';
        } ?>
        <?php if (isset($_SESSION['agency_username'])) {
          echo '<a href="bookedCars.php" class="btn btn-primary ml-2">View Added Cars</a>';
        } ?>
      </div>
    </div>
  </div>
  <div class="container py-2">
    <div class="row">
      <?php
      $query = mysqli_query($db, "select * from added_cars where availability='yes'");
      if ($query) {
        $total_rows = mysqli_num_rows($query);
        if ($total_rows == 0) {
          echo '<p class="h4 mx-auto"> No Cars Avaialable</p>';
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
                      <a href="confirmBooking.php?v_id='<?php echo $fetch['car_id'] ?>'" class="btn btn-primary" style="width:50%">Rent</a>
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