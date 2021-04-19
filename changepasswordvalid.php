<?php
session_start();
include "connect.php";


//storing password in variables
$old=$_POST['old'];
$new=$_POST['new'];
$re_new=$_POST['re-new'];
$id=$_SESSION['id'];
//validating format
if(strlen($old)<6 || strlen($new)<6 || strlen($re_new)<6){
   echo "<script>alert('Password should contain minimum 6 characters')</script>";
   header('location:changepassword.php');
}
//encrypting old password for verification
$old=md5($old);
$oldver="select * from users where password='$old' and id='$id'";
$oldver_exec=mysqli_query($signup,$oldver);
$oldverrow=mysqli_num_rows($oldver_exec);

//checking wether old password is correct or not

if($new !== $re_new){
   echo "<script>alert('Passwords donot match')</script>";
   echo "<script>location.href='changepasswordvalid.php'</script>";
}else if(!$oldverrow){
    echo "<script>alert('You have entered the wrong password')</script>";
   echo "<script>location.href='changepasswordvalid.php'</script>";
}else{
   //inserting new password in databse
   $new=md5($new);
   $insert_new_pass="update users set password='$new' where id='$id'";
   $insert_new_pass_exe=mysqli_query($signup,$insert_new_pass);
   echo "<script>alert('New password has been updated')</script>";
   session_unset();
   session_destroy();
   echo "<script>location.href='index.php'</script>";
   
}
?>