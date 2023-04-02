<?php
$agent = "index.php";
if (isset($_SESSION['agency_email'])) {
  $agent = "agencyDashboard.php";
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand " href="<?php echo $agent; ?>">Car Rental Agency</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active mr-4">
        <a class="nav-link " href="<?php echo $agent; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <?php
    if (isset($_SESSION['custo_mail'])) {
      echo '<div class="row mx-2 align-items-center">
                <span class="text-light mr-3">Welcome ' . $_SESSION['custo_mail'] . '!!!</span>
                <a href="logout.php" class="btn btn-primary">Logout <i class="fas fa-sign-out" style="color:white"></i></a>
              </div>';
    } elseif (isset($_SESSION['agency_email'])) {
      echo '<div class="row mx-2 align-items-center">
                <span class="text-light mr-3">Welcome ' . $_SESSION['agency_email'] . '!!!</span>
                <a href="logout.php" class="btn btn-primary">Logout <i class="fas fa-sign-out" style="color:white"></i></a>
              </div>';
    } else {
      echo '<a href="customerLogin.php" class="btn btn-primary">Login <i class="fas fa-sign-in" style="color:white"></i></a>';
    }
    ?>
  </div>
</nav>