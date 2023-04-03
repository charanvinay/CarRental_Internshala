<?php 
    session_start();
    include '../../../db_connect.php';
    if(!isset($_SESSION['custo_mail'])){
      header('location:../Login/customerLogin.php');
      die();
    }
    include '../../../navbar.php';
?>

<html>
  <head>
    <title>Confirm Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type='text/javascript' src='../../../scripts/addCarValidate.js'></script>
    <link rel="stylesheet" href="../../../css/styles.css"/>
  </head>
  <body>

      <?php
        $v_id=$_GET['v_id'];
        $query = mysqli_query($db,"select * from added_cars where car_id = $v_id");
        if($query){
          $fetch=mysqli_fetch_assoc($query);
          echo'

      <div class="container mt-5 pb-3 d-flex justify-content-center align-items-center" style="height:80%;">
        <div class="d-flex justify-content-center mb-4">
          <div class="border custom-card mx-4" style="background-color:#fff;">
            <div class="p-4">
                <h4 class="text-center mb-4 mt-2">'.$fetch['car_model'].'</h4>
                <div class="d-flex align-items-center justify-content-center">
                  <h4><sup>₹</sup></h4>
                  <h3 class="text-primary">'.$fetch['rent'].'</h3><sub class="card-text mr-2">/ day</sub>
                </div>
                <div class="mt-4">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <img src="https://img.icons8.com/ios/50/null/licence-plate.png" style="width:30px" class="mr-2" /><b class="card-text text-primary">Car Number :</b> 
                    </div>
                    <p class="card-text">'.$fetch['car_number'].'</p>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <div class="d-flex align-items-center">
                      <img src="https://img.icons8.com/ios-filled/50/null/people-in-car.png" style="width:30px" class="mr-2" /><b class="card-text text-primary">Capacity :</b> 
                    </div>
                    <p class="card-text">'.$fetch['capacity'].'</p>
                  </div>
                </div>
              <form method="post" method="post" action="confirmBackend.php?v_id='.$v_id.'" name="conForm" onsubmit="return valid();">
                <div class="form-row mt-4">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">No of Days</label>
                    <input type="number" class="form-control" name="noofdays" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Start Date</label>
                    <input type="date" class="form-control" name="date" id="inputPassword4">
                  </div>
                </div>
                <small class="text-danger" id="warn"></small>
                <button type="submit" class="btn btn-primary mt-3" style="width:100%">Confirm Booking</button>
              </form>
            </div>
          </div>
        </div>
      </div>';

  }
  else{
      $_SESSION['error']='Something Went Wrong, Try Again';
      header('location:agencyPortal.php');
  }
  
  ?>
    

  </body>
</html>