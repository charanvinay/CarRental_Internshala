<?php
include '../../../db_connect.php';
$email=$_POST['email'];
$pword=$_POST['password'];
session_start();


  $query=mysqli_query($db,"select * from customers where email = '$email'");
  if(mysqli_num_rows($query) == 0){
      $_SESSION['warning']='User not exist!! please register';
      header('location:customerLogin.php');
  }
  else{
      $fetch=mysqli_fetch_assoc($query);
      if($email==$fetch['email']){
        if($pword==$fetch['password']){
          $_SESSION['custo_mail']=$email;
          header('location:../Dashboard/index.php');
        }
        else{
          $_SESSION['warning']="Incorrect Password";
          header('location:customerLogin.php');
        }
      }
      else{
        $_SESSION['warning']='Email not exist';
        header('location:customerLogin.php');
      }
  }
?>