<?php
 include '../../../db_connect.php';
session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$secques=$_POST['secQuestion'];
$secans=$_POST['securityvalue'];


if (strlen($secques)==0){
    header('location: forgetPasswordAgency.php');
    die();
}
else{
    $query=mysqli_query($db,"select * from agencies where email='$email'");
    if($query){
        if(mysqli_num_rows($query)==0){
            $_SESSION['warning']='Email not exists';
            header('location:forgetPasswordAgency.php');
        }
        else{
            $fetch=mysqli_fetch_assoc($query);
            if($fetch['email']== $email && $fetch['security_ques']==$secques  && $fetch['security_ans']==$secans){
                $update=mysqli_query($db,"update agencies set password ='$password' where email='$email'");
                if($update){
                    $_SESSION['success']='Password updated successfully!!';
                    header('location:../Login/agencyLogin.php');
                }
                else{
                    $_SESSION['warning']='Error!! Please Try Again';
                    header('location:forgetPasswordAgency.php');
                }
            }
            else{
                $_SESSION['warning']='Incorrect Details';
                header('location:forgetPasswordAgency.php');
            }
            
        }
    }
    else{
        $_SESSION['warning']='Email not exists';
        header('location:forgetPasswordAgency.php');
    }
}

?>