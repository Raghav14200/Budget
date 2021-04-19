<?php
session_start();
include "connect.php";
$init=$_SESSION['init'];
$people=$_SESSION['people'];
$user_id=$_SESSION['id'];
$from=$_POST['from'];
$to=$_POST['to'];
$title=$_POST['title'];
//insert query
$insert_query="insert into plan (user_id,title,people,budget,fromdate,todate) values ('$user_id','$title','$people','$init','$from','$to')";
$insertexe=mysqli_query($signup,$insert_query) or die(mysqli_error($signup));
$_SESSION['plan_id']=mysqli_insert_id($signup);
$plan_id=$_SESSION['plan_id'];
for($i=0;$i<$_SESSION['people'];$i++){
   $person=$_POST["person_$i"];
   $person_query="insert into person (user_id,plan_id,person_name) values ('$user_id','$plan_id','$person')" or die("not inserted");
   $person_query_exe=mysqli_query($signup,$person_query);
   }
unset($_SESSION['plan_id']);
unset($_SESSION['init']);
unset($_SESSION['people']);
header('location:home.php');

?>