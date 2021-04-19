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
   ?>
   <!--content-->
   <?php 
   include "connect.php";
   $user_id=$_SESSION['id'];
   $planselect_query="select id,title,budget,people,date_format(fromdate,'%D %b %Y') as fromdate,date_format(todate,'%D %b %Y') as todate from plan where user_id='$user_id'";
   $planselect_query_exe=mysqli_query($signup,$planselect_query) or die(mysqli_error($signup));
   $planselect_row=mysqli_num_rows($planselect_query_exe);
   if(!$planselect_row){
     echo '<div class=container>
     <h3 class="margin mb-5">You donot have any active plans</h3>
     <div class="col-md-4  col-md-offset-4">
     <div class="panel panel-default">
     <div class="panel-body text-center p-5">
     <a href="newplan.php" class="btn" ><h4><span class="glyphicon glyphicon-plus-sign"></span>Create a new plan</h4></a>
     </div>
     </div>
     </div>
     </div>
     ';
    }else{
      echo '<div class=container>
      <h3 class="margin mb-5">Your plans</h3>
      <div class="row">';
      for($i=0;$i<$planselect_row;$i++){
     $planselect_fetch=mysqli_fetch_array($planselect_query_exe);
     $title=$planselect_fetch['title'];
     $id=$planselect_fetch['id'];
     $person=$planselect_fetch['people'];
     $budget=$planselect_fetch['budget'];
     $from=$planselect_fetch['fromdate'];
     $to=$planselect_fetch['todate'];
   echo "<div class=\"col-md-4\" >
           <div class=\"panel panel-default\">
            <div class=\"panel-heading  panel-head \">
            <h4 class=\"absolute small-m\" ><span class=\"glyphicon glyphicon-user\"></span>$person</h4>
             <h4 class=\"text-center\">$title</h4>
             
            </div>
            <div class=\"panel-body \">
            <div class=\"mb-5 mt-5\" >
            <h4 class=\"absolute \" >&#8377;  $budget</h4>
             <h4><b>Budget<b></h4>
             </div >             
             <div class=\"mb-5\">
            <h4 class=\"absolute\" >$from to $to </h4>
             <h4 mt-1><b>Date</b></h4>
            </div>
            <a class=\"btn btn-block  button\" href=\"viewplan.php?id=$id\"><h4 class=\"margin-0\">View Plan</h4></a>
             </div>
          </div>
   </div>
   ";
   }
  echo '</div></div>
  <a href="newplan.php" class="btn" ><h1 class="big-btn"><span class="glyphicon glyphicon-plus-sign"></span></h1></a>';

  }
   ?>
   
    <!--footer-->
    <?php
   include "footer.php";
   ?>
    <!--Bootstrap javascript-->
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
