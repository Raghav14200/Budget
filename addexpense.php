<?php
session_start();
require "connect.php";
$plan_id=$_GET['id'];//plan id 
$from=$_GET['from'];
$to=$_GET['to'];
$user_id=$_SESSION['id'];//user id
$title=$_POST['title'];
$date=$_POST['date'];
$person_name=$_POST['person_name'];
$amount=$_POST['amount'];
if(!$person_name || !$title){
   echo "<script>alert('Title and Person name cannot be left empty')</script>";
   echo "<script>location.href=\"viewplan.php?id=$plan_id\"</script>";
}else if($amount<=0){
   echo "<script>alert('Amout should be Positive')</script>";
   echo "<script>location.href=\"viewplan.php?id=$plan_id\"</script>";
}else if($date<$from || $date>$to){
   echo "<script>alert('date should be present betwwen $from and $to')</script>";
   echo "<script>location.href=\"viewplan.php?id=$plan_id\"</script>";
}else{
$insertion_expense_query="insert into expense (user_id,plan_id,person_name,expense_title,date,amount) values ('$user_id','$plan_id','$person_name','$title','$date','$amount');";
$insertion_expense_query_exe=mysqli_query($signup,$insertion_expense_query) or die(mysqli_error($signup));
$expense_id=mysqli_insert_id($signup);
//fuction for getting imagetype
function getimageextension($imagetype){
   if(empty($imagetype)) return false;
   switch($imagetype){
      case 'image.bmp' : return '.bmp';
      case 'image.gif' : return '.gif';
      case 'image.jpeg' : return '.jpeg';
      case 'image.png' : return '.png';
   }
} 
if(!empty($_FILES['myfile']['name'])){
   $file_name=$_FILES['myfile']['name'];
   $temp_name=$_FILES['myfile']['tmp_name'];
   $imgtype=$_FILES['myfile']['type'];
   $ext=getimageextension($imgtype);
   $imagename=date("d-m-Y")."-".time().$ext;
   $target_path="img/".$imagename;
if(move_uploaded_file($temp_name,$target_path)){
   $img_query="update expense set img='$target_path' where id='$expense_id'";
   $img_query_exe=mysqli_query($signup,$img_query) or die('image not inserted');
}
}
header("location:viewplan.php?id=$plan_id");
}
?>
