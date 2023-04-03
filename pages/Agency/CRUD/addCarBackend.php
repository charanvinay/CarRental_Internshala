<?php
include '../../../db_connect.php';
session_start();
if(!isset($_SESSION['agency_email'])){
    header('location:../Login/agencyLogin.php');
    die();
}
$v_model=$_POST['vmodel'];
$v_number=$_POST['vnumber'];
$v_capacity=$_POST['vcapacity'];
$v_rent=$_POST['rent'];
$v_id=uniqid();
$v_avail='yes';
$agent=$_SESSION['agency_email'];

if(strlen($v_model)==0 || strlen($v_number)==0 || strlen($v_capacity)==0 || strlen($v_rent)==0 ){
  header('location:addcar.php');
} 
else{
  $query=mysqli_query($db, "insert into added_cars(car_id,car_model,car_number,capacity,rent,availability,added_by) 
  values('$v_id','$v_model','$v_number','$v_capacity','$v_rent','$v_avail','$agent')");
  if($query){
      $_SESSION['msg']='New Car Added Successfully!!';
      header('location:../Dashboard/agencyDashboard.php');
  }
  else{
      $_SESSION['error']='Something Went Wrong!!, Try Again';
      header('location:../Dashboard/agencyDashboard.php');
  }
}
