<?php
    include 'db_connect.php';
    session_start();
    if(!isset($_SESSION['custo_mail'])){
        header('location:customerLogin.php');
        die();
    }
    $v_id=$_GET['v_id'];
    $no_of_days=$_POST['noofdays'];
    $s_date=$_POST['date'];
    $user=$_SESSION['custo_mail'];
  
    if(!$_GET['v_id'] || strlen($no_of_days)==0 || strlen($s_date)==0){
        header('location:index.php');
    }
    else{
        $check=mysqli_query($db,"select * from added_cars where car_id=$v_id");
        $fetch=mysqli_fetch_assoc($check);
        if($fetch['availability']=='no'){
            $_SESSION['error']='Car not available';
            header('location:index.php');
            die();
        }
        else{
            $query=mysqli_query($db,"insert into booked_cars(car_id,start_date,no_of_days,booked_customer)
            values($v_id,'$s_date','$no_of_days','$user')");
            if($query){
                $avail_query=mysqli_query($db,"update added_cars set availability='no' where car_id=$v_id");
                if($avail_query){
                    $_SESSION['msg']='Booked Succesfully!!';
                    header('location:myBookings.php');
                }
            }
            else{
                $_SESSION['error']='Something Went Wrong!!, Try Again';
                header('location:index.php');
            }
        }
        

    }



?>