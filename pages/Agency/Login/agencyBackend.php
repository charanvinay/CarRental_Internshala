<?php
include '../../../db_connect.php';
$email=$_POST['email'];
$pword=$_POST['password'];
session_start();

    $query=mysqli_query($db, "select * from agencies where email = '$email'");
    if(mysqli_num_rows($query) == 0){
        $_SESSION['warning']='User not exist!! please register';
        header('location:agencyLogin.php');
    }
    else{
        $fetch=mysqli_fetch_assoc($query);
        if($email==$fetch['email']){
            if($pword==$fetch['password']){
                $_SESSION['agency_email']=$email;
                header('location:../Dashboard/agencyDashboard.php');
            }
            else{
                $_SESSION['warning']="Incorrect Password";
                header('location:agencyLogin.php');
            }
        }
        else{
            $_SESSION['warning']='User not exist';
            header('location:agencyLogin.php');
        }
    }
