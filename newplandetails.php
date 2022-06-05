<?php
require "connect.php";
$init=$_POST['init'];
$people=$_POST['people'];
if($init<50 || $people<1){
   echo "<script>alert('Initial Budget should be greater than 50 and no persons should be atleast one ')</script>";
   echo "<script>location.href='newplan.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Ct&#8377;l Budget</title>
   <!--bootstrap css-->
   <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" type="text/css" ; />
   <!--external Css-->
   <link rel="stylesheet" href="style/style.css" />
   <!--jquerry-->
   <script src="Bootstrap/js/jquerry.js" type="text/javascript"></script>
</head>

<body>
   <!-- navigation bar -->
<?php
include "navbar.php";
   $_SESSION['init']=$init;
   $_SESSION['people']=$people;
   ?>
   <!--plan details form-->
   <div class="container">
      <div class="col-md-6 space col-md-offset-3 mb-5">
      <div class="panel panel-default space">
         <div class="panel-body">
            <!--form-->
            <form method="POST" action="planinsertion.php">
              <div class="form-group">
              <label for="title"><h4><b>Title</b></h4></label>
              <input type="text" required class="form-control" name="title" id="title"/>
              </div>
              <div class="form-group">
              <div class="row">
              <div class="col-xs-6">
              <label for="from"><h4><b>From</b></h4></label>
              <input type="date" min="2020-04-01" required class="form-control" name="from" id="from"/>
              </div>
              <div class="col-xs-6">
              <label for="to"><h4><b>To</b></h4></label>
              <input type="date" min="2020-05-01" required class="form-control" name="to" id="to"/>
              </div>
              </div>
              </div>
              <div class="form-group">
              <div class="row">
              <div class="col-xs-6">
              <label for="init"><h4><b>Initial Budget</b></h4></label>
              <input  class="form-control" name="init" id="init" disabled value=<?php echo $init;?>>
              </div>
              <div class="col-xs-6">
              <label for="people"><h4><b>No of people</b></h4></label>
              <input class="form-control" name="people" id="people" disabled value=<?php echo $people;?>>
              </div>
              </div>
              </div>
            <?php
            for($i=0;$i<$people;$i++){
               $j=$i+1;
               echo "<div class=\"form-group\">
              <label for=\"person $j\"><h4><b>Person $j  </b></h4></label>
              <input type=\"text\" required class=\"form-control\" name=\"person $i\" id=\"person $j\" placeholder=\"Person $j Name\"/>
              </div>";
            }
            ?>
            <button class="btn btn-block text-primary button">Submit</button>
            </form>
         </div>
         </div>
      </div>
   </div>
   
   <!--footer-->
    <?php
   include "footer.php";
   ?>
    <!--Bootstrap javascript-->
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
