<?php 
include 'db_connect.php';
session_start();
$type=$_POST['type'];
$email=$_POST['email'];
$password=$_POST['password'];
$secques=$_POST['secQuestion'];
$secans=$_POST['securityvalue'];

if(strlen($secques)==0){
     header('location: register.php');
}
else{
    if($type =='customer'){
      $check=mysqli_query($db,"select * from customers where email='$email'");
      if($check && mysqli_num_rows($check)!= 0){
        $_SESSION['warning']='Email already exists';
        header("location: register.php");
      }
      else{
        $query=mysqli_query($db,"insert into customers(email,password,security_ques,security_ans) values('$email','$password','$secques','$secans')");
        if($query){
            $_SESSION['success']="Registered Successfully!! Please Login";
            header('location:pages/Customer/Login/customerLogin.php');
        }
      }
    }
    elseif($type == 'agency'){
        $check=mysqli_query($db,"select * from agencies where email='$email'");
    
        if($check && mysqli_num_rows($check) != 0){
            session_start();
            $_SESSION['warning']='Email already exists';
            header('location: register.php');
        }
        else{
          $query=mysqli_query($db,"insert into agencies(email,password,security_ques,security_ans) values('$email','$password','$secques','$secans')");
            if($query){
                $_SESSION['success']="Registered Successfully!! Please Login";
                header('location:pages/Agency/Login/agencyLogin.php');
            }
            else{
                echo "error query";
            }
        }
    }
    else{
        echo'error';
    }
}


?>