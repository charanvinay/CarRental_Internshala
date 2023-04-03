<?php
    include 'db_connect.php';
    session_start();
    if(isset($_SESSION['agency_email'])){
        header('location:pages/Agency/Dashboard/agencyDashboard.php');
        die();
    }
    else{
        header('location:pages/Customer/Dashboard/index.php');
        die();
    }
?>