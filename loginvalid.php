<?php
session_start();
require "connect.php";
//variable decleration
$password=$_POST['password'];
$email=$_POST['email'];
$email_valid="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
//validation
if(!preg_match($email_valid,$email)){
   echo "<script>alert('email entered is invalid')</script>";
   echo "<script>location.href='login.php'</script>";
}
else if(strlen($password)<6){
   echo "<script>alert('password should contain minimum 6 characters')</script>";
   echo "<script>location.href='login.php'</script>";
}
//encoding password
$password=md5($password);

//email and password verification
$email_querry="select id from users where email='$email'";
$email_password_querry="select id from users where email='$email' and password='$password'";
$emailexec=mysqli_query($signup,$email_querry);
$passwordver=mysqli_query($signup,$email_password_querry);
$email_row=mysqli_num_rows($emailexec);
$password_row=mysqli_num_rows($passwordver);
$userid_fetch=mysqli_fetch_array($passwordver);

if($password_row){
   $_SESSION['id']=$userid_fetch['id'];
   echo "<script>location.href='home.php'</script>";
}else if(!$email_row){
      echo "<script>alert('Email entered is not registered')</script>";
   echo "<script>location.href='login.php'</script>";
}else {
    echo "<script>alert('Password entered is incorrect')</script>";
   echo "<script>location.href='login.php'</script>";
}



?>