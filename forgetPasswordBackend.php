<?php
 include 'db_connect.php';
session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$secques=$_POST['secQuestion'];
$secans=$_POST['securityvalue'];


if (strlen($secques)==0){
    header('location: forgetPassword.php');
    die();
}
else{
    $query=mysqli_query($db,"select * from customers where email='$email'");
    if($query){
        if(mysqli_num_rows($query)==0){
            $_SESSION['warning']='Email not exists';
            header('location:forgetPassword.php');
        }
        else{
            $fetch=mysqli_fetch_assoc($query);
            if($fetch['email']== $email && $fetch['security_ques']==$secques  && $fetch['security_ans']==$secans){
                $update=mysqli_query($db,"update customers set password ='$password' where email='$email'");
                if($update){
                    $_SESSION['success']='Password updated successfully!!';
                    header('location:customerLogin.php');
                }
                else{
                    $_SESSION['warning']='Error!! Please Try Again';
                    header('location:forgetPassword.php');
                }
            }
            else{
                $_SESSION['warning']='Incorrect Details';
                header('location:forgetPassword.php');
            }
            
        }
    }
    else{
        $_SESSION['warning']='Email not exists';
        header('location:forgetPassword.php');
    }
}

?>