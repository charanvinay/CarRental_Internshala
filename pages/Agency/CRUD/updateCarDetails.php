<?php
include '../../../db_connect.php';
session_start();
if(!isset($_SESSION['agency_email'])){
    header('location:../Login/agencyLogin.php');
    die();
}
$v_id=$_GET['v_id'];
$v_model=$_POST['vmodel'];
$v_number=$_POST['vnumber'];
$v_capacity=$_POST['vcapacity'];
$v_rent=$_POST['rent'];

$v_avail='yes';
$agent=$_SESSION['agency_email'];



if(!$_GET['v_id']){
    $_SESSION['error']='Something Went Wrong, Try Again';
}
else{
    $query=mysqli_query($db,"update added_cars set car_model='$v_model',car_number='$v_number',capacity='$v_capacity',
    rent='$v_rent' where car_id = '$v_id'");

    if($query){
        $_SESSION['msg']='Details Updated Successfully';
        header('location:../Dashboard/agencyDashboard.php');
    }
}
