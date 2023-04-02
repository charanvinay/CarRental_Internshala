<?php
session_start();
include 'db_connect.php';
include 'navbar.php';
if (!isset($_SESSION['agency_email'])) {
  header('location:agencyLogin.php');
  die();
}
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
  <div class="mx-4">
    <h3 class="my-3 text-center">List of Booked Cars</h3>
    <div class="container mt-4 p-0" style="margin-top:70px; background-color: #fff">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Vehicle Model</th>
              <th scope="col">Vehicle Number</th>
              <th scope="col">Capacity</th>
              <th scope="col">Rent Per/day</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $user = $_SESSION['agency_email'];
            $sno = 1;
            $query = mysqli_query($db, "select car_model, car_number, capacity, rent,booked_customer from added_cars,booked_cars
         where added_cars.added_by='$user' and added_cars.availability='no' and added_cars.car_id=booked_cars.car_id");
            if ($query) {
              if (mysqli_num_rows($query) == 0) {
                echo '</table><tr><center><h4 class="font">No Cars Are Booked Yet</h4></center></tr>';
              } else {
                while ($fetch = mysqli_fetch_assoc($query)) {
                  echo '
          
                      <tr>
                          <td>' . $sno++ . '</td>
                          <td>' . $fetch['car_model'] . '</td>
                          <td>' . $fetch['car_number'] . '</td>
                          <td>' . $fetch['capacity'] . '</td>
                          <td>' . $fetch['rent'] . '</td>
                      </tr>';
                }
              }
            }
            ?>

          </tbody>
        </table>
        <div>
        </div>
      </div>
</body>

</html>