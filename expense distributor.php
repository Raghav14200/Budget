<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ct&#8377;l Budget</title>
    <!--bootstrap css-->
    <link
      rel="stylesheet"
      href="Bootstrap/css/bootstrap.min.css"
      type="text/css"
      ;
    />
    <!--external Css-->
    <link rel="stylesheet" href="style/style.css" />
    <!--jquerry-->
    <script src="Bootstrap/js/jquerry.js" type="text/javascript"></script>
  </head>
  <body>
    
    <!-- navigation bar -->
    <?php
   include "navbar.php";
   require "connect.php";
$planid=$_GET['id'];
$user_id=$_SESSION['id'];
$remaining_amount=$_GET['remamount'];
$title=$_GET['title'];
$budget=$_GET['budget'];
$person=$_GET['people'];
$expense=$budget-$remaining_amount;
$average=$expense/$person;

//function for expense by individual
function individual_expense($name){
global $planid,$user_id,$signup;
$select_individual_expense_query="select amount from expense where user_id='$user_id' and plan_id='$planid' and person_name='$name'";
$select_individual_expense_query_exe=mysqli_query($signup,$select_individual_expense_query);
$select_individual_expense_row=mysqli_num_rows($select_individual_expense_query_exe);
$individual_expense=0;
for($i=0;$i<$select_individual_expense_row;$i++){
   $select_individual_expense_fetch=mysqli_fetch_array($select_individual_expense_query_exe);
   $individual_expense+=$select_individual_expense_fetch['amount'];
}
return $individual_expense;
}
   ?>
   <!--content-->
<div class="container">
      <div class="col-md-6 space col-md-offset-3">
        <div class="panel panel-default mb-6">
          <div class="panel-heading text-center panel-head">
          <h4 class="absolute small-m" ><span class="glyphicon glyphicon-user"></span><?php echo "$person";?></h4>
             <h4 class="text-center"><?php echo "$title";?></h4>
         </div>
          <div class="panel-body">
            <div class="mb-5" >
            <h4 class="absolute " >&#8377; <?php echo "$budget";?></h4>
             <h4><b>Initial Budget</b></h4>
             </div >
             <?php
             // individual expense
             $select_individual_person_query="select person_name from person where user_id='$user_id' and plan_id='$planid'";
             $select_individual_person_query_exe=mysqli_query($signup,$select_individual_person_query) or die('not inserted');
             for($i=0;$i<$person;$i++){
            $select_individual_person_fetch=mysqli_fetch_array($select_individual_person_query_exe);
            $person_name=$select_individual_person_fetch['person_name'];
            $individual_expense=individual_expense($person_name);
            echo "<div class=\"mb-5\">
             <h4 class=\"absolute\">&#8377; $individual_expense</h4>
             <h4 class=\"mt-1\"><b>$person_name</b></h4>
            </div>";
            }
            ?>
            <div class="mb-5">
             <h4 class="absolute" style="color:<?php if($remaining_amount<0){echo 'red';}else if($remaining_amount>0){echo 'green';}?>";><?php if($remaining_amount<0){$remaining_amount=$remaining_amount*-1;echo "Overspent by ";} echo "&#8377;  $remaining_amount";?></h4>
             <h4 mt-1><b>Remaining amount</b></h4>
            </div>
            <div class="mb-5" >
            <h4 class="absolute " >&#8377; <?php echo "$average";?></h4>
             <h4><b>Individual Shares</b></h4>
             </div >
            <?php
             // individual expense
             $select_individual_person_query="select person_name from person where user_id='$user_id' and plan_id='$planid'";
             $select_individual_person_query_exe=mysqli_query($signup,$select_individual_person_query) or die('not inserted');
             for($i=0;$i<$person;$i++){
            $select_individual_person_fetch=mysqli_fetch_array($select_individual_person_query_exe);
            $person_name=$select_individual_person_fetch['person_name'];
            $individual_expense=individual_expense($person_name);
            $money_get=$individual_expense-$average;
            echo "<div class=\"mb-5\">
             <h4 class=\"absolute\" style=\"color:";if($money_get<0){echo 'red';}else if($money_get>0){echo 'green';} echo"\">";if($money_get<0){$money_get=$money_get*-1;echo "Owes &#8377; $money_get";} else if($money_get>0){echo "Gets Back &#8377; $money_get";}else{echo "All settled up";} echo "</h4>            <h4 class=\"mt-1\"><b>$person_name</b></h4>
            </div>";
            }?>
         <div class="text-center">
            <a href="viewplan.php?id=<?php echo "$planid";?>" class="btn btn-lg text-success button1 button" type="button"><span class="glyphicon glyphicon-arrow-left"></span>Go Back</a>
         </div>
         </div>
         </div>
         </div>
         </div>

   <!-- footer -->
       <?php
   include "footer.php";
   ?>
    <!--Bootstrap javascript-->
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
