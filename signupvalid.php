<?php
session_start();
require 'connect.php';
//variable declaration
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$email=$_POST['email'];

//checking for same email id
$emailid_querry="Select email from users where email='$email'";
$emailid=mysqli_query($signup,$emailid_querry);
$emailrow=mysqli_num_rows($emailid);


//validation
$email_valid="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
$phone_valid="/^[0-9]{10}+$/";
if(!preg_match($email_valid, $email)){
   echo "<script>alert('email entered is invalid')</script>";
   echo "<script>location.href='signup.php'</script>";
}
else if(strlen($password)<6){
   echo "<script>alert('password should contain minimum 6 characters')</script>";
   echo "<script>location.href='signup.php'</script>";
}else if(strlen($phone)!=10 || !preg_match($phone_valid,$phone)){
	echo "<script>alert('Contact no is not valid')</script>";
	echo "<script>location.href='signup.php'</script>";
}
//distinct email verifiction
else if($emailrow){
  echo "<script>alert('This email address is already registered')</script>";
   echo "<script>location.href='signup.php'</script>";
}
else{
//escape characters
$name1=mysqli_real_escape_string($signup,$_POST['name']);
$phone1=mysqli_real_escape_string($signup,(int) $_POST['phone']);
$password1=mysqli_real_escape_string($signup,$_POST['password']);
$email1=mysqli_real_escape_string($signup,$_POST['email']);

//encrypting password
$password1=md5($password1);

//inserting into database
$insert_querry="insert into users (user,email,password,number) values ('$name1','$email1','$password1','$phone1');";
$insert=mysqli_query($signup,$insert_querry) or die(mysqli_error($signup)); 
echo "<script>alert('User successfully registered')</script>";
$_SESSION['id']=mysqli_insert_id($signup);
echo "<script>location.href='home.php'</script>";
}

?>